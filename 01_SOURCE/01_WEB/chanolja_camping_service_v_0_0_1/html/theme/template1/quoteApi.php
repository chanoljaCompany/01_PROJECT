<?php
header('Content-type: application/json');
?>

<?php



include_once('./_common.php');
include_once(G5_LIB_PATH.'/icode.sms.lib.php');

//----------------------------------------------------------
// SMS 문자전송 시작
//----------------------------------------------------------
$sms_contents = $first_name.'님이 '.$email_from.' 차량의 문의를 하셨습니다. 연락처 '.$telephone.' 희망지역 및 날짜: '.$comments ;  // 문자 내용

echo '<script>';
echo 'console.log("' . $sms_contents . '")';
echo '</script>';

// 핸드폰번호에서 숫자만 취한다
$receive_number = '01024857220';  // 수신자번호
$send_number = '01083415338'; // 발신자번호

if ($w == "" && $receive_number)
{
    if ($config['cf_sms_use'] == 'icode')
    {
        if($config['cf_sms_type'] == 'LMS') {
            include_once(G5_LIB_PATH.'/icode.lms.lib.php');

            $port_setting = get_icode_port_type($config['cf_icode_id'], $config['cf_icode_pw']);

            // SMS 모듈 클래스 생성
            if($port_setting !== false) {
                $SMS = new LMS;
                $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $port_setting);

                $strDest     = array();
                $strDest[]   = $receive_number;
                $strCallBack = $send_number;
                $strCaller   = iconv_euckr(trim($config['cf_title']));
                $strSubject  = '';
                $strURL      = '';
                $strData     = iconv_euckr($sms_contents);
                $strDate     = '';
                $nCount      = count($strDest);

                $res = $SMS->Add($strDest, $strCallBack, $strCaller, $strSubject, $strURL, $strData, $strDate, $nCount);

                $SMS->Send();
                $SMS->Init(); // 보관하고 있던 결과값을 지웁니다.

                echo '<script>';
                echo 'console.log("else")';
                echo '</script>';
            }
        } else {
            include_once(G5_LIB_PATH.'/icode.sms.lib.php');

            $SMS = new SMS; // SMS 연결
            $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $config['cf_icode_server_port']);
            $SMS->Add($receive_number, $send_number, $config['cf_icode_id'], iconv_euckr(stripslashes($sms_contents)), "");
            $SMS->Send();
            $SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
            echo '<script>';
            echo 'console.log("else")';
            echo '</script>';
        }
    }
}
//----------------------------------------------------------
// SMS 문자전송 끝
//----------------------------------------------------------



?>
<script>
    alert ("접수완료되었습니다.\n빠른 시간안에 답변드리겠습니다.");
</script>