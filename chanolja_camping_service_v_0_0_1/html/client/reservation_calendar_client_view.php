<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";
$GUESTROOM_RESERVATION_VIEW_TB = "guestroom_reservation_view";
$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
$guestroom_code_arr = $_POST['guestroom_code'];
// print_r($guestroom_code_arr);
if(!$guestroom_code_arr){
  echo "
   <script>alert('객실이 선택되지않았습니다. 다시 시도해주십시요.');</script>
   <script>location.replace('./index.php');</script>;
   ";
   exit;
}
$set_guestroom_code_arr = $guestroom_code_arr;
$set_guestroom_code_arr = urlencode(serialize($guestroom_code_arr));
$mangement_array = mangement_array(); //pension_management_reserve 예약 기본 정보 설정
// $sql = "DELETE FROM $GUESTROOM_RESERVATION_VIEW_TB
//         WHERE pension_user_id = '$session_userid'
//         AND user_id	= '$session_id_client'
//         ";
// sql_query($sql);
// echo "session_id_client >>> $session_id_client <br>";
data_init($GUESTROOM_RESERVATION_CART_TB,$session_id_client); //cart테이블 기존내용 삭제.
data_init($GUESTROOM_RESERVATION_VIEW_TB,$session_id_client); //view테이블 기존내용 삭제.
$size = count($guestroom_code_arr);
$room_code_array = array();
for($i = '0'; $i < $size; $i++) {
  $checkValue = $guestroom_code_arr[$i];
  $checkValue_explode = explode(":",$checkValue);
  $guestroom_code = $checkValue_explode['1'];

  $reserve_date = $checkValue_explode['0'];
  $result_data_exp = explode("-",$reserve_date);
  $room_info_array = room_info_array($guestroom_code); // guestroom_info 객실정보
  // view_printr($room_info_array,'room_info_array');
  $guestroom_name = $room_info_array[0]['guestroom_name'];
  $guestroom_personnel = $room_info_array[0]['guestroom_personnel'];
  $guestroom_max_personnel = $room_info_array[0]['guestroom_max_personnel'];
  $guestroom_extra_charge = $room_info_array[0]['guestroom_extra_charge'];


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

    $sql = "INSERT INTO $GUESTROOM_RESERVATION_VIEW_TB
          (pension_user_id,room_code, room_name,reception_date,reserve_date
          ,personnel_standard,personnel_max,extra_charge,user_id,room_fee)
          VALUES
          ('$session_userid','$guestroom_code','$guestroom_name' ,'$TODATE_DASH','$reserve_date'
           ,'$guestroom_personnel','$guestroom_max_personnel','$guestroom_extra_charge','$session_id_client','$get_guestroom_fee')";
          sql_query($sql);
          $room_code_array[] = $guestroom_code;
}
$room_code_array_unique = array_unique($room_code_array);
$room_code_array_unique = array_values($room_code_array_unique);

