<?php
// include_once("./_common.php");
include_once("$_SERVER[DOCUMENT_ROOT]/client/kakao_bizm/curl_helper.php");

class Kakao_bizm {
    public $real_url = 'https://alimtalk-api.bizmsg.kr';
    public $dev_url = 'https://dev-alimtalk-api.bizmsg.kr:1443';

    public $path = '/v1/sender/send';

    // for real server
    public $user_id = 'choriforest';  // 비즈엠 홈페이지에 가입된 사용자 계정명
    public $message_type = 'at';  // 메시지 타입(at : 알림톡, ft : 친구톡)
    public $profile = 'a2d5ada9b4c5b4ca73c8727ca228eee0a779b0f9';  // 발신프로필키(메시지 발송 주체인 플러스친구에 대한 키)
    public $sms_kind = 'S';  // 카카오 비즈메시지 발송이 실패했을 때SMS 전환발송을 사용하는 경우 SMS/LMS 구분(SMS: S, LMS: L)
    public $sms_sender = '01091351772';  // SMS 전환발송 시 발신번호
    public $smsLmsTit = "초리포레스트";

    public $http_status = null;
    public $header = null;
    public $response = null;

    public $messages = array();

    function send($server = 'dev') {
        $url = $this->real_url . $this->path;
        $data = array();
        foreach ($this->messages as $msg) {
            $msg['userId'] = $this->user_id;
            $msg['message_type'] = $this->message_type;
            $msg['profile'] = $this->profile;
            if (isset($this->sms_kind)) {
                $msg['smsKind'] = $this->sms_kind;
                if ("S" == $this->sms_kind) {
                    $msg['smsSender'] = $this->sms_sender;
                } else if ("L" == $this->sms_kind) {
                    $msg['smsSender'] = $this->sms_sender;
                    $msg['smsLmsTit'] = $this->smsLmsTit;
                } else {
                    throw new Exception('Invalid sms_kind value. ('.$this->sms_kind.')');
                }
            } else {
                unset($msg['msgSms']);
                unset($msg['smsSender']);
            }
            // print_r($msg);
            $data[] = $msg;
        }
        $this->response = curl($url, json_encode($data), $this->http_status, $this->header);
        return $this->response;

    }

    function add_msg($phone, $temp_id, $msg,$msg_sms) { //일반메세지
        $this->messages[] = array(
            'phn' => $phone,
            'tmplId' => $temp_id,
            'msg' => $msg,
            'msgSms' => $msg_sms,
        );
    }

    function add_msg_button($phone, $temp_id, $msg, $msg_sms,$buttonStr) { //버튼메세지
//       echo "
// phone >>> $phone <br>
// temp_id >>> $temp_id <br>
// msg >>> $msg <br>
// msg_sms >>> $msg_sms <br>
// buttonStr >>> $buttonStr <br>
//       ";
        $this->messages[] = array(
            'phn' => $phone,
            'tmplId' => $temp_id,
            'msg' => $msg,
            'msgSms' => $msg_sms,
            'button1' => $buttonStr,
        );
    }

    function clear_msg() {
        unset($this->messages);
        $this->messages = array();
    }
}
