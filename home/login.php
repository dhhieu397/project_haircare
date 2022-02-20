<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbthunghiem1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "select * from users where username = '$u' and password = '$p'";
    
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        echo "thanh cong";
        header("Location: admin_page.php");
    } else {
        echo "that bai";
        require_once 'index.php';
    }



?>