<?php
include __DIR__ . '/../../connections/connect.php';
include __DIR__ . '/../filter.php';


function get_category($conn){
    $ls = array();
    $sql = "SELECT pc.name as name, pc.id as value, COUNT(pi.id) as count FROM `product_category` as pc
        JOIN `product_subcategory` as psc
        ON pc.id = psc.parent
        LEFT JOIN `product_item` as pi
        ON psc.id = pi.subcategory
        GROUP BY pc.name;";
    $result = $conn->query($sql);
    $total = 0;
    while($row=$result->fetch_assoc()){
        array_push($ls, $row);
    }
    return $ls;
}

function get_subcategory($conn, $selected_category){
    $ls = array();
    $sql = "SELECT psc.name as name, psc.id as value, COUNT(pi.id) as count FROM `product_subcategory` as psc
        LEFT JOIN `product_item` as pi
        ON psc.id = pi.subcategory
        WHERE psc.parent = '".$selected_category."'
        GROUP BY psc.name;";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        array_push($ls, $row);
    }
    return $ls;
}

function get_category_item($conn, $selected_category){
    $sql = "SELECT name FROM `product_category`
            WHERE id = '".$selected_category."';";
    $result = $conn->query($sql);
    $total = 0;
    while($row=$result->fetch_assoc()){
        return $row;
    }
}

$category_ls = get_category($dbc);
$subcategory_ls = NULL;
$selected_category = $FILTER_Category;
$selected_subcategory = $FILTER_SubCategory;
if(!is_null($selected_category)){
    $subcategory_ls = get_subcategory($dbc, $selected_category);
}
// if(is_null($selected_subcategory) && isset($subcategory_ls[0])){
//     $selected_subcategory = $subcategory_ls[0]["value"];
//     $FILTER_SubCategory = $selected_subcategory;
// }
?>
<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Category
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <?php 
                    foreach($category_ls as $item){
                        if(isset($selected_category) && $selected_category == $item["value"]){
                            $selected = !isset($selected_subcategory)?'selected': '';
                            echo '<li>';
                            echo '<a href="javascript:void()" 
                                        onclick="return onSelectFilterCategory('.$item["value"].')"
                                        class="link-dark rounded '.$selected.'">'
                                .$item["name"].' ('.$item["count"].')'.
                            '</a><ul class="sub">';
                            foreach($subcategory_ls as $item){
                                $selected = $selected_subcategory == $item["value"]?'selected': '';
                                echo '<li><a href="javascript:void()" 
                                            onclick="return onSelectFilterSubCategory('.$item["value"].')"
                                            class="link-dark rounded '.$selected.'">'
                                    .$item["name"].' ('.$item["count"].')'.
                                '</a></li>';
                            }
                            echo '</ul></li>';
                        }else{
                            echo '<li><a href="javascript:void()"
                                        onclick="return onSelectFilterCategory('.$item["value"].')"
                                        class="link-dark rounded">'
                                .$item["name"].' ('.$item["count"].')'.
                            '</a></li>';
                        } 
                    }
                ?>
                </ul>
            </div>
        </li>
    </ul>
</div>

<script>
    function onSelectFilterCategory(category){
        if(QUERY){
            QUERY["subcategory"] = undefined;
            QUERY["category"] = category;
        }
        // console.log(QUERY);
        doQueryProduct && doQueryProduct();
        return false;
    }

    function onSelectFilterSubCategory(subcategory){
        if(QUERY){
            QUERY["subcategory"] = subcategory;
        }
        // console.log(QUERY);
        doQueryProduct && doQueryProduct();
        return false;
    }
</script>