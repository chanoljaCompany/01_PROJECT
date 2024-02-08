<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$page_authority = 'A';
if($_SESSION['session_user_level'] != $page_authority){
  move_logout();
}
$manager = isset($_REQUEST["manager"]) ? $_REQUEST["manager"] : 'T';
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
					<div class="box_title first">
						<h2 class="title">예약기본정보관리</h2>
					</div>
					<!-- <div class="box_tab">
					<ul>
						<li><a href="?top_menu_id=<?=$top_menu_id?>&left_menu_id=<?=$left_menu_id?>&content_menu_id=<?=$id?>" <?=$content_menu_id_sel?>>전체</a></li>
					</ul>
					</div> -->
					<table class="tbl_row multi_shop">
						<colgroup>
							<col style="width:15%">
							<col style="width:85%">
						</colgroup>
						<tr>
							<th scope="row">검색조건</th>
							<td>
								<select id="searchKey_1" name="searchKey_1">
								<option value="user_id" selected>아이디</option>
                                <option value="com_name">회사명</option>
                                <option value="handphone">핸드폰번호</option>
								</select>
								<input type="text" name="searchVal_1" id ="searchVal_1" class="input" size="30" placeholder="검색어입력">
								<span class="box_btn blue"><input type="button" id="member_search" value="검색"></span>
                			</td>
						</tr>
					</table>
					<div class="clear"></div>
						<form name="member" id="member" method="post" enctype="multipart/form-data">
							<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
							<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
							<input type="hidden" name="manager" id="manager" value="<?=$manager?>">
							<input type="hidden" name="checkseq_array[]" id="checkseq_array" value="">
							<input type="hidden" name="member_secession_array[]" id="member_secession_array" value="">
							<input type="hidden" name="member_pass_reset_array[]" id="member_pass_reset_array" value="">
              <input type='text' id='copyText' style='position:absolute; left:-9999px' value="">
              <br>
						<table class="tbl_col">
								<thead>
									<tr>
                    <th scope="col" width="3%">번호</th>
                    <th scope="col" width="10%">아이디</th>
                    <th scope="col" width="10%">성수기설정</th>
                    <th scope="col" width="10%">성수기날짜</th>
                    <th scope="col" width="10%">주말설정</th>
                    <th scope="col" width="10%">주말세부설정</th>
                    <th scope="col" width="10%">공휴일설정</th>
					<th scope="col" width="10%">-</th>
									</tr>
								</thead>
								<tbody id="member_list_data">
								</tbody>
							</table>
							<div class="box_bottom">
								<div class="paging" id="paging">
								</div>
		        	</div>
							<!-- <div class="box_bottom">
								<span class="box_btn blue"><button type="button" data-toggle='modal' data-backdrop='static' data-target='#managementInputModal'>담당등록</span>
							</div> -->
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
<!-- <script src="https://dmaps.daum.net/map_js_init/postcode.v2.js"></script> -->
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
var top_menu_id = $('#top_menu_id').val();
var left_menu_id = $('#left_menu_id').val();
var manager = $('#manager').val();
var orderbyData = "";
$(document).ready(function() {
	$("input[name='searchVal_1']").keydown(function(e) {
			if (e.keyCode == 13) {
				member_search_act();
			}
	});
});

$(document).ready(function() {
		member_search_act();
});

$('#member_search').click(function(){
		member_search_act();
});

function member_search_act(){
	var page_division = "member";
	var curpage = "1";
	var searchKey_1 = $("#searchKey_1 option:selected").val();
	var searchVal_1 = $('#searchVal_1').val();
	var searchKey_2 = $("#searchKey_2 option:selected").val();
	var searchVal_2 = orderbyData;
	showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,manager);
}
function showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,manager) {
	$.ajax({
		type: 'GET',
		url:'./management_reserve_list_ajax.php',
		data: {
					 page_division : page_division,
					 searchKey_1 : searchKey_1,
					 searchVal_1 : searchVal_1,
					 searchKey_2 : searchKey_2,
					 searchVal_2 : searchVal_2,
					 curpage : curpage,
					 manager : manager
				 },
		error: function (request, status, error) {
		console.log('sindySelect error');
		},
		success:function(html){
				$("#member_list_data").html(html);
	 }});
	 showPaing(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,manager);
}

function showPaing(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,manager) {
	        $.ajax({
	            type: "GET",
	            url: "./management_reserve_list_ajax_paging.php",
	            // data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage=" + curpage,
							data: {
										 page_division : page_division,
										 searchKey_1 : searchKey_1,
										 searchVal_1 : searchVal_1,
										 searchKey_2 : searchKey_2,
										 searchVal_2 : searchVal_2,
										 curpage : curpage,
										 manager : manager
									 },
	            success: function (html) {
	                $("#paging").html(html);
	            },
	            complete: function () {

	            }
	        });
	    }

function management_reserve_change(val1,val2,val3){
        var division = val1;
        if(val1 == 'management_reserve_delete') {
            var result = confirm("삭제 하시겠습니까?\n삭제시 복구 불가능합니다.");
            if(result) { //확인 클릭 시
            $.ajax({
                type: 'GET',
                url:"management_write_action.php",
                dataType:"json",
                data: {
                    division : division,
                    val1 : val1,
                    val2 : val2,
                    val3 : val3
                    },
                cache:false,
                success:function(json){
                    var obj = json.dataret;
                    var recode = obj[0].ret_code;
                    var recode_msg = obj[0].ret_code_msg;
                    alert(recode_msg);
                    if(recode == '100'){ //성공
                    member_search_act();
                    }else{
                
                    }
                }
            });
          }
        }
        else{
          location.href="management_reserve.php?top_menu_id=1001&left_menu_id=002&seq="+val2+"&userid="+val3;
        }
    }
</script>
</body>
</html>
