<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];

$divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : '1'; //상품구분
$adultPerson = isset($_REQUEST['adultPerson']) ? $_REQUEST['adultPerson'] : '0'; //성인인원수
$childPerson = isset($_REQUEST['childPerson']) ? $_REQUEST['childPerson'] : '0'; //아동인원수
$babyPerson = isset($_REQUEST['babyPerson']) ? $_REQUEST['babyPerson'] : '0'; //유아인원수
$reserve_name =  isset($_REQUEST['reserve_name']) ? $_REQUEST['reserve_name'] : ''; //예약자명
$reserve_phone =  isset($_REQUEST['reserve_phone']) ? $_REQUEST['reserve_phone'] : ''; //예약자연락처
$reserve_phone = preg_replace("/[^0-9]*/s", "", $reserve_phone);
$reserve_email =  isset($_REQUEST['reserve_email']) ? $_REQUEST['reserve_email'] : ''; //이메일
$reserve_request =  isset($_REQUEST['reserve_request']) ? $_REQUEST['reserve_request'] : ''; //요청사항
$guestroom_paymthod =  isset($_REQUEST['guestroom_paymthod']) ? $_REQUEST['guestroom_paymthod'] : ''; //결제방법
$account_info =  isset($_REQUEST['account_info']) ? $_REQUEST['account_info'] : ''; //무통장입금예금주
$depositor =  isset($_REQUEST['depositor']) ? $_REQUEST['depositor'] : ''; //무통장입금입금자명

$reserve_drive_age =  isset($_REQUEST['reserve_drive_age']) ? $_REQUEST['reserve_drive_age'] : ''; //운전자연령
$reserve_license =  isset($_REQUEST['reserve_license']) ? $_REQUEST['reserve_license'] : ''; //면허사항
$reserve_interval_day_val =  isset($_REQUEST['reserve_interval_day_val']) ? $_REQUEST['reserve_interval_day_val'] : ''; //예약일수

if($guestroom_paymthod == '2'){ //카드결제
  $account_info =  ''; //무통장입금예금주
  $depositor =  ''; //무통장입금입금자명
}

$reserve_date = isset($_REQUEST['dateStr']) ? $_REQUEST['dateStr'] : ''; //예약일자
$reserve_guestroom_code = isset($_REQUEST['select_guestroom_code']) ? $_REQUEST['select_guestroom_code'] : ''; //예약상품코드
$room_fee = isset($_REQUEST['select_guestroom_fee']) ? $_REQUEST['select_guestroom_fee'] : ''; //상품금액
$option_fee = isset($_REQUEST['select_option_fee']) ? $_REQUEST['select_option_fee'] : '0'; //옵션금액
$total_fee = isset($_REQUEST['total_fee_input']) ? $_REQUEST['total_fee_input'] : '0'; //총금액
$discount_fee = isset($_REQUEST['select_discount_fee']) ? $_REQUEST['select_discount_fee'] : '0'; //총금액
$select_option_size =  isset($_REQUEST['select_option_size']) ? $_REQUEST['select_option_size'] : ''; //

//인원
//옵션
//1. 예약가능여부 다시조회
$room_info_array_etc = room_info_array_etc($reserve_guestroom_code,$reserve_date,$divisionType);
// print_r($room_info_array_etc);
if($room_info_array_etc['0']['reserve_possible_value'] == 'Y') { //예약가능여부체크 : Y-예약불가.N-예약가능
         $re_code = "200";
         $msg = "예약이 불가능한 상품입니다.";
         $json = json_output($re_code,$msg);
         echo"$json";
         exit;
}
//예약인원
$add_room_fee = "0";
// $reserve_total_person = $adultPerson+$childPerson+$babyPerson;
// $addPerson = $reserve_total_person - $room_info_array_etc['0']['guestroom_personnel'];
$addPerson = '0';
// echo "
// addPerson > $addPerson <br>
// ";
if($addPerson > '0'){
  $add_room_fee = $addPerson*$room_info_array_etc['0']['guestroom_extra_charge']*$room_info_array_etc['0']['reserve_interval_day'];
  // echo "
  // $add_room_fee > $add_room_fee <br>
  // ";
}
// $reserve_total_room_fee = ()
$reserve_total_room_fee = $room_info_array_etc['0']['room_fee']+$add_room_fee-$discount_fee;
// echo "
// reserve_total_person > $reserve_total_person <br>
// add_room_fee > $add_room_fee <br>
// reserve_total_room_fee > $reserve_total_room_fee <br>
// room_fee > $room_fee <br>
// ";

