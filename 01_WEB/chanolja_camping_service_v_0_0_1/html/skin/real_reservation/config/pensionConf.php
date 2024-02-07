<?php
$TODATE_DASH = date("Y-m-d");
$top_menu_id = isset($_REQUEST['top_menu_id']) ? $_REQUEST['top_menu_id'] : '';
$left_menu_id = $_REQUEST["left_menu_id"];
$facility_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/facility_img/';
$facility_thumb_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/facility_img/thumb_img/';
$travel_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/travel_img/';
$travel_thumb_uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/travel_img/thumb_img/';

$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
$siteUrl = $_SERVER['HTTP_HOST'];
$subUrl = "/pension_prj";
$file_url = $protocol.$siteUrl.$subUrl;
$home_root = $_SERVER['DOCUMENT_ROOT']."/pension_prj/";

$guestroom_image_url = $file_url."/pension_img/";
$facility_image_url = $file_url."/facility_img/";
$travel_image_url = $file_url."/travel_img/";
$guestroom_thumb_image_url = $file_url."/pension_img/thumb_img/";
$facility_thumb_image_url = $file_url."/facility_img/thumb_img/";
$travel_thumb_image_url = $file_url."/travel_img/thumb_img/";

$smartEditor_facility_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/facility_img/content_img/';
$smartEditor_guestroom_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/pension_img/content_img/';
$smartEditor_travel_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/travel_img/content_img/';
$smartEditor_reserve_info_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/content_img/reserve_info/';
$smartEditor_nboard_uploadDir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/board_data/content_img/';
$smartEditor_nboard_sFileURL = "/pension_prj/board_data/content_img/";

$baord_upload_max = "2";
$board_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/board_data/board_file/';

// $pension_user_id = "somang73"; //테스트
// $pension_user_level = "10"; //테스트
// $pension_user_name = "관리자"; //테스트
// $pension_user_email = "somang73@naver.com"; //테스트
// $pension_user_homeurl = "http://www.barunweb.co.kr"; //테스트
$SITE_NAME     = "testshop.chungdodaily.com";
$SITE_NAME_CLIENT     = "testshop.chungdodaily.com.client";
$session_userid = "somang73";
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

?>
