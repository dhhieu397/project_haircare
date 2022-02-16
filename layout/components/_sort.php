<span class="small-text text-secondary ps-1">Sort by</span>
<select class="form-select" aria-label="Sort select" id="grid_sort" onchange="onSortChange(this)">

<?php
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
    // $('#grid_sort').on('change', function() {
    //     alert( this.value );
    // });
    var onSortChange = function(item){
        // alert(item.value);
        if(QUERY){
            QUERY["sort"] = item.value;
        }
        doQueryProduct && doQueryProduct();
    }
</script>