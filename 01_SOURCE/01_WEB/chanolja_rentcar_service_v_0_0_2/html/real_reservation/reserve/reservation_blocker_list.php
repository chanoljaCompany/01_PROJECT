<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$sql = "SELECT *	FROM $GUESTROOM_BLOCKER_TB
        WHERE 1=1
        AND user_id = '".$_SESSION['session_user_id']."'
        ORDER BY seq DESC";

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
						<form name="option" method="post" enctype="multipart/form-data">
						<div class="box_title first">
							<h2 class="title">방막기 정보</h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">방막기 리스트</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="15%">상품명</th>
										<th scope="col" width="15%">코드</th>
										<th scope="col" width="55%">시작/종료일</th>
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
										<td><?=$rows['guestroom_name']?></td>
										<td><?=$rows['guestroom_reserve_code']?></td>
										<td><?=$rows['guestroom_reserve_date']?></td>
										<td><span class="box_btn_s gray"><input type="button" value="삭제하기" onclick="go_page('delete','<?=$rows['guestroom_reserve_code']?>')"></span></td>
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
							<span class="box_btn gray"><input type="button" value="등록하기" onclick="go_page('input','0')"></span>
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
<script type="text/javascript">
	function go_page(page_division,guestroom_reserve_code){//삭제
		if(page_division == 'delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"./reservation_blocker_list_ajax.php",
							 data: {
					 					 page_division : page_division,
					 					 guestroom_reserve_code : guestroom_reserve_code,
					 				 },
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											  location.reload();
					            }
                      else{
					              alert('처리에러.');
					            }
					    }});
					 }
		}else if(page_division == 'modify'){ //수정
			location.href="./reservation_form.php?top_menu_id=4001&left_menu_id=011&guestroom_reserve_code="+guestroom_reserve_code;
		}else{ //등록
			location.href="./reservation_form.php?top_menu_id=4001&left_menu_id=011";
		}
	}
</script>
</body>
</html>
