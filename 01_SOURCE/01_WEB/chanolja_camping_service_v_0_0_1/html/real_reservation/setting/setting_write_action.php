<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";
include $admin_root."/config/session.php";
$mod_date = date("Y-m-d");
$mod_ip = $_SERVER['REMOTE_ADDR'];
$division = isset( $_REQUEST['division'] ) ?  $_REQUEST['division']  : '';

  if($division == 'setting') { //기본정보 설정
   $field = isset( $_REQUEST['field'] ) ?  $_REQUEST['field']  : '';
   $field_pro = isset( $_REQUEST['field_pro'] ) ?  $_REQUEST['field_pro']  : '';
   $field_search = isset( $_REQUEST['field_search'] ) ?  $_REQUEST['field_search']  : '';
   $time = isset( $_REQUEST['time'] ) ?  implode("^",$_REQUEST['time'] ) : '';
   $price = isset( $_REQUEST['price']) ?  implode("^",$_REQUEST['price'])  : '';
   $reward = isset( $_REQUEST['reward']) ?  implode("^",$_REQUEST['reward'])  : '';
   $review_point = get_number(isset( $_REQUEST['review_point']) ?  $_REQUEST['review_point']  : '0');
   $join_point = get_number(isset( $_REQUEST['join_point']) ?  $_REQUEST['join_point']  : '0');

   $review_best_point = get_number(isset( $_REQUEST['review_best_point']) ?  $_REQUEST['review_best_point']  : '0');
   $coin_tel = isset( $_REQUEST['coin_tel']) ?  $_REQUEST['coin_tel']  : '';
   $counsel_tel = isset( $_REQUEST['counsel_tel']) ?  $_REQUEST['counsel_tel']  : '';
   $nv_url = isset( $_REQUEST['nv_url']) ?  $_REQUEST['nv_url']  : '';
   $fb_url = isset( $_REQUEST['fb_url']) ?  $_REQUEST['fb_url']  : '';
   $ig_url = isset( $_REQUEST['ig_url']) ?  $_REQUEST['ig_url']  : '';
   $privacy = isset( $_REQUEST['privacy']) ?  $_REQUEST['privacy']  : '';
   $policy = isset( $_REQUEST['policy']) ?  $_REQUEST['policy']  : '';
  //  echo " time > $time <br>
  // price > $price <br>
  // reward > $reward <br>
  //  ";
   if($session_userlevel != 'A' || $field == '' || $time == '' || $price == '' || $reward == ''){
      $user_str = "AND userid = '$session_userid'";
      $re_code = "200";
      $msg = "오류가 발생하였습니다.";
   }
   else{
       $privacy = addslashes($privacy);
       $policy = addslashes($policy);
       $sql = "UPDATE $SETTING_TB SET
               field = '$field',
               field_pro = '$field_pro',
               field_search = '$field_search',
               time = '$time',
               price = '$price',
               reward = '$reward',
               join_point = '$join_point',
               review_point = '$review_point',
               review_best_point = '$review_best_point',
               coin_tel = '$coin_tel',
               counsel_tel = '$counsel_tel',
               nv_url = '$nv_url',
               fb_url = '$fb_url',
               ig_url = '$ig_url',
               privacy = '$privacy',
               policy = '$policy',
               mod_date = now()
              ";
//               echo "
// sql > $sql <br>
//               ";
              $result = sql_query($sql);
              // echo "sql > $sql";
              $re_code = "100";
              $msg = "변경하였습니다.";

      }

              $json = json_output($re_code,$msg);
              echo"$json";
              exit;
 }
?>
