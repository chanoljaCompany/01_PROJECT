<?php header("Content-Type:text/html;charset=utf-8"); ?>

<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
include_once "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/biztalk.php";

// $division = "choriforest001"; //예약신청
// include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
//
// $division = "choriforest001"; //예약신청
// include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";

$division = "choriforest001"; //예약취소
// include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
$division = "choriforest004"; //예약취소
include "$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/alimtalk_push.php";
?>
