<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";
// include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/orderform.sub.php";
require_once(G5_PENSION_PATH.'/client/settle_'.$default['de_pg_service'].'.inc.php');
require_once(G5_SHOP_PATH.'/settle_kakaopay.inc.php');
if( $default['de_inicis_lpay_use'] || $default['de_inicis_kakaopay_use'] ){   //이니시스 Lpay 또는 이니시스 카카오페이 사용시
    require_once(G5_SHOP_PATH.'/inicis/lpay_common.php');
}

// 결제대행사별 코드 include (스크립트 등)
require_once(G5_PENSION_PATH.'/'.$default['de_pg_service'].'/orderform.1.php');

if( $default['de_inicis_lpay_use'] || $default['de_inicis_kakaopay_use'] ){   //이니시스 L.pay 사용시
    require_once(G5_SHOP_PATH.'/inicis/lpay_form.1.php');
}

if($is_kakaopay_use) {
    require_once(G5_SHOP_PATH.'/kakaopay/orderform.1.php');
}
// include G5_SHOP_PATH.'/inicis/inistdpay_result.php';
// $aaa = G5_SHOP_PATH;
// echo "
// aaa >>>> $aaa
// ";
$GUESTROOM_RESERVATION_VIEW_TB = "guestroom_reservation_view";
$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
$guestroom_reserve_code = time();

//카트에 값이 있는지 확인...
$sql = "SELECT COUNT(*) AS num FROM $GUESTROOM_RESERVATION_CART_TB
				WHERE pension_user_id = '$session_userid'
				AND user_id = '$session_id_client'";
