<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

// session_name( md5( $SITE_NAME ) );
session_start();

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$searchVal_1_str = "";
$searchVal_3_str  = "";
$guestroom_reserve_payment_price = "";
$guestroom_onsite_payment_price ="";


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
$range_start = trim(substr($searchVal_2,0,10));
$range_end = trim(substr($searchVal_2,13,10));
$range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));
$range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));
//페이징 초기값 설정
if (isset($_REQUEST['curpage']))
    $page = $_REQUEST['curpage'];
else
    $page = 1;
    $searchVal_str = "";
    if($page_division == "reserve_cancel"){ //취소관리일때...
      $searchVal_str = "AND (guestroom_reserve_status = '3' OR guestroom_reserve_status = '4')"; //취소신청.취소완료
      $data_target = "#reserveCancelModifyModal";
      }else{ //예약리스트
      $data_target = "#reserveModifyModal";
    }

    $searchVal_1_str = "";
    $searchVal_2_str = "";
    $searchVal_3_str = "";
    $searchVal_4_str = "";
    $searchVal_5_str = "";
    $searchVal_6_str = "";

    if($searchVal_1){
    	$searchVal_1_str = "AND ($searchKey_1 like '%$searchVal_1%')";
    }

    if($searchVal_2){
    	$searchVal_2_str = "AND $searchKey_2 BETWEEN '$range_start' AND '$range_end'";
    }

    if($searchVal_3){
    	$searchVal_3_str = "AND ($searchKey_3 like '%$searchVal_3%')";
    }

    // if($searchVal_4){
    // 	$searchVal_4_array_size = sizeof($searchVal_4);
    // 	$searchVal_4_str ="";
    // 	for($i = '0' ; $i < $searchVal_4_array_size ; $i++){
    // 		if($searchVal_4[$i] > '0'){
    // 			$searchVal_4_str .= "guestroom_reserve_payment_method like '%".$searchVal_4[$i]."%' OR ";
    // 		}
    // 	}
    // 	$searchVal_4_str = substr($searchVal_4_str, 0, -3);
    // 	$searchVal_4_str  = $searchVal_4_str ?  "AND (".$searchVal_4_str.")" : ""; //광고코드
    // 	// $searchVal_4_str = "AND (".$searchVal_4_str.")";
    //
    // 	// $searchVal_4_str = "AND (guestroom_reserve_payment_method like '%$searchVal_3%' OR guestroom_reserve_user_phone like '%$searchVal_3%')";
    // }

    if($searchVal_5){
        $searchVal_5 = implode( ',', $searchVal_5 );
    		$searchVal_5_str = "AND guestroom_reserve_payment_status IN ($searchVal_5)";
    }
    if($searchVal_6){
        $searchVal_6 = implode( ',', $searchVal_6 );
    		$searchVal_6_str = "AND guestroom_reserve_status IN ($searchVal_6)";
    }
    //
    // if($searchVal_6){
    // 	$searchVal_6_array_size = sizeof($searchVal_6);
    // 	$searchVal_6_str ="";
    //   if($page_division == "reserve_cancel"){
    //       	for($i = '0' ; $i < $searchVal_6_array_size ; $i++){
    //       		if($searchVal_6[$i] > '0'){
    //       			$searchVal_6_str .= "guestroom_reserve_payment_status = '".$searchVal_6[$i]."' OR ";
    //       		}
    //       	}
    //   }else{
    //         for($i = '0' ; $i < $searchVal_6_array_size ; $i++){
    //           if($searchVal_6[$i] > '0'){
    //             if($searchVal_6[$i] == '1'){
    //               $searchVal_6_str .= "guestroom_reserve_status = '8' OR ";
    //             }
    //               $searchVal_6_str .= "guestroom_reserve_status = '".$searchVal_6[$i]."' OR ";
    //           }
    //         }
    //   }
    //   	$searchVal_6_str = substr($searchVal_6_str, 0, -3);
    //   	$searchVal_6_str  = $searchVal_6_str ?  "AND (".$searchVal_6_str.")" : ""; //광고코드
    // }
    // echo "
    // searchVal_1_str >>> $searchVal_1_str <br>
    // searchVal_2_str >>> $searchVal_2_str <br>
    // searchVal_3_str >>> $searchVal_3_str <br>
    // searchVal_4_str >>> $searchVal_4_str <br>
    // searchVal_5_str >>> $searchVal_5_str <br>
    // searchVal_6_str >>> $searchVal_6_str <br>
    // ";
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
$total_sql = "SELECT COUNT(*) as TotalNum FROM $GUESTROOM_RESERVATION_TB
							WHERE 1=1
                            $user_str
              $searchVal_str
							$searchVal_1_str
							$searchVal_2_str
							$searchVal_3_str
							$searchVal_4_str
							$searchVal_5_str
							$searchVal_6_str
";

$result_total = sql_query($total_sql);
$rows_total = mysqli_fetch_array($result_total);
$TotalNum = $rows_total['TotalNum'];
$total_page = ceil($TotalNum / $list_num);
$cur_num = $TotalNum - $list_num * ($page - 1);
$total_block = ceil($total_page / $page_num);
$block = ceil($page / $page_num);
$first = ($block - 1) * $page_num;
$last = $block * $page_num;
if ($block >= $total_block) {
    $last = $total_page;
}
$html = "";
if ($total_page > 0 && $page > 1) {
    $go_page = $page - 1;
    //$html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchVal_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "','" . $searchKey_3 . "','" . $searchVal_3 . "','" . $searchVal_4 . "','" . $searchVal_5 . "','" . $searchVal_6 . "', '" . $go_page . "')\">Previous</a>";
    $html .= "<a href='#' onclick=\"showTable('" . $go_page . "')\">Previous</a>";
}

for ($page_link = $first + 1; $page_link <= $last; $page_link++) {
    if ($page_link == $page) {
        $html .= "<span class='now'>".$page_link."</span>";
    } else {
        //$html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchVal_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "','" . $searchKey_3 . "','" . $searchVal_3 . "','" . $searchVal_4 . "','" . $searchVal_5 . "','" . $searchVal_6 . "', '" . $page_link . "')\">" . $page_link . "</a>";
        $html .= "<a href='#' onclick=\"showTable('" . $page_link . "')\">" . $page_link . "</a>";
    }
}

if ($total_page > $page) {
    $go_page = $page + 1;
    // $html .= "<a href='#' onclick=\"showTable('" . $page_division . "','" . $searchKey_1 . "','" . $searchVal_1 . "','" . $searchKey_2 . "','" . $searchVal_2 . "','" . $searchKey_3 . "','" . $searchVal_3 . "','" . $searchVal_4 . "','" . $searchVal_5 . "','" . $searchVal_6 . "', '" . $go_page . "')\">Next</a>";
    $html .= "<a href='#' onclick=\"showTable('" . $go_page . "')\">Next</a>";
}

echo $html;
?>
