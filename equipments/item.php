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

include __DIR__ . '/../connections/connect.php';
include __DIR__ . '/../consts.php';
include_once __DIR__ . '/../model.php';

function get_item($conn, $code){
    $sql = "SELECT pi.id, pi.name, pi.description, pi.product_infomation, pi.ingredient, pi.sku,
                   pi.price, pi.real_price, pi.rate, pi.rate_number, pi.total, pi.guide,
                   pb.name as brand, pb.description as brand_detail, ps.name as size
            FROM product_item as pi
            JOIN product_brand as pb ON pi.brand = pb.id
            JOIN product_size as ps ON pi.size = ps.id
            WHERE pi.code = '".$code."'";
    // echo $sql;
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    if($row){
        $images = array();
        $sql = "SELECT img FROM product_item_image 
                WHERE product = '".$row["id"]."'";
        $result = $conn->query($sql);
        while($img = mysqli_fetch_assoc($result)){
            array_push($images, $img["img"]);
        }
        $row["images"] = $images;
    }
    return $row;
}

$SELECTED_ITEM_CODE = isset($_GET["item"])? $_GET["item"]: NULL;
if($SELECTED_ITEM_CODE){
    $row = get_item($dbc, $SELECTED_ITEM_CODE);
}else{
    $row = NULL;
}
set_selected_item($row);
?>

<?php include __DIR__."/../layout/_header.php"; ?>

<section class="page-content">
    <div class="top-nav p-2 small-text text-secondary">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="" onclick="return navigate('/')">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="" onclick="return navigate('equipments')">Equipments</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <?php
                    echo (isset($row))? $row["name"]: "NAN";
                ?>
            </li>
        </ol>
        </nav>
    </div>
</section>

<div class="container">
<?php

if(!is_null($row)){
    include __DIR__.'/../layout/components/_item.php';
}else{
    include __DIR__.'/../layout/components/_404.php';
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
