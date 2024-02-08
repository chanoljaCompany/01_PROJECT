<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$option_code = isset($_REQUEST['option_code']) ? $_REQUEST['option_code'] : '';
$option_type = isset($_REQUEST['option_type']) ? $_REQUEST['option_type'] : '';
$left_menu_id = isset($_REQUEST['left_menu_id']) ? $_REQUEST['left_menu_id'] : 'b';

$option_content = "";
$rows = null;
$img_info_array = array();
$get_manager = get_manager("M");
if ($_SESSION['session_user_level'] != 'A') {
	$subqry = "AND user_id = '" . $_SESSION['session_user_id'] . "'";
} else {
	$subqry = "AND user_id LIKE '%%'";
}
if ($division == 'modify') { //수정
	$sql = "SELECT * FROM $OPTION_INFO_TB 
             WHERE 1=1 
             AND option_type = '$option_type' 
             $subqry
             AND option_code = '$option_code'
             ";
	$result = sql_query($sql);
	$rows = mysqli_fetch_array($result);
	$option_content = nl2br($rows['option_content']);
} else if ($division == 'input') { //신규등록
	$option_code = str_shuffle(time());
}
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?= $file_url ?>/js/FileUp/jquery.growl.css" rel="stylesheet" type="text/css">
<link href="<?= $file_url ?>/js/FileUp/src/fileup.css" rel="stylesheet" type="text/css">

<body id="manage">
	<div id="ToolTip"></div>
	<style type="text/css" title="">
		body {
			background: url('<?= $file_url ?>/img/line.gif') repeat-y left top #e8e8e8;
		}
	</style>
	<div id="admin_content">
		<div id="container">
			<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php"; ?>
			<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
					<!-- <form name="option" method="post" enctype="multipart/form-data" action="option_write_action.php"> -->
					<form name="option" id="option" method="post" enctype="multipart/form-data">
						<input type="hidden" name="division" id="division" value="<?= $division ?>">
						<input type="hidden" name="option_code" id="option_code" value="<?= $option_code ?>">
						<input type="hidden" name="option_type" id="option_type" value="<?= $option_type ?>">
						<input type="hidden" name="pageId" id="pageId" value="option">
						<div class="box_title first">
							<h2 class="title">옵션등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">옵션등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:23%">
								<col style="width:10%">
								<col style="width:23%">
								<col style="width:10%">
								<col style="width:24%">
							</colgroup>

							<? if ($option_type == 'p' && $_SESSION['session_user_level'] == 'A') { ?>
								<tr>
									<th scope="row">호스트선택</th>
									<td colspan="5">
										<select id="option_host" name="option_host" style="width: 50%">
											<?php
											if ($_SESSION['session_user_level'] == 'A') {
												foreach ($get_manager as $key => $value) { ?>
													<option <? if ($value['user_id'] == $rows['user_id']) { ?> selected <? } ?> value="<?= $value['user_id'] ?>"><?= $value['com_name'] ?></option>
												<? }
											} else { ?>
												<option value="<?= $_SESSION['session_user_id'] ?>"><?= $_SESSION['session_company_name'] ?></option>
											<? } ?>

										</select>
									</td>
								</tr>
							<? } ?>
							<tr>
								<th scope="row">옵션명</th>
								<td>
									<input type="text" name="option_name" id="option_name" class="input input_middle" placeholder="*필수) 옵션명" value="<?= $rows['option_name'] ?>">
								</td>
								<? if ($option_type == 'b') { ?>
									<th scope="row">옵션아이콘</th>
									<td>
										<input type="text" name="option_icon" id="option_icon" class="input input_middle" placeholder="옵션아이콘 입력" value="<?= $rows['option_icon'] ?>">
									</td>
								<? } else { ?>
									<th scope="row">옵션요금</th>
									<td>
										<input type="number" name="option_fee" id="option_fee" class="input input_middle" placeholder="숫자만 입력" value="<?= $rows['option_fee'] ?>">
									</td>
									<th scope="row">옵션구분</th>
									<td>
										<select name="option_divi" id="option_divi">
											<option <? if ($rows['option_divi'] == '1') { ?> selected <? } ?> value="1">1회성</option>
											<option <? if ($rows['option_divi'] == '2') { ?> selected <? } ?> value="2">일수</option>
									</td>
								<? } ?>
							</tr>
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="option_input" value="등록"></span>
							<span class="box_btn gray"><input type="button" id="option_list" value="목록"></span>
						</div>
					</form>
				</article>
			</section>
			<?
			include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
			?>
			<div id="btn_scroll">
				<a id="scroll_top"><img src="<?= $file_url ?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
				<a id="scroll_bottom"><img src="<?= $file_url ?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#option_input').click(function() {
			var option_code = $('#option_code').val();
			var option_name = $('#option_name').val();
			var option_fee = $('#option_fee').val();
			var option_type = $('#option_type').val();

			if (option_name == '') {
				alert('옵션명을 입력하세요.');
				return false;
			}
			if (option_type != 'b') {
				if (option_fee == '') {
					alert('옵션요금을 입력하세요.');
					return false;
				}
			}
			var form = $('#option')[0];
			var formData = new FormData(form);
			for (var pair of formData.entries()) {
				console.log(pair[0] + ', ' + pair[1]);
			}
			var result = confirm("등록 하시겠습니까?");
			if (result) { //확인 클릭 시
				$.ajax({
					type: 'POST',
					url: "option_write_action.php",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function(json) {
						var obj = json.dataret;
						// var obj  = JSON.parse(data);
						var recode = obj[0].ret_code;
						var recode_msg = obj[0].ret_code_msg;
						console.log('recode ' + recode + ' recode_msg ' + recode_msg);
						alert(recode_msg);
						if (recode == '100') { //성공
							location.href = "option_list.php?top_menu_id=2001&left_menu_id=<?= $left_menu_id ?>&option_type=" + option_type;
						} else {
							member_search_act();
						}
					}
				});
			}
		});

		$('#option_list').click(function() {
			var option_type = $('#option_type').val();
			location.href = "option_list.php?top_menu_id=2001&left_menu_id=<?= $left_menu_id ?>&option_type=" + option_type;
		});


		//     function option_input_check() {
		// 		console.log(' option_input ============= onselectStr ' + onselectStr + ' imageNum ' + imageNum);
		// 		// onselectStr ="";
		// 		// imageNum ="0";
		// 		// oEditors.getById["option_content"].exec("UPDATE_CONTENTS_FIELD", []);
		// 		option_code = $('#option_code').val();
		// 		option_name = $('#option_name').val();
		// 		option_fee = $('#option_fee').val();
		// 		// option_content = $('#option_content').val();

		// 		if(option_name == '') { warning('옵션명을 입력하세요','option_name'); return false; }
		// 		// if(option_fee == '') { warning('옵션요금','option_fee');	return false; }
		//     return true;
		//    }

		// 	function option_input_action(){
		// 		var sh = document.option;
		// 		sh.action = "option_write_action.php";
		// 		sh.submit();
		// 	}
		// 	// });
	</script>
</body>

</html>