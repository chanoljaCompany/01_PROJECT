<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
	$sql = "SELECT *	FROM $ALIMTALK_SETTING_TB";
	$result = sql_query($sql);
	$row = mysqli_fetch_array($result);
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
    <? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
	<div class="clear"></div>
<form name = "setting" method="post" enctype="multipart/form-data">
 <input type="hidden" name="pageId" id="pageId" value="nboard">
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
      <th scope="row">템플릿명</th>
			<td>
				<input type="text" name="al_join_name" id="al_join_name" class="input input_full" placeholder="템플릿명" value="<?=$row['al_join_name']?>">
			</td>
      <th scope="row">템플릿코드</th>
			<td>
				<input type="text" name="al_join_code" id="al_join_code" class="input input_full" placeholder="템플릿코드" value="<?=$row['al_join_code']?>">
			</td>
		</tr>
      <tr>
			<th scope="row">내용</th>
			<td colspan="3">
        <textarea name="al_join" id="al_join" style="width: 100%; height: 100px;"><?=$row['al_join']?></textarea>
			</td>
		</tr>
    <tr>
      <th scope="row">템플릿명</th>
			<td>
				<input type="text" name="al_charge_name" id="al_charge_name" class="input input_full" placeholder="템플릿명" value="<?=$row['al_charge_name']?>">
			</td>
      <th scope="row">템플릿코드</th>
			<td>
				<input type="text" name="al_charge_code" id="al_charge_code" class="input input_full" placeholder="템플릿코드" value="<?=$row['al_charge_code']?>">
			</td>
		</tr>
    <tr>
			<th scope="row">내용</th>
		<td colspan="3">
        <textarea name="al_charge" id="al_charge" style="width: 100%; height: 100px;"><?=$row['al_charge']?></textarea>
			</td>
		</tr>
    <tr>
      <th scope="row">템플릿명</th>
			<td>
				<input type="text" name="al_finish_name" id="al_finish_name" class="input input_full" placeholder="템플릿명" value="<?=$row['al_finish_name']?>">
			</td>
      <th scope="row">템플릿코드</th>
			<td>
				<input type="text" name="al_finish_code" id="al_finish_code" class="input input_full" placeholder="템플릿코드" value="<?=$row['al_finish_code']?>">
			</td>
		</tr>
    <tr>
			<th scope="row">내용</th>
			<td colspan="3">
        <textarea name="al_finish" id="al_finish" style="width: 100%; height: 100px;"><?=$row['al_finish']?></textarea>
			</td>
		</tr>


		<tr>
      <th scope="row">템플릿명</th>
			<td>
				<input type="text" name="al_sandamsa_name" id="al_sandamsa_name" class="input input_full" placeholder="템플릿명" value="<?=$row['al_sandamsa_name']?>">
			</td>
      <th scope="row">템플릿코드</th>
			<td>
				<input type="text" name="al_sandamsa_code" id="al_sandamsa_code" class="input input_full" placeholder="템플릿코드" value="<?=$row['al_sandamsa_code']?>">
			</td>
		</tr>
    <tr>
			<th scope="row">내용</th>
			<td colspan="3">
        <textarea name="al_sandamsa" id="al_sandamsa" style="width: 100%; height: 100px;"><?=$row['al_sandamsa']?></textarea>
			</td>
		</tr>

		<!-- <tr>
      <th scope="row">상담문의(고객용)</th>
			<td>
				<input type="text" name="al_customer_name" id="al_customer_name" class="input input_full" placeholder="상담문의(고객용) 템플릿명" value="<?=$row['al_customer_name']?>">
			</td>
      <th scope="row">상담문의(고객용) 템플릿코드</th>
			<td>
				<input type="text" name="al_customer_code" id="al_customer_code" class="input input_full" placeholder="상담문의(고객용) 템플릿코드" value="<?=$row['al_customer_code']?>">
			</td>
		</tr>
    <tr>
			<th scope="row">상담문의(고객용)</th>
			<td colspan="3">
        <textarea name="al_customer" id="al_customer" style="width: 100%; height: 100px;"><?=$row['al_customer']?></textarea>
			</td>
		</tr>



		    <tr>
      <th scope="row">템플릿명</th>
			<td>
				<input type="text" name="al_month_name" id="al_month_name" class="input input_full" placeholder="템플릿명" value="<?=$row['al_month_name']?>">
			</td>
      <th scope="row">템플릿코드</th>
			<td>
				<input type="text" name="al_month_code" id="al_month_code" class="input input_full" placeholder="템플릿코드" value="<?=$row['al_month_code']?>">
			</td>
		</tr>
    <tr>
			<th scope="row">매월발송</th>
			<td colspan="3">
        <textarea name="al_month" id="al_month" style="width: 100%; height: 100px;"><?=$row['al_month']?></textarea>
			</td>
		</tr> -->

	</table>
	<div class="box_bottom">
    <span class="box_btn blue"><input type="button" id="al_setting_mod" value="변경"></span>
	</div>
</form>
</article>
</section>
		<?
		  include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script type="text/javascript">

$('#al_setting_mod').click(function(){
  var division = "al_setting_mod";

  var al_join_name = $('#al_join_name').val();
  var al_join_code = $('#al_join_code').val();
  var al_join = $('#al_join').val();

  var al_charge_name = $('#al_charge_name').val();
  var al_charge_code = $('#al_charge_code').val();
  var al_charge = $('#al_charge').val();

  var al_finish_name = $('#al_finish_name').val();
  var al_finish_code = $('#al_finish_code').val();
  var al_finish = $('#al_finish').val();

	var al_sandamsa_name = $('#al_sandamsa_name').val();
  var al_sandamsa_code = $('#al_sandamsa_code').val();
  var al_sandamsa = $('#al_sandamsa').val();

	var al_customer_name = $('#al_customer_name').val();
	var al_customer_code = $('#al_customer_code').val();
	var al_customer = $('#al_customer').val();

  var al_month_name = $('#al_month_name').val();
  var al_month_code = $('#al_month_code').val();
  var al_month = $('#al_month').val();
    var result = confirm("변경 하시겠습니까?");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'POST',
            url:"alimtalk_write_action.php",
            dataType:"json",
            data: {
                   division : division,
                   al_join_name : al_join_name,
                   al_join_code : al_join_code,
                   al_join : al_join,
                   al_charge_name : al_charge_name,
                   al_charge_code : al_charge_code,
                   al_charge : al_charge,
                   al_finish_name : al_finish_name,
                   al_finish_code : al_finish_code,
                   al_finish : al_finish,
									 al_sandamsa_name : al_sandamsa_name,
                   al_sandamsa_code : al_sandamsa_code,
                   al_sandamsa : al_sandamsa,
									 al_customer_name : al_customer_name,
                   al_customer_code : al_customer_code,
                   al_customer : al_customer,
                   al_month_name : al_month_name,
                   al_month_code : al_month_code,
                   al_month : al_month
                },
            cache:false,
               success:function(json){
                 var obj = json.dataret;
                 var recode = obj[0].ret_code;
                 var recode_msg = obj[0].ret_code_msg;
                 alert(recode_msg);
                 if(recode == '100'){ //성공
                   // location.reload();
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
