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
$room_info_array_etc_data = "";
$room_info_array_etc = room_info_array_etc($get_guestroom_code,$dateStr,$divisionType);
// print_r($room_info_array_etc);
// $get_goption_all = get_goption_all($get_guestroom_code,"b");
// $get_goption_all_pay = get_goption_all($get_guestroom_code,"p");
// print_r($get_goption_all_pay);
//  print_r($get_goption_all_pay);
$html = "";
$html .="<div class='price_wrap'>
        <span class='price_'>".number_format($room_info_array_etc['0']['room_fee'])."</span>
        <span class='price_won'>원</span>
        <span class='price_night'>/".number_format($room_info_array_etc['0']['dateintval'])."박 ~</span>
            </div>
            <p class='reverve'>예약하기</p>
            <div class=''>
                <div class='list_form'>
                    <div class='list_select'>
                        <p>추가옵션 상품 선택</p><span class='sch_down'><i class='fas fa-angle-down'></i></span>
                    </div>
                    <div class='list_box'>
                        <h4>상품선택</h4>
                        <div class='price_checkbox'>
                            <span class='price_item'>
                                <input type='checkbox' id='price_chk1' name='chk1' value='자차등록비24시간' class=''>
                                <label for='price_chk1'>자차등록비24시간 <span class='price_num'>20,000</span>원</label>
                            </span>
                            <span class='price_item'>
                                <input type='checkbox' id='price_chk2' name='chk2' value='침구류4인기준' class=''>
                                <label for='price_chk2'>침구류4인기준 <span class='price_num'>20,000</span>원</label>
                            </span>
                        </div>
                        <div class='check_btn'><a href=''>선택완료</a></div>
                    </div>
                </div>

                <div class='calendar_wrap'>
                    <div class='calendar' style=''>
                        <p style=''>달력 영역</p>
                    </div>
                    <div class='reset_btn_wrap'>
                        <a href='#' class='reset_btn'>
                            날짜선택 초기화
                        </a>
                    </div>
                </div>
            </div>
            <div class='pricing'>
                <table>
                    <tbody>
                        <tr>
                            <td>예약기간</td>
                            <td>✕ 1</td>
                        </tr>
                        <tr>
                            <td>가격</td>
                            <td><span class=''>380,000</span><span class=''>원</span></td>
                        </tr>
                        <tr>
                            <td>자차등록비24시간</td>
                            <td><span class=''>20,000</span><span class=''>원</span></td>
                        </tr>
                        <tr>
                            <td>침구류4인기준</td>
                            <td><span class=''>20,000</span><span class=''>원</span></td>
                        </tr>
                        <tr>
                            <td>최종금액 결제하기</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><strong>총계</strong></td>
                            <td><strong><span class=''>420,000</span><span class=''>원</span></strong></td>
                        </tr>
                        <tr>
                            <td><strong>결제금액</strong></td>
                            <td><strong><span class=''>420,000</span><span class=''>원</span></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class='reserve_btn_wrap'>
                <a href='#' class='reserve_btn'>
                    <span>바로 예약하기</span>
                </a>
            </div>
";
echo$html;