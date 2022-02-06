<?php

$FILTER_Category = isset($_GET["category"]) ? $_GET["category"] : 1;
$FILTER_SubCategory =  isset($_GET["subcategory"]) ? $_GET["subcategory"] : 1;
$FILTER_Brand = isset($_GET["brand"]) ? $_GET["brand"] : array(0);
if(in_array(0, $FILTER_Brand)){
    $FILTER_Brand = array(0);
}

?>