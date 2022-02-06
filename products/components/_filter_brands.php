<?php
include __DIR__ . '/../../connections/connect.php';
include __DIR__ . '/../filter.php';


function get_brand($conn){
    $ls = array(0=> array("name" => "All Brands", "value" => 0, "count" => 0));
    $sql = "SELECT pb.name as name, pb.id as value, COUNT(*) as count FROM `product_item` as pi
        JOIN `product_brand` pb
        ON pb.id = pi.brand
        GROUP BY pi.brand;";
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

<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;" id="brand-filter">
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
                        echo '<div class="form-check">
                            <input class="form-check-input brand-checkbox" type="checkbox" onclick="onSelectFilterBrand()"
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
    function onSelectFilterBrand(){
        let checkedVals = $('#brand-filter .brand-checkbox:checkbox:checked').map(function() {
            return this.value;
        }).get();
        if(QUERY){
            QUERY["brand"] = checkedVals;
        }
        console.log(QUERY);
    }
</script>