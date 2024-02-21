<?php
//error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$get_guestroom_code ="";
$dateStr = isset($_REQUEST['dateStr']) ? $_REQUEST['dateStr'] : '';
$room_info_array_etc = "";
$room_info_array_etc = room_info_array_etc($get_guestroom_code,$dateStr);
$peak_data_array = "";
$semi_peak_data_array = "";
$room_info_array_etc_size = sizeof($room_info_array_etc);
$html ="";
    foreach ($room_info_array_etc as $key=>$value) {
      $goption_all = "";
      $imgUrl = $guestroom_image_url."thumb_img/".$value['guestroom_image_name'];
      $html .= "<table width='100%' border='1' class = 'tbroom' id='tb_".$value['guestroom_code']."'>
                <tr>
                  <td width='70%' colspan='2'>".$value['guestroom_name']."-".$value['guestroom_code']."</td>
                  <td width='10%'>인원</td>
                  <td width='10%'>요금</td>
                  <td width='10%'>예약</td>
                </tr>
                <tr>
                  <td width='15%'><img src='".$imgUrl."'></td>
                  <td>환불불가</td>
                  <td>기준 ".$value['guestroom_personnel']."인 / 최대 ".$value['guestroom_max_personnel']."인</td>
                  <td>".number_format($value['room_fee'])."원</td>
                  <td>";
                    if($value['reserve_possible_value'] == 'Y') { //예약불가
                      $html .= "<input type='button' name='reserveBtn' value='예약불가'>";
                    }
                    else{
                      $html .= "<input type='button' name='reserveBtn' onclick=\"reserve_first('".$value['guestroom_code']."','".$value['room_fee']."','".$room_info_array_etc_size."')\" value='예약'>";
                    }
       $html .= "</td>
                </tr>
                <tr>
                <td>옵션선택</td>
                <td colspan='4'>";
                $goption_all = get_goption_all($value['guestroom_code']);
                foreach ($goption_all as $optkey=>$optvalue) {
                    $html .= "".$optvalue['option_name']."(가격:".$optvalue['option_fee'].")
                                  <select name = 'optselbox'  id='opt_".$optvalue['option_code']."_".$value['guestroom_code']."'>";
                                  for($i = 0; $i < 10 ; $i++){
                                   $html .= "<option value='".$i."_".$optvalue['option_fee']."_".$optvalue['option_code']."_".$value['guestroom_code']."_".$optvalue['option_name']."'>".$i."</option>";
                                  }
                        $html .= "</select><br>";
                  }
      $html .= "</td>
                </tr>
              </table><br>";
  }
echo $html;
?>
