<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$searchVal_1_str = "";
$searchVal_3_str  = "";

$page_division = trim(isset($_REQUEST['page_division'])) ? $_REQUEST['page_division'] : ''; //예약번호/객실명
$searchKey_1 = trim(isset($_REQUEST['searchKey_1'])) ? $_REQUEST['searchKey_1'] : ''; //예약번호/객실명셀렉트박스
$searchKey_2 = trim(isset($_REQUEST['searchKey_2'])) ? $_REQUEST['searchKey_2'] : ''; //기간셀렉트박스
$searchKey_3 = trim(isset($_REQUEST['searchKey_3'])) ? $_REQUEST['searchKey_3'] : ''; //기간셀렉트박스
$searchVal_1 = trim(isset($_REQUEST['searchVal_1'])) ? $_REQUEST['searchVal_1'] : ''; //예약번호/객실명
$searchVal_2 = trim(isset($_REQUEST['searchVal_2'])) ? $_REQUEST['searchVal_2'] : ''; //
$searchVal_3 = trim(isset($_REQUEST['searchVal_3'])) ? $_REQUEST['searchVal_3'] : ''; //예약자 정보
$searchVal_4 = trim(isset($_REQUEST['searchVal_4'])) ? $_REQUEST['searchVal_4'] : ''; //결제수단
$searchVal_5 = trim(isset($_REQUEST['searchVal_5'])) ? $_REQUEST['searchVal_5'] : ''; //결제여부
$searchVal_6 = trim(isset($_REQUEST['searchVal_6'])) ? $_REQUEST['searchVal_6'] : ''; //예약상태
$range_start = trim(substr($searchVal_2, 0, 10));
$range_end = trim(substr($searchVal_2, 13, 10));
$range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));
$range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));
//페이징 초기값 설정
if (isset($_REQUEST['curpage']))
  $page = $_REQUEST['curpage'];
else
  $page = 1;
$searchVal_str = "";
if ($page_division == "reserve_cancel") { //취소관리일때...
  $searchVal_str = "AND (guestroom_reserve_status = '3' OR guestroom_reserve_status = '4')"; //취소신청.취소완료
  $data_target = "#reserveCancelModifyModal";
} else { //예약리스트
  $data_target = "#reserveModifyModal";
}

$searchVal_1_str = "";
$searchVal_2_str = "";
$searchVal_3_str = "";
$searchVal_4_str = "";
$searchVal_5_str = "";
$searchVal_6_str = "";

if ($searchVal_1) {
  $searchVal_1_str = "AND ($searchKey_1 like '%$searchVal_1%')";
}

if ($searchVal_2) {
  $searchVal_2_str = "AND $searchKey_2 BETWEEN '$range_start' AND '$range_end'";
}

if ($searchVal_3) {
  $searchVal_3_str = "AND ($searchKey_3 like '%$searchVal_3%')";
}
if ($searchVal_5) {
  $searchVal_5 = implode(',', $searchVal_5);
  $searchVal_5_str = "AND guestroom_reserve_payment_status IN ($searchVal_5)";
}
if ($searchVal_6) {
  $searchVal_6 = implode(',', $searchVal_6);
  $searchVal_6_str = "AND guestroom_reserve_status IN ($searchVal_6)";
}
$list_num = 10; // 한페이지당 출력수
$page_num = 10; // 페이지 출력수
$offset = $list_num * ($page - 1);
$fir = $offset; // 시작값
$last = $offset + $list_num; //종료값

if ($_SESSION['session_user_level'] != 'A') {
  $user_str = "AND user_id = '" . $_SESSION['session_user_id'] . "'";
} else {
  $user_str = "AND user_id LIKE '%%'";
}
$total_sql = "SELECT COUNT(*) as TotalNum FROM $GUESTROOM_INFO_TB
			  WHERE 1=1
              $user_str
              AND guestroom_del_whether = 'N' 
              $searchVal_str
			  $searchVal_1_str
			  $searchVal_2_str
			  $searchVal_3_str
			  $searchVal_4_str
			  $searchVal_5_str
			  $searchVal_6_str
              ORDER BY guestroom_type DESC
            ";
