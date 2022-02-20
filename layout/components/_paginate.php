<?php
// use global model to populate all query parameters sent from browser
include_once __DIR__ . '/../../model.php';

// MAXIMUM NUMBER OF PAGES
$MAX_PAGE_SHOWED = 4;

$page_count = $FILTER_page_count;
$page_showed = min($MAX_PAGE_SHOWED, $page_count);
$page = $FILTER_page_number;
$half = $page_showed - intdiv($page_showed, 2);
// Find page number range to render
if($page<=$half){
    $start_ = 0;
}else if($page_count - $page <=$half){
    $start_ = $page_count - $page_showed;
}else{
    $start_ = $page - $half;
}
?>
<nav aria-label="Page navigation" style="<?php echo ($page_count>1)?'':'display: none' ?>">
    <div class="pagination justify-content-center info">
        <?php echo '<span class="p-2 text-secondary">Page '.($page+1).' of '.$page_count.'</span>' ?>
    </div>
    <ul class="pagination justify-content-center">
        <?php
            if($start_ > 0){
                echo '<li class="page-item">
                            <a class="page-link" href="javascript:void()" aria-label="Begin"
                                    onclick="return onPageChange(0)">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous"
                                    onclick="return onPageChange('.($page-1).')">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>';
            }
            for ($i=$start_; $i < $start_+$page_showed; $i++) {
                if($page == $i){
                    echo '<li class="page-item active" aria-current="page">
                        <a class="page-link" href="javascript:void()"
                            onclick="return onPageChange('.$i.')">'.($i+1).'</a>
                    </li>';
                }else{
                    echo '<li class="page-item">
                        <a class="page-link" href="javascript:void()"
                            onclick="return onPageChange('.$i.')">'.($i+1).'</a>
                    </li>';
                }
            }
            if($start_+$page_showed < $page_count){
                echo '<li class="page-item">
                    <a class="page-link" href="javascript:void()" aria-label="Next"
                            onclick="return onPageChange('.($page_showed).')">
                        <span aria-hidden="true">&gt;</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="End"
                            onclick="return onPageChange('.($page_count-1).')">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>';
            }
        ?>
        
    </ul>
</nav>

<script>
    var onPageChange = function(page){
        // update query and submit to server
        if(QUERY){
            QUERY["page"] = page;
        }
        doQueryProduct && doQueryProduct();
        return false;
    }
</script>