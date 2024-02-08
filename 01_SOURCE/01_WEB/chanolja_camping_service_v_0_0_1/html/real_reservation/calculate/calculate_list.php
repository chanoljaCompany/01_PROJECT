<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$startday = date("Y/m")."/01";
$endday = date("Y/m/d");
$Toyear = date("Y");
$Tomonth = date("m");
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="box_title first">
						<h2 class="title">정산현황</h2>
					</div>
					<!-- <input type="hidden" name="curpage" id="curpage" value="1"> -->
					<form name="calculateSearch" id="calculateSearch" method="post" enctype="multipart/form-data">
						<input type="hidden" name="page_division" id="page_division" value="calculate">
						<input type="hidden" name="curpage" id="curpage" value="">

					<table class="tbl_row multi_shop">
						<caption class="hidden">정산현황</caption>
						<colgroup>
							<col style="width:15%">
							<col style="width:85%">
						</colgroup>
						<tr>
							<th scope="row">정산기간</th>
							<td>
								<select id="searchKey_1" name="searchKey_1">
                                  <? for ($i = '2021' ; $i <= $Toyear ; $i++ ){?>
								  <option <? if($i == $Toyear){?> selected <?}?> value="<?=$i?>"><?=$i?>년</option>
                                  <?}?>
								</select>
                                <select id="searchKey_2" name="searchKey_2">
                                  <? for ($i = '1' ; $i < '13' ; $i++ ){
                                          $i = sprintf('%02d', $i);
                                   ?>
								  <option <? if($i == $Tomonth){?> selected <?}?> value="<?=$i?>"><?=$i?>월</option>
                                  <?}?>
								</select>
								<font color="red">*정산은 [결제일자]를 기준으로 합니다.</font>
							</td>
						</tr>
					</table>
				</form>
					<div class="box_bottom">
						<span class="box_btn blue"><input type="button" id="calculate_search" value="검색"></span>
				</div>
					<div class="clear"></div>
						<div class="box_title first">
							<h2 class="title">검색결과</h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">조회 리스트</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="10%">호스트</th>
                                        <th scope="col" width="10%">결제금액</th>
										<th scope="col" width="7%">정산상태</th>
										<th scope="col" width="7%">정산금액</th>
										<th scope="col" width="7%">정산일</th>
                                        <th scope="col" width="7%">-</th>
                                        <th scope="col" width="7%">-</th>
									</tr>
								</thead>
								<tbody id="calculate_search_list_data">
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
	$('#calculate_search').click(function(){
		calculate_search_act();
	});

function calculate_search_act(){
	var page_division = "calculate";
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
	showTable(curpage);

}
//function showTable(page_division,searchKey_1,searchVal_1,searchKey_2,searchVal_2,searchKey_3,searchVal_3,searchVal_4_array,searchVal_5,searchVal_6_array,curpage) {
function showTable(curpage) {
	// alert(curpage);
  $("#curpage").val(curpage);
	var form = $('#calculateSearch')[0];
    var formData = new FormData(form);
    for (var pair of formData.entries())
    {
      console.log(pair[0]+ ', ' + pair[1]);
    }
	$.ajax({
		type: 'POST',
		url:'./calculate_search_list_ajax.php',
		enctype: 'multipart/form-data',
		data:formData,
		cache:false,
		contentType : false,
		processData : false,
		error: function (request, status, error) {
		console.log('calculateSearch error');
		},
		success:function(html){
				$("#calculate_search_list_data").html(html);
	 }});
//	 showPaing(curpage);
}

	function showPaing(curpage) {
					var form = $('#calculateSearch')[0];
			    var formData = new FormData(form);
			    for (var pair of formData.entries())
			    {
			      console.log(pair[0]+ ', ' + pair[1]);
			    }
	        $.ajax({
	            type: "POST",
	            url: "./calculate_search_list_paging_ajax.php",
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

	function go_page(division,guestroom_calculate_code){//페이지구분,상품고유번호or상품정산번호,날짜,방이름,정산상태
		if(division == 'calculate_delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"calculate_write_action.php?&division="+division+"&guestroom_calculate_code="+guestroom_calculate_code,
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
								 calculate_search_act();
					            }else{
					              alert('처리에러.');
					        }
					    }});
					 }
		}else if(division == 'calculate_modify'){
			location.href="./guestroom_direct_write_form.php?top_menu_id=4001&left_menu_id=004&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4;
		}else{
			alert('go_page 스크립트 파라메터 오류');
		}
	}
	$(document).ready(function() {
			calculate_search_act();
				$('#ModifyModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
					  var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
					  var guestroom_calculate_code = button.data('whatever'); // Extract info from data-* attributes
							$.ajax({
								url:"calculate_modify_modal.php?guestroom_calculate_code="+guestroom_calculate_code,
								cache:false,
								success:function(result){
								$("#ModifyModalBody").html(result);
							}});

		});

		$('#calculate_modify').click(function(){
			  // alert('calculate_modify click');
        calculate_modify_check('calculate_modify');
		});

        $('#ListModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
                       var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
                       var guestroom_calculate_code = button.data('whatever'); // Extract info from data-* attributes
				       $.ajax({
						url:"calculate_list_modal.php?guestroom_calculate_code="+guestroom_calculate_code,
						cache:false,
						success:function(result){
						$("#ListModalBody").html(result);
				}});
            });
	});

  function calculate_modify_check(division) {
		var search_userid = $('#search_userid').val();//업체아이디
		var status = $("#status option:selected").val(); //정산상태
		var calculate_month = $('#calculate_month').val();//정산일
		var calculate_money = $('#calculate_money').val();//정산일

		var memo = $("#memo").val(); //메모
        if(calculate_month == ''){
			alert('정산일을 입력하세요.');
			return false;
		}
		if(calculate_money == ''){
			alert('정산금액을 입력하세요.');
			return false;
		}
		var result = confirm("수정 하시겠습니까?");
           if(result ){ //확인 클릭 시
			 $.ajax({
				 type: 'POST',
			     url:"calculate_write_action.php",
				 data: {
						division : division,
						search_userid : search_userid,
						status : status,
						calculate_money : calculate_money,
						calculate_month : calculate_month,
						memo : memo,
    					},
				cache:false,
				    success:function(result){
				       if(trim(result) == 'ok'){
					      alert('처리하였습니다.');
						  $("#ModifyModal .close").click();
						  calculate_search_act();

						}
					    }
					  }
					);
			}

	}
</script>
<div class="modal fade" id="ModifyModal" tabindex="-1" role="dialog" aria-labelledby="ModifyModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LogDataDetailModalTitle">정산관리</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ModifyModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="calculate_modify">수정</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ListModal" tabindex="-1" role="dialog" aria-labelledby="ListModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LogDataDetailModalTitle">정산내역</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ListModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
