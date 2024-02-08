<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$GUESTROOM_RESERVATION_CODE_TB = "guestroom_reservation_code";
$guestroom_reserve_code = $_REQUEST["guestroom_reserve_code"];
if(!$guestroom_reserve_code){ //view에값이 없다면...
    echo "
     <script>alert('예약코드가 없습니다..');</script>
     ";
     exit;
}
$mangement_info_array = mangement_info_array(); //pension_management_reserve 예약 기본 정보 설정
// print_r($mangement_info_array);
//예약내용확인
$sql = "SELECT * FROM $GUESTROOM_RESERVATION_CODE_TB
				WHERE pension_user_id = '$session_userid'
				AND reserve_code = '$guestroom_reserve_code'";
$result = sql_query($sql);
$rows = sql_fetch_array($result);
$tb_reserve_code = $rows['reserve_code'];
// echo "
// sql >>>> $sql <br>
// tb_reserve_code >>> $tb_reserve_code <br>
// ";

$sql = "SELECT B.guestroom_code
        FROM $GUESTROOM_RESERVATION_CODE_TB AS A
        LEFT JOIN $GUESTROOM_RESERVATION_INFO_TB AS B
        ON A.reserve_code = B.guestroom_reserve_code
        WHERE A.reserve_code = '$tb_reserve_code'
        GROUP BY B.guestroom_code
        ";
// echo "
// sql >>> $sql <br>
// ";
$result = sql_query($sql);
$room_code_array = array();
while ($rows = sql_fetch_array($result)){
  $room_code_array[] = $rows['guestroom_code'];
}
  $room_code_array_size = count($room_code_array);
