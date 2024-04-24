<script>
    var mapid = "";
    flatpickr.localize(flatpickr.l10ns.ko);//한글
    var act_target = "<?=$act_target?>";
    var divisionType = "1";
    var select_guestroom_code = "";
    var select_guestroom_fee = "";
    var total_price = 0;
    var guestroom_info_data;
    var option_info_data;
    var conType = "<?=$conType?>";
    var areaData;
    var optbasicData;
    var form_userid;
    $(function(){
        $(".sch_txt").click(function(){
            $(this).parent(".sch_select").toggleClass("active");
        });
    });
    $(function(){
        $(".list_select").click(function(){
            $(".active").not($(this).parent(".list_form")).removeClass("active");
            $(this).parent(".list_form").toggleClass("active");
        });
    });

    $(function(){
        $(".list_x").click(function(){
            $(this).parent().parent().parent(".list_form").removeClass("active");
        });
    });

    /* 탭 메뉴 */
    $(function (){
	    $(".tab_con>div").hide();
	    $(".tab_con>div:first").show();   
	    $(".tab_headers li").click(function(){
	        $(".tab_headers li").removeClass("selected");
	        $(this).addClass("selected");
	        $(".tab_con>div").hide();
	        $($(this).attr("rel")).show();
	    });
	});

    $( function() {
    $( "#accordion" ).accordion({
        collapsible: true,
        active: false,

    });
    } );

function paymthodChang(ptype){
    if(ptype =='card') {
        $("#account_info_tr").hide();
        $("#depositor_tr").hide();
    }
    else if(ptype =='bank'){
        $("#account_info_tr").show();
        $("#depositor_tr").show();
    }
}    

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
    //   findSearchData('main');
       setDate(dateStr);
   }
});

