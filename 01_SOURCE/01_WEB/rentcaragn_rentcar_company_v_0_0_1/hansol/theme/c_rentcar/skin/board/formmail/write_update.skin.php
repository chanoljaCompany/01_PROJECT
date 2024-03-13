<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once('./_common.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
$aaa = $config['cf_admin_email']; //관리자 환경설정 기본환경설정에 등록된 이메일 가져오기
$wr_name = $_POST["wr_name"]; // 사고대차
$wr_password = $_POST["wr_password"]; // 예약날짜
$wr_email = $_POST["wr_email"]; // 장소
$wr_homepage = $_POST["wr_homepage"]; // 연락처



mailer('보낸사람이름', $aaa, $aaa, '한솔 렌트카 문의', '<span style="font-size:9pt;">[한솔 렌트카 예약 신청] 사고대차 : '.$wr_name.' 예약날짜 : '.$wr_password.' 장소 : '.$wr_email.' 연락처 : '.$wr_homepage, 1);

?>