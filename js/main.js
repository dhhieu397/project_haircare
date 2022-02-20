// Root url to navigate between pages
var BASE_HREF = "/project_haircare/";

// get parent of path
var dir = function(p){
    if(p && p.endsWith(".php")){
        return p.split('/').slice(0, -1).join('/');
    }
    return "";
}

var doQueryProduct = function(){
    // submit filter, sort, pagination changed
    console.log(QUERY);
    var params = {
        'category': QUERY.category,
        'subcategory': QUERY.subcategory,
        'brand': QUERY.brand.join(',') || 0,
        'sort': QUERY.sort,
        'page': QUERY.page,
    }
    var params = new URLSearchParams(QUERY);
    window.location.href = CURRENT_URL + "?" + params.toString();
}

var onClickItem = function(item){
    // navigate to item detail
    // console.log(CURRENT_URL);
    var params = new URLSearchParams({
        'item': item,
    });
    window.location.href = dir(CURRENT_URL) + "/item.php?" + params.toString();
    return false;
}

var onCompareItem = function(item, item_compare){
    // navigate to item comparing page
    var params = new URLSearchParams({
        'item': item,
        'item_compare': item_compare,
    });
    window.location.href = dir(CURRENT_URL) + "/compare.php?" + params.toString();
    return false;
}

var navigate = function(path){
    // navigate to path
    // console.log(BASE_HREF + path)
    if(path[0] == '/'){
        window.location.href = path;
    }else{
        window.location.href = BASE_HREF + path;
    }
    return false;
}