$room_code_array_size = count($room_code_array_unique);
// view_printr($room_code_array_unique,'room_code_array_unique');
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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
            for($i = '0'; $i < $room_code_array_size; $i++){
                $guestroom_code = $room_code_array_unique[$i];
                $sql = "SELECT *
                        FROM $GUESTROOM_RESERVATION_VIEW_TB
                        WHERE user_id = '$session_id_client'
                        AND room_code = '$guestroom_code'
                        ORDER BY reserve_date ASC";
                $result = sql_query($sql);
//                 echo "
// sql >>> $sql <br>
//                 ";
                $guestroom_reserve_date = "";
                $guestroom_fee_hap = "";
                $rent_period = "";
                while($rows = sql_fetch_array($result)){
                  $guestroom_name = $rows['room_name'];
                  $guestroom_personnel = $rows['personnel_standard'];
                  $guestroom_max_personnel = $rows['personnel_max'];
                  $guestroom_extra_charge = $rows['extra_charge'];
                  $guestroom_fee_hap += $rows['room_fee'];
                  $guestroom_reserve_date .= $rows['reserve_date']." (1박) <br>";
                  $rent_period++;
                }
              ?>
								<tr>
									<th scope="row">객실이름</th>
									<td>
										<?=$guestroom_name?><?=$co?>
									</td>
									<th scope="row">예약일자</th>
									<td>
										<?=$guestroom_reserve_date?><br>
									</td>
								</tr>
								<tr>
									<th scope="row">객실요금</th>
								<td>
										<?=number_format($guestroom_fee_hap)?>
									</td>
									<th scope="row">인원</th>
								<td>
										성인 : <select id='personnel_<?=$i?>' name='personnel[]' class='personnel' onchange="add_adult_func('<?=$i?>')">
											<? for ($p = 1 ; $p <= $guestroom_max_personnel ; $p++){
												  if($guestroom_personnel == $p){
														$sel_str = "(기준인원)";
													}else{
														$sel_str = "";
													}
												?>
												<option <? if($guestroom_personnel == $p){?> selected <?}?> value='<?=$p?>:<?=$guestroom_personnel?>:<?=$guestroom_max_personnel?>:<?=$guestroom_extra_charge?>:<?=$guestroom_code?>'><?=$p?>명<?=$sel_str?></option>
											<?}?>
										</select>
										<span id="addfee_area_<?=$i?>"></span><br><br>
										유아 : <select id='personnel_child_<?=$i?>' name='personnel_child[]' class='personnel_child' onchange="add_child_func('<?=$i?>')">
											<? for ($p = 0 ; $p <= $room_info_array[0]['guestroom_max_personnel'] ; $p++){?>
												 <option value='<?=$p?>'><?=$p?>명</option>
											<?}?>
										</select>
										<span id="addfee_area_child_<?=$i?>"></span>
                    <input type="hidden" name="" id="rent_period_<?=$i?>" value="<?=$rent_period?>">
										<br>

									</td>
								</tr>
							<tr>
								<td scope="row"></th>
							<td>
								</td>
							</tr>
						</tr>
              <?
              $get_guestroom_fee_total += $guestroom_fee_hap;
            }
            ?>
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
   // alert('get_guestroom_fee_total' + get_guestroom_fee_total);
	 $("#get_guestroom_fee_total_area").text(comma(get_guestroom_fee_total));
});
	$('#client_reserve_input').click(function(){
			var sh = document.client_reserve_input;
			sh.action = "reservation_calendar_client_cart.php";
			sh.submit();
		});

