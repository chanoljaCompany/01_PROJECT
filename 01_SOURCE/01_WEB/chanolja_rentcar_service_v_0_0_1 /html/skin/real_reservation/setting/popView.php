<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/top.php";
$mode = "popinput";
$seq = isset( $_REQUEST['seq'] ) ?  $_REQUEST['seq']  : "";
// $imgCheck = "Y";
if($seq){
    $mode = "popmod";
  	$sql = "SELECT *	FROM $POPUPITEM WHERE 1=1 AND seq = '$seq'";
  	$result = sql_query($sql);
  	$row = mysqli_fetch_array($result);
    // $Image = $row['Image'] ? "/upload/popup/".$row['Image'] : '';
    // if($row['Image'])  $imgCheck = "N";
}
?>
<style>
		.modal-dialog.modal-fullsize {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		}
   body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<body id="manage">
<div id="admin_content">
	<div id="container">
    <? include $admin_root."/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
	<div class="clear"></div>
<form name = "setting" id="form" method="post" enctype="multipart/form-data">
 <input type="hidden" name="division" id="division" value="<?=$mode?>">
 <input type="hidden" name="seq" id="seq" value="<?=$seq?>">
 <input type="hidden" name="pageId" id="pageId" value="popup">

	<div class="box_title first">
		<h2 class="title">홈페이지 팝업</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">홈페이지 팝업</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
    <tr>
      <th scope="row">제목</th>
			<td>
				<input type="text" name="subject" id="subject" class="input input_full" placeholder="제목" value="<?=$row['subject']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">PC오픈위치</th>
			<td>
				상단 : <input type="text" name="ptop" id="ptop" class="input" placeholder="상단" value="<?=$row['ptop']?>">px
        /좌측 : <input type="text" name="pleft" id="pleft" class="input" placeholder="좌측" value="<?=$row['pleft']?>">px
			</td>
		</tr>
    <tr>
      <th scope="row">모바일오픈위치</th>
      <td>
        상단 : <input type="text" name="mtop" id="mtop" class="input" placeholder="상단" value="<?=$row['mtop']?>">px
        /좌측 : <input type="text" name="mleft" id="mleft" class="input" placeholder="좌측" value="<?=$row['mleft']?>">px
      </td>
    </tr>
    <tr>
      <th scope="row">PC사이즈</th>
			<td>
				가로 : <input type="text" name="pwidth" id="pwidth" class="input" placeholder="가로" value="<?=$row['pwidth']?>">px
        /세로 : <input type="text" name="pheight" id="pheight" class="input" placeholder="세로" value="<?=$row['pheight']?>">px
			</td>
		</tr>
    <tr>
      <th scope="row">모바일사이즈</th>
			<td>
				가로 : <input type="text" name="mwidth" id="mwidth" class="input" placeholder="가로" value="<?=$row['mwidth']?>">px
        /세로 : <input type="text" name="mheight" id="mheight" class="input" placeholder="세로" value="<?=$row['mheight']?>">px
			</td>
		</tr>
    <!-- <tr>
      <th scope="row">링크</th>
			<td>
				<input type="text" name="link" id="link" class="input input_full" placeholder="링크" value="<?=$row['link']?>">
			</td>
		</tr> -->
    <tr>
      <th scope="row">다시보지않음</th>
      <td>
        <input type="text" name="ropendt" id="ropendt" class="input" placeholder="다시보지않음" value="<?=$row['ropendt']?>">일
      </td>
    </tr>
    <tr>
      <th scope="row">시작일</th>
      <td>
        <input type="text" name="StartDate" id="StartDate" class="input input_full experience" placeholder="시작일" value="<?=$row['StartDate']?>">
      </td>
    </tr>
    <tr>
      <th scope="row">종료일</th>
      <td>
        <input type="text" name="EndDate" id="EndDate" class="input input_full experience" placeholder="종료일" value="<?=$row['EndDate']?>">
      </td>
    </tr>
    <tr>
      <th scope="row">내용</th>
      <td>
          <textarea name="content" id="content" style="width: 100%; height: 412px;"><?=$row['content']?></textarea>
      </td>
    </tr>

	</table>
	<div class="box_bottom">
    <span class="box_btn blue"><input type="button" id="pop_act" value="등록/변경"></span>
    <span class="box_btn secondary"><input type="button" id="pop_list" value="목록"></span>
	</div>
</form>
</article>
</section>
		<?
		  include $admin_root."/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
var pageId = $('#pageId').val();
$(document).ready(function() {
	datepicker_set();
});
function datepicker_set() {
	$('.experience').daterangepicker({
		  singleDatePicker: true,
		   autoApply: true,
		  // autoUpdateInput: false, //input 공란처리..
		  locale: {
		      format: 'YYYY/MM/DD',
		      daysOfWeek: ['일','월','화','수','목','금','토'],
		      monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		      applyLabel: '확인 <i class="fa fa-check"></i>',
		      cancelLabel: '취소 <i class="fa fa-times"></i>'
		  },

		});
	}
$('#pop_list').click(function(){
  location.href="/sys_admin/setting/popList.php?top_menu_id=2001&left_menu_id=022";
});
$('#pop_act').click(function(){
  var division = $('#division').val();
  var seq =   $('#seq').val();
  var link =   $('#link').val();
  var subject =   $('#subject').val();
  var StartDate =   $('#StartDate').val();
  var EndDate =   $('#EndDate').val();
  // var imgCheck =   $('#imgCheck').val();
  //var fileCheck = document.getElementById("gdsImg").value;
  // if(imgCheck == 'Y'){
  //   var fileCheck = $('#popupImg').val();
  //   if(!fileCheck){
  //         alert("이미지를  첨부해 주세요");
  //         return false;
  //   }
  // }
  var content = $("#content").val();
  oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
      var content = $("#content").val();
      if( content == ""  || content == null || content == '&nbsp;' || content == '<p>&nbsp;</p>')  {
           alert("내용을 입력하세요.");
           oEditors.getById["content"].exec("FOCUS"); //포커싱
           return;
      }
  oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
  if( subject == ''){
    alert('제목을 입력하세요.');
    return false;
  }
  if( link == ''){
    alert('링크를 입력하세요.');
    return false;
  }
  if( StartDate == ''){
    alert('시작일을 입력하세요.');
    return false;
  }
  if( EndDate == ''){
    alert('종료일을 입력하세요.');
    return false;
  }
    var form = $('#form')[0];
    var formData = new FormData(form);
    for (var pair of formData.entries())
    {
    console.log(pair[0]+ ', ' + pair[1]);
    }
    var result = confirm("등록/변경 하시겠습니까?");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'POST',
            url:"pop_write_action.php",
            enctype: 'multipart/form-data',
            data:formData,
            cache:false,
            contentType : false,
            processData : false,
           error: function (request, status, error) {
             console.log('pop_write_action error');
           },
           success:function(json) {
                 var obj = json.dataret;
                 var recode = obj[0].ret_code;
                 var recode_msg = obj[0].ret_code_msg;
                 alert(recode_msg);
                 if(recode == '100'){ //성공
                   location.href="/sys_admin/setting/popList.php?top_menu_id=2001&left_menu_id=022";
                 }else{
                   // inputmodal.modal("hide"); //닫기
                   // member_search_act();
                 }
             }
         });
        }
      });
      var content = "";
      var oEditors = [];
      var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
      nhn.husky.EZCreator.createInIFrame({
      	oAppRef: oEditors,
      	elPlaceHolder: "content",
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
      	},
      	fCreator: "createSEditor2"
      });
</script>
</body>
</html>
