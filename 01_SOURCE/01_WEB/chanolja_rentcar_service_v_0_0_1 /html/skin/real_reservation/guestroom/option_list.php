<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$option_type = isset($_REQUEST['option_type']) ? $_REQUEST['option_type'] : 'b';
$left_menu_id = isset($_REQUEST['left_menu_id']) ? $_REQUEST['left_menu_id'] : 'b';
// if($opttype == 'b'){ //기본옵션

// }
// else if($opttype == 'p'){ //유료옵션

// }
if ($_SESSION['session_user_level'] != 'A') {
	$subqry = "AND user_id = '" . $_SESSION['session_user_id'] . "'";
} else {
	$subqry = "AND user_id LIKE '%%'";
}
$sql = "SELECT * FROM $OPTION_INFO_TB 
        WHERE 1=1 
        AND option_type = '$option_type' 
        $subqry
        AND option_del_whether = 'N' 
        ORDER BY seq DESC";
$result = sql_query($sql);
$TotalNum = sql_num_rows($result);
$LineNumber = 20;
$LinkNumber = 20;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';
if (!$TotalNum) {
	$first = 1;
	$last = 0;
} else {
	$first = $LineNumber * ($page - 1);
	$num_a = $TotalNum - $LineNumber * ($page - 1);
	$last = $LineNumber * $page;
	$NomLine = $TotalNum - $last;
	if ($NomLine > 0) {
		$last -= 1;
	} else {
		$last = $TotalNum - 1;
	}
}
$TotalPage = ceil($TotalNum / $LineNumber);
$param  = "collapse=in";

?>

<body id="manage">
	<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
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
					<form name="option" method="post" enctype="multipart/form-data">
						<div class="box_title first">
							<h2 class="title">옵션 정보</h2>
						</div>
						<table class="tbl_col">
							<caption class="hidden">옵션 리스트</caption>
							<thead>
								<tr>
									<th scope="col" width="5%">NO</th>
									<th scope="col" width="15%">옵션</th>
									<? if ($option_type == 'p' && $_SESSION['session_user_level'] == 'A') { ?>
										<th scope="col" width="15%">등록아이디</th>
									<? } ?>
									<? if ($option_type == 'b') { ?>
										<th scope="col" width="15%">옵션아이콘</th>
									<? } else { ?>
										<th scope="col" width="15%">요금</th>
										<th scope="col" width="15%">옵션구분</th>
									<? } ?>
									<th scope="col" width="10%">수정</th>
									<th scope="col" width="10%">삭제</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$serialnumber = $TotalNum - $LineNumber * ($page - 1);
								for ($j = $first; $j <= $last; $j++) {
									mysqli_data_seek($result, $j);
									$rows = mysqli_fetch_array($result);
									$option_divi_str = "1회성";
									if ($rows['option_divi'] == '2') {
										$option_divi_str = "일수";
									}
								?>
									<tr>
										<td><?= $num_a ?></td>
										<td><?= $rows['option_name'] ?></td>
										<? if ($option_type == 'p' && $_SESSION['session_user_level'] == 'A') { ?>
											<td><?= $rows['user_id'] ?></td>
										<? } ?>
										<? if ($option_type == 'b') { ?>
											<td><?= $rows['option_icon'] ?></td>
										<? } else { ?>
											<td><?= number_format($rows['option_fee']) ?></td>
											<td><?= $option_divi_str ?></td>
										<? } ?>
										<td><span class="box_btn_s blue"><input type="button" value="수정하기" onclick="go_page('modify','<?= $rows['option_code'] ?>','<?= $rows['option_type'] ?>')"></span></td>
										<td><span class="box_btn_s gray"><input type="button" value="삭제하기" onclick="go_page('delete','<?= $rows['option_code'] ?>','<?= $rows['option_type'] ?>')"></span></td>
									</tr>
								<?php
									$serialnumber--;
									$num_a--;
								}
								?>
							</tbody>
						</table>
						<div class="box_bottom">
							<div class="paging">
								<span class="now">1</span>
							</div>
							<div class="right_area">
								<span class="box_btn gray"><input type="button" value="등록하기" onclick="go_page('input','0','<?= $option_type ?>')"></span>
								<!-- <span class="box_btn gray"><input type="button" value="선택 삭제" onclick="tabSH(9)"></span> -->
							</div>
						</div>
					</form>
				</article>
			</section>
			<?php
			include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
			?>
			<div id="btn_scroll">
				<a id="scroll_top"><img src="<?= $file_url ?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
				<a id="scroll_bottom"><img src="<?= $file_url ?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script type="text/javascript">
		function go_page(division, option_code, option_type) { //삭제
			var use_del_yes = "0";
			if (division == 'delete') {
				var result = confirm("삭제하시겠습니까?");
				if (result) { //확인 클릭 시
					$.ajax({
						url: "option_write_action.php",
						data: {
							division: division,
							option_code: option_code,
							use_del_yes: use_del_yes
						},
						cache: false,
						success: function(json) {
							var obj = json.dataret;
							var recode = obj[0].ret_code;
							var recode_msg = obj[0].ret_code_msg;
							console.log('recode ' + recode + ' recode_msg ' + recode_msg);
							alert(recode_msg);
							if (recode == '100') { //성공 
								location.reload();
								// }else if(result == 'option_reserve_exist'){
								// 				var use_del_yes = "1";
								// 				var result = confirm('예약관련정보가 있는 객실입니다.\n\n그래도 삭제하시겠습니까?');
								// 						 if(result ){ //확인 클릭 시
								// 							 $.ajax({
								// 								url:"option_write_action.php",
								// 								data: {
								// 											division : division,
								// 											option_code : option_code,
								// 											use_del_yes : use_del_yes
								// 										},
								// 								cache:false,
								// 									 success:function(result){
								// 										 if(result == 'ok'){
								// 												alert('처리하였습니다.');
								// 												location.reload();
								// 											}else{
								// 												 alert('처리에러.');
								// 											}
								// 									 }
								// 								});
								// 						 }
							} else {
								alert('처리에러.');
							}
						}
					});
				}
			} else { //등록
				location.href = "./option_write_form.php?top_menu_id=2001&left_menu_id=<?= $left_menu_id ?>&division=" + division + "&option_code=" + option_code + "&option_type=" + option_type;
			}
		}
	</script>
</body>

</html>