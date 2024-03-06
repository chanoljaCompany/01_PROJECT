<?php
include_once("./_common.php");

// //----------------------------------------------------------
// // KAKAOTALK 전송 시작
// //----------------------------------------------------------
// include_once(G5_PLUGIN_PATH.'/kakao_bizm/biztalk.php');

// $kmsg = new Kakao_bizm();
// $mb_hp = "01064628090";

// $phone = preg_replace("/[^0-9]/", "", $mb_hp);
// $sms_contents = "#{이름}님의 회원가입을 축하드립니다.
// $sms_contents = "폰터스부품몰(www.HPP.kr)".PHP_EOL.$sms_contents;
// ID:#{회원아이디}
// #{회사명}";
// $sms_contents = str_replace("#{이름}", "홍길동", $sms_contents);
// $sms_contents = str_replace("#{회원아이디}", "hong123", $sms_contents);
// $sms_contents = str_replace("#{회사명}", "우리회사", $sms_contents);
// $kmsg->add_msg($phone, 'hyundainyx_001', $sms_contents, $sms_contents);

// $kakao_result = $kmsg->send();
// debug($kakao_result, json_decode($kakao_result));
// //----------------------------------------------------------
// // KAKAOTALK 전송 종료
// //----------------------------------------------------------
