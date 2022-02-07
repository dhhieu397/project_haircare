<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="/project_haircare/" target="_blank">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="statics/css/sidebar.css" rel="stylesheet"></link>

    <title>Hair care</title>
</head>

<body>
<?php

include './filter.php';

$SHOP_NAME = "Shampoo";
?>
    <h1 class="text-center text-uppercase m-5">
        <?php echo "Shop " . $SHOP_NAME; ?>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php include "./components/_left_bar.php"; ?>    
            </div>
            <div class="col-8">
                <?php include "./components/_grid.php" ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>

<?php
    echo "var QUERY={
        category: " . (is_null($FILTER_Category)?'undefined': $FILTER_Category) .",
        subcategory: " . (is_null($FILTER_SubCategory)?'undefined': $FILTER_SubCategory) .",
        brand: [" . join(',', $FILTER_Brand) ."],
    }; console.log(QUERY);";
?>

    var doQueryProduct = function(){
        console.log(QUERY);
        var params = {
            'category': QUERY.category,
            'subcategory': QUERY.subcategory,
            'brand': QUERY.brand.join(',') || 0,
        }
        var params = new URLSearchParams(QUERY);
        window.location.href = "<?php echo $_SERVER["PHP_SELF"];?>?" + params.toString();
    }

    </script>
</body>

</html>