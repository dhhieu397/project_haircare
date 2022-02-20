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

    <div class="image">
        <img src="image/treating_hair_loss.jpg" alt="">
    </div>

    <div class="content">
        <span>Hair loss</span>
        <h3 class="title">Overview</h3>
        <p>Hair loss (alopecia) can affect just your scalp or your entire body, and it can be temporary or permanent. It can be the result of heredity, hormonal changes, medical conditions or a normal part of aging. Anyone can lose hair on their head, but it's more common in men.

Baldness typically refers to excessive hair loss from your scalp. Hereditary hair loss with age is the most common cause of baldness. Some people prefer to let their hair loss run its course untreated and unhidden. Others may cover it up with hairstyles, makeup, hats or scarves. And still others choose one of the treatments available to prevent further hair loss or restore growth.

Before pursuing hair loss treatment, talk with your doctor about the cause of your hair loss and treatment options.</p>
        
    </div>

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">Symptoms</h3>
        <p>Hair loss can appear in many different ways, depending on what's causing it. It can come on suddenly or gradually and affect just your scalp or your whole body.</p>
        <p>Signs and symptoms of hair loss may include:</p>
        <p>- Gradual thinning on top of head. This is the most common type of hair loss, affecting people as they age. In men, hair often begins to recede at the hairline on the forehead. Women typically have a broadening of the part in their hair. An increasingly common hair loss pattern in older women is a receding hairline (frontal fibrosing alopecia).</p>
        <p>- Circular or patchy bald spots. Some people lose hair in circular or patchy bald spots on the scalp, beard or eyebrows. Your skin may become itchy or painful before the hair falls out.</p>
        <p>- Sudden loosening of hair. A physical or emotional shock can cause hair to loosen. Handfuls of hair may come out when combing or washing your hair or even after gentle tugging. This type of hair loss usually causes overall hair thinning but is temporary.</p>
        <p>- Full-body hair loss. Some conditions and medical treatments, such as chemotherapy for cancer, can result in the loss of hair all over your body. The hair usually grows back.</p>
        <p>- Patches of scaling that spread over the scalp. This is a sign of ringworm. It may be accompanied by broken hair, redness, swelling and, at times, oozing.</p>

        
    </div>

    <div class="image">
        <img src="image/hair_loss3.jpg" alt="">
    </div>

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">When to see a doctor</h3>
        <p>See your doctor if you are distressed by persistent hair loss in you or your child and want to pursue treatment. For women who are experiencing a receding hairline (frontal fibrosing alopecia), talk with your doctor about early treatment to avoid significant permanent baldness.</p>
        <p>Also talk to your doctor if you notice sudden or patchy hair loss or more than usual hair loss when combing or washing your or your child's hair. Sudden hair loss can signal an underlying medical condition that requires treatment.</p>
    </div>

</section>

<section class="about" id="about">

    

    <div class="content">
        
        <h3 class="title">Prevention</h3>
        <p>Most baldness is caused by genetics (male-pattern baldness and female-pattern baldness). This type of hair loss is not preventable.</p>
        <p>These tips may help you avoid preventable types of hair loss:</p>
        <p>- Be gentle with your hair. Use a detangler and avoid tugging when brushing and combing, especially when your hair is wet. A wide-toothed comb might help prevent pulling out hair. Avoid harsh treatments such as hot rollers, curling irons, hot-oil treatments and permanents. Limit the tension on hair from styles that use rubber bands, barrettes and braids.</p>
        <p>- Ask your doctor about medications and supplements you take that might cause hair loss.</p>
        <p>- Protect your hair from sunlight and other sources of ultraviolet light.</p>
        <p>- Stop smoking. Some studies show an association between smoking and baldness in men.</p>
        <p>- If you're being treated with chemotherapy, ask your doctor about a cooling cap. This cap can reduce your risk of losing hair during chemotherapy.</p>
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