$result_total = sql_query($total_sql);
$rows_total = mysqli_fetch_array($result_total);
$TotalNum = $rows_total['TotalNum'];
$num_a = $TotalNum - $list_num * ($page - 1);
$sql = "SELECT * FROM $GUESTROOM_INFO_TB
		WHERE 1=1
        $user_str
        AND guestroom_del_whether = 'N' 
        $searchVal_str
		$searchVal_1_str
		$searchVal_2_str
		$searchVal_3_str
		$searchVal_4_str
		$searchVal_5_str
		$searchVal_6_str
		ORDER BY seq DESC
		LIMIT " . $fir . ", " . $list_num . "";

$result = sql_query($sql);
$counts = sql_num_rows($result);
$html = "";
for ($j = 0; $j < $counts; $j++) {
  $rows = mysqli_fetch_array($result);
  $post_show_cheked = "";
  $post_show_cheked = $rows['post_show'];

  if ($rows['post_show'] == 'N' || $rows['post_show'] == '') {
    $post_show_cheked = "";
    $post_show_cheked_val = 'N';
  } else {
    $post_show_cheked = "checked";
    $post_show_cheked_val = 'Y';
  }
  $guestroom_type = get_guestroom_type($rows['guestroom_type']);
  $get_image_info = get_image_info($rows['guestroom_code']);
  $imgUrl = "";
  if ($get_image_info['0']['guestroom_image_name']) {
    $imgUrl = "<img src='" . $guestroom_image_url . "/thumb_img/" . $get_image_info['0']['guestroom_image_name'] . "' alt='image'>";
  }

  // echo "
  // get_date_intval > $get_date_intval <br>
  // ";
  // $html .= "<tr>
  //            <td>".$num_a."</td>
  //            <td>".$rows['user_id']."</td>
  //            <td>".$imgUrl."</td>
  //            <td>".$rows['guestroom_name']."</td>
  //            <td>".$rows['guestroom_personnel']."/".$rows['guestroom_max_personnel']."</td>
  //            <td>".number_format($rows['guestroom_low_season_fee_weekday'])."</td>
  //            <td>".number_format($rows['guestroom_low_season_fee_weekend'])."</td>
  //            <td>".number_format($rows['guestroom_low_season_fee_holiday'])."</td>

  //            <td>".number_format($rows['guestroom_peak_season_fee_weekday'])."</td>
  //            <td>".number_format($rows['guestroom_peak_season_fee_weekend'])."</td>
  //            <td>".number_format($rows['guestroom_peak_season_fee_holiday'])."</td>
  //            <td><input type='checkbox' onclick=\"checkbox_event('".$rows['seq']."','".$post_show_cheked_val."');\" name='post_show[]' id= 'post_show_".$rows['seq']."' value=".$rows['seq']." ".$post_show_cheked."></td>
  //            <td><span class='box_btn_s blue'><input type='button' value='수정' onclick=\"go_page('modify','".$rows['guestroom_code']."')\"></span></td>
  //            <td><span class='box_btn_s gray'><input type='button' value='삭제' onclick=\"go_page('delete','".$rows['guestroom_code']."')\"></span></td>
  //            </tr>
  //   ";
  $html .= "<tr>
        <td>" . $num_a . "</td>
        <td>" . $rows['user_id'] . "</td>
        <td>" . $imgUrl . "</td>
        <td>" . $rows['guestroom_name'] . "</td>
        <td>" . number_format((int)$rows['guestroom_fee_all_day']) . "</td>
        <td>" . number_format((int)$rows['guestroom_low_season_fee_weekday']) . "</td>
        <td>" . number_format((int)$rows['guestroom_low_season_fee_weekend']) . "</td>
        <td>" . number_format((int)$rows['guestroom_low_season_fee_holiday']) . "</td>

        <td>" . number_format((int)$rows['guestroom_peak_season_fee_weekday']) . "</td>
        <td>" . number_format((int)$rows['guestroom_peak_season_fee_weekend']) . "</td>
        <td>" . number_format((int)$rows['guestroom_peak_season_fee_holiday']) . "</td>
        <td><input type='checkbox' onclick=\"checkbox_event('" . $rows['seq'] . "','" . $post_show_cheked_val . "');\" name='post_show[]' id= 'post_show_" . $rows['seq'] . "' value=" . $rows['seq'] . " " . $post_show_cheked . "></td>
        <td><span class='box_btn_s blue'><input type='button' value='수정' onclick=\"go_page('modify','" . $rows['guestroom_code'] . "')\"></span></td>
        <td><span class='box_btn_s gray'><input type='button' value='삭제' onclick=\"go_page('delete','" . $rows['guestroom_code'] . "')\"></span></td>
        </tr>
";
  // $serialnumber--;
  $num_a--;
}
echo $html;
