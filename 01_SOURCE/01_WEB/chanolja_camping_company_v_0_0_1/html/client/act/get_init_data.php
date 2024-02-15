<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : ''; //상품구분
// $option_info_array_basic = get_option($SITENAME,'b');
// $option_info_array_pay = get_option($SITENAME,'p');

if($division == 'get_area') {
   $arae_info_array = get_area_client();
//    print_r($arae_info_array);
  header('Content-Type: application/json; charset=utf8');
  $json = json_encode($arae_info_array);
  echo $json;
}
else if($division == 'get_option_basic') {
   $option_basic_info_array = get_option_client('b');
//    print_r($arae_info_array);
   header('Content-Type: application/json; charset=utf8');
   $json = json_encode($option_basic_info_array);
   echo $json;
 }