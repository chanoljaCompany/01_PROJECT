<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";

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
// echo "
// guestroom_reserve_code : $guestroom_reserve_code <br>
// guestroom_reserve_user_name : $guestroom_reserve_user_name <br>
// guestroom_reserve_user_phone : $guestroom_reserve_user_phone <br>
// guestroom_arrive_date : $guestroom_arrive_date <br>
// guestroom_reserve_user_request : $guestroom_reserve_user_request <br>
// guestroom_paymthod : $guestroom_paymthod <br>
// depositor : $depositor <br>
// ";
  $sql = "SELECT * FROM $GUESTROOM_RESERVATION_CART_TB
           WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
  $result = sql_query($sql);
    while ($rows = sql_fetch_array($result)) {
        $sql = "INSERT INTO $GUESTROOM_RESERVATION_INFO_TB
              (pension_user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reception_date, guestroom_reserve_status, guestroom_reserve_date, guestroom_reserve_payment_date
              ,guestroom_reserve_complete_date, guestroom_cancel_date,guestroom_arrive_date,guestroom_reserve_user_id,guestroom_reserve_user_name
              ,guestroom_reserve_user_phone,guestroom_reserve_user_personnel,guestroom_reserve_user_additional_service,guestroom_reserve_user_request,guestroom_reserve_memo
              ,guestroom_reserve_payment_status,guestroom_reserve_payment_method,guestroom_reserve_payment_price,guestroom_onsite_payment_price,guestroom_reserve_sales_channel_id,guestroom_reserve_sales_channel_name
              ,guestroom_fee,guestroom_add_fee
              )
              VALUES
              ('$rows[pension_user_id]','$rows[guestroom_reserve_code]','$rows[guestroom_code]','$rows[guestroom_name]','$rows[guestroom_reception_date]','$RESERVATIONS_WAIT'
               ,'$rows[guestroom_reserve_date]','$rows[guestroom_reserve_payment_date]' ,'$rows[guestroom_reserve_complete_date]','$rows[guestroom_cancel_date]'
               ,'$guestroom_arrive_date','$rows[guestroom_reserve_user_id]','$guestroom_reserve_user_name'
               ,'$guestroom_reserve_user_phone','$rows[guestroom_reserve_user_personnel]','$rows[guestroom_reserve_user_additional_service]'
               ,'$guestroom_reserve_user_request','$rows[guestroom_reserve_memo]','$PAYMENT_WAITING'
               ,'$PATYMENT_MEHTOD_B','$rows[guestroom_reserve_payment_price]','$rows[guestroom_onsite_payment_price]'
               ,'$rows[guestroom_reserve_sales_channel_id]','$rows[guestroom_reserve_sales_channel_name]','$rows[guestroom_fee]','$rows[guestroom_add_fee]')
               ";
        // echo "
        // sql : $sql <br>
        // ";
        sql_query($sql);
     }
     //카드비우기...
     $sql = "DELETE FROM $GUESTROOM_RESERVATION_CART_TB WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
     sql_query($sql);
     echo"ok";
     exit;



?>
