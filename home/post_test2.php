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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "haircare";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);

        $sql4 = "SELECT * FROM product_item where subcategory = 5";
        $result4 = $conn->query($sql4);

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

<section class="about" id="about">

    

    <div class="content">
        <span>5 home remedies to get rid of grey hair naturally</span>
        <h3 class="title">Overview</h3>
        <p>Premature greying is one of the maladies of modern lifestyle. Those dreaded streaks of silver and white pop up even when you are in your 20s. And, the only option you are left with is to look for foolproof home remedies to turn your grey hair into black. They may say that greying is a sign of wisdom and maturity, but it also tells you that your body is not producing enough melamine, which is an early sign of aging.</p>
        <p>The first step is to learn to eat right. Yes! It does make a difference. Lots of greens, a beet a day, fresh fruits and veggies and lots of yogurts are what you must eat regularly. Such a diet will not only make your skin smooth and soft but will also result in lustrous long hair.</p>
        <p>As far as greying of hair goes, don't open those harmful chemical bottles so soon. Help is right in your kitchen. Yes, it is possible to get rid of grey hair naturally. Instead of going through several chemical treatments to turn your grey hair into black, we suggest you make use of natural remedies for grey hair to get rid of those pesky greys.  But before we dive into the DIY recipes, let’s first debunk the biggest grey hair myths for you.</p>
    </div>

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">Home remedies for grey hair</h3>
        <p>Now let’s give you some easy-peasy home remedies to turn grey hair into black. Here are the top 8 home remedies to get rid of grey hair naturally.</p>
        
        
    </div>

    

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">1. Amla and methi seeds</h3>
        <p>Add 6-7 pieces to 3 tbsp of an oil of your choice (coconut, olive, almond) and boil for a few minutes. Add 1 tbsp of fenugreek powder. Cool, strain and apply generously all over the scalp at night. Use a mild herbal shampoo to wash off in the morning.</p>
        <p>Amla and methi together make for one of the best natural remedies for grey hair. Indian gooseberry or Amla is a rich source of Vitamin C and has been used in Ayurveda for all kinds of hair problems. Fenugreek or Methi seeds are full of several nutrients and the combination of these super ingredients not only prevents premature greying but also promotes hair growth.</p>
    </div>

    <div class="image">
        <img src="image/peach2.jpg" alt="">
    </div>
</section>

<section class="about" id="about">

<div class="image">
        <img src="image/tea.jfif" alt="">
    </div>

    <div class="content">
        
        <h3 class="title">2. Black tea rinse</h3>
        <p>Boil a cup of water with 2 tbsps of black tea and a tsp of salt. Cool and apply generously on freshly washed hair. Allow drying. Repeat regularly to darken grey strands.</p>
        <p>Black Tea has caffeine which is loaded with anti-oxidants. While adding a natural dark hue to the hair, stimulates hair growth and strengthens it giving it a shine. Treating your hair to a black tea rinse will not only help you get rid of grey hair naturally but also leave your hair looking shinier than before. Win-win!</p>
    </div>

    
</section>

<section class="about" id="about">



    <div class="content">
        
        <h3 class="title">3. Almond oil and lemon juice</h3>
        <p>Mix almond oil and lemon juice in the ration of 2:3. Massage well in the scalp and hair. Wash off after 30 minutes.</p>
        <p>Almond oil has Vitamin E which is extremely beneficial for hair. It nourishes the roots and prevents premature greying. Lemon juice not only adds gloss and volume to hair but also promotes healthy hair growth. Almond oil and lemon juice are both easily-available ingredients than can help you get rid of grey hair naturally.</p>
    </div>

    <div class="image">
        <img src="image/lemon.jfif" alt="">
    </div>
</section>

<section class="about" id="about">

<div class="image">
        <img src="image/codde.jfif" alt="">
    </div>

    <div class="content">
        
        <h3 class="title">4. Henna and coffee</h3>
        <p>Add 1 tbsp of coffee powder to boiling hot water. Cool and make a paste with henna powder. Let it rest covered for a few hours. Mix in 1 tbsp of any oil of your choice and apply liberally covering the hair completely. Wash off after an hour.</p>
        <p>Henna is a natural conditioner and a colorant and when combined with coffee, it gives excellent results. Henna is in fact an age-old home remedy to turn grey hair into black.</p>
    </div>

    
</section>

<section class="about" id="about">



    <div class="content">
        
        <h3 class="title">5. Curry leaves and oil</h3>
        <p>Boil a cupful of curry leaves in a cup of oil till they turn black. Cool, strain and store. Massage into hair 2-3 times a week. Leave overnight.</p>
        <p>Curry leaves are full of Vitamin B and help to restore the pigment melamine in the hair follicles and prevent further greying. It is a rich source of Beta-Keratin and also prevents hair fall. This home remedy does more than just prevent pesky greys.</p>
    </div>

    <div class="image">
        <img src="image/oil.jpg" alt="">
    </div>
</section>

<section class="popular" id="popular">

    <div class="heading">
        <span>some product for you</span>
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

<script src="js/script.js"></script>

</body>
</html>