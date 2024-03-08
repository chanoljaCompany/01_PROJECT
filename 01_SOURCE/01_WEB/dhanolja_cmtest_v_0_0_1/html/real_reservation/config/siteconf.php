<?php
//error_reporting(E_ALL);
ini_set("display_errors", 1);
$SITENAME = "chanolja";
$SITEURL = "//cmtest.dothome.co.kr/";
$subUrl = "/real_reservation";
$TODATE = date("Y-m-d");
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
$conType = preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT']); //PC접속:0,모바일접속:1
$cookname = $SITENAME;
$top_menu_id = isset($_REQUEST['top_menu_id']) ? $_REQUEST['top_menu_id'] : '';
$left_menu_id = isset($_REQUEST['left_menu_id']) ? $_REQUEST['left_menu_id'] : '';
$facility_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/facility_img/';
$facility_thumb_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/facility_img/thumb_img/';
$option_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/option_img/';
$option_thumb_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/option_img/thumb_img/';
$travel_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/travel_img/';
$travel_thumb_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/travel_img/thumb_img/';
$clientId = 'R1_9a7a3e2d67a740818368170595af5ce4';
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
$siteUrl = $_SERVER['HTTP_HOST'];
$con_ip = $_SERVER["REMOTE_ADDR"];
if($con_ip == '118.37.116.172') $wr_test = 'AT';
$file_url = $protocol.$siteUrl.$subUrl;
$home_root = $_SERVER['DOCUMENT_ROOT']."/real_reservation/";

$guestroom_image_url = $file_url."/pension_img/";
$facility_image_url = $file_url."/facility_img/";
$option_image_url = $file_url."/option_img/";
$travel_image_url = $file_url."/travel_img/";
$guestroom_thumb_image_url = $file_url."/pension_img/thumb_img/";
$facility_thumb_image_url = $file_url."/facility_img/thumb_img/";
$option_thumb_image_url = $file_url."/option_img/thumb_img/";
$travel_thumb_image_url = $file_url."/travel_img/thumb_img/";

$smartEditor_facility_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/facility_img/content_img/';
$smartEditor_option_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/option_img/content_img/';
$smartEditor_guestroom_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/pension_img/content_img/';
$smartEditor_travel_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/travel_img/content_img/';
$smartEditor_reserve_info_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/content_img/reserve_info/';
$smartEditor_nboard_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/board_data/content_img/';
$smartEditor_nboard_sFileURL = "/real_reservation/board_data/content_img/";

$baord_upload_max = "2";
$board_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/board_data/board_file/';

// $pension_user_id = "somang73"; //테스트
// $pension_user_level = "10"; //테스트
// $pension_user_name = "관리자"; //테스트
// $pension_user_email = "somang73@naver.com"; //테스트
// $pension_user_homeurl = "http://www.barunweb.co.kr"; //테스트
$SITE_NAME     = "testshop.chungdodaily.com";
$SITE_NAME_CLIENT     = "testshop.chungdodaily.com.client";
//$session_userid = "somang73";
$MAIN_TEXT_COUNTS = '3';//메인배너 텍스트 노출수


$PAYMENT_WAITING = "4";//미결제
$PAYMENT_WAITING_STR = "미결제";//미결제
$PAYMENT_COMPLETE = "3";//결제완료
$PAYMENT_COMPLETE_STR = "결제완료";//결제완료
$RESERVATIONS_BASIC = "0";//기존
$RESERVATIONS_WAIT = "1"; //예약대기
$RESERVATIONS_COMPLETE = "2"; //예약대기


$PATYMENT_MEHTOD_R = "R,0,0,0"; //실시간계좌이체
$PATYMENT_MEHTOD_B = "0,B,0,0"; //무통장입금
$PATYMENT_MEHTOD_C = "0,0,C,0"; //신용카드
$PATYMENT_MEHTOD_H = "0,0,0,H"; //휴대폰결제

//테이블
$MANAGEMENT_TB = 'management';
$MANAGEMENT_SESSION_TB = "management_session";
$MANAGEMENT_RESERVE_TB = "management_reserve";
$MANAGEMENT_RESERVE_PEAK_DATE_TB = "management_reserve_peak_date";
$MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB = "management_reserve_semi_peak_date";
$MANAGEMENT_RESERVE_INFO_TB = "management_reserve_info";
$GUESTROOM_RESERVATION_TB =  "guestroom_reservation";
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$GUESTROOM_INFO_TB = "guestroom_info";
$GUESTROOM_IMAGE_INFO_TB = "guestroom_image_info";
$GUESTROOM_SALES_CHANNEL_TB = "guestroom_sales_channel";
$OPTION_INFO_TB = "option_info";
$OPTION_IMAGE_INFO_TB = "option_image_info";
$GUESTROOM_OPTION_TB = "guestroom_option";
$HOLIDAY_TB = "holiday";
$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
$GUESTROOM_RESERVATION_VIEW_TB = "guestroom_reservation_view";
$GUESTROOM_RESERVATION_CODE_TB = "guestroom_reservation_code";
$OPTION_RESERVATION_INFO_TB = "option_reservation_info";
$ALIMTALK_SETTING_TB = "alimtalk_setting";
$G5_WZP_PENSION_TB = "g5_wzp_pension";
$GUESTROOM_BLOCKER_TB = "guestroom_blocker";
$SALES_MEMBERS_TB = "sales_members";
$SALES_MEMBERS_SECESSION_TB = "sales_members_secession";
$SALES_SESSION_TB = "sales_session";
$AREA_INFO_TB = "area_info";
$GUESTROOM_AREA_TB = "guestroom_area";
?>