function add_adult_func(selbox_index){
    var selbox_index_size = $('select[name="personnel[]"]').length;
    var selboxid = "#personnel_"+selbox_index; //성인셀렉트박스ID
    var selboxid_child = "#personnel_child_"+selbox_index;//유아셀렉트박스ID
    var selboxVal = $(selboxid + " option:selected").val();//성인 인원수
    var selboxVal_array = selboxVal.split(':');
    var seleval = selboxVal_array['0'];//선택인원
    var standval = selboxVal_array['1'];//기준인원
    var maxval = selboxVal_array['2'];//최대인원
    var rent_period_id = "#rent_period_"+selbox_index;
    var rent_period = $(rent_period_id).val();
    var guestroom_extra_charge = selboxVal_array['3'];//추가요금
    var personnel_child = $(selboxid_child + " option:selected").val();//유아 인원수
    var add_total_person = parseInt(seleval)+parseInt(personnel_child);//총인원
	  if(add_total_person <= maxval){
      var differval = parseInt(add_total_person) - parseInt(standval); //총인원 - 기준인원
      if(differval > '0') { //인원초과시 추가요금..
          var add_adult = parseInt(seleval) - parseInt(standval);
          if(add_adult > '0'){
            var addfeeval_adult = (parseInt(add_adult)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
            $("#addfee_area_"+selbox_index).text(addfeeval_adult); //추가금액표시
            var addfeeval_child = (parseInt(personnel_child)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
            $("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
          }else{
            $("#addfee_area_"+selbox_index).text(""); //추가금액표시
            var add_child = (parseInt(seleval) + parseInt(personnel_child) - parseInt(standval))*parseInt(rent_period);
            var addfeeval_child = (parseInt(add_child)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
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
      	var eqindex = parseInt(maxval-1) - parseInt(personnel_child);
      // alert( ' maxval ' + maxval + ' personnel_child ' + personnel_child + ' selboxid ' + selboxid);
      alert('최대 '+maxval+'명까지 가능합니다.' + eqindex);
      $(selboxid+' option:eq('+eqindex+')').prop("selected","selected");

      var personnel_child = $(selboxid_child + " option:selected").val();//유아 인원수
      var selboxVal = $(selboxid + " option:selected").val();//성인 인원수
      var selboxVal_array = selboxVal.split(':');
      var seleval = selboxVal_array['0'];//선택인원
      var standval = selboxVal_array['1'];//기준인원
      var maxval = selboxVal_array['2'];//최대인원
      var guestroom_extra_charge = selboxVal_array['3'];//추가요금

      var add_adult = parseInt(seleval) - parseInt(standval);
        var addfeeval_adult = (parseInt(add_adult)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
        // alert('eqindex ' + eqindex + ' guestroom_extra_charge ' + guestroom_extra_charge + ' addfeeval_adult ' + addfeeval_adult);
      if(add_adult > '0'){
        $("#addfee_area_"+selbox_index).text(addfeeval_adult); //추가금액표시
        var addfeeval_adult = "0";
      }
      var addfeeval_child = ((parseInt(personnel_child)*parseInt(guestroom_extra_charge))+parseInt(addfeeval_adult))*parseInt(rent_period); //추가금액
      alert('personnel_child ' + personnel_child + 'guestroom_extra_charge ' + guestroom_extra_charge + 'addfeeval_adult ' + addfeeval_adult);
      $("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
      room_fee_calc(selbox_index_size);
    }
}


function add_child_func(selbox_index){
    var selbox_index_child_size = $('select[name="personnel_child[]"]').length;
    var selboxid = "#personnel_"+selbox_index; //성인셀렉트박스ID
    var selboxid_child = "#personnel_child_"+selbox_index;//유아셀렉트박스ID
    var personnel_child = $(selboxid_child + " option:selected").val();//유아 인원수
    var selboxVal = $(selboxid + " option:selected").val();//성인 인원수
    var selboxVal_array = selboxVal.split(':');
    var seleval = selboxVal_array['0'];//선택인원
    var standval = selboxVal_array['1'];//기준인원
    var maxval = selboxVal_array['2'];//최대인원
    var guestroom_extra_charge = selboxVal_array['3'];//추가요금
    var rent_period_id = "#rent_period_"+selbox_index;
    var rent_period = $(rent_period_id).val();
    // var personnel_child = $(selboxid_child + " option:selected").val();//유아 인원수
    var add_total_person = parseInt(seleval)+parseInt(personnel_child);//총인원
    // alert('add_total_person ' + add_total_person);
	  if(add_total_person <= maxval){
      var differval = parseInt(add_total_person) - parseInt(standval); //총인원 - 기준인원

      if(differval > '0') { //인원초과시 추가요금..
          var add_adult = parseInt(seleval) - parseInt(standval);
          if(add_adult > '0'){
            var addfeeval_adult = (parseInt(add_adult)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
            $("#addfee_area_"+selbox_index).text(addfeeval_adult); //추가금액표시
            var addfeeval_child = (parseInt(personnel_child)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
            $("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
          }else{
            $("#addfee_area_"+selbox_index).text(""); //추가금액표시
            var add_child = parseInt(seleval) + parseInt(personnel_child) - parseInt(standval);
            var addfeeval_child = (parseInt(add_child)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
            $("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
          }
        }
        else{
          $("#addfee_area_"+selbox_index).text("");
          $("#addfee_area_child_"+selbox_index).text("");
        }
        room_fee_calc(selbox_index_child_size);
    }
    else{
       var eqindex = parseInt(maxval) - parseInt(seleval);
	     alert('최대 '+maxval+'명까지 가능합니다.' + eqindex);
       $(selboxid_child+' option:eq('+eqindex+')').prop("selected","selected");

       var addfeeval_child = (parseInt(eqindex)*parseInt(guestroom_extra_charge))*parseInt(rent_period); //추가금액
       // alert('eqindex ' + eqindex + ' guestroom_extra_charge ' + guestroom_extra_charge + ' addfeeval_child ' + addfeeval_child);
       $("#addfee_area_child_"+selbox_index).text(addfeeval_child); //추가금액표시
       room_fee_calc(selbox_index_child_size);
    }
}

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
