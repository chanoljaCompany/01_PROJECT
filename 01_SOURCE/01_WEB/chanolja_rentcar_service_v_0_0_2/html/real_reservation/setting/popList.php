<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/top.php";
$page_authority = 'A';

if($session_userlevel != $page_authority){
  move_logout();
}
$dtype = isset($_REQUEST["dtype"]) ? $_REQUEST["dtype"] : 'earn';
$menu_str = "홈페이지 팝업";
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
					<div class="box_title first">
						<h2 class="title"><?=$menu_str?></h2>
					</div>
					<div class="clear"></div>
						<form name="point" method="post" enctype="multipart/form-data">
							<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
							<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
							<input type="hidden" name="dtype" id="dtype" value="<?=$dtype?>">
							<input type="hidden" name="checkseq_array[]" id="checkseq_array" value="">
							<input type="hidden" name="member_secession_array[]" id="member_secession_array" value="">
							<input type="hidden" name="member_pass_reset_array[]" id="member_pass_reset_array" value="">
              <input type='text' id='copyText' style='position:absolute; left:-9999px' value="">
              <br>
						<table class="tbl_col">
								<thead>
                  <tr>
                    <th scope="col" width="7%">번호</th>
                    <th scope="col" width="35%">제목</th>
                    <th scope="col" width="7%">시작일</th>
                    <th scope="col" width="7%">종료일</th>
                    <th scope="col">링크</th>
										<th scope="col" width="10%">-</th>
									</tr>
								</thead>
								<tbody id="data_area">
								</tbody>
							</table>
							<div class="box_bottom">
								<div class="paging" id="paging">
								</div>
		        	</div>
							<div class="box_bottom">
								<span class="box_btn blue">
                  <button type="button" onclick="pop_regist('');">팝업등록</span>
							</div>
					</form>
				</article>
			</section>
		<?php
		include $admin_root."/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
var top_menu_id = $('#top_menu_id').val();
var left_menu_id = $('#left_menu_id').val();
var dtype = "";
var changemodal = null;

$(document).ready(function() {
		pop_search_act();
	});
function pop_regist(val){
  location.href="popView.php?top_menu_id="+top_menu_id+"&left_menu_id="+left_menu_id+"&seq="+val;
}

function pop_search_act(){
	var page_division = "homePop";
	var curpage = "1";
	var searchKey_1 = $("#searchKey_1 option:selected").val();
	var searchVal_1 = $('#searchVal_1').val();
	var searchKey_2 = $("#searchKey_2 option:selected").val();
	var searchVal_2 = $('#searchVal_2').val();
	showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,dtype);
}
function showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,dtype) {
	$.ajax({
		type: 'GET',
		url:'./popList_ajax.php',
		data: {
					 page_division : page_division,
					 searchKey_1 : searchKey_1,
					 searchVal_1 : searchVal_1,
					 searchKey_2 : searchKey_2,
					 searchVal_2 : searchVal_2,
					 curpage : curpage,
					 dtype : dtype
				 },
		error: function (request, status, error) {
		console.log('sindySelect error');
		},
		success:function(html){
				$("#data_area").html(html);
	 }});
	 showPaing(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,dtype);
}

function showPaing(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,curpage,dtype) {
	        $.ajax({
	            type: "GET",
	            url: "./popList_paging_ajax.php",
							data: {
										 page_division : page_division,
										 searchKey_1 : searchKey_1,
										 searchVal_1 : searchVal_1,
										 searchKey_2 : searchKey_2,
										 searchVal_2 : searchVal_2,
										 curpage : curpage,
										 dtype : dtype
									 },
	            success: function (html) {
	                $("#paging").html(html);
	            },
	            complete: function () {

	            }
	        });
	    }

function pop_del(val1,val2){
        var division = 'popdelete';
        var result = confirm("삭제 하시겠습니까?\n삭제시 복구 불가능합니다.");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'GET',
            url:"pop_write_action.php",
            dataType:"json",
            data: {
              division : division,
              seq : val1,
              image : val2
                },
            cache:false,
               success:function(json){
                 var obj = json.dataret;
                var recode = obj[0].ret_code;
                var recode_msg = obj[0].ret_code_msg;
                 alert(recode_msg);
                 if(recode == '100'){ //성공
                   pop_search_act();
                 }else{
               }
             }
         });
        }
    }
</script>
</body>
</html>
