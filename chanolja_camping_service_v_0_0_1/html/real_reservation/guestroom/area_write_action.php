<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";


$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$area_code = isset($_REQUEST['area_code']) ? $_REQUEST['area_code'] : '';
$area_name = isset($_REQUEST['area_name']) ? trim($_REQUEST['area_name']) : '';
$use_del_yes = isset($_REQUEST['use_del_yes']) ? trim($_REQUEST['use_del_yes']) : '';

if($division == 'input'){
/*부대시설정보입력*/
$sql = "INSERT INTO $AREA_INFO_TB
        (user_id,area_code, area_name,area_reg_date)
        VALUES
        ('".$_SESSION['session_user_id']."','$area_code','$area_name','$rdate')";
// echo "
// sql : $sql <br>
// ";
   $result = sql_query($sql);
   $re_code = "100";
   $msg = "등록하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }else if($division == 'modify') {
   /*부대시설정보수정*/
   $sql = "UPDATE $AREA_INFO_TB
           SET
           area_name='$area_name'
           ,area_mod_date = '$rdate'
           WHERE user_id = '".$_SESSION['session_user_id']."'
           AND area_code = '$area_code'
          ";
          $result = sql_query($sql);
          $re_code = "100";
          $msg = "수정하였습니다.";
          $json = json_output($re_code,$msg);
          echo"$json";
          exit;
 }else if($division == 'delete') {
   $sql = "UPDATE $AREA_INFO_TB SET area_del_whether = 'Y' , area_mod_date = '$rdate' WHERE user_id = '".$_SESSION['session_user_id']."' AND area_code = '$area_code'";
   $result = sql_query($sql);
   echo"ok";
 }
?>
