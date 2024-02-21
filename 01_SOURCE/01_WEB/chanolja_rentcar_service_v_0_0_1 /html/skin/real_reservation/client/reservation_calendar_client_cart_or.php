<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";

$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
$guestroom_code_arr = unserialize(urldecode($_POST['set_guestroom_code_arr']));
$mangement_array = mangement_array(); //pension_management_reserve 예약 기본 정보 설정
$size = count($guestroom_code_arr);
$personnel_arr =  $_POST['personnel'];
$personnel_arr_child =  $_POST['personnel_child'];//유아선택인원
$guestroom_reserve_code = time();
$rdate = date("Y-m-d");
$room_info_array = array();
for($i = '0'; $i < $size; $i++){
			$checkValue = $guestroom_code_arr[$i];
			$checkValue_explode = explode(":",$checkValue);
			$guestroom_code = $checkValue_explode['1'];
			$reserve_date = $checkValue_explode['0'];
			$result_data_exp = explode("-",$reserve_date);
			$room_info_array = room_info_array($guestroom_code); // guestroom_info 객실정보
			// view_printr($room_info_array,'room_info_array');
			$get_peakday = get_peakday($reserve_date,"");
			if(!$get_peakday){
				$get_semi_peakday = get_peakday($reserve_date,"semi");
			}
			$get_weekend = get_weekend($reserve_date,$mangement_array['weekend_setting_start'],$mangement_array['weekend_setting_end']);
			$get_holiday_array = explode("^",get_holiday($result_data_exp['0'],$result_data_exp['1'],$result_data_exp['2']));
			$holidayPrvday = $get_holiday_array['3'];
			$get_holiday = $get_holiday_array['0']; //주말여부
			// view_echo("holidayPrvday : $holidayPrvday");
			$get_guestroom_fee = get_guestroom_fee($mangement_array,$room_info_array,$guestroom_code,$get_peakday,$get_semi_peakday,$get_holiday,$get_weekend,$holidayPrvday);

			/*추가요금*/
			$personnel = $personnel_arr[$i]; //성인선택인원
			$personnel_child = $personnel_arr_child[$i]; //성인선택인원
			echo "
personnel >>> $personnel <br>
personnel_child >>> $personnel_child <br>
			";
			$add_personnel = $personnel['0'] + $personnel_child - $room_info_array[0]['guestroom_personnel'];
			if($add_personnel > '0') {
					$add_fee = $add_personnel*$room_info_array[0]['guestroom_extra_charge'];
			}
			/*추가요금*/

			$guestroom_code = $room_info_array['0']['guestroom_code'];
			$guestroom_name = $room_info_array['0']['guestroom_name'];

			$sql = "SELECT COUNT(*) AS num FROM $GUESTROOM_RESERVATION_CART_TB
							WHERE session_id = '$session_id_client'
							AND guestroom_code = '$guestroom_code'
							AND guestroom_reserve_date = '$reserve_date'
							";
			$result = sql_query($sql);
			$rows = sql_fetch_array($result);
			$dbnum = $rows['num'];
			if(!$dbnum){
			$sql = "INSERT INTO $GUESTROOM_RESERVATION_CART_TB
						(pension_user_id,guestroom_reserve_code,guestroom_code, guestroom_name,guestroom_reception_date, guestroom_reserve_status, guestroom_reserve_date, guestroom_reserve_payment_date
						,guestroom_reserve_complete_date, guestroom_cancel_date,guestroom_arrive_date,guestroom_reserve_user_id,guestroom_reserve_user_name
						,guestroom_reserve_user_phone,guestroom_reserve_user_personnel,guestroom_reserve_user_additional_service,guestroom_reserve_user_request,guestroom_reserve_memo
						,guestroom_reserve_payment_status,guestroom_reserve_payment_method,guestroom_reserve_payment_price,guestroom_onsite_payment_price,guestroom_reserve_sales_channel_id,guestroom_reserve_sales_channel_name,session_id
						,guestroom_fee,guestroom_add_fee)
						VALUES
						('$session_userid','$guestroom_reserve_code','$guestroom_code','$guestroom_name'
						 ,'$rdate','$RESERVATIONS_BASIC','$reserve_date','$guestroom_reserve_payment_date'
						 ,'$guestroom_reserve_complete_date','$guestroom_cancel_date','$guestroom_arrive_date','$guestroom_reserve_user_id','$guestroom_reserve_user_name'
						 ,'$guestroom_reserve_user_phone','$personnel','$guestroom_reserve_user_additional_service','$guestroom_reserve_user_request','$guestroom_reserve_memo'
						 ,'$guestroom_reserve_payment_status','$guestroom_reserve_payment_method','$guestroom_reserve_payment_price','$guestroom_onsite_payment_price','$guestroom_reserve_sales_channel_id','$guestroom_reserve_sales_channel_name','$session_id_client'
						 ,'$get_guestroom_fee','$add_fee'
					 )";
						echo "
						sql : $sql <br>
						";
						 // $result = sql_query($sql);
							 // echo"ok";
		 }
	 }

	 $PENSION_MANAGEMENT_TB = "pension_management";
	 $sql = "SELECT *	FROM $PENSION_MANAGEMENT_TB WHERE pension_user_id = '$session_userid' ORDER BY seq LIMIT 0,1";
	 $result = sql_query($sql);
	 $row = mysqli_fetch_array($result);

	 $sql = "SELECT * FROM $GUESTROOM_RESERVATION_CART_TB
	 				 	WHERE session_id = '$session_id_client'
					";
	$result = sql_query($sql);
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<form name="client_reserve_input" method="post" enctype="multipart/form-data">
						<div class="box_title first">
							<h2 class="title">직접등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<? while ($rows = sql_fetch_array($result)) {
								 $total_fee = "";
								 $total_fee = $rows['guestroom_fee'] + 	$rows['guestroom_add_fee'];
								 $guestroom_reserve_code = $rows['guestroom_reserve_code'];
								?>
								<tr>
									<th scope="row">객실이름</th>
									<td>
										<?=$rows['guestroom_name']?>
									</td>
								</tr>
								<tr>
									<th scope="row">예약일자</th>
									<td>
										<?=$rows['guestroom_reserve_date']?>
									</td>
								</tr>
								<tr>
									<th scope="row">인원</th>
									<td>
										<?=$rows['guestroom_reserve_date']?>
									</td>
								</tr>
								<tr>
									<th scope="row">객실이용금액</th>
									<td>
										<?=number_format($rows['guestroom_fee'])?>원
									</td>
								</tr>
								<tr>
									<th scope="row">객실추가요금</th>
									<td>
										<?=number_format($rows['guestroom_add_fee'])?>원
									</td>
								</tr>
								<tr>
									<th scope="row">합계금액</th>
									<td>
										<?=number_format($total_fee)?>원
									</td>
								</tr>
								<tr>
									<td scope="row"></th>
									<td>

									</td>
								</tr>
              <?
								$all_total_room_fee += $rows['guestroom_fee'];
								$all_total_add_fee += $rows['guestroom_add_fee'];
								$all_total_fee += $total_fee;

							 	}
						?>
						</table>
						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
              <tr>
								<td scope="row"></th>
								<td>
									객실금액 : <?=number_format($all_total_room_fee)?>원
									인원추가금액 :<?=number_format($all_total_add_fee)?>원
									총 합계 금액 :<?=number_format($all_total_fee)?>원
								</td>
							</tr>
						</table>
						<div class="clear"></div>
						<div class="box_title first">
							<h2 class="title">직접등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<tr>
								<th scope="row">예약자</th>
								<td>
									<input type="text" name="guestroom_reserve_user_name" id ="guestroom_reserve_user_name" class="input input_full" placeholder="*필수) 예약자" value="김유혁">
								</td>
							</tr>
							<tr>
								<th scope="row">휴대폰번호</th>
								<td>
									<input type="number" name="guestroom_reserve_user_phone" id ="guestroom_reserve_user_phone"  class="input input_full" placeholder="*필수) 휴대폰번호"  value="010471261041">
								</td>
							</tr>
							<tr>
								<th scope="row">도착예정시간</th>
								<td>
									<select id="guestroom_arrive_date" name="guestroom_arrive_date" style="width: 70%" class="form-control">
                          <option value=""></option>
													<option value="10">10:00</option>
													<option value="11">11:00</option>
													<option value="12">12:00</option>
													<option value="13">13:00</option>
													<option value="14">14:00</option>
													<option value="15" selected>15:00</option>
													<option value="16">16:00</option>
													<option value="17">17:00</option>
													<option value="18">18:00</option>
													<option value="19">19:00</option>
													<option value="20">20:00</option>
											</select>
								</td>
							</tr>
							<tr>
								<th scope="row">요청사항</th>
								<td>
									<input type="text" name="guestroom_reserve_user_request" id ="guestroom_reserve_user_request"  class="input input_full" value="깨끗한방으로..">
								</td>
							</tr>

							<tr>
								<th scope="row">결제수단</th>
								<td>
									<label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="1"> 무통장입금</label>
									<label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="2"> 신용카드</label>
								</td>
							</tr>
							<tr id="bank_account">
								<td scope="row"></th>
								<td>
                 <?=$row['account_name']?><?=$row['account_number']?><?=$row['account_holder']?>
								 입금자명 : <input type="text" name="depositor" id ="depositor"  class="input" value="설까치">
								</td>
							</tr>
							<input type="hidden" name="guestroom_reserve_code" id="guestroom_reserve_code" value="<?=$guestroom_reserve_code?>">
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="client_reserve_input" value="예약"></span>
						</div>
					</form>
				</article>
			</section>
		<?
		include "$_SERVER[DOCUMENT_ROOT]/pension_prj/left_nav.php";
		?>
	</div>