// $sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB
// 				WHERE pension_user_id = '$session_userid'
// 				AND guestroom_reserve_code = '$guestroom_reserve_code'";
// $result = sql_query($sql);
// echo "
// room_code_array_size >>>> $room_code_array_size <br>
// ";
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
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
							<? for($i = '0'; $i < $room_code_array_size; $i++){
									$sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB
													WHERE pension_user_id = '$session_userid'
													AND guestroom_reserve_code = '$guestroom_reserve_code'
													AND guestroom_code = '$room_code_array[$i]'
	                        ORDER BY guestroom_reserve_date ASC";
									$result = sql_query($sql);
									$guestroom_reserve_date = "";
									$guestroom_fee_hap = "";
									$add_fee = "";
									while($rows = sql_fetch_array($result)){
										$guestroom_name = $rows['guestroom_name'];
										$personnel_adult = $rows['guestroom_reserve_user_personnel'];
										$personnel_child = $rows['guestroom_reserve_user_personnel_child'];
										$guestroom_fee_hap += $rows['guestroom_fee'];
										$guestroom_reserve_date .= $rows['guestroom_reserve_date']." (1박) <br>";
										$total_persion = $personnel_adult + $personnel_child;
										$add_person = $total_persion - $rows['user_personnel_standard'];
                    $guestroom_reserve_user_name = $rows['guestroom_reserve_user_name'];
                    $guestroom_reserve_user_phone	 = $rows['guestroom_reserve_user_phone'];
                    $guestroom_arrive_date	 = $rows['guestroom_arrive_date'];
                    $guestroom_reserve_user_request		 = $rows['guestroom_reserve_user_request'];
                    $guestroom_reserve_payment_method	 = $rows['guestroom_reserve_payment_method'];
                    if($guestroom_reserve_payment_method == $PATYMENT_MEHTOD_B){
                      $guestroom_reserve_payment_method_str = "무통장입금";
                    }
                    else if($guestroom_reserve_payment_method == $PATYMENT_MEHTOD_C){
                      $guestroom_reserve_payment_method_str = "신용카드결제";
                    }

                    if($rows['guestroom_reserve_payment_status'] == '3'){
                      $guestroom_reserve_payment_status_str = $PAYMENT_COMPLETE_STR;
                    }else if($rows['guestroom_reserve_payment_status'] == '4'){
                      $guestroom_reserve_payment_status_str = $PAYMENT_WAITING_STR;
                    }else{
                      $guestroom_reserve_payment_status_str = $PAYMENT_WAITING_STR;
                    }

										if($add_person > '0'){
											$add_fee += $add_person * $rows['guestroom_add_fee'];
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
						<div class="clear"></div>
						<div class="box_title first">
							<h2 class="title">결제정보</h2>
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
									<?=$guestroom_reserve_user_name?>
								</td>
							</tr>
							<tr>
								<th scope="row">휴대폰번호</th>
								<td>
										<?=$guestroom_reserve_user_phone?>
								</td>
							</tr>
							<tr>
								<th scope="row">도착예정시간</th>
								<td>
                  <?=$guestroom_arrive_date?>:00시
								</td>
							</tr>
							<tr>
								<th scope="row">요청사항</th>
								<td>
									<?=$guestroom_reserve_user_request?>
								</td>
							</tr>
              <tr>
                <th scope="row">결제상태</th>
                <td>
                  <?=$guestroom_reserve_payment_status_str?>
                </td>
              </tr>
							<tr>
								<th scope="row">결제정보</th>
								<td>
                  <?=$guestroom_reserve_payment_method_str?>
                  <? if($guestroom_reserve_payment_method == $PATYMENT_MEHTOD_B){?>
                  (<?=$mangement_info_array['account_name']?><?=$mangement_info_array['account_number']?><?=$mangement_info_array['account_holder']?>)
                  <?}?>
								</td>
							</tr>
							<tr id="bank_account">
								<td scope="row"></th>
								<td>
                 <?=$row['account_name']?><?=$row['account_number']?><?=$row['account_holder']?>
								</td>
							</tr>
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="client_reserve_finish" value="확인"></span>
						</div>
					</form>
				</article>
			</section>
	</div>
</div>
<script>
// $(document).ready(function() {
// 			$('#bank_account').attr('style', "display:none;");
// });
// $("input:radio[name=guestroom_paymthod]").click(function(){
// 	if($("input[name=guestroom_paymthod]:checked").val() == "1"){
// 			 $('#bank_account').attr('style', "display:;");
// 	}else if($("input[name=guestroom_paymthod]:checked").val() == "2"){
// 				$('#bank_account').attr('style', "display:none;");
// 	}
// });
		$('#client_reserve_finish').click(function(){
      location.href = "./";
    });
// 						var depositor;
// 						var guestroom_reserve_code = $('#guestroom_reserve_code').val();
// 						var guestroom_reserve_user_name = $('#guestroom_reserve_user_name').val();
// 						var guestroom_reserve_user_phone = $('#guestroom_reserve_user_phone').val();
// 						var guestroom_arrive_date = $('#guestroom_arrive_date').val();
// 						var guestroom_reserve_user_request = $('#guestroom_reserve_user_request').val();
// 						var guestroom_paymthod_checked =$('input:radio[name=guestroom_paymthod]').is(':checked');
// 						var guestroom_paymthod = $(':radio[name="guestroom_paymthod"]:checked').val();
//
// 						if(guestroom_reserve_user_name == '') { warning('예약자명을 입력하세요','guestroom_reserve_user_name'); return false; }
// 						if(guestroom_reserve_user_phone == '') { warning('휴대폰번호를 입력하세요','guestroom_reserve_user_phone');	return false; }
// 						if(guestroom_paymthod_checked == false) { warning('결제수단을 선택하세요','guestroom_paymthod_checked'); return false; }
// 						if(guestroom_paymthod == '1'){ //무통장
// 							depositor = $('#depositor').val();
// 							if(depositor == '') { warning('입금자명을 입력하세요','depositor'); return false; }
// 						}
//
// 						var result = confirm("예약 하시겠습니까?");
// 					if(result ){ //확인 클릭 시
// 								$.ajax({
// 									type: 'GET',
// 									url:"client_reserve_write_action.php",
// 									data: {
// 												 guestroom_reserve_code : guestroom_reserve_code,
// 												 guestroom_reserve_user_name : guestroom_reserve_user_name,
// 												 guestroom_reserve_user_phone : guestroom_reserve_user_phone,
// 												 guestroom_arrive_date : guestroom_arrive_date,
// 												 guestroom_reserve_user_request : guestroom_reserve_user_request,
// 												 guestroom_paymthod : guestroom_paymthod,
// 												 depositor : depositor
// 											 },
// 									cache:false,
// 										 success:function(result){
// 													// alert(result);
// 												if(result == 'ok'){
// 														 var result = confirm("예약등록을 완료하였습니다.\n\n 예약현황리스트로 이동하시겠습니까?");
// 														 if(result ){ //확인 클릭 시
// 															 location.href = "./reservation_calendar_finish.php?top_menu_id=4001&left_menu_id=007"
// 														 }
// 												 }else if(result == 'overlap'){ //중복예약
// 													 alert('이미 예약된 정보가 있습니다.');
// 												 }else{
// 													 alert('처리에러.');
// 												 }
// 											 }
// 										 });
// 							}
// });
</script>
