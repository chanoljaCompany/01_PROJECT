<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

session_start();

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$page_division = trim(isset($_REQUEST['page_division'])) ? $_REQUEST['page_division'] : '';//예약번호/객실명
$searchKey_1 = trim(isset($_REQUEST['searchKey_1'])) ? $_REQUEST['searchKey_1'] : '';//예약번호/객실명셀렉트박스
$searchKey_2 = trim(isset($_REQUEST['searchKey_2'])) ? $_REQUEST['searchKey_2'] : '';//기간셀렉트박스
$searchKey_3 = trim(isset($_REQUEST['searchKey_3'])) ? $_REQUEST['searchKey_3'] : '';//기간셀렉트박스
$searchVal_1 = trim(isset($_REQUEST['searchVal_1'])) ? $_REQUEST['searchVal_1'] : '';//예약번호/객실명
$searchVal_2 = trim(isset($_REQUEST['searchVal_2'])) ? $_REQUEST['searchVal_2'] : ''; //
$searchVal_3 = trim(isset($_REQUEST['searchVal_3'])) ? $_REQUEST['searchVal_3'] : ''; //예약자 정보
$searchVal_4 = trim(isset($_REQUEST['searchVal_4'])) ? $_REQUEST['searchVal_4'] : ''; //결제수단
$searchVal_5 = trim(isset($_REQUEST['searchVal_5'])) ? $_REQUEST['searchVal_5'] : ''; //결제여부
$searchVal_6 = trim(isset($_REQUEST['searchVal_6'])) ? $_REQUEST['searchVal_6'] : ''; //예약상태

$search_date = $searchKey_1."-".$searchKey_2;
// $range_start = trim(substr($searchVal_2,0,10));
// $range_end = trim(substr($searchVal_2,13,10));
// $range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));
// $range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));
//페이징 초기값 설정
if (isset($_REQUEST['curpage']))
    $page = $_REQUEST['curpage'];
else
    $page = 1;
$searchVal_str = "";
if($page_division == "calculate_cancel"){ //취소관리일때...
  $searchVal_str = "AND (guestroom_calculate_status = '3' OR guestroom_calculate_status = '4')"; //취소신청.취소완료
  $data_target = "#calculateCancelModifyModal";
}else{ //예약리스트
  $data_target = "#calculateModifyModal";
}

$searchVal_1_str = "";
$searchVal_2_str = "";
$searchVal_3_str = "";
$searchVal_4_str = "";
$searchVal_5_str = "";
$searchVal_6_str = "";

$list_num = 10; // 한페이지당 출력수
$page_num = 10; // 페이지 출력수
$offset = $list_num * ($page - 1);
$fir = $offset; // 시작값
$last = $offset + $list_num; //종료값

if($_SESSION['session_user_level'] != 'A'){
    $user_str = "AND user_id = '".$_SESSION['session_user_id']."'";
} else {
	$user_str = "AND user_id LIKE '%%'";
}

// $total_sql = "SELECT COUNT(*) as TotalNum FROM $GUESTROOM_RESERVATION_TB
// 		  	  WHERE 1=1
//               $user_str
//               $searchVal_str
//   			  $searchVal_1_str
// 			  $searchVal_2_str
// 			  $searchVal_3_str
// 			  $searchVal_4_str
// 			  $searchVal_5_str
// 			  $searchVal_6_str
// ";
// $result_total = sql_query($total_sql);
// $rows_total = mysqli_fetch_array($result_total);
// $TotalNum = $rows_total['TotalNum'];

$sql = "SELECT * FROM $SALES_MEMBERS_TB WHERE 1=1 AND user_level = 'M'";
$result = sql_query($sql);
$counts = sql_num_rows($result);
$num_a = $counts;
$counts = '0';
$html ="";
	while($rows = sql_fetch_array($result)) {
        // $sub_sql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
        //             WHERE 1=1
        //             AND user_id = '".$rows['user_id']."'
        //             AND guestroom_reserve_payment_date like '".$search_date."%'
        // ";
        $sub_sql = "SELECT SUM(guestroom_reserve_payment_total) AS ptotal FROM $GUESTROOM_RESERVATION_TB
        WHERE 1=1
        AND user_id = '".$rows['user_id']."'
        AND guestroom_reserve_payment_date like '".$search_date."%'
        ";
       $sub_rows = sql_fetch($sub_sql);
       if($sub_rows['ptotal']){  //취소리스트..
            $status_str = "";
            $csql = "SELECT *
                     FROM calculate
                     WHERE 1=1
                     AND user_id = '".$rows['user_id']."'
                     AND calculate_month	= '".$search_date."'";
            $crows = sql_fetch($csql);
            $status_str =  $crows['status'] ? $crows['status'] : '정산대기';
				$html .= "<tr>
									<td>".$num_a."</td>
                                    <td>".$rows['com_name']."</td>
                                    <td>".number_format($sub_rows['ptotal'])."</td>
									<td>".$status_str."</td>
									<td>".number_format($crows['calculate_money'])."</td>
                                    <td>".$crows['calculate_month']."</td>
									<td>
                                    <span class='box_btn_s blue'><a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static'
                                    data-whatever='".$search_date."^".$rows['user_id']."' data-target='#ModifyModal'>수정</a>
                                                 </span>
                                    </td>
									<td>
                                        <span class='box_btn_s gray'>
                                        <a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static'
                                         data-whatever='".$search_date."^".$rows['user_id']."' data-target='#ListModal'>내역</a>
                                        </span>
                                    </td>
									</tr>
				 ";
       }
			$num_a--;
	}
echo $html;
?>
