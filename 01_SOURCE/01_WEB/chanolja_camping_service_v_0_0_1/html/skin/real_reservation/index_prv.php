<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pensionConf.php";
$cookname = $_COOKIE['barunPensionAdmin'];
if($cookname){
$pen_mem_uid = $_COOKIE['pen_mem_uid'];
$pen_mem_autologin = $_COOKIE['pen_mem_autologin'];
}
// echo "
// cookname >>> $cookname <br>
// pen_mem_uid >>> $pen_mem_uid <br>
// pen_mem_autologin >>> $pen_mem_autologin <br>
// ";
if($pen_mem_autologin){
  $checked_str = "checked";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>바른펜션 관리시스템</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=$file_url?>/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>바른펜션 관리시스템</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">로그인</p>

      <!-- <form method="post"> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="아이디" name="form_userid" id="form_userid"  value="somang73">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="비밀번호" name="form_passwd" id="form_passwd" value="12345">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" <?=$checked_str?>>
              <label for="remember">
                아이디저장
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block" onclick="login('admin'); return false;">LogIn</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
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
 type: 'GET',
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
 success: function (text) {
    console.log('text ' + text);
    if(text == 'success'){
        location.href="/pension_prj/management/management.php?top_menu_id=1001&left_menu_id=001";
    }else{
      alert(text);
    }
 },
});
 	// frm.action="admin_login.php";
	// frm.submit();
}
</script>
</body>
</html>
