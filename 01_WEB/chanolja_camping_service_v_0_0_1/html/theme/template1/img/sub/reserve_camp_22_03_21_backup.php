
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$divisionType = trim(isset($_REQUEST['divisionType'])) ? $_REQUEST['divisionType'] : '1';//상품타입
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
<link rel="stylesheet" type="text/css" href="/theme/template1/sub/reserve_camp.css">
<script type="text/javascript" src="http://bestchina.barunweb.co.kr/theme/template1/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="http://jwsntech.barunweb.co.kr/js/shop.list.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>


<div class="subpage bg">
<form name="reserveForm" id="reserveForm">
                         <input type="hidden" name="dateStr" id="dateStr">
                         <input type="hidden" name="select_guestroom_code" id="select_guestroom_code">
                         <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee">
                         <input type="hidden" name="select_option_fee" id="select_option_fee" value="0">
                         <input type="hidden" name="select_option_size" id="select_option_size">
                         <input type="hidden" name="divisionType" id="divisionType" value="<?=$divisionType?>">
                         <input type="hidden" name="reserve_code" id="reserve_code">
                         <input type="hidden" name="guestroom_name" id="guestroom_name">
                         <input type="hidden" name="guestroom_use_hour" id="guestroom_use_hour">
    <div class="sch_box">

        <div class="sch_tit">
            <h2>캠핑카, 간편하게 예약 후 바로 떠나세요!</h2>
        </div>

        <div class="sch_content">

            <div class="sch_form">

                <div class="sch_select sch_date">

                    <div class="sch_txt">

                        <p>대여기간을 선택하세요</p>
                        <span class="sch_down">
                            <i class="fas fa-angle-down"></i>
                        </span>

                    </div>

                    <div class="sch_pop sch_calendar list_select_calendar">
                        <p style="">
                        <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate">
                        <!-- <input type="date" class="selector flatpickr-input" value="" id="inputDate_day">     -->

                        </p>
                    </div>

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
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_1.php";?>
    <!-- 리스트 페이지 끝 -->

    <!-- 오른쪽 지도 -->
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_map.php";?>
    <!-- 오른쪽 지도 끝 -->

    <!-- 상세페이지 -->
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_detail.php";?>
    <!-- 상세페이지 끝 -->

    <!-- 상세페이지 -->
    <?include "$_SERVER[DOCUMENT_ROOT]/client/sec4.php";?>
    <!-- 상세페이지 끝 -->
    </form>
</div>

 <!-- 스크립트페이지 -->
 <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_script.php";?>
