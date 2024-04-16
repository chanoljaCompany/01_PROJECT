<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
$division = $_REQUEST['division'];
$facility_code = $_REQUEST['facility_code'];

if($division == 'modify'){ //수정
	$FACILITY_INFO_TB= "facility_info";
	$FACILITY_IMAGE_INFO_TB = "facility_image_info";
	$sql = "SELECT *	FROM $FACILITY_INFO_TB WHERE pension_user_id = '$session_userid' AND facility_code = '$facility_code'";
	$result = sql_query($sql);
	$rows = mysqli_fetch_array($result);
	$facility_content = nl2br($rows['facility_content']);

	$sql_img = "SELECT *	FROM $FACILITY_IMAGE_INFO_TB WHERE pension_user_id = '$session_userid' AND facility_code = '$facility_code'";
	$result_img = sql_query($sql_img);
	  $img_info_array = array();
	  while ($rows_img = mysqli_fetch_array($result_img)) {
	    $arrData = array(
								'seq' => $rows_img['seq'],
	              'facility_code' => $rows_img['facility_code'],
	              'facility_image_name' => $rows_img['facility_image_name'],
								'facility_image_size' => $rows_img['facility_image_size'],
	               );
	    array_push($img_info_array, $arrData);
	  }
}else if($division == 'input'){ //신규등록
	 $facility_code = str_shuffle(time());
}

$facilityImageNum = sizeof($img_info_array);
// print_r($img_info_array);
$filesLimitNumSet = "10";
$filesLimitNum = $filesLimitNumSet - $facilityImageNum;
// echo "
// filesLimitNumSet >>> $filesLimitNumSet <br>
// filesLimitNum >>> $filesLimitNum <br>
// facilityImageNum >>> $facilityImageNum <br>
//
// ";
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=$file_url?>/js/FileUp/jquery.growl.css" rel="stylesheet" type="text/css">
<link href="<?=$file_url?>/js/FileUp/src/fileup.css" rel="stylesheet" type="text/css">
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<!-- <form name="facility" method="post" enctype="multipart/form-data" action="facility_write_action.php"> -->
						<form name="facility" method="post" enctype="multipart/form-data">
							<input type="hidden" name="division" id="division" value="<?=$division?>">
							<input type="hidden" name="facility_code" id="facility_code" value="<?=$facility_code?>">
							<input type="hidden" name="filesLimitNum" id="filesLimitNum" value="<?=$filesLimitNum?>">
							<input type="hidden" name="pageId" id="pageId" value="facility">

							<!-- <input type="hidden" name="facilityImageNum" id="facilityImageNum" value="<?=$facilityImageNum?>"> -->
						<div class="box_title first">
							<h2 class="title">부대시설등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">부대시설등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:40%">
								<col style="width:10%">
								<col style="width:40%">
							</colgroup>
							<tr>
								<th scope="row">부대시설명</th>
								<td>
									<input type="text" name="facility_name" id ="facility_name" class="input input_full" placeholder="*필수) 부대시설명" value="<?=$rows['facility_name']?>">
								</td>
								<th scope="row">부대시설요금</th>
								<td>
									<input type="number" name="facility_fee" id ="facility_fee"  class="input input_full" placeholder="숫자만 입력"  value="<?=$rows['facility_fee']?>">
								</td>
							</tr>
							<tr>
								<th scope="row">부대시설 설명</th>
								<td colspan="3">
									<textarea name="facility_content" id="facility_content" style="width: 100%; height: 412px;"><?=$facility_content?></textarea>
								</td>
							</tr>
						</table>

						<div class="box_title first">
							<h2 class="title">부대시설이미지</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">부대시설이미지</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:5%">
								<col style="width:85%">
							</colgroup>
							<tr>
								<th scope="row">부대시설 이미지 등록</th>
								<td colspan="3">
									<!-- <input type="text" name="facility_img" id ="facility_img"  class="input input_full_full"> -->
									<!-- <form id="multiple"> -->
									<!-- <input type="file" name="upload[]" multiple="multiple"> -->
									<div id="uploadForm">
									<button type="button" class="btn btn-success fileup-btn">
										 부대시설이미지 선택
										 <input type="file" id="upload" multiple="multiple" accept="image/*">

								 </button>
								 ctrl키를 누르신 상태에서 이미지를 선택하시면 최대 10개까지 선택가능합니다.
								 <!-- <a class="control-button"  href="javascript:$.fileup('upload', 'upload', '*')">Upload all</a>
								 <a class="control-button"  href="javascript:$.fileup('upload', 'remove', '*')">Remove all</a> -->
							 </div>
								 <div id="upload-queue" class="queue">

								 </div>
									<?
									$i="1";
									foreach ($img_info_array as $key=>$value) {
										  $nam = $i%3;
											if($nam != '0'){
												$style_str = "style=\"float: left; width: 33%\"";
											}else{
												$style_str = "";
											}
// 											echo "
// nam >>> $nam <br>
// 											";
										    $imgUrl = $facility_image_url."/thumb_img/".$value['facility_image_name'];
									?>

									<div id="upload_<?=$Nm?>" class="fileup-file fileup-image" <?=$style_str?>>
										<div class="fileup-preview">
											<img src="<?=$imgUrl?>" alt="<?=$value['facility_image_name']?>">
										</div>
										<div class="fileup-container">
											<div class="fileup-description">
														<span class="fileup-name"><?=$value['facility_image_name']?></span> (<span class="fileup-size"><?=$value['facility_image_size']?></span>)</div>
														<div class="fileup-controls">
														<span class="fileup-remove" onclick="image_del('<?=$value['seq']?>', '<?=$value['facility_code']?>', '<?=$value['facility_image_name']?>');" title="삭제"></span>
														<span class="fileup-upload" onclick="$.fileup('upload', 'upload', '0');"></span>
														<span class="fileup-abort" onclick="$.fileup('upload', 'abort', '0');" style="display:none">Abort</span></div>
											<div class="fileup-result"></div>
												<div class="fileup-progress"></div>
										 </div>
										 <div class="fileup-clear"></div>
									</div>
										<?$i++;}?>
										<br>

								    <!-- </form> -->
								</td>
							</tr>
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="facility_input_image" value="등록"></span>
							<span class="box_btn gray"><input type="button" id="facility_list" value="목록"></span>
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
var facility_code = $('#facility_code').val();
var filesLimitNum = $('#filesLimitNum').val();
var pageId = $('#pageId').val();
var imageNum = "0";
var onselectStr = "";
var facility_name = "";
var facility_fee =  "";
var facility_content = "";
var oEditors = [];
var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "facility_content",
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
		// oEditors.getById["facility_content"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["facility_content"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["facility_content"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["facility_content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("facility_content").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["facility_content"].setDefaultFont(sDefaultFont, nFontSize);
}

	function image_del(seq,facility_code,facility_image_name){
		var result = confirm("삭제하시겠습니까?\n삭제시 복구가 불가능합니다.");
				 if(result ){ //확인 클릭 시
							var division = "facilityImageDel";
							$.ajax({
								type: 'GET',
								url:'./facility_write_action.php',
								data: {
											 division : division,
											 seq : seq,
											 facility_code : facility_code,
											 facility_image_name : facility_image_name
										 },
								error: function (request, status, error) {
								console.log('image_del error');
								},
								success:function(html){
									//	$("#reserve_search_list_data").html(html);
									location.reload();
							 }});
				}
	}
		function facility_input_check() {
		console.log(' facility_input ============= onselectStr ' + onselectStr + ' imageNum ' + imageNum);
		// onselectStr ="";
		// imageNum ="0";
		oEditors.getById["facility_content"].exec("UPDATE_CONTENTS_FIELD", []);
		facility_code = $('#facility_code').val();
		facility_name = $('#facility_name').val();
		facility_fee = $('#facility_fee').val();
		facility_content = $('#facility_content').val();

		if(facility_name == '') { warning('부대시설명을','facility_name'); return false; }
		// if(facility_fee == '') { warning('부대시설요금','facility_fee');	return false; }
    return true;
   }

	function facility_input_action(){
		var sh = document.facility;
		sh.action = "facility_write_action.php";
		sh.submit();
	}
	// });
