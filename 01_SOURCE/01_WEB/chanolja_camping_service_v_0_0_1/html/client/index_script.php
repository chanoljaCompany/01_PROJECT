<script type="text/javascript">
flatpickr.localize(flatpickr.l10ns.ko);//한글
var divisionType = "1";
var select_guestroom_code = "";
var select_guestroom_fee = "";
var select_option_size = 0;
var total_price = 0;
var guestroom_info_data;
var option_info_data;
var conType = "<?=$conType?>";
function showLoadingBar(val) {
          if(val == 'start'){
            $("#loadingArea").LoadingOverlay("show", {
              background  : "rgba(255, 255, 255, 1.0)"
            });
          }
          else{
            $("#loadingArea").LoadingOverlay("hide", true);
          }
}
$(document).ready(function() {
  console.log('ready');
  showLoadingBar('start');
  $("#sec2").hide(); //옵션및인원선택
  $("#sec3").hide(); //추가정보/가이
  $("#sec4").hide();//고객정보
  $("#sec5").hide();//예약 완료
  $("#sec6").hide();//예약 완료
  $("#sec7").hide();//예약 완료
  // $( "#accordion" ).accordion({
  //     collapsible: true,
  //     active: false,
  // });
  // $("#room_guide_info").show();
  // getData('<?=$intidate?>');
  getData(1);
});

function initData(){
  $("#sec1").show(); //옵션및인원선택
  $("#sec2").hide(); //옵션및인원선택
  $("#sec3").hide(); //추가정보/가이
  $("#sec4").hide();//고객정보
  $("#sec5").hide();//예약 완료
  $("#sec6").hide();//예약 완료
  $("#sec7").hide();//예약 완료
}
$( function() {
  $( "#accordion" ).accordion({
      collapsible: true,
      active: false,

  });
} );
// flatpickr(dateSelector);
console.log('divisionType --' + divisionType);
$("#inputDate").flatpickr({
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
      //getData(dateStr);
      findSearchData();
   }
});

  $("#inputDate_day").flatpickr({
       dateFormat: "Y-m-d",
       minDate: "today",
       defaultDate: ["<?=$todate?>"],
       locale: {
                       rangeSeparator: '~'
       },
       local:'ko',
       disable: [
         function(date) {
             // disable every multiple of 8
             //return !(date.getDate() % 10);

         }
     ],
     onClose: function(selectedDates, dateStr, instance) {
        //getData(dateStr);
        findSearchData();
     }
  });

// date 포맷을 만들어주는 함수 , ex) 20191210
function getDateStr(myDate){
  let month = myDate.getMonth() + 1
  let day = myDate.getDate()

  if (month < 10) month = '0' + month
  if (day < 10) day = '0' + day

  return (myDate.getFullYear() + '-' + month + '-' + day) // '20191211'
}
// 다음날을 구하는 함수
function nextDay(today) {
  //today = today.slice(0,4) + '-' + today.slice(4,6) + '-' + today.slice(6,) // ex) 2019-12-10
  let d = new Date(today) // 2019-12-10T00:00:00.000Z
  d.setDate(d.getDate() + 1)
  return getDateStr(d)
}
function findSearchData(){
  console.log('findSearchData ' + divisionType);
  divisionType = $("#divisionType").val();
  getData(divisionType)
}
function getData(divisionType){
  selectedline(divisionType);
  $("#divisionType").val(divisionType);
  if(divisionType == '1'){
    $("#inputDate").show();
    $("#inputDate_day").hide();
  }
  else{
    $("#inputDate").hide();
    $("#inputDate_day").show();
  }

  console.log(' getData divisionType ' + divisionType);
  var division = 'getData';
  var personnel = $("#personnel option:selected").val();
if(divisionType == '1'){
  // var divisionType = $("#divisionType").val();
  var dateStr = $("#inputDate").val();
  var datalen = dateStr.length;
  if(datalen < '11'){
     var ndate = nextDay(dateStr);
     var ndateStr = dateStr+"~"+ndate;
     $("#inputDate").val(ndateStr);
     dateStr = ndateStr;
  }
}
else{
  var dateStr = $("#inputDate_day").val();
     var ndate = nextDay(dateStr);
     var ndateStr = dateStr+"~"+dateStr;
     // $("#inputDate").val(ndateStr);
     dateStr = ndateStr;
     console.log(dateStr);
}


  $.ajax({
      type: 'GET',
      url:'/client/act/get_room_info.php',
      data: {
           division : division,
           dateStr : dateStr,
           divisionType : divisionType,
           personnel : personnel
      },
      error: function (request, status, error) {
      console.log('event error');
      },
      success:function(html){
       // console.log(html);
      // alert(conType);
      if(conType == '1'){
      $("#reserve_first_area_mo").html(html);
      }
      else{
      $("#reserve_first_area").html(html);
      }
      $("#dateStr").val(dateStr);
     }
   }

 );
  showLoadingBar('stop');
}

