<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";

$resevedate = "";
// $sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE user_id = '".$_SESSION['session_user_id']."'";
// echo "
// $sql
// ";
// $result = sql_query($sql);
// $TotalNum = sql_num_rows($result);
// $LineNumber = 20;
// $LinkNumber = 20;
// $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';
// if(!$TotalNum) {
// 	$first = 1;
// 	$last = 0;
// }else {
// 	$first = $LineNumber*($page-1);
// 	$num_a = $TotalNum - $LineNumber*($page-1);
// 	$last = $LineNumber*$page;
// 	$NomLine = $TotalNum - $last;
// 	if($NomLine > 0) {
// 		$last -= 1;
// 	}else {
// 		$last = $TotalNum - 1;
// 	}
// }
// $TotalPage = ceil($TotalNum/$LineNumber);
// $param  = "collapse=in";
// $time = time();
if(!$resevedate){
				 // $startday = date("Y/m/d",strtotime("-10 day", $time));;
				 // $startday = date("Y/m/d", strtotime("-10 day", $startday));
				 $startday = date("Y/m")."/01";
         $endday = date("Y/m/d");
				 $endday_2 = date('t', strtotime($endday));
				 $endday = date("Y/m")."/".$endday_2;

  }else{ //예약일자를 클릭하고 들어왔을때
				// $startday = date("Y/m/d", strtotime($resevedate));
				$startday = date("Y/m/d", strtotime("-10 day", $resevedate));
        $endday = date("Y/m/d", strtotime($resevedate));
  }

?>

	<!-- <link rel="stylesheet" type="text/css" href="https://rev.yapen.co.kr/css/external/default.css?date=20201228155830" />
  <link rel="stylesheet" type="text/css" href="//rev.yapen.co.kr/css/external/set.css?20201228155830" />
			<link rel="stylesheet" type="text/css" href="//rev.yapen.co.kr/css/external/index.css?20201228155830" /> -->
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
						<h2 class="title">예약현황</h2>
					</div>
					<!-- <input type="hidden" name="curpage" id="curpage" value="1"> -->
					<form name="reserveSearch" id="reserveSearch" method="post" enctype="multipart/form-data">
						<input type="hidden" name="page_division" id="page_division" value="reserve">
						<input type="hidden" name="curpage" id="curpage" value="">

					<table class="tbl_row multi_shop">
						<caption class="hidden">예약현황</caption>
						<colgroup>
							<col style="width:15%">
							<col style="width:85%">
						</colgroup>
						<tr>
							<th scope="row">예약번호/상품명</th>
							<td>
								<select id="searchKey_1" name="searchKey_1">
												<option value="guestroom_reserve_code" selected>예약번호</option>
												<option value="guestroom_name">상품명</option>
								</select>
								<input type="text" name="searchVal_1" id ="searchVal_1" class="input" size="30" placeholder="예약번호 또는 상품명">
							</td>
						</tr>
						<!-- <tr>
							<th scope="row">기간</th>
							<td>
								<select id="searchKey_2" name="searchKey_2">
												<option value="guestroom_reserve_date_start" selected>예약일자</option>
												<option value="guestroom_reserve_payment_date">결제일자</option>
								</select>
								<i class="fa fa-calendar"></i>
 								<input class="input"  type="text"  name= "searchVal_2" id= "searchVal_2" size="30" value="<?=$startday?> - <?=$endday?>" readonly>
							</td>
						</tr> -->
						<tr>
							<th scope="row">예약자 정보</th>
							<td>
								<select id="searchKey_3" name="searchKey_3">
												<option value="guestroom_reserve_user_name" selected>성명</option>
												<option value="guestroom_reserve_user_phone">연락처</option>
												<!-- <option value="guestroom_reserve_user_email">이메일</option> -->
								</select>
								<input type="text" name="searchVal_3" id ="searchVal_3" class="input" size="30" placeholder="성명,연락처">
							</td>
						</tr>
						<!-- <tr>
							<th scope="row">결제수단</th>
							<td>
								<label class="p_cursor"><input type="checkbox"  class="searchVal_4" value="R"> 실시간 계좌이체</label>
								<label class="p_cursor"><input type="checkbox"  class="searchVal_4" value="B"> 무통장입금</label>
								<label class="p_cursor"><input type="checkbox"  class="searchVal_4" value="C"> 카드</label>
								<label class="p_cursor"><input type="checkbox"  class="searchVal_4" value="H"> 휴대폰</label>
							</td>
						</tr> -->
						<tr>
							<th scope="row">예약상태</th>
							<td>
								<label class="p_cursor"><input type="checkbox" name="searchVal_6[]" class="searchVal_6" value="2" checked> 예약신청</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_6[]"  class="searchVal_6" value="3" checked> 예약완료</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_6[]"  class="searchVal_6" value="4" checked> 취소요청</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_6[]"  class="searchVal_6" value="5" checked> 취소완료</label>
							</td>
						</tr>
						<tr>
							<th scope="row">결제상태</th>
							<td>
								<label class="p_cursor"><input type="checkbox" name="searchVal_5[]"  class="searchVal_5" value="1" checked>결제대기</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_5[]"  class="searchVal_5" value="2" checked>결제완료</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_5[]"  class="searchVal_5" value="3" checked>결제취소</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_5[]"  class="searchVal_5" value="4" checked>환불요청</label>
								<label class="p_cursor"><input type="checkbox" name="searchVal_5[]"  class="searchVal_5" value="5" checked>환불완료</label>
							</td>
						</tr>

					</table>
				</form>
					<div class="box_bottom">
						<!-- <div class="paging">
							<span class="now"></span>
						</div>
				<div class="right_area"> -->
					<!-- <span class="box_btn gray"> -->
						<span class="box_btn blue"><input type="button" id="reserve_search" value="검색"></span>
					<!-- <span class="box_btn gray"><input type="button" value="선택 삭제" onclick="tabSH(9)"></span> -->
				</div>
					<div class="clear"></div>
						<div class="box_title first">
							<h2 class="title">검색결과</h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">회원 조회 리스트</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="10%">상태</th>
                                        <th scope="col" width="10%">업체명</th>
										<th scope="col" width="7%">접수일자</th>
										<th scope="col" width="7%">예약일자</th>
										<th scope="col" width="7%">결제일자</th>
										<th scope="col" width="10%">상품명</th>
										<th scope="col" width="7%">예약자</th>
										<th scope="col" width="7%">연락처</th>
										<th scope="col" width="10%">결제수단</th>
										<th scope="col" width="7%">총결제금액</th>
										<th scope="col" width="5%">수정</th>
										<th scope="col" width="5%">삭제</th>
									</tr>
								</thead>
								<tbody id="reserve_search_list_data">
								</tbody>
							</table>
							<div class="box_bottom">
								<div class="paging" id="paging">
								</div>
		        	</div>
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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('#reserve_search').click(function(){
		reserve_search_act();
	});

