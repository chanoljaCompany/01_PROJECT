<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$page_division = trim($_REQUEST["page_division"]);
$searchVal_1_str = "";
$searchKey_1 = $_REQUEST["searchKey_1"];
$searchVal_1 = trim($_REQUEST["searchVal_1"]);
$manager = isset($_REQUEST["manager"]) ? $_REQUEST["manager"] : '';

//페이징 초기값 설정
if (isset($_REQUEST['curpage']))
    $page = $_REQUEST['curpage'];
else
    $page = 1;

if($searchVal_1){
	$searchVal_1_str = "AND ($searchKey_1 like '%$searchVal_1%')";
}
// if($searchVal_2){
// 	$searchVal_2_str = "AND $searchKey_2 BETWEEN '$range_start 00:00:00' AND '$range_end 23:59:59'";
// }

$list_num = 10; // 한페이지당 출력수
$page_num = 10; // 페이지 출력수
$offset = $list_num * ($page - 1);
$fir = $offset; // 시작값
$last = $offset + $list_num; //종료값
$total_sql = "SELECT COUNT(*) as TotalNum FROM $MANAGEMENT_RESERVE_TB
			  WHERE 1=1
			  $searchVal_1_str
";
// echo "
// $total_sql <br>
// ";
$result_total = sql_query($total_sql);
$rows_total = mysqli_fetch_array($result_total);
$TotalNum = $rows_total['TotalNum'];
$total_page = ceil($TotalNum / $list_num);
$cur_num = $TotalNum - $list_num * ($page - 1);
$total_block = ceil($total_page / $page_num);
$block = ceil($page / $page_num);
$first = ($block - 1) * $page_num;
$last = $block * $page_num;
$html = "";
if ($block >= $total_block) {
    $last = $total_page;
}
if ($total_page > 0 && $page > 1) {
    $go_page = $page - 1;
    $html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchVal_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "', '" . $go_page . "', '" . $manager . "')\">Previous</a>";
}

for ($page_link = $first + 1; $page_link <= $last; $page_link++) {
    if ($page_link == $page) {
        $html .= "<span class='now'>".$page_link."</span>";
    } else {
        $html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchVal_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "','" . $page_link . "', '" . $manager . "')\">" . $page_link . "</a>";
    }
}

if ($total_page > $page) {
    $go_page = $page + 1;
    $html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "','" . $searchVal_1 . "','" . $go_page . "', '" . $manager . "')\">Next</a>";
}

echo $html;
?>
