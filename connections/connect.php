<?php
// ** Database connection config
$servername = "localhost";
$username = "root";
$password = "";
$database = "haircare";
// ** End database connection


// ** Create connection to DB
// $dbc is connection object
// open connection to mysql server:
$dbc = mysqli_connect($servername, $username, $password);
if (!$dbc)
{
	die('Not connected: '.mysqli_connect_error());
}
else{
	// echo "connected\n";
}
// select database:
$db_selected = mysqli_select_db($dbc, $database);
if(!$db_selected){
    // Create database
    $sql = "CREATE DATABASE ".$database;
    if($dbc->query($sql) === True){
        // echo "Database created successfully\n";
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
	// echo "Database Selected\n";
}
// ** 
?>