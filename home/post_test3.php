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
        <span>6 Huge Haircare Trends for 2021</span>
        <h3 class="title">Overview</h3>
        <p>This year marked unusual haircare habits for many consumers. With salons and barbershops closed, consumers attempted at-home coloring, haircuts, and treatments, many for the first time ever.</p>
        <p>Moving into 2021, consumers are ready to continue to flex their at-home hairstyling skills, while also embracing innovative formulations, ingredients, and treatments.</p>
        <p>Check out the 6 huge trends experts predict will shape and style the haircare market in 2021.</p>
    </div>

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">Scalpcare goes mainstream</h3>
        <p>In 2021, expect the “skinification of haircare” to surge ahead and make scalpcare mainstream for more consumers.</p>
        <p>“Partly because of COVID, people are more interested in their scalp health and body skin,” consultant dermatologist Dr Anjali Mahto told Refinery29. “We know about free radical damage to the skin (for example, how UV and pollution can make skin dull and cause damage) but these things also damage the skin of the scalp and there will be an interest in maintaining scalp health.”</p>
        <p>Scalpcare is important for healthy hair for a variety of reasons. To start, a healthy scalp can improve hair growth. Additionally, scalp health can help control issues like dandruff, redness, and itchiness.</p>
        <p>In 2021, scalpcare products are predicted to expand beyond remedying issues like dandruff, and into areas like anti-aging.</p>
        
    </div>

    

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">More solutions for hair thinning</h3>
        <p>“Whether it’s seasonal, stress-related, or it’s one of the residual effects of  COVID-19 infection (which some doctors believe could be due to the stress of actually having it), folks have been noticing a lot of hair loss lately. And brands are happy to step up by providing products you can use at home to combat it,” explains Allure.</p>
        <p>Formulations that address hair loss or thinning in 2021 could focus on trending ingredients, like peptides to stimulate collagen and topical minoxidil. Additionally, natural oils will be a popular addition to products designed to provide hair cuticle and strand nourishment.</p>
    </div>

    <!-- <div class="image">
        <img src="image/peach2.jpg" alt="">
    </div> -->
</section>

<section class="about" id="about">

<!-- <div class="image">
        <img src="image/tea.jfif" alt="">
    </div> -->

    <div class="content">
        
        <h3 class="title">Consumers crave low maintenance looks</h3>
        <p>After a long and stressful year, consumers are on the lookout for products to maintain more low maintenance hair styles.</p>
        <p>“This has been an exhausting and emotional year for everyone; it has been hard to get into the salon and many people are steering toward a low-maintenance direction,” celebrity hairstylist Bianca Hillier told PureWow.”</p>
        <p>Experts predict consumers will continue to seek out styles and cuts that allow their natural hair texture to shine through in 2021.</p>
        <p>“Low-maintenance is the new high heat, or at least according to Pinterest’s 2021 Trends Predictions report. Don’t be afraid to give your strands a break by air-drying and embracing your natural texture,” explains Real Simple.</p>
        <p>For formulators, this low-key trend will be emphasized by consumers seeking out products that work with, not against hair types.</p>
    </div>

    
</section>

<section class="about" id="about">



    <div class="content">
        
        <h3 class="title">Trending natural formulations</h3>
        <p>Another big trend poised to impact haircare in 2021 is a heightened consumer demand for natural and plant-based products. More specifically, consumers will be on the hunt for plant-based shampoos.</p>
        <p>According to new data from Spate, there are 840 searches for plant-based shampoo in the U.S. every month and interest in plant-based shampoo has grown by 31.1% since last year.</p>
        <p>Additionally, consumers are showing increased interest in vegan and silicone-free shampoos.</p>
        <p>“Consumers are looking for natural and clean beauty products. This will mean something different to each shopper, from using naturally occurring ingredients, eliminating harmful ones, or not testing products on animals,” Tiffany Hogan, principal analyst at Kantar, Columbus, Ohio told Happi.</p>
        <p>Bottom line? Natural, vegan, and plant-based haircare formulations will skyrocket in popularity next year, as consumers seek out the niche, eco-friendly claims that matter most to them.</p>
    </div>

    <!-- <div class="image">
        <img src="image/lemon.jfif" alt="">
    </div> -->
</section>

<section class="about" id="about">

<!-- <div class="image">
        <img src="image/codde.jfif" alt="">
    </div> -->

    <div class="content">
        
        <h3 class="title">Color protection at home</h3>
        <p>With the coronavirus shuttering salons and spas this year, many consumers took their first foray into at-home hair color.</p>
        <p>In 2021, experts anticipate consumers will continue to purchase affordable, easy-to-use at-home coloring products.</p>
        <p>“With salons continuing to open and close based on local COVID restrictions, getting a touch-up on your dye job will depend on what the case and hospitalization numbers look like in your area. With this in mind, brands are turning out a number of color-care and maintenance products that are user-friendly and affordable,” explains Yahoo Finance.</p>
        <p>In addition to seeking out at-home coloring products, expect consumers to become more concerned about maintaining and protecting their hair color at home in the new year.</p>
    </div>

    
</section>

<section class="about" id="about">



    <div class="content">
        
        <h3 class="title">Hair masks for all issues</h3>
        <p>Finally, consumers are projected to love intensive at-home treatments and masks in 2021, including masks for hair. The global hair mask market is projected to reach $261.8 million USD by 2026, at a CAGR of 5.5% between 2021-2026.</p>
        <p>“Whether your curls are feeling dry or your highlights are looking a little dull, a hair mask can very well be the solution — they restore moisture and softness and even brightness to your locks, often in a matter of minutes,” says the Strategist.</p>
        <p>In 2021, consumers will expand beyond moisturizing masks, and incorporate hair masks that tackle a variety of claims into their weekly haircare routines.</p>
        <p>Hot haircare masks in 2021 are likely to include:</p>
        <p>- Protein treatments</p>
        <p>- Exfoliating masks </p>
        <p>- Clarifying masks </p>
        <p>- Dry hair treatments</p>
        <p>- Masks for protecting color-treated hair</p>
    </div>

    <!-- <div class="image">
        <img src="image/oil.jpg" alt="">
    </div> -->
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