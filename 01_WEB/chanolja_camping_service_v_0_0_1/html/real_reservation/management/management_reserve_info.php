<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
$PENSION_MANAGEMENT_RESERVE_INFO_TB = "pension_management_reserve_info";
$division = "management_reserve_info";
$sub_id = $_REQUEST["sub_id"];
$left_menu_id = $_REQUEST["left_menu_id"];
if($sub_id == 'i_fee') {
  $column_name = "fee_info_content";
  $title_str = "요금안내";
}
else if($sub_id == 'i_reserve') {
  $column_name = "reserve_info_content";
  $title_str = "예약안내";
}
else if($sub_id == 'i_use') {
  $column_name = "use_info_content";
  $title_str = "이용안내";
}
else if($sub_id == 'i_refund') {
  $column_name = "refund_info_content";
  $title_str = "환불규정";
}

	$sql = "SELECT $column_name as dataContent	FROM $PENSION_MANAGEMENT_RESERVE_INFO_TB WHERE pension_user_id = '$session_userid'";
	$result = sql_query($sql);
	$row = mysqli_fetch_array($result);
  $dataContent = nl2br($row['dataContent']);
  // $reserve_info_content = nl2br($row['reserve_info_content']);
  // $use_info_content = nl2br($row['use_info_content']);
  // $refund_info_content = nl2br($row['refund_info_content']);
?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content" >
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
<div class="clear"></div>
<script type="text/javascript">
var r_currency_list = new layerWindow('config@reference_currency.exe');
</script>
<form name = "management_reserve_info" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden" name="pageId" id="pageId" value="reserve_info">
 <input type="hidden" name="sub_id" id="sub_id" value="<?=$sub_id?>">
 <input type="hidden" name="column_name" id="column_name" value="<?=$column_name?>">
 <input type="hidden" name="title_str" id="title_str" value="<?=$title_str?>">
 <input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
	<div class="box_title first">
		<h2 class="title"><?=$title_str?></h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden"><?=$title_str?></caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
		<tr>
			<th scope="row">내용</th>
			<td>
        <textarea name="reserve_info" id="reserve_info" style="width: 100%; height: 412px;"><?=$dataContent?></textarea>
			</td>
		</tr>
  </table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="management_reserve_info_input" value="등록"></span>
	</div>
</form>
</article>
</section>
		<?
		include "$_SERVER[DOCUMENT_ROOT]/pension_prj/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
var pageId = $('#pageId').val();
var reserve_info = "";
var oEditors = [];
var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "reserve_info",
	sSkinURI: "<?=$file_url?>/js/smarteditor2-fileup/SmartEditor2Skin.html",
	pageId : pageId, //스마트에디터 인자값추가..
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		// oEditors.getById["reserve_info"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["reserve_info"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["reserve_info"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["reserve_info"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("reserve_info").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["reserve_info"].setDefaultFont(sDefaultFont, nFontSize);
}

	$(document).ready(function() {
		// 위로가기
		$('#scroll_top').click(function(){
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});
		// 아래로가기
		$('#scroll_bottom').click(function(){
			$('html, body').animate({scrollTop:$(document).height()}, 'slow');
			return false;
		});
	});

	function warning(str,objid){
		alert(str);
		var objid = "#"+objid;
		$(objid).focus();
		return;
	}

	$('#management_reserve_info_input').click(function(){
    oEditors.getById["reserve_info"].exec("UPDATE_CONTENTS_FIELD", []);
					var result = confirm("등록/변경 하시겠습니까?");
						 if(result) { //확인 클릭 시
							 var sh = document.management_reserve_info;
							 sh.action = "management_write_action.php";
							 sh.submit();
							}
	 });
</script>
</body>
</html>
