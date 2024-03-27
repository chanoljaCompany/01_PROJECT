<?php
function push_alimtalk($receive,$temple_code,$sms_contents,$msg_type,$buttonStr){
				$kmsg = new Kakao_bizm();
				if($msg_type == 'button'){
					$kmsg->add_msg_button($receive, $temple_code, $sms_contents, $sms_contents,$buttonStr);
				}
				else{
					$kmsg->add_msg($receive, $temple_code, $sms_contents,$sms_contents);
					// print_r($kmsg);
				}

				$kakao_result = $kmsg->send();
// 				echo "
// kakao_result > $kakao_result <br>
// 				";
}

// echo "
// division > $division
// ";
if($division == 'choriforest001'){ //예약신청 : 고객전송
				// $reserve_code = isset($_REQUEST['reserve_code']) ? $_REQUEST['reserve_code'] : ''; //예약코드
				// $reserve_code = "1647318453";
				$msg_type = 'button'; //메새지타입
				$buttonStr = '';
				$reserveData = get_reserve_data($reserve_code);
				$receive_phone_number = $reserveData['guestroom_reserve_user_phone'];
				$get_date_str = get_date_str($get_date_intval);
				// print_r($reserveData);
				if($reserveData['guestroom_type'] != '1'){
				   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
				   $reserve_use_start = $reserve_use_hour_ex['0'];
				   $reserve_use_end = $reserve_use_hour_ex['1'];
				   $reserve_str = substr($reserveData['guestroom_reserve_date'],0,10)." (".$reserve_use_start."시부터 ". $reserve_use_end ."시까지)";
				}
				else{
					$reserve_str = $reserveData['guestroom_reserve_date']."(".$get_date_str.")";
				}
				$setting_data = get_management_value(); //세팅정보
				$alimtalk_data = get_alimtalk_data();
				$temple_code = $alimtalk_data['al_join_code']; //템플릿코드
				$sms_contents = $alimtalk_data['al_join']; //내용
				$sms_contents = str_replace("#{예약번호}", $reserve_code, $sms_contents);
				$sms_contents = str_replace("#{상품명}", $reserveData['guestroom_name'], $sms_contents);
				$sms_contents = str_replace("#{예약일시}", $reserve_str, $sms_contents);
				$sms_contents = str_replace("#{입금금액}", number_format($reserveData['guestroom_reserve_payment_total'])."원", $sms_contents);
				$sms_contents = str_replace("#{입금계좌}", $setting_data['0']['account_name']."/".$setting_data['0']['account_number']."/".$setting_data['0']['account_holder'], $sms_contents);
				$sms_contents = str_replace("#{예약문의}", $setting_data['0']['cellphone'], $sms_contents);
				$sms_contents = str_replace("#{주소}", $setting_data['0']['address'].$setting_data['0']['address_detail'], $sms_contents);
				$btnName = "예약확인";
			  $buttonStr = array("name" =>$btnName,"type" => "WL","url_mobile" => "http://choriforest.co.kr/bbs/board.php?bo_table=82&sendtype=1","url_pc" => "http://choriforest.co.kr/bbs/board.php?bo_table=82&sendtype=1");
//         echo "
// <br><br>
// btnName >>> $btnName <br>
// buttonStr >>>> $buttonStr <br><br>
// receive_phone_number >>> $receive_phone_number <br>
// 				";
				 push_alimtalk($receive_phone_number,$temple_code,$sms_contents,$msg_type,$buttonStr);
}

else if($division == 'choriforest002'){ //예약완료 : 고객전송
				$msg_type = 'button'; //메새지타입
				$buttonStr = '';
				$reserveData = get_reserve_data($reserve_code);
				$receive_phone_number = $reserveData['guestroom_reserve_user_phone'];
				$get_date_str = get_date_str($get_date_intval);
				if($reserveData['guestroom_type'] != '1'){
				   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
				   $reserve_use_start = $reserve_use_hour_ex['0'];
				   $reserve_use_end = $reserve_use_hour_ex['1'];
				   $reserve_str = substr($reserveData['guestroom_reserve_date'],0,10)." (".$reserve_use_start."시부터 ". $reserve_use_end ."시까지)";
				}
				else{
					$reserve_str = $reserveData['guestroom_reserve_date']."(".$get_date_str.")";
				}
				$setting_data = get_management_value(); //세팅정보
				$alimtalk_data = get_alimtalk_data();
				$temple_code = $alimtalk_data['al_charge_code']; //템플릿코드
				$sms_contents = $alimtalk_data['al_charge']; //내용
				$sms_contents = str_replace("#{예약번호}", $reserve_code, $sms_contents);
				$sms_contents = str_replace("#{상품명}", $reserveData['guestroom_name'], $sms_contents);
				$sms_contents = str_replace("#{예약일시}", $reserve_str, $sms_contents);
				$sms_contents = str_replace("#{결제금액}", number_format($reserveData['guestroom_reserve_payment_total'])."원", $sms_contents);
				$sms_contents = str_replace("#{예약문의}", $setting_data['0']['cellphone'], $sms_contents);
				$sms_contents = str_replace("#{주소}", $setting_data['0']['address'].$setting_data['0']['address_detail'], $sms_contents);
				$btnName = "예약확인";
			  $buttonStr = array("name" =>$btnName,"type" => "WL","url_mobile" => "http://choriforest.co.kr/bbs/board.php?bo_table=82&sendtype=1","url_pc" => "http://choriforest.co.kr/bbs/board.php?bo_table=82&sendtype=1");
//         echo "
// <br><br>
// btnName >>> $btnName <br>
// buttonStr >>>> $buttonStr <br><br>
// receive_phone_number >>> $receive_phone_number <br>
// 				";
				 push_alimtalk($receive_phone_number,$temple_code,$sms_contents,$msg_type,$buttonStr);
}

