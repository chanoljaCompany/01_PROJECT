<?php
       require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
       include_once('../../common.php');
       require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
       require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";
    //    include_once(G5_LIB_PATH.'/icode.lms.lib.php'); //sms
       include_once(G5_LIB_PATH.'/icode.lms.lib.php'); //LMS

       $reserve_code = "1653531150"; 
       $reserveData = get_reserve_data_client($reserve_code);
       print_r($reserveData);
       $hostData = get_host_info($reserveData['user_id']);
       $personnel_exp  =  explode("^",$reserveData['guestroom_reserve_user_personnel']);
       $get_option_data = get_option_data_client($reserve_code);
       $get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
       $get_date_str = get_date_str($get_date_intval);
       $send_hp_mb = "01083415338"; // 보내는 전화번호
    //    $recv_hp_mb = $hostData['handphone']; //  받는 전화번호
       $recv_hp_mb = "01047126104"; //  받는 전화번호
       $send_hp = str_replace("-","",$send_hp_mb); // - 제거
       $recv_hp = str_replace("-","",$recv_hp_mb); // - 제거
       $send_number =  "$send_hp";
       $recv_number = "$recv_hp";
       $sms_content = "";
       $sms_content .= "예약자(성함) ".$reserveData['guestroom_reserve_user_name']."\n";
       $sms_content .= "면허사항  ".$reserveData['reserve_license']."\n";
       $sms_content .= "운전자 연령  ".$reserveData['reserve_drive_age']."\n";
       $sms_content .= "연락처  ".$reserveData['guestroom_reserve_user_phone']."\n";
       $sms_content .= "승차인원  성인:".$personnel_exp['0']."명/어린이".$personnel_exp['1']."명\n";
       $sms_content .= "예약차량  ".$reserveData['guestroom_name']."\n";
       $sms_content .= "이용일자  ".$reserveData['guestroom_reserve_date']."(".$get_date_str.")\n";
       foreach ($get_option_data as $key=>$value) {
        if($value['option_code']){  
        $sms_content .= "옵션명 : ".$value['option_name']."
        옵션가격: ".number_format($value['option_fee'])."원 X ".$reserveData['reserve_interval_day_val']."일\n";
        }
      }
    //    $sms_content .= "옵션  ".$reserveData['guestroom_reserve_user_name']."\n";
       $sms_content .= "요청사항  ".$reserveData['guestroom_reserve_user_request']."\n";
       echo "
       asms_content > $sms_content <br>
       ";
       print_r($config);
       exit;
    
    //    $SMS = new SMS; // SMS 연결
       
       $strDest = array();
       $strDest[0] = $recv_number;
       $SMS = new LMS; // SMS 연결
       $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], 1);
       $SMS->Add($strDest, $send_number, $config['cf_icode_id'],"","", iconv("utf-8", "euc-kr", stripslashes($sms_content)), "", 1);
       $sndResult = $SMS->Send();
       echo "sndResult >>>> $sndResult<br>";

?>       