function guestroom_info_ajax(guestroom_code){
  var dateStr = $("#dateStr").val();
  var division = 'guestroom_info_ajax';
  var divisionType = $("#divisionType").val();
  var reserve_code = "";
  var returnData ;
  $.ajax({
      type: 'GET',
      url:'/client/act/get_room_info.php',
      async: false,
      data: {
           division : division,
           guestroom_code : guestroom_code,
           dateStr : dateStr,
            divisionType : divisionType,
      },
      error: function (request, status, error) {
      console.log('guestroom_info_ajax error');
      },
      success:function(json){
        returnData = json;
      //$("#reserve_first_area").html(html);
     }
   }
 );
    return returnData;
}

function option_info_ajax(guestroom_code){
  var dateStr = $("#dateStr").val();
  var division = 'option_info_ajax';
  var optionData ;
  $.ajax({
      type: 'GET',
      url:'/client/act/get_room_info.php',
      async: false,
      data: {
           division : division,
           guestroom_code : guestroom_code,
           dateStr : dateStr,
      },
      error: function (request, status, error) {
      console.log('option_info_ajax error');
      },
      success:function(json){
        optionData = json;
      //$("#reserve_first_area").html(html);
     }
   }
 );
    return optionData;
}

function totalCalc(){
  var room_fee = $("#room_fee").val();
  var add_fee = $("#add_fee").val();
  var option_fee = $("#option_fee").val();
  if(room_fee == '') room_fee = 0;
  if(add_fee == '') add_fee = 0;
  if(option_fee == '') option_fee = 0;
  // alert(room_fee + " : " + option_fee);
  var total_fee = parseInt(room_fee)+parseInt(add_fee)+parseInt(option_fee);
  // alert(room_fee + " : " + option_fee + " : " + total_fee);
  $("#total_fee").val(total_fee);
}
function calcFee(inputId){
  var targetId = "#"+inputId;
  var inputIdarray = inputId.split("_");
  var fData = inputIdarray['0'];
  var sData = inputIdarray['1'];
  var optFee = 0;
  if(sData != '' && sData != undefined){ //옵션값계산...
    var dIndex = sData-1;
    var option_fee = option_info_data[dIndex]['option_fee']; //옵션비용
    var option_info_data_size = option_info_data.length; //옵션갯수..
    var t=1;
    for (step = 0; step < option_info_data_size; step++) {
      var stepId = "#optid_"+t;
      var option_val = $(stepId).val(); //옵션비용
      optFee += parseInt(option_val)*parseInt(option_info_data[step]['option_fee']);
      // alert(option_val + ' : ' + optFee);
      t++;
    }
      $("#option_fee").val(optFee);
      totalCalc();
  }else{ //객실계산..
    var guestroom_personnel=guestroom_info_data['0']['guestroom_personnel']; //기준인원
    var guestroom_max_personnel=guestroom_info_data['0']['guestroom_max_personnel']; //최대인원
    var guestroom_extra_charge=guestroom_info_data['0']['guestroom_extra_charge']; //추가인원
    var reserve_interval_day=guestroom_info_data['0']['reserve_interval_day']; //예약기간
    var room_fee=guestroom_info_data['0']['room_fee']; //객실요금
    var adultPersonNum = $("#adultPerson").val();
    var childPersonNum = $("#childPerson").val();
    var babyPersonNum = $("#babyPerson").val();
    var personHap = parseInt(adultPersonNum)+parseInt(childPersonNum)+parseInt(babyPersonNum);

    if(personHap > guestroom_personnel){ //예약인원 > 기준인원
      if(personHap > guestroom_max_personnel){
          // var ccc = parseInt($(targetId).val())-1;
          $(targetId).val(parseInt($(targetId).val())-1);
          alert('허용 인원이 초과되었습니다.');
      }
      else{
        var addPerson = parseInt(personHap)-parseInt(guestroom_personnel);
        //var addFee = parseInt(room_fee)+(parseInt(addPerson)*parseInt(guestroom_extra_charge)*reserve_interval_day);
        var addFee = parseInt(room_fee);
        // alert(addFee);
        $("#add_fee").val((parseInt(addPerson)*parseInt(guestroom_extra_charge)*reserve_interval_day));
        $("#room_fee").val(addFee);
      }
    }
    else{
      // alert('personHap ' + personHap);
      var addPerson = parseInt(personHap)-parseInt(guestroom_personnel);
      //alert(personHap + " : " + guestroom_personnel + " : " + addPerson);
      if(addPerson >= 0){
        $("#add_fee").val((parseInt(addPerson)*parseInt(guestroom_extra_charge)*reserve_interval_day));
      }
      $("#room_fee").val(room_fee);
    }
    totalCalc();
  }
}
function fnCalCount(type, inputId){
    var targetId = "#"+inputId;
    var tCount = $(targetId).val();
    if(type=='p'){
          var changeVal = Number(tCount)+1;
          $(targetId).val(changeVal);
          calcFee(inputId);
    }else{
          if(tCount > 0){
          var changeVal = Number(tCount)-1;
          $(targetId).val(changeVal);
          calcFee(inputId);
         }
    }
}