else if($division == 'choriforest004'){ //예약신청 : 관리자전송
				// $reserve_code = isset($_REQUEST['reserve_code']) ? $_REQUEST['reserve_code'] : ''; //예약코드
				// $reserve_code = "1647330032";
				$msg_type = 'button'; //메새지타입
				$buttonStr = '';
				$reserveData = get_reserve_data($reserve_code);
				$setting_data = get_management_value(); //세팅정보
				$alimtalk_data = get_alimtalk_data();
				$get_date_str = get_date_str($get_date_intval);
				$receive_phone_number = $setting_data['0']['cellphone'];
				// $receive_phone_number = "010-4712-6104";
				// print_r($reserveData);
				if($reserveData['guestroom_type'] != '1'){
				   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
				   $reserve_use_start = $reserve_use_hour_ex['0'];
				   $reserve_use_end = $reserve_use_hour_ex['1'];
				   $reserve_str = substr($reserveData['guestroom_reserve_date'],0,10)." (".$reserve_use_start."시부터 ". $reserve_use_end ."시까지)";
				}
				else{
					$reserve_str = $reserveData['guestroom_reserve_date']."(".$get_date_str.")";
				}
				$temple_code = $alimtalk_data['al_sandamsa_code']; //템플릿코드
				$sms_contents = $alimtalk_data['al_sandamsa']; //내용
				$sms_contents = str_replace("#{예약번호}", $reserve_code, $sms_contents);
				$sms_contents = str_replace("#{상품명}", $reserveData['guestroom_name'], $sms_contents);
				$sms_contents = str_replace("#{예약일시}", $reserve_str, $sms_contents);
				$sms_contents = str_replace("#{입금금액}", number_format($reserveData['guestroom_reserve_payment_total'])."원", $sms_contents);
				$sms_contents = str_replace("#{입금계좌}", $setting_data['0']['account_name']."/".$setting_data['0']['account_number']."/".$setting_data['0']['account_holder'], $sms_contents);
				$btnName = "예약확인";
			  $buttonStr = array("name" =>$btnName,"type" => "WL","url_mobile" => "http://choriforest.co.kr/real_reservation/alim_reservation.php?&reserve_code=$reserve_code","url_pc" => "http://choriforest.co.kr/real_reservation/alim_reservation.php?&reserve_code=$reserve_code");
//         echo "
// <br><br>
// btnName >>> $btnName <br>
// buttonStr >>>> $buttonStr <br><br>
// receive_phone_number >>> $receive_phone_number <br>
// sms_contents >>> $sms_contents <br>
// 				";
				 push_alimtalk($receive_phone_number,$temple_code,$sms_contents,$msg_type,$buttonStr);
}

else if($division == 'choriforest003'){ //예약취소 : 고객전송
					// $reserve_code = isset($_REQUEST['reserve_code']) ? $_REQUEST['reserve_code'] : ''; //예약코드
					// $reserve_code = "1646891569";
					$msg_type = ''; //메새지타입
					$buttonStr = '';
					$reserveData = get_reserve_data($reserve_code);
					$receive_phone_number = $reserveData['guestroom_reserve_user_phone'];
					$get_date_str = get_date_str($get_date_intval);
					// print_r($reserveData);
					if($reserveData['guestroom_type'] != '1'){
					   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
					   $reserve_use_start = $reserve_use_hour_ex['0'];
					   $reserve_use_end = $reserve_use_hour_ex['1'];
					   $reserve_str = substr($reserveData['guestroom_reserve_date'],0,10)." (".$reserve_use_start."시부터 ". $reserve_use_end ."시까지)";
					}
					else{
						$reserve_str = $reserveData['guestroom_reserve_date']."(".$get_date_str.")";
					}
					$setting_data = get_management_value(); //세팅정보
					$alimtalk_data = get_alimtalk_data();
					$temple_code = trim($alimtalk_data['al_finish_code']); //템플릿코드
					$sms_contents = $alimtalk_data['al_finish']; //내용
					$sms_contents = str_replace("#{예약번호}", $reserve_code, $sms_contents);
					$sms_contents = str_replace("#{상품명}", $reserveData['guestroom_name'], $sms_contents);
					$sms_contents = str_replace("#{예약일시}", $reserve_str, $sms_contents);
					$sms_contents = str_replace("#{예약문의}", $setting_data['0']['cellphone'], $sms_contents);
					$sms_contents = str_replace("#{주소}", $setting_data['0']['address'].$setting_data['0']['address_detail'], $sms_contents);
					// $sms_contents_tet="
	        // 초리포레스트 예약이 취소되었습니다.
					// 좋은모습으로 다음 기회에 뵙겠습니다.
					// 감사합니다.
					// 초리포레스트 올림
					// [취소내역]
					// - 예약번호: 1646891569
					// - 상품명: 셀프바비큐존B-오전
					// - 예약일시: 2022-03-10 (12시부터 15시까지)
					// - 예약문의 : 010-9135-1772
					// - 주소 : 경기 파주시 법원읍 초리골길 456-55
					// ";
	//         echo "
	// <br><br>
	// sms_contents >>>> $sms_contents <br><br>
	// 				";
					 push_alimtalk($receive_phone_number,$temple_code,$sms_contents,$msg_type,$buttonStr);
	}
