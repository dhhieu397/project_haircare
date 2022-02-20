import json
import requests
import random
import re

def get_image_ext(image_url):
    return image_url.rsplit('.', 1)[-1].split('/', 1)[0]

def escape_sql(s):
    # s = re.sub(r'\n' , '', s) 
    return s.replace("'","\\'").replace("\r\n", "").replace("\n", "")

def download_img(image_name, image_url):
    print("Download image %s, %s" % (image_name, image_url))
    img_data = requests.get(image_url).content
    with open(f'./output/images/{image_name}', 'wb') as handler:
        handler.write(img_data)

with open("raw/items.json", "r") as f:
    items = json.loads(f.read())

with open("raw/brands.json", "r") as f:
    brands = json.loads(f.read())

brand_idx = 1
for k,v in brands.items():
    v["id"] = brand_idx
    brand_idx += 1

# s = "A reparative shampoo formulated with the original OLAPLEX chemistry that restores the hair's internal strength. Impart moisture, durability and manageability with the OLAPLEX No.4 Bond Maintenance Shampoo."
# print(escape_sql(s))

if __name__ == '__main__':
    total_insert_items = []
    total_images = []

    global_idx = 0
    for sub_idx, sub in enumerate(items):
        subcategory = sub_idx + 1
        for item_idx, it in enumerate(sub):
            global_idx += 1

            detail_img = it["detail_img"]
            detail_img_name = []
            for idx, img in enumerate(detail_img):
                ext = get_image_ext(img)
                detail_img_name.append(f"{it['sku']}_{idx}.{ext}")
            it["detail_img_name"] = detail_img_name
            it["id"] = global_idx

            for img in detail_img_name:
                total_images.append((it["id"], img))

            ext = get_image_ext(img)
            it["thumbnail_name"] = f"{it['sku']}_thumbnail_{idx}.{ext}"

        # build sql insert item
        insert = []
        for it in sub:
            if it["brand"].lower() not in brands:
                print('Not found brand %s' % it["brand"].lower())
                it["deleted"] = True
                continue
            brand = brands[it["brand"].lower()]["id"]
            price = int(random.random()*40+10)
            real_price = price + int(random.random()*20+2)
            rate = random.random()*5
            rate_number = int(random.random()*50)
            total = 0 if random.random() < 0.2 else 100
            creation_date = '2022-02-02'
            size = int(random.random()*4)+1
            insert_s = f'({it["id"]}, \'{escape_sql(it["name"].lower().replace(" ", "-"))}\', \'{escape_sql(it["name"])}\', \'{escape_sql(it["description"])}\', \'{escape_sql(it["info"])}\', \'{escape_sql(it["ingredent"])}\', \'{escape_sql(it["guide"])}\', \'{it["thumbnail_name"]}\', {subcategory}, {brand}, {size}, \'{it["sku"]}\', {price}, {real_price}, {rate}, {rate_number}, {total}, \'{creation_date}\')'
            insert.append(insert_s)
        total_insert_items = total_insert_items + insert

    insert = ',\n'.join(total_insert_items)
    insert_item = f"INSERT INTO `product_item` (`id`, `code`, `name`, `description`, `product_infomation`, `ingredient`, `guide`, `img`, `subcategory`, `brand`, `size`, `sku`, `price`, `real_price`, `rate`, `rate_number`, `total`, `creation_date`) VALUES \n{insert};"

    # build image link
    total_insert = map(lambda it: f"({it[0]}, '{it[1]}')", total_images)
    insert = ',\n'.join(total_insert)
    insert_image = f"INSERT INTO `product_item_image` (`product`, `img`) VALUES\n{insert};"
    
    # build brand
    insert_brands = []
    for brand in brands.values():
        insert_brands.append(f"({brand['id']}, '{escape_sql(brand['name'])}', '{escape_sql(brand['description'])}')")
    insert = ',\n'.join(insert_brands)
    insert_brand = f"INSERT INTO `product_brand` (`id`, `name`, `description`) VALUES\n{insert};"

    content = f"{insert_brand}\n\n\n{insert_item}\n\n\n{insert_image}\n"

    with open("./output/seed.sql", 'w') as f:
        f.write(content)

    # download images
    # for sub_idx, sub in enumerate(items):
    #     for item in sub:
    #         if item.get("deleted"):
    #             continue
    #         download_img(item["thumbnail_name"], item["thumbnail"])
    #         for name, url in zip(item["detail_img_name"], item["detail_img"]):
    #             download_img(name, url)

