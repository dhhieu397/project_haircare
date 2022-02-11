var BASE_HREF = "/project_haircare/";

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
    window.location.href = BASE_HREF + "products/?" + params.toString();
}

var onClickItem = function(item){
    var params = new URLSearchParams({
        'item': item,
    });
    window.location.href = BASE_HREF + "products/item.php?" + params.toString();
    return false;
}

var navigate = function(path){
    console.log(BASE_HREF + path)
    if(path[0] == '/'){
        window.location.href = '/';
    }else{
        window.location.href = BASE_HREF + path;
    }
    return false;
}