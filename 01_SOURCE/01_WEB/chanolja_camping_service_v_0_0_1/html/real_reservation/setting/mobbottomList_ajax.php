<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";
include $admin_root."/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$page_division = trim($_REQUEST["page_division"]);
$searchVal_1_str = "";
$searchKey_1 = $_REQUEST["searchKey_1"];
$searchVal_1 = trim($_REQUEST["searchVal_1"]);
$dtype = isset($_REQUEST["dtype"]) ? $_REQUEST["dtype"] : '';


// $searchKey_2 = $_REQUEST["searchKey_2"];
// $searchVal_2 = trim($_REQUEST["searchVal_2"]);
// $range_start = trim(substr($searchVal_2,0,10));
// $range_end = trim(substr($searchVal_2,13,10));
// $range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));
// $range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));

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

$total_sql = "SELECT COUNT(*) as TotalNum FROM $MOBBOTTOMPOP
							WHERE 1=1
							$searchVal_1_str
";
$result_total = sql_query($total_sql);
$rows_total = mysqli_fetch_array($result_total);
$TotalNum = $rows_total['TotalNum'];
$num_a = $TotalNum - $list_num*($page-1);
$sql = "SELECT *
        FROM $MOBBOTTOMPOP
				WHERE 1=1
				$searchVal_1_str
				ORDER BY seq DESC
				LIMIT " . $fir . ", " . $list_num . "";
// echo "
// sql >>> $sql <br>
// ";
$result = sql_query($sql);
$counts = sql_num_rows($result);
$html ="";
			for ( $j = 0 ; $j < $counts ; $j ++ ) {
			$rows = mysqli_fetch_array($result);
			$html .= "<tr>
                  <td>".$num_a."</td>
                  <td>".$rows['post_show']."</td>
                  <td>".$rows['link']."</td>
                  <td>".$rows['content']."</td>
                  <td>
                  <span class='box_btn_s success'>
                  <a class='btn btn-success btn-sm' onclick=\"mob_bottom_pop('".$rows['seq']."')\">관리</a>
                  </span>
                  <span class='box_btn_s danger'>
                  <a class='btn btn-success btn-sm' onclick=\"mobbottom_del('".$rows['seq']."')\">삭제</a>
                  </span>
                </tr>
				 ";
			$num_a--;
    }
echo $html;
?>
