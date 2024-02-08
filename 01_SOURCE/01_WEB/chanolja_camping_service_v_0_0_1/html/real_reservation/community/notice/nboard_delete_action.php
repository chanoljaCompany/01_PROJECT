<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$NBOARD_TB = "notice_board";
$NBOARD_BOARD_FILE_TB = "board_file";
$division = $_REQUEST["division"];
$original_table = $_REQUEST["original_table"]; //테이블명
$seq = $_REQUEST["seq"];//파일테이블 일력번호
$original_seq = $_REQUEST["original_seq"];//게시판 일련번호


if($division == 'board_file_delete') { //파일삭제만..
  //등록이미지를 우선 삭제한다.
    $str = "SELECT * FROM $NBOARD_BOARD_FILE_TB
            WHERE
            original_table = '$original_table'
            AND seq = '$seq'
           ";
    $result = sql_query($str);

    while ($rows = mysqli_fetch_array($result)) {
      @unlink($board_upload_dir.$rows['o_fileName']); //대표이미지 삭제
    }
     //등록DB  삭제한다.
    $sql = "DELETE FROM $NBOARD_BOARD_FILE_TB
            WHERE
            original_table = '$original_table'
            AND seq = '$seq'";
    $result = sql_query($sql);
    echo"ok";
}
else if($division == 'notice') { // 게시물삭제,파일삭제..
  //등록이미지를 우선 삭제한다.
    $str = "SELECT * FROM $NBOARD_BOARD_FILE_TB
            WHERE
            original_table = '$original_table'
            AND original_seq = '$original_seq'
           ";
    $result = sql_query($str);

    while ($rows = mysqli_fetch_array($result)) {
      @unlink($board_upload_dir.$rows['o_fileName']); //대표이미지 삭제
    }
     //파일게시물  삭제한다.
    $sql = "DELETE FROM $NBOARD_BOARD_FILE_TB
            WHERE
            original_table = '$original_table'
            AND original_seq = '$original_seq'";
    $result = sql_query($sql);

    //게시물  삭제한다.
   $sql = "DELETE FROM $NBOARD_TB
           WHERE
           wr_id = '$original_seq'";
   $result = sql_query($sql);
    echo"ok";

}

?>
