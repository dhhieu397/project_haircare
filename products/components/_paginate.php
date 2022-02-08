<?php
include __DIR__ . '/../filter.php';
$MAX_PAGE_NAV = 4;
echo $FILTER_page_count;
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
            if($FILTER_page_number > 0){
                echo '<li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>';
            }
            for ($i=0; $i < min($FILTER_page_count, $MAX_PAGE_NAV); $i++) {
                echo '<li class="page-item">
                    <a class="page-link" href="javascript:void(0)">'.($i+1).'</a>
                </li>';
            }
        ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>