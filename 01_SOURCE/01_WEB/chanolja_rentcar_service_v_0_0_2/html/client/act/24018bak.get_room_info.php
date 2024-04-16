<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$locate = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
$divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : ''; //상품구분
if($locate == 'main'){
$dateStr = isset($_REQUEST['inputDate']) ? $_REQUEST['inputDate'] : '';
}
else{
$dateStr = isset($_REQUEST['inputDate_sub']) ? $_REQUEST['inputDate_sub'] : '';    
}
$personnel = isset($_REQUEST['personnel']) ? $_REQUEST['personnel'] : ''; //최대인원
$area = isset($_REQUEST['area']) ? $_REQUEST['area'] : ''; //최대인원
$basicoption = isset($_REQUEST['basicoption']) ? $_REQUEST['basicoption'] : ''; //최대인원

$com_name = isset($_REQUEST['com_name']) ? $_REQUEST['com_name'] : ''; //최대인원
$sPrice = isset($_REQUEST['sPrice']) ? $_REQUEST['sPrice'] : ''; //최대인원
$ePrice = isset($_REQUEST['ePrice']) ? $_REQUEST['ePrice'] : ''; //최대인원
$driver_license = isset($_REQUEST['driver_license']) ? $_REQUEST['driver_license'] : ''; //최대인원
$pet_able = isset($_REQUEST['pet_able']) ? $_REQUEST['pet_able'] : ''; //최대인원
$delivery_able = isset($_REQUEST['delivery_able']) ? $_REQUEST['delivery_able'] : ''; //최대인원
$camping_able = isset($_REQUEST['camping_able']) ? $_REQUEST['camping_able'] : ''; //최대인원
$get_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
// echo "
// driver_license >>> $driver_license <br>
// driver_license >>> $driver_license <br>
// ";
// room_info_array_etc($get_guestroom_code,$dateStr,$divisionType,$personnel,$area,$basicoption,$com_name
// ,$sPrice,$ePrice,$driver_license,$pet_able,$delivery_able,$camping_able,$com_name);

// $select_guestroom_fee = isset($_REQUEST['select_guestroom_fee']) ? $_REQUEST['select_guestroom_fee'] : ''; //최대인원
// $guestroom_code  = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원 
// $select_guestroom_fee = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// $select_option_fee = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// $select_option_size = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// $reserve_code = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// $guestroom_name = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// guestroom_use_hour = isset($_REQUEST['locate']) ? $_REQUEST['locate'] : ''; //최대인원
// reserve_name, 
// reserve_phone, 
// reserve_email, 
// reserve_request, 
// guestroom_paymthod, 1
// account_info, 신한은행:110-481-226246:ㅁㅁㅁ
// depositor, 
// $option_info_array = get_option($SITENAME);
// echo "
// division > $division <br>
// area > $area <br>
// select_guestroom_fee > $select_guestroom_fee <br>
// locate > $locate <Br>
// ";
// print_r($area);
if($division == 'getData'){
          $get_guestroom_type = get_guestroom_type($divisionType);
          $room_info_array_etc = "";
          $room_info_array_etc = room_info_array_etc($get_guestroom_code,$dateStr,$divisionType,$personnel,$area,$basicoption,$com_name
                                  ,$sPrice,$ePrice,$driver_license,$pet_able,$delivery_able,$camping_able);
        //   print_r($room_info_array_etc);
          $peak_data_array = "";
          $semi_peak_data_array = "";
          $html ="";

          $room_info_array_etc_size = sizeof($room_info_array_etc);
          if($room_info_array_etc_size <= '0'){
            $html ="
                    <table border='1' class='tbroom' id='tb_9416914189' style='display: table; width: 100%;'>
                    <thead>
                        <tr>
                            <td style='text-align:center'> 조건에 만족하는 상품이 없습니다.</td>
                        </tr>
                    </thead>
                    <tbody>
                    </table>";

          }
              $arrayLocation = array();
              foreach ($room_info_array_etc as $key=>$value) {
                $goption_all = "";
                $imgUrl = $guestroom_image_url."/".$value['guestroom_image_name'];
                $guestroom_use_hour_exp = explode("~",$value['guestroom_use_hour']);
              	$guestroom_start_hour = $guestroom_use_hour_exp['0'];
              	$guestroom_end_hour = $guestroom_use_hour_exp['1'];
                $pet_able_str = "반려동물 동반 불가";
                $delivery_able_str = "딜리버리 불가";
                if($value['pet_able'] == 'Y') $pet_able_str = "반려동물 동반 가능";
                if($value['delivery_able'] == 'Y') $delivery_able_str = "딜리버리 가능";
                $arrData = array(
                    'place' => $value['com_name'],
                    'lat' => $value['latitude'],
                    'lng' => $value['longitude'],
                    'address' => $value['address'],
                );
                array_push($arrayLocation, $arrData);
       $html .= "<li class='sct_li col-row-3' data-css='nocss' style='height:auto'>
                  <div class='sct_img'>
                    <a href=\"javascript:void(0);\" onclick=\"room_detail('".$value['guestroom_code']."');\" >
                          <img src='".$imgUrl."' width='353' height='220' alt='".$value['guestroom_name']."'>
                      </a>
                  </div>
                  <div class='sct_ct_wrap'>
                  <div class='sct_txt'><a href=''>
                            ".$value['guestroom_name']."
                          </a></div>
                      <div class='sct_basic'>".$value['guestroom_intro']."</div>
                  </div>
                  <div class='sct_sub_txt_wrap'>
                      <ul class='sct_sub_ul'>
                          <!--<li><span> <i class='fas fa-map-marker-alt'></i> 차고지 : ".$value['guestroom_address']."</span></li>-->
                          <li><span> <i class='fas fa-address-card'></i>".$value['driver_license']."</span></li>
                          <li><span> <i class='fas fa-user-friends'></i> 동승 ".$value['guestroom_personnel']."명</span></li>
                          <li><span> <i class='fas fa-bed'></i> 취침 ".$value['guestroom_max_personnel']."명</span></li>
                          <li><span> <i class='fas fa-dog'></i>".$pet_able_str."</span></li>
                          <li><span> <i class='fas fa-bolt'></i>".$delivery_able_str."</span></li>
                      </ul>
                      <div class='sct_sub_txt'><span><i class='far fa-calendar-check'>정상가: <s></i> ".number_format($value['room_fee_all'])."원(".$value['dateintval']."박)</span></s></div>
                      <div class='sct_sub_txt'><span><i class='far fa-calendar-check'>할인가: </i> ".number_format($value['room_fee'])."원(".$value['dateintval']."박)</span></div>
                  </div>
                  <div class='sct_op_btn'>
                      <button type='button' class='btn_wish' data-it_id=''><span class='sound_only'>위시리스트</span><i class='far fa-heart'></i></button>
                  </div>
              </li>
            ";
            }
            $html .= "<input type='hidden' name='arrayLocation' id='arrayLocation' value='".json_encode($arrayLocation)."'>";
          echo $html;
}
else if($division == 'guestroom_info_ajax'){
  $room_info_array_etc = room_info_array_etc($get_guestroom_code,$dateStr,$divisionType);
  // print_r($room_info_array_etc);
  header('Content-Type: application/json; charset=utf8');
  $json = json_encode($room_info_array_etc);
    // echo $json;
    // exit;
    echo $json;
}
else if($division == 'option_info_ajax'){
  $goption_all = get_goption_all($get_guestroom_code);
  header('Content-Type: application/json; charset=utf8');
  $json = json_encode($goption_all);
    // echo $json;
    // exit;
    echo $json;
}
?>
