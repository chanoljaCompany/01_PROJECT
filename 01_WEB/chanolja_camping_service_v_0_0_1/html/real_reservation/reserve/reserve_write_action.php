<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

session_start();

// function get_date_diff($d1, $d2) {
// 	$temp = new DateTime($d1);
// 	$d = $temp->diff( new DateTime($d2) );
// 	$sign = ($d->invert==0)?1:-1;
// 	return $d->days*$sign;
// }
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$division = trim(isset($_REQUEST['division'])) ? $_REQUEST['division'] : '';//분류
$guestroom_reserve_code = trim(isset($_REQUEST['guestroom_reserve_code'])) ? $_REQUEST['guestroom_reserve_code'] : '';//분류
$guestroom_reserve_status = trim(isset($_REQUEST['guestroom_reserve_status'])) ? $_REQUEST['guestroom_reserve_status'] : '';//분류
$guestroom_reserve_status_or = trim(isset($_REQUEST['guestroom_reserve_status_or'])) ? $_REQUEST['guestroom_reserve_status_or'] : '';//분류
$guestroom_reserve_payment_status = trim(isset($_REQUEST['guestroom_reserve_payment_status'])) ? $_REQUEST['guestroom_reserve_payment_status'] : '';//분류
$guestroom_reserve_payment_date = trim(isset($_REQUEST['guestroom_reserve_payment_date'])) ? $_REQUEST['guestroom_reserve_payment_date'] : '';//분류
$guestroom_cancel_date = trim(isset($_REQUEST['guestroom_cancel_date'])) ? $_REQUEST['guestroom_cancel_date'] : '';//분류
$guestroom_reserve_payment_price = trim(isset($_REQUEST['guestroom_reserve_payment_price'])) ? $_REQUEST['guestroom_reserve_payment_price'] : '';//분류
$guestroom_reserve_user_request = trim(isset($_REQUEST['guestroom_reserve_user_request'])) ? $_REQUEST['guestroom_reserve_user_request'] : '';//분류
$guestroom_reserve_memo = trim(isset($_REQUEST['guestroom_reserve_memo'])) ? $_REQUEST['guestroom_reserve_memo'] : '';//분류
$dataUser = trim(isset($_REQUEST['dataUser'])) ? $_REQUEST['dataUser'] : '';//분류
if($_SESSION['session_user_level'] != 'A'){
    $user_str = $_SESSION['session_user_id'];
}
else{
    $user_str = $dataUser;
}