$("#inputDate_sub").flatpickr({
     mode: "range",
     dateFormat: "Y-m-d",
     minDate: "today",
     defaultDate: [$("#sss").val(),$("#eee").val()],
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
    //   findSearchData('sub');
   }
});
    <? if($act_target == 'reserve_confirm'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").hide(); 
        //$("#sub_page_map").hide(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").show(); 
        // $("#login").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        //   reserve_fifth('1647937331');
        // get_area();
        // get_option_basic();
        // findSearchData('init');
       });
    <? }else if($act_target == 'card_return'){?>
        $(document).ready(function() {
        reserve_fifth("<?=$orderId?>");    
        $("#subpagebg").hide();  
        $("#sub_page_1").hide(); 
       // $("#sub_page_map").hide(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").show(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        // $("#login").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        //   reserve_fifth('1647937331');
        // get_area();
        // get_option_basic();
        // findSearchData('init');
          
    });
    <? }else if($act_target == 'car_detail'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").hide(); 
       // $("#sub_page_map").hide(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        room_detail('<?=$car_code?>');  
    });
    <? }else if($act_target == 'icairport'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").show(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        findSearchData('icairport');
        
          
    });
    <? }else if($act_target == 'jeonju'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").show(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        findSearchData('jeonju');
        
          
    });

    <? }else if($act_target == 'tops'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").show(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        findSearchData('tops');
    });

    <? }else if($act_target == 'jeju'){?>
    $(document).ready(function() {
        $("#subpagebg").hide();
        $("#sub_page_1").show();
        $("#sub_page_detail").hide();
        $("#customer_info").hide();
        $("#reservation_completion").hide();
        $("#reservation_inquiry_list").hide();
        $("#reservation_inquiry").hide();
        $("#login_form").hide();
        $("#memberjoin").hide();
        findSearchData('jeju');
    });

    <? }else if($act_target == 'deajeo'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").show(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        findSearchData('deajeo');
        
          
    });

    <? }else if($act_target == 'local'){?>
        $(document).ready(function() {
        $("#subpagebg").hide();  
        $("#sub_page_1").show(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        findSearchData('local');
        
          
    });



    <?}else{?>
        $(document).ready(function() {
         //    room_image('9416914189');
        //    room_detail('9416914189');
        $("#subpagebg").show();  
        $("#sub_page_1").hide(); 
       // $("#sub_page_map").hide(); 
        $("#sub_page_detail").hide(); 
        $("#customer_info").hide(); 
        $("#reservation_completion").hide(); 
        $("#reservation_inquiry").hide(); 
        $("#reservation_inquiry_list").hide(); 
        $("#login_form").hide(); 
        $("#memberjoin").hide(); 
        //   reserve_fifth('1647937331');
        get_area();
        get_option_basic();
    });
    <?}?>
   
    function move_top(){
        var offset = $(".breatcome_area").offset(); //해당 위치 반환
        $("html, body").animate({scrollTop: offset.top},400);
    }

    function get_area(){
      var division = "get_area";
      $.ajax({
      type: 'GET',
      url:'/client/act/get_init_data.php',
      async: false,
      data: {
           division : division,
      },
      error: function (request, status, error) {
      console.log('guestroom_info_ajax error');
      },
     success:function(json){
       //console.log('get_area========', json[0]['area_name']);
       areaData = json;
       var html = "";
       /*
         html += "<span>";
         html += "<input type='checkbox' name='area[]' value='' onclick='location_allcheck()' class='check_box' id='all_check'>";
         html += "<label for='chk1'>전체</label>";
         html += "</span>";
        */
        for(var i=0 ; i < areaData.length ; i++ ){
        
			console.log('data test : ', json[i]);
            html += "<span>";
            html += "<input type='checkbox' name='area[]' value='"+areaData[i]['area_code']+"' class='check_box'>";
            html += "<label for='chk1'>"+areaData[i]['area_name']+"</label>";
            html += "</span>";
            $("#mainArea").html(html);
            $("#subArea").html(html);
        }
      }
   });
 }

    function get_option_basic(){
      var division = "get_option_basic";
      $.ajax({
      type: 'GET',
      url:'/client/act/get_init_data.php',
      async: false,
      data: {
           division : division,
      },
      error: function (request, status, error) {
      console.log('guestroom_info_ajax error');
      },
     success:function(json){
    //   console.log('get_option_basic========');
       optbasicData = json;
       var html = "";
            html +="<h4>보유시설</h4>";
        for(var i=0 ; i < optbasicData.length ;i++ ){
            html += "<span>";
            html += "<input type='checkbox' name='basicoption[]' value='"+optbasicData[i]['option_code']+"' class=''>";
            html += "<label for='chk1'>"+optbasicData[i]['option_name']+"</label>";
            html += "</span>";
            $("#basicOption").html(html);
        }
      // $("#sit_pvi").html(html);
     }
   });
  }

function location_allcheck() {
    var isChecked = $('#all_check').prop('checked');

    $('.check_box').prop('checked', isChecked);
}

function setDate(setdate){
    //  alert('setdate ' + setdate);
    $("#dateStr").val(setdate);
    var setdatesplit = setdate.split("~");
    $("#sss").val(setdatesplit['0']);
    $("#eee").val(setdatesplit['1']);
}
function findSearchData(locate) {
  if(locate == 'main'){
    $("#sub_page_1").show(); 
    //$("#sub_page_map").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());
  }
  else if(locate == 'icairport'){
    $("#sub_page_1").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());
    
  }
  else if(locate == 'jeonju'){
    $("#sub_page_1").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());
    
  }

  else if(locate == 'local'){
    $("#sub_page_1").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());
    
  }

  else if(locate == 'tops'){
    $("#sub_page_1").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());
    
  }
  else if(locate == 'deajeo'){
    $("#sub_page_1").show(); 
    $("#subpagebg").hide(); 
    setDate($("#inputDate").val());
    $("#inputDate_sub").val($("#inputDate").val());    
  }

  else if(locate == 'jeju'){
      $("#sub_page_1").show();
      $("#subpagebg").hide();
      setDate($("#inputDate").val());
      $("#inputDate_sub").val($("#inputDate").val());
  }
  else if(locate == 'init'){
    setDate('<?=$dateType?>').val();
    $("#inputDate_sub").val('<?=$dateType?>');
  }
  else{
    setDate($("#inputDate_sub").val());
  }

  divisionType = $("#divisionType").val();
  getData(divisionType,locate)
}
function getData(divisionType,locate) {
  $("#divisionType").val(divisionType);
  var division = 'getData';
  var personnel = "1";
if(divisionType == '1'){
  // var divisionType = $("#divisionType").val();
  var dateStr = $("#dateStr").val();
  var datalen = dateStr.length;
  if(datalen < '11'){
     var ndate = nextDay(dateStr);
     var ndateStr = dateStr+"~"+ndate;
     if(locate == 'main'){
        $("#inputDate").val(ndateStr);
     }else{
        $("#inputDate_sub").val(ndateStr);
     }
     dateStr = ndateStr;
  }
}
    var areaArray = new Array();
    $("input[name='area[]']:checked").each(function() { 
      var areaVal = $(this).val(); 
      areaArray.push(areaVal);
    });

    var optionArray = new Array();
    $("input[name='basicoption[]']:checked").each(function() { 
      var optionVal = $(this).val(); 
      optionArray.push(optionVal);
    });

    var form = $('#reserveForm')[0];
    var formData = new FormData(form);
    formData.append("division", "getData");
    formData.append("locate", locate);
    formData.append("area", areaArray);
    formData.append("basicoption", optionArray);

    for (var pair of formData.entries())
    {
    //   console.log(pair[0]+ ', ' + pair[1]);
    }
  $.ajax({
      type: 'post',
      url:'/client/act/get_room_info.php',
      enctype: 'multipart/form-data',
      data:formData,
      cache:false,
      contentType : false,
      processData : false,
      error: function (request, status, error) {
        // console.log('sddddddddddddddddd');
        console.log('event error');
      },
      success:function(html){
        // console.log('html', html);
        // alert();
    //   if(conType == '1'){
    //   $("#reserve_first_area_mo").html(html);
    //   }
    //   else{
      $("#reserve_first_area").html(html);
    //   }
    //   alert(dateStr);
      $("#dateStr").val(dateStr);
     }
   }

 );
 //$("#mapid").val('getData');
 //setTimeout(mapstart, 1000, 1);
 
//   showLoadingBar('stop');
}
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



