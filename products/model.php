<?php

$FILTER_page_size = 18;
$FILTER_page_number = 0;
$FILTER_page_count = 0;

$FILTER_Category = (isset($_GET["category"]) && $_GET["category"] != 'undefined') ? $_GET["category"] : NULL;
$FILTER_SubCategory =  (isset($_GET["subcategory"]) && $_GET["subcategory"] != 'undefined') ? $_GET["subcategory"] : NULL;
$FILTER_page_number = (isset($_GET["page"]) && $_GET["page"] != 'undefined') ? $_GET["page"] : 0;
$FILTER_Brand = (isset($_GET["brand"]) && $_GET["brand"] != 'undefined') ? $_GET["brand"] : '';
if($FILTER_Brand != ''){
    $FILTER_Brand = explode(",", $FILTER_Brand); 
}else{
    $FILTER_Brand = array(0);
}
// if(in_array(0, $FILTER_Brand)){
//     $FILTER_Brand = array(0);
// }

$SORT_REL = "relevance";
$SORT_LATEST = "latest";
$SORT_NAME_ASC = "name_asc";
$SORT_NAME_DESC = "name_desc";

$FILTER_Sort = (isset($_GET["sort"]) && $_GET["sort"] != 'undefined')? $_GET["sort"]: $SORT_REL;

$SELECTED_ITEM = NULL;

function set_selected_item($val){
    global $SELECTED_ITEM;
    $SELECTED_ITEM = $val;
}

function set_page_count($val){
    global $FILTER_page_count;
    $FILTER_page_count = $val;
}
?>