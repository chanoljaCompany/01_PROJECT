<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
$NBOARD_TB = "inquire_board";
$NBOARD_BOARD_FILE_TB = "board_file";
$page = $_REQUEST["curpage"];
$division = "board_reply";
$w ="";
if(isset($_REQUEST["wr_id"])){
  $sql = "SELECT * FROM $NBOARD_TB
  				WHERE pension_user_id = '$session_userid'
          AND wr_id = '$_REQUEST[wr_id]'
          ";
  $result = sql_query($sql);
  $rows = mysqli_fetch_array($result);

  $sql_re = "SELECT * FROM $NBOARD_TB
             WHERE pension_user_id = '$session_userid'
             AND wr_parent = '$_REQUEST[wr_id]'
             AND wr_reply = 'A';
          ";
  $result_re = sql_query($sql_re);
  $rows_re = mysqli_fetch_array($result_re);
  echo "
  sql_re >> $sql_re <br>
  ";

  $sql_img = "SELECT *	FROM $NBOARD_BOARD_FILE_TB WHERE pension_user_id = '$session_userid' AND  original_table = '$NBOARD_TB' AND original_seq = '$_REQUEST[wr_id]' ORDER BY seq ASC";
//   echo "
// sql_img >>> $sql_img <br>
//   ";
	$result_img = sql_query($sql_img);
	  $array_img = array();
	  while ($rows_img = mysqli_fetch_array($result_img)) {
	    $img_Data = array(
								'seq' => $rows_img['seq'],
	              'original_table' => $rows_img['original_table'],
	              'original_seq' => $rows_img['original_seq'],
								'v_fileName' => $rows_img['v_fileName'],
                'o_fileName' => $rows_img['o_fileName'],
                'file_size' => $rows_img['file_size']
	               );
	    array_push($array_img, $img_Data);
	  }
  if($rows_re['wr_id']){
      $w = "ru";
  }else{
      $w = "r";
  }

  $array_img_num = sizeof($array_img);
//   echo "
// array_img_num >>> $array_img_num <br>
//   ";
  $board_upload_num = $baord_upload_max - $array_img_num;
}

function formatSize($bytes, $decimals = 2) {
  $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

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
<!-- <script type="text/javascript">
var r_currency_list = new layerWindow('config@reference_currency.exe');
</script> -->
<form name = "nboard" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden" name="pageId" id="pageId" value="nboard">
 <input type="hidden" name="wr_id" id="wr_id" value="<?=$_REQUEST["wr_id"]?>">
 <input type="hidden" name="wr_id_re" id="wr_id_re" value="<?=$rows_re['wr_id']?>">
 <input type="hidden" name="w" id="w" value="<?=$w?>">
 <input type="hidden" name="board_upload_num" id="board_upload_num" value="<?=$board_upload_num?>">
 <input type="hidden" name="curpage" id="curpage" value="<?=$page?>">
 <input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
 <input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
	<div class="box_title first">
		<h2 class="title">문의하기</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">문의하기</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
		<tr>
			<th scope="row">제목</th>
			<td>
        <?=$rows['wr_subject']?>

			</td>
		</tr>
    <tr>
			<th scope="row">내용</th>
			<td>
        <?=$rows['wr_content']?>
			</td>
		</tr>
    <tr>
			<th scope="row">링크#1</th>
			<td>
        <?=$rows['wr_link1']?>
			</td>
		</tr>
    <tr>
			<th scope="row">링크#2</th>
			<td>
        <?=$rows['wr_link2']?>

			</td>
		</tr>
    <tr>
			<th scope="row">파일</th>
			<td>
        <?
           foreach ($array_img as $key=>$value) {
               $filesize = formatSize($value['file_size']);
        ?>
               <!-- <div><a href=<?=$file_url?>/community/download.php?original_table=<?=$value['original_table']?>&seq=<?=$value['seq']?>&no=0&page=27"><?=$value['v_fileName']?></a></div> -->
               <ul>
                    <li>
                       	<i class="fa fa-folder-open" aria-hidden="true"></i>
                        <a href="<?=$file_url?>/community/inquire/nboard_file_download.php?original_table=<?=$value['original_table']?>&seq=<?=$value['seq']?>&no=0&page=<?=$page?>&top_menu_id=<?=$top_menu_id?>&left_menu_id=<?=$left_menu_id?>" class="view_file_download">
                            <?=$value['v_fileName']?>(<?=$filesize?>)
                        </a>
                        &nbsp;&nbsp;
                        <!-- <a href="#" onclick="board_delete('<?=$value['original_table']?>','<?=$value['seq']?>','<?=$value['original_seq']?>','<?=$top_menu_id?>','<?=$left_menu_id?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                        <br>
                        <br>
                        <!-- <span class="bo_v_file_cnt">2회 다운로드 | DATE : 2021-01-27 11:00:42</span> -->
                    </li>
                </ul>
        <?}?>
			</td>
		</tr>
  </table>
  <div class="box_title first">
    <h2 class="title">답변하기</h2>
  </div>
  <table class="tbl_row multi_shop">
    <caption class="hidden">답변하기</caption>
    <colgroup>
      <col style="width:15%">
      <col style="width:85%">
    </colgroup>
    <tr>
			<th scope="row">제목</th>
			<td>
        <input type="text" name="wr_subject" id ="wr_subject" class="input input_full" placeholder="*필수) 제목" value="<?=$rows_re['wr_subject']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">내용</th>
      <td>
        <textarea name="nboard_content" id="nboard_content" style="width: 100%; height: 412px;"><?=$rows_re['wr_content']?></textarea>
      </td>
    </tr>
      </table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="nboard_write_input" value="답변등록"></span>
    <span class="box_btn blue"><input type="button" id="nboard_list" value="목록"></span>
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
var top_menu_id = $("#top_menu_id").val();
var left_menu_id = $("#left_menu_id").val();
var board_upload_num = $('#board_upload_num').val();
var pageId = $('#pageId').val();
var nboard_content = "";
var oEditors = [];
var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "nboard_content",
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
		// oEditors.getById["nboard_content"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["nboard_content"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["nboard_content"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["nboard_content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("nboard_content").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["nboard_content"].setDefaultFont(sDefaultFont, nFontSize);
}


$('#nboard_list').click(function() {
  var curpage = $("#curpage").val();
  location.href="nboard_list.php?top_menu_id="+top_menu_id+"&left_menu_id="+left_menu_id+"&curpage="+curpage;
});
  $('#nboard_write_input').click(function() {
    var wr_subject = $("#wr_subject").val();
    if(wr_subject == '') { warning('제목을 입력하세요.','wr_subject'); return false; }
    var nboard_content = $("#nboard_content").val();
    oEditors.getById["nboard_content"].exec("UPDATE_CONTENTS_FIELD", []);
        var nboard_content = $("#nboard_content").val();

        if( nboard_content == ""  || nboard_content == null || nboard_content == '&nbsp;' || nboard_content == '<p>&nbsp;</p>')  {
             alert("내용을 입력하세요.");
             oEditors.getById["nboard_content"].exec("FOCUS"); //포커싱
             return;
        }
    oEditors.getById["nboard_content"].exec("UPDATE_CONTENTS_FIELD", []);
    var sh = document.nboard;
		sh.action = "nboard_write_action.php";
		sh.submit();
	});
</script>
</body>
</html>
