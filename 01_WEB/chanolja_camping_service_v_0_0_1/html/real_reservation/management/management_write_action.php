<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$mod_date = date("Y-m-d");
$mod_ip = $_SERVER['REMOTE_ADDR'];
$division = $_REQUEST["division"];
$payment_method = $_REQUEST["payment_method_array"];
$weekend_fee_set = $_REQUEST["weekend_fee_set_array"];
$pick_datachange = $_REQUEST["pick_datachange"];
$semi_pick_datachange = $_REQUEST["semi_pick_datachange"];

if($division == 'management') { //팬션기본정보 설정
            $homepage_subject = trim($_REQUEST["homepage_subject"]);
            $homepage_url = trim($_REQUEST["homepage_url"]);
            $ceo_name = trim($_REQUEST["ceo_name"]);
            $company_name = trim($_REQUEST["company_name"]);
            $saup_number = trim($_REQUEST["saup_number"]);
            $cellphone = trim($_REQUEST["cellphone"]);
            $phone_number = trim($_REQUEST["phone_number"]);
            $fax_number = trim($_REQUEST["fax_number"]);
            $zip_code = trim($_REQUEST["zip_code"]);
            $address = trim($_REQUEST["address"]);
            $address_detail = trim($_REQUEST["address_detail"]);
            $email = trim($_REQUEST["email"]);
            $account_name = trim($_REQUEST["account_name"]);
            $account_number = trim($_REQUEST["account_number"]);
            $account_holder = trim($_REQUEST["account_holder"]);
            $number_rooms = trim($_REQUEST["number_rooms"]);
            $pg_name = trim($_REQUEST["pg_name"]);
            $pg_code = trim($_REQUEST["pg_code"]);
            $pg_key = trim($_REQUEST["pg_key"]);
            $membership_agreement = trim($_REQUEST["membership_agreement"]);
            $privacy_policy = trim($_REQUEST["privacy_policy"]);
          /*부대시설정보입력*/
          $sql = "INSERT INTO $MANAGEMENT_TB
                  (user_id,homepage_subject,homepage_url, ceo_name, company_name,saup_number,cellphone,phone_number,fax_number,zip_code,address,address_detail,email
                   ,account_name,account_number,account_holder,number_rooms,pg_name,pg_code,pg_key,payment_method,membership_agreement,privacy_policy
                   ,mod_ip,mod_date)
                  VALUES
                  ('".$_SESSION['session_user_id']."','$homepage_subject','$homepage_url','$ceo_name','$company_name','$saup_number','$cellphone','$phone_number','$fax_number'
                   ,'$zip_code','$address','$address_detail','$email','$account_name','$account_number','$account_holder','$number_rooms','$pg_name'
                   ,'$pg_code','$pg_key','$payment_method','$membership_agreement','$privacy_policy','$mod_ip','$mod_date')
                   ON DUPLICATE KEY UPDATE
                    homepage_subject = '$homepage_subject'
                    ,homepage_url = '$homepage_url'
                    ,ceo_name = '$ceo_name'
                    ,company_name = '$company_name'
                    ,saup_number = '$saup_number'
                    ,cellphone = '$cellphone'
                    ,phone_number = '$phone_number'
                    ,fax_number = '$fax_number'
                    ,zip_code = '$zip_code'
                    ,address = '$address'
                    ,address_detail = '$address_detail'
                    ,email = '$email'
                    ,account_name = '$account_name'
                    ,account_number = '$account_number'
                    ,account_holder = '$account_holder'
                    ,number_rooms = '$number_rooms'
                    ,pg_name = '$pg_name'
                    ,pg_code = '$pg_code'
                    ,pg_key = '$pg_key'
                    ,payment_method = '$payment_method'
                    ,membership_agreement = '$membership_agreement'
                    ,privacy_policy = '$privacy_policy'
                    ,mod_ip = '$mod_ip'
                    ,mod_date = '$mod_date'
                    ";
          // echo "
          // sql : $sql <br>
          // ";
          	 $result = sql_query($sql);
             $msg = "상점기본정보를 등록/변경 하였습니다.";
             //$msg = iconv("UTF-8","EUC-KR", "상품기본정보를 등록/변경 하였습니다");
             echo "<script>alert('".$msg."');</script>";
             echo "<meta http-equiv='Refresh' content='0; URL=management.php?top_menu_id=1001&left_menu_id=001'>";
             exit;
 }
 else if($division == 'management_reserve') { //팬션예약기본정보 설정
             $userid = $_REQUEST["userid"];
             $peak_season = $_REQUEST["peak_season"];
             $peak_season_whether = $_REQUEST["peak_season_whether"];
             $weekend_whether = $_REQUEST["weekend_whether"];
             $weekend_setting_start = $_REQUEST["weekend_setting_start"];
             $weekend_setting_end = $_REQUEST["weekend_setting_end"];
             $weekend_fee_set = isset($_REQUEST['weekend_fee_set']) ? $_REQUEST['weekend_fee_set'] : 'N';

           $sql = "INSERT INTO $MANAGEMENT_RESERVE_TB
                   (user_id,peak_season_whether,weekend_whether,weekend_setting_start,weekend_setting_end
                   ,weekend_fee_set,mod_ip,mod_date)
                   VALUES
                   ('".$userid."','$peak_season_whether','$weekend_whether','$weekend_setting_start','$weekend_setting_end'
                   ,'$weekend_fee_set','$mod_ip','$mod_date')
                    ON DUPLICATE KEY UPDATE
                    peak_season_whether = '$peak_season_whether'
                     ,weekend_whether = '$weekend_whether'
                     ,weekend_setting_start = '$weekend_setting_start'
                     ,weekend_setting_end = '$weekend_setting_end'
                     ,weekend_fee_set = '$weekend_fee_set'
                     ,mod_ip = '$mod_ip'
                     ,mod_date = '$mod_date'
                     ";
        //    echo "
        //    sql : $sql <br>
        //    ";
            $result = sql_query($sql);
            $peak_season_explode = explode("-",$peak_season);
            $peak_season_explode = str_replace('/' , '-', $peak_season_explode);

            $sql = "UPDATE $MANAGEMENT_RESERVE_PEAK_DATE_TB  
                    SET 
                    peak_season_start_date = '".$peak_season_explode['0']."'
                   ,peak_season_end_date = '".$peak_season_explode['1']."' 
                    WHERE 1=1
                    AND user_id = '".$userid."'";
            $result = sql_query($sql);
        //     echo "
        //    sql : $sql <br>
        //    ";
            $re_code = "100";
            $msg = "예약기본정보를 등록/변경 하였습니다.";
            $json = json_output($re_code,$msg);
            echo"$json";
            exit;
 }
 else if($division == 'management_reserve_delete'){
    $userid = isset($_REQUEST['val3']) ? $_REQUEST['val3'] : '';

    $sql = "DELETE FROM $MANAGEMENT_RESERVE_TB
            WHERE 1=1
            AND user_id = '".$userid."'";
    sql_query($sql);
    
    $sql = "DELETE FROM $MANAGEMENT_RESERVE_PEAK_DATE_TB
            WHERE 1=1
            AND user_id = '".$userid."'";
    sql_query($sql);
    $re_code = "100";
    $msg = "예약기본정보 삭제 하였습니다.";
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
  }
 
 else if($division == 'management_reserve_info'){
   $sub_id = $_REQUEST["sub_id"];
   $left_menu_id = $_REQUEST["left_menu_id"];
   $reserve_info = $_REQUEST["reserve_info"];
   $column_name = $_REQUEST["column_name"];
       $sql = "INSERT INTO $MANAGEMENT_RESERVE_INFO_TB
               (user_id,$column_name,mod_ip,mod_date)
               VALUES
               ('".$_SESSION['session_user_id']."','$reserve_info','$mod_ip','$mod_date')
                ON DUPLICATE KEY UPDATE
                 $column_name = '$reserve_info'
                 ,mod_ip = '$mod_ip'
                 ,mod_date = '$mod_date'
                 ";
         $result = sql_query($sql);
         $msg = iconv("UTF-8","EUC-KR", "정보를 등록/변경 하였습니다");
         echo "<script>alert('".$msg."');</script>";
         echo "<meta http-equiv='Refresh' content='0; URL=management_reserve_info.php?top_menu_id=1001&left_menu_id=".$left_menu_id."&sub_id=".$sub_id."'>";
         exit;
 }

 else if($division == 'member_input') { //회원등록
    $manager = isset( $_REQUEST['manager'] ) ?  $_REQUEST['manager']  : '';
    $userid = isset( $_REQUEST['userid'] ) ?  $_REQUEST['userid']  : '';
    $passwd = isset( $_REQUEST['passwd'] ) ?  $_REQUEST['passwd']  : '';
    $handphone = isset( $_REQUEST['handphone'] ) ?  $_REQUEST['handphone']  : '';
    $com_name = isset( $_REQUEST['com_name'] ) ?  $_REQUEST['com_name']  : '';
    $zip_code = isset( $_REQUEST['zip_code'] ) ?  $_REQUEST['zip_code']  : '';
    $address = isset( $_REQUEST['address'] ) ?  $_REQUEST['address']  : '';
    $address_detail = isset( $_REQUEST['address_detail'] ) ?  $_REQUEST['address_detail']  : '';
    $passwd = password_hash($passwd, PASSWORD_DEFAULT);
    // $get_geolocation_google = get_geolocation_google($address);
    // $geolocationExp = explode("^",$get_geolocation_google);
    // $lat = $geolocationExp['0'];
    // $lng = $geolocationExp['1'];
    $get_geolocation_kakao = get_geolocation_kakao($address);
    $geolocationExp = explode("^",$get_geolocation_kakao);
    $lat = $geolocationExp['0'];
    $lng = $geolocationExp['1'];
       $sql = "INSERT INTO $SALES_MEMBERS_TB
              (user_id,passwd, handphone,com_name,zip1,address,address_no,signdate,lastlogin,user_level,approve,counter,latitude,longitude)
              VALUES
              ('$userid','$passwd','$handphone','$com_name','$zip_code','$address','$address_detail',now(),now(),'$manager','Y','0','$lat','$lng')";
       $result = sql_query($sql);

    //예약관련 기본정보등록
    $sql = "INSERT INTO $MANAGEMENT_RESERVE_TB
    (user_id,peak_season_whether,weekend_whether,weekend_setting_start,weekend_setting_end,weekend_fee_set)
    VALUES
    ('".$userid."','N','N','5','6','N')";
    
    $result = sql_query($sql);

    $sql = "INSERT INTO $MANAGEMENT_RESERVE_PEAK_DATE_TB  
            (user_id,peak_season_start_date,peak_season_end_date)
            VALUES
            ('".$userid."','$mod_date','$mod_date')";
    $result = sql_query($sql);   

    
    $re_code = "100";
    $msg = "회원가입을 완료하였습니다.";
    $json = json_output($re_code,$msg);
    echo"$json";
     exit;
  }

  else if($division == 'member_mod') { //회원정보변경
    $member_seq = isset( $_REQUEST['member_seq'] ) ?  $_REQUEST['member_seq']  : '';
    $member_userid = isset( $_REQUEST['member_userid'] ) ?  $_REQUEST['member_userid']  : '';
    $withdraw = isset( $_REQUEST['withdraw'] ) ?  $_REQUEST['withdraw']  : 'false';
    $withdraw_date = isset( $_REQUEST['withdraw_date'] ) ?  $_REQUEST['withdraw_date']  : date("Y-m-d H:i:s");
    if($withdraw == 'Y'){
        $sql = "INSERT INTO $SALES_MEMBERS_SECESSION_TB  SELECT * FROM $SALES_MEMBERS_TB WHERE seq = '$member_seq' AND user_id = '$member_userid'";
        $result = sql_query($sql);
        if($result == true) {
           $sql_update = "UPDATE $SALES_MEMBERS_SECESSION_TB SET withdraw_date = '$withdraw_date' WHERE seq = '$member_seq'  AND user_id = '$member_userid'";
           sql_query($sql_update);
           $sql_del = "DELETE FROM $SALES_MEMBERS_TB WHERE seq = '$member_seq'  AND user_id = '$member_userid'";
           sql_query($sql_del);
            $result = sql_query($sql);
             $re_code = "100";
             $msg = "정보를 수정하였습니다.";
             $json = json_output($re_code,$msg);
             echo"$json";
             exit;
         }else{
           $re_code = "200";
           $msg = "오류가 발생 하였습니다.";
           $json = json_output($re_code,$msg);
           echo"$json";
           exit;
         }
    }else{
        $passwd_qry ="";
        $passwd = isset( $_REQUEST['passwd'] ) ?  $_REQUEST['passwd']  : '';
        $handphone = isset( $_REQUEST['handphone'] ) ?  $_REQUEST['handphone']  : '';
        $com_name = isset( $_REQUEST['com_name'] ) ?  $_REQUEST['com_name']  : '';
        $zip_code = isset( $_REQUEST['zip_code'] ) ?  $_REQUEST['zip_code']  : '';
        $address = isset( $_REQUEST['address'] ) ?  $_REQUEST['address']  : '';
        $address_detail = isset( $_REQUEST['address_detail'] ) ?  $_REQUEST['address_detail']  : '';
        if($passwd){
         $passwd = password_hash($passwd, PASSWORD_DEFAULT);
         $passwd_qry = ",passwd = '".$passwd."'";
        }
 
        //   $get_geolocation_google = get_geolocation_google($address);
        //   $geolocationExp = explode("^",$get_geolocation_google);
        //   $lat = $geolocationExp['0'];
        //   $lng = $geolocationExp['1'];
            $get_geolocation_kakao = get_geolocation_kakao($address);
            $geolocationExp = explode("^",$get_geolocation_kakao);
            $lat = $geolocationExp['0'];
            $lng = $geolocationExp['1'];

           $sql = "UPDATE $SALES_MEMBERS_TB SET
                   handphone = '$handphone'
                  ,com_name = '$com_name'
                  ,zip1 = '$zip_code'
                  ,address = '$address'
                  ,address_no = '$address_detail'
                  ,latitude = '$lat'
                  ,longitude = '$lng'
                   $passwd_qry
                   WHERE 1=1
                   AND seq = '$member_seq'
                   AND user_id = '$member_userid'
                   ";
            // echo "
            // sql > $sql <br>
            // ";
             $result = sql_query($sql);
             $re_code = "100";
             $msg = "정보를 수정하였습니다.";
             $json = json_output($re_code,$msg);
             echo"$json";
             exit;
       }
  }

  else if($division == 'withdraw') { //회원즉시탈퇴
    $member_seq = isset( $_REQUEST['val1'] ) ?  $_REQUEST['val1']  : '';
    $member_userid = isset( $_REQUEST['val2'] ) ?  $_REQUEST['val2']  : '';
    $sql = "INSERT INTO $SALES_MEMBERS_SECESSION_TB  SELECT * FROM $SALES_MEMBERS_TB WHERE seq = '$member_seq' AND user_id = '$member_userid'";

    $result = sql_query($sql);
    if($result == true) {
       $sql_update = "UPDATE $SALES_MEMBERS_SECESSION_TB SET withdraw_date = now() WHERE seq = '$member_seq'  AND user_id = '$member_userid'";
       sql_query($sql_update);
       $sql_del = "DELETE FROM $SALES_MEMBERS_TB WHERE seq = '$member_seq'  AND user_id = '$member_userid'";
       sql_query($sql_del);
       $re_code = "100";
       $msg = "탈퇴처리 하였습니다.";
       $json = json_output($re_code,$msg);
       echo"$json";
       exit;
     }else{
       $re_code = "200";
       $msg = "오류가 발생 하였습니다.";
       $json = json_output($re_code,$msg);
       echo"$json";
       exit;
     }
  }  

  else if($division == 'member_delete') { //회원삭제
    $member_seq = isset( $_REQUEST['val1'] ) ?  $_REQUEST['val1']  : '';
    $member_userid = isset( $_REQUEST['val2'] ) ?  $_REQUEST['val2']  : '';

      $sql = "DELETE FROM  $SALES_MEMBERS_TB
            WHERE 1=1
            AND seq = '$member_seq'
            AND user_id = '$member_userid'
           ";
      sql_query($sql);
      $re_code = "100";
      $msg = "삭제하였습니다.";
      $json = json_output($re_code,$msg);
      echo"$json";
      exit;
}

