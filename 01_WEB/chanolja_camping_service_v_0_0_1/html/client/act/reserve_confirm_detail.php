<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$guestroom_reserve_code = isset($_REQUEST['guestroom_reserve_code']) ? $_REQUEST['guestroom_reserve_code'] : ''; //상품구분
$get_reserve_confirm_detail_data = get_reserve_confirm_detail_data($guestroom_reserve_code);
$get_paymethod_type_str = get_paymethod_type($get_reserve_confirm_detail_data['guestroom_reserve_payment_method']);//결제수단
  $personnel_exp  =  explode("^",$get_reserve_confirm_detail_data['guestroom_reserve_user_personnel']);
  $get_date_intval = get_date_intval($get_reserve_confirm_detail_data['guestroom_reserve_date']);
  $get_date_str = get_date_str($get_date_intval);
  $get_option_data = get_option_data_client($get_reserve_confirm_detail_data['guestroom_reserve_code']);

  $get_reserve_status = get_reserve_status($get_reserve_confirm_detail_data['guestroom_reserve_status']);

  if($get_reserve_confirm_detail_data['guestroom_reserve_payment_method'] == '1'){ //무통장입금일때
    $title_str_1 = "예약신청";
  }
  else if($get_reserve_confirm_detail_data['guestroom_reserve_payment_method'] == '2'){ //신용카드
    $title_str_1 = "예약";
  }

  if($get_reserve_confirm_detail_data['guestroom_type'] != '1'){
     $reserve_use_hour_ex = explode("~",$get_reserve_confirm_detail_data['reserve_use_hour']);
     $reserve_use_start = $reserve_use_hour_ex['0'];
     $reserve_use_end = $reserve_use_hour_ex['1'];
     $reserve_str = " (".$reserve_use_start."시부터 " . $reserve_use_end ."시까지)";

  }

$html .= "<table class='table_inquiry_2'>
              <thead>
                  <tr>
                      <th>예약자 정보</th>
                      <td>".$get_reserve_confirm_detail_data['guestroom_reserve_user_name']."</td>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th>결제방법</th>
                      <td>".$get_paymethod_type_str."</td>
                  </tr>";
                  if($get_reserve_confirm_detail_data['guestroom_reserve_payment_method'] == '1'){

                  $html .= "<tr>
                      <th>입금정보</th>
                      <td>입금자명 : ".$get_reserve_confirm_detail_data['depositor']." <br> 입금계좌 : ".$get_reserve_confirm_detail_data['account_info']."</td>
                  </tr>";
                  }
                $html .= "<tr>
                      <th>예약상태</th>
                      <td>".$get_reserve_status."</td>
                  </tr>
                  <tr>
                      <th>예약번호</th>
                      <td>".$get_reserve_confirm_detail_data['guestroom_reserve_code']."</td>
                  </tr>
                  <tr>
                      <th>예약일자</th>";
                      if($get_reserve_confirm_detail_data['guestroom_type'] == '1'){
                        $html .= "<td>".$get_reserve_confirm_detail_data['guestroom_reserve_date']."(".$get_date_str.")</td>";
                      }
                      else{
                        $html .= "<td>".substr($get_reserve_confirm_detail_data['guestroom_reserve_date'],0,10).$reserve_str."</td>";
                      }
          $html .= "</tr>
                  <tr>
                      <th>예약자명</th>
                      <td>".$get_reserve_confirm_detail_data['guestroom_reserve_user_name']."</td>
                  </tr>
                  <tr>
                      <th>면허사항</th>
                      <td>".$get_reserve_confirm_detail_data['reserve_license']."</td>
                  </tr>
                  <tr>
                      <th>운전자연령(만)</th>
                      <td>만".$get_reserve_confirm_detail_data['reserve_drive_age']."세</td>
                  </tr>
                  <tr>
                      <th>핸드폰</th>
                      <td>".$get_reserve_confirm_detail_data['guestroom_reserve_user_phone']."</td>
                  </tr>
                  <tr>
                      <th>승차인원</th>
                      <td>성인".$personnel_exp['0']."명/어린이".$personnel_exp['1']."명</td>
                  </tr>
                  <tr>
                      <th>요청사항</th>
                      <td>
                          ".nl2br($get_reserve_confirm_detail_data['guestroom_reserve_user_request'])."
                      </td>
                  </tr>
              </tbody>
          </table>
      ";
  echo"$html";
  ?>