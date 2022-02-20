from bs4 import BeautifulSoup
from lxml import etree
import requests
import re
import json
from config import links

def get_item_link(nodeId):
    return f"https://www.thehaircaregroup.com/ProductSearch?catalogueNodeId={nodeId}&pageNumber=1&sort=6&pageSize=18&searchQuery=&currentFilterGroup=&selectedFilters="

def get_item_detail_link(href):
    return f"https://www.thehaircaregroup.com{href}"

def get_url(url):
    items = []
    brands = {}
    print('Get url %s' % url)
    content = requests.get(url).text
    soup = BeautifulSoup(content, 'html.parser')
    # dom = etree.HTML(str(soup))
    for cell in soup.select('div.mini-cart'):
        # print(cell.__dict__)
        print(cell.attrs["data-mini-cart-endpoint"])
        group = re.match(r".*currentPage=(\w+)__.*", cell.attrs["data-mini-cart-endpoint"])
        nodeId = group.group(1)
        break
    list_item_link = get_item_link(nodeId)
    print(list_item_link)

    # parse each item
    content = requests.get(list_item_link).text
    soup = BeautifulSoup(content, 'html.parser')
    for idx, item_cell in enumerate(soup.select('div.product-teaser')):
        a =  item_cell.div.h3.a
        spans = a.find_all("span", recursive=False)
        # print(len(spans))
        item = {
            "href": get_item_detail_link(a.attrs["href"]),
            "thumbnail": get_item_detail_link(spans[0].img.attrs["data-lazy-load-src"]),
            "brand": spans[1].get_text(strip=True),
            "name": spans[2].get_text(strip=True),
        }
        items.append(item)
        # break
        if idx >= 4: break

    # get detail all item
    for idx, item in enumerate(items):
        print("Go to item %s, link %s" %(idx, item["href"]))
        url = item["href"]
        # url = "https://www.thehaircaregroup.com/hair-care/shampoo/hair-colour-shampoo/olaplex-no4p-blonde-enhancer-toning-shampoo-250ml-62162/"
        # url = "https://www.thehaircaregroup.com/tools-brushes/electrical/hair-irons/diva-mk11-ceramic-tourmaline-purple-straightener-05461/"

        content = requests.get(url).text
        soup = BeautifulSoup(content, 'html.parser')
        ls = set()
        for img in soup.select('img.product-detail-image__image'):
            ls.add(get_item_detail_link(img.attrs['src']))
        item["detail_img"] = list(ls)
        sku_text = soup.select_one('div.product-detail__info').get_text(strip=True)
        item["sku"] = re.match(r".*SKU:\s*(\d+)\s*", sku_text).group(1)
        item["description"] = soup.select_one('.product-detail__content-description').get_text(strip=True)
        # print(soup.select_one('.accordion__content').div.contents)
        # item info
        info_ls = []
        span = soup.find("span", string="Product Information")
        info = span.parent.parent.parent.parent.div.div
        for i in info.contents:
            if not i:
                continue
            if str(i).startswith('<h3'):
                break
            else:
                info_ls.append(str(i))
        item["info"] = "".join(info_ls).strip()

        # item ingredent
        span = soup.find("span", string="Ingredients")
        if span:
            ingredent = span.parent.parent.parent.parent.div.div
            item["ingredent"] = str(ingredent)
        else:
            item["ingredent"] = ""

        # iem how to use
        span = soup.find("span", string="How to use")
        if span:
            guide = span.parent.parent.parent.parent.div.div
            item["guide"] = str(guide)
        else:
            item["guide"] = ""

        description = soup.select_one(".product-detail__brand-description")
        brands[item["brand"].lower()] = {
            "name": item["brand"],
            "description": description.p.get_text(strip=True) if description.p else ""
        }

        # span = soup.find("span", string="Product Information")
        # block = span.parent.parent.parent.parent.div.div
        # print(block)

    return items, brands

if __name__ == '__main__':
    items = []
    brands = {}
    for url in links:
        items_, brands_ = get_url(url)
        items.append(items_)
        for k, v in brands_.items():
            brands[k] = v
    with open("raw/items.json", "w") as f:
        f.write(json.dumps(items))
    with open("raw/brands.json", "w") as f:
        f.write(json.dumps(brands))