<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$NBOARD_TB = "notice_board";
$division = $_REQUEST["division"];
$wr_id = $_REQUEST["wr_id"]; //테이블명
$checkVal = $_REQUEST["checkVal"];//파일테이블 일력번호
if($checkVal == 'N'){
  $upcheckVal = "Y";
}else{
  $upcheckVal = "N";
}
    //게시물  상태변경.
   $sql = "UPDATE $NBOARD_TB
           SET post_show = '$upcheckVal'
           WHERE pension_user_id = '$session_userid'
           AND wr_id = '$wr_id'";
   $result = sql_query($sql);
    echo"ok";

?>
