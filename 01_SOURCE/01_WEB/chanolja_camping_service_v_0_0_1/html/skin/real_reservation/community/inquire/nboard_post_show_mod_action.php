<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$NBOARD_TB = "inquire_board";
$division = $_REQUEST["division"];
$wr_id = $_REQUEST["wr_id"]; //테이블명
$checkVal = $_REQUEST["checkVal"];//파일테이블 일력번호
if($checkVal == 'N'){
  $upcheckVal = "Y";
}else{
  $upcheckVal = "N";
}
if($division == 'nboard') { //파일삭제만..
  //등록이미지를 우선 삭제한다.
    $str = "SELECT * FROM $NBOARD_BOARD_FILE_TB
            WHERE pension_user_id = '$session_userid'
            original_table = '$original_table'
            AND seq = '$seq'
           ";
    $result = sql_query($str);

    while ($rows = mysqli_fetch_array($result)) {
      @unlink($board_upload_dir.$rows['o_fileName']); //대표이미지 삭제
    }
     //등록DB  삭제한다.
    $sql = "DELETE FROM $NBOARD_BOARD_FILE_TB
            WHERE pension_user_id = '$session_userid'
            AND original_table = '$original_table'
            AND seq = '$seq'";
    $result = sql_query($sql);
    echo"ok";
}
else if($division == 'inquire') { // 게시물삭제,파일삭제..
    //게시물  상태변경.

   $sql = "UPDATE $NBOARD_TB
           SET post_show = '$upcheckVal'
           WHERE pension_user_id = '$session_userid'
           AND wr_id = '$wr_id'";
   $result = sql_query($sql);
    echo"ok";
}

?>