if($division == 'direct_reserve_input') { // 예액직접등록
/*객실정보입력*/
$start_date = date("Y-m-d", strtotime("-1 day", strtotime($range_start)));
$guestroom_cancel_date = "";
if($guestroom_reserve_payment_status == '3'){
     $guestroom_reserve_payment_date = $rdate;
}else{
     $guestroom_reserve_payment_date = "";
}

for($i = 0 ; $i <= $diff_day ; $i++) {
	$start_date = date("Y-m-d", strtotime("+1 day", strtotime($start_date)));
	$sql = "INSERT INTO $GUESTROOM_RESERVATION_TB
        (user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reception_date, guestroom_reserve_status, guestroom_reserve_date, guestroom_reserve_payment_date
        ,guestroom_reserve_complete_date, guestroom_cancel_date,guestroom_arrive_date,guestroom_reserve_user_id,guestroom_reserve_user_name
        ,guestroom_reserve_user_phone,guestroom_reserve_user_personnel,guestroom_reserve_user_additional_service,guestroom_reserve_user_request,guestroom_reserve_memo
        ,guestroom_reserve_payment_status,guestroom_reserve_payment_method,guestroom_reserve_payment_price,guestroom_onsite_payment_price,guestroom_reserve_sales_channel_id,guestroom_reserve_sales_channel_name
        )
        VALUES
        ('".$user_str."','$guestroom_reserve_code','$guestroom_code','$guestroom_name','$rdate','1','$start_date','$guestroom_reserve_payment_date'
         ,'$guestroom_reserve_complete_date','$guestroom_cancel_date','$guestroom_arrive_date','$guestroom_reserve_user_id','$guestroom_reserve_user_name'
         ,'$guestroom_reserve_user_phone','$guestroom_reserve_user_personnel','$guestroom_reserve_user_additional_service','$guestroom_reserve_user_request','$guestroom_reserve_memo'
         ,'$guestroom_reserve_payment_status','$guestroom_reserve_payment_method','$guestroom_reserve_payment_price','$guestroom_onsite_payment_price','$guestroom_reserve_sales_channel_id','$guestroom_reserve_sales_channel_name')";
// echo "
// sql : $sql <br>
// ";
 $result = sql_query($sql);
   // echo"ok";
}

$year = substr($start_date,0,4);
$month = intval(substr($start_date,5,2));
$day = intval(substr($start_date,8,2));
// echo "
// year >>> $year <br>
// month >>> $month <br>
// day >>> $day <br>
// ";

   // echo "<script>alert('객실예약을 등록하였습니다.');</script>";
   // echo "<meta http-equiv='Refresh' content='0; URL=reservation_calendar.php?top_menu_id=4001&left_menu_id=001&year=".$year."&month=".$month."&day=".$day."'>";
   // exit;
	 echo"ok";
 }
 else if($division == 'reservation_modify' || $division == 'alim_reserve') {	//예약수정
   /*예약정보수정*/
   $guestroom_reserve_code = trim(isset($_REQUEST['guestroom_reserve_code'])) ? $_REQUEST['guestroom_reserve_code'] : '';//분류
   $guestroom_reserve_status = trim(isset($_REQUEST['guestroom_reserve_status'])) ? $_REQUEST['guestroom_reserve_status'] : '';//분류
   $guestroom_reserve_payment_status = trim(isset($_REQUEST['guestroom_reserve_payment_status'])) ? $_REQUEST['guestroom_reserve_payment_status'] : '';//분류
   $guestroom_reserve_payment_date = trim(isset($_REQUEST['guestroom_reserve_payment_date'])) ? $_REQUEST['guestroom_reserve_payment_date'] : '';//분류
   $guestroom_cancel_date = trim(isset($_REQUEST['guestroom_cancel_date'])) ? $_REQUEST['guestroom_cancel_date'] : '';//분류
   $guestroom_reserve_payment_total = trim(isset($_REQUEST['guestroom_reserve_payment_total'])) ? $_REQUEST['guestroom_reserve_payment_total'] : '';//분류
   $guestroom_reserve_user_request = trim(isset($_REQUEST['guestroom_reserve_user_request'])) ? $_REQUEST['guestroom_reserve_user_request'] : '';//분류
   $guestroom_reserve_memo = trim(isset($_REQUEST['guestroom_reserve_memo'])) ? $_REQUEST['guestroom_reserve_memo'] : '';//분류
   if($division == 'reservation_modify'){
      $modifyUser = $user_str;
   }
   else if($division == 'alim_reserve'){
      $modifyUser = $SITENAME;
   }
   $sql = "UPDATE $GUESTROOM_RESERVATION_TB
           SET
            guestroom_reserve_status='$guestroom_reserve_status'
           ,guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
           ,guestroom_reserve_payment_date='$guestroom_reserve_payment_date'
           ,guestroom_cancel_date='$guestroom_cancel_date'
           ,guestroom_reserve_payment_total='$guestroom_reserve_payment_total'
           ,guestroom_reserve_user_request='$guestroom_reserve_user_request'
		   ,guestroom_reserve_memo = '$guestroom_reserve_memo'
           WHERE 1=1
           AND user_id = '".$modifyUser."'
			AND guestroom_reserve_code = '$guestroom_reserve_code'
          ";
  sql_query($sql);

  $sql_sub = "UPDATE $GUESTROOM_RESERVATION_INFO_TB
          SET
           guestroom_reserve_status='$guestroom_reserve_status'
          WHERE 1=1
          AND user_id = '".$modifyUser."'
          AND guestroom_reserve_code = '$guestroom_reserve_code'
         ";
 sql_query($sql_sub);

 //알림톡
// if($guestroom_reserve_status_or != $guestroom_reserve_status){
//   if($guestroom_reserve_status == '3'){
//     include_once "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/biztalk.php";
//     $division = "choriforest002"; //예약완료
//     $reserve_code = $guestroom_reserve_code;
//     include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
//   }
//   else if($guestroom_reserve_status == '5'){//취소
//     include_once "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/biztalk.php";
//     $division = "choriforest003"; //예약완료
//     $reserve_code = $guestroom_reserve_code;
//     include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
//   }
// }

$re_code = "100";
$msg = "success";
$json = json_output($re_code,$msg);
echo"$json";
exit;
 }else if($division == 'reserve_delete'){
   /*예약정보삭제*/
   $guestroom_reserve_code = trim(isset($_REQUEST['guestroom_reserve_code'])) ? $_REQUEST['guestroom_reserve_code'] : '';//분류
   $sql = "DELETE FROM $GUESTROOM_RESERVATION_TB WHERE 1=1 AND guestroom_reserve_code = '$guestroom_reserve_code'";
   $result = sql_query($sql);
   $sql = "DELETE FROM $GUESTROOM_RESERVATION_INFO_TB WHERE 1=1 AND guestroom_reserve_code = '$guestroom_reserve_code'";
   $result = sql_query($sql);
   $re_code = "100";
   $msg = "success";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }else if($division == 'prevent_room_input'){
   /*방막기*/
	 $guestroom_code = $val_1;
	 $guestroom_name = $val_3;
   if($prevent_status == '0'){ //방막기실행
     $sql = "INSERT INTO $GUESTROOM_RESERVATION_TB
             (user_id,guestroom_reserve_code,guestroom_code, guestroom_name, guestroom_reception_date, guestroom_reserve_status,guestroom_reserve_date,guestroom_reserve_payment_status)
             VALUES
             ('".$user_str."','$guestroom_reserve_code','$guestroom_code','$guestroom_name','$pram_guestroom_reserve_date','8','$pram_guestroom_reserve_date','4')";
     // echo "
     // sql : $sql <br>
     // ";
      $result = sql_query($sql);
      echo"ok";
      exit;
   }else if($prevent_status == '1'){ //방막기 해제
		 // echo "방막기 해제 <br>";
     $sql = "DELETE FROM $GUESTROOM_RESERVATION_TB WHERE user_id = '".$user_str."' AND guestroom_code = '$guestroom_code'";
// 		 echo "
// sql >>> $sql <br>
// 		 ";
     $result = sql_query($sql);
     echo"ok";
     exit;
   }else{
     echo"error";
     exit;
   }

   // $sql = "UPDATE FROM $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '8' WHERE guestroom_code = '$guestroom_code'";
   // $result = sql_query($sql);
   // echo"ok";
 }else if($division == 'reservation_modify_confirm'){ //예약확정
	 $sql = "UPDATE $GUESTROOM_RESERVATION_TB
           SET
            guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
           ,guestroom_reserve_user_name='$guestroom_reserve_user_name'
           ,guestroom_reserve_user_phone='$guestroom_reserve_user_phone'
           ,guestroom_reserve_user_personnel='$guestroom_reserve_user_personnel'
           ,guestroom_arrive_date='$guestroom_arrive_date'
           ,guestroom_reserve_payment_date='$guestroom_reserve_payment_date'
					 ,guestroom_cancel_date = '$guestroom_cancel_date'
           ,guestroom_reserve_payment_method='$guestroom_reserve_payment_method'
           ,guestroom_reserve_payment_price='$guestroom_reserve_payment_price'
           ,guestroom_onsite_payment_price='$guestroom_onsite_payment_price'
           ,guestroom_reserve_user_request='$guestroom_reserve_user_request'
           ,guestroom_reserve_memo='$guestroom_reserve_memo'
           ,guestroom_reserve_user_additional_service='$guestroom_reserve_user_additional_service'
					 ,guestroom_reserve_status = '2'
           WHERE user_id = '".$user_str."'
					 AND guestroom_reserve_code = '$guestroom_reserve_code'
          ";
	 // $sql = "UPDATE $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '2'  WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
	 $result = sql_query($sql);
// 	 echo "
// sql >> $sql <br>
// 	";
	 echo"ok";
	 exit;
 }else if($division == 'reservation_modify_wait'){ //예약대기
	 $sql = "UPDATE $GUESTROOM_RESERVATION_TB
					 SET
						guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
					 ,guestroom_reserve_user_name='$guestroom_reserve_user_name'
					 ,guestroom_reserve_user_phone='$guestroom_reserve_user_phone'
					 ,guestroom_reserve_user_personnel='$guestroom_reserve_user_personnel'
					 ,guestroom_arrive_date='$guestroom_arrive_date'
					 ,guestroom_reserve_payment_date='$guestroom_reserve_payment_date'
					 ,guestroom_cancel_date = '$guestroom_cancel_date'
					 ,guestroom_reserve_payment_method='$guestroom_reserve_payment_method'
					 ,guestroom_reserve_payment_price='$guestroom_reserve_payment_price'
					 ,guestroom_onsite_payment_price='$guestroom_onsite_payment_price'
					 ,guestroom_reserve_user_request='$guestroom_reserve_user_request'
					 ,guestroom_reserve_memo='$guestroom_reserve_memo'
					 ,guestroom_reserve_user_additional_service='$guestroom_reserve_user_additional_service'
					,guestroom_reserve_status = '1'
					 WHERE user_id = '".$user_str."'
					 AND guestroom_reserve_code = '$guestroom_reserve_code'
					";
	 // $sql = "UPDATE $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '1'  WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
	 $result = sql_query($sql);
// 	 echo "
// sql >> $sql <br>
// 	 ";
	 echo"ok";
	 exit;
 }else if($division == 'reservation_modify_cancel'){ //예약취소
	 $sql = "UPDATE $GUESTROOM_RESERVATION_TB
					 SET
						guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
					 ,guestroom_reserve_user_name='$guestroom_reserve_user_name'
					 ,guestroom_reserve_user_phone='$guestroom_reserve_user_phone'
					 ,guestroom_reserve_user_personnel='$guestroom_reserve_user_personnel'
					 ,guestroom_arrive_date='$guestroom_arrive_date'
					 ,guestroom_reserve_payment_date='$guestroom_reserve_payment_date'
					 ,guestroom_cancel_date = '$guestroom_cancel_date'
					 ,guestroom_reserve_payment_method='$guestroom_reserve_payment_method'
					 ,guestroom_reserve_payment_price='$guestroom_reserve_payment_price'
					 ,guestroom_onsite_payment_price='$guestroom_onsite_payment_price'
					 ,guestroom_reserve_user_request='$guestroom_reserve_user_request'
					 ,guestroom_reserve_memo='$guestroom_reserve_memo'
					 ,guestroom_reserve_user_additional_service='$guestroom_reserve_user_additional_service'
					,guestroom_reserve_status = '4'
					 WHERE user_id = '".$user_str."'
					 AND guestroom_reserve_code = '$guestroom_reserve_code'
					";

	 // $sql = "UPDATE $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '4'  WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
	 $result = sql_query($sql);
// 	 echo "
// sql >> $sql <br>
// 	";
	 echo"ok";
	 exit;
 }else if($division == 'reservation_cancel_modify') { //예약취소 > 수정
	 $sql = "UPDATE $GUESTROOM_RESERVATION_TB
					 SET
						guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
					 ,guestroom_reserve_refund_request_date = '$guestroom_reserve_refund_request_date'
					 ,guestroom_reserve_refund_date='$guestroom_reserve_refund_date'
					 ,guestroom_refund_price='$guestroom_refund_price'
					 WHERE user_id = '".$user_str."'
					 AND guestroom_reserve_code = '$guestroom_reserve_code'
					";

	 // $sql = "UPDATE $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '4'  WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
	 $result = sql_query($sql);
// 	 echo "
// sql >> $sql <br>
// 	";
	 echo"ok";
	 exit;
 }else if($division == 'reservation_cancel_modify_confirm') { //예약취소 > 취소완료
	 $sql = "UPDATE $GUESTROOM_RESERVATION_TB
					 SET
					 guestroom_reserve_payment_status='$guestroom_reserve_payment_status'
					 ,guestroom_reserve_refund_request_date = '$guestroom_reserve_refund_request_date'
					 ,guestroom_reserve_refund_date='$guestroom_reserve_refund_date'
					 ,guestroom_refund_price='$guestroom_refund_price'
					 WHERE user_id = '".$user_str."'
					 AND guestroom_reserve_code = '$guestroom_reserve_code'
					";

	 // $sql = "UPDATE $GUESTROOM_RESERVATION_TB SET guestroom_reserve_status = '4'  WHERE guestroom_reserve_code = '$guestroom_reserve_code'";
	 $result = sql_query($sql);
// 	 echo "
// sql >> $sql <br>
// 	";
	 echo"ok";
	 exit;
 }


?>