else if($division == 'management_host') { //정보변경-호스트
    $passwd = isset( $_REQUEST['passwd'] ) ?  $_REQUEST['passwd']  : '';
    $com_name = isset( $_REQUEST['com_name'] ) ?  $_REQUEST['com_name']  : '';
    $handphone = isset( $_REQUEST['handphone'] ) ?  $_REQUEST['handphone']  : '';
    $zip_code = isset( $_REQUEST['zip_code'] ) ?  $_REQUEST['zip_code']  : '';
    $address = isset( $_REQUEST['address'] ) ?  $_REQUEST['address']  : '';
    $address_detail = isset( $_REQUEST['address_detail'] ) ?  $_REQUEST['address_detail']  : '';
    $email = isset( $_REQUEST['email'] ) ?  $_REQUEST['email']  : '';
    if($passwd){
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $passwd_qry = ",passwd = '".$passwd."'";
    }
      $sql = "UPDATE $SALES_MEMBERS_TB
              SET
              com_name = '$com_name'
             ,handphone = '$handphone'
             ,zip1 = '$zip_code'
             ,address = '$address'
             ,address_no = '$address_detail'
             ,email = '$email'
             $passwd_qry
            WHERE 1=1
            AND user_id = '".$_SESSION['session_user_id']."'
           ";
      sql_query($sql);
    //   echo "
    //   sql > $sql <br>
    //   ";
      $re_code = "100";
      $msg = "변경하였습니다.";
      $json = json_output($re_code,$msg);
      echo"$json";
      exit;
}

function geoLocation(){
    
}

?>
