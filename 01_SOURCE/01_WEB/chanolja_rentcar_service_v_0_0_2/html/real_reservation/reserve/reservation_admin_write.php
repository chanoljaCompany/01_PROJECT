<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];

// $divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : ''; //상품구분
$guestroom_type = "1";
$guestroom_host = isset($_REQUEST['guestroom_host']) ? $_REQUEST['guestroom_host'] : ''; //상품구분
$reserve_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : ''; //예약상품코드
$guestroom_reserve_status = isset($_REQUEST['guestroom_reserve_status']) ? $_REQUEST['guestroom_reserve_status'] : ''; //예약상품코드
$guestroom_reserve_payment_status = isset($_REQUEST['guestroom_reserve_payment_status']) ? $_REQUEST['guestroom_reserve_payment_status'] : ''; //예약상품코드
$guestroom_reserve_date = isset($_REQUEST['guestroom_reserve_date']) ? $_REQUEST['guestroom_reserve_date'] : ''; //예약상품코드
$reserve_name = isset($_REQUEST['reserve_name']) ? $_REQUEST['reserve_name'] : ''; //예약상품코드
$reserve_phone = isset($_REQUEST['reserve_phone']) ? $_REQUEST['reserve_phone'] : ''; //예약상품코드
$adultPerson = isset($_REQUEST['adperson']) ? $_REQUEST['adperson'] : '0'; //예약상품코드
$childPerson = isset($_REQUEST['chperson']) ? $_REQUEST['chperson'] : '0'; //예약상품코드
$babyPerson = isset($_REQUEST['baadperson']) ? $_REQUEST['baadperson'] : '0'; //예약상품코드
$guestroom_paymthod = isset($_REQUEST['guestroom_paymthod']) ? $_REQUEST['guestroom_paymthod'] : ''; //예약상품코드
$depositor = isset($_REQUEST['depositor']) ? $_REQUEST['depositor'] : ''; //예약상품코드
$guestroom_reserve_payment_total = isset($_REQUEST['guestroom_reserve_payment_total']) ? $_REQUEST['guestroom_reserve_payment_total'] : ''; //예약상품코드
$reserve_request = isset($_REQUEST['guestroom_reserve_user_request']) ? $_REQUEST['guestroom_reserve_user_request'] : ''; //예약상품코드
$guestroom_reserve_memo = isset($_REQUEST['guestroom_reserve_memo']) ? $_REQUEST['guestroom_reserve_memo'] : ''; //예약상품코드

// 예약 시작일
$ydate = substr($guestroom_reserve_date,0,4);
$mdate = substr($guestroom_reserve_date,5,2);
$ddate = substr($guestroom_reserve_date,8,2);
$sreserve_date = $ydate."-".$mdate."-".$ddate;

//예약종료일
$eydate = substr($guestroom_reserve_date,13,4);
$emdate = substr($guestroom_reserve_date,18,2);
$eddate = substr($guestroom_reserve_date,21,2);
$ereserve_date = $eydate."-".$emdate."-".$eddate;

// $ereserve_date = date('Y-m-d', strtotime("+1 day", strtotime($sreserve_date)));
// $ereserve_date = $ydate."-".$mdate."-".$ddate;
$reserve_date = $sreserve_date."~".$ereserve_date;
// echo "
// reserve_date > $reserve_date <br>
// ";
// $reserve_date = str_replace("-","~", $guestroom_reserve_date);
// $reserve_date = str_replace("/","-", $reserve_date);
if($guestroom_paymthod != '1'){ //카드결제
  $account_info =  ''; //무통장입금예금주
  $depositor =  ''; //무통장입금입금자명
}
//인원
//옵션
//1. 예약가능여부 다시조회
$room_info_array_etc = room_info_array_etc($reserve_guestroom_code,$reserve_date,$guestroom_type);
// print_r($room_info_array_etc);
if($room_info_array_etc['0']['reserve_possible_value'] == 'Y') { //예약가능여부체크 : Y-예약불가.N-예약가능
         $re_code = "200";
         $msg = "중복된 예약이 있어 예약이 불가능합니다.";
         $json = json_output($re_code,$msg);
         echo"$json";
         exit;
}

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
              ,guestroom_reserve_payment_total,guestroom_fee,guestroom_add_fee
              ,option_fee,account_info,depositor,reserve_use_hour,guestroom_reserve_memo,guestroom_type
              )
              VALUES
              ('".$_SESSION['session_user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array_etc['0']['guestroom_name']."','$rdate'
               ,'$guestroom_reserve_status','$reserve_date','".$reserve_date_exp['0']."','".$reserve_date_exp['1']."','$guestroom_arrive_date','$guestroom_reserve_user_id'
               ,'$reserve_name' ,'$reserve_phone' ,'$reserve_email','$guestroom_reserve_user_personnel'
               ,'$reserve_request'
               ,'$guestroom_reserve_payment_status','$guestroom_paymthod'
               ,'$guestroom_reserve_payment_date','$guestroom_reserve_complete_date','$guestroom_cancel_date'
               ,'$guestroom_reserve_refund_request_date','$guestroom_reserve_refund_date'
               ,'$guestroom_reserve_payment_total','".$room_info_array_etc['0']['room_fee']."','$guestroom_reserve_payment_total'
               ,'$option_fee','$account_info','$depositor','$reserve_use_hour','$guestroom_reserve_memo','1'
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
//         echo "
// reserve_date > $reserve_date <br>
// dateintval > $dateintval <br>
//         ";
        if($dateintval == '0'){
            $startDate = date('Y-m-d', strtotime("+0 day", strtotime($startDate)));
        $sql = "INSERT INTO $GUESTROOM_RESERVATION_INFO_TB
                        (user_id,guestroom_reserve_code,guestroom_code, guestroom_name
                        ,guestroom_reserve_status,guestroom_reserve_date)
                        VALUES
                        ('".$_SESSION['session_user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array_etc['0']['guestroom_name']."'
                        ,'$guestroom_reserve_status','$startDate')";
                // echo "
                // sql : $sql <br>
                // ";
        sql_query($sql);
        }
        else{
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
                            ('".$_SESSION['session_user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array_etc['0']['guestroom_name']."'
                            ,'$guestroom_reserve_status','$startDate')";
                        // echo "
                        // sql : $sql <br>
                        // ";
                sql_query($sql);
            }
        }
        $re_code = "100";
        $msg = "예약을 완료하였습니다.";
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
?>
