<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

// session_name( md5( $SITE_NAME ) );
session_start();

$division = $_REQUEST["division"];
$seq = $_REQUEST["seq"]; //테이블명
$checkVal = $_REQUEST["checkVal"];//파일테이블 일력번호
if($checkVal == 'N'){
  $upcheckVal = "Y";
}else{
  $upcheckVal = "N";
}
if($division == 'guestroom') { //
    //게시물  상태변경.
   $sql = "UPDATE $GUESTROOM_INFO_TB
           SET post_show = '$upcheckVal'
           WHERE user_id = '".$_SESSION['session_user_id']."'
           AND seq = '$seq'";
   $result = sql_query($sql);
   if($upcheckVal == 'Y'){
     echo "사용으로 변경하였습니다.";
   }else if($upcheckVal == 'N'){
     echo "사용하지않음으로 변경하였습니다.";
   }else{
     echo "오류가 발생하였습니다.";
   }
}

?>