function room_image(guestroom_code){
//   var dateStr="2022-03-19~2022-03-20";
  var division = 'guestroom_image_info_ajax';
  var divisionType = $("#divisionType").val();
  $.ajax({
      type: 'GET',
      url:'/client/act/get_guestroom_image.php',
      async: false,
      data: {
           division : division,
           guestroom_code : guestroom_code,
           divisionType : divisionType,
      },
      error: function (request, status, error) {
      console.log('guestroom_info_ajax error');
      },
      success:function(html){
      $("#sit_pvi").html(html);
     }
   }
 );
}
function room_detail(guestroom_code){
  $("#sub_page_detail").show(); 
  $("#sub_page_1").hide(); 
 // $("#sub_page_map").hide(); 
  var dateStr = $("#dateStr").val();
//   alert(dateStr);
  //var dateStr="2022-03-19~2022-03-20";
  if(dateStr =='') {
    dateStr = "<?=$intidate?>";
  }
  var makeCopyUrl = "http://www.chanolja.co.kr/bbs/board.php?bo_table=mall&act_target=car_detail&car_code="+guestroom_code;
  $("#copyUrl").val(makeCopyUrl);
//   alert(dateStr);
  var division = 'guestroom_info_ajax';
  var divisionType = $("#divisionType").val();
  var reserve_code = "";
  var returnData ;
  $.ajax({
      type: 'GET',
      url:'/client/act/get_guestroom_detail.php',
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
      success:function(html){
        pid = "1";
       var state = { 'page_id': 1, 'user_id': 5 }; 
       var title = 'Hello World'; 
       var url = '/bbs/board.php?bo_table=mall'; 
       history.pushState(state, title, url);
      $("#sit_info").html(html);


      // 스크롤을 최상단으로 이동
      window.scrollTo(0, 0);
     }
   }
 );
 room_image(guestroom_code);
 rightData();

}

function copyUrl() {
    var urlbox = document.getElementById('copyUrl');
        urlbox.select();
        document.execCommand('Copy');
        alert('URL 이 복사 되었습니다.');
}

window.onpopstate = function(event) {
// alert("location: " + document.location + ", state: " + JSON.stringify(event.state));
loadStateContent(event.state);
}

var pid = "1";
function loadStateContent(stateData){
    //alert('stateData ' + stateData.page_id);
    // alert('pid ' + pid);
    // var stateDataid = stateData.page_id;
    // if(pid > 1){
    //     pid = 1;
    // }
    // alert(pid);
    if(pid == '1'){
       // $("#sub_page_map").show(); 
        $("#sub_page_detail").hide(); 
        $("#sub_page_1").show(); 
        move_top();
    }
    else if(pid == '2'){
        //$("#sub_page_map").hide(); 
        $("#sub_page_detail").show(); 
        $("#customer_info").hide(); 
        move_top();
    }

}
// function room_detail_right(guestroom_code){
//     var dateStr = $("#dateStr").val();
// //   alert(dateStr);
// //   var dateStr="2022-03-19~2022-03-20";
//   var division = 'guestroom_info_ajax';
//   var divisionType = $("#divisionType").val();
//   var reserve_code = "";
//   var returnData ;
//   $.ajax({
//       type: 'GET',
//       url:'/client/act/get_guestroom_detail_r.php',
//       async: false,
//       data: {
//            division : division,
//            guestroom_code : guestroom_code,
//            dateStr : dateStr,
//            divisionType : divisionType,
//       },
//       error: function (request, status, error) {
//       console.log('guestroom_info_ajax error');
//       },
//       success:function(html){
//        var state = { 'page_id': 1, 'user_id': 5 }; 
//        var title = 'Hello World'; 
//        var url = '/bbs/board.php?bo_table=70'; 
//        history.pushState(state, title, url);
//       $("#sel_option_wrap").html(html);
//      }
//    }
//  );
  
