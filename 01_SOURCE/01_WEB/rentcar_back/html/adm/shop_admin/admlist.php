<?php
$sub_menu = '400410';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$sql_common = " from {$g5['g5_shop_order_data_table']} ";

$sql_search = " where cart_id <> '0' ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'od_id' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "od_id";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$g5['title'] = '렌트카 관리자 메뉴';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$colspan = 10;
?>

<div class="local_ov01 local_ov">

<font size="6px">
<a href="http://songcar.dothome.co.kr/rentcar/adm" target='_blank'> 장기렌터카 관리자 바로가기 </a><br>
<a href="http://songcar.dothome.co.kr/carshop/adm" target='_blank'> 중고차렌터카 관리자 바로가기 </a>
<font>

</div>



<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');