<?php
include_once __DIR__ . '/../../model.php';
include_once __DIR__ . '/../../consts.php';

$row = $SELECTED_ITEM;

function format_star($rate, $star){
    if($rate<$star+0.5){
        return 'fa-star-o-alt';
    }
    if($rate<$star+1){
        return 'fa-star-half-alt';
    }
    return 'fa-star';
}

?>
<div class="row product-item__container">
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
            <div class="info text-secondary small-text">
                <span><?php echo $row["size"]; ?></span>
                <span>SKU: <?php echo $row["sku"]; ?></span>
            </div>
            <div class="product-item__title">
                <?php 
                    echo '<div class="stars">
                            <i class="fas '.format_star((float)$row["rate"], 0).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 1).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 2).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 3).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 4).'"></i>
                        <span> ('.$row["rate_number"].') </span>
                        <div class="price">$'.$row["price"].' <span>$'.$row["real_price"].'</span></div>
                        <span class="sold-out item" style="'.($row["total"]<=0?'':'display:none').'">Sold out</span>
                        </div>';
                ?>
            </div>
            <div class="description pt-4">
                <?php echo $row["description"]; ?>
            </div>
            <div class="product-info mt-5">
                <h3>PRODUCT INFORMATION</h3>
                <?php echo $row["product_infomation"]; ?>
                <div class="brand-detail">
                    <h3><?php echo $row["brand"] ?></h3>
                    <?php echo $row["brand_detail"]; ?>
                </div>
            </div>
            <div class="ingredients mt-5">
                <h3>INGREDIENTS</h3>
                <?php echo $row["ingredient"]; ?>
            </div>
            
        </div>
    </div>
    <div class="col-12 guide" style="<?php echo (isset($row["guide"])&&$row["guide"])?'':'display:none'; ?>">
        <h3>How to use</h3>
        <p>
            <?php echo $row["guide"] ?>
        </p>
    </div>
</div>