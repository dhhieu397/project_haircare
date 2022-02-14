<?php

include __DIR__ . '/../../connections/connect.php';
include __DIR__ . '/../../consts.php';
include_once __DIR__ . '/../../model.php';

function format_star($rate, $star){
    if($rate<$star+0.5){
        return 'fa-star-o-alt';
    }
    if($rate<$star+1){
        return 'fa-star-half-alt';
    }
    return 'fa-star';
}

function get_item($conn, $code){
    $sql = "SELECT pi.id, pi.name, pi.description, pi.product_infomation, pi.ingredient, pi.sku, pi.img,
                   pi.price, pi.real_price, pi.rate, pi.rate_number, pi.total, pi.guide, pi.subcategory,
                   pb.name as brand, pb.description as brand_detail, ps.name as size
            FROM product_item as pi
            JOIN product_brand as pb ON pi.brand = pb.id
            JOIN product_size as ps ON pi.size = ps.id
            WHERE pi.code = '".$code."'";
    // echo $sql;
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    return $row;
}

$SELECTED_ITEM_CODE = isset($_GET["item"])? $_GET["item"]: NULL;
$SELECTED_ITEM_CODE_COMPARE = isset($_GET["item_compare"])? $_GET["item_compare"]: NULL;

if($SELECTED_ITEM_CODE && $SELECTED_ITEM_CODE_COMPARE){
    $row = get_item($dbc, $SELECTED_ITEM_CODE);
    $row_compare = get_item($dbc, $SELECTED_ITEM_CODE_COMPARE);
}else{
    $row = NULL;
    $row_compare = NULL;
}

$IS_NAN = (!$row || !$row_compare);
?>

<div class="compare-item__container">
    <div class="message" style="<?php echo $IS_NAN?'':'display:none'?>">
        Not found
    </div>

    <div class="product-item__title" style="<?php echo ($IS_NAN)?'display:none': ''?>">
        <table>
            <tr>
                <td>

                </td>
                <td>
                    <?php echo '<img class="center" src="'.$IMAGE_ROOT.$row["img"].'" alt="" width="246px" height="246px">';?>
                </td>
                <td>
                    <?php echo '<img class="center" src="'.$IMAGE_ROOT.$row_compare["img"].'" alt="" width="246px" height="246px">';?>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <?php echo $row["name"]; ?>
                </td>
                <td>
                    <?php echo $row_compare["name"]; ?>
                </td>
            </tr>
            <tr class="brand">
                <td>
                    Brand
                </td>
                <td><?php echo $row["brand"]?></td>
                <td><?php echo $row_compare["brand"]?></td>
            </tr>
            <tr>
                <td>
                    Price
                </td>
                <td><?php echo '<div class="price">$'.$row["price"].' <span>$'.$row["real_price"].'</span></div>'; ?></td>
                <td><?php echo '<div class="price">$'.$row_compare["price"].' <span>$'.$row_compare["real_price"].'</span></div>'; ?></td>
            </tr>
            <tr>
                <td>
                    Rating
                </td>
                <td>
                    <?php echo '<div class="stars">
                            <i class="fas '.format_star((float)$row["rate"], 0).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 1).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 2).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 3).'"></i>
                            <i class="fas '.format_star((float)$row["rate"], 4).'"></i>
                            <span> ('.$row["rate_number"].') </span>
                        </div>';
                    ?>
                </td>
                <td>
                    <?php echo '<div class="stars">
                            <i class="fas '.format_star((float)$row_compare["rate"], 0).'"></i>
                            <i class="fas '.format_star((float)$row_compare["rate"], 1).'"></i>
                            <i class="fas '.format_star((float)$row_compare["rate"], 2).'"></i>
                            <i class="fas '.format_star((float)$row_compare["rate"], 3).'"></i>
                            <i class="fas '.format_star((float)$row_compare["rate"], 4).'"></i>
                            <span> ('.$row_compare["rate_number"].') </span>
                        </div>';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Infomation
                </td>
                <td><?php echo $row["product_infomation"]; ?></td>
                <td><?php echo $row_compare["product_infomation"]; ?></td>
            </tr>
            <tr>
                <td>
                    Ingredients
                </td>
                <td><?php echo $row["ingredient"]; ?></td>
                <td><?php echo $row_compare["ingredient"]; ?></td>
            </tr>
        </table>
    </div>
</div>