if($reserve_total_room_fee != $room_fee-$discount_fee) { //상품가격비교
         $re_code = "200";
         $msg = "상품금액이 올바르지않습니다.";
         $json = json_output($re_code,$msg);
         echo"$json";
         exit;
}
// echo "
// select_option_size >> $select_option_size <br>
// ";
// $option_total_fee = "0";
// $amount = "0";
// for($i = 1 ; $i <= $select_option_size ; $i++) {
//   $optname = "optname_".$i;
//   $opthname = "opthname_".$i;
//   $amount = isset($_REQUEST[$optname]) ? $_REQUEST[$optname] : ''; //옵션선택수량
//   $optcode = isset($_REQUEST[$opthname]) ? $_REQUEST[$opthname] : ''; //옵션코드
//   if($amount){
//     $optionData = get_option_fee($optcode);
//     $option_total_fee += $optionData['option_fee']*$amount;
//   }
// echo "
// optname > $optname <br>
// amount > $amount <br>
// optcode > $optcode <br>
// ";
// }
// if($amount && ($option_total_fee != $option_fee)) { //상품가격비교
//          $re_code = "200";
//          $msg = "옵션금액이 올바르지않습니다.";
//          $json = json_output($re_code,$msg);
//          echo"$json";
//          exit;
// }

$guestroom_reserve_payment_total = $reserve_total_room_fee + $select_option_fee;//총결제금액 = 객실금액+옵션금액
// echo "
// guestroom_reserve_payment_total > $guestroom_reserve_payment_total <br>
// reserve_total_room_fee > $reserve_total_room_fee <br>
// select_option_fee > $select_option_fee <br>
// reserve_total_room_fee > $reserve_total_room_fee <br>
// total_fee > $total_fee <br>
// ";
if($guestroom_reserve_payment_total != $total_fee) { //총요금
         $re_code = "200";
         $msg = "총요금이 올바르지않습니다.";
         $json = json_output($re_code,$msg);
         echo"$json";
         exit;
}
// exit;
//DB입력
// guestroom_reserve_status : 객실예약상태
// 1. 준비
// 2. 예약신청
// 3. 예약완료
// 4. 취소요청
// 5. 취소완료
// guestroom_reserve_payment_status : 객실결제상태
// 1. 결제대기
// 2. 결제완료
// 3. 결제취소
// 4. 환불요청
// 5. 환불완료
//1.예약테이블 / 2.예약누적테이블
$reserve_code = time(); //예약번호
$guestroom_reserve_payment_date = '';//결제일자
$guestroom_reserve_complete_date = ''; //예약완료일자.
$guestroom_cancel_date = ''; //취소일자.
$guestroom_arrive_date = ''; //도착예정시간.
$guestroom_reserve_refund_request_date = ''; //환불신청일자.
$guestroom_reserve_refund_date = ''; //객실환불일자
$guestroom_reserve_user_id = ''; //객실예약자아이디',
$guestroom_reserve_user_personnel = $adultPerson."^".$childPerson."^".$babyPerson; //객실예약자인원',
$guestroom_reserve_user_additional_service = $adultPerson."^".$childPerson."^".$babyPerson; //객실부가서비$',
$guestroom_reserve_status = '1'; //예약상태
$guestroom_reserve_payment_status = '1';//객실결제상태

if($guestroom_paymthod == '1') {// 무통장입금일때
$guestroom_reserve_status = '2'; //예약상태
$guestroom_reserve_payment_status = '1';//객실결제상태
}

$guestroom_reserve_memo = ''; //객실관련메모',