function reserve_first(guestroom_code){
  $("#select_guestroom_code").val(guestroom_code);
  guestroom_info_data = guestroom_info_ajax(guestroom_code);
  option_info_data = option_info_ajax(guestroom_code);
  $("#adultPerson").val(guestroom_info_data['0']['guestroom_personnel']); //최초 성인예약(기준)인원으로 세팅
  var room_fee = guestroom_info_data['0']['room_fee']; //객실요금
  var guestroom_name = guestroom_info_data['0']['guestroom_name'];//상품명
  var html = "";
  var t=1;
  var option_info_data_size = option_info_data.length; //옵션갯수..
  $("#select_option_size").val(option_info_data_size);
  $.each(option_info_data, function(index, value) {
      var optid = "optid_"+t;
      var oid = "oid_"+t;
      var ofid = "ofid_"+t;
      var optname = "optname_"+t;
      var opthname = "opthname_"+t;
      var oname = "oname_"+t;
      var ofee = "ofee_"+t;
      html += "<tr>";
  		html += "<td>" + option_info_data[index].option_name + "</td>";
      html += "<input type='hidden' name='"+oname+"' id='"+oid+"' value='"+option_info_data[index].option_name+"' readonly='readonly' style='text-align:center;'/>";
      html += "<td>" + option_info_data[index].option_fee + "</td>";
      html += "<input type='hidden' name='"+ofee+"' id='"+ofid+"' value='"+option_info_data[index].option_fee+"' readonly='readonly' style='text-align:center;'/>";
      html += "<td>";
      html += "<button type='button' onclick=\"fnCalCount('m', '"+optid+"');\">-</button>";
      html += "<input type='text' name='"+optname+"' id='"+optid+"' value='0' readonly='readonly' style='text-align:center;'/>";
      html += "<input type='hidden' name='"+opthname+"' id='"+optid+"' value='"+option_info_data[index].option_code+"' readonly='readonly' style='text-align:center;'/>";
      html += "<button type ='button' onclick=\"fnCalCount('p','"+optid+"');\">+</button>";
      html += "</td>";
  		html += "</tr>";
      t++;
  });
  if(option_info_data_size <= 0){
      $("#optionTb").hide();
  }
  else{
     $("#room_reseve_option_area").html(html);
  }

  $("#room_fee").val(room_fee);
  $("#guestroom_name").val(guestroom_name);
  $("#option_fee").val('0');
  totalCalc();
  //
  var tbid = "#tb_"+guestroom_code;
  // alert(tbid);
  $(".tbroom").hide();
  $(tbid).show();
  $("#sec2").show();
  $("#sec1").hide();
  move_top();
}

