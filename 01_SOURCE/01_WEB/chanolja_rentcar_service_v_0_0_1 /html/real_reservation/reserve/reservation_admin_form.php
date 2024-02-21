<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
	$page_division = "direct_reserve";
	// $startday = date("Y/m/d");
	// $endday = date('Y/m/d', strtotime("+1 day", strtotime($startday)));//다음날
    $direct_reserve_date = trim(isset($_REQUEST['direct_reserve_date'])) ? $_REQUEST['direct_reserve_date'] : '';//예약번호/객실명
    $get_manager = get_manager("M");
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=$file_url?>/js/FileUp/jquery.growl.css" rel="stylesheet" type="text/css">
<link href="<?=$file_url?>/js/FileUp/src/fileup.css" rel="stylesheet" type="text/css">
<body id="manage">
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<!-- <form name="guestroom" method="post" enctype="multipart/form-data" action="guestroom_write_action.php"> -->
						<form name="reservation" id="reservation" method="post" enctype="multipart/form-data">
							<input type="hidden" name="page_division" id="page_division" value="<?=$page_division?>">
						<div class="box_title first">
							<h2 class="title">관리자예약등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">관리자예약등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:40%">
								<col style="width:10%">
								<col style="width:40%">
							</colgroup>
							<tr>
								<th scope="row">호스트선택</th>
								<td>
									<select id="guestroom_host" name="guestroom_host" style="width: 50%">
                                    <?php
                                     if($_SESSION['session_user_level'] == 'A'){
                                     foreach ($get_manager as $key=>$value) {?>
    	                                <option value="<?=$value['user_id']?>"><?=$value['com_name']?></option>
                                     <?}
                                     }else{?>
                                        <option value="<?=$_SESSION['session_user_id'] ?>"><?=$_SESSION['session_company_name'] ?></option>
                                    <?}?>

					                </select>
								</td>
                                <th scope="row">상품선택</th>
								<td>
									<div id="guestroom_code_area">
					             </div>
								</td>
							</tr>
							<tr>
                            <th scope="row">예약상태</th>
								<td class='select_td'>
										<select id='guestroom_reserve_status' name='guestroom_reserve_status'>
											<option value="2">예약신청</option>
											<option value="3">예약완료</option>

										</select>
								</td>
								<th scope="row">결제상태</th>
									<td class='select_td'>
											<select id='guestroom_reserve_payment_status' name='guestroom_reserve_payment_status'>
											 <option value="1">결제대기</option>
											 <option value="2">결제완료</option>
											</select>
								</td>
							</tr>
							<tr>
                            <th scope="row">예약일자</th>
                            <td>
                                <i class='fa fa-calendar'></i>
                                <input class='input' size='20' type='text' name='guestroom_reserve_date' id='guestroom_reserve_date' value="<?=$direct_reserve_date?>" readonly>
                            </td>
								<th scope="row">예약자명</th>
								<td>
									<input type="text" name="reserve_name" id ="reserve_name"  class="input" placeholder="*필수) 예약자명"  value="<?=$rows['reserve_name']?>">
								</td>
							</tr>
								<tr>
								<th scope="row">예약자연락처</th>
								<td colspan='3'>
									<input type="number" name="reserve_phone" id ="reserve_phone"  class="input" placeholder="*필수) 연락처"  value="<?=$rows['reserve_phone']?>">
								</td>
								<!-- <th scope="row">인원</th>
								<td>
								  성인:<input type="text" name="adperson" id="adperson" class="input">
                                  아동:<input type="text" name="chperson" id="chperson" class="input">
                                  유아:<input type="text" name="baadperson" id="baadperson" class="input">
								</td> -->
							</tr>
              <tr>
                <th scope="row">결제수단</th>
                <td>
                  <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="1" checked  onclick="paymthodChang('bank')"> 무통장입금</label>
									<label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="2"  onclick="paymthodChang('card')">신용카드</label>
                  <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="6"  onclick="paymthodChang('direct')">현장결제</label>
                  <div id="depositor_div">입금자명 : <input type="text" name="depositor" id="depositor" class="input"></div>
                </td>
                <th scope="row">결제금액</th>
                <td>
                  <input type="number" name="guestroom_reserve_payment_total" id ="guestroom_reserve_payment_total" class="input" size="30" placeholder="*필수) 숫자만 입력하세요"  value="<?=$reserveData['guestroom_reserve_payment_total']?>">
                </td>
              </tr>
              <tr>
                <th scope="row">요청사항</th>
                <td>
                  <input type="text" name="guestroom_reserve_user_request" id ="guestroom_reserve_user_request" class="input" size="40" value="<?=$reserveData['guestroom_reserve_user_request']?>">
                </td>
                <th scope="row">관리자메모</th>
                <td>
                  <input type="text" name="guestroom_reserve_memo" id ="guestroom_reserve_memo" class="input" size="40" value="<?=$reserveData['guestroom_reserve_memo']?>">
                </td>
              </tr>
						</table>
            <div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="guestroom_input_image" value="등록"></span>
							<span class="box_btn gray"><input type="button" id="guestroom_list" value="목록"></span>
						</div>
					</form>
				</article>
			</section>
		<?
		include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script>
