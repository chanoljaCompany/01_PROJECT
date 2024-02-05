<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
$NBOARD_TB = "travel_reviews";
$division = "common";
$page = $_REQUEST["curpage"];
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
						<!-- <form name="guestroom" method="post" enctype="multipart/form-data"> -->
						<input type="hidden" name="division" id="division" value="<?=$division?>">
						<input type="hidden" name="curpage" id="curpage" value="<?=$page?>">
						<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
						<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
						<div class="box_title first">
							<h2 class="title">여행후기</h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">여행후기</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="10%">등록일</th>
										<th scope="col">제목</th>
										<th scope="col" width="7%">작성자</th>
										<th scope="col" width="7%">사용여부</th>
										<th scope="col" width="5%">수정</th>
										<th scope="col" width="5%">삭제</th>
									</tr>
								</thead>
								<tbody id="board_search_list_data">
								</tbody>
							</table>
							<div class="box_bottom">
								<div class="paging" id="paging">
								</div>
		        	</div>
							<div class="box_bottom">
								<span class="box_btn blue"><input type="button" id="nboard_write_form" value="등록"></span>
							</div>
					<!-- </form> -->
				</article>
			</section>


		<?php
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

	$(document).ready(function() {

		board_search_act();
		 // checkbox_event();
	});

function checkbox_event(wr_id,checkVal){
	var division = $('#division').val();
	var curpage = $('#curpage').val();
	if(!curpage) curpage = "1";
	// alert('wr_id ' + wr_id + ' checkVal ' + checkVal + ' division ' + division+ ' curpage ' + curpage + ' top_menu_id ' + top_menu_id+ ' left_menu_id ' + left_menu_id);
		$.ajax({
				type: "GET",
				url: "./nboard_post_show_mod_action.php",
				// data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage=" + curpage,
				data: {
							 division : division,
							 wr_id : wr_id,
							 checkVal : checkVal,
							 curpage : curpage,
							 top_menu_id : top_menu_id,
							 left_menu_id : left_menu_id
						 },
				success: function (html) {
						// $("#paging").html(html);
						board_search_act();
				},
				complete: function () {
				}
		});
}
// $(function(){
// 	var subject = $('input[type=checkbox]');
// 	alert('subject ' + subject);
// 	 $(subject).each(function(index, item){
// 			 $(item).click(function(){
// 			 console.log($(item).is(':checked'));
// 			 console.log($(item).val());
// 			 });
// 	 });
// });
	$('#nboard_write_form').click(function(){
		location.href="./nboard_write_form.php?top_menu_id="+top_menu_id+"&left_menu_id="+left_menu_id;
	});

function board_search_act() {
	var division = $('#division').val();
	var curpage = $('#curpage').val();
	if(!curpage) curpage = "1";
	var searchKey_1 = "";
	var searchKey_2 = "";
	var searchVal_1 = "";
	var searchVal_2 = "";
	var searchKey_3 = "";
	var searchVal_3 = "";
	var searchVal_4_array = "";
	var searchVal_5   = "";
	var searchVal_6_array = "";
		// alert(' searchVal_1 ' + searchVal_1 + ' searchVal_2 ' + searchVal_2 + ' searchVal_3 ' + searchVal_3 + ' searchVal_4 ' + searchVal_4_array + ' searchVal_5 ' + searchVal_5 + ' searchVal_6 ' + searchVal_6_array);
		showTable(division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage,top_menu_id,left_menu_id);
}

function showTable(division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage,top_menu_id,left_menu_id) {
	$.ajax({
		type: 'GET',
		url:'./nboard_search_list_ajax.php',
		// data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage="+curpage,
		data: {
					 division : division,
					 searchKey_1 : searchKey_1,
					 searchVal_1 : searchVal_1,
					 searchKey_2 : searchKey_2,
					 searchVal_2 : searchVal_2,
					 searchKey_3 : searchKey_3,
					 searchVal_3 : searchVal_3,
					 searchVal_4 : searchVal_4_array,
					 searchVal_5 : searchVal_5,
					 searchVal_6 : searchVal_6_array,
					 curpage : curpage,
					 top_menu_id : top_menu_id,
					 left_menu_id : left_menu_id
				 },
		error: function (request, status, error) {
		console.log('sindySelect error');
		},
		success:function(html){
				$("#board_search_list_data").html(html);
	 }});
	 showPaing(division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage,top_menu_id,left_menu_id);
}

function showPaing(division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage,top_menu_id,left_menu_id) {
				$.ajax({
						type: "GET",
						url: "./nboard_search_list_paging_ajax.php",
						// data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage=" + curpage,
						data: {
									 division : division,
									 searchKey_1 : searchKey_1,
									 searchVal_1 : searchVal_1,
									 searchKey_2 : searchKey_2,
									 searchVal_2 : searchVal_2,
									 searchKey_3 : searchKey_3,
									 searchVal_3 : searchVal_3,
									 searchVal_4 : searchVal_4_array,
									 searchVal_5 : searchVal_5,
									 searchVal_6 : searchVal_6_array,
									 curpage : curpage,
									 top_menu_id : top_menu_id,
									 left_menu_id : left_menu_id
								 },
						success: function (html) {
								$("#paging").html(html);
						},
						complete: function () {

						}
				});
		}

		function board_delete(original_table,seq,original_seq,top_menu_id,left_menu_id){
			alert(' original_table ' + original_table  + ' seq ' + seq  + ' original_seq ' + original_seq);
			var result = confirm("삭제하시겠습니까?\n삭제시 복구가 불가능합니다.");
						 if(result) { //확인 클릭 시
							  var division = $('#division').val();
							 $.ajax({
								 type: 'GET',
								 url:'./nboard_delete_action.php',
								 data: {
												division : division,
												original_table : original_table,
												seq : seq,
												original_seq : original_seq,
												top_menu_id : top_menu_id,
												left_menu_id : left_menu_id
											},
								 error: function (request, status, error) {
								 console.log('image_del error');
								 },
								 success:function(html){
									 //	$("#reserve_search_list_data").html(html);
									 location.reload();
								}});
					}
			// window.open('http://testshop.chungdodaily.com/bbs/board.php?bo_table=popularity_pay&wr_id=397&page=27');
		}

</script>
</body>
</html>
