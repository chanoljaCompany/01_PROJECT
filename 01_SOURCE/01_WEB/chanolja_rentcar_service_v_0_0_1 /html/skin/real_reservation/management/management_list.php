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
						<h2 class="title">회원관리</h2>
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
                                <option value="com_name">회사명(이름)</option>
                                <option value="handphone">연락처</option>
								</select>
								<input type="text" name="searchVal_1" id ="searchVal_1" class="input" size="30" placeholder="검색어입력">
								<span class="box_btn blue"><input type="button" id="member_search" value="검색"></span>
                                <? if($manager == 'M'){?>
                                <span class="box_btn blue"><button type="button" data-toggle='modal' data-backdrop='static' data-whatever="<?=$manager?>" data-target='#managementInputModal'>호스트등록</span>
                                <?}?>
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
                                    <th scope="col" width="3%">상태</th>
                                    <th scope="col" width="4%">아이디</th>
                                    <th scope="col" width="4%">휴대폰번호</th>
                                    <th scope="col" width="7%">이름(회사명)</th>
                                    <th scope="col" width="5%">가입일</th>
                                    <? if($manager == 'M'){?>
                                    <th scope="col" width="10%">주소</th>
                                    <?}?>
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
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
var top_menu_id = $('#top_menu_id').val();
var left_menu_id = $('#left_menu_id').val();
var manager = $('#manager').val();
// var inputmodal = null;
var changemodal = null;
var inputmodal = null;
var orderbyData = "";
$(document).ready(function() {
	$("input[name='searchVal_1']").keydown(function(e) {
			if (e.keyCode == 13) {
				member_search_act();
			}
	});
});
$("input[name='orderby']:radio").change(function () {
     orderbyData = this.value;
     member_search_act();

});
$(document).ready(function() {
		member_search_act();
		// inputmodal = $('#managementInputModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
		// 		var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
		// 			$.ajax({
		// 				url:"management_input_modal.php?manager="+manager,
		// 				cache:false,
		// 				success:function(result){
		// 				$("#managementInputModalBody").html(result);
		// 			}});
		// 	});

	changemodal =	$('#managementModifyModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
		var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
		var getData = button.data('whatever'); // Extract info from data-* attributes
        var getData = button.data('whatever').split('^');
        var seq = getData['0'];
        var userid = getData['1'];
					$.ajax({
						url:"management_mod_modal.php?manager="+manager+"&seq="+seq+"&userid="+userid,
						cache:false,
						success:function(result){
						$("#managementModifyModalBody").html(result);
					}});
			});

  inputmodal =	$('#managementInputModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
    var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
    var manager = button.data('whatever'); // Extract info from data-* attributes
      $.ajax({
        url:"management_input_modal.php?manager="+manager,
        cache:false,
        success:function(result){
        $("#managementInputModalBody").html(result);
      }});
    	});
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
		url:'./management_list_ajax.php',
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
	            url: "./management_list_paging_ajax.php",
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

      function management_input_proc(val) {
        var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    		var Digit = '1234567890'
    		var astr = Alpha + Digit
    		var approve = "Y";
	 		var management_status_str = "등록";
            var userid = $('#userid').val();
            if( userid == '' || userid == 'undefined') {
                 alert('아이디를 입력하셔야 합니다.');
                     return false;
            }
            var idcheck_ok = $('#idcheck_ok').val();
            if( idcheck_ok == 'N') {
                alert('아이디 중복체크를 해주세요.');
                return false;
            }

            var passwd = $('#passwd').val();
            var passwd_re = $('#passwd_re').val();
            if (Tcheck(passwd, Alpha + Digit, 5, 12,"비밀번호",'passwd')) {
                    return false;
            }

           if (passwd != passwd_re) {
               alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
               return false;
           }
 
            var handphone = $('#handphone').val();
            // alert(handphone);
            if( handphone == '' || handphone == 'undefined') {
                 alert('핸드폰번호를 입력하셔야 합니다.');
                 return false;
            }
            // if( handphone_ok == 'N') {
            //       alert('핸드폰번호 중복체크를 해주세요.');
            //       return false;
            // }

            var com_name = $('#com_name').val();
            if( com_name == '') {
                  alert('회사명을 입력하셔야 합니다.');
                  return false;
            }

            var zip_code = $('#zip_code').val();
            if( zip_code == '') {
                  alert('우편번호 찾기로 우편번호를 입력하셔야 합니다.');
                  return false;
            }
            var address = $('#address').val();
            if( address == '') {
                  alert('주소를 입력하셔야 합니다.');
                  return false;
            }
            var form = $('#regForm')[0];
            var formData = new FormData(form);
            for (var pair of formData.entries())
            {
            console.log(pair[0]+ ', ' + pair[1]);
            }
   		     var result = confirm("등록 하시겠습니까?");
    					if(result) { //확인 클릭 시
    						$.ajax({
    							type: 'POST',
    							url:"management_write_action.php",
    							data:formData,
                                cache:false,
                                contentType : false,
                                processData : false,
								 success:function(json){
    									 var obj = json.dataret;
     	                // var obj  = JSON.parse(data);
     	                var recode = obj[0].ret_code;
     	                var recode_msg = obj[0].ret_code_msg;
     	                 console.log('recode ' + recode + ' recode_msg ' + recode_msg);
     	                 alert(recode_msg);
     	                 if(recode == '100'){ //성공
    						inputmodal.modal("hide"); //닫기
    						member_search_act();
     	                 }else{
                          inputmodal.modal("hide"); //닫기
    					  member_search_act();
                          }
    							 }
    						 // }
    					 });
    					}
    				}

	function management_modify_proc(val) {
		var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
		var Digit = '1234567890'
		var astr = Alpha + Digit
        var passwd = $('#passwd').val();
        var passwd_re = $('#passwd_re').val();
        var handphone = $('#handphone').val();
        // alert('handphone ' + handphone);
        var withdraw = $('input:checkbox[id="withdraw"]').is(":checked") == true;
        var withdraw_date = $('#withdraw_date').val();
        var zip_code = $('#zip_code').val();
        var address = $('#address').val();

        if(passwd){
            if (Tcheck(passwd, Alpha + Digit, 5, 12,"비밀번호",'passwd')) {
                    return false;
            }
            if (passwd != passwd_re) {
                alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
                return false;
            }
        }
        

        if( handphone == '' || handphone == 'undefined') {
            alert('핸드폰번호를 입력하셔야 합니다.');
            return false;
        }

        if( com_name == '' || com_name == 'undefined') {
            alert('회사명을 입력하셔야 합니다.');
            return false;
        }
        
        if( zip_code == '') {
             alert('우편번호 찾기로 우편번호를 입력하셔야 합니다.');
             return false;
        }
        
        if( address == '') {
             alert('주소를 입력하셔야 합니다.');
              return false;
        }
        
        var form = $('#regFormMod')[0];
            var formData = new FormData(form);
            for (var pair of formData.entries())
            {
            console.log(pair[0]+ ', ' + pair[1]);
            }
            
        var result = confirm("수정 처리 하시겠습니까?");
	    	if(result) { //확인 클릭 시
						$.ajax({
							type: 'POST',
    							url:"management_write_action.php",
    							data:formData,
                                cache:false,
                                contentType : false,
                                processData : false,
								 success:function(json){
									 var obj = json.dataret;
                                // var obj  = JSON.parse(data);
                                var recode = obj[0].ret_code;
                                var recode_msg = obj[0].ret_code_msg;
                                console.log('recode ' + recode + ' recode_msg ' + recode_msg);
                                alert(recode_msg);
                                if(recode == '100'){ //성공
                                                    // if(val == 'input')  inputmodal.modal("hide"); //닫기
                                                    if(val == 'mod')  changemodal.modal("hide"); //닫기
                                                    member_search_act();
                                }else{
                                // if(val == 'input')  inputmodal.modal("hide"); //닫기
                                                    if(val == 'mod')  changemodal.modal("hide"); //닫기
                                                    // inputmodal.modal("hide"); //닫기
                                                    // member_search_act();
                                }
                                        }
                                    // }
                                });
                                }
				}

    function member_del(val1,val2){
        var division = 'member_delete';
        var result = confirm("삭제 하시겠습니까?\n삭제시 복구 불가능합니다.");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'GET',
            url:"management_write_action.php",
            dataType:"json",
            data: {
                   division : division,
                   val1 : val1,
                   val2 : val2
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


  function member_withdraw(val1,val2) {
    var division = 'withdraw';
    var result = confirm("오늘 날짜로 탈퇴처리 하시겠습니까?\n처리시 복구 불가능합니다.");
    if(result) { //확인 클릭 시
      $.ajax({
        type: 'POST',
        url:"management_write_action.php",
        dataType:"json",
        data: {
               division : division,
               val1 : val1,
               val2 : val2
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
               member_search_act();
           }
         }
     });
    }
  }

  function member_schedule(val1,val2){
      location.href="/sys_admin/management/counselors_status_manage.php?top_menu_id=1001&left_menu_id=001&counselors_code="+val1;
  }

  $('#excel_down').click(function() {
   var page_division = 'excel_down';
   var searchVal_1 = $('#searchVal_1').val();
   var searchKey_1 = $("#searchKey_1 option:selected").val();
   location.href = 'excel_down.php?&top_menu_id='+top_menu_id+'&left_menu_id=002&page_division='+page_division+'&searchKey_1='+searchKey_1+'&searchVal_1='+searchVal_1+'&manager='+manager;
});
</script>
<!-- Modal -->
<div class="modal fade" id="managementInputModal" tabindex="-1" role="dialog" aria-labelledby="managementInputModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="managementInputModalTitle">회원등록</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="managementInputModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="management_input_proc('input');">등록</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="managementModifyModal" tabindex="-1" role="dialog" aria-labelledby="managementModifyModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="managementModifyModalTitle">회원상세정보</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="managementModifyModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="management_modify_proc('mod');">수정</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div>
<!-- <div class="modal fade" id="managementModifyModal" tabindex="-1" role="dialog" aria-labelledby="managementModifyModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="managementModifyModalTitle">회원상세정보</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="managementModifyModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="management_modify_proc('mod');">수정</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div> -->
</body>
</html>