function move_top(){
var offset = $("#blog").offset(); //해당 위치 반환
$("html, body").animate({scrollTop: offset.top},400);
}

function reserve_guide(){//추가정보
  var divisionType = $("#divisionType").val();
  $("#sec2").hide();
  $("#sec3").show();
  if(divisionType == '1') { //숙박상품
    $("#con_8_wrap").hide();
  }
  else{
    $("#con_4_wrap").hide();
    $("#con_6_wrap").hide();
    $("#con_7_wrap").hide();
  }
  move_top();
}
function reserve_second(){
  var gcode = $("#select_guestroom_code").val();
  var room_fee = $("#select_guestroom_fee").val();
  $("#room_guide_info").show();
  $("#reserve_third_area").show();
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
  		// html += "<td>" + (opt_val*opt_price) + "</td>";
  		html += "</tr>";
    }
  });
  // alert('room_fee ' + room_fee);
  var option_price = parseInt(total_price) + parseInt(room_fee);
  $("#pay_total").text(option_price);
  $("#room_reseve_option_area").html(html);
  move_top();
}
function reserve_third(){
  var divisionType = $("#divisionType").val();
  if(divisionType == '1') { //숙박상품

    for (step = 1; step < '6'; step++) {
      var stepId = "question_"+step;
      var question_val =  $("input:radio[name="+stepId+"]").is(":checked");
      // alert(question_val);
      if(question_val == false){
        alert('질문에 동의해 주셔야합니다.');
        // $(stepId).focus();
        return false;
      }
    // for (step = 1; step < '6'; step++) {
    //   var stepId = "#question_"+step;
    //   var question_val = $(stepId).val(); //옵션비용
    //   if(question_val == ''){
    //     alert('질문에 동의해 주셔야합니다.');
    //     $(stepId).focus();
    //     return false;
    //   }
    }
  }
  else{
    var question_1_val =  $("input:radio[name=question_1]").is(":checked");
    var question_3_val =  $("input:radio[name=question_3]").is(":checked");
    var question_6_val =  $("input:radio[name=question_6]").is(":checked");
    if(question_1_val == false){
      alert('질문에 동의해 주셔야합니다.');
      // $("#question_1").focus();
      return false;
    }
    if(question_3_val == false){
      alert('질문에 동의해 주셔야합니다.');
      // $("#question_3").focus();
      return false;
    }
    if(question_6_val == false){
      alert('질문에 동의해 주셔야합니다.');
      // $("#question_6").focus();
      return false;
    }
  }
   // for (step = 1; step < '9'; step++) {
   //   var stepId = "#question_"+step;
   //   var question_val = $(stepId).val(); //옵션비용
   //   if(question_val == ''){
   //     alert('질문에 동의해 주셔야합니다.');
   //     $(stepId).focus();
   //     return false;
   //   }
   // }
  var guestroom_name = $("#guestroom_name").val();
  var dateStr = $("#dateStr").val();
  $("#guestroom_use_hour").val(guestroom_info_data['0']['guestroom_use_hour']);
  if(divisionType != '1'){ //숙박상품이 아닐때
    console.log(guestroom_info_data);
    var datestrSp = dateStr.split("~");
    var guestroom_use_hour_sp = guestroom_info_data['0']['guestroom_use_hour'].split("~");
    var start_hour = guestroom_use_hour_sp['0'];
    var end_hour = guestroom_use_hour_sp['1'];
    var dateStr = datestrSp['0']+"<br>("+start_hour+"시부터"+end_hour+"까지)";
  }
  var adultPersonNum = $("#adultPerson").val();
  var childPersonNum = $("#childPerson").val();
  var babyPersonNum = $("#babyPerson").val();
  var room_fee = $("#room_fee").val();
  var add_fee = $("#add_fee").val();
  var option_fee = $("#option_fee").val();
  var total_fee = $("#total_fee").val();
  var html = "";
  // alert('guestroom_name ' + guestroom_name + ' dateStr ' + dateStr  + ' adultPersonNum ' + adultPersonNum
  //       + ' childPersonNum ' + childPersonNum  + ' babyPersonNum ' + babyPersonNum + ' room_fee ' + room_fee
  //       + ' add_fee ' + add_fee + ' option_fee ' + option_fee + ' total_fee ' + total_fee
  //     );

      var option_info_data_size = option_info_data.length; //옵션갯수..
      // alert('option_info_data_size ' + option_info_data_size);
      var t=1;
      var optStr = "";
      for (step = 0; step < option_info_data_size; step++) {
        var stepId = "#optid_"+t;
        var oid = "#oid_"+t;
        var ofid = "#ofid_"+t;
        var option_val = $(stepId).val(); //옵션수량
        var optname_val = $(oid).val(); //옵션수량
        var optfee_val = $(ofid).val(); //옵션수량

        // optFee += parseInt(option_val)*parseInt(option_info_data[step]['option_fee']);
         // alert(option_val + ' : ' + optname_val + ' : ' + optfee_val);
         if(option_val > 0){
           optStr += "옵션명 : " + optname_val + " , 수량: " + option_val + "<br>";
         }

        t++;
      }
  if(conType == 1){
   html += "<tr>";
   html += "<th colspan='3'>상품명</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td colspan='3'>" + guestroom_name + "</td>";
   html += "</tr>";
   html += "<tr>";
   html += "<th colspan='3'>이용일자</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td colspan='3'>" + dateStr + "</td>";
   html += "</tr>";
   html += "<tr>";
   html += "<th colspan='3'>인원</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td colspan='3'>성인"+adultPersonNum+",아동"+childPersonNum+",유아"+babyPersonNum+"</td>";
   html += "</tr>";
   html += "<tr>";
   html += "<th>상품요금</th>";
   html += "<th>추가요금</th>";
   html += "<th>옵션요금</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td>" + parseInt(room_fee).toLocaleString() + "원</td>";
   html += "<td>" + parseInt(add_fee).toLocaleString() + "원</td>";
   html += "<td>" + parseInt(option_fee).toLocaleString() + "원</td>";
   html += "</tr>";
   html += "<tr>";
   html += "<th colspan='3'>합계</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td colspan='3'>" + parseInt(total_fee).toLocaleString() + "원</td>";
   html += "</tr>";
   $("#reser_pay_table_wrap_mo").html(html);
  }
  else{
    html += "<tr>";
    html += "<td>" + guestroom_name + "</td>";
    html += "<td>" + dateStr + "</td>";
    html += "<td>성인"+adultPersonNum+",아동"+childPersonNum+",유아"+babyPersonNum+"</td>";
    html += "<td>" + parseInt(room_fee).toLocaleString() + "원</td>";
    html += "<td>" + parseInt(add_fee).toLocaleString() + "원</td>";
    html += "<td>" + parseInt(option_fee).toLocaleString() + "원</td>";
    html += "<td>" + parseInt(total_fee).toLocaleString() + "원</td>";
    html += "</tr>";
    html += "<tr>";
    html += "<td colspan='7'>선택옵션<br>" + optStr + "</td>";
    html += "</tr>";
    $("#reser_pay_table_wrap_pc").html(html);
  }
  $("#payment_total").text(parseInt(total_fee).toLocaleString()+'원')
  $("#sec2").hide();
  $("#sec3").hide();
  $("#sec4").show();
  move_top();
}
function reserve_fourth(){
  var reserve_name = $("#reserve_name").val();
  var reserve_phone = $("#reserve_phone").val();
  var reserve_email = $("#reserve_email").val();
  var guestroom_paymthod_val = $("input[name='guestroom_paymthod']:checked").val();
  if(reserve_name == ''){
     alert('예약자명을 입력하세요.');
     $("#reserve_name").focus();
     return false;
   }
   if(reserve_phone == ''){
      alert('핸드폰번호를 입력하세요.');
      $("#reserve_phone").focus();
      return false;
    }
    if(reserve_email == ''){
       alert('이메일을 입력하세요.');
       $("#reserve_email").focus();
       return false;
     }
     if(guestroom_paymthod_val == 1){ //무통장입금일때
       var depositor_val = $("#depositor").val();
       if(depositor_val == ''){
          alert('입금자명을 입력하세요.');
          $("#depositor").focus();
          return false;
        }
     }
     var agreement = $('#agreement').is(':checked');
     if(agreement == false){
       alert('규정동의에 체크해주세요.');
       return false;
     }

  var form = $('#reserveForm')[0];
    var formData = new FormData(form);
    // for (var pair of formData.entries())
    // {
    //   console.log(pair[0]+ ', ' + pair[1]);
    // }
var result = confirm("예약을 신청 하시겠습니까?");
    if(result) { //확인 클릭 시

    $.ajax({
       type: 'POST',
       url:"/client/act/reserveAct.php",
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
               var remsgArray = obj[0].ret_code_msg;
               var remsgsplit = remsgArray.split("^");
               var remsg =  remsgsplit['0']//메세지내용
               var reserve_code = remsgsplit['1']//메세지내용
               $("#reserve_code").val(reserve_code);
           if(recode == '100'){ //무통장예약 성공 > 예약완료페이지화면
               alert(remsg);
               reserve_fifth(reserve_code);
           }
           else if(recode == '101'){ //신용카드결제 선택 성공 > 신용카드결제PC화면
                pg_payment_proc(reserve_code);
           }
           else{ //기타오류
               alert('오류가 발생하였습니다.');
               return false;
               location.reload();
           }
        }
    });
}
  //location.href="/client/index_main.php";
  // var guestroom_code = $("#select_guestroom_code").val();
  // alert('reserve_second > guestroom_code ' + guestroom_code);
  // var option_array = split("_",)
}
function reserve_fifth(reserve_code){
  $("#sec4").hide();
  $("#sec5").show();
  $.ajax({
      type: 'GET',
      url:'/client/act/reserve_info.php',
      data: {
           reserve_code : reserve_code,
      },
      error: function (request, status, error) {
      console.log('reserve_fifth error');
      },
      success:function(html){
      // console.log(html);
      // alert(conType);
      if(conType == '1'){ //모바일
        $("#pcnotice").hide();
        $("#reserve_fourth_area_mo").html(html);
      }
      else{ //pc
        $("#monotice").hide();
        $("#reserve_fourth_area").html(html);
      }
   }});
   move_top();
  //$("#reserve_fourth_area").show();
  // var guestroom_code = $("#select_guestroom_code").val();
  // alert('reserve_second > guestroom_code ' + guestroom_code);
  // var option_array = split("_",)
}
function pg_payment_proc(reserve_code){
  // alert('pg결제시작 reserve_code ' + reserve_code);
  var good_name = $("#guestroom_name").val();
  var good_mny = $("#total_fee").val();
  var buyr_name = $("#reserve_name").val();
  var buyr_tel2 = $("#reserve_phone").val();
  var buyr_mail = $("#reserve_email").val();
  // alert(good_name + " : " + good_mny + " : " + buyr_name + " : " + buyr_tel2 + " : " + buyr_mail);
  $("#ordr_idxx").val(reserve_code); //주문번호
  $("#good_name").val(good_name); //상품명
  $("#good_mny").val(good_mny); //결제금액
  $("#buyr_name").val(reserve_name);//주문자명
  $("#buyr_tel1").val(""); // 전화번호
  $("#buyr_tel2").val(buyr_tel2); //핸드폰번호
  $("#buyr_mail").val(buyr_mail); //이메일
  jsf__pay(document.reserveForm);
}
function move_page(pmove){
  if(pmove == 'main'){
    location.reload();
  }
  else if(pmove == 'first'){
    // $("#sec2").hide();
    // $("#sec1").show();
    location.reload();
  }
  else if(pmove == 'second'){
    $("#sec3").hide();
    $("#sec2").show();
  }
  else if(pmove == 'third'){
    $("#sec4").hide();
    $("#sec3").show();
  }
}