// }
function rightData() {
    $("#select_guestroom_fee").val("0");
    $("#discount").val("0");
    $("#select_option_fee").val("0");
    var room_info_array_etc_data = $("#room_info_array_etc") .val();
    var room_info_data = JSON.parse(room_info_array_etc_data);
    // console.log(' room_info_array_etc_data ' + room_info_array_etc_data);
    for(var i=0 ; i < room_info_data.length ;i++ ){
        $("#room_fee_r").text((room_info_data[i]['room_fee']/room_info_data[i]['reserve_interval_day']).toLocaleString());//1박가격
        // $("#room_fee_r").text(room_info_data[i]['room_fee'].toLocaleString());//1박가격
        // $("#reserve_interval_day").text('/'박');//1박가격
        $("#reserve_interval_day_val").val(room_info_data[i]['reserve_interval_day']);
        var reserve_interval_day_val = $("#reserve_interval_day_val").val();
        $("#select_guestroom_fee").val(room_info_data[i]['room_fee']);
        $("#room_fee_t").text(room_info_data[i]['room_fee'].toLocaleString());
        $("#total_hap").text(room_info_data[i]['room_fee'].toLocaleString());
        $("#total_fee").text(room_info_data[i]['room_fee'].toLocaleString());
        $("#room_subject").text(room_info_data[i]['guestroom_name']);
        $("#dateintval").text("/"+room_info_data[i]['dateintval']+"박");
        $("#guestroom_name").val(room_info_data[i]['guestroom_name']);
        $("#select_guestroom_code").val(room_info_data[i]['guestroom_code']);
        $("#guestroom_use_hour").val(room_info_data[i]['guestroom_use_hour']);
        $("#reserve_term").text(room_info_data[i]['dateintval']+"박");

        
        if(room_info_data[i]['dateintval'] == '1'){
            $("#discount").val("0");
        }
        
        if(room_info_data[i]['dateintval'] >= '2'){
            if(room_info_data[i]['discount_1'] > '0'){
                $("#discount").val(room_info_data[i]['discount_1']);
            }
        }
        
        if(room_info_data[i]['dateintval'] >= '3'){
            if(room_info_data[i]['discount_2'] > '0'){
                $("#discount").val(room_info_data[i]['discount_2']);
            }
        }

        var discountValue = $("#discount").val();
        if(discountValue > 0){
            var discount = (parseInt(room_info_data[i]['room_fee'])*parseInt(discountValue))/100;
            $("#room_fee_discount_tr").show();
            $("#room_fee_discount").text(discount.toLocaleString());
        }else{
            $("#room_fee_discount_tr").hide();
        }
        totalCal();
    }  
    var html = "";
    var html_2 = "";
    var js_array = $("#get_goption_all_pay") .val();
    var contact = JSON.parse(js_array);
    var codeArray = new Array();
    for(var i=0 ; i < contact.length ;i++ ){
        var trval = contact[i]['option_code'];
        var chval = "ch_"+contact[i]['option_code'];
        var optionVal = contact[i]['option_code']+"^"+contact[i]['option_name']+"^"+contact[i]['option_fee']+"^"+contact[i]['option_divi'];
        if(contact[i]['option_divi'] == '2'){
            var optionVal2 = parseInt(contact[i]['option_fee'])*parseInt(reserve_interval_day_val);
        }
        else{
            var optionVal2 = parseInt(contact[i]['option_fee']);
        }
        
        html += "<span class='price_item'>";
        html += "<input type='checkbox' name='selectopt' id='"+chval+"'onclick=\"optcheck('"+contact[i]['option_code']+"')\" value='"+optionVal+"' class=''>";
        html += "<label for='price_chk1'>"+contact[i]['option_name']+"<span class='price_num'>"+parseInt(contact[i]['option_fee']).toLocaleString()+"</span>원</label>";
        html += "</span>";
        $("#price_checkbox").html(html);

        html_2 += "<tr id='"+trval+"'>";
        html_2 += "<td>"+contact[i]['option_name']+"</td>";
        html_2 += "<td><span class=''>"+optionVal2.toLocaleString()+"</span><span class=''>원</span></td>";
        html_2 += "</tr>";
        $("#opt_list").html(html_2);
        codeArray.push(trval);
    }
   
    for(var i=0 ; i < codeArray.length ;i++ ){
        $("#"+codeArray[i]).hide();
    }

    if(contact.length <= '0') {
        $("#opt_pay").hide();
    } 
    move_top();
    //$("#mapid").val('rightData');
    //setTimeout(mapstart, 1000, 1);
}
function optcheck(val){
    var chval = "ch_"+val;
    var chResult = $("#"+chval).is(':checked');
    var select_option_fee = $("#select_option_fee").val();
    // console.log('select_option_fee ' + select_option_fee);
    var chvaldata = $('input:checkbox[id='+chval+']').val();
    var reserve_interval_day_val = $("#reserve_interval_day_val").val();

    if(chResult){
        $("#"+val).show();
        var datasplit = chvaldata.split("^");
        var optFee = datasplit[2];
        var option_divi = datasplit[3];
        // alert('select_option_fee ' + select_option_fee + 'optFee ' + optFee + 'option_divi ' + option_divi);
        if(option_divi == '2'){
            var optFeeCal = parseInt(select_option_fee)+(parseInt(optFee)*parseInt(reserve_interval_day_val));
        }
        else{
            var optFeeCal = (parseInt(select_option_fee)+parseInt(optFee));  
            // alert('optFeeCal ' + optFeeCal);  
        }
        $("#select_option_fee").val(optFeeCal);
        totalCal();
    }
    else{
        $("#"+val).hide();
        var datasplit = chvaldata.split("^");
        var optFee = datasplit[2];
        // alert('optFee ' + optFee);
        var optFeeCal = parseInt(select_option_fee)-parseInt(optFee);
        // alert('optFeeCal ' + optFeeCal);
        $("#select_option_fee").val(optFeeCal);
        totalCal();
    }
    // alert(' chvaldata 2' + chvaldata);
}

