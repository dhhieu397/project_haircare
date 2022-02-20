<?php
include __DIR__ . '/../../connections/connect.php';
// use global model to populate all query parameters sent from browser
include_once __DIR__ . '/../../model.php';


function get_category($conn){
    // return category list and number of items each
    global $SELECTED_TYPE;
    $ls = array();
    $sql = "SELECT pc.name as name, pc.id as value, COUNT(pi.id) as count FROM `product_category` as pc
        JOIN `product_subcategory` as psc
        ON pc.id = psc.parent
        LEFT JOIN `product_item` as pi
        ON psc.id = pi.subcategory
        WHERE pc.type='".$SELECTED_TYPE."'
        GROUP BY pc.name, pc.id";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        array_push($ls, $row);
    }
    return $ls;
}

function get_subcategory($conn, $selected_category){
    // return category list and number of items each
    global $SELECTED_TYPE;
    $ls = array();
    $sql = "SELECT psc.name as name, psc.id as value, COUNT(pi.id) as count FROM `product_subcategory` as psc
        JOIN `product_category` as pc ON pc.id = psc.parent
        LEFT JOIN `product_item` as pi
        ON psc.id = pi.subcategory
        WHERE psc.parent = '".$selected_category."'
        AND pc.type='".$SELECTED_TYPE."'
        GROUP BY psc.name, psc.id;";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        array_push($ls, $row);
    }
    return $ls;
}

$category_ls = get_category($dbc);
$subcategory_ls = NULL;
$selected_category = $FILTER_Category;
$selected_subcategory = $FILTER_SubCategory;
// select subcategory only if there is a category selected
if(!is_null($selected_category)){
    $subcategory_ls = get_subcategory($dbc, $selected_category);
}
?>
<div class="flex-shrink-0 pt-3 pb-1 bg-white border-bottom" style="width: 100%;">
    <ul class="list-unstyled ps-0">
        <li class="mb-0">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Category
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <?php 
                    foreach($category_ls as $item){
                        if(isset($selected_category) && $selected_category == $item["value"]){
                            // render category
                            $selected = !isset($selected_subcategory)?'selected': '';
                            echo '<li>';
                            echo '<a href="javascript:void()" 
                                        onclick="return onSelectFilterCategory('.$item["value"].')"
                                        class="link-dark rounded '.$selected.'">'
                                .$item["name"].' ('.$item["count"].')'.
                            '</a><ul class="sub">';
                            // return subcategory if there is a category selected
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
                            // return only category list
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
        // build query and submit to server
        if(QUERY){
            QUERY["subcategory"] = undefined;
            QUERY["category"] = category;
        }
        // console.log(QUERY);
        doQueryProduct && doQueryProduct();
        return false;
    }

    function onSelectFilterSubCategory(subcategory){
        // build query and submit to server
        if(QUERY){
            QUERY["subcategory"] = subcategory;
        }
        // console.log(QUERY);
        doQueryProduct && doQueryProduct();
        return false;
    }
</script>