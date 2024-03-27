<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$mod_date = date("Y-m-d");
$mod_ip = $_SERVER['REMOTE_ADDR'];
$division = isset( $_REQUEST['division'] ) ?  $_REQUEST['division']  : '';

  if($division == 'al_setting_mod') { //기본정보 설정
   $al_join_name = isset( $_REQUEST['al_join_name'] ) ?  $_REQUEST['al_join_name']  : '';
   $al_join_code = isset( $_REQUEST['al_join_code'] ) ?  $_REQUEST['al_join_code']  : '';
   $al_join = isset( $_REQUEST['al_join'] ) ?  $_REQUEST['al_join']  : '';
   $al_charge_name = isset( $_REQUEST['al_charge_name'] ) ?  $_REQUEST['al_charge_name']  : '';
   $al_charge_code = isset( $_REQUEST['al_charge_code'] ) ?  $_REQUEST['al_charge_code']  : '';
   $al_charge = isset( $_REQUEST['al_charge'] ) ?  $_REQUEST['al_charge']  : '';
   $al_finish_name = isset( $_REQUEST['al_finish_name'] ) ?  $_REQUEST['al_finish_name']  : '';
   $al_finish_code = isset( $_REQUEST['al_finish_code'] ) ?  $_REQUEST['al_finish_code']  : '';
   $al_finish = isset( $_REQUEST['al_finish'] ) ?  $_REQUEST['al_finish']  : '';
   $al_sandamsa_name = isset( $_REQUEST['al_sandamsa_name'] ) ?  $_REQUEST['al_sandamsa_name']  : '';
   $al_sandamsa_code = isset( $_REQUEST['al_sandamsa_code'] ) ?  $_REQUEST['al_sandamsa_code']  : '';
   $al_sandamsa = isset( $_REQUEST['al_sandamsa'] ) ?  $_REQUEST['al_sandamsa']  : '';
   $al_customer_name = isset( $_REQUEST['al_customer_name'] ) ?  $_REQUEST['al_customer_name']  : '';
   $al_customer_code = isset( $_REQUEST['al_customer_code'] ) ?  $_REQUEST['al_customer_code']  : '';
   $al_customer = isset( $_REQUEST['al_customer'] ) ?  $_REQUEST['al_customer']  : '';
   $al_month_name = isset( $_REQUEST['al_month_name'] ) ?  $_REQUEST['al_month_name']  : '';
   $al_month_code = isset( $_REQUEST['al_month_code'] ) ?  $_REQUEST['al_month_code']  : '';
   $al_month = isset( $_REQUEST['al_month'] ) ?  $_REQUEST['al_month']  : '';
          $sql = "UPDATE $ALIMTALK_SETTING_TB SET
               al_join_name = '$al_join_name',
               al_join_code = '$al_join_code',
               al_join = '$al_join',
               al_charge_name = '$al_charge_name',
               al_charge_code = '$al_charge_code',
               al_charge = '$al_charge',
               al_finish_name = '$al_finish_name',
               al_finish_code = '$al_finish_code',
               al_finish = '$al_finish',
               al_sandamsa_name = '$al_sandamsa_name',
               al_sandamsa_code = '$al_sandamsa_code',
               al_sandamsa = '$al_sandamsa',
               al_customer_name = '$al_customer_name',
               al_customer_code = '$al_customer_code',
               al_customer = '$al_customer',
               al_month_name = '$al_month_name',
               al_month_code = '$al_month_code',
               al_month = '$al_month'
              ";
              $result = sql_query($sql);
              // echo "sql > $sql";
              $re_code = "100";
              $msg = "변경하였습니다.";
              $json = json_output($re_code,$msg);
              echo"$json";
              exit;
 }
?>
