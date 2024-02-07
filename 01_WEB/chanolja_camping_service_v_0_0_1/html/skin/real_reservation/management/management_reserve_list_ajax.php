<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$page_division = trim($_REQUEST["page_division"]);
$searchVal_1_str = "";
$searchKey_1 = $_REQUEST["searchKey_1"];
$searchVal_1 = trim($_REQUEST["searchVal_1"]);
$searchVal_2 = isset($_REQUEST["searchVal_2"]) ? $_REQUEST["searchVal_2"] : 'N';
$manager = isset($_REQUEST["manager"]) ? $_REQUEST["manager"] : '';

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
$dataorderBy = "ORDER BY seq DESC";
if($searchVal_2 == 'O') $dataorderBy = "ORDER BY seq ASC";
$list_num = 10; // 한페이지당 출력수
$page_num = 10; // 페이지 출력수
$offset = $list_num * ($page - 1);
$fir = $offset; // 시작값
$last = $offset + $list_num; //종료값

$total_sql = "SELECT *
              FROM $MANAGEMENT_RESERVE_TB
  			  WHERE 1=1
			  $searchVal_1_str
";
$result_total = sql_query($total_sql);
$rows_total = mysqli_num_rows($result_total);
$TotalNum = $rows_total;
echo "
total_sql > $total_sql
";
$num_a = $TotalNum - $list_num*($page-1);
$sql = "SELECT *
        FROM $MANAGEMENT_RESERVE_TB
        WHERE 1=1
		$searchVal_1_str
		$dataorderBy
		LIMIT " . $fir . ", " . $list_num . "";
// $sql = "SELECT SM.*,
//         (SELECT counsel_step FROM $MEMBERS_COUNSELORS_TB WHERE userid	= SM.userid) as counsel_step,
//         (SELECT counselors_code FROM $MEMBERS_COUNSELORS_TB WHERE userid	= SM.userid) as counselors_code
//         FROM $SALES_MEMBERS_TB AS SM
// 				WHERE 1=1
//         AND user_level = '$manager'
// 				$searchVal_1_str
// 				$dataorderBy
// 				LIMIT " . $fir . ", " . $list_num . "";
// echo "
// sql >>> $sql <br>
// ";
$result = sql_query($sql);
$counts = sql_num_rows($result);
$html ="";
	for ( $j = 0 ; $j < $counts ; $j ++ ) {
	  $rows = mysqli_fetch_array($result);
      $get_reserve_peak_data = get_reserve_peak_data($rows['user_id'],$_SESSION['session_user_level']);
      $peak_season_whether_str = "사용안함";
      $weekend_whether_str = "사용안함";
      $weekend_fee_set_str = "사용안함";

      if($rows['peak_season_whether'] == 'Y') $peak_season_whether_str = "사용";
      if($rows['weekend_whether'] == 'Y') $weekend_whether_str = "사용";
      if($rows['weekend_fee_set'] == 'A') $weekend_fee_set_str = "사용";

      $html .= "<tr>
                  <td>".$num_a."</td>
                  <td>".$rows['user_id']."</td>
                  <td>".$peak_season_whether_str."</td>
                  <td>".$get_reserve_peak_data['peak_season_start_date']."~".$get_reserve_peak_data['peak_season_end_date']."</td>
                  <td>".$weekend_whether_str."</td>
                  <td>".$rows['weekend_setting_start']."~".$rows['weekend_setting_end']."</td>
                  <td>".$weekend_fee_set_str."</td>
                  <td>
                      <span class='box_btn_s blue'>
                      <a class='btn btn-success btn-sm' onclick=\"management_reserve_change('modify','".$rows['seq']."','".$rows['user_id']."')\">수정</a>
                      </span>
                      <span class='box_btn_s dark'>
                      <a class='btn btn-success btn-sm' onclick=\"management_reserve_change('management_reserve_delete','".$rows['seq']."','".$rows['user_id']."')\">삭제</a>
                      </span>
                  </td>";
			$num_a--;}
echo $html;
?>
