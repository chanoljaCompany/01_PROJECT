<?php
////error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
$todate = date("Y-m-d");
$nextdate = date('Y-m-d', strtotime("+1 day", time()));
$intidate = $todate."~".$nextdate;
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<form name="form" id="reserveForm">
  <input type="hidden" name="select_guestroom_code" id="select_guestroom_code">
  <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee">
  <input type="hidden" name="select_option_array" id="select_option_array">
<input type="text" class="selector" placeholder="날짜를 선택하세요." />
<a class="input-button" title="toggle" data-toggle><i class="icon-calendar"></i></a>
<div id= "room_info_area"> </div>
<div id= "room_guide_info">
여기는 가이드 안내 지역입니다. <br>
<input type="button" name="room_guide_info_btn" id="room_guide_info_btn" value="동의하고 계속하기" onclick="reserve_second();"></button>
</div>
<div id= "room_reseve_select">
옵션및인원선택.. <br>
<table>
  <tr>
    <td>옵션명</td>
    <td>옵션가격</td>
    <td>수량</td>
    <td>금액</td>
</tr>
<tbody id='room_reseve_option_area'></tbody>
</table>
<table>
  <tr>
    <td>결제금액</td>
    <td id='pay_total'></td>
 </tr>
<table>
  <tr>
    <td>예약자명</td>
    <td><input type='text' name='reserve_name' id = 'reserve_name'></td>
 </tr>
 <tr>
   <td>예약자핸드폰번호</td>
   <td><input type='text' name='reserve_name' id = 'reserve_name'></td>
</tr>
</table>
<input type="button" name="room_reseve_pay_btn" id="room_reseve_pay_btn" value="결제하기" onclick="reserve_third();"></button>
</div>
<div id= "room_reseve_pay">
여기는 예약정보입력과 결제버튼 지역입니다.. <br>
<table>
  <tr>
    <td>옵션명</td>
    <td>옵션가격</td>
    <td>수량</td>
    <td>금액</td>
</tr>
<tbody id='room_reseve_option_area'></tbody>
</table>
<table>
  <tr>
    <td>결제금액</td>
    <td id='pay_total'></td>
 </tr>
<table>
  <tr>
    <td>예약자명</td>
    <td><input type='text' name='reserve_name' id = 'reserve_name'></td>
 </tr>
 <tr>
   <td>예약자핸드폰번호</td>
   <td><input type='text' name='reserve_name' id = 'reserve_name'></td>
</tr>
</table>
<input type="button" name="room_reseve_pay_btn" id="room_reseve_pay_btn" value="결제하기" onclick="reserve_third();"></button>
</div>
<div id= "room_reseve_end">
여기는 결제완료후 보여지는 예약완료 화면입니다.<br>
<input type="button" name="room_reseve_end_btn" id="room_reseve_end_btn" value="예약확인" onclick="reserve_fourth();"></button>
</div>
</form>
<script type="text/javascript">
var select_guestroom_code = "";
var select_guestroom_fee = "";
var total_price = 0;
$(document).ready(function() {
  $("#room_guide_info").hide();
  $("#room_reseve_pay").hide();
  $("#room_reseve_end").hide();
  flatpickr.localize(flatpickr.l10ns.ko);
  getData('<?=$intidate?>');
});

// flatpickr(dateSelector);
$(".selector").flatpickr({
     mode: "range",
     dateFormat: "Y-m-d",
     minDate: "today",
     defaultDate: ["<?=$todate?>","<?=$nextdate?>"],
     locale: {
                     rangeSeparator: '~'
     },
     local:'ko',
     conjunction:"~",
     disable: [
       function(date) {
           // disable every multiple of 8
           //return !(date.getDate() % 10);

       }
   ],
   onClose: function(selectedDates, dateStr, instance) {
       //...
      // alert('a');
      getData(dateStr);
   }
});

function getData(dateStr){
  //alert(' dateStr ' + dateStr);
  $.ajax({
      type: 'GET',
      url:'./act/get_room_info.php',
      data: {
           dateStr : dateStr,
      },
      error: function (request, status, error) {
      console.log('event error');
      },
      success:function(html){
      console.log(html);
      $("#room_info_area").html(html);
     }});
}

function reserve_first(guestroom_code,room_fee,room_info_array_etc_size){
  //var select_guestroom_code =
  $("#select_guestroom_code").val(guestroom_code);
  $("#select_guestroom_fee").val(room_fee);

  var tbid = "#tb_"+guestroom_code;
  // alert(tbid);
  $(".tbroom").hide();
  $(tbid).show();
  $("#room_guide_info").show();
}

function reserve_second(){
  var gcode = $("#select_guestroom_code").val();
  var room_fee = $("#select_guestroom_fee").val();

  $("#room_guide_info").hide();
  $("#room_reseve_pay").show();
  //옵션결제금액.
  // var etcs = '';
  // var optselname = "optselbox_"+1;
  // alert(' optselname ' + optselname);
  var opt_arr = [];
  var html = "";
  $('select[name=optselbox] option:selected').each(function(index,selected){
    //etcs += $(this).attr('etc') +',';
    var option_array = selected.value.split("_");
    var opt_val  = option_array['0'];
    var opt_price  = option_array['1'];
    var opt_code  = option_array['2'];
    var opt_gcode  = option_array['3'];
    var opt_name  = option_array['4'];
    if(opt_gcode == gcode){
      //alert(' index ' + index + ' selected value' + selected.value);
      opt_arr.push(selected.value);
      total_price += parseInt(opt_val)*parseInt(opt_price);
      // alert(total_price);
      html += "<tr>";
  		html += "<td>" + opt_name + "</td>";
  		html += "<td>" + opt_price + "</td>";
  		html += "<td>" + opt_val + "</td>";
  		html += "<td>" + (opt_val*opt_price) + "</td>";
  		html += "</tr>";
    }
  });
  // alert('room_fee ' + room_fee);
  var option_price = parseInt(total_price) + parseInt(room_fee);
  $("#pay_total").text(option_price);
  $("#room_reseve_option_area").html(html);
  // var opt_arr_size = opt_arr.length;
  // for (step = 0; step < opt_arr_size; step++) {
  //   var option_array_value = opt_arr[step];
  //   var option_array = option_array_value.split("_");
  //   var opt_val  = option_array['0'];
  //   var opt_price  = option_array['1'];
  //   var opt_code  = option_array['2'];
  //   var opt_gcode  = option_array['3'];
  //   html += "<tr>";
	// 	html += "<td>" + opt_gcode + "</td>";
	// 	html += "<td>" + opt_price + "</td>";
	// 	html += "<td>" + opt_val + "</td>";
	// 	html += "<td>" + (opt_val*opt_price) + "</td>";
	// 	html += "</tr>";
  // }
}
function reserve_third(){
  $("#room_reseve_pay").hide();
  $("#room_reseve_end").show();
  // var guestroom_code = $("#select_guestroom_code").val();
  // alert('reserve_second > guestroom_code ' + guestroom_code);
  // var option_array = split("_",)
}
function reserve_fourth(){
  location.href="/client/index_main.php";
  // var guestroom_code = $("#select_guestroom_code").val();
  // alert('reserve_second > guestroom_code ' + guestroom_code);
  // var option_array = split("_",)
}
</script>
