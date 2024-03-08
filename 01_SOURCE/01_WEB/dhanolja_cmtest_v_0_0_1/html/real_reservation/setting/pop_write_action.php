<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";
include $admin_root."/config/session.php";
$mod_date = date("Y-m-d");
$mod_ip = $_SERVER['REMOTE_ADDR'];
$division = isset( $_REQUEST['division'] ) ?  $_REQUEST['division']  : '';
if($division == 'input') { //등록
   $sql = "INSERT INTO  $MOBBOTTOMPOP (link,content,post_show) VALUES('".$_REQUEST['link']."','".$_REQUEST['content']."','".$_REQUEST['post_show']."')";
   sql_query($sql);
   // echo "sql > $sql";
   $re_code = "100";
   $msg = "등록하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }
 else if($division == 'mobbottomdelete') { //삭제
    $sql = "DELETE FROM  $MOBBOTTOMPOP
            WHERE 1=1
            AND seq = '".$_REQUEST['seq']."'";
    sql_query($sql);
    // echo "sql > $sql";
    $re_code = "100";
    $msg = "삭제하였습니다.";
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
  }
 else if($division == 'mod'){
          $sql = "UPDATE $MOBBOTTOMPOP SET
               link = '".$_REQUEST['link']."',
               content = '".$_REQUEST['content']."',
               post_show = '".$_REQUEST['post_show']."'
               WHERE 1=1
               AND seq = '".$_REQUEST['seq']."'
              ";
              $result = sql_query($sql);
               //echo "sql > $sql";
              $re_code = "100";
              $msg = "변경하였습니다.";
              $json = json_output($re_code,$msg);
              echo"$json";
              exit;
 }
else if($division == 'popinput') { //등록
   $nboard_content = substr(trim($_POST['content']),0,65536);
   $nboard_content = preg_replace("#[\\\]+$#", "", $nboard_content);
   $sql = "INSERT INTO
          $POPUPITEM (subject,StartDate,EndDate,content,ptop,pleft,pwidth,pheight,ropendt,mwidth,mheight,mtop,mleft)
          VALUES('".$_REQUEST['subject']."','".$_REQUEST['StartDate']."','".$_REQUEST['EndDate']."','".$nboard_content."',
                 '".$_REQUEST['ptop']."','".$_REQUEST['pleft']."','".$_REQUEST['pwidth']."','".$_REQUEST['pheight']."'
                 ,'".$_REQUEST['ropendt']."','".$_REQUEST['mwidth']."','".$_REQUEST['mheight']."','".$_REQUEST['mtop']."','".$_REQUEST['mleft']."')";
   sql_query($sql);
   // echo "sql > $sql";
   $re_code = "100";
   $msg = "등록하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }
 else if($division == 'popdelete'){
   // $delfileName = isset( $_REQUEST['image'] ) ?  $_REQUEST['image']  : '';
   $sql = "DELETE FROM  $POPUPITEM
           WHERE 1=1
           AND seq = '".$_REQUEST['seq']."'";
   sql_query($sql);
   // echo "sql > $sql";
   @unlink($popupBanner_dir.$_REQUEST['image']);
   $re_code = "100";
   $msg = "삭제하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }
 else if($division == 'filedelete') {
       $changeData = isset($_REQUEST['delData']) ? $_REQUEST['delData'] : '';
       $delfileName = isset($_REQUEST['delfileName']) ? $_REQUEST['delfileName'] : '';
       @unlink($popupBanner_dir.$delfileName);
       $sql = "UPDATE $POPUPITEM
               SET
               Image = ''
               WHERE
               1=1
               AND seq = '".$_REQUEST['seq']."'
               ";
               // echo "$sql<br>";
         $result = sql_query($sql);
         $re_code = "100";
         $msg = "파일을 삭제 하였습니다.";
         $json = json_output($re_code,$msg);
         echo"$json";
         exit;
 }
 else if($division == 'popmod') {
      $nboard_content = substr(trim($_POST['content']),0,65536);
      $nboard_content = preg_replace("#[\\\]+$#", "", $nboard_content);
         $sql = "UPDATE  $POPUPITEM
                 SET
                  subject = '".$_REQUEST['subject']."'
                 ,StartDate = '".$_REQUEST['StartDate']."'
                 ,EndDate = '".$_REQUEST['EndDate']."'
                 ,content = '".$nboard_content."'
                 ,ptop = '".$_REQUEST['ptop']."'
                 ,pleft = '".$_REQUEST['pleft']."'
                 ,pwidth = '".$_REQUEST['pwidth']."'
                 ,pheight = '".$_REQUEST['pheight']."'
                 ,ropendt = '".$_REQUEST['ropendt']."'
                 ,mwidth = '".$_REQUEST['mwidth']."'
                 ,mheight = '".$_REQUEST['mheight']."'
                 ,mtop = '".$_REQUEST['mtop']."'
                 ,mleft = '".$_REQUEST['mleft']."'
         WHERE 1=1
         AND seq = '".$_REQUEST['seq']."'";
         sql_query($sql);
    $re_code = "100";
    $msg = "변경하였습니다.";
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
  }
?>