$result = sql_query($sql);
$rows = sql_fetch_array($result);
$dbnum = $rows['num'];

	if(!$dbnum) { //카드에 값이없음..
		$guestroom_reserve_code = time();
		$personnel_arr =  $_POST['personnel'];
		$personnel_arr_child =  $_POST['personnel_child'];//유아선택인원
		$psize = sizeof($personnel_arr);
	for($p = '0' ; $p < $psize ; $p++) {
			// print_r($value);
			$personnel_adult = explode(":",$personnel_arr[$p]);
			$personnel_child = $personnel_arr_child[$p];
			$guestroom_code = $personnel_adult['4'];//객실코드
			$adult_persion = $personnel_adult['0']; //성인선택인원
			$personnel_standard = $personnel_adult['1']; //기준인원
			$personnel_max = $personnel_adult['2']; //최대인원
			$guestroom_add_fee = $personnel_adult['3'];//추가요금
			$personnel_child = $personnel_child; //유아선택인원

			$sql = "SELECT * FROM $GUESTROOM_RESERVATION_VIEW_TB
								 WHERE pension_user_id = '$session_userid'
								 AND user_id = '$session_id_client'
								 AND room_code = '$guestroom_code'";
				$result = sql_query($sql);
				$num_rows = mysqli_num_rows($result);

				if(!$num_rows){ //view에값이 없다면...
					  echo "
					   <script>alert('객실이 선택되지않았습니다. 다시 시도해주십시요.');</script>
					   <script>location.replace('./index.php');</script>;
					   ";
					   exit;
				}
				else{
								while ($rows = sql_fetch_array($result)) {
										$sql = "INSERT INTO $GUESTROOM_RESERVATION_CART_TB
													(pension_user_id,reserve_code,room_code, room_name,reception_date
													,reserve_date,user_personnel,user_personnel_child,user_personnel_max,user_personnel_standard
													,user_id,room_fee	,extra_charge)
													VALUES
													('$session_userid','$guestroom_reserve_code','$rows[room_code]','$rows[room_name]','$rows[reception_date]'
													,'$rows[reserve_date]','$adult_persion','$personnel_child','$personnel_max','$personnel_standard'
													,'$session_id_client','$rows[room_fee]','$guestroom_add_fee')";
													// echo "
													// sql : $sql <br>
													// ";
													 sql_query($sql);
									}
					} //for
			}

	}
		 $sql = "SELECT room_code,reserve_code FROM $GUESTROOM_RESERVATION_CART_TB
						WHERE pension_user_id = '$session_userid'
						AND user_id = '$session_id_client'
					 ";
		 $result = sql_query($sql);
		 $room_code_array = array();
		while ($rows = sql_fetch_array($result)){
		 $room_code_array[] = $rows['room_code'];
		 $guestroom_reserve_code = $rows['reserve_code'];
	  }

		$room_code_array_unique = array_unique($room_code_array);
		$room_code_array_unique = array_values($room_code_array_unique);
		$room_code_array_size = count($room_code_array_unique);
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<!-- <form name="forderform" id= "forderform" method="post" action="client_reserve_write_action.php" enctype="multipart/form-data"> -->
            <form name="forderform" id="forderform" method="post" action="client_reserve_write_action.php" autocomplete="off">

						<div class="box_title first">
							<h2 class="title">직접등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<? for($i = '0'; $i < $room_code_array_size; $i++){
	                $guestroom_code = $room_code_array_unique[$i];

									$sql = "SELECT * FROM $GUESTROOM_RESERVATION_CART_TB
													WHERE pension_user_id = '$session_userid'
													AND user_id = '$session_id_client'
													AND room_code = '$guestroom_code'
	                        ORDER BY reserve_date ASC";
									$result = sql_query($sql);
									$guestroom_reserve_date = "";
									$guestroom_fee_hap = "";
									$add_fee = "";
									while($rows = sql_fetch_array($result)){
										$guestroom_name = $rows['room_name'];
										$personnel_adult = $rows['user_personnel'];
										$personnel_child = $rows['user_personnel_child'];
										$guestroom_fee_hap += $rows['room_fee'];
										$guestroom_reserve_date .= $rows['reserve_date']." (1박) <br>";
										$total_persion = $personnel_adult + $personnel_child;
										$add_person = $total_persion - $rows['user_personnel_standard'];
										if($add_person > '0'){
											$add_fee += $add_person * $rows['extra_charge'];
										}
										$room_total_fee = $guestroom_fee_hap + $add_fee;
									}
								?>
								<tr>
									<th scope="row">객실이름</th>
									<td>
										<?=$guestroom_name?>
									</td>
								</tr>
								<tr>
									<th scope="row">예약일자</th>
									<td>
										<?=$guestroom_reserve_date?>
									</td>
								</tr>
								<tr>
									<th scope="row">인원</th>
									<td>
										총 <?=$total_persion?>명(성인 <?=$personnel_adult?>명 / 소아 <?=$personnel_child?>명)
									</td>
								</tr>

								<tr>
									<th scope="row">금액</th>
									<td>
										객실금액 : <?=number_format($guestroom_fee_hap)?>원 + 인원 추가 금액 : <?=number_format($add_fee)?>원
									</td>
								</tr>
								<tr>
									<th scope="row">합계금액</th>
									<td>
										<?=number_format($room_total_fee)?>원
									</td>
								</tr>
								<tr>
									<td scope="row"></th>
									<td>

									</td>
								</tr>
              <?
								$all_total_room_fee += $guestroom_fee_hap;
								$all_total_add_fee += $add_fee;
								$all_total_fee += $room_total_fee;

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
						<input type="hidden" name="od_name"    value="김유혁">
						<input type="hidden" name="od_email"     value="somang73@naver.com">
						<input type="hidden" name="od_tel"     value="01047126104">
						<input type="hidden" name="od_hp"     value="01047126104">
						<input type="hidden" name="od_b_name"     value="김유혁">
						<input type="hidden" name="od_b_tel"     value="01047126104">
						<input type="hidden" name="od_b_hp"     value="01047126104">
						<input type="hidden" name="od_email"     value="somang73@naver.com">
						<input type="hidden" name="od_b_zip"     value="01006">
						<input type="hidden" name="od_b_addr1"     value="서울특별시 강북구 삼양로 577-10">
						<input type="hidden" name="od_b_addr2"     value="401호">

						<?php
						// 결제대행사별 코드 include (결제대행사 정보 필드)
						require_once(G5_PENSION_PATH.'/'.$default['de_pg_service'].'/orderform.2.php');

						if($is_kakaopay_use) {
							 require_once(G5_SHOP_PATH.'/kakaopay/orderform.2.php');
						}
						?>
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
							<span class="box_btn blue"><input type="button" id="display_pay_button" value="예약"></span>

              <!-- <div id="display_pay_button" class="btn_confirm">
                  <input type="button" value="주문하기"  class="btn_submit">
                  <a href="javascript:history.go(-1);" class="btn01">취소</a>
              </div> -->
              <div id="display_pay_process" style="display:none">
                  <img src="<?php echo G5_URL; ?>/shop/img/loading.gif" alt="">
                  <span>주문완료 중입니다. 잠시만 기다려 주십시오.</span>
              </div>

						</div>
						<?php
		        // 결제대행사별 코드 include (주문버튼)
		        // require_once(G5_PENSION_PATH.'/'.$default['de_pg_service'].'/orderform.3.php');
            //
		        // if($is_kakaopay_use) {
		        //     require_once(G5_SHOP_PATH.'/kakaopay/orderform.3.php');
		        // }
		        ?>

		        <?php
		        if ($default['de_escrow_use']) {
		            // 결제대행사별 코드 include (에스크로 안내)
		            require_once(G5_PENSION_PATH.'/'.$default['de_pg_service'].'/orderform.4.php');
		        }
		        ?>
					</form>
				</article>
			</section>
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
		$('#display_pay_button').click(function(){
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
						// }

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
														 var result = confirm("예약등록을 완료하였습니다.\n\n 예약현황리스트로 이동하시겠습니까?");
														 if(result ){ //확인 클릭 시
															 location.href = "./reservation_calendar_finish.php?top_menu_id=4001&left_menu_id=007&guestroom_reserve_code="+guestroom_reserve_code;
														 }
												 }else if(result == 'overlap'){ //중복예약
													 alert('이미 예약된 정보가 있습니다.');
												 }else{
													 alert('처리에러.');
												 }
											 }
										 });
							}
						}else{
							var f = document.forderform;
							f.site_cd.value = f.def_site_cd.value;
							f.payco_direct.value = "";
							var settle_method ="신용카드";
							// alert(f.site_cd.value);
							switch(settle_method)
							{
									case "계좌이체":
											f.pay_method.value   = "010000000000";
											break;
									case "가상계좌":
											f.pay_method.value   = "001000000000";
											break;
									case "휴대폰":
											f.pay_method.value   = "000010000000";
											break;
									case "신용카드":
											f.pay_method.value   = "100000000000";
											break;
									case "간편결제":
											<?php if($default['de_card_test']) { ?>
											f.site_cd.value      = "S6729";
											<?php } ?>
											f.pay_method.value   = "100000000000";
											f.payco_direct.value = "Y";
											break;
									default:
											f.pay_method.value   = "무통장";
											break;
							}

							f.buyr_name.value = f.od_name.value;
							f.buyr_mail.value = f.od_email.value;
							f.buyr_tel1.value = f.od_tel.value;
							f.buyr_tel2.value = f.od_hp.value;
							f.rcvr_name.value = f.od_b_name.value;
							f.rcvr_tel1.value = f.od_b_tel.value;
							f.rcvr_tel2.value = f.od_b_hp.value;
							f.rcvr_mail.value = f.od_email.value;
							f.rcvr_zipx.value = f.od_b_zip.value;
							f.rcvr_add1.value = f.od_b_addr1.value;
							f.rcvr_add2.value = f.od_b_addr2.value;

							if(f.pay_method.value != "무통장") {
									jsf__pay( f );
							} else {
									f.submit();
							}
						}
});
</script>