function reserve_search_act(){
	var page_division = "reserve";
	var curpage = "1";
	var searchKey_1 = $("#searchKey_1 option:selected").val();
	var searchKey_2 = $("#searchKey_2 option:selected").val();
	var searchKey_3 = $("#searchKey_3 option:selected").val();

	var searchVal_1 = $('#searchVal_1').val();
	var searchVal_2 = "";
	var searchVal_3 = $('#searchVal_3').val();
	var searchVal_4 = "";
	var searchVal_5 = "";
	var searchVal_6 = "";

	// var searchVal_4_cnt = 0;
	// var searchVal_4_chkbox = $(".searchVal_4");
	// var searchVal_4_array = Array();
	// for(i = 0; i < searchVal_4_chkbox.length ; i++) {
	// 		if (searchVal_4_chkbox[i].checked == true){
	// 			searchVal_4_array[searchVal_4_cnt] = searchVal_4_chkbox[i].value;
	// 			searchVal_4_cnt++;
	// 		}else{
	// 			searchVal_4_array[searchVal_4_cnt] = '0';
	// 			searchVal_4_cnt++;
	// 		}
	// 	}
	// 	var searchVal_5   = $('input:radio[name="searchVal_5"]:checked').val();
	// 	var searchVal_6_cnt = 0;
	// 	var searchVal_6_chkbox = $(".searchVal_6");
	// 	var searchVal_6_array = Array();
	// 	for(i = 0; i < searchVal_6_chkbox.length ; i++) {
	// 			if (searchVal_6_chkbox[i].checked == true){
	// 				searchVal_6_array[searchVal_6_cnt] = searchVal_6_chkbox[i].value;
	// 				searchVal_6_cnt++;
	// 			}else{
	// 				searchVal_6_array[searchVal_6_cnt] = '0';
	// 				searchVal_6_cnt++;
	// 			}
	// 		}
	//	showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage);
	showTable(curpage);

}
//function showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage) {
function showTable(curpage) {
	// alert(curpage);
  $("#curpage").val(curpage);
	var form = $('#reserveSearch')[0];
    var formData = new FormData(form);
    for (var pair of formData.entries())
    {
      console.log(pair[0]+ ', ' + pair[1]);
    }
	$.ajax({
		type: 'POST',
		url:'./reserve_search_list_ajax.php',
		enctype: 'multipart/form-data',
		data:formData,
		cache:false,
		contentType : false,
		processData : false,
		// data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage="+curpage,
		// data: {
		// 			 page_division : page_division,
		// 			 searchKey_1 : searchKey_1,
		// 			 searchVal_1 : searchVal_1,
		// 			 searchKey_2 : searchKey_2,
		// 			 searchVal_2 : searchVal_2,
		// 			 searchKey_3 : searchKey_3,
		// 			 searchVal_3 : searchVal_3,
		// 			 searchVal_4 : searchVal_4_array,
		// 			 searchVal_5 : searchVal_5,
		// 			 searchVal_6 : searchVal_6_array,
		// 			 curpage : curpage
		// 		 },
		error: function (request, status, error) {
		console.log('reserveSearch error');
		},
		success:function(html){
				$("#reserve_search_list_data").html(html);
	 }});
	 showPaing(curpage);
}

	function showPaing(curpage) {
					var form = $('#reserveSearch')[0];
			    var formData = new FormData(form);
			    for (var pair of formData.entries())
			    {
			      console.log(pair[0]+ ', ' + pair[1]);
			    }
	        $.ajax({
	            type: "POST",
	            url: "./reserve_search_list_paging_ajax.php",
	            // data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage=" + curpage,
							enctype: 'multipart/form-data',
							data:formData,
							cache:false,
							contentType : false,
							processData : false,
	            success: function (html) {
	                $("#paging").html(html);
	            },
	            complete: function () {

	            }
	        });
	    }

	$(function() {
    $('#searchVal_2').daterangepicker({
        locale: {
            format: 'YYYY/MM/DD',
            applyLabel: '확인 <i class="fa fa-check"></i>',
            cancelLabel: '취소 <i class="fa fa-times"></i>',
            daysOfWeek: ['일','월','화','수','목','금','토'],
            monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
        },
        applyClass: 'btn-e btn-e-yellow color-white',
        cancelClass: 'btn-e btn-e-dark color-white',
    });
	});

	function go_page(division,guestroom_reserve_code){//페이지구분,상품고유번호or상품예약번호,날짜,방이름,예약상태
		if(division == 'reserve_delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"reserve_write_action.php?&division="+division+"&guestroom_reserve_code="+guestroom_reserve_code,
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											 reserve_search_act();
					            }else{
					              alert('처리에러.');
					        }
					    }});
					 }
		}else if(division == 'reserve_modify'){
			location.href="./guestroom_direct_write_form.php?top_menu_id=4001&left_menu_id=004&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4;
		}else{
			alert('go_page 스크립트 파라메터 오류');
		}
	}
	$(document).ready(function() {
			reserve_search_act();
				$('#reserveModifyModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
					  var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
					  var guestroom_reserve_code = button.data('whatever'); // Extract info from data-* attributes
							$.ajax({
								url:"reservation_modify_modal.php?guestroom_reserve_code="+guestroom_reserve_code,
								cache:false,
								success:function(result){
								$("#reserveModifyModalBody").html(result);
							}});
		});

		$('#reservation_modify').click(function(){
			  // alert('reservation_modify click');
        reservation_modify_check('reservation_modify');
			});
	});

  function reservation_modify_check(division) {
		var guestroom_reserve_code = $('#guestroom_reserve_code').val();//상품코드
		var guestroom_reserve_status = $("#guestroom_reserve_status option:selected").val(); //예약상태
		var guestroom_reserve_payment_status = $("#guestroom_reserve_payment_status option:selected").val(); //결제상태
		var guestroom_reserve_status_or = $("#guestroom_reserve_status_or").val(); //결제상태
		// alert('guestroom_reserve_status_or ' + guestroom_reserve_status_or);
		// var guestroom_reserve_user_name = $('#guestroom_reserve_user_name').val();//예약자명
		// var guestroom_reserve_user_phone = $('#guestroom_reserve_user_phone').val(); //예약자연락처
		var guestroom_reserve_payment_date = $('#guestroom_reserve_payment_date').val();//결제일
		var guestroom_cancel_date = $('#guestroom_cancel_date').val();//취소일
		var guestroom_reserve_payment_total = $('#guestroom_reserve_payment_total').val();
		var guestroom_reserve_user_request = $('#guestroom_reserve_user_request').val();
		var guestroom_reserve_memo = $('#guestroom_reserve_memo').val();

		if(guestroom_reserve_payment_status == '3'){ //결제완료일때
    	if(guestroom_reserve_payment_date == '') { warning('결제일을 입력하세요','guestroom_reserve_payment_date');	return false; }
   }
		if(division == 'reservation_modify'){
			var result = confirm("수정 하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
							 type: 'POST',
					     url:"reserve_write_action.php",
							 data: {
										  division : division,
											// guestroom_code : guestroom_code,
										  guestroom_reserve_code : guestroom_reserve_code,
											guestroom_reserve_status : guestroom_reserve_status,
											guestroom_reserve_status_or : guestroom_reserve_status_or,
											guestroom_reserve_payment_status : guestroom_reserve_payment_status,
											guestroom_reserve_payment_date : guestroom_reserve_payment_date,
											guestroom_cancel_date : guestroom_cancel_date,
											guestroom_reserve_payment_total : guestroom_reserve_payment_total,
											guestroom_reserve_user_request : guestroom_reserve_user_request,
											guestroom_reserve_memo : guestroom_reserve_memo
										},
					     cache:false,
					        success:function(result){
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											reserve_search_act();
											$("#reserveModifyModal .close").click();
										}else if(result == 'overlap'){
					              alert('이미 예약된 정보가 있습니다.');
					        	  }else{
					              alert('처리에러.');
					        	  }
					    }});
					 }
		}else	if(division == 'reservation_modify_confirm'){
			var result = confirm("예약확정 하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
							 type: 'GET',
					     url:"reserve_write_action.php",
							 data: {
										  division : division,
											guestroom_code : guestroom_code,
										  guestroom_reserve_code : guestroom_reserve_code,
											guestroom_reserve_payment_status : guestroom_reserve_payment_status,
											guestroom_reserve_user_name : guestroom_reserve_user_name,
											guestroom_reserve_user_phone : guestroom_reserve_user_phone,
											guestroom_reserve_user_personnel_1 : guestroom_reserve_user_personnel_1,
											guestroom_reserve_user_personnel_2 : guestroom_reserve_user_personnel_2,
											guestroom_arrive_date : guestroom_arrive_date,
											guestroom_reserve_date : guestroom_reserve_date,
											guestroom_reserve_payment_date : guestroom_reserve_payment_date,
											guestroom_cancel_date : guestroom_cancel_date,
											guestroom_reserve_payment_method_array : guestroom_reserve_payment_method_array,
											guestroom_reserve_payment_total : guestroom_reserve_payment_total,
											guestroom_onsite_payment_price : guestroom_onsite_payment_price,
											guestroom_reserve_user_request : guestroom_reserve_user_request,
											guestroom_reserve_memo : guestroom_reserve_memo,
											guestroom_reserve_user_additional_service : guestroom_reserve_user_additional_service
										},
							 // data: {
								// 		  division : division,
								// 		  guestroom_reserve_code : guestroom_reserve_code
								// 		},
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											// location.reload();
											reserve_search_act();
											$("#reserveModifyModal .close").click();
										}else if(result == 'overlap'){
						              alert('이미 예약된 정보가 있습니다.');
						        	  }else{
					              alert('처리에러.');
					        }
					    }});
					 }
		}else if(division == 'reservation_modify_wait'){
						if(division == 'reservation_modify_wait'){
							var result = confirm("예약대기 하시겠습니까?");
				           if(result ){ //확인 클릭 시
										 $.ajax({
											 type: 'GET',
									     url:"reserve_write_action.php",
											 data: {
														  division : division,
															guestroom_code : guestroom_code,
														  guestroom_reserve_code : guestroom_reserve_code,
															guestroom_reserve_payment_status : guestroom_reserve_payment_status,
															guestroom_reserve_user_name : guestroom_reserve_user_name,
															guestroom_reserve_user_phone : guestroom_reserve_user_phone,
															guestroom_reserve_user_personnel_1 : guestroom_reserve_user_personnel_1,
															guestroom_reserve_user_personnel_2 : guestroom_reserve_user_personnel_2,
															guestroom_arrive_date : guestroom_arrive_date,
															guestroom_reserve_date : guestroom_reserve_date,
															guestroom_reserve_payment_date : guestroom_reserve_payment_date,
															guestroom_cancel_date : guestroom_cancel_date,
															guestroom_reserve_payment_method_array : guestroom_reserve_payment_method_array,
															guestroom_reserve_payment_total : guestroom_reserve_payment_total,
															guestroom_onsite_payment_price : guestroom_onsite_payment_price,
															guestroom_reserve_user_request : guestroom_reserve_user_request,
															guestroom_reserve_memo : guestroom_reserve_memo,
															guestroom_reserve_user_additional_service : guestroom_reserve_user_additional_service
														},
									     cache:false,
									        success:function(result){
									             // alert(result);
									           if(result == 'ok'){
									              alert('처리하였습니다.');
															 // location.reload();
															 reserve_search_act();
															 $("#reserveModifyModal .close").click();
									            }else if(result == 'overlap'){
											              alert('이미 예약된 정보가 있습니다.');
											        	  }else{
									              alert('처리에러.');
									        }
									    }});
									 }
						}
		}else	if(division == 'reservation_modify_cancel'){
				if(guestroom_cancel_date == '') { warning('취소일을 입력하세요','guestroom_cancel_date'); return false; }
						var result = confirm("예약취소 하시겠습니까?");
								 if(result ){ //확인 클릭 시
									 $.ajax({
										 type: 'GET',
										 url:"reserve_write_action.php",
										 data: {
													  division : division,
														guestroom_code : guestroom_code,
													  guestroom_reserve_code : guestroom_reserve_code,
														guestroom_reserve_payment_status : guestroom_reserve_payment_status,
														guestroom_reserve_user_name : guestroom_reserve_user_name,
														guestroom_reserve_user_phone : guestroom_reserve_user_phone,
														guestroom_reserve_user_personnel_1 : guestroom_reserve_user_personnel_1,
														guestroom_reserve_user_personnel_2 : guestroom_reserve_user_personnel_2,
														guestroom_arrive_date : guestroom_arrive_date,
														guestroom_reserve_payment_date : guestroom_reserve_payment_date,
														guestroom_cancel_date : guestroom_cancel_date,
														guestroom_reserve_payment_method_array : guestroom_reserve_payment_method_array,
														guestroom_reserve_payment_total : guestroom_reserve_payment_total,
														guestroom_onsite_payment_price : guestroom_onsite_payment_price,
														guestroom_reserve_user_request : guestroom_reserve_user_request,
														guestroom_reserve_memo : guestroom_reserve_memo,
														guestroom_reserve_user_additional_service : guestroom_reserve_user_additional_service
													},
										 cache:false,
												success:function(result){
														 // alert(result);
													 if(result == 'ok'){
															alert('처리하였습니다.');
														 // location.reload();
														 reserve_search_act();
														 $("#reserveModifyModal .close").click();
														}else if(result == 'overlap'){
										              alert('이미 예약된 정보가 있습니다.');
										        	  }else{
															alert('처리에러.');
												}
										}});
								 }
		}
	}
</script>
<!-- Modal -->
<div class="modal fade" id="reserveModifyModal" tabindex="-1" role="dialog" aria-labelledby="reserveModifyModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LogDataDetailModalTitle">예약관리</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="reserveModifyModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="reservation_modify">수정</button>
				<!-- <button type="button" class="btn btn-success" id="reservation_modify_confirm">예약확정</button>
				<button type="button" class="btn btn-info" id="reservation_modify_wait">예약대기</button>
				<button type="button" class="btn btn-warning" id="reservation_modify_cancel">예약취소</button> -->
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div>
</body>
</html>
