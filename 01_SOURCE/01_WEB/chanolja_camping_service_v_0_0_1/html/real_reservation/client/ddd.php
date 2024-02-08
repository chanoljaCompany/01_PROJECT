<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
    font.holy {font-family: tahoma;font-size: 20px;color: #FF6C21;}
    font.blue {font-family: tahoma;font-size: 20px;color: #0000FF;}
    font.black {font-family: tahoma;font-size: 20px;color: #000000;}
    .modal {
        text-align: center;
}
@media screen and (min-width: 768px) {
        .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
        }
}
  body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
  </style>
<body id="manage">
<div id="admin_content">
	<div id="container">
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
								<h2 class="title">선택정보</h2>
							</div>
							<table class="tbl_row multi_shop">
								<colgroup>
									<col style="width:10%">
									<col style="width:40%">
									<col style="width:10%">
									<col style="width:40%">
								</colgroup>
								<tr>
									<th scope="row">요금합계</th>
									<td colspan="3">
										객실금액 : <span id="get_guestroom_fee_total_area"><?=number_format($get_guestroom_fee_total)?></span>
										<br>인원추가금액 : <span id="addfee_area_total">0</span>
										<br>
										총 합계 금액 :
										<span id="total_fee_area"><?=number_format($get_guestroom_fee_total)?></span>
									</td>
								</tr>
							</table>
						<div class="box_title first">
							<h2 class="title">예약확인</h2>
						</div>
						<table class="tbl_row multi_shop">
							<colgroup>
								<col style="width:10%">
								<col style="width:40%">
								<col style="width:10%">
								<col style="width:40%">
							</colgroup>
              <?
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
              ?>
								<tr>
									<th scope="row">객실이름</th>
									<td>
										<?=$room_info_array[0]['guestroom_name']?>
									</td>
									<th scope="row">예약일자</th>
									<td>
										<?=$reserve_date?>
									</td>
								</tr>
								<tr>
									<th scope="row">객실요금</th>
								<td>
										<?=number_format($get_guestroom_fee)?>
									</td>
									<th scope="row">인원</th>
								<td>
									<!-- <input type="hidden" name="guestroom_extra_charge_<?=$i?>" id="guestroom_extra_charge_<?=$i?>" value="<?=$room_info_array[0]['guestroom_extra_charge']?>"> -->
										성인 : <select id='personnel' name='personnel[]' class='personnel'>
											<? for ($p = 1 ; $p <= $room_info_array[0]['guestroom_max_personnel'] ; $p++){
												  if($room_info_array['0']['guestroom_personnel'] == $p){
														$sel_str = "(기준인원)";
													}else{
														$sel_str = "";
													}
												?>
												<option <? if($room_info_array['0']['guestroom_personnel'] == $p){?> selected <?}?> value='<?=$p?>:<?=$room_info_array[0]['guestroom_personnel']?>:<?=$room_info_array[0]['guestroom_max_personnel']?>:<?=$room_info_array[0]['guestroom_extra_charge']?>'><?=$p?>명<?=$sel_str?></option>
											<?}?>
										</select>
										<!-- <input type="hidden" name="addfee_area_<?=$i?>" id="addfee_area_<?=$i?>"> -->
										<span id="addfee_area_<?=$i?>" style="display:none"></span><br><br>
										유아 : <select id='personnel_child' name='personnel_child[]' class='personnel_child'>
											<? for ($p = 0 ; $p <= $room_info_array[0]['guestroom_max_personnel'] ; $p++){?>
												 <option value='<?=$p?>'><?=$p?>명</option>
											<?}?>
										</select>
										<!-- <input type="hidden" name="addfee_area_child_<?=$i?>" id="addfee_area_child_<?=$i?>"> -->
										<span id="addfee_area_child_<?=$i?>" style="display:none"></span>
										<br>

									</td>
								</tr>
							<tr>
								<td scope="row"></th>
							<td>
								</td>
							</tr>
						</tr>
              <? $get_guestroom_fee_total += $get_guestroom_fee;}?>
							<input type="hidden" name="get_guestroom_fee_total" id="get_guestroom_fee_total" value="<?=$get_guestroom_fee_total?>">
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

	</div>
</div>
<script>
var get_guestroom_fee_total = 0;
var addfee_area_child = 0;
$(document).ready(function() {
	 var get_guestroom_fee_total = $("#get_guestroom_fee_total").val();
	 $("#get_guestroom_fee_total_area").text(comma(get_guestroom_fee_total));
});
	$('#client_reserve_input').click(function(){
			var sh = document.client_reserve_input;
			sh.action = "reservation_calendar_client_cart.php";
			sh.submit();
		});

					$(document).on('change','.personnel', function(i, e) {
					// var sel = $('select[name="personnel[]"]');
					var selbox_index = $('select[name="personnel[]"]').index(this);
					adult_room_fee_calc(selbox_index);

					});

					function adult_room_fee_calc(selbox_index){
						var personnel_child = 0;
						var selbox_index_size = $('select[name="personnel[]"]').length;
						var personnel = $('select[name="personnel[]"]').eq(selbox_index).val();
						var personnel_array = personnel.split(':');
						var seleval = personnel_array['0'];//선택인원
						var standval = personnel_array['1'];//기준인원
						var maxval = personnel_array['2'];//최대인원
						var guestroom_extra_charge = personnel_array['3'];//추가요금
						personnel_child = $('select[name="personnel_child[]"]').eq(selbox_index).val();
						// alert(' personnel_child ' + personnel_child);
						var add_total_person = parseInt(seleval)+parseInt(personnel_child);
						// alert('add_total_person ' + add_total_person);
						if(add_total_person <= maxval){
			            var differval = parseInt(seleval) + parseInt(personnel_child) - parseInt(standval);
									// alert(' seleval ' + seleval + ' personnel_child ' + personnel_child + ' standval ' + standval);
									// var differval = parseInt(seleval) - parseInt(standval);
									if(differval > '0') { //인원초과시 추가요금..
										  var add_adult = parseInt(seleval) - parseInt(standval);
											if(add_adult > '0'){
												var addfeeval_adult = parseInt(add_adult)*parseInt(guestroom_extra_charge); //추가금액
												$("#addfee_area_"+selbox_index).text(addfeeval_adult); //추가금액표시
												var addfeeval_child = parseInt(personnel_child)*parseInt(guestroom_extra_charge); //추가금액
												$("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
											}else{
												$("#addfee_area_"+selbox_index).text(""); //추가금액표시
												var add_child = parseInt(seleval) + parseInt(personnel_child) - parseInt(standval);
												var addfeeval_child = parseInt(add_child)*parseInt(guestroom_extra_charge); //추가금액
												$("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
											}
										}
										else{
											// var addfeeval = parseInt(removeComma($("#addfee_area_"+selbox_index).text()));
											// var addfee_area_total = parseInt(removeComma($("#addfee_area_total").text()));
											// var changetotlafeeval = parseInt(addfee_area_total)-parseInt(addfeeval);
											$("#addfee_area_"+selbox_index).text("");
											$("#addfee_area_child_"+selbox_index).text("");
										}
									     room_fee_calc(selbox_index_size);
							}
							else{
								alert('최대 '+maxval+'명까지 가능합니다.');
								var eqindex = parseInt(maxval) - parseInt(personnel_child);

                var abcd = $('select[name="personnel[]"]').eq(selbox_index);
                var efgh = abcd.eq(eqindex).val()
                alert(' abcd ' + abcd + ' efgh ' + JSON.stringify(efgh));

								// $('select[name="personnel[]"] option:eq('+eqindex+')').eq(selbox_index).val(eqindex);
                $('select[name="personnel[]"]').eq(selbox_index).val(eqindex);
                // room_fee_calc(eqindex);
							}
					}
					$(document).on('change','.personnel_child', function(i, e) {
						  var personnel_child = 0;
							var differval_adult = 0;
							var selbox_index_child = $('select[name="personnel_child[]"]').index(this);
							var selbox_index_child_size = $('select[name="personnel_child[]"]').length;
							personnel_child = $('select[name="personnel_child[]"]').eq(selbox_index_child).val();
							// alert('personnel_child ' + personnel_child);
							var personnel = $('select[name="personnel[]"]').eq(selbox_index_child).val();
							var personnel_array = personnel.split(':');
							var seleval = personnel_array['0'];//성인선택인원
							var standval = personnel_array['1'];//기준인원
							var maxval = personnel_array['2'];//최대인원
							var guestroom_extra_charge = personnel_array['3'];//추가요금

							var add_total_person = parseInt(seleval)+parseInt(personnel_child);
							// alert('add_total_person ' + add_total_person);
							if(add_total_person <= maxval){
										differval_adult = seleval - standval;
										var addfeeval = parseInt(parseInt(differval_adult)+parseInt(personnel_child))*parseInt(guestroom_extra_charge); //추가금액
										if(differval_adult > '0'){
											var addfeeval = parseInt(personnel_child)*parseInt(guestroom_extra_charge); //추가금액
											$("#addfee_area_child_"+selbox_index_child).text(addfeeval); //추가금액표시
										}
										else{
											// var addfeeval = parseInt(parseInt(differval_adult)+parseInt(personnel_child))*parseInt(guestroom_extra_charge); //추가금액
											if(addfeeval > '0'){
												$("#addfee_area_child_"+selbox_index_child).text(addfeeval); //추가금액표시
											}else{
												$("#addfee_area_child_"+selbox_index_child).text(""); //추가금액표시
											}
										}
										room_fee_calc(selbox_index_child_size);
							}
							else{
									alert('최대 '+maxval+'명까지 가능합니다.');
									var eqindex = parseInt(maxval) - parseInt(seleval);
                  // alert(' eqindex ' + eqindex + ' selbox_index_child ' + selbox_index_child);
                  //
                  $('select[name="personnel_child[]"]').each(function(i, selected){
                            var aa = $('select[name="personnel_child[]"]')eq(selbox_index_child).val()
                            alert('a');
                  });
                   // $('select[name="personnel_child[]"] option:eq(2)').attr("selected",true).index(2);
                   $('select[name="personnel_child[]"').eq(selbox_index_child).val('4');
                  // $('select[name="personnel_child[]"]').eq(selbox_index_child).val(eqindex);
                  // $('select[name="personnel_child[]"] option:eq('+eqindex+')')(selbox_index_child).prop("selected","selected");



                  // room_fee_calc(eqindex);
									// alert(' eqindex ' + eqindex + ' selbox_index_child ' + selbox_index_child);
									// $('select[name="personnel_child[]"] option:eq('+eqindex+')').eq(selbox_index_child).attr("selected",true);
									// $('select[name="personnel_child[]"] option:eq('+eqindex+')').eq(selbox_index_child).prop("selected","selected");
                  // $('select[name="personnel_child[]"] option:eq('+eqindex+')').index.prop("selected","selected");

							}
							// var differval = parseInt(seleval)+parseInt(personnel_child) - parseInt(standval);
							// alert(' differval ' + differval);


					});


					function room_fee_calc(selbox_index_size){
						var step;
						var addfee_area = 0;
						var total_fee = 0;
						var addfeeval = 0;
						var addfeeval_child = 0;
						var addfee_area_child = 0;
						get_guestroom_fee_total = $("#get_guestroom_fee_total").val();//객실금액
						for (step = 0; step < selbox_index_size; step++) {
							addfeeval = $("#addfee_area_"+step).text();
							addfeeval_child = $("#addfee_area_child_"+step).text();

							if(addfeeval){
							  addfeeval = parseInt(removeComma(addfeeval));
								addfee_area += addfeeval	;
							}
							if(addfeeval_child){
							  addfeeval_child = parseInt(removeComma(addfeeval_child));
								addfee_area_child += addfeeval_child	;
							}
						}

						total_fee = parseInt(get_guestroom_fee_total) + parseInt(addfee_area)+ parseInt(addfee_area_child);
						$("#addfee_area_total").text(comma(addfee_area+addfee_area_child));
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
