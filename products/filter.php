<?php

$FILTER_Category = (isset($_GET["category"]) && $_GET["category"] != 'undefined') ? $_GET["category"] : NULL;
$FILTER_SubCategory =  (isset($_GET["subcategory"]) && $_GET["subcategory"] != 'undefined') ? $_GET["subcategory"] : NULL;
$FILTER_Brand = (isset($_GET["brand"]) && $_GET["brand"] != 'undefined') ? $_GET["brand"] : '';
$FILTER_Brand = explode(",", $FILTER_Brand); 
// if(in_array(0, $FILTER_Brand)){
//     $FILTER_Brand = array(0);
// }

?>