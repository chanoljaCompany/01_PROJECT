<?php
@session_save_path($_SERVER["DOCUMENT_ROOT"]."/data/session");
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

$autologinVal = isset($_REQUEST['autologinVal']) ? $_REQUEST['autologinVal'] : '';
$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';

if($division == 'userinfo'){
    session_start();
    // $user_id = $_SESSION['session_user_id'];
    $user_name = $_SESSION['session_company_name'];
    $user_phone = $_SESSION['session_handphone'];
    $user_email = $_SESSION['session_email'];
    $re_code = "100";
    $msg = $user_name."^".$user_phone."^".$user_email;
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
    // echo "
    // user_id >>> $user_id <br>
    // user_phone >>> $user_phone <br>
    // user_name >>> $user_name <br>
    // ";
}
else if($division == 'userlogin') {
            if (isset( $_REQUEST['form_userid'] ) && isset( $_REQUEST['form_passwd'] )) {
            $userid = $_REQUEST["form_userid"];
            $passwd = $_REQUEST["form_passwd"];
            if (!$passwd) {
                // $msg = "비밀번호를 입력하세요.";
                // result_msg($msg);
                // exit;
                $re_code = "200";
                $msg = "fail-비밀번호를 확인해주세요.";
                $json = json_output($re_code,$msg);
                echo"$json";
                exit;
            }
            $str = "SELECT COUNT(seq) as dataNum FROM $SALES_MEMBERS_TB WHERE user_id = '$userid'";
            // $result = sql_query($str);
            $row = sql_fetch($str);
            $count = $row['dataNum'];
            if ($count < 1) {
                // $msg = "아이디를 확인해주세요.";
                // result_msg($msg);
                // exit;
                $re_code = "200";
                $msg = "fail-아이디를 확인해주세요.";
                $json = json_output($re_code,$msg);
                echo"$json";
                exit;
            }
            $str = "SELECT * FROM $SALES_MEMBERS_TB WHERE user_id = '$userid'";
            $row = sql_fetch($str);
                $verify = password_verify($passwd,$row['passwd']);
                if (!password_verify($passwd,$row['passwd'])) {
                    // $msg = "fail-비밀번호를 확인해주세요.";
                    // $msg=str_replace('　','',$msg);
                    // result_msg($msg);
                    // exit;
                    $re_code = "200";
                    $msg = "fail-비밀번호를 확인해주세요.";
                    $json = json_output($re_code,$msg);
                    echo"$json";
                    exit;
                }

            if(!session_id()) {
                session_start();
            }
            $logintime = time();
            $session_id = md5( $row['seq'] . $row['user_id'] . $logintime );

            $str = "INSERT INTO $SALES_SESSION_TB
                    (user_id,com_name,nicname,email,handphone,logintime,session_id,userseq,user_level)
                    VALUES
                    ('$row[user_id]', '$row[com_name]', '$row[nicname]','$row[email]','$row[handphone]','$logintime', '$session_id', '$row[seq]', '$row[user_level]')";
            $result = sql_query($str);
            //   $result == 'false';

            if ($result == false) {
                // $msg = "로그인 오류입니다.";
                // result_msg($msg);
                // exit;
                $re_code = "200";
                $msg = "fail-로그인 오류입니다.";
                $json = json_output($re_code,$msg);
                echo"$json";
                exit;
            }

            $upstr = "UPDATE $SALES_MEMBERS_TB SET counter=counter+1 , lastlogin = now() WHERE user_id = '$row[user_id]'";
            sql_query($upstr);

            $_SESSION['session_id'] 	 = $session_id;
            $_SESSION['session_seq'] 	 = $row['seq'];
            $_SESSION['session_user_id']    = $row['user_id'];
            $_SESSION['session_company_name']    = $row['com_name'];
            $_SESSION['session_email']    = $row['email'];
            $_SESSION['session_handphone']    = $row['handphone'];
            $_SESSION['session_user_level'] = $row['user_level'];
            $_SESSION['session_logintime'] = $logintime;
            session_write_close();


            if($autologinVal =='true'){
                    $exp = time() + 86400*365; // 다시 1년 유효
                    setcookie($cookname,$cookname,$exp,"/");
                    setcookie("mem_uid",$row['user_id'],$exp,"/");
                    setcookie("mem_autologin", $autologinVal,$exp,"/");
                }else{
                setcookie($cookname,$cookname, time() - 3600,"/");
                setcookie("mem_uid",$row['user_id'], time() - 3600,"/");
                setcookie("mem_autologin", $autologinVal, time() - 3600,"/");
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
            // result_msg($msg);
            // exit;
            $re_code = "200";
            $msg = "success-성공.";
            $json = json_output($re_code,$msg);
            echo"$json";
            exit;
            //echo "<script>document.location.href='$LOGIN_SUCCESS';</script>\n";
            //exit();
            }else{
                // $msg = "회원ID, 비밀번호가 틀립니다.";
                // result_msg($msg);
                // exit;
                $re_code = "200";
                $msg = "fail-회원ID, 비밀번호가 틀립니다.";
                $json = json_output($re_code,$msg);
                echo"$json";
                exit;
            //  echo "<script>alert('회원ID, 비밀번호가 틀립니다');
            // document.location.href='$LOGIN_PAGE';</script>\n";
            }
    }
    else if($division == 'memberJoin'){
        $manager = isset( $_REQUEST['manager'] ) ?  $_REQUEST['manager']  : 'C';
        $userid = isset( $_REQUEST['userid'] ) ?  $_REQUEST['userid']  : '';
        $passwd = isset( $_REQUEST['passwd'] ) ?  $_REQUEST['passwd']  : '';
        $handphone = isset( $_REQUEST['handphone'] ) ?  $_REQUEST['handphone']  : '';
        $com_name = isset( $_REQUEST['com_name'] ) ?  $_REQUEST['com_name']  : '';
        $email = isset( $_REQUEST['email'] ) ?  $_REQUEST['email']  : '';
        $zip_code = isset( $_REQUEST['zip_code'] ) ?  $_REQUEST['zip_code']  : '';
        $address = isset( $_REQUEST['address'] ) ?  $_REQUEST['address']  : '';
        $address_detail = isset( $_REQUEST['address_detail'] ) ?  $_REQUEST['address_detail']  : '';
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $SALES_MEMBERS_TB
                (user_id,passwd, handphone,com_name,zip1,address,address_no,signdate,lastlogin,user_level,approve,counter,email)
                VALUES
                ('$userid','$passwd','$handphone','$com_name','$zip_code','$address','$address_detail',now(),now(),'$manager','Y','0','$email')";
        $result = sql_query($sql);
        if($result){
            // $msg = "success-회원가입을 감사드립니다.";
            // result_msg($msg);
            // exit;
            $str = "SELECT * FROM $SALES_MEMBERS_TB WHERE user_id = '$userid'";
            $row = sql_fetch($str);
            if(!session_id()) {
                session_start();
            }
            $logintime = time();
            $session_id = md5( $row['seq'] . $row['user_id'] . $logintime );

            $str = "INSERT INTO $SALES_SESSION_TB
                    (user_id,com_name,nicname,email,handphone,logintime,session_id,userseq,user_level)
                    VALUES
                    ('$row[user_id]', '$row[com_name]', '$row[nicname]','$row[email]','$row[handphone]','$logintime', '$session_id', '$row[seq]', '$row[user_level]')";
            $result = sql_query($str);
            //   $result == 'false';

            if ($result == false) {
                // $msg = "로그인 오류입니다.";
                // result_msg($msg);
                // exit;
                $re_code = "200";
                $msg = "fail-로그인 오류입니다.";
                $json = json_output($re_code,$msg);
                echo"$json";
                exit;
            }

            $upstr = "UPDATE $SALES_MEMBERS_TB SET counter=counter+1 , lastlogin = now() WHERE user_id = '$row[user_id]'";
            sql_query($upstr);

            $_SESSION['session_id'] 	 = $session_id;
            $_SESSION['session_seq'] 	 = $row['seq'];
            $_SESSION['session_user_id']    = $row['user_id'];
            $_SESSION['session_company_name']    = $row['com_name'];
            $_SESSION['session_email']    = $row['email'];
            $_SESSION['session_handphone']    = $row['handphone'];
            $_SESSION['session_user_level'] = $row['user_level'];
            $_SESSION['session_logintime'] = $logintime;
            session_write_close();
            $re_code = "100";
            $msg = "success-회원가입을 감사드립니다";
            $json = json_output($re_code,$msg);
            echo"$json";
            exit;
        }else{
            $re_code = "200";
            $msg = "fail-오류가 발생하였습니다.";
            $json = json_output($re_code,$msg);
            echo"$json";
            exit;
        }
    }

    function result_msg($rmsg){
    echo"$rmsg";
    }
?>
