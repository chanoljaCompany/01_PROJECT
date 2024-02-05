<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$area_type = isset($_REQUEST['area_type']) ? $_REQUEST['area_type'] : 'b';
// if($opttype == 'b'){ //기본지역

// }
// else if($opttype == 'p'){ //유료지역

// }
$sql = "SELECT * FROM $AREA_INFO_TB WHERE 1=1 AND user_id = '".$_SESSION['session_user_id']."' AND area_del_whether = 'N' ORDER BY seq DESC";
$result = sql_query($sql);
$TotalNum = sql_num_rows($result);
$LineNumber = 20;
$LinkNumber = 20;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';
if(!$TotalNum) {
	$first = 1;
	$last = 0;
}else {
	$first = $LineNumber*($page-1);
	$num_a = $TotalNum - $LineNumber*($page-1);
	$last = $LineNumber*$page;
	$NomLine = $TotalNum - $last;
	if($NomLine > 0) {
		$last -= 1;
	}else {
		$last = $TotalNum - 1;
	}
}
$TotalPage = ceil($TotalNum/$LineNumber);
$param  = "collapse=in";

?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<form name="area" method="post" enctype="multipart/form-data">
						<div class="box_title first">
							<h2 class="title">지역 정보</h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">지역 리스트</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="15%">지역</th>
										<th scope="col" width="5%">수정</th>
										<th scope="col" width="5%">삭제</th>
									</tr>
								</thead>
								<tbody>
								 <?php
								 $serialnumber = $TotalNum - $LineNumber*($page-1);
								 for ( $j = $first ; $j <= $last ; $j ++ ) {
								 mysqli_data_seek($result,$j);
								 $rows = mysqli_fetch_array($result);
								?>
										<tr>
										<td><?=$num_a?></td>
										<td><?=$rows['area_name']?></td>
										<td><span class="box_btn_s blue"><input type="button" value="수정하기" onclick="go_page('modify','<?=$rows['area_code']?>','<?=$rows['area_type']?>')"></span></td>
										<td><span class="box_btn_s gray"><input type="button" value="삭제하기" onclick="go_page('delete','<?=$rows['area_code']?>','<?=$rows['area_type']?>')"></span></td>
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
							<span class="box_btn gray"><input type="button" value="등록하기" onclick="go_page('input','0','<?=$area_type?>')"></span>
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
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script type="text/javascript">
	function go_page(division,area_code,area_type){//삭제
		var use_del_yes = "0";
		if(division == 'delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"area_write_action.php",
							 data: {
					 					 division : division,
					 					 area_code : area_code,
					 					 use_del_yes : use_del_yes
					 				 },
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											  location.reload();
					            }else if(result == 'area_reserve_exist'){
												var use_del_yes = "1";
												var result = confirm('예약관련정보가 있는 객실입니다.\n\n그래도 삭제하시겠습니까?');
														 if(result ){ //확인 클릭 시
															 $.ajax({
																url:"area_write_action.php",
																data: {
																			division : division,
																			area_code : area_code,
																			use_del_yes : use_del_yes
																		},
																cache:false,
																	 success:function(result){
																		 if(result == 'ok'){
																				alert('처리하였습니다.');
																				location.reload();
																			}else{
																				 alert('처리에러.');
																			}
																	 }
																});
														 }
					            }else{
					              alert('처리에러.');
					            }
					    }});
					 }
		}else{ //등록
			location.href="./area_write_form.php?top_menu_id=2001&left_menu_id=010&division="+division+"&area_code="+area_code+"&area_type="+area_type;
		}
	}
</script>
</body>
</html>