function totalCal(){
    var select_guestroom_fee = $("#select_guestroom_fee").val();
    var select_discount = $("#discount").val();
    var select_option_fee = $("#select_option_fee").val();
    //  alert('select_guestroom_fee ' + select_guestroom_fee + ' select_discount ' + select_discount  + ' select_option_fee ' + select_option_fee);

    var select_discount_fee = parseInt(select_guestroom_fee) * parseInt(select_discount)/100;
    $("#select_discount_fee").val(select_discount_fee);
    var totalFee = parseInt(select_guestroom_fee) - parseInt(select_discount_fee) + parseInt(select_option_fee);
    $("#total_hap").text(totalFee.toLocaleString());
    $("#total_fee").text(totalFee.toLocaleString());
    $("#total_fee_input").val(totalFee);
    
}
function tr_hide(value){
       $(value).hide();
    }
function selecthide(val){
    var selid = "#"+val;
   $(selid).removeClass("active");
}
$("#reserve_btn").click(function(){
       pid = "2";
       var state = { 'page_id': 2, 'user_id': 5 }; 
       var title = 'Hello World'; 
       var url = '/bbs/board.php?bo_table=mall'; 
       history.pushState(state, title, url);
  $("#sub_page_detail").hide(); 
  $("#customer_info").show(); 
//   $("#login").show(); 
  move_top();
  var guestroom_name = $("#guestroom_name").val();
  var dateStr = $("#dateStr").val();
  var room_fee = $("#select_guestroom_fee").val();
  var option_fee = $("#select_option_fee").val();
  var discount_fee = $("#select_discount_fee").val();
  var total_fee = parseInt(room_fee)+parseInt(option_fee)-parseInt(discount_fee);
  $("#pay_total").text(total_fee.toLocaleString()+"원");
  $("#c_pay_total").val(total_fee);
$
  var add_fee = 0;
  var html = "";
//   alert('guestroom_name ' + guestroom_name + ' dateStr ' + dateStr  + ' room_fee ' + room_fee
//         + ' option_fee ' + option_fee + ' total_fee ' + total_fee
//       );
      var seloptionArray = new Array();
        $("input[name='selectopt']:checked").each(function() { 
            var seloptVal = $(this).val(); 
            // alert('seloptVal ' + seloptVal);
            seloptionArray.push(seloptVal);
        });
        $("#select_option").val(seloptionArray);
      var option_info_data_size = seloptionArray.length; //옵션갯수..
      var t=1;
      var optStr = "";
      var reserve_interval_day_val = $("#reserve_interval_day_val").val();
      for (step = 0; step < option_info_data_size; step++) {
        var datasplit = seloptionArray[step].split("^");
        var optcode = datasplit[0];
        var optname = datasplit[1];
        var optfee = datasplit[2];
        var option_divi = datasplit[3];
        if(option_divi == '2'){
            optfee = parseInt(optfee)*parseInt(reserve_interval_day_val);
        }
        optStr += "옵션명 : " + optname + " , 금액: " + parseInt(optfee).toLocaleString() + "원<br>";
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
   html += "<th>할인요금</th>";
   html += "<th>옵션요금</th>";
   html += "</tr>";
   html += "<tr>";
   html += "<td>" + parseInt(room_fee).toLocaleString() + "원</td>";
   html += "<td>" + parseInt(discount_fee).toLocaleString() + "원</td>";
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
    html += "<td>" + parseInt(room_fee).toLocaleString() + "원</td>";
    html += "<td>" + parseInt(discount_fee).toLocaleString() + "원</td>";
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
});

function reserve_fourth(){
  var reserve_name = $("#reserve_name").val();
//   var reserve_license = $("#reserve_license option:selected").val();
  var reserve_drive_age = $("#reserve_drive_age").val();
  var reserve_phone = $("#reserve_phone").val();
//   var reserve_person = $("#reserve_person").val();
  var reserve_email = $("#reserve_email").val();
//   var adultPerson = $("#adultPerson").val();
//   var childPerson = $("#childPerson").val();
  
  var guestroom_paymthod_val = $("input[name='guestroom_paymthod']:checked").val();
  if(reserve_name == ''){
     alert('예약자를 입력하세요.');
     $("#reserve_name").focus();
     return false;
   }

   if(reserve_drive_age == ''){
     alert('운전자연령을 만 나이로 입력하세요.');
     $("#reserve_drive_age").focus();
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
}

//function pg_payment_proc(reserve_code) {
//    var guestroom_name = "캠핑카예약";
//    var c_pay_total = $("#c_pay_total").val();
//      AUTHNICE.requestPay({
//        clientId: '<?php echo($clientId)?>',
//        method: 'card',
//        orderId: reserve_code,
//        amount: c_pay_total,
        // amount: 1004,
//        goodsName: guestroom_name,
//        returnUrl: 'http://jwsntech.barunweb.co.kr/bbs/board.php?bo_table=70&act_target=card_return',
//        fnError: function (result) {
            // alert('개발자확인용 : ' + result.errorMsg + '')
//        }
//      });
//}


function pg_payment_proc(reserve_code) {
    var guestroom_name = "캠핑카예약";
    var select_guestroom_fee = $("#select_guestroom_fee").val();
    var select_discount = $("#discount").val();
    var select_option_fee = $("#select_option_fee").val();
    var select_discount_fee = parseInt(select_guestroom_fee) * parseInt(select_discount)/100;
    $("#select_discount_fee").val(select_discount_fee);
    var card_pay_total = parseInt(select_guestroom_fee) - parseInt(select_discount_fee) + parseInt(select_option_fee);
    //var c_pay_total = total_fee
	//	var c_pay_total = $("#c_pay_total").val();
      AUTHNICE.requestPay({
        clientId: '<?php echo($clientId)?>',
        method: 'card',
        orderId: reserve_code,
        amount: card_pay_total,
        // amount: 1004,
        goodsName: guestroom_name,
        returnUrl: 'http://www.chanolja.co.kr/bbs/board.php?bo_table=mall&act_target=card_return',
        fnError: function (result) {

		//alert(card_pay_total + '개발자확인용 : ' + result.errorMsg + '')
        }
      });
}


function reserve_confirm_act(){
//   $("#sec7").hide();//예약 완료
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
          $("#reservation_inquiry").hide();//예약 완료
           $("#reservation_inquiry_list").show();//예약 완료
          if(conType == '1'){
            $("#confirm_area_mo").html(html);
          }
          else{
            $("#confirm_area_pc").html(html);
          }
        }
     }});
}
function reserve_fifth(reserve_code){
  $("#customer_info").hide();
  $("#reservation_completion").show();
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
        $("#reserve_fourth_area").hide();
        $("#reserve_fourth_area_mo").html(html);
      }
      else{ //pc
        $("#monotice").hide();
        $("#reserve_fourth_area_mo").hide();
        $("#reserve_fourth_area").html(html);
      }
   }});
   move_top();
  //$("#reserve_fourth_area").show();
  // var guestroom_code = $("#select_guestroom_code").val();
  // alert('reserve_second > guestroom_code ' + guestroom_code);
  // var option_array = split("_",)
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
    $("#customer_info").hide();
    $("#sub_page_detail").show();
    move_top();
  }
}

