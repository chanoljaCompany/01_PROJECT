<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";
include_once(G5_LIB_PATH.'/icode.lms.lib.php'); //LMS
// $con_ip = $_SERVER["REMOTE_ADDR"];
// if($con_ip == '118.37.116.172' || $con_ip == '180.68.0.7') {
//  $wr_test = 'AT';
// }


$reserve_code = isset($_REQUEST['reserve_code']) ? $_REQUEST['reserve_code'] : ''; //상품구분
$reserveData = get_reserve_data_client($reserve_code);
$hostData = get_host_info($reserveData['user_id']);
$get_paymethod_type_str = get_paymethod_type($reserveData['guestroom_reserve_payment_method']);//결제수단
$personnel_exp  =  explode("^",$reserveData['guestroom_reserve_user_personnel']);
$get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
$get_date_str = get_date_str($get_date_intval);
$get_option_data = get_option_data_client($reserve_code);
$get_reserve_status = get_reserve_status($reserveData['guestroom_reserve_status']);
// print_r($get_option_data);
if($reserveData['guestroom_reserve_payment_method'] == '1'){ //무통장입금일때
  $title_str_1 = "예약신청";
}
else if($reserveData['guestroom_reserve_payment_method'] == '2'){ //신용카드
  $title_str_1 = "예약";
}

if($reserveData['guestroom_type'] != '1'){
   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
   $reserve_use_start = $reserve_use_hour_ex['0'];
   $reserve_use_end = $reserve_use_hour_ex['1'];
   $reserve_str = " (".$reserve_use_start."시부터 " . $reserve_use_end ."시까지)";
}

    //예약사항 문자발송
    $send_hp_mb = "01083415338"; // 보내는 전화번호
// $recv_hp_mb = $hostData['handphone']; //  받는 전화번호(호스트(점주)연락처)
   $recv_hp_mb = "01024857220"; //  대표연락처.
   $send_hp = str_replace("-","",$send_hp_mb); // - 제거
   $recv_hp = str_replace("-","",$recv_hp_mb); // - 제거
   $send_number = "$send_hp";
   $recv_number = "$recv_hp";
   $sms_content = "";
   $sms_content .= "예약자(성함) ".$reserveData['guestroom_reserve_user_name']."\n";
   $sms_content .= "면허사항  ".$reserveData['reserve_license']."\n";
   $sms_content .= "운전자 연령  만".$reserveData['reserve_drive_age']."세\n";
   $sms_content .= "연락처  ".$reserveData['guestroom_reserve_user_phone']."\n";
   $sms_content .= "승차인원  성인:".$personnel_exp['0']."명/어린이".$personnel_exp['1']."명\n";
   $sms_content .= "예약차량  ".$reserveData['guestroom_name']."\n";
   $sms_content .= "이용일자  ".$reserveData['guestroom_reserve_date']."(".$get_date_str.")\n";
   foreach ($get_option_data as $key=>$value) {
    if($value['option_code']){  
    $sms_content .= "옵션:".$value['option_name']." 가격: ".number_format($value['option_fee'])."원\n";
    }
  }
//    $sms_content .= "옵션  ".$reserveData['guestroom_reserve_user_name']."\n";
   $sms_content .= "요청사항  \n".$reserveData['guestroom_reserve_user_request']."\n";
   $strDest = array();
   $strDest[0] = $recv_number;
   $SMS = new LMS; // SMS 연결
   $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], 1);
   $SMS->Add($strDest, $send_number, $config['cf_icode_id'],"","", iconv("utf-8", "euc-kr", stripslashes($sms_content)), "", 1);
   $sndResult = $SMS->Send();
//    if($wr_test){
//      echo "
//      $sndResult
//      ";
//      exit;
//  }
  $html ="";
  $html .= "<div class='top_notice'>
                <h3>".$title_str_1."이 완료되었습니다.</h3>";
                if($reserveData['guestroom_reserve_payment_method'] == '1'){
                    $html .= "<p><i class='fa fa-exclamation-circle' aria-hidden='true'></i> 인터넷 예약 특성상 입금시간이 지체되면 예약이 중복될수 있어 빠른입금 부탁드립니다.</p>
                <p><i class='fa fa-exclamation-circle' aria-hidden='true'></i> 입금완료 후 미리 준비할 수 있도록 이용전 통화하시는것이 좋습니다.</p>";
                }
                $html .= "</div>";
  if($conType == '1'){ //모바일
$html .= "<div class='table_wrap_mo'>
              <table class='table_1'>
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
                        $html .= "<td  colspan='3'>".$reserveData['guestroom_reserve_date']."<br>(".$get_date_str.")</td>";
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
                          <th colspan='3'>합계</th>
                      </tr>
                      <tr>
                          <td colspan='3'>".number_format($reserveData['guestroom_reserve_payment_total'])."원</td>
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
                  </tbody>
              </table>
          </div>";
  }
  else{//PC
  $html .= "<div class='table_wrap_pc'>
                <table class='table_1'>
                    <thead>
                        <tr>
                            <th colspan='7'>상품정보</th>
                        </tr>
                        <tr>
                            <th>상품명</th>
                            <th>예약일자</th>
                            <th>상품요금</th>
                            <th>할인금액</th>
                            <th>옵션요금</th>
                            <th>합계</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>".$reserveData['guestroom_name']."</td>";
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
                </table></div>";
    }//PC끝
  $html .= "<table class='table_2'>
              <thead>
                  <tr>
                      <th>예약자 정보</th>
                      <td>".$reserveData['guestroom_reserve_user_name']."</td>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <th>결제방법</th>
                      <td>".$get_paymethod_type_str."</td>
                  </tr>";
                  if($reserveData['guestroom_reserve_payment_method'] == '1'){

                  $html .= "<tr>
                      <th>입금정보</th>
                      <td>입금자명 : ".$reserveData['depositor']." <br> 입금계좌 : ".$reserveData['account_info']."</td>
                  </tr>";
                  }
                $html .= "<tr>
                      <th>예약상태</th>
                      <td>".$get_reserve_status."</td>
                  </tr>
                  <tr>
                      <th>예약번호</th>
                      <td>".$reserveData['guestroom_reserve_code']."</td>
                  </tr>
                  <tr>
                      <th>예약일자</th>";
                      if($reserveData['guestroom_type'] == '1'){
                        $html .= "<td>".$reserveData['guestroom_reserve_date']."(".$get_date_str.")</td>";
                      }
                      else{
                        $html .= "<td>".substr($reserveData['guestroom_reserve_date'],0,10).$reserve_str."</td>";
                      }
        $html .= "</tr>
                  <tr>
                      <th>예약자명</th>
                      <td>".$reserveData['guestroom_reserve_user_name']."</td>
                  </tr>
                  <tr>
                      <th>면허사항</th>
                      <td>".$reserveData['reserve_license']."</td>
                  </tr>
                  <tr>
                      <th>운전자연령(만)</th>
                      <td>만".$reserveData['reserve_drive_age']."세</td>
                  </tr>
                  
                  <tr>
                      <th>핸드폰</th>
                      <td>".$reserveData['guestroom_reserve_user_phone']."</td>
                  </tr>
                  <tr>
                      <th>승차인원</th>
                      <td>성인".$personnel_exp['0']."명/어린이".$personnel_exp['1']."명</td>
                  </tr>
                  <tr>
                      <th>요청사항</th>
                      <td>
                          ".nl2br($reserveData['guestroom_reserve_user_request'])."
                      </td>
                  </tr>
              </tbody>
          </table>
      ";
  echo"$html";
?>
