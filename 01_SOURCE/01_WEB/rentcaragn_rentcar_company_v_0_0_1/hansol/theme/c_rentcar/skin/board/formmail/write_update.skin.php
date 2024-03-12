<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once('./_common.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
$aaa = $config['cf_admin_email']; //관리자 환경설정 기본환경설정에 등록된 이메일 가져오기


mailer('보낸사람이름', $aaa, $aaa, '한솔 렌트카 문의', '<span style="font-size:9pt;">[한솔 렌트카 예약 신청]  </span>', 1);

?>