function paymthodChang(val){
   if(val == 'card'){
     $("#account_info_tr").hide();
     $("#depositor_tr").hide();
   }
   else if(val == 'bank'){
     $("#account_info_tr").show();
     $("#depositor_tr").show();
   }
}
</script>
<script type="text/javascript">
    function m_Completepayment( FormOrJson, closeEvent )
    {
        var frm = document.reserveForm;
        GetField( frm, FormOrJson );
        // alert(frm.res_cd.value);
        if( frm.res_cd.value == "0000" )
        {
            alert("결제 승인 요청 전,\n\n반드시 결제창에서 고객님이 결제 인증 완료 후\n\n리턴 받은 ordr_chk 와 업체 측 주문정보를\n\n다시 한번 검증 후 결제 승인 요청하시기 바랍니다."); //업체 연동 시 필수 확인 사항.
            //frm.submit();
            card_proc();
            closeEvent();

        }
        else
        {
            alert( "[" + frm.res_cd.value + "] " + frm.res_msg.value );
            closeEvent();
        }
    }

    function card_proc(){
        var form = $('#reserveForm')[0];
        var formData = new FormData(form);
        for (var pair of formData.entries())
        {
          console.log(pair[0]+ ', ' + pair[1]);
        }

        $.ajax({
           type: 'POST',
           url:"/client/kcp/kcp_api_page.php",
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
                 var remsgArray = obj[0].ret_code_msg;
                 var remsgsplit = remsgArray.split("^");
                 var remsg =  remsgsplit['0']//메세지내용
                 var reserve_code = remsgsplit['1']//메세지내용
                 $("#reserve_code").val(reserve_code);
                if(recode == '100'){ //무통장예약 성공 > 예약완료페이지화면
                 alert(remsg);
                 reserve_fifth(reserve_code);
                }
                else{ //기타오류
                 location.reload();
                }
            }
        });
    }