</script>
<script src="<?=$file_url?>/js/FileUp/jquery.growl.js"></script>
<script src="<?=$file_url?>/js/FileUp/src/fileup.js"></script>
<script>
// alert('filesLimitNum ' + filesLimitNum);
$(document).ready(function() {
   // alert('filesLimitNum2 ' + filesLimitNum);
	 if(filesLimitNum == '0'){
		   $('#uploadForm').hide();
  }
});
 // alert('filesLimitNum ' + filesLimitNum);
     $('#facility_input_image').click(function(){
			 var checkVal = facility_input_check();
     		if(checkVal == true){
						 var result = confirm("등록/변경 하시겠습니까?");
								if(result){ //확인 클릭 시
						        if(onselectStr == '' && imageNum == '0'){
													facility_input_action();
										}else{
												 $.fileup('upload', 'upload', '*');
										}
								 }
							}
		 	});

			$('#facility_list').click(function(){
 				location.href = "facility_list.php?top_menu_id=2001&left_menu_id=004";
 		 	});

		$.fileup({
            url: './facilityImageUpload.php?file_upload=1&facility_code='+facility_code,
            inputID: 'upload',
						filesLimit: filesLimitNum,
            dropzoneID: 'upload-dropzone',
            queueID: 'upload-queue',
            onSelect: function(file) {
                $('#multiple .control-button').show();
								imageNum++;
								onselectStr = "Y";
            },
            onRemove: function(file, total) {
                if (file === '*' || total === 1) {
                    $('#multiple .control-button').hide();
                }
            },
            onSuccess: function(response, file_number, file) {
							var endValue = Number(imageNum) - Number(1);
							// alert('response ' + response + ' file ' + file);
								if(endValue == file_number){
									// alert('완료');
										facility_input_action();
									// break;
								}else{
								   $.growl.notice({ title: "Upload success!", message: file.name });
								}
            },
            onError: function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            }
        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
