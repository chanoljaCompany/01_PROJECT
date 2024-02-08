<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";
// session_name( md5( $SITE_NAME ) );
// session_start();

$top_menu_1001_sel = "";
$top_menu_2001_sel = "";
$top_menu_3001_sel = "";
$top_menu_4001_sel = "";
$top_menu_5001_sel = "";
$top_menu_6001_sel = "";
$top_menu_7001_sel = "";

$left_menu_001_sel = "";
$left_menu_002_sel = "";
$left_menu_003_sel = "";
$left_menu_004_sel = "";
$left_menu_005_sel = "";
$left_menu_006_sel = "";
$left_menu_007_sel = "";
$left_menu_008_sel = "";
$left_menu_009_sel = "";
$left_menu_010_sel = "";
$left_menu_011_sel = "";
$left_menu_012_sel = "";
$left_menu_013_sel = "";
$left_menu_014_sel = "";
$left_menu_015_sel = "";
$left_menu_016_sel = "";
$left_menu_017_sel = "";


if($left_menu_id == '001' || $left_menu_id == ''){
	$left_menu_001_sel = "class='over'";
}else if($left_menu_id == '002'){
	$left_menu_002_sel = "class='over'";
}else if($left_menu_id == '003'){
	$left_menu_003_sel = "class='over'";
}else if($left_menu_id == '004'){
	$left_menu_004_sel = "class='over'";
}else if($left_menu_id == '005'){
	$left_menu_005_sel = "class='over'";
}else if($left_menu_id == '006'){
	$left_menu_006_sel = "class='over'";
}else if($left_menu_id == '007'){
	$left_menu_007_sel = "class='over'";
}else if($left_menu_id == '008'){
	$left_menu_008_sel = "class='over'";
}else if($left_menu_id == '009'){
	$left_menu_009_sel = "class='over'";
}else if($left_menu_id == '010'){
	$left_menu_010_sel = "class='over'";
}else if($left_menu_id == '011'){
	$left_menu_011_sel = "class='over'";
}else if($left_menu_id == '012'){
	$left_menu_012_sel = "class='over'";
}else if($left_menu_id == '013'){
	$left_menu_013_sel = "class='over'";
}else if($left_menu_id == '014'){
	$left_menu_014_sel = "class='over'";
}else if($left_menu_id == '015'){
	$left_menu_015_sel = "class='over'";
}else if($left_menu_id == '016'){
	$left_menu_016_sel = "class='over'";
}else if($left_menu_id == '017'){
	$left_menu_017_sel = "class='over'";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>차놀자캠핑 관리자</title>
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/manage.css?time=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/xeicon.min.css">
<link rel="stylesheet" type="text/css" href="<?=$file_url?>/css/select2.css"  />

<link href="<?=$file_url?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=$file_url?>/js/common.js?time=<?=time();?>"></script>
<script type="text/javascript" src="<?=$file_url?>/js/pen_common.js?time=<?=time();?>"></script>


<!-- <script type="text/javascript" src="http://chungdodaily.com/plugin/editor/smarteditor2/js/service/HuskyEZCreator.js" charset="utf-8"></script> -->
<!-- <script type="text/javascript" src="<?=$file_url?>/js/smarteditor2-final/js/service/HuskyEZCreator.js" charset="utf-8"></script> -->
<script type="text/javascript" src="<?=$file_url?>/js/smarteditor2-fileup/js/HuskyEZCreator.js" charset="utf-8"></script>
<!-- <script type="text/javascript" src="<?=$file_url?>/js/smarteditor/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script> -->
<!-- <script type="text/javascript" src="<?=$file_url?>/js/smarteditor2/workspace/static/js/service/HuskyEZCreator.js" charset="utf-8"></script> -->
<!-- <script type="text/javascript" src="http://testshop.chungdodaily.com/plugin/editor/smarteditor2/js/service/HuskyEZCreator.js"></script> -->

<script type="text/javascript" src="<?=$file_url?>/js/R2Tip.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ko.min.js"></script> -->
<script type="text/javascript" src="<?=$file_url?>/js/manage.js?20201111"></script>
<!-- <script src="<?=$file_url?>/bootstrap-daterangepicker/moment.min.js"></script>
 <script src="<?=$file_url?>/bootstrap-daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" href="<?=$file_url?>/bootstrap-daterangepicker/daterangepicker.css" type="text/css"> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
// var hid_frame='hidden1608618704';
// var mlv='10';
// var alv='2';
// var root_url='https://smartwing.mywisa.com';
// var engine_url='https://x67-engine.mywisa.com/wm_engine_SW';
// var this_url='https://smartwing.mywisa.com/_manage/?body=1010';
// var manage_url='https://smartwing.mywisa.com';
// var ace_counter_gcode=''; // 에이스카운터 GCODE
// var msg_use='';
// var uip = "118.37.116.250";
// var _order_sales = new Array();
// _order_sales['sale2'] = '이벤트';
// _order_sales['sale4'] = '회원할인';
// _order_sales['sale5'] = '전체쿠폰';
// _order_sales['sale7'] = '개별쿠폰';
// _order_sales['sale6'] = '금액할인';
//
// $(document).ready(function() {
// 	$(':checkbox[name="check_pno\[\]"], :checkbox.list_check').click(function() {
// 		if($(this).is(':checked') == true) $(this).parents('tr').addClass('checked');
// 		else $(this).parents('tr').removeClass('checked');
// 	});
//     $('.searching_select>select').select2({'language':'ko'});
// });
</script>
</head>