function login(admin) {
  var division = 'userlogin'
  var form_userid = $('#form_userid').val();
  var form_passwd = $('#form_passwd').val();
  var autologinVal = '';
  var top_menu_id = '';
  var left_menu_id = '';
//   var autologinVal = $('input:checkbox[id="remember"]').is(":checked");
  // alert( ' autologinVal ' + autologinVal);
  // var frm=document.form;
  // alert(form_passwd);
  if (form_userid == '' ) {
	alert("아이디를 입력하세요");
	$('#form_userid').focus();
	return false;
  }

  if (form_passwd == '' ) {
	alert("비밀번호를 입력하세요");
	$('#form_passwd').focus();
	return false;
  }
 $.ajax({
 type: 'POST',
 url: '/client/act/user_login.php',
 data: {
         division: division ,
         form_userid: form_userid ,
         form_passwd: form_passwd,
         autologinVal: autologinVal,
         top_menu_id: top_menu_id,
         left_menu_id: left_menu_id
 },
 error: function (request, status, error) {
   console.log('error');
 },
 success: function (text) {
    // console.log('text ' + text);
    if(text == 'success'){
        alert('success');
        purChase(form_userid)
    }else{
      alert(text);
    }
 },
});
}
function purChase(member){
    
    alert('member ' + member);
    if(member == 'nonmember'){
        $("#login").hide();
        $("#customer_info").show();
    }
    else if(member == 'memberjoin'){
        $("#login").hide();
    }
    else{
        form_userid = member;
        var division = 'userinfo'
            $.ajax({
            type: 'POST',
            url: '/client/act/user_login.php',
            data: {
                    form_userid: form_userid ,
                    division : division
            },
            error: function (request, status, error) {
            console.log('error');
            },
            success: function (json) {
                // console.log('text ' + json);
                var obj = json.dataret;
                var recode = obj[0].ret_code;
                var remsgArray = obj[0].ret_code_msg;
                if(recode == '100'){
                    var remsgsplit = remsgArray.split("^");
                    var ruid =  remsgsplit['0']
                    var rpho = remsgsplit['1']
                    var rem =  remsgsplit['2']
                    $("#reserve_name").val(ruid);
                    $("#reserve_phone").val(rpho);
                    $("#reserve_email").val(rem);
                    $("#login").hide();
                    $("#customer_info").show();
                }
            },
          });
       }
    
}
function fnCalCount(type, inputId){
    var divisionType = $("#divisionType").val();
    var targetId = "#"+inputId;
    var tCount = $(targetId).val();

    if(type=='p'){
        //   if(divisionType == '1'){
        //       if(targetId == '#adultPerson'){
        //         var checkAdultPerson = $("#adultPerson").val();
        //         if(checkAdultPerson >= '2'){
        //           alert('성인 허용 인원이 초과되었습니다.');
        //           return false;
        //         }
        //       }
        //   }
          var changeVal = Number(tCount)+1;
          $(targetId).val(changeVal);
        //   calcFee(inputId);
    }else{
          if(tCount > 0){
          var changeVal = Number(tCount)-1;
          $(targetId).val(changeVal);
        //   calcFee(inputId);
         }
    }
}

