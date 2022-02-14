<?php
include __DIR__ . '/../../connections/connect.php';
include_once __DIR__ . '/../../model.php';
include __DIR__ . '/../../consts.php';


function query_items($conn){
    global $SELECTED_TYPE;
    global $SORTS;
    global $FILTER_page_size;
    global $FILTER_page_number;
    global $FILTER_Sort;
    global $FILTER_Category;
    global $FILTER_SubCategory;
    global $FILTER_Brand;

    $sql = "SELECT pi.name as name, pi.img as img, pi.code as code, 
                   pi.price, pi.real_price, pi.rate, pi.rate_number, pi.total,
                   pb.name as brand, ps.name as size
        FROM product_item as pi
        JOIN `product_subcategory` psc ON psc.id = pi.subcategory
        JOIN `product_category` pc ON pc.id = psc.parent
        JOIN product_brand as pb ON pb.id = pi.brand
        JOIN product_size as ps ON ps.id = pi.size";

    #build filter
    $filter = array();
    if(isset($SELECTED_TYPE)){
        array_push($filter, "pc.type='".$SELECTED_TYPE."'");
    }
    if(is_null($FILTER_SubCategory) && isset($FILTER_Category)){
        // $sql .= " JOIN product_subcategory as psc
        //         ON pi.subcategory = psc.id
        //         ";
        array_push($filter, "psc.parent = '".$FILTER_Category."'");
    }
    if(isset($FILTER_SubCategory)){
        array_push($filter, "pi.subcategory = '".$FILTER_SubCategory."'");
    }
    if(isset($FILTER_Brand) && !empty($FILTER_Brand) && !in_array('0', $FILTER_Brand)){
        $or_q = array();
        foreach($FILTER_Brand as $fb){
            array_push($or_q, "pi.brand = '".$fb."'");
        }
        array_push($filter, "(".join(' OR ', $or_q).")");
    }
    if(!empty($filter)){
        $sql .= " WHERE ".join(' AND ', $filter);
    }

    # build sort
    $sort = NULL;
    if(isset($FILTER_Sort) && $FILTER_Sort == $SORTS->LATEST){
        $sort = "pi.creation_date DESC";
    }else if (isset($FILTER_Sort) && $FILTER_Sort == $SORTS->NAME_ASC){
        $sort = "pi.name ASC";
    }else if (isset($FILTER_Sort) && $FILTER_Sort == $SORTS->NAME_DESC){
        $sort = "pi.name DESC";
    }
    // echo $sql;

    $ls = array();
    $result = $conn->query($sql);
    $total = mysqli_num_rows($result);
    if($total > 0){
        $sql .= " LIMIT ".$FILTER_page_size." OFFSET ".($FILTER_page_size*$FILTER_page_number);
        if($sort){
            $sql .= " SORT ".$sort;
        }
        // echo $sql;
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()){
            array_push($ls, $row);
        }
    }
    return array("rows"=> $ls, "total"=> $total);
}

$result = query_items($dbc);
$items = $result["rows"];
$total_items = $result["total"];

# set total page count
if($total_items == 0){
    set_page_count(0);
}else{
    set_page_count(intdiv($total_items, $FILTER_page_size) + 1);
}

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
<div class="products-table">
    <div class="table-top clearfix">
        <div class="number-of-items float-start text-secondary small-text"
            style="padding-top: 40px">
            <!-- 1-18 of 228 items -->
            <?php
                echo (($total_items>0)?$FILTER_page_number*$FILTER_page_size+1:0)
                    ."-"
                    .min($total_items, ($FILTER_page_number+1)*$FILTER_page_size+1)
                    ." of "
                    .$total_items
                    .($total_items > 1?" items":" item");
            ?>
        </div>

        <div class="float-end">
            <?php include __DIR__ . '/_sort.php'; ?>
        </div>
    </div>
<div class="table-content p-3 row">
<?php
    if($total_items == 0){
        echo "<span class='text-secondary'>No data</span>";
    }
    foreach($items as $item){
        echo '
            <div class="col-xs-12 col-md-6 col-lg-4 table-items product-item__container">
                <h3 class="product-item__title box">
                    <a href="" onclick="return false;" class="fas fa-heart" style="display: none"></a>
                    <a class="no-decoration w-100 d-block" href="" onclick="return onClickItem(\''.$item["code"].'\')">
                        <span class="sold-out" style="'.($item["total"]<=0?'':'display:none').'">Sold out</span>
                        <span class="product-item__thumbnail d-block">
                            <img class="center" src="'.$IMAGE_ROOT.$item["img"].'" alt="" width="246px" height="246px">
                        </span>
                        <span class="product-item__brands p-1">
                            '.$item["brand"].'
                        </span>
                        <span class="product-item__name p-1">
                            '.$item["name"].' ('.$item["size"].')
                        </span>
                    </a>
                    <span class="product-item__info p-1 text-secondary small-text">
                    </span>
                    <div class="stars">
                        <i class="fas '.format_star((float)$item["rate"], 0).'"></i>
                        <i class="fas '.format_star((float)$item["rate"], 1).'"></i>
                        <i class="fas '.format_star((float)$item["rate"], 2).'"></i>
                        <i class="fas '.format_star((float)$item["rate"], 3).'"></i>
                        <i class="fas '.format_star((float)$item["rate"], 4).'"></i>
                    <span> ('.$item["rate_number"].') </span>
                    <div class="price">$'.$item["price"].' <span>$'.$item["real_price"].'</span></div>
                </div>
                </h3>
            </div>
            ';
    }
?>
        <!-- <div class="col-4 table-items product-item__container">
            <h3 class="product-item__title">
                <a href="">
                    <span class="product-item__thumbnail">
                        <img src="" alt="" width="100%" height="200px">
                    </span>
                    <span class="product-item__brands">
                        olaplex
                    </span>
                    <span class="product-item__name">
                        No.4-P
                    </span>
                </a>
                <span class="product-item__info"></span>
            </h3>
        </div> -->
    </div>

    <div>
        <?php include __DIR__ . '/_paginate.php'; ?>
    </div>
</div>