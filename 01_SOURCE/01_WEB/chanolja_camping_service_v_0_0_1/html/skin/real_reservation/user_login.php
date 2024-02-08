<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

$autologinVal = isset($_REQUEST['autologinVal']) ? $_REQUEST['autologinVal'] : '';


if (isset($_REQUEST['form_userid']) && isset($_REQUEST['form_passwd'])) {
  $userid = $_REQUEST["form_userid"];
  $passwd = $_REQUEST["form_passwd"];
  if (!$passwd) {
    // $msg = "비밀번호를 입력하세요.";
    // result_msg($msg);
    // exit;
    $re_code = "200";
    $msg = "비밀번호를 입력하세요.^" . $_SESSION['session_user_level'];
    $json = json_output($re_code, $msg);
    echo "$json";
    exit;
  }
  $str = "SELECT COUNT(seq) as dataNum FROM $SALES_MEMBERS_TB WHERE user_id = '$userid' and approve = 'Y'";
  // $result = sql_query($str);
  $row = sql_fetch($str);
  $count = $row['dataNum'];
  if ($count < 1) {
    //  $msg = "확인이 이루어지지않은  아이디입니다.";
    //  result_msg($msg);
    //  exit;
    $re_code = "200";
    $msg = "확인이 이루어지지않은  아이디입니다.^" . $_SESSION['session_user_level'];
    $json = json_output($re_code, $msg);
    echo "$json";
    exit;
  }
  //   $password = password_hash($passwd, PASSWORD_DEFAULT);
  //   echo "
  //   password > $password <br>
  //   ";
  $str = "SELECT * FROM $SALES_MEMBERS_TB WHERE user_id = '$userid'";
  // $result = sql_query($str);
  $row = sql_fetch($str);
  // if($user_level == '1' || $user_level == '2'){
  $verify = password_verify($passwd, $row['passwd']);
  if (!password_verify($passwd, $row['passwd'])) {
    // $msg = "비밀번호가 틀립니다.";
    // result_msg($msg);
    // exit;
    //  $re_code = "200";
    //  $msg = "비밀번호가 틀립니다.";
    //  $json = json_output($re_code,$msg);
    //  echo"$json";
    //  exit;
    // $msg = "비밀번호가 틀립니다.";
    // result_msg($msg);
    // exit;
    $re_code = "200";
    $msg = "비밀번호가 틀립니다.^" . $_SESSION['session_user_level'];
    $json = json_output($re_code, $msg);
    echo "$json";
    exit;
  }

  // session_name( md5( $SITE_NAME ) );
  // session_start();
  if (!session_id()) {
    session_start();
    //     echo "
    // session_start >>>
    //     ";
  }
  $logintime   = time();
  $session_id = md5($row['seq'] . $row['user_id'] . $logintime);

  $str = "INSERT INTO $SALES_SESSION_TB
          (user_id,com_name,nicname,email,handphone,logintime,session_id,userseq,user_level)
          VALUES
          ('$row[user_id]', '$row[com_name]', '$row[nicname]','$row[email]','$row[handphone]','$logintime', '$session_id', '$row[seq]', '$row[user_level]')";
          ///
          // INSERT INTO sales_session
          // (user_id,com_name,nicname,email,logintime,session_id,userseq,user_level)
          // VALUES
          // ('jwsntech', '', '','','1695455471', 'fb196450b839d1919b4b8163648244ed', '1531', 'A')
  //             echo "
  // str >>> $str <br>
  //             ";
  // echo $str;
  $result = sql_query($str);
  $result == 'false';

  if ($result == false) {
    // echo "<script>alert('로그인 오류입니다'); document.location.href='$LOGIN_PAGE';</script>\n";
    // $msg = "로그인 오류입니다.";
    // result_msg($msg);
    // exit;
    $re_code = "200";
    // $msg = "로그인 오류입니다.^".$_SESSION['session_user_level'];
    $msg = "로그인 오류입니다.";
    $json = json_output($re_code, $msg);
    echo "$json";
    exit;
  }

  $upstr = "UPDATE $SALES_MEMBERS_TB SET counter=counter+1 , lastlogin = now() WHERE user_id = '$row[user_id]'";
  sql_query($upstr);

  $_SESSION['session_id']    = $session_id;
  $_SESSION['session_seq']    = $row['seq'];
  $_SESSION['session_user_id']    = $row['user_id'];
  $_SESSION['session_company_name']    = $row['com_name'];
  $_SESSION['session_email']    = $row['email'];
  $_SESSION['session_user_level'] = $row['user_level'];
  $_SESSION['session_logintime'] = $logintime;
  session_write_close();


  if ($autologinVal == 'true') {
    $exp = time() + 86400 * 365; // 다시 1년 유효
    setcookie($cookname, $cookname, $exp, "/");
    setcookie("mem_uid", $row['user_id'], $exp, "/");
    setcookie("mem_autologin", $autologinVal, $exp, "/");
  } else {
    setcookie($cookname, $cookname, time() - 3600, "/");
    setcookie("mem_uid", $row['user_id'], time() - 3600, "/");
    setcookie("mem_autologin", $autologinVal, time() - 3600, "/");
  }

  /*성수기,준성수기 변경처리*/
  peak_season_update($MANAGEMENT_RESERVE_PEAK_DATE_TB);
  peak_season_update($MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB);
  /*
  setcookie("admin_uid",    $row[userid],$LOGIN_TIME,"/");
	setcookie("admin_ulevel", $row[user_level],$LOGIN_TIME,"/");
  */
  // $LOGIN_SUCCESS = "/alliance/AllianceList.php?&classification=10&collapse=alliance"; //đ°?
  // if ($return_uri) $LOGIN_SUCCESS = $return_uri;
  // $msg = "success";
  // echo"$msg";
  // exit;
  //echo "<script>document.location.href='$LOGIN_SUCCESS';</script>\n";
  //exit();
  $re_code = "100";
  $msg = "success^" . $_SESSION['session_user_level'];
  $json = json_output($re_code, $msg);
  echo "$json";
  exit;
} else {
  //  $msg = "회원ID, 비밀번호가 틀립니다.";
  //  result_msg($msg);
  //  exit;
  $re_code = "200";
  $msg = "회원ID, 비밀번호가 틀립니다.^" . $_SESSION['session_user_level'];
  $json = json_output($re_code, $msg);
  echo "$json";
  exit;
  //  echo "<script>alert('회원ID, 비밀번호가 틀립니다');
  // document.location.href='$LOGIN_PAGE';</script>\n";
}

function result_msg($rmsg)
{
  echo "$rmsg";
}
// echo "$msg";
