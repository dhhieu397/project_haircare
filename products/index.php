<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="/project_haircare/" target="_blank">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/style.css" rel="stylesheet"></link>
    <link href="css/sidebar.css" rel="stylesheet"></link>
    <link href="css/main.css" rel="stylesheet"></link>

    <title>Hair care</title>
</head> 

<body>
    <?php
        // use global model to populate all query parameters sent from browser
        include __DIR__."/../model.php";
        // Set type of product items to "product", that show only products in page.
        set_selected_type($TYPES->PRODUCT);
    ?>
    <?php include __DIR__."/../layout/_header.php"; ?>

    <section class="banner2" >

        <div class="row-banner2 banner-product">
            <div class="content2">
                <h3>SHOP <br> Products</h3>
                <p>Explore our range of <br>professional hair care products<br> formulated for all hair types.</p>
                <a href="" onclick="return navigate('products#product-content')" class="btn">Our products</a>
            </div>
        </div>

    </section>

    <section id="product-content" class="page-content">
        <div class="row mt-3">
            <div class="col-xs-4 col-md-3 col-2">
                <!-- Left-filter bar -->
                <?php include __DIR__."/../layout/components/_left_bar.php"; ?>    
            </div>
            <div class="col-xs-8 col-md-9 col-10">
                <!-- Table of items -->
                <?php include __DIR__."/../layout/components/_grid.php" ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script>
        <?php
        // Populate query parameters to browser side.
            echo "var QUERY={
                category: " . (is_null($FILTER_Category)?'undefined': $FILTER_Category) .",
                subcategory: " . (is_null($FILTER_SubCategory)?'undefined': $FILTER_SubCategory) .",
                brand: [" . join(',', $FILTER_Brand) ."],
                sort: '" . (is_null($FILTER_Sort)?'undefined': $FILTER_Sort) ."',
                page: '" . (is_null($FILTER_page_number)?0: $FILTER_page_number) ."',
            }; \n
            console.log(QUERY);\n
            var CURRENT_URL='".$_SERVER['PHP_SELF']."';\n";
        ?>

    </script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
</body>

</html>