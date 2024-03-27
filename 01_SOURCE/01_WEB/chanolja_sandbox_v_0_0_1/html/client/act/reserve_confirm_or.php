<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";


$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : ''; //상품구분
$resevervation_inquiry_name = isset($_REQUEST['resevervation_inquiry_name']) ? $_REQUEST['resevervation_inquiry_name'] : ''; //예약일자
$resevervation_inquiry_phone = isset($_REQUEST['resevervation_inquiry_phone']) ? $_REQUEST['resevervation_inquiry_phone'] : ''; //예약상품코드
$resevervation_inquiry_phone = preg_replace("/[^0-9]*/s", "", $resevervation_inquiry_phone);
// $division = "reserve_confirm";
// $resevervation_inquiry_name = "김유혁";
// $resevervation_inquiry_phone = "01047126104";
if($division == 'reserve_confirm'){
//   $reserveData  = get_reserve_confirm_data($resevervation_inquiry_name,$resevervation_inquiry_phone);
//   $reserveData_size = sizeof($reserveData);
//   $html ="";
//   // if($reserveData)
//   if($reserveData_size <= '0'){
//       echo"$html";
//       exit;
//   }
//   $get_paymethod_type_str = get_paymethod_type($reserveData['guestroom_reserve_payment_method']);//결제수단
//   $personnel_exp  =  explode("^",$reserveData['guestroom_reserve_user_personnel']);
//   $get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
//   $get_date_str = get_date_str($get_date_intval);
//   $get_option_data = get_option_data_client($reserveData['guestroom_reserve_code']);

//   $get_reserve_status = get_reserve_status($reserveData['guestroom_reserve_status']);

//   if($reserveData['guestroom_reserve_payment_method'] == '1'){ //무통장입금일때
//     $title_str_1 = "예약신청";
//   }
//   else if($reserveData['guestroom_reserve_payment_method'] == '2'){ //신용카드
//     $title_str_1 = "예약";
//   }

//   if($reserveData['guestroom_type'] != '1'){
//      $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
//      $reserve_use_start = $reserve_use_hour_ex['0'];
//      $reserve_use_end = $reserve_use_hour_ex['1'];
//      $reserve_str = " (".$reserve_use_start."시부터 " . $reserve_use_end ."시까지)";

//   }

$rsql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
WHERE 1=1
AND guestroom_reserve_user_name = '".$resevervation_inquiry_name."'
AND guestroom_reserve_user_phone = '".$resevervation_inquiry_phone."'
AND guestroom_reserve_status IN (2,3,4,5)
";
// echo "
// rsql > $rsql <br>
// ";
$rresult = sql_query($rsql);

  if($conType == '1'){ //모바일
   $html .= "<div class='table_wrap_mo'>
              <table class='table_inquiry_1'>
                  <tbody>
                      <tr>
                          <th colspan='3'>상품정보</th>
                      </tr>
                      <tr>
                          <th colspan='3'>상품명</th>
                      </tr>
                      <tr>
                          <td colspan='3'>".$reserveData['guestroom_name']."</td>
                      </tr>
                      <tr>
                          <th colspan='3'>예약일자</th>
                      </tr>
                      <tr>";
                        if($reserveData['guestroom_type'] == '1'){
                          $html .= "<td  colspan='3'>".$reserveData['guestroom_reserve_date']."(".$get_date_str.")</td>";
                        }
                        else{
                          $html .= "<td  colspan='3'>".substr($reserveData['guestroom_reserve_date'],0,10).$reserve_str."</td>";
                        }
            $html .= "</tr>
                      <tr>
                          <th>상품요금</th>
                          <th>할인요금</th>
                          <th>옵션요금</th>
                      </tr>
                      <tr>
                          <td>".number_format($reserveData['guestroom_fee'])."원</td>
                          <td>".number_format($reserveData['discount_fee'])."원</td>
                          <td>".number_format($reserveData['option_fee'])."원</td>
                      </tr>
                      <tr>
                      <th colspan='3'>선택옵션</th>
                      </tr>
                      <tr>
                          <td colspan='3'>";
                          foreach ($get_option_data as $key=>$value) {
                            if($value['option_code']){  
                            $html .= "옵션명 : ".$value['option_name']."
                            옵션가격: ".number_format($value['option_fee'])."원<br>";
                            }
                          }
            $html .= "</td>
                      </tr>
                      <tr>
                          <th colspan='3'>합계</th>
                      </tr>
                      <tr>
                          <td colspan='3'>".number_format($reserveData['guestroom_reserve_payment_total'])."원</td>
                      </tr>
                      <tr>
                          <th colspan='3'><a href='javascript:void(0)' onclick=\"reserve_confirm_detail('".$reserveData['guestroom_reserve_code']."')\">상세보기</a></th>
                      </tr>
                  </tbody>
              </table>
          </div>";
  }
  else{//PC
  while($reserveData = sql_fetch_array($rresult)){
    $get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
    $get_date_str = get_date_str($get_date_intval);
    $get_option_data = get_option_data_client($reserveData['guestroom_reserve_code']);
  $html .= "<div class='table_wrap_pc'>
              
                <table class='table_inquiry_1'>
                    <thead>
                        <tr>
                            <th colspan='7'>예약정보</th>
                        </tr>
                        <tr>
                            <th>상품명</th>
                            <th>예약일자</th>
                            <th>상품요금</th>
                            <th>할인요금</th>
                            <th>옵션요금</th>
                            <th>합계</th>
                            <th>상세</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href='javascript:void(0)' onclick=\"reserve_confirm_detail('".$reserveData['guestroom_reserve_code']."')\">".$reserveData['guestroom_name']."</td>";
                            if($reserveData['guestroom_type'] == '1'){
                              $html .= "<td>".$reserveData['guestroom_reserve_date']."<br>(".$get_date_str.")</td>";
                            }
                            else{
                              $html .= "<td>".substr($reserveData['guestroom_reserve_date'],0,10).$reserve_str."</td>";
                            }
                  $html .= "<td>".number_format($reserveData['guestroom_fee'])."원</td>
                            <td>".number_format($reserveData['discount_fee'])."원</td>
                            <td>".number_format($reserveData['option_fee'])."원</td>
                            <td>".number_format($reserveData['guestroom_reserve_payment_total'])."원</td>
                            <td><a href='javascript:void(0)' onclick=\"reserve_confirm_detail('".$reserveData['guestroom_reserve_code']."')\">상세보기</td>
                        </tr>
                        <tr>
                        <td colspan='7'>
                        선택옵션 : <br>";
                        foreach ($get_option_data as $key=>$value) {
                          if($value['option_code']){  
                          $html .= "옵션명 : ".$value['option_name']."
                          옵션가격: ".number_format($value['option_fee'])."원<br>";
                          }
                        }
                $html .= "</td>
                        </tr>
                    </tbody>
                </table>
              </div>
              ";
              $html .= "<div id='reserve_confirm_detail_data'></div>";
     }
    }//PC끝
//   $html .= "<table class='table_inquiry_2'>
//               <thead>
//                   <tr>
//                       <th>예약자 정보</th>
//                       <td>".$reserveData['guestroom_reserve_user_name']."</td>
//                   </tr>
//               </thead>
//               <tbody>
//                   <tr>
//                       <th>결제방법</th>
//                       <td>".$get_paymethod_type_str."</td>
//                   </tr>";
//                   if($reserveData['guestroom_reserve_payment_method'] == '1'){

//                   $html .= "<tr>
//                       <th>입금정보</th>
//                       <td>입금자명 : ".$reserveData['depositor']." <br> 입금계좌 : ".$reserveData['account_info']."</td>
//                   </tr>";
//                   }
//                 $html .= "<tr>
//                       <th>예약상태</th>
//                       <td>".$get_reserve_status."</td>
//                   </tr>
//                   <tr>
//                       <th>예약번호</th>
//                       <td>".$reserveData['guestroom_reserve_code']."</td>
//                   </tr>
//                   <tr>
//                       <th>예약일자</th>";
//                       if($reserveData['guestroom_type'] == '1'){
//                         $html .= "<td>".$reserveData['guestroom_reserve_date']."(".$get_date_str.")</td>";
//                       }
//                       else{
//                         $html .= "<td>".substr($reserveData['guestroom_reserve_date'],0,10).$reserve_str."</td>";
//                       }
//           $html .= "</tr>
//                   <tr>
//                       <th>예약자명</th>
//                       <td>".$reserveData['guestroom_reserve_user_name']."</td>
//                   </tr>
//                   <tr>
//                       <th>면허사항</th>
//                       <td>".$reserveData['reserve_license']."</td>
//                   </tr>
//                   <tr>
//                       <th>운전자연령(만)</th>
//                       <td>만".$reserveData['reserve_drive_age']."세</td>
//                   </tr>
//                   <tr>
//                       <th>핸드폰</th>
//                       <td>".$reserveData['guestroom_reserve_user_phone']."</td>
//                   </tr>
//                   <tr>
//                       <th>승차인원</th>
//                       <td>성인".$personnel_exp['0']."명/어린이".$personnel_exp['1']."명</td>
//                   </tr>
//                   <tr>
//                       <th>요청사항</th>
//                       <td>
//                           ".nl2br($reserveData['guestroom_reserve_user_request'])."
//                       </td>
//                   </tr>
//               </tbody>
//           </table>
//           <div id='reserve_confirm_detail_data'></div>
//       ";
  
  echo"$html";

}

?>
