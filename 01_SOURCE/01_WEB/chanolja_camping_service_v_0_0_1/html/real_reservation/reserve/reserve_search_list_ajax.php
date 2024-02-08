<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

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
if($searchVal_5){
    $searchVal_5 = implode( ',', $searchVal_5 );
		$searchVal_5_str = "AND guestroom_reserve_payment_status IN ($searchVal_5)";
}
if($searchVal_6){
    $searchVal_6 = implode( ',', $searchVal_6 );
		$searchVal_6_str = "AND guestroom_reserve_status IN ($searchVal_6)";
}
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
$num_a = $TotalNum - $list_num*($page-1);
$sql = "SELECT A.*,
        (SELECT com_name FROM $SALES_MEMBERS_TB WHERE 1=1 AND user_id = A.user_id) AS com_name
        FROM $GUESTROOM_RESERVATION_TB AS A
		WHERE 1=1
            $user_str
            $searchVal_str
			$searchVal_1_str
			$searchVal_2_str
			$searchVal_3_str
			$searchVal_4_str
			$searchVal_5_str
			$searchVal_6_str
			ORDER BY seq DESC
			LIMIT " . $fir . ", " . $list_num . "";
// echo "
// sql > $sql <br>
// ";
$result = sql_query($sql);
$counts = sql_num_rows($result);
$html ="";
			for ( $j = 0 ; $j < $counts ; $j ++ ) {
			$rows = mysqli_fetch_array($result);
      $get_paymethod_type_str = get_paymethod_type($rows['guestroom_reserve_payment_method']);
      $guestroom_reserve_status_str = get_reserve_status($rows['guestroom_reserve_status']);
      $get_date_intval = get_date_intval($rows['guestroom_reserve_date']);
      $get_date_str = get_date_str($get_date_intval);
// echo "
// get_date_intval > $get_date_intval <br>
// ";
       if($page_division == "reserve_cancel"){  //취소리스트..
				$html .= "<tr>
									<td>".$num_a."</td>
                                    <td>".$guestroom_reserve_status_str."</td>
                                    <td>".$rows['com_name']."</td>
									<td>".$rows['guestroom_reception_date']."</td>
									<td>".$rows['guestroom_reserve_payment_date']."</td>
                                     <td>".$rows['guestroom_reserve_refund_request_date']."</td>
                                     <td>".$rows['guestroom_reserve_refund_date']."</td>
									<td>".$rows['guestroom_name']."</td>
									<td>".$rows['guestroom_reserve_user_name']."</td>
									<td>".$rows['guestroom_reserve_user_phone']."</td>
									<td>".$get_paymethod_type_str."</td>
									<td>".number_format($rows['guestroom_reserve_payment_price'])."</td>
									<td>".number_format($rows['guestroom_onsite_payment_price'])."</td>
                                    <td>".number_format($rows['guestroom_refund_price'])."</td>
									<td><span class='box_btn_s blue'><a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static' data-whatever='".$rows['guestroom_reserve_code']."' data-target='".$data_target."'>수정</a></span></td>
									<!--<td><span class='box_btn_s gray'><input type='button' value='삭제하기' onclick=\"go_page('reserve_delete','".$rows['guestroom_reserve_code']."','','','')\"></span></td>-->
									</tr>
				 ";
       }
       else if($page_division == "reserve"){  //예약현황리스트-PC
         $html .= "<tr>
                   <td>".$num_a."</td>
                   <td>".$guestroom_reserve_status_str."</td>
                   <td>".$rows['com_name']."</td>
                   <td>".$rows['guestroom_reception_date']."</td>";
                   if($rows['guestroom_type'] == '1'){
         $html .= "<td>".$rows['guestroom_reserve_date']."<br>(".$get_date_str.")</td>";
                   }
                   else{
                     $reserve_use_hour_ex = explode("~",$rows['reserve_use_hour']);
                     $reserve_use_start = $reserve_use_hour_ex['0'];
                     $reserve_use_end = $reserve_use_hour_ex['1'];
                     $reserve_str = "<br>(".$reserve_use_start."시부터" . $reserve_use_end ."시까지)";
         $html .= "<td>".substr($rows['guestroom_reserve_date'],0,10).$reserve_str."</td>";
                   }
         $html .= "<td>".$rows['guestroom_reserve_payment_date']."</td>
                   <td>".$rows['guestroom_name']."</td>
                   <td>".$rows['guestroom_reserve_user_name']."</td>
                   <td>".$rows['guestroom_reserve_user_phone']."</td>
                   <td>".$get_paymethod_type_str."</td>
                   <td>".number_format($rows['guestroom_reserve_payment_total'])."</td>
                   <td><span class='box_btn_s blue'><a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static' data-whatever='".$rows['guestroom_reserve_code']."' data-target='".$data_target."'>수정</a></span></td>
                   <td><span class='box_btn_s gray'><input type='button' value='삭제' onclick=\"go_page('reserve_delete','".$rows['guestroom_reserve_code']."')\"></span></td>
                   </tr>
          ";

       }
      else if($page_division == "reserve_mobile"){  //예약현황리스트-모바일
          $html .= "<tr>
                        <th>NO</th>
                        <th>상태</th>
                        <th>접수일자</th>
                    </tr>
                    <tr>
                        <td>".$num_a."</td>
                        <td>".$guestroom_reserve_status_str."</td>
                        <td>".$rows['guestroom_reception_date']."</td>
                    </tr>
                    <tr>
                        <th colspan='2'>예약일자</th>
                        <th>결제일자</th>
                    </tr>
                    <tr>
                        <td colspan='2'>".$rows['guestroom_reserve_date']."<br>(".$get_date_str.")</td>
                        <td>".$rows['guestroom_reserve_payment_date']."</td>
                    </tr>
                    <tr>
                        <th colspan='3'>상품명</th>
                    </tr>
                    <tr>
                        <td colspan='3'>".$rows['guestroom_name']."</td>
                    </tr>
                    <tr>
                        <th>예약자</th>
                        <th colspan='2'>연락처</th>

                    </tr>
                    <tr>
                        <td>".$rows['guestroom_reserve_user_name']."</td>
                        <td colspan='2'>".$rows['guestroom_reserve_user_phone']."</td>

                    </tr>
                    <tr>
                        <th>결제수단</th>
                        <th colspan='2'>총결제금액</th>
                    </tr>
                    <tr>
                        <td>".$get_paymethod_type_str."</td>
                        <td colspan='2' class='total_fee'>".number_format($rows['guestroom_reserve_payment_total'])."원</td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <span class='box_btn_s blue'>
                                <a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static' data-whatever='".$rows['guestroom_reserve_code']."' data-target='".$data_target."'>수정</a>
                            </span>
                        </td>
                    </tr>
           ";

        }
				  // $serialnumber--;
		 			$num_a--;
			}
echo $html;
