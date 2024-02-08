
  // 다른데 클릭시 토글 숨김
$(document).click(function(e) {
  $('.view_layer').each(function(){
    var box = $(this).parent().find('.box');
    if (box.css('display') == 'block') {
      if(e.target != ""){
        if (!$('.view_layer').has(e.target).length && !$('.view_layer_toggle').has(e.target).length) {
          box.fadeOut(200);
          box.removeClass('view_layer_toggle');
          $(this).removeClass('selected');
        }
      }else{
        if(e.target.className.indexOf('view_layer') == -1){
          box.fadeOut(200);
          box.removeClass('view_layer_toggle');
          $(this).removeClass('selected');
        }
      }
    }
  });
});

	$(document).ready(function() {
		// 위로가기
		$('#scroll_top').click(function(){
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});
		// 아래로가기
		$('#scroll_bottom').click(function(){
			$('html, body').animate({scrollTop:$(document).height()}, 'slow');
			return false;
		});

    // 탑메뉴 토글
    	$('.view_layer').click(function(){
    		$('#version_alarm').fadeOut(200);
    		var box = $(this).parent().find('.box');
    		if (box.css('display') == 'block') {
    			box.fadeOut(200);
    			box.removeClass('view_layer_toggle');
    			$(this).removeClass('selected');
    		} else {
    			$('.quick').find('.box').hide();
    			box.fadeIn(200);
    			box.addClass('view_layer_toggle');
    			$(this).addClass('selected');
    		}
    	});
	});

	function warning(str,objid){
		alert(str);
		var objid = "#"+objid;
		$(objid).focus();
		return;
	}

  function find_address() {
          new daum.Postcode({
              oncomplete: function(data) {
                  var addr = ''; // 주소 변수
                  var extraAddr = ''; // 참고항목 변수
                  if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                      addr = data.roadAddress;
                  } else { // 사용자가 지번 주소를 선택했을 경우(J)
                      addr = data.jibunAddress;
                  }

                  // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                  if(data.userSelectedType === 'R'){
                      // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                      // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                      if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                          extraAddr += data.bname;
                      }
                      // 건물명이 있고, 공동주택일 경우 추가한다.
                      if(data.buildingName !== '' && data.apartment === 'Y'){
                          extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                      }
                      // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                      if(extraAddr !== ''){
                          extraAddr = ' (' + extraAddr + ')';
                      }
                      // 조합된 참고항목을 해당 필드에 넣는다.
  //                    document.getElementById("sample6_extraAddress").value = extraAddr;

                  } else {
  //                    document.getElementById("sample6_extraAddress").value = '';
                  }

                  // 우편번호와 주소 정보를 해당 필드에 넣는다.
                  document.getElementById('zip_code').value = data.zonecode;
                  document.getElementById("address").value = addr;
                  // 커서를 상세주소 필드로 이동한다.
                  document.getElementById("address_detail").focus();
              }
          }).open();
      }

      function idcheck(){
        // var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        // var Digit = '1234567890'
      var division = "idcheck";
      var userid = $('#userid').val();
    //   var useridCheck = reg_email_check(userid);

      if(userid == ""){
        alert('아이디를 입력하세요.');
        return false;
      }
        // if (Tcheck(userid, Alpha + Digit, 5, 100,"아이디",'id')){
        //           return false;
        //  }

         $.ajax({
                  type: 'GET',
                  url: './check.php',
                  data: "&userid="+userid+"&division="+division,
                  dataType:"json",
                  error: function (request, status, error) {
                    console.log('idcheck error');
                  },
                  success : function(json) {
                    var obj = json.dataret;
                    // var obj  = JSON.parse(data);
                    var recode = obj[0].ret_code;
                    var recode_msg = obj[0].ret_code_msg;
                     console.log('recode ' + recode + ' recode_msg ' + recode_msg);
                     alert(recode_msg);
                     if(recode == '100'){ //성공
                       $("#idcheck_ok").val("Y");
                     }else{
                       $("#idcheck_ok").val("N");
                     }
                  },
                });

      }

      function Tcheck(target, astr, lmin, lmax, targetname,checkval) {
        var i
        var t = target
        if (t.length < lmin || t.length > lmax) {
      	if (lmin == lmax) alert( + lmin + "글자로  " + targetname + "를 입력하십시오.");
      	else alert(+ lmin + ' ~ ' + lmax + "글자로  " + targetname + "를 입력하십시오.");
      	return true;
        }
      //  alert(' checkval ' + checkval);
        if(checkval == 'id'){
          if (astr.length > 1)  {
      	for (i=0; i<t.length; i++)
      	  if(astr.indexOf(t.substring(i,i+1))<0) {
      		alert(targetname + "에 허용할 수 없는 문자가 입력되었습니다.");
      //		target.focus()
      		return true ;
      	  }
        }
        }
        return false ;

      }

      function handphonecheck(){
        var division = "handphonecheck";
          var handphone = $('#handphone').val();
        var nicname = $('#nicname').val();
        if( handphone == '' || handphone == 'undefined') {
             alert('휴대폰번호를 입력하셔야 합니다.');
             return false;
        }
         $.ajax({
                  type: 'GET',
                  url: './check.php',
                  data: "&handphone="+handphone+"&division="+division,
                  dataType:"json",
                  error: function (request, status, error) {
                    console.log('idcheck error');
                  },
                  success : function(json) {
                    var obj = json.dataret;
                    var recode = obj[0].ret_code;
                    var recode_msg = obj[0].ret_code_msg;
                     alert(recode_msg);
                     if(recode == '100'){ //성공
                       $("#handphone_ok").val("Y");
                     }else{
                       $("#handphone_ok").val("N");
                     }
                  },
                });

      }