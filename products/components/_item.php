<?php
include_once __DIR__ . '/../model.php';
include_once __DIR__ . '/../consts.php';

$row = $SELECTED_ITEM;
?>
<div class="row">
    <div class="col-6">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
            </div>
            <div class="carousel-inner">
                <?php
                    if(isset($row["images"])){
                        $index = 0;
                        foreach($row["images"] as $img){
                            echo '<div class="carousel-item '.($index==0?'active':'').'">
                                <img src="'.$IMAGE_ROOT.$img.'" class="d-block w-100" alt="">
                            </div>';
                            $index ++;
                        }
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-6">
        <div class="product-info">
            <div class="brand">
                <?php echo $row["brand"]; ?>
            </div>
            <div class="name">
                <?php echo $row["name"]; ?>
            </div>
            <div class="info">
                <span><?php echo $row["size"]; ?></span>
                <span>SKU: <?php echo $row["sku"]; ?></span>
            </div>
            <div class="description">
                <?php echo $row["description"]; ?>
            </div>
            <div class="product-info">
                <?php echo $row["product_infomation"]; ?>
                <div class="brand-detail">
                    <?php echo $row["brand_detail"]; ?>
                </div>
            </div>
            <div class="ingredients">
                <?php echo $row["ingredient"]; ?>
            </div>
            
        </div>
    </div>
</div>