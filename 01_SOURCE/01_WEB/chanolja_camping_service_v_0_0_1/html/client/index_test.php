<?php
////error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
// require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
$divisionType = trim(isset($_REQUEST['divisionType'])) ? $_REQUEST['divisionType'] : '1';//상품타입
$act_target = trim(isset($_REQUEST['act_target'])) ? $_REQUEST['act_target'] : '';//상품타입
// http://choriforest.visithappy.co.kr/client/index_main.php?divisionType=3&act_target=1111
$todate = date("Y-m-d");
$nextdate = date('Y-m-d', strtotime("+1 day", time()));
$intidate = $todate."~".$nextdate;
$get_management_value = get_management_value();
// print_r($get_management_value);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1, user-scalable=yes, initial-scale=1.0" />
    <title>실시간예약</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link rel="stylesheet" type="text/css" href="/client/reserve.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>

<body>
    <h1>실시간예약</h1>
    <div class="main_wrap">
        <section class="main_sec_wrap">
               <h2 class="hide">section wrap</h2>
            <div class="section_wrap">
                <!--<article id="tabs" class="travel_scroll_tab">-->
                    <section id="tabHeader" class="travel_scroll_tab_header">
                       <h3 class="hide">tab header</h3>
                        <div class="tab_header_wrapper">
                            <ul class="travel_scroll_tab_headers">
                                <li <? if($divisionType == '1'){?> class="selected" <?}?>><a href="/client/index.php?divisionType=1">숙박상품</a></li>
                                <li <? if($divisionType == '2'){?> class="selected" <?}?>><a href="/client/index.php?divisionType=2">당일상품</a></li>
                                <li <? if($divisionType == '3'){?> class="selected" <?}?>><a href="/client/index.php?divisionType=3">기타상품</a></li>
                                <li id= "rconfirm" <? if($divisionType == '4'){?> class="selected" <?}?>><a href="javascript:void(0);" onclick="reserveConfim()">예약확인</a></li>
                            </ul>
                        </div>
                    </section>

                    <section id="roomsPanel">
                       <h3 class="hide">rooms panel</h3>
                       <form name="reserveForm" id="reserveForm">
                         <input type="hidden" name="dateStr" id="dateStr">
                         <input type="hidden" name="select_guestroom_code" id="select_guestroom_code">
                         <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee">
                         <input type="hidden" name="select_option_size" id="select_option_size">
                         <input type="hidden" name="divisionType" id="divisionType" value="<?=$divisionType?>">
                         <input type="hidden" name="reserve_code" id="reserve_code">
                         <input type="hidden" name="guestroom_name" id="guestroom_name">
                            <section id="sec1">
                               <h4 class="hide">section 1</h4>
                                <div class="input_box">
                                    <!-- <input type="hidden" name="dateStr" id="dateStr" value="2022-02-23~2022-02-24">
                                    <input type="hidden" name="select_guestroom_code" id="select_guestroom_code">
                                    <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee">
                                    <input type="hidden" name="select_option_array" id="select_option_array"> -->
                                    <!--<input type="text" class="selector flatpickr-input" placeholder="날짜를 선택하세요." readonly="readonly">-->
                                    <input type="date" class="selector flatpickr-input" value="" id="inputDate">
                                    <!--<a class="input-button" title="toggle" data-toggle=""><i class="far fa-calendar-alt"></i></a>-->
                                    <select name="personnel" id="personnel" class="select_box">
                                        <? for($i=1 ; $i < '15' ; $i++){?>
                                        <option value="<?=$i?>">인원 <?=$i?>명</option>
                                        <?}?>
                                        <!-- <option value="2">성인 2명</option>
                                        <option value="3">성인 3명</option>
                                        <option value="4">성인 4명</option> -->
                                    </select>
                                    <!-- <select name="cnt_child" class="select_box">
                                        <option value="0">아동 0명</option>
                                        <option value="1">아동 1명</option>
                                        <option value="2">아동 2명</option>
                                    </select>
                                    <select name="cnt_baby" class="select_box">
                                        <option value="0">유아 0명</option>
                                        <option value="1">유아 1명</option>
                                        <option value="2">유아 2명</option>
                                    </select> -->
                                    <span><a href='javascript:void(0);' onclick="getData();" class="btn_lookup">객실조회</a></span>
                                </div>

                                <div id="room_info_area">
                                    <!-- pc table 시작 -->
                                    <div class="table_wrap_pc"  id= "reserve_first_area">
                                    </div>
                                    <!-- pc table 끝 -->

                                    <!-- 모바일 table 시작 -->
                                    <div class="mo_table_wrap"  id= "reserve_first_area_mo">
                                    </div>
                                    <!-- 모바일 table 끝 -->

                                </div>
                            </section>

                            <!-- 옵션 및 인원선택 -->
                            <section id="sec2" class="">
                              <?include "$_SERVER[DOCUMENT_ROOT]/client/sec2.php";?>
                            </section>
                              <!-- 옵션 및 인원선택끝 -->

                            <!-- 추가정보 -->
                            <section id="sec3">
                               <?include "$_SERVER[DOCUMENT_ROOT]/client/sec3.php";?>
                            </section>
                            <!-- 추가정보끝 -->

                            <!-- 고객정보 -->
                            <section id="sec4" class="">
                              <?include "$_SERVER[DOCUMENT_ROOT]/client/sec4.php";?>
                            </section>
                            <!-- 고객정보끝 -->

                            <section id="sec5" class="">
                               <h4 class="hide">section 5</h4>
                                <div id="room_reseve_end" style="">
                                    <!--여기는 결제완료후 보여지는 예약완료 화면입니다.<br>-->
                                    <h5>예약 결과</h5>
                                    <!-- pc table 시작 -->
                                    <div id="reserve_fourth_area">
                                    <?include "$_SERVER[DOCUMENT_ROOT]/client/sec5_pc.php";?>
                                    </div>
                                    <!-- pc table 끝 -->

                                    <!-- 모바일 table 시작 -->
                                    <div id="reserve_fourth_area_mo">
                                    <?include "$_SERVER[DOCUMENT_ROOT]/client/sec5_mo.php";?>
                                    </div>
                                    <!-- 모바일 table 끝 -->
                                    <div class="button_box" style="text-align: center;">
                                        <input type="button" name="room_reseve_end_btn" id="room_reseve_end_btn" value="확인" onclick="move_page('main');">
                                    </div>
                                </div>
                            </section>
                            <section id="sec6" class="">
                               <h4 class="hide">section 6</h4>
                                <div id="room_resevervation_inquiry" style="">
                                    <!--여기는 예약확인 화면1입니다.<br>-->
                                    <h5>예약 확인</h5>

                                    <div class="top_inquiry_wrap">
                                        <table class="table_inquiry">
                                            <tbody>
                                                <tr>
                                                    <th>예약자명</th>
                                                    <td>
                                                        <input type="text" name="resevervation_inquiry_name" id="resevervation_inquiry_name" placeholder="실명을 입력해주세요.">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>핸드폰번호</th>
                                                    <td>
                                                        <input type="text" name="resevervation_inquiry_phone" id="resevervation_inquiry_phone" placeholder="핸드폰 번호를 입력해주세요.">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="button_box" style="text-align: center;">
                                        <input type="button" name="room_resevervation_inquiry_btn" id="room_resevervation_inquiry_btn" onclick="reserve_confirm_act()" value="예약 확인">
                                    </div>

                                </div>
                            </section>

                            <section id="sec7" class="">
                               <h4 class="hide">section 7</h4>
                                <div id="room_resevervation_inquiry_list" style="">
                                    <div class="inquiry_list_wrap">

                                        <!-- pc table 시작 -->
                                        <div id="confirm_area_pc">
                                        </div>
                                        <!-- pc table 끝 -->

                                        <!-- mobile table 시작 -->
                                        <div id="confirm_area_mo">
                                        </div>
                                        <!-- mobile table 끝 -->

                                        <!-- <table class="table_inquiry_2">

                                            <thead>
                                                <tr>
                                                    <th>예약자 정보</th>
                                                    <td>테스트</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>결제방법</th>
                                                    <td>무통장</td>
                                                </tr>
                                                <tr>
                                                    <th>입금정보</th>
                                                    <td>입금자명 : 테스트, 입금계좌 : 신한은행 333-333-33333 초리</td>
                                                </tr>
                                                <tr>
                                                    <th>예약상태</th>
                                                    <td>대기</td>
                                                </tr>
                                                <tr>
                                                    <th>예약번호</th>
                                                    <td>1220302112514762</td>
                                                </tr>
                                                <tr>
                                                    <th>예약일시</th>
                                                    <td>2022-03-02 11:55:30</td>
                                                </tr>
                                                <tr>
                                                    <th>예약자명</th>
                                                    <td>테스트</td>
                                                </tr>
                                                <tr>
                                                    <th>생년월일</th>
                                                    <td>1978. 03. 02.</td>
                                                </tr>
                                                <tr>
                                                    <th>핸드폰</th>
                                                    <td>010-9876-5432</td>
                                                </tr>
                                                <tr>
                                                    <th>이메일</th>
                                                    <td>test@test.co.kr</td>
                                                </tr>
                                                <tr>
                                                    <th>요청사항</th>
                                                    <td>
                                                        테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> -->

                                    </div>

                                </div>
                            </section>
                            <input type="hidden" id="ordr_idxx" name="ordr_idxx" value="" maxlength="40" /><!--주문번호-->
                            <input type="hidden" id="good_name" name="good_name"/><!--상품명-->
                            <input type="hidden" id="good_mny" name="good_mny"/><!--결제금액-->
                            <input type="hidden" id="buyr_name" name="buyr_name"/><!--주문자명-->
                            <input type="hidden" id="buyr_tel1" name="buyr_tel1"/><!--전화번호-->
                            <input type="hidden" id="buyr_tel2" name="buyr_tel2"/><!--휴대폰번호-->
                            <input type="hidden" id="buyr_mail" name="buyr_mail"/><!--이메일-->
                            <input type="hidden" name="site_cd"         value="T0000" />
                            <input type="hidden" name="site_name"       value="TEST SITE" />
                            <input type="hidden" name="res_cd"          value=""/>
                            <input type="hidden" name="res_msg"         value=""/>
                            <input type="hidden" name="enc_info"        value=""/>
                            <input type="hidden" name="enc_data"        value=""/>
                            <input type="hidden" name="ret_pay_method"  value=""/>
                            <input type="hidden" name="tran_cd"         value=""/>
                            <input type="hidden" name="use_pay_method"  value=""/>
                            <input type="hidden" name="pay_method"  value=""/>
                        </form>
                    </section>

                <!--</article>-->
            </div>
        </section>

    </div>
</body>
</html>
<?include "$_SERVER[DOCUMENT_ROOT]/client/index_script.php";?>
