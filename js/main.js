var BASE_HREF = "/project_haircare/";

var dir = function(p){
    if(p && p.endsWith(".php")){
        return p.split('/').slice(0, -1).join('/');
    }
    return "";
}

var doQueryProduct = function(){
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
    console.log(CURRENT_URL);
    var params = new URLSearchParams({
        'item': item,
    });
    window.location.href = dir(CURRENT_URL) + "/item.php?" + params.toString();
    return false;
}

var onCompareItem = function(item, item_compare){
    var params = new URLSearchParams({
        'item': item,
        'item_compare': item_compare,
    });
    window.location.href = dir(CURRENT_URL) + "/compare.php?" + params.toString();
    return false;
}

var navigate = function(path){
    console.log(BASE_HREF + path)
    if(path[0] == '/'){
        window.location.href = path;
    }else{
        window.location.href = BASE_HREF + path;
    }
    return false;
}