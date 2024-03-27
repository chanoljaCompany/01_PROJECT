<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/top.php";
$mode = "input";
$seq = isset( $_REQUEST['seq'] ) ?  $_REQUEST['seq']  : "";

if($seq){
    $mode = "mod";
  	$sql = "SELECT *	FROM $MOBBOTTOMPOP WHERE 1=1 AND seq = '$seq'";
  	$result = sql_query($sql);
  	$row = mysqli_fetch_array($result);
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
<form name = "setting" method="post" enctype="multipart/form-data">
 <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
 <input type="hidden" name="seq" id="seq" value="<?=$seq?>">
	<div class="box_title first">
		<h2 class="title">모바일 하단 팝업</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">모바일 하단 팝업</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
    <tr>
      <th scope="row">사용여부</th>
			<td>
				<input type="radio" name="post_show" <? if($row['post_show'] == 'Y'){?> checked <?}?> value="Y">사용
        <input type="radio" name="post_show" <? if($row['post_show'] == 'N' || $row['post_show'] == ''){?> checked <?}?>value="N">사용하지않음
			</td>
		</tr>
    <tr>
      <th scope="row">링크</th>
			<td>
				<input type="text" name="link" id="link" class="input input_full" placeholder="링크" value="<?=$row['link']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">내용</th>
			<td>
				<input type="text" name="content" id="content" class="input input_full" placeholder="내용" value="<?=$row['content']?>">
			</td>
		</tr>
	</table>
	<div class="box_bottom">
    <span class="box_btn blue"><input type="button" id="mobbottom_act" value="등록/변경"></span>
    <span class="box_btn secondary"><input type="button" id="mobbottom_list" value="목록"></span>
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
$('#mobbottom_list').click(function(){
  location.href="/sys_admin/setting/mobbottomList.php?top_menu_id=2001&left_menu_id=021";
});
$('#mobbottom_act').click(function(){
  var division = $('#mode').val();
  var seq =   $('#seq').val();
  var link =   $('#link').val();
  var content =   $('#content').val();
  var post_show = $(':radio[name="post_show"]:checked').val();


  if( link == ''){
    alert('링크를 입력하세요.');
    return false;
  }
  if(content == ''){
    alert('내용을 입력하세요.');
    return false;
  }

    var result = confirm("등록/변경 하시겠습니까?");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'POST',
            url:"pop_write_action.php",
            dataType:"json",
            data: {
                   division : division,
                   link : link,
                   content : content,
                   seq : seq,
                   post_show : post_show
                },
            cache:false,
               success:function(json){
                 var obj = json.dataret;
                 var recode = obj[0].ret_code;
                 var recode_msg = obj[0].ret_code_msg;
                 alert(recode_msg);
                 if(recode == '100'){ //성공
                   location.href="/sys_admin/setting/mobbottomList.php?top_menu_id=2001&left_menu_id=021";
                 }else{
                   // inputmodal.modal("hide"); //닫기
                   // member_search_act();
                 }
             }
         });
        }
      });
</script>
</body>
</html>
