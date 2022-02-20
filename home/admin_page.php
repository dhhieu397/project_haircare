<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food / Resturant Website Design Tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "dbthunghiem1";

        // // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        include __DIR__."/../connections/connect.php";
        $conn = $dbc;
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql2 = "SELECT * FROM category";
        $result2 = $conn->query($sql2);

        
    ?>

    <header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-air-freshener"></i> hair </a>

    <nav class="navbar">

        <?php
            if ($result2->num_rows > 0) {
        ?>
            <?php while($row = $result2->fetch_assoc()) { ?>
                <a href="<?php echo $row["url"]; ?>"> <?php echo $row["name"]; ?> </a>                
            <?php } ?>
        <?php } ?>

    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>

    </header>
    <div class="heading">       
            <span>welcome to the admin page!</span>
            <h3>Admin:  </h3>
            <h3><a href="admin_page_product.php">products</a></h3>
            <h3><a href="admin_page_solution.php">solutions</a></h3>
            <h3><a href="admin_page_equipment.php">equipments</a></h3>                
            <h3><a href="admin_page_post.php">posts</a></h3>
    </div>
</body>
</html>