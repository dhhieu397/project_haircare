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
    <!-- ket noi database -->

    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "haircare";

        // // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        include __DIR__."/../connections/connect.php";
        $conn = $dbc;

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);

        $sql2 = "SELECT * FROM product_item where subcategory = 1 or subcategory = 2";
        $result2 = $conn->query($sql2);

        $sql3 = "SELECT * FROM category2";
        $result3 = $conn->query($sql3);

        $sql4 = "SELECT * FROM product_item where subcategory = 5";
        $result4 = $conn->query($sql4);

        $sql5 = "SELECT * FROM product_item where subcategory = 6";
        $result5 = $conn->query($sql5);

        $sql6 = "SELECT * FROM posts";
        $result6 = $conn->query($sql6);
    ?>

    <!-- ket noi database -->

<!-- header section starts  -->



<header class="header">

    <a href="#" class="logo"> <i class="fas fa-air-freshener"></i> hair </a>
    
    <nav class="navbar">

        <?php
            if ($result->num_rows > 0) {
        ?>
            <?php while($row = $result->fetch_assoc()) { ?>
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

<!-- header section ends  -->

<!-- search-form  -->

<section class="search-form-container">

    <form action="">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

</section>

<!-- shopping-cart section  -->

<section class="shopping-cart-container">

    <div class="products-container">

        <h3 class="title">your products</h3>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-times"></i>
                <img src="image/menu-1.png" alt="">
                <div class="content">
                    <h3>delicious food</h3>
                    <span> quantity : </span>
                    <input type="number" name="" value="1" id="">
                    <br>
                    <span> price : </span>
                    <span class="price"> $40.00 </span>
                </div>
            </div>

        </div>

    </div>

    <div class="cart-total">

        <h3 class="title"> cart total </h3>

        <div class="box">

            <h3 class="subtotal"> subtotal : <span>$200</span> </h3>
            <h3 class="total"> total : <span>$200</span> </h3>

            <a href="#" class="btn">proceed to checkout</a>

        </div>

    </div>

</section>

<!-- login-form  -->

<div class="login-form-container">

    <form action="login.php" method="POST">
        <h3>login form</h3>
        <input type="email" name="username" placeholder="enter your email" id="" class="box">
        <input type="password" name="password" placeholder="enter your password" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have an account? <a href="#">create one</a></p>
    </form>

</div>

<!-- home section starts  -->

<section class="banner2" >

    <div class="row-banner2">
        <div class="content2">
            <!-- <span>double cheese</span> -->
            <h3>new year <br> new colour <br> new kit</h3>
            <p>To kick off the new year <br> Hair has new products <br> and special offers available <br> so you can get that ‘new kit, new me’ feeling.</p>
            <!-- <a href="#" class="btn">order now</a> -->
        </div>
    </div>

</section>

<!-- home section ends  -->

<!-- category section starts  -->

<section class="category">

    <?php
        if ($result3->num_rows > 0) {
    ?>
        <?php while($row = $result3->fetch_assoc()) { ?>
            <a href="<?php echo $row["url"]; ?>" class="box">
                <img src="<?php echo $row["img"]; ?>" alt="">
                <h3><?php echo $row["name"]; ?></h3>
            </a>
        <?php } ?>
    <?php } ?>

</section>

<!-- category section ends -->


<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="image/8.PNG" alt="">
    </div>

    <div class="content">
        <span>SHOP WITH US</span>
        <h3 class="title">why choose us ?</h3>
        <p>Hair is a one-stop-shop for all the needs of haircare professionals – from products that make your clients look amazing, to the retail brands they will love to take home.</p>
        <!-- <a href="#" class="btn">read more</a> -->
        <div class="icons-container">
            <div class="icons">
                <img src="image/serv-3.png" alt="">
                <h3>best quality</h3>
            </div>  
            <div class="icons">
                <img src="image/serv-4.png" alt="">
                <h3>24/7 support</h3>
            </div>           
        </div>
    </div>

</section>

<!-- about section ends -->

<!-- popular section starts  -->

<section class="popular" id="popular">

    <div class="heading">
        <span>popular products</span>
        <h3>our special products</h3>
    </div>

    <div class="box-container">

        <?php
            if ($result2->num_rows > 0) {
        ?>
            <?php while($row = $result2->fetch_assoc()) { ?>
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <div class="image">
                    <a href="/project_haircare/products/item.php?item=<?php echo $row["code"] ?>"> <img src="/project_haircare/content/img/<?php echo $row["img"]; ?>" alt=""> </a>
                    </div>
                    <div class="content">
                        <h3><?php echo $row["name"]; ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span> (50) </span>
                        </div>
                        <div class="price">$<?php echo $row["price"]; ?></div>
                        
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

</section>

<!-- popular section ends -->

<!-- banner section starts  -->
<section class="popular" id="popular">

    <div class="heading">
        <span>popular treatments</span>
        <h3>our special treatments</h3>
    </div>

    <div class="box-container">

        <?php
            if ($result4->num_rows > 0) {
        ?>
            <?php while($row = $result4->fetch_assoc()) { ?>
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <div class="image">
                        <a href="/project_haircare/treatments/item.php?item=<?php echo $row["code"] ?>"> <img src="/project_haircare/content/img/<?php echo $row["img"]; ?>" alt=""> </a>
                    </div>
                    <div class="content">
                        <h3><?php echo $row["name"]; ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span> (50) </span>
                        </div>
                        <div class="price">$<?php echo $row["price"]; ?></div>
                        
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

</section>
<!-- banner section ends -->

<!-- menu section starts  -->

<section class="popular" id="popular">

    <div class="heading">
        <span>popular equipments</span>
        <h3>our special equipments</h3>
    </div>

    <div class="box-container">

        <?php
            if ($result5->num_rows > 0) {
        ?>
            <?php while($row = $result5->fetch_assoc()) { ?>
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <div class="image">
                        <a href="/project_haircare/equipments/item.php?item=<?php echo $row["code"] ?>"> <img src="/project_haircare/content/img/<?php echo $row["img"]; ?>" alt=""> </a>
                    </div>
                    <div class="content">
                        <h3><?php echo $row["name"]; ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span> (50) </span>
                        </div>
                        <div class="price">$<?php echo $row["price"]; ?></div>
                        
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

</section>

<!-- menu section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <div class="heading">
        <span>our blogs</span>
        <h3>LATEST POSTS FROM THE HUB</h3>
    </div>

    <div class="box-container">

        <?php
            if ($result6->num_rows > 0) {
        ?>
            <?php while($row = $result6->fetch_assoc()) { ?>
                <div class="box">
                    <div class="image">
                        <h3> <i class="fas fa-calendar"></i> <?php echo $row["date"]; ?> </h3>
                        <img src="image/<?php echo $row["img"]; ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row["title"]; ?></h3>
                        <p><?php echo $row["content"]; ?></p>
                        <a href="<?php echo $row["url"]; ?>" class="btn">read more</a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

</section>

<script src="js/script.js"></script>

</body>
</html>