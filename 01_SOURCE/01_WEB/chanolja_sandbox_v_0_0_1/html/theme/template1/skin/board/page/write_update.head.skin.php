<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$source = $G5_URL;
$target = $G5_URL;
$wr_content = str_replace("$source","$target", $wr_content);
?>