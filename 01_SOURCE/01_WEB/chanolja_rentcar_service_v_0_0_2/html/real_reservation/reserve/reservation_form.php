<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";

$guestroom_reserve_code = trim(isset($_REQUEST['guestroom_reserve_code'])) ? $_REQUEST['guestroom_reserve_code'] : '';//방막기번호/객실명
if($guestroom_reserve_code){
	$page_division = "room_block_mod";
	$sql = "SELECT *	FROM $GUESTROOM_BLOCKER_TB
	        WHERE 1=1
	        AND user_id = '".$_SESSION['session_user_id']."'
					AND guestroom_reserve_code = '".$guestroom_reserve_code."'
	        ORDER BY seq DESC";
  $rows = sql_fetch($sql);
	print_r($rows);
	$guestroom_reserve_date = $rows['guestroom_reserve_date'];
	$guestroom_reserve_date = str_replace("-","/", $guestroom_reserve_date);
	$dateStrExp =explode("~",$guestroom_reserve_date);
	$startday = $dateStrExp['0'];
	$endday = $dateStrExp['1'];
	$room_info_array = room_info_array($rows['guestroom_code'],"admin");
	print_r($room_info_array);
}
else{
	$page_division = "room_block_ins";
	$startday = date("Y/m")."/01";
	$endday = date("Y/m/d");
	$endday_2 = date('t', strtotime($endday));
	$endday = date("Y/m")."/".$endday_2;
}
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
							<h2 class="title">방막기등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">방막기등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:25%">
								<col style="width:10%">
								<col style="width:25%">
                <col style="width:10%">
								<col style="width:30%">
							</colgroup>
							<tr>
								<th scope="row">상품타입</th>
								<td>
									<select id="guestroom_type" name="guestroom_type" style="width: 50%" class="form-control">
		                <option <? if($rows['guestroom_type'] == '1'){?> selected <?}?> value="1">숙박상품</option>
										<option <? if($rows['guestroom_type'] == '2'){?> selected <?}?> value="2">당일상품</option>
										<option <? if($rows['guestroom_type'] == '3'){?> selected <?}?> value="3">셀프바베큐존</option>
					        </select>
								</td>
                <th scope="row">방막기상품</th>
								<td>
									<div id="guestroom_code_area">
					        </div>
								</td>
              <th scope="row">방막기일자</th>
              <td>
                <i class='fa fa-calendar'></i>

                <input class='input' size='20' type='text' name='guestroom_reserve_date' id='guestroom_reserve_date' value='value="<?=$startday?> - <?=$endday?>" readonly' readonly>
              </td>
            </tr>
							<!-- <tr>

								<th scope="row">방막기자명</th>
								<td>
									<input type="text" name="reserve_name" id ="reserve_name"  class="input input_full" placeholder="*필수) 방막기자명"  value="<?=$rows['reserve_name']?>">
								</td>
							</tr> -->
							<!-- <tr>
								<th scope="row">방막기자연락처</th>
								<td>
									<input type="number" name="reserve_phone" id ="reserve_phone"  class="input input_full" placeholder="*필수) 연락처"  value="<?=$rows['reserve_phone']?>">
								</td>
								<th scope="row">방막기인원</th>
								<td>
								  성인:<input type="text" name="adperson" id="adperson" class="input">
                  아동:<input type="text" name="chperson" id="chperson" class="input">
                  유아:<input type="text" name="baadperson" id="baadperson" class="input">
								</td>
							</tr>
              <tr>
                <th scope="row">결제수단</th>
                <td>
                  <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="1" checked  onclick="paymthodChang('bank')"> 무통장입금</label>
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
                  <input type="text" name="guestroom_reserve_user_request" id ="guestroom_reserve_user_request" class="input input_full" size="40" value="<?=$reserveData['guestroom_reserve_user_request']?>">
                </td>
                <th scope="row">관리자메모</th>
                <td>
                  <input type="text" name="guestroom_reserve_memo" id ="guestroom_reserve_memo" class="input input_full" size="40" value="<?=$reserveData['guestroom_reserve_memo']?>">
                </td>
              </tr> -->
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
var guestroom_type = "1";
$(document).ready(function() {
	 room_check(guestroom_type);
});
$("#guestroom_type").on( "change", function(){
  var guestroom_type_select_value = $("#guestroom_type option:selected").val();
  room_check(guestroom_type_select_value);
});
function room_check(guestroom_type){
  var page_division = 'room_list';
  $.ajax({
    type: 'GET',
    url:'./reservation_blocker_list_ajax.php',
    data: {
           page_division : page_division,
           guestroom_type : guestroom_type,
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
  // var reserve_name = $("#reserve_name").val();
  // var reserve_phone = $("#reserve_phone").val();
  // var reserve_email = $("#reserve_email").val();
  // var guestroom_paymthod = $("input[name='guestroom_paymthod']:checked").val();
  // if(reserve_name == ''){
  //    alert('방막기자명을 입력하세요.');
  //    $("#reserve_name").focus();
  //    return false;
  //  }
  //  if(reserve_phone == ''){
  //     alert('핸드폰번호를 입력하세요.');
  //     $("#reserve_phone").focus();
  //     return false;
  //   }
  var form = $('#reservation')[0];
  var formData = new FormData(form);
    for (var pair of formData.entries())
    {
      console.log(pair[0]+ ', ' + pair[1]);
    }
var result = confirm("방막기를 하시겠습니까?");
    if(result) { //확인 클릭 시
    $.ajax({
       type: 'POST',
       url:"./reservation_blocker_list_ajax.php",
       enctype: 'multipart/form-data',
       data:formData,
       cache:false,
       contentType : false,
       processData : false,
       error: function (request, status, error) {
           console.log('reserveAct error');
           },
           success:function(result) {
						 if(result == 'ok'){
								alert('처리하였습니다.');
								location.href="./reservation_blocker_list.php?top_menu_id=4001&left_menu_id=011";
							}
							else{
								alert('처리에러.');
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
