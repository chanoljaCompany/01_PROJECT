<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
// include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";

session_name( md5( $SITE_NAME_CLIENT ) );
session_start();
$session_id_client = $_SESSION["session_id_client"];


$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
$GUESTROOM_RESERVATION_VIEW_TB = "guestroom_reservation_view";
$GUESTROOM_RESERVATION_CODE_TB = "guestroom_reservation_code";

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$guestroom_reserve_code = $_REQUEST["guestroom_reserve_code"];
$guestroom_reserve_user_name = $_REQUEST["guestroom_reserve_user_name"];
$guestroom_reserve_user_phone = $_REQUEST["guestroom_reserve_user_phone"];
$guestroom_arrive_date = $_REQUEST["guestroom_arrive_date"];
$guestroom_reserve_user_request = $_REQUEST["guestroom_reserve_user_request"];
$guestroom_paymthod = $_REQUEST["guestroom_paymthod"];
$depositor = $_REQUEST["depositor"];
if($guestroom_paymthod == '1'){
  $guestroom_paymthod_str = $PATYMENT_MEHTOD_B;
  $guestroom_reserve_status = $RESERVATIONS_WAIT;
  $guestroom_reserve_payment_status = $PAYMENT_WAITING;
  $guestroom_reserve_payment_date = "";
  $guestroom_reserve_complete_date	= "";
}else if($guestroom_paymthod == '2'){
  $guestroom_paymthod_str = $PATYMENT_MEHTOD_C;
  $guestroom_reserve_status = $RESERVATIONS_COMPLETE;
  $guestroom_reserve_payment_status = $PAYMENT_COMPLETE;
  $guestroom_reserve_payment_date = $rdate;
  $guestroom_reserve_complete_date	= $rdate;
}
// echo "
// guestroom_reserve_code : $guestroom_reserve_code <br>
// guestroom_reserve_user_name : $guestroom_reserve_user_name <br>
// guestroom_reserve_user_phone : $guestroom_reserve_user_phone <br>
// guestroom_arrive_date : $guestroom_arrive_date <br>
// guestroom_reserve_user_request : $guestroom_reserve_user_request <br>
// guestroom_paymthod : $guestroom_paymthod <br>
// depositor : $depositor <br>
// ";
  $sql = "INSERT INTO $GUESTROOM_RESERVATION_CODE_TB
          (pension_user_id,reserve_code)
          VALUES
          ('$session_userid','$guestroom_reserve_code')
          ";
  sql_query($sql);
  $sql = "SELECT * FROM $GUESTROOM_RESERVATION_CART_TB
           WHERE reserve_code = '$guestroom_reserve_code'";
  $result = sql_query($sql);
    while ($rows = sql_fetch_array($result)) {

        $sql = "INSERT INTO $GUESTROOM_RESERVATION_INFO_TB
              (pension_user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reception_date
              ,guestroom_reserve_status, guestroom_reserve_date,guestroom_arrive_date,guestroom_reserve_user_id
              ,guestroom_reserve_user_name ,guestroom_reserve_user_phone,guestroom_reserve_user_personnel
              ,guestroom_reserve_user_personnel_child,user_personnel_standard
              ,guestroom_reserve_user_request ,guestroom_reserve_payment_status,guestroom_reserve_payment_method
              ,guestroom_fee,guestroom_add_fee,guestroom_reserve_payment_date,guestroom_reserve_complete_date
              )
              VALUES
              ('$rows[pension_user_id]','$rows[reserve_code]','$rows[room_code]','$rows[room_name]','$rows[reception_date]'
               ,'$guestroom_reserve_status','$rows[reserve_date]','$guestroom_arrive_date','$rows[guestroom_reserve_user_id]'
               ,'$guestroom_reserve_user_name' ,'$guestroom_reserve_user_phone'
               ,'$rows[user_personnel]','$rows[user_personnel_child]','$rows[user_personnel_standard]'
               ,'$guestroom_reserve_user_request','$guestroom_reserve_payment_status','$guestroom_paymthod_str'
               ,'$rows[room_fee]','$rows[extra_charge]','$guestroom_reserve_payment_date','$guestroom_reserve_complete_date')
               ";
        // echo "
        // sql : $sql <br>
        // ";
        sql_query($sql);
     }
//      echo "
// session_id_client >>> $session_id_client <br>
//      ";
     data_init($GUESTROOM_RESERVATION_CART_TB,$session_id_client); //cart테이블 기존내용 삭제.
     data_init($GUESTROOM_RESERVATION_VIEW_TB,$session_id_client); //view테이블 기존내용 삭제.

     //카트비우기...
     // $sql = "DELETE FROM $GUESTROOM_RESERVATION_CART_TB WHERE reserve_code = '$guestroom_reserve_code'";
     // sql_query($sql);
     //카트비우기...
     // $sql = "DELETE FROM $GUESTROOM_RESERVATION_VIEW_TB WHERE reserve_code = '$guestroom_reserve_code'";
     // sql_query($sql);
//      echo"
// guestroom_paymthod >>> $guestroom_paymthod <br>
//      ";
    if($guestroom_paymthod == '1'){
     echo"ok";
     exit;
   }else if($guestroom_paymthod == '2'){
     echo "<script>alert('예약이 완료되었습니다..');</script>";
     echo "<meta http-equiv='Refresh' content='0; URL=./reservation_calendar_finish.php?guestroom_reserve_code=$guestroom_reserve_code'>";
     exit;
   }



?>
