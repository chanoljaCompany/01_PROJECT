<?
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
$time = time();
session_name( md5( $SITE_NAME_CLIENT ) );
session_start();
$session_id_client = $_SESSION["session_id_client"];
// echo "
// already session_id_client >>> $session_id_client <br>
// ";
if(!$session_id_client) {
// $logintime 	= time();
// $item_code = str_shuffle(time());
$session_id_client = md5(str_shuffle(time()));
$_SESSION['session_id_client'] = $session_id_client;
session_write_close();
// echo "
// New session_id_client >>> $session_id_client <br>
// ";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>펜션예약</title>
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/manage.css?time=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/xeicon.min.css">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/select2.css"  />
<link rel="shortcut icon" href="https://x67-engine.mywisa.com/wm_engine_SW/_manage/image/wing.ico">
<link href="<?=$file_url?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=$file_url?>/js/common.js?time=<?=time();?>"></script>
<script type="text/javascript" src="<?=$file_url?>/js/pen_common.js?time=<?=time();?>"></script>
<script type="text/javascript" src="<?=$file_url?>/js/smarteditor2-fileup/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=$file_url?>/js/R2Tip.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="<?=$file_url?>/js/manage.js?20201111"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
</script>
</head>