// guestroom_refund_price varchar(20) NOT NULL COMMENT //객실환불금액',
// guestroom_fee int(11) NOT NULL,
// guestroom_add_fee int(11) NOT NULL,
$reserve_date_exp = explode("~",$reserve_date);
$reserve_use_hour = $room_info_array_etc['0']['guestroom_use_hour'];
$sql = "INSERT INTO $GUESTROOM_RESERVATION_TB
              (user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reception_date
              ,guestroom_reserve_status, guestroom_reserve_date,guestroom_reserve_date_start,guestroom_reserve_date_end,guestroom_arrive_date,guestroom_reserve_user_id
              ,guestroom_reserve_user_name ,guestroom_reserve_user_phone,guestroom_reserve_user_email,guestroom_reserve_user_personnel
              ,guestroom_reserve_user_request
              ,guestroom_reserve_payment_status,guestroom_reserve_payment_method
              ,guestroom_reserve_payment_date,guestroom_reserve_complete_date,guestroom_cancel_date
              ,guestroom_reserve_refund_request_date,guestroom_reserve_refund_date
              ,guestroom_reserve_payment_total,guestroom_fee,guestroom_add_fee,option_fee,account_info
              ,depositor,reserve_use_hour,discount_fee,guestroom_type,reserve_license,reserve_drive_age,reserve_interval_day_val
              )
              VALUES
              ('".$room_info_array_etc['0']['user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array_etc['0']['guestroom_name']."','$rdate'
               ,'$guestroom_reserve_status','$reserve_date','".$reserve_date_exp['0']."','".$reserve_date_exp['1']."','$guestroom_arrive_date','$guestroom_reserve_user_id'
               ,'$reserve_name' ,'$reserve_phone' ,'$reserve_email','$guestroom_reserve_user_personnel'
               ,'$reserve_request'
               ,'$guestroom_reserve_payment_status','$guestroom_paymthod'
               ,'$guestroom_reserve_payment_date','$guestroom_reserve_complete_date','$guestroom_cancel_date'
               ,'$guestroom_reserve_refund_request_date','$guestroom_reserve_refund_date'
               ,'$guestroom_reserve_payment_total','".$room_info_array_etc['0']['room_fee']."','$add_room_fee','$option_fee','$account_info'
               ,'$depositor','$reserve_use_hour','$discount_fee','1','$reserve_license','$reserve_drive_age','$reserve_interval_day_val'
             )
               ";
        // echo "
        // sql : $sql <br>
        // ";
        sql_query($sql);
        $dateStrExp =explode("~",$reserve_date);
        $startDate = $dateStrExp['0'];
        $endDate = $dateStrExp['1'];
        $dateintval = get_date_intval($reserve_date);

        for($i = 0; $i < $dateintval ; $i++){
            if($i > '0'){
              $startDate = date('Y-m-d', strtotime("+1 day", strtotime($startDate)));
            }
            else {
              $startDate = date('Y-m-d', strtotime("+0 day", strtotime($startDate)));
            }
            $sql = "INSERT INTO $GUESTROOM_RESERVATION_INFO_TB
                          (user_id,guestroom_reserve_code,guestroom_code, guestroom_name
                           ,guestroom_reserve_status,guestroom_reserve_date)
                          VALUES
                          ('".$room_info_array_etc['0']['user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array_etc['0']['guestroom_name']."'
                           ,'$guestroom_reserve_status','$startDate')";
                    // echo "
                    // sql : $sql <br>
                    // ";
            sql_query($sql);
        }
        $select_option = explode(",",$select_option);
        $select_option_size = sizeof($select_option);
        for($i = 0 ; $i <= $select_option_size ; $i++) {
          $option_exp = explode("^",$select_option[$i]);
          $optcode = $option_exp['0'];
          $option_divi = $option_exp['3'];
          $optionData = get_option_fee($optcode);
          if($option_divi == '2'){
            $optionF = $optionData['option_fee']*$dateintval;
          }
          else{
            $optionF = $optionData['option_fee'];
          }
            // print_r($optionData);
            $sql = "INSERT INTO $OPTION_RESERVATION_INFO_TB
                          (user_id,guestroom_reserve_code,option_code, option_name
                           ,option_amount,option_fee)
                          VALUES
                          ('".$room_info_array_etc['0']['user_id']."','$reserve_code','".$optionData['option_code']."','".$optionData['option_name']."'
                           ,'$dateintval','".$optionF."')";
//             echo "
// sql > $sql <br>
//             ";
            sql_query($sql);
        }
        //     $option_total_fee += $optionData['option_fee']*$amount;
        //     echo "
        // option_fee > $option_fee <br>
        //     ";

// exit;
if($guestroom_paymthod == '1'){//무통장입금일때...
        // include_once "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/biztalk.php";
        // $division = "choriforest001"; //입금요청
        // $reserve_code = $reserve_code;
        // include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
        // sleep(1);
        // $division = "choriforest004"; //예약접수-관리자발송
        // include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";

        $re_code = "100";
        $msg = "예약신청이 완료되었습니다.^".$reserve_code;
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
}
else { //PG결제일때..
        $re_code = "101";
        $msg = "예약신청이 완료되었습니다.^".$reserve_code;
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
}


?>