function selectedline(val){
  var selId = "#rconfirm_"+val;
  $('li').removeClass('selected');
  $(selId).addClass('selected');
  if(val != '4'){
    initData();
  }
}
function reserveConfim(){
  selectedline('4');
  $("#sec1").hide(); //옵션및인원선택
  $("#sec2").hide(); //옵션및인원선택
  $("#sec3").hide(); //추가정보/가이
  $("#sec4").hide();//고객정보
  $("#sec5").hide();//예약 완료
  $("#sec6").show();//예약 완료
  $("#sec7").hide();//예약 완료
}

function reserve_confirm_act(){
  $("#sec7").hide();//예약 완료
  var division = "reserve_confirm";
  var resevervation_inquiry_name = $("#resevervation_inquiry_name").val();
  var resevervation_inquiry_phone = $("#resevervation_inquiry_phone").val();

  if(resevervation_inquiry_name == ''){
     alert('예약자명을 입력하세요.');
     return false;
   }
   if(resevervation_inquiry_phone == ''){
      alert('핸드폰번호를 입력하세요.');
      return false;
    }

    $.ajax({
        type: 'POST',
        url:'/client/act/reserve_confirm.php',
        data: {
             division : division,
             resevervation_inquiry_name : resevervation_inquiry_name,
             resevervation_inquiry_phone : resevervation_inquiry_phone
        },
        error: function (request, status, error) {
        console.log('reserve_confirm error');
        },
        success:function(html){
          // alert(html);
        if(html == ''){
          alert('일치되는 예약정보가 없습니다.');
          return false;
        }
        else{
          $("#sec6").hide();//예약 완료
          $("#sec7").show();//예약 완료
          if(conType == '1'){
            $("#confirm_area_mo").html(html);
          }
          else{
            $("#confirm_area_pc").html(html);
          }
        }
     }});
}
</script>
<script type="text/javascript" src="https://testpay.kcp.co.kr/plugin/payplus_web.jsp"></script>
<script type="text/javascript">
    /* 표준웹 실행 */
    function jsf__pay( form )
    {
        var methodVal = form.guestroom_paymthod.value; //신용카드
        if(methodVal == '2'){
          form.pay_method.value="100000000000"; //신용카드
        }
        try
        {
            KCP_Pay_Execute( form );
        }
        catch (e)
        {
            /* IE 에서 결제 정상종료시 throw로 스크립트 종료 */
        }
    }
</script>
