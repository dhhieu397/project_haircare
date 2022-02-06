<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "haircare";

$product_brand_table = "product_brand";
$product_category_table = "product_category";
$product_subcategory_table = "product_subcategory";
$product_item_table = "product_item";

// open connection to mysql server:
$dbc = mysqli_connect($servername, $username, $password);
if (!$dbc)
{
	die('Not connected: '.mysqli_connect_error());
}
else{
	echo "connected\n";
}
// select database:
$db_selected = mysqli_select_db($dbc, $database);
if(!$db_selected){
    // Create database
    $sql = "CREATE DATABASE ".$database;
    if($dbc->query($sql) === True){
        echo "Database created successfully\n";
    } else {
        die('Cant create database ' . $dbc->error);
    }
    $db_selected = mysqli_select_db($dbc, $database);
}

if (!$db_selected)
{
	die('Cant connect: '.mysqli_connect_error());
} else
{
	echo "Database Selected\n";
}
?>