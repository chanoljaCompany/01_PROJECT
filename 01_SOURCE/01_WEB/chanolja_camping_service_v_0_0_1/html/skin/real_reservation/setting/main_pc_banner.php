<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/top.php";

$division = "banner_pc_write";
$seq = isset($_REQUEST["seq"]) ? $_REQUEST["seq"] : '';
$userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : '';

$sql = "SELECT  *
        FROM $MAIN_PC_BANNER_TB
        WHERE 1=1
        ";
$rows = sql_fetch($sql);
// print_r($rows);
$bannerLink_1 = $rows['banner_link_1'];
$bannerLink_2 = $rows['banner_link_2'];
$bannerLink_3 = $rows['banner_link_3'];
$bannerLink_4 = $rows['banner_link_4'];
$bannerLink_5 = $rows['banner_link_5'];
$bannerLink_6 = $rows['banner_link_6'];
$bannerLink_7 = $rows['banner_link_7'];
$bannerLink_8 = $rows['banner_link_8'];

$bannerImg_1 = $rows['banner_images_1'] ? "/upload/banner/pc/".$rows['banner_images_1'] : '';
$bannerImg_2 = $rows['banner_images_2'] ? "/upload/banner/pc/".$rows['banner_images_2'] : '';
$bannerImg_3 = $rows['banner_images_3'] ? "/upload/banner/pc/".$rows['banner_images_3'] : '';
$bannerImg_4 = $rows['banner_images_4'] ? "/upload/banner/pc/".$rows['banner_images_4'] : '';
$bannerImg_5 = $rows['banner_images_5'] ? "/upload/banner/pc/".$rows['banner_images_5'] : '';
$bannerImg_6 = $rows['banner_images_6'] ? "/upload/banner/pc/".$rows['banner_images_6'] : '';
$bannerImg_7 = $rows['banner_images_7'] ? "/upload/banner/pc/".$rows['banner_images_7'] : '';
$bannerImg_8 = $rows['banner_images_8'] ? "/upload/banner/pc/".$rows['banner_images_8'] : '';
// print_r($rows);
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
<form name = "imguploadForm" id = "imguploadForm" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden"	name="userid" id="userid" value="<?=$userid?>">
	<div class="box_title first">
		<h2 class="title">등록정보</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">등록정보</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:35%">
			<col style="width:15%">
			<col style="width:35%">
		</colgroup>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_1" name="bannerLink_1" class="input input_full_full" value="<?=$bannerLink_1?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_1" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_1?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_2" name="bannerLink_2" class="input input_full_full" value="<?=$bannerLink_2?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_2" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_2?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_3" name="bannerLink_3" class="input input_full_full" value="<?=$bannerLink_3?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_3" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_3?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_4" name="bannerLink_4" class="input input_full_full" value="<?=$bannerLink_4?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_4" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_4?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_5" name="bannerLink_5" class="input input_full_full" value="<?=$bannerLink_5?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_5" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_5?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_6" name="bannerLink_6" class="input input_full_full" value="<?=$bannerLink_6?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_6" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_6?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_7" name="bannerLink_7" class="input input_full_full" value="<?=$bannerLink_7?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_7" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_7?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">링크</font></th>
      <td colspan="3">
        <input type="text" id="bannerLink_8" name="bannerLink_8" class="input input_full_full" value="<?=$bannerLink_8?>"/>
      </td>
    </tr>
    <tr>
      <th scope="row">배너 이미지<br><font color="red"><b>최적 사이즈 : 1920 x 550</b></font></th>
      <td colspan="3">
        <input type="file" id="bannerImg_8" name="bannerImg[]"  class="dropify dropify-event" data-default-file="<?=$bannerImg_8?>"/>
      </td>
    </tr>
	</table>
	<div class="box_bottom">
    <!-- <span class="box_btn"><input type="button" id="counselor_list" value="목록"></span> -->
		<span class="box_btn blue"><input type="button" id="imgchangeBtn" value="변경"></span>
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
<script>
$('#imgchangeBtn').click(function(){
  var form = $('#imguploadForm')[0];
  var formData = new FormData(form);
  var result = confirm("등록/변경 하시겠습니까?");
  if(result) { //확인 클릭 시
    $.ajax({
      type: 'post',
      enctype: 'multipart/form-data',
      url:"banner_write_action.php",
      data:formData,
      cache:false,
      contentType : false,
      processData : false,
         success:function(json){
          var obj = json.dataret;
          var recode = obj[0].ret_code;
          var recode_msg = obj[0].ret_code_msg;
            alert(recode_msg);
           if(recode == '100'){ //성공
               location.reload();
           }else{

         }
       }
     });
   }
});
</script>
<script src="/design/dropify/dist/js/dropify.min.js"></script>
<script>
    // $(document).ready(function(){
    var delfileid = "";
    var delfileName = "";
    $(function(){
        // Basic
        // $('.dropify').dropify();
        // Used events
        $('.dropify').dropify({
            messages: {
                'default': '최적이미지는 1920 x 550 사이즈입니다.',
                'replace': '최적이미지는 1920 x 550 사이즈입니다',
                'remove':  '삭제',
                'error':   '오류가 발생하였습니다.'
            }
        });

        var drEvent = $('.dropify-event').dropify();
        drEvent.on('dropify.beforeClear', function(event, element){
            // alert(event.target.id);
            // console.log(JSON.stringify(element));
            delfileid = event.target.id;
            delfileName = element.file.name;
            return confirm("삭제하시겠습니까?");

        });
        drEvent.on('dropify.afterClear', function(event, element){
            // alert('event' + event);
              // alert(delfileid);
            filedelete(delfileid,delfileName);
        });
    });
    function filedelete(delfileid,delfileName){
      var division = "filedelete";
      $.ajax({
        type: 'POST',
        url:"banner_write_action.php",
        data: {
               division : division,
               delData : delfileid,
               delfileName : delfileName
        },
        error: function (request, status, error) {
        console.log('sindySelect error');
        },
        success:function(json){
         var obj = json.dataret;
         var recode = obj[0].ret_code;
         var recode_msg = obj[0].ret_code_msg;
          alert(recode_msg);
          if(recode == '100'){ //성공
              location.reload();
          }
          else{

          }
       }
     });
    }
</script>
</body>
</html>
