<?php
if(!session_id()) {
    session_start();
}
// print_r($_SESSION);
// session_name(md5( $SITE_NAME ) );
// session_start();
// print_r($_SESSION);
$logoutmsg = "로그인을 하셔야합니다.";
// $logoutmsg = iconv("UTF-8", "EUC-KR",$logoutmsg);
if (!isset($_SESSION['session_user_id'])) {
    echo "<script>alert('".$logoutmsg."');</script>";
    echo "<script>document.location.href='".$subUrl."/';</script>\n";
    exit;
}
?>
