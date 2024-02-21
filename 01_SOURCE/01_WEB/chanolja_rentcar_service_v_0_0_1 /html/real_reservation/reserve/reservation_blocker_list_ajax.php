<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

session_start();

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$page_division = trim(isset($_REQUEST['page_division'])) ? $_REQUEST['page_division'] : '';//예약번호/객실명


if($_SESSION['session_user_level'] == 'A') {
    $user_id = trim(isset($_REQUEST['guestroom_host'])) ? $_REQUEST['guestroom_host'] : '';//예약번호/객실명
}
else if($_SESSION['session_user_level'] == 'M'){
    $user_id = $_SESSION['session_user_id'];
}
if($page_division == 'room_list'){
  $sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE user_id = '".$user_id."' AND guestroom_del_whether = 'N' ORDER BY seq DESC";
  $result = sql_query($sql);
  $html = "";
  $html = "<select id='guestroom_code' name='guestroom_code' style='width: 50%'>";
  while($rows = mysqli_fetch_array($result)){
         $html .= "<option name='guestroom_code' value='".$rows['guestroom_code']."'>".$rows['guestroom_name']."</option>";
  }
  $html .="</select>";
  echo $html;

}
else if($page_division == 'room_block_ins'){
  $reserve_date = isset($_REQUEST['guestroom_reserve_date']) ? $_REQUEST['guestroom_reserve_date'] : ''; //예약일자
  $reserve_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : ''; //예약일자
  $reserve_code = time(); //예약번호

  // $adultPerson = isset($_REQUEST['adperson']) ? $_REQUEST['adperson'] : ''; //예약일자
  // $childPerson = isset($_REQUEST['chperson']) ? $_REQUEST['chperson'] : ''; //예약일자
  // $babyPerson = isset($_REQUEST['baadperson']) ? $_REQUEST['baadperson'] : ''; //예약일자
  // $guestroom_reserve_payment_total = isset($_REQUEST['guestroom_reserve_payment_total']) ? $_REQUEST['guestroom_reserve_payment_total'] : ''; //예약일자
  // $guestroom_paymthod = isset($_REQUEST['guestroom_paymthod']) ? $_REQUEST['guestroom_paymthod'] : ''; //예약일자
  $reserve_date = str_replace("-","~", $reserve_date);
  $reserve_date = str_replace("/","-", $reserve_date);
  // $nextDay = date('Y-m-d', strtotime("+1 day", strtotime($reserve_date)));//다음날
  // $full_day = $reserve_date."~".$nextDay;

  // $reserve_possible = reserve_possible($reserve_date,$reserve_guestroom_code);


  //예약이 있는지 체크...
  // if($reserve_possible > '0') { //얘역뷸거
  //          $re_code = "200";
  //          $msg = "예약이 불가능한 상품입니다.";
  //          $json = json_output($re_code,$msg);
  //          echo"$json";
  //          exit;
  // }
  //예약이 없다면..입력
  $guestroom_reserve_status = "6"; //예약상태
  $room_info_array = room_info_array($reserve_guestroom_code,"admin");
  // $guestroom_reserve_user_personnel = $adultPerson."^".$childPerson."^".$babyPerson; //객실예약자인원',
  // $reserve_use_hour = "14~11";
  // $sql = "INSERT INTO guestroom_reservation_0313
  //               (user_id,guestroom_reserve_code,guestroom_code, guestroom_name
  //               ,guestroom_reserve_status, guestroom_reserve_date,guestroom_reserve_date_start,guestroom_reserve_date_end
  //               ,guestroom_reserve_user_name ,guestroom_reserve_user_phone,guestroom_reserve_user_personnel
  //               ,guestroom_reserve_payment_status,guestroom_reserve_payment_method
  //               ,guestroom_reserve_payment_date
  //               ,guestroom_reserve_payment_total,guestroom_fee,guestroom_add_fee,option_fee
  //               ,guestroom_type,reserve_use_hour,guestroom_reception_date
  //               )
  //               VALUES
  //               ('".$_SESSION['session_user_id']."','$reserve_code','".$room_info_array['0']['guestroom_code']."','".$room_info_array['0']['guestroom_name']."'
  //                ,'$guestroom_reserve_status','$full_day','".$reserve_date_exp['0']."','".$reserve_date_exp['1']."'
  //                ,'$reserve_name' ,'$reserve_phone','$guestroom_reserve_user_personnel'
  //                ,'$guestroom_reserve_payment_status','$guestroom_paymthod'
  //                ,'$guestroom_reserve_payment_date'
  //                ,'$guestroom_reserve_payment_total','".$guestroom_reserve_payment_total."','0','0'
  //                ,'$guestroom_type','".$room_info_array['0']['guestroom_use_hour']."','$guestroom_reception_date'
  //              )
  //                ";
  //                echo "
  //                 sql >> $sql <br>
  //                ";
                  // sql_query($sql);
                  $sql = "INSERT INTO $GUESTROOM_BLOCKER_TB
                                (user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reserve_date)
                                VALUES
                                ('".$_SESSION['session_user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array['0']['guestroom_name']."','$reserve_date')";
                          // echo "
                          // sql : $sql <br>
                          // ";
                   sql_query($sql);

                  $dateStrExp =explode("~",$reserve_date);
                  $startDate = $dateStrExp['0'];
                  $endDate = $dateStrExp['1'];
                  $dateintval = get_date_intval_admin($reserve_date);

                  for($i = 0; $i <= $dateintval ; $i++){
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
                                  ('".$_SESSION['session_user_id']."','$reserve_code','$reserve_guestroom_code','".$room_info_array['0']['guestroom_name']."'
                                   ,'$guestroom_reserve_status','$startDate')";
                            // echo "
                            // sql : $sql <br>
                            // ";
                     sql_query($sql);
                  }

  echo"ok";
  //옵션등록
}
else if($page_division == 'delete') {
  $guestroom_reserve_code = isset($_REQUEST['guestroom_reserve_code']) ? $_REQUEST['guestroom_reserve_code'] : ''; //예약일자
   //등록DB  삭제한다.
  $sql = "DELETE FROM $GUESTROOM_BLOCKER_TB  WHERE user_id = '".$_SESSION['session_user_id']."' AND guestroom_reserve_code = '$guestroom_reserve_code'";
  sql_query($sql);
  //부대시설정보  삭제한다.
  $sql = "DELETE FROM $GUESTROOM_RESERVATION_INFO_TB  WHERE user_id = '".$_SESSION['session_user_id']."' AND guestroom_reserve_code = '$guestroom_reserve_code'";
  sql_query($sql);
  echo"ok";
}
?>
