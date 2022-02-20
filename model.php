<?php
// include config
include __DIR__.'/consts.php';

// Max number of items in one page
$FILTER_page_size = $PAGE_SIZE;

// page index, in range [0..]
$FILTER_page_number = 0;
// number of pages
$FILTER_page_count = 0;

// filter in grid page
$FILTER_Category = (isset($_GET["category"]) && $_GET["category"] != 'undefined') ? $_GET["category"] : NULL;
$FILTER_SubCategory =  (isset($_GET["subcategory"]) && $_GET["subcategory"] != 'undefined') ? $_GET["subcategory"] : NULL;
$FILTER_page_number = (isset($_GET["page"]) && $_GET["page"] != 'undefined') ? $_GET["page"] : 0;
// brand is a list, separate by ','
$FILTER_Brand = (isset($_GET["brand"]) && $_GET["brand"] != 'undefined') ? $_GET["brand"] : '';
if($FILTER_Brand != ''){
    $FILTER_Brand = explode(",", $FILTER_Brand); 
}else{
    $FILTER_Brand = array(0);
}

// Sort option
$SORTS = (object) array(
    "REL"=>"relevance",
    "LATEST"=>"latest",
    "NAME_ASC"=>"name_asc",
    "NAME_DESC"=>"name_desc"
);

// Type of items, show in product, treatment, equipment page
$TYPES = (object) array(
    "PRODUCT"=> 1,
    "TREATMENT"=> 2,
    "EQUIPMENT"=>3
);

// Use Related sort as default
$FILTER_Sort = (isset($_GET["sort"]) && $_GET["sort"] != 'undefined')? $_GET["sort"]: $SORTS->REL;

// Global selected item and item's type, used to show in layout components.
$SELECTED_ITEM = NULL;
$SELECTED_TYPE = NULL;

function set_selected_item($val){
    global $SELECTED_ITEM;
    $SELECTED_ITEM = $val;
}

function set_page_count($val){
    global $FILTER_page_count;
    $FILTER_page_count = $val;
}

function set_selected_type($val){
    global $SELECTED_TYPE;
    $SELECTED_TYPE = $val;
}
?>