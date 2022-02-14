<?php
include __DIR__ . '/../../connections/connect.php';
include_once __DIR__ . '/../../model.php';


function get_brand($conn){
    global $SELECTED_TYPE;
    global $FILTER_Category;
    global $FILTER_SubCategory;
    
    $sql = "SELECT pb.name as name, pb.id as value, COUNT(pi.id) as count FROM `product_brand` as pb
            JOIN `product_item` pi ON pb.id = pi.brand
            JOIN `product_subcategory` psc ON psc.id = pi.subcategory
            JOIN `product_category` pc ON pc.id = psc.parent";
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
    $filter_str = "";
    if(!empty($filter)){
        $filter_str = " WHERE ".join(' AND ', $filter)." ";
    }

    $ls = array(0=> array("name" => "All Brands", "value" => 0, "count" => 0));
    $sql .= $filter_str." GROUP BY pi.brand;";
    // echo $sql;
    $result = $conn->query($sql);
    $total = 0;
    while($row=$result->fetch_assoc()){
        array_push($ls, $row);
        $total = $total + $row["count"];
    }
    $ls[0]["count"] = $total;
    return $ls;
}

$brand_ls = get_brand($dbc);
?>

<div class="flex-shrink-0 p-0 pt-3 bg-white border-bottom" style="width: 100%;" id="brand-filter">
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#brands-collapse" aria-expanded="true">
                Brands
            </button>
            <div class="collapse ms-4 show" id="brands-collapse">
                <?php
                    foreach($brand_ls as $item){
                        $selected = !is_null($FILTER_Brand) && in_array($item["value"], $FILTER_Brand, False);
                        $checked = $selected? "checked": "";
                        echo '<div class="form-check pt-1 pb-1">
                            <input class="form-check-input brand-checkbox" type="checkbox" onclick="onSelectFilterBrand('.$item["value"].')"
                                value="'. $item["value"] .'" id="'. $item["value"] .'" '. $checked .'>
                            <label class="form-check-label" for="'. $item["value"] .'">
                                '. $item["name"] .' ('. $item["count"] .')
                            </label>
                        </div>';
                    }
                ?>
            </div>
        </li>
    </ul>
</div>

<script>
    function onSelectFilterBrand(target){
        console.log(target);
        let checkedVals = $('#brand-filter .brand-checkbox:checkbox:checked').map(function() {
            return this.value;
        }).get();
        if(target == 0 && checkedVals.includes("0")){
            // select all
            checkedVals = [0];
        }else if(target != 0 && checkedVals.includes("0")){
            // remove select all
            checkedVals.splice(checkedVals.indexOf("0"), 1);
        }
        if(checkedVals.length == 0){
            checkedVals = [0];
        }
        if(QUERY){
            QUERY["brand"] = checkedVals;
        }
        // console.log(QUERY);
        doQueryProduct && doQueryProduct();
    }
</script>