function reserve_confirm_detail(guestroom_reserve_code,dnum){
    $.ajax({
            type: 'GET',
            url: '/client/act/reserve_confirm_detail.php',
            data: {
                guestroom_reserve_code: guestroom_reserve_code
            },
            error: function (request, status, error) {
            console.log('error');
            },
            success: function (html) {
                
                // for (var i = 0; i < '10'; i++) { 
                //  $(".reserve_confirm_detail_data").hide();
                // }
                $(".reserve_confirm_detail_data").hide();
                var dataid = "#reserve_confirm_detail_data_"+dnum;
                $(dataid).html(html);
                $(dataid).show();
            },
          });

}
</script>
<!--<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=df0e6b53dd68e241445cdf16324475bb"></script> -->
<!--<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=63dd22443462e7c3d0e4dfbdb9c49b05"></script> -->

<script>
        function mapstart(){
          var mapidVal = $("#mapid").val();
          if(mapidVal == 'getData'){
            var tMapVal = "map";
          }
          else{
            var tMapVal = "mapDetail";
          }

          var mapContainer = document.getElementById(tMapVal), // 지도를 표시할 div 
        //   alert('mapstart ' + mapContainer);
              mapOption = { 
                  center: new kakao.maps.LatLng(37.5407622,127.0706095), // 지도의 중심좌표
                  level: 3 // 지도의 확대 레벨
              };
          
          var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
          
          // 마커가 표시될 위치입니다 
          var markerPosition  = new kakao.maps.LatLng(37.5407622,127.0706095); 
          
          // 마커를 생성합니다
          var marker = new kakao.maps.Marker({
              position: markerPosition
          });
          
          // 마커가 지도 위에 표시되도록 설정합니다
          //marker.setMap(map);
          
          // 인포윈도우를 생성합니다
          var infowindow = new kakao.maps.InfoWindow({
              content : "<div style='position: absolute; left: 0px; top: 0px;'><div style='width:140px;padding:1px;text-align:center;'>칠성종합시장</div></div>" 
          });
            
          // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
          //infowindow.open(map, marker); 
          
          var imageSrc = 'https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/marker_red.png';                              // 마커이미지 주소
              imageSize = new kakao.maps.Size(34, 36);                // 마커이미지의 크기
              imageOption = {offset: new kakao.maps.Point(17, 36)};   // 마커의 좌표와 일치시킬 이미지 안에서의 좌표설정
                
          // 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
          var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);
          
          // var arr = <?php echo json_encode($arrayLocation)?>; 
          if(mapidVal == 'getData'){
            var arr = JSON.parse($("#arrayLocation").val());
          }
          else{
            var arr = JSON.parse($("#arrayLocationDetail").val());
          }
          
          // 지도를 재설정할 범위정보를 가지고 있을 LatLngBounds 객체를 생성합니다
          var bounds = new kakao.maps.LatLngBounds();   
          // var arr = new Array();
          // arr[0] = ["칠성시장북편 노상공영주차장",35.8780671960342,128.60320927213, "대구 북구 칠성동1가 275-3","1980287267"];
          // arr[1] = ["칠성시장방범초소 노상공영주차장",35.8794483127273,128.602329365994, "대구 북구 칠성동2가 409-24","1438742395"];
          // arr[2] = ["신천둔치주차장",35.8767253660639,128.605336577613, "대구 북구 칠성동1가 276-1","10068807"];
          // arr[3] = ["칠성시장서편 노상공영주차장",35.8771714863247,128.601464917779, "대구 북구 칠성동1가 236-1","27154726"];
          // arr[4] = ["칠성공영주차장",35.8761081400681,128.601660859567, "대구 북구 칠성남로 196","20587860"];
          // arr[5] = ["신천교고가도로밑 노상공영주차장",35.875440484078,128.607219820583, "대구 북구 칠성동1가 279-1","842394951"];
          
          
          var markerTmp;      // 마커
          var customOverlay;  // 오버레이
          var contentStr;
          var points = [];
          for (var i=0;i<arr.length;i++) {
            //   console.log('place ' + arr[i].place + ' lat ' + arr[i].lat + ' lng ' + arr[i].lng);
              var pushval = arr[i].lat+","+arr[i].lng;
              points.push(new daum.maps.LatLng(arr[i]['lat'],arr[i]['lng']));
              markerTmp = new daum.maps.Marker({
                  position: new daum.maps.LatLng(arr[i]['lat'],arr[i]['lng']),
                  title: arr[i]['address'],
                  image: markerImage,
                  map:map,
              });
              contentStr = "<div class='customoverlay'><span class='title'>"+ arr[i]['place'] +"</span></div>";
              customOverlay = new kakao.maps.CustomOverlay({
                  map: map,
                  position: new daum.maps.LatLng(arr[i]['lat'],arr[i]['lng']),
                  content: contentStr,
                  yAnchor: 1 
              });
              bounds.extend(points[i]);
          }
          // 지도 타입 변경 컨트롤을 생성한다
          var mapTypeControl = new kakao.maps.MapTypeControl();
          // 지도의 상단 우측에 지도 타입 변경 컨트롤을 추가한다
          map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);    
          // 지도에 확대 축소 컨트롤을 생성한다
          var zoomControl = new kakao.maps.ZoomControl();
          // 지도의 우측에 확대 축소 컨트롤을 추가한다
          map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
          // 아래 코드는 지도 위의 마커를 제거하는 코드입니다
          // marker.setMap(null);  
          map.setBounds(bounds);
        }
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqXhJaRyRChZ7AHsX-DpjuQzOvlZf2fnE&callback=initMap&libraries=&v=weekly"async></script>
</body>
<script>
function initMap() {
const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: { lat: 37.5407622, lng: 127.0706095 },
});
for (var i = 0; i < locations.length; i++) {
    var marker = new google.maps.Marker({
        map: map,
        label: locations[i].place,
        position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
    });
}
}
const locations = [
{ place:"건대입구역", lat: 37.539922, lng: 127.070609 },
{ place:"어린이대공원역", lat: 37.547263, lng: 127.074181 },
];

</script> -->