<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";
$guestroom_code_arr = $_POST['guestroom_code'];
$set_guestroom_code_arr = $guestroom_code_arr;
$set_guestroom_code_arr = urlencode(serialize($guestroom_code_arr));


// print_r($guestroom_code_arr);
$mangement_array = mangement_array(); //pension_management_reserve 예약 기본 정보 설정
// if($mangement_array['peak_season_whether'] == 'Y'){
//     $peak_data_array = peak_data_array($year,$month,"");
// }
// if($mangement_array['semi_peak_season_whether'] == 'Y'){
//     $semi_peak_data_array = peak_data_array($year,$month,"semi");
// }
// print_r($mangement_array);
$size = count($guestroom_code_arr);
// view_printr($guestroom_code_arr,'guestroom_code_arr');
?>
<body id="manage">
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<form name="client_reserve_input" method="post" enctype="multipart/form-data">
							<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
							<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
              <input type="hidden" name="division" id="division" value="<?=$division?>">
              <!-- <input type="hidden" name="guestroom_code" id="guestroom_code" value="<?=$guestroom_code?>"> -->
              <input type="hidden" name="val" id="val" value="<?=$val?>">
              <input type="hidden" name="set_guestroom_code_arr"  value="<?=$set_guestroom_code_arr?>">
              <input type="hidden" name="guestroom_reserve_payment_method" id="guestroom_reserve_payment_method" value="">


						<div class="box_title first">
							<h2 class="title">직접등록</h2>
						</div>
						<table class="tbl_row multi_shop">
              <?
              $room_info_array = array();
              for($i = '0'; $i < $size; $i++){
                    // $get_peakday = "0";
                    // $get_semi_peakday = "0";
                    // $yoil = "0";
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
              ?>
							<tr>
								<td>
                  예약일자 : <?=$reserve_date?> <br>
									방이름 : <?=$room_info_array[0]['guestroom_name']?><br>
                  <!-- 성수기여부 :<?=$get_peakday?><br>
                  준성수기여부 :<?=$get_semi_peakday?><br>
                  주말여부 : <?=$get_weekend?><br>
                  공휴일여부 :<?=$get_holiday?><br> -->
                  객실요금 :<?=number_format($get_guestroom_fee)?><br>
                  기준인원 :<?=$room_info_array[0]['guestroom_personnel']?><br>
                  최대인원 :<?=$room_info_array[0]['guestroom_max_personnel']?><br>
                  추가요금 :<?=$room_info_array[0]['guestroom_extra_charge']?><br>
									<div id="addfee_area_<?=$i?>"></div>

									<input type="hidden" name="guestroom_extra_charge_<?=$i?>" id="guestroom_extra_charge_<?=$i?>" value="<?=$room_info_array[0]['guestroom_extra_charge']?>">
									<select id='personnel' name='personnel[]' class='personnel'>
										<? for ($p = 1 ; $p <= $room_info_array[0]['guestroom_max_personnel'] ; $p++){?>
											<option <? if($room_info_array['0']['guestroom_personnel'] == $p){?> selected <?}?> value='<?=$p?>:<?=$room_info_array[0]['guestroom_personnel']?>:<?=$room_info_array[0]['guestroom_max_personnel']?>'><?=$p?>명</option>
										<?}?>
									</select>
								</td>
							</tr>
              <? $get_guestroom_fee_total += $get_guestroom_fee;}?>
              <tr>
								<td>
									<input type="hidden" name="get_guestroom_fee_total" id="get_guestroom_fee_total" value="<?=$get_guestroom_fee_total?>">
									객실금액 : <?=number_format($get_guestroom_fee_total)?>
									<br>인원추가금액 : <span id="addfee_area_total">0</span>
									<br>
									총 합계 금액 :
									<span id="total_fee_area"><?=number_format($get_guestroom_fee_total)?></span>
								</td>
							</tr>

							<!-- <tr>
								<th scope="row">객실 설명</th>
								<td colspan="3">
									<textarea name="guestroom_content" id="guestroom_content" style="width: 100%; height: 412px;"></textarea>
								</td>
							</tr> -->
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="client_reserve_input" value="다음단계"></span>
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
	$('#client_reserve_input').click(function(){
			var sh = document.client_reserve_input;
			sh.action = "reservation_calendar_client_cart.php";
			sh.submit();
		});

var get_guestroom_fee_total = 0;
					$(document).on('change','.personnel', function(i, e) {
					// var sel = $('select[name="personnel[]"]');
					var selbox_index = $('select[name="personnel[]"]').index(this);
					var selbox_index_size = $('select[name="personnel[]"]').length;
					// alert(selbox_index_size.length);
					var personnel = $('select[name="personnel[]"]').eq(selbox_index).val();
					var personnel_array = personnel.split(':');
					var seleval = personnel_array['0'];//선택인원
					var standval = personnel_array['1'];//기준인원
					var maxval = personnel_array['2'];//최대인원
					var guestroom_extra_charge_id = "#guestroom_extra_charge_"+selbox_index;
					get_guestroom_fee_total = $("#get_guestroom_fee_total").val();//객실금액
					var guestroom_extra_charge = $(guestroom_extra_charge_id).val();//추가요금
					var differval = parseInt(seleval) - parseInt(standval);
					if(differval > '0') { //인원초과시 추가요금..
							var addfee_area_total = parseInt(removeComma($("#addfee_area_total").text()));//현재인원추가금액
							var addfeeval = parseInt(differval)*parseInt(guestroom_extra_charge); //추가금액
							var addfee_area_total = parseInt(addfee_area_total)+parseInt(addfeeval);//객실요금+추가금액.
							$("#addfee_area_"+selbox_index).text(addfeeval); //추가금액표시
						}
						else{
							var addfeeval = parseInt(removeComma($("#addfee_area_"+selbox_index).text()));
							var addfee_area_total = parseInt(removeComma($("#addfee_area_total").text()));
							var changetotlafeeval = parseInt(addfee_area_total)-parseInt(addfeeval);
							$("#addfee_area_"+selbox_index).text("");
						}
					     room_fee_calc(selbox_index_size);

					});

					function room_fee_calc(selbox_index_size){
						var step;
						var addfee_area = 0;
						var total_fee = 0
						var addfeeval = 0
						for (step = 0; step < selbox_index_size; step++) {
							addfeeval = $("#addfee_area_"+step).text();
							if(addfeeval){
							  addfeeval = parseInt(removeComma(addfeeval));
								addfee_area += addfeeval	;
							}
						}
						total_fee = parseInt(get_guestroom_fee_total) + parseInt(addfee_area);
						$("#addfee_area_total").text(comma(addfee_area));
						$("#total_fee_area").text(comma(total_fee));
					}

					function removeComma(str)
					{
						n = parseInt(str.replace(/,/g,""));
						return n;
					}

					function comma(num){
				    var len, point, str;
				    num = num + "";
				    point = num.length % 3 ;
				    len = num.length;
				    str = num.substring(0, point);
				    while (point < len) {
				        if (str != "") str += ",";
				        str += num.substring(point, point + 3);
				        point += 3;
				    }
				    return str;
					}
</script>
