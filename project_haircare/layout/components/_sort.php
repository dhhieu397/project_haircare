<span class="small-text text-secondary ps-1">Sort by</span>
<select class="form-select" aria-label="Sort select" id="grid_sort" onchange="onSortChange(this)">

<?php
// use global model to populate all query parameters sent from browser
include_once __DIR__ . '/../../model.php';

$selected = $FILTER_Sort == $SORTS->REL ? 'selected': '';
echo '<option value="relevance" '.$selected.'>Relevance</option>';

$selected = $FILTER_Sort == $SORTS->LATEST ? 'selected': '';
echo '<option value="latest" '.$selected.'>Latest</option>';

$selected = $FILTER_Sort == $SORTS->NAME_ASC ? 'selected': '';
echo '<option value="name_asc" '.$selected.'>Name (A-Z)</option>';

$selected = $FILTER_Sort == $SORTS->NAME_DESC ? 'selected': '';
echo '<option value="name_desc" '.$selected.'>Name (Z-A)</option>';
?>

</select>


<script>
    var onSortChange = function(item){
        // update query and submit to server
        if(QUERY){
            QUERY["sort"] = item.value;
        }
        doQueryProduct && doQueryProduct();
    }
</script>