var guestroom_host = "";
$(document).ready(function() {
    guestroom_host = $("#guestroom_host option:selected").val();
	 room_check(guestroom_host);
});
$("#guestroom_host").on( "change", function(){
  var guestroom_host_select_value = $("#guestroom_host option:selected").val();
  room_check(guestroom_host_select_value);
});
function room_check(guestroom_host){
  
  var page_division = 'room_list';
  $.ajax({
    type: 'GET',
    url:'./reservation_blocker_list_ajax.php',
    data: {
           page_division : page_division,
           guestroom_host : guestroom_host,
         },
    error: function (request, status, error) {
    console.log('sindySelect error');
    },
    success:function(html){
        $("#guestroom_code_area").html(html);
   }});
}
$('#guestroom_list').click(function() {
		location.href="./reservation_blocker_list.php?top_menu_id=4001&left_menu_id=011";
});
$('#guestroom_input_image').click(function() {
  var reserve_name = $("#reserve_name").val();
  var reserve_phone = $("#reserve_phone").val();
//   var reserve_email = $("#reserve_email").val();
//   var guestroom_paymthod = $("input[name='guestroom_paymthod']:checked").val();
  if(reserve_name == ''){
     alert('예약자명을 입력하세요.');
     $("#reserve_name").focus();
     return false;
   }
   if(reserve_phone == ''){
      alert('예약자연락처를 입력하세요.');
      $("#reserve_phone").focus();
      return false;
    }
  var form = $('#reservation')[0];
  var formData = new FormData(form);
    for (var pair of formData.entries())
    {
      console.log(pair[0]+ ', ' + pair[1]);
    }
var result = confirm("예약을 등록 하시겠습니까?");
    if(result) { //확인 클릭 시
    $.ajax({
       type: 'POST',
       url:"./reservation_admin_write.php",
       enctype: 'multipart/form-data',
       data:formData,
       cache:false,
       contentType : false,
       processData : false,
       error: function (request, status, error) {
           console.log('reserveAct error');
           },
           success:function(json) {
						 var obj = json.dataret;
						 var recode = obj[0].ret_code;
						 var remsg =  obj[0].ret_code_msg;//메세지내용
						  alert(remsg);
						 if(recode == '100'){ //무통장예약 성공 > 예약완료페이지화면
	               // reserve_fifth(reserve_code);
								 location.href="./reservation_list.php?top_menu_id=4001&left_menu_id=010";
	           }
	           else if(recode == '200'){ //신용카드결제 선택 성공 > 신용카드결제PC화면
	                // pg_payment_proc(reserve_code);
	           }

        }
    });
  }
});
function paymthodChang(val){
  alert(val);
   if(val != 'bank'){
     $("#depositor").hide();
   }
   else if(val == 'bank'){
     $("#depositor").show();
   }
}
</script>
<script type="text/javascript">
$(function() {
  $('#guestroom_reserve_date').daterangepicker({
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
</script>
</body>
</html>
