<?php
// include_once($_SERVER['DOCUMENT_ROOT']."./_common.php");
include_once(G5_PLUGIN_PATH."/kakao_bizm/curl_helper.php");

class Kakao_bizm_Button {
  public $real_url = 'https://alimtalk-api.bizmsg.kr';
  public $dev_url = 'https://dev-alimtalk-api.bizmsg.kr:1443';

  public $path = '/v1/sender/send';

  // for real server
  public $user_id = 'wt6295';  // 비즈엠 홈페이지에 가입된 사용자 계정명
  public $message_type = 'at';  // 메시지 타입(at : 알림톡, ft : 친구톡)
  public $profile = '156a55d7e985a8a783f649d467ca54c1248f7003';  // 발신프로필키(메시지 발송 주체인 플러스친구에 대한 키)
  public $sms_kind = 'S';  // 카카오 비즈메시지 발송이 실패했을 때SMS 전환발송을 사용하는 경우 SMS/LMS 구분(SMS: S, LMS: L)
  public $sms_sender = '01048956295';  // SMS 전환발송 시 발신번호
  public $smsLmsTit = "(주)운톡컴퍼니";

  public $http_status = null;
  public $header = null;
  public $response = null;

    public $messages = array();

    function send($server = 'dev') {

        $url = $this->real_url . $this->path;
        // $url = $this->dev_url . $this->path;
        $data = array();

        // print_r($this->messages);

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
            $data[] = $msg;
        }

         //print_r($data);

        $this->response = curl($url, json_encode($data), $this->http_status, $this->header);
        return $this->response;

        // [
        //     {
        //     "code": "success",       // 발송 성공/실패 여부(success: 성공, fail: 실패)
        //     "data": "01012345678",   // 수신자 전화번호
        //     "message": "K000",       // 처리결과 코드
        //     "type": "at"             // 발송 유형(at: 알림톡, ft: 친구톡, S: SMS, L: LMS)
        //     },
        //     ...
        // ]
    }

    function add_msg($phone, $temp_id, $msg, $msg_sms,$buttonStr) {
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
