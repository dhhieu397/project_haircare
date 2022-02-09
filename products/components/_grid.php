<?php
include __DIR__ . '/../../connections/connect.php';
include_once __DIR__ . '/../model.php';
include __DIR__ . '/../consts.php';


function query_items($conn){
    global $SORT_REL, $SORT_LATEST, $SORT_NAME_ASC, $SORT_NAME_DESC;
    global $FILTER_page_size;
    global $FILTER_page_number;
    global $FILTER_Sort;
    global $FILTER_Category;
    global $FILTER_SubCategory;
    global $FILTER_Brand;

    $sql = "SELECT pi.name as name, pi.img as img, pi.code as code, pb.name as brand, ps.name as size
        FROM product_item as pi
        JOIN product_brand as pb
        ON pb.id = pi.brand
        JOIN product_size as ps
        ON ps.id = pi.size";

    #build filter
    $filter = array();
    if(is_null($FILTER_SubCategory) && isset($FILTER_Category)){
        $sql .= " JOIN product_subcategory as psc
                ON pi.subcategory = psc.id
                ";
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
    if(isset($FILTER_Sort) && $FILTER_Sort == $SORT_LATEST){
        $sort = "pi.creation_date DESC";
    }else if (isset($FILTER_Sort) && $FILTER_Sort == $SORT_NAME_ASC){
        $sort = "pi.name ASC";
    }else if (isset($FILTER_Sort) && $FILTER_Sort == $SORT_NAME_DESC){
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
                <h3 class="product-item__title">
                    <a class="no-decoration w-100 d-block" href="" onclick="return onClickItem(\''.$item["code"].'\')">
                        <span class="product-item__thumbnail d-block">
                            <img class="center" src="'.$IMAGE_ROOT.$item["img"].'" alt="" width="246px" height="246px">
                        </span>
                        <span class="product-item__brands p-1">
                            '.$item["brand"].'
                        </span>
                        <span class="product-item__name p-1">
                            '.$item["name"].'
                        </span>
                    </a>
                    <span class="product-item__info p-1 text-secondary small-text">
                        '.$item["size"].'
                    </span>
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