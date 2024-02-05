<?php
  // //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

   $division = isset( $_REQUEST['division'] ) ?  $_REQUEST['division']  : '';
   if($division == 'idcheck'){
   $userid = isset( $_REQUEST['userid'] ) ?  $_REQUEST['userid']  : '';
	 $sql = "SELECT count(seq) as num FROM $SALES_MEMBERS_TB WHERE user_id  = '{$userid}'";
   $result = sql_query($sql);
   $rows = mysqli_fetch_array($result);
   $idnum = $rows['num'];

     if($idnum >= 1){
       $re_code = "101";
       $msg = "이미 사용중인 아이디 입니다.";
       $json = json_output($re_code,$msg);
       echo "$json";
       exit;
    }else{
      $re_code = "100";
      $msg = "사용 가능한 아이디 입니다.";
      $json = json_output($re_code,$msg);
      echo "$json";
      exit;
    }
  }
  else if($division == 'nicnamecheck'){
    $nicname = isset( $_REQUEST['nicname'] ) ?  $_REQUEST['nicname']  : '';
 	  $sql = "SELECT count(seq) as num FROM $SALES_MEMBERS_TB WHERE nicname  = '{$nicname}'";
    $result = sql_query($sql);
    $rows = mysqli_fetch_array($result);
    $nicnamenum = $rows['num'];

      if($nicnamenum >= 1){
        $re_code = "101";
        $msg = "이미 사용중인 닉네임 입니다.";
        $json = json_output($re_code,$msg);
        echo "$json";
        exit;
     }else{
       $re_code = "100";
       $msg = "사용 가능한 닉네임 입니다.";
       $json = json_output($re_code,$msg);
       echo "$json";
       exit;
     }
  }
  else if($division == 'handphonecheck'){
    $handphone = isset( $_REQUEST['handphone'] ) ?  $_REQUEST['handphone']  : '';
 	  $sql = "SELECT count(seq) as num FROM $SALES_MEMBERS_TB WHERE handphone  = '{$handphone}'";
    $result = sql_query($sql);
    $rows = mysqli_fetch_array($result);
    $handphonenum = $rows['num'];

      if($handphonenum >= 1){
        $re_code = "101";
        $msg = "이미 사용중인 핸드폰번호 입니다.";
        $json = json_output($re_code,$msg);
        echo "$json";
        exit;
     }else{
       $re_code = "100";
       $msg = "사용 가능한 핸드폰번호 입니다.";
       $json = json_output($re_code,$msg);
       echo "$json";
       exit;
     }
  }
  else if($division == 'nicnameModify'){
    $nicname = isset( $_REQUEST['nicname'] ) ?  $_REQUEST['nicname']  : '';
    $userid = isset( $_REQUEST['userid'] ) ?  $_REQUEST['userid']  : '';

    $sql = "SELECT count(seq) as num FROM $SALES_MEMBERS_TB WHERE nicname  = '{$nicname}'";
    $result = sql_query($sql);
    $rows = mysqli_fetch_array($result);
    $nicnamenum = $rows['num'];

      if($nicnamenum >= 1){
        $re_code = "101";
        $msg = "이미 사용중인 닉네임 입니다.";
        $json = json_output($re_code,$msg);
        echo "$json";
        exit;
     }else{
       $sql = "UPDATE $SALES_MEMBERS_TB SET nicname = '{$nicname}' WHERE user_id  = '{$userid}'";
       sql_query($sql);
       $sql2 = "UPDATE $MEMBERS_COUNSELORS_TB SET nicname = '{$nicname}' WHERE user_id  = '{$userid}'";
       sql_query($sql2);
//        echo "
// sql > $sql <br>
// sql2 > $sql2 <br>
//        ";
       $re_code = "100";
       $msg = "닉네임을 변경 하였습니다.";
       $json = json_output($re_code,$msg);
       echo "$json";
       exit;
     }
  }
?>
