
<?php
//error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
// require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";
if(!session_id()) {
    session_start();
}

$divisionType = trim(isset($_REQUEST['divisionType'])) ? $_REQUEST['divisionType'] : '1';//상품타입
$dataType = trim(isset($_REQUEST['dataType'])) ? $_REQUEST['dataType'] : '';//상품타입
$dateType = trim(isset($_REQUEST['dateType'])) ? $_REQUEST['dateType'] : '';//상품타입
$act_target = trim(isset($_REQUEST['act_target'])) ? $_REQUEST['act_target'] : '';//상품타입
// http://choriforest.visithappy.co.kr/client/index_main.php?divisionType=3&act_target=1111
$todate = date("Y-m-d");
$nextdate = date('Y-m-d', strtotime("+1 day", time()));
$intidate = $todate."~".$nextdate;
$get_management_value = get_management_value();
// $get_wzp_pension_info = get_wzp_pension_info();
// print_r($get_wzp_pension_info);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link rel="stylesheet" type="text/css" href="/client/reserve_camp.css">
<link rel="stylesheet" type="text/css" href="/client/result.css">
<script type="text/javascript" src="http://bestchina.barunweb.co.kr/theme/template1/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="http://jwsntech.barunweb.co.kr/js/shop.list.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="http://jwsntech.barunweb.co.kr/client/js/common.js"></script>
<div class="subpage bg" id="subpagebg">
                         <form name="reserveForm" id="reserveForm">
                         <input type="hidden" name="dateStr" id="dateStr">
                         <input type="hidden" name="select_guestroom_code" id="select_guestroom_code">
                         <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee" value="0">
                         <input type="hidden" name="select_option_fee" id="select_option_fee" value="0">
                         <input type="hidden" name="select_option" id="select_option"  value="0">
                         <input type="hidden" name="divisionType" id="divisionType" value="<?=$divisionType?>">
                         <input type="hidden" name="reserve_code" id="reserve_code">
                         <input type="hidden" name="guestroom_name" id="guestroom_name">
                         <input type="hidden" name="guestroom_use_hour" id="guestroom_use_hour">
                         <input type="hidden" name="total_fee_input" id="total_fee_input"  value="0">
                         <input type="hidden" name="discount" id="discount" value="0">
                         <input type="hidden" name="select_discount_fee" id="select_discount_fee"  value="0">
                         <input type="hidden" name="sss" id="sss"  value="">
                         <input type="hidden" name="sss" id="eee"  value="">
                         
                         
    <div class="sch_box">
        <div class="sch_tit">
            <h2>캠핑카, 간편하게 예약 후 바로 떠나세요!</h2>
        </div>

        <div class="sch_content">

            <div class="sch_form">

                <div class="sch_select sch_date">

                    <div class="sch_txt">

                        <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate">
                        <!--<span class="sch_down">
                            <i class="fas fa-angle-down"></i>
                        </span>-->

                    </div>

                   <!-- <div class="sch_pop sch_calendar list_select_calendar">
                        <p style="">
                            <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate">
                             <input type="date" class="selector flatpickr-input" value="" id="inputDate_day"> 
                        </p>
                    </div>-->

                </div>

                <div class="sch_select sch_locate" id="sch_pop">

                    <div class="sch_txt">
                        <p>지역을 선택하세요</p>
                        <span class="sch_down">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </div>

                    <div class="sch_pop sch_check" >
                        <h3>지역선택</h3>
                        <p>복수선택가능</p>
                        <div class="sch_checkbox" id="mainArea">
                            <!-- <span>
                                <input type="checkbox" id="chk1" name="area[]" value="강원" class="">
                                <label for="chk1">강원</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk2" name="area[]" value="경기/인천" class="">
                                <label for="chk2">경기/인천</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk3" name="area[]" value="광주/전라" class="">
                                <label for="chk3">광주/전라</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk4" name="area[]" value="대구/울산/경북" class="">
                                <label for="chk4">대구/울산/경북</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk5" name="area[]" value="대전/충청" class="">
                                <label for="chk5">대전/충청</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk6" name="area[]" value="부산/경남" class="">
                                <label for="chk6">부산/경남</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk7" name="area[]" value="서울" class="">
                                <label for="chk7">서울</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk8" name="area[]" value="제주" class="">
                                <label for="chk8">제주</label>
                            </span> -->
                        </div>
                        <div class="check_btn"><a href='javascript:void(0);' onclick="selecthide('sch_pop');">선택완료</a></div>
                    </div>
                 </div>

            </div>

            <div class="sch_submit">
                <a href="javascript:void(0);" onclick="findSearchData('main');" >
                    <i class="fas fa-search"></i> 검색
                </a>
            </div>

        </div>

    </div>
</div>


<div class="subpage">
    <!-- 리스트 페이지 -->
    <div id="sub_page_1">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_1.php";?>
    </div>
    <!-- 리스트 페이지 끝 -->

    <!-- 오른쪽 지도 -->
    <div id="sub_page_map">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_map.php";?>
    <!-- 오른쪽 지도 끝 -->
    </div>
    <!-- 상세페이지 -->
    <div id="sub_page_detail">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_detail.php";?>
    </div>
    <!-- 상세페이지 끝 -->
</div>

    
<div class="main_wrap">
    <!-- 상세페이지 -->
    <section id="customer_info" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sec4.php";?>
    </section>
    <!-- 상세페이지 끝 -->
    <section id="login_form">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_login.php";?>
    </section>
    <section id="register_form">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_join.php";?>
    </section>
    <!-- 상세페이지 -->
    <section id="reservation_completion" class="">
        <div id="room_reserve_end" style="">
        <h4 class="hide">예약 완료</h4>
        <div id="reserve_fourth_area">
        <?include "$_SERVER[DOCUMENT_ROOT]/client/sec5_pc.php";?>
        </div>
        <div id="reserve_fourth_area_mo">
        <?include "$_SERVER[DOCUMENT_ROOT]/client/sec5_mo.php";?>
        </div>
        <div class="button_box" style="text-align: center;">
         <input type="button" name="room_reserve_end_btn" id="room_reserve_end_btn" value="확인"  onclick="move_page('main');">
        </div>
        </div>
    </section>
    <section id="reservation_inquiry" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_inquiry.php";?>
    </section>
    <section id="reservation_inquiry_list" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_inquiry_list.php";?>        
    </section>
    <!-- 상세페이지 끝 -->
</div>    
    
    
</div>
</form>
 <!-- 스크립트페이지 -->
 <?include "$_SERVER[DOCUMENT_ROOT]/client/sub_page_script.php";?>
