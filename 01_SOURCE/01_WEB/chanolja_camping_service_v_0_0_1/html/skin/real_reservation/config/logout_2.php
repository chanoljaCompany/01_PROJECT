<?
//error_reporting(E_ALL);
ini_set("display_errors", 1);
// require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
// require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

function urlRedirect( $url, $msg='' ) {
  if (headers_sent()) {
    echo "<script>document.location.href='$url';</script>\n";
  } else {
    header( 'HTTP/1.1 301 Moved Permanently' );
    header( "Location: ". $url );
  }
  exit();
}

$currentDate = date( "Y-m-d\TH:i:s" );

if ( isset( $_SESSION['session_userseq'] ) && $_SESSION['session_userseq'] != '' ) {
  $str = "UPDATE $MANAGEMENT_TB"
        . "\n SET lastlogin = '$currentDate'"
        . "\n WHERE seq = ". $_SESSION['session_userseq'];
  sql_query($str);
}

if ( isset( $_SESSION['session_id'] ) && $_SESSION['session_id'] != '' ) {
  $str = "DELETE FROM $MANAGEMENT_SESSION_TB"
        . "\n WHERE user_id = '". $_SESSION['session_id'] ."'";
  // $result = @mysqli_query($query, $connect);
  sql_query($str);
}
//mysqli_close($connect);

$session_id = '';
$session_userseq = '';
$session_userid = '';
$session_logintime = '';
$session_username = '';

unset($_SESSION['session_id']);
unset($_SESSION['session_userseq']);
unset($_SESSION['session_userid']);
unset($_SESSION['session_userlevel']);
unset($_SESSION['session_username']);
unset($_SESSION['session_logintime']);

// echo "
// rurl >>> $rurl <br>
// ";
urlRedirect($subUrl);
?>