</div>
<script>
$(document).ready(function() {
			$('#bank_account').attr('style', "display:none;");
});
$("input:radio[name=guestroom_paymthod]").click(function(){
	if($("input[name=guestroom_paymthod]:checked").val() == "1"){
			 $('#bank_account').attr('style', "display:;");
	}else if($("input[name=guestroom_paymthod]:checked").val() == "2"){
				$('#bank_account').attr('style', "display:none;");
	}
});
		$('#client_reserve_input').click(function(){
						var depositor;
						var guestroom_reserve_code = $('#guestroom_reserve_code').val();
						var guestroom_reserve_user_name = $('#guestroom_reserve_user_name').val();
						var guestroom_reserve_user_phone = $('#guestroom_reserve_user_phone').val();
						var guestroom_arrive_date = $('#guestroom_arrive_date').val();
						var guestroom_reserve_user_request = $('#guestroom_reserve_user_request').val();
						var guestroom_paymthod_checked =$('input:radio[name=guestroom_paymthod]').is(':checked');
						var guestroom_paymthod = $(':radio[name="guestroom_paymthod"]:checked').val();

						if(guestroom_reserve_user_name == '') { warning('예약자명을 입력하세요','guestroom_reserve_user_name'); return false; }
						if(guestroom_reserve_user_phone == '') { warning('휴대폰번호를 입력하세요','guestroom_reserve_user_phone');	return false; }
						if(guestroom_paymthod_checked == false) { warning('결제수단을 선택하세요','guestroom_paymthod_checked'); return false; }
						if(guestroom_paymthod == '1'){ //무통장
							depositor = $('#depositor').val();
							if(depositor == '') { warning('입금자명을 입력하세요','depositor'); return false; }
						}

						var result = confirm("예약 하시겠습니까?");
					if(result ){ //확인 클릭 시
								$.ajax({
									type: 'GET',
									url:"client_reserve_write_action.php",
									data: {
												 guestroom_reserve_code : guestroom_reserve_code,
												 guestroom_reserve_user_name : guestroom_reserve_user_name,
												 guestroom_reserve_user_phone : guestroom_reserve_user_phone,
												 guestroom_arrive_date : guestroom_arrive_date,
												 guestroom_reserve_user_request : guestroom_reserve_user_request,
												 guestroom_paymthod : guestroom_paymthod,
												 depositor : depositor
											 },
									cache:false,
										 success:function(result){
													// alert(result);
												if(result == 'ok'){
														 var result = confirm("예약등록을 완료하였습니다.\n\n예약현황리스트로 이동하시겠습니까?");
														 if(result ){ //확인 클릭 시
															 location.href = "./reservation_calendar_client.php?top_menu_id=4001&left_menu_id=007"
														 }
												 }else if(result == 'overlap'){ //중복예약
													 alert('이미 예약된 정보가 있습니다.');
												 }else{
													 alert('처리에러.');
												 }
											 }
										 });
							}
});
	// $('#').click(function(){
  //   alert('a');
	// 		var sh = document.client_reserve_input;
	// 		sh.action = "reservation_calendar_client_cart.php";
	// 		sh.submit();
	// 	});
</script>
