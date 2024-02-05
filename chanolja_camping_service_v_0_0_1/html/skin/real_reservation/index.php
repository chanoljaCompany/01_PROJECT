<?
//error_reporting(E_ALL);
ini_set("display_errors", 1);
 require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
 require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

$mem_uid = "";
$mem_autologin = "";
$checked_str = "";

if($cookname){
$mem_uid = isset($_COOKIE['mem_uid']) ? $_COOKIE['mem_uid'] : '' ;
$mem_autologin = isset($_COOKIE['mem_autologin']) ? $_COOKIE['mem_autologin'] : '';
}
if($mem_autologin){
  $checked_str = "checked";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>관리시스템</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=$file_url?>/css/adminlte_new.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=$file_url?>/js/pen_common.js?time=<?=time();?>"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="#"><b>예약 관리시스템</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">로그인</p>
    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <!-- <input type="email" class="form-control" placeholder="Email"> -->
        <input type="text" class="form-control" placeholder="아이디" name="form_userid" id="form_userid"  value="<?=$mem_uid?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <!-- <input type="password" class="form-control" placeholder="Password"> -->
        <input type="password" class="form-control" placeholder="비밀번호" name="form_passwd" id="form_passwd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="checkbox" id="remember" <?=$checked_str?>>아이디저장
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat" onclick="login('admin'); return false;">LogIn</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p></p>
      <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#joinModal" data-whatever="@getbootstrap"><i class="text-center"></i>가입문의</a>
    </div> -->
    <!-- /.social-auth-links -->
    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script>
var conType = "<?=$conType?>";
$(document).ready(function() {
  $('#joinModal').on('show.bs.modal', function (event) { // saupFileModal 윈도우가 오픈할때 아래의 옵션을 적용
      var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
      var recipient = button.data('whatever'); // Extract info from data-* attributes
        $.ajax({
          url:"join_modal.php",
          cache:false,
          success:function(result){
          $("#joinModalBody").html(result);
        }});
  });
  $('#question_input').click(function(){
    var division = "question";
    var question_name = $("#question_name").val();
    var question_phone = $("#question_phone").val();
    var question_content = $("#question_content").val();
    if(question_name == '') { warning('성함을','question_name'); return false; }
    if(question_phone == '') { warning('연락처를','question_phone'); return false; }

    var result = confirm("문의를 남기시겠습니까?");
         if(result){ //확인 클릭 시
           $.ajax({
             type: 'POST',
             url:"question_write_action.php",
             data: {
                    division : division,
                    question_name : question_name,
                    question_phone : question_phone,
                    question_content : question_content,
                    top_menu_id: top_menu_id,
                    left_menu_id: left_menu_id
                  },
             cache:false,
                success:function(result){
                     // alert(result);
                 if(result == 'ok'){
                      alert('정상적으로 문의를 접수하였습니다.감사합니다.');
                    // location.reload();
                    // reserve_search_act();
                    $("#question_input .close").click();
                  }else{
                      alert('문의처리중 에러가 발생하였습니다.');
                  }
                 location.reload();
            }});
         }
  });
});



var top_menu_id ="login";
var left_menu_id ="login";
function login(admin) {
  var form_userid = $('#form_userid').val();
  var form_passwd = $('#form_passwd').val();
  var autologinVal = $('input:checkbox[id="remember"]').is(":checked");
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
 url: './user_login.php',
 data: {
         form_userid: form_userid ,
         form_passwd: form_passwd,
         autologinVal: autologinVal,
         top_menu_id: top_menu_id,
         left_menu_id: left_menu_id
 },
 error: function (request, status, error) {
   console.log('error');
 },
 success: function (json) {
    var obj = json.dataret;
    var recode = obj[0].ret_code;
    var recode_msg = obj[0].ret_code_msg;
    var textsplit = recode_msg.split("^");
    var sptext = textsplit[0];
    var splevel = textsplit[1];
    console.log('recode ' + recode + ' recode_msg ' + recode_msg);
    // alert(splevel);
    if(sptext == 'success'){
        if(splevel == 'A'){
          location.href="/real_reservation/management/management.php?top_menu_id=1001&left_menu_id=001";
        }
        else{
          location.href="/real_reservation/management/management_host.php?top_menu_id=1001&left_menu_id=001";
        }
    }else{
        alert(sptext);
    //   alert('b');
    }
 },
});
}

</script>
<div class="modal fade" id="joinModal" tabindex="-1" role="dialog" data-backdrop='static'  aria-labelledby="joinModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="joinModalModalTitle">가입문의</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="joinModalBody">
        ...
      </div>
      <div class="modal-footer">
				<button type="button" class="btn btn-warning" id="question_input">등록</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div>
</body>
</html>
