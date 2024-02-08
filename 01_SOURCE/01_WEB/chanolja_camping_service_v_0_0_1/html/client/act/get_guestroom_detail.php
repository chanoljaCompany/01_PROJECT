<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$get_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$dateStr = isset($_REQUEST['dateStr']) ? $_REQUEST['dateStr'] : '';
$divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : ''; //상품구분
// $personnel = isset($_REQUEST['personnel']) ? $_REQUEST['personnel'] : ''; //최대인원
// $option_info_array = get_option($SITENAME);
$room_info_array_etc_data = "";
$room_info_array_etc = room_info_array_etc($get_guestroom_code, $dateStr, $divisionType);
// print_r($room_info_array_etc);
// $aaa = $room_info_array_etc['0']['user_id'];
// echo "
// aaa > $aaa <br>
// ";
$pet_able_str = "불가";
$delivery_able_str = "불가";
if($room_info_array_etc['0']['pet_able'] == 'Y') $pet_able_str = "가능";
if($room_info_array_etc['0']['delivery_able'] == 'Y') $delivery_able_str = "가능";
$guestroom_use_hour_exp = explode("~",$room_info_array_etc['0']['guestroom_use_hour']);
$guestroom_start_hour = $guestroom_use_hour_exp['0'];
$guestroom_end_hour = $guestroom_use_hour_exp['1'];
$get_goption_all = get_goption_all($get_guestroom_code,"b",$room_info_array_etc['0']['user_id']);
$get_goption_all_pay = get_goption_all($get_guestroom_code,"p",$room_info_array_etc['0']['user_id']);
// print_r($get_goption_all_pay);
$arrayLocation = array();
$arrData = array(
    'place' => $room_info_array_etc['0']['com_name'],
    'lat' => $room_info_array_etc['0']['latitude'],
    'lng' => $room_info_array_etc['0']['longitude'],
    'address' => $room_info_array_etc['0']['address'],
);
array_push($arrayLocation, $arrData);
//  print_r($get_goption_all_pay);
$html = "";
                $html="     <section class='info_sec'>
                                <div class='info_all info_con0'>
                                <h5>■ 기본정보</h5>
                                    <ul class=''>
                                        ";
                                        if($room_info_array_etc['0']['delivery_able'] == 'Y'){
                                            $html .="<li><i class='fas fa-bolt'></i> 딜리버리 ".$delivery_able_str."</li>";
                                        }   
                                        if($room_info_array_etc['0']['pet_able'] == 'Y'){
                                            $html .="<li><i class='fas fa-dog'></i> 반려동물 동반 ".$pet_able_str."</li>";
                                        }    
                                        if($room_info_array_etc['0']['camping_able'] == 'Y'){
                                            $html .="<li><i class='fas fa-campground'></i> 기본 캠핑장비 제공</li>";
                                        }    
                                        if($room_info_array_etc['0']['car_parking_able'] == 'Y'){
                                            $html .="<li><i class='fas fa-parking'></i> 주차가능</li>";
                                        }     
                    $html .="    </ul>
                                </div>
                                <div class='info_all info_con1'>
                                    <h5>■ 캠핑카 소개</h5>
                                    <p>
                                    ".$room_info_array_etc['0']['guestroom_intro']."
                                    </p>
                                </div>

                                <div class='info_all info_con2'>
                                    <h5>■ 상세 정보</h5>
                                    <ul class=''>
                                        <li><i class='far fa-user'></i> <span>동승가능인원 : ".$room_info_array_etc['0']['guestroom_personnel']."명</span></li>
                                        <li><i class='far fa-user'></i> <span>취침가능인원 : ".$room_info_array_etc['0']['guestroom_max_personnel']."명</span></li>
                                        <li><i class='far fa-clock'></i> <span>출차가능시간 ".$guestroom_start_hour."시 부터</span></li>
                                        <li><i class='far fa-clock'></i> <span>반납가능시간 ".$guestroom_end_hour."시 까지</span></li>
                                        <li><i class='fas fa-money-check'></i> <span>평일 가격 : ".number_format($room_info_array_etc['0']['guestroom_low_season_fee_weekday'])."원 /박</span></li>
                                        <li><i class='fas fa-money-check'></i> <span>주말 가격 : ".number_format($room_info_array_etc['0']['guestroom_low_season_fee_weekend'])."원 /박</span></li>
                                        <li><i class='fas fa-check'></i> <span>만 ".$room_info_array_etc['0']['driver_age']."세 이상</span></li>
                                        <li><i class='far fa-address-card'></i> <span>".$room_info_array_etc['0']['driver_license']." 이상</span></li>
                                        <li><i class='fas fa-car'></i> <span>운전 경력 ".$room_info_array_etc['0']['driver_carrer']."년 이상</span></li>
                                        <li><i class='fas fa-map-marker-alt'></i> <span>주소 : ".$room_info_array_etc['0']['address']."</span></li>
                                    </ul>
                                </div>

<!--
                                <div class='info_all info_con3'>
                                    <h5>보유시설</h5>
                                    <ul class=''>";
                                    foreach ($get_goption_all as $key=>$value) {
                                    $html .="
                                    <li>
                                        <div class='icon'>
                                            <i class='".$value['option_icon']."'></i>
                                            <p><strong>".$value['option_name']."</strong></p>
                                        </div>
                                    </li>";
                                    }
                            $html .="</ul>
                                </div> -->

                                <div class='info_all info_con4'>
								    <p>
									";
									if($room_info_array_etc['0']['bf_file_1'] == ''){
									} else {
									  $html .="<img src='/real_reservation/product_img/".$room_info_array_etc['0']['bf_file_1']."'><br>";
									}
									if($room_info_array_etc['0']['bf_file_2'] == ''){
									} else {
									  $html .="<img src='/real_reservation/product_img/".$room_info_array_etc['0']['bf_file_2']."'><br>";
									}
									if($room_info_array_etc['0']['bf_file_3'] == ''){
									} else {
									  $html .="<img src='/real_reservation/product_img/".$room_info_array_etc['0']['bf_file_3']."'><br>";
									}
									if($room_info_array_etc['0']['bf_file_4'] == ''){
									} else {
									  $html .="<img src='/real_reservation/product_img/".$room_info_array_etc['0']['bf_file_4']."'><br>";
									}
									if($room_info_array_etc['0']['bf_file_5'] == ''){
									} else {
									  $html .="<img src='/real_reservation/product_img/".$room_info_array_etc['0']['bf_file_5']."'><br>";
									}
									  
									
							   $html .="
									</p>
                                    <h5 class='hide'>상품 하단 정보</h5>
                                    ".$room_info_array_etc['0']['guestroom_content']."
                                    
                                </div>
                                <input type='hidden' name='get_goption_all_pay' id='get_goption_all_pay' value='".json_encode($get_goption_all_pay)."'>           
                                <input type='hidden' name='room_info_array_etc' id='room_info_array_etc' value='".json_encode($room_info_array_etc)."'>         
                                <input type='hidden' name='arrayLocationDetail' id='arrayLocationDetail' value='".json_encode($arrayLocation)."'>         
                                <div class='info_all bot_map' id='mapDetail'>
                                </div>
                                 
                            </section>";
echo $html;