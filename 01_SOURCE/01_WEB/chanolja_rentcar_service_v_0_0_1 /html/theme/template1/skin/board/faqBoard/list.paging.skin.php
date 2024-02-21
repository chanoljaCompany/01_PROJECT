<?php 
function get_paging_theme($write_pages, $cur_page, $total_page, $url, $add="")
{
    //$url = preg_replace('#&amp;page=[0-9]*(&amp;page=)$#', '$1', $url);
    $url = preg_replace('#&amp;page=[0-9]*#', '', $url) . '&amp;page=';
    
    $str = '';
    if ($cur_page > 1) {
        $str .= '<li class="page-item"><a href="'.$url.'1'.$add.'" class="page-link"><i class="fas fa-angle-left"></i></a></li>'.PHP_EOL;
    }
    
    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;
    
    if ($end_page >= $total_page) $end_page = $total_page;
    
    if ($start_page > 1) $str .= '<li class="page-item"><a href="'.$url.($start_page-1).$add.'" class="page-link"><i class="fas fa-angle-left"></i></a></li>'.PHP_EOL;
    
    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= '<li class="page-item"><a href="'.$url.$k.$add.'" class="page-link">'.$k.'</a></li>'.PHP_EOL;
                else
                    $str .= '<li class="page-item active"><a class="page-link" href="#">'.$k.'</a></li>'.PHP_EOL;
        }
    }
    
    if ($total_page > $end_page) $str .= '<li class="page-item"><a href="'.$url.($end_page+1).$add.'" class="page-link">다음</a></li>'.PHP_EOL;
    
    if ($cur_page < $total_page) {
        $str .= '<li class="page-item"><a href="'.$url.$total_page.$add.'" class="page-link"><i class="fas fa-angle-right"></i></a></li>'.PHP_EOL;
    }
    
    if ($str)
        return "<ul class=\"pagination float-right\">{$str}</ul>";
        else
            return "";
}

?>
