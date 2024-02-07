
<?php
// session_start();
@session_save_path($_SERVER["DOCUMENT_ROOT"]."/data/session");
@session_start();
// session_destroy();
// print_r($_SESSION); 
// $user_name = $_SESSION['session_user_id'];
// echo "user_name >>> $user_name <br>";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";


$divisionType = trim(isset($_REQUEST['divisionType'])) ? $_REQUEST['divisionType'] : '1';//상품타입
$dataType = trim(isset($_REQUEST['dataType'])) ? $_REQUEST['dataType'] : '';//상품타입
$dateType = trim(isset($_REQUEST['dateType'])) ? $_REQUEST['dateType'] : '';//상품타입
$act_target = trim(isset($_REQUEST['act_target'])) ? $_REQUEST['act_target'] : '';//상품타입
$pageDiv = trim(isset($_REQUEST['pageDiv'])) ? $_REQUEST['pageDiv'] : '';//상품타입
$bo_table = trim(isset($_REQUEST['bo_table'])) ? $_REQUEST['bo_table'] : '';//상품타입
$division = trim(isset($_REQUEST['division'])) ? $_REQUEST['division'] : '';//상품타입
$locate = trim(isset($_REQUEST['locate'])) ? $_REQUEST['locate'] : '';//상품타입
$area = trim(isset($_REQUEST['area'])) ? $_REQUEST['area'] : '';//상품타입
$basicoption = trim(isset($_REQUEST['basicoption'])) ? $_REQUEST['basicoption'] : '';//상품타입
$dateStr = trim(isset($_REQUEST['dateStr'])) ? $_REQUEST['dateStr'] : '';//상품타입
$guestroom_code = trim(isset($_REQUEST['guestroom_code'])) ? $_REQUEST['guestroom_code'] : '';//상품타입
$select_guestroom_fee = trim(isset($_REQUEST['select_guestroom_fee'])) ? $_REQUEST['select_guestroom_fee'] : '0';//상품타입
$select_option_fee = trim(isset($_REQUEST['select_option_fee'])) ? $_REQUEST['select_option_fee'] : '0';//상품타입
$select_option = trim(isset($_REQUEST['select_option'])) ? $_REQUEST['select_option'] : '';//상품타입
$reserve_code = trim(isset($_REQUEST['reserve_code'])) ? $_REQUEST['reserve_code'] : '';//상품타입
$guestroom_name = trim(isset($_REQUEST['guestroom_name'])) ? $_REQUEST['guestroom_name'] : '';//상품타입
$guestroom_use_hour = trim(isset($_REQUEST['guestroom_use_hour'])) ? $_REQUEST['guestroom_use_hour'] : '';//상품타입
$total_fee_input = trim(isset($_REQUEST['total_fee_input'])) ? $_REQUEST['total_fee_input'] : '0';//상품타입
$discount = trim(isset($_REQUEST['discount'])) ? $_REQUEST['discount'] : '0';//상품타입
$select_discount_fee = trim(isset($_REQUEST['select_discount_fee'])) ? $_REQUEST['select_discount_fee'] : '0';//상품타입



// echo "
// divisionType > $divisionType <br>
// dataType > $dataType <br>
// dateType > $dateType <br>
// locate > $locate <br>
// act_target > $act_target <br>
// pageDiv > $pageDiv <br>
// bo_table > $bo_table <br>
// division > $division <br>
// area > $area <br>
// basicoption > $basicoption <br>
// dateStr > $dateStr <br>
// guestroom_code > $guestroom_code <br>
// select_guestroom_fee > $select_guestroom_fee <br>
// select_option_fee > $select_option_fee <br>
// select_option > $select_option <br>
// reserve_code > $reserve_code <br>
// guestroom_name > $guestroom_name <br>
// guestroom_use_hour > $guestroom_use_hour <br>
// total_fee_input > $total_fee_input <br>
// discount > $discount <br>
// select_discount_fee > $select_discount_fee <br>
// ";

if($dateStr){
    $dateStrExp = explode("~",$dateStr);
    $todate = $dateStrExp['0'];
    $nextdate = $dateStrExp['1'];
    $intidate = $todate."~".$nextdate;
}
else{
    $todate = date("Y-m-d");
    $nextdate = date('Y-m-d', strtotime("+1 day", time()));
    $intidate = $todate."~".$nextdate;
}
// echo "
// todate > $todate <br>
// nextdate > $nextdate <br>
// ";
$get_management_value = get_management_value();
// $get_wzp_pension_info = get_wzp_pension_info();
// print_r($get_wzp_pension_info);
// $arrayLocation = array();
// $arrData = array(
//     'place' => "김유혁주식회사12",
//     'lat' => "37.6547184",
//     'lng' => "127.012432",
// );
// array_push($arrayLocation, $arrData);
// $arrData = array(
//     'place' => "ems세무회계",
//     'lat' => "35.1527974",
//     'lng' => "128.9732369",
//      );
// array_push($arrayLocation, $arrData);
// arrayLocation, [{"place":"\uae40\uc720\ud601\uc8fc\uc2dd\ud68c\uc0ac12","lat":"37.709254","lng":"126.7849089"}]

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link rel="stylesheet" type="text/css" href="/theme/template1/sub/reserve_camp.css">
<link rel="stylesheet" type="text/css" href="/theme/template1/sub/result.css">
<script type="text/javascript" src="http://bestchina.barunweb.co.kr/theme/template1/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="http://jwsntech.barunweb.co.kr/js/shop.list.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
<script src="http://jwsntech.barunweb.co.kr/client/js/common.js"></script>

<div class="subpage bg" id="subpagebg">
<form name="reserveForm" id="reserveForm" method="POST">
                         <input type="hidden" name="divisionType" id="divisionType" value="1">
                         <input type="hidden" name="bo_table" id="bo_table"  value="73">
                         <input type="hidden" name="pageDiv" id="pageDiv">
                         <input type="hidden" name="division" id="division">
                         <input type="hidden" name="locate" id="locate">
                         <input type="hidden" name="area" id="area">
                         <input type="hidden" name="basicoption" id="basicoption">
                         <input type="hidden" name="dateStr" id="dateStr" value="<?=$dateStr?>">
                         <input type="hidden" name="guestroom_code" id="guestroom_code" value="<?=$guestroom_code?>">
                         <input type="hidden" name="select_guestroom_fee" id="select_guestroom_fee" value="<?=$select_guestroom_fee?>">
                         <input type="hidden" name="select_option_fee" id="select_option_fee" value="<?=$select_option_fee?>">
                         <input type="hidden" name="select_option" id="select_option"  value="<?=$select_option?>">
                         <input type="hidden" name="reserve_code" id="reserve_code"  value="<?=$reserve_code?>">
                         <input type="hidden" name="guestroom_name" id="guestroom_name" value="<?=$guestroom_name?>">
                         <input type="hidden" name="guestroom_use_hour" id="guestroom_use_hour"value="<?=$guestroom_use_hour?>">
                         <input type="hidden" name="total_fee_input" id="total_fee_input" value="<?=$total_fee_input?>">
                         <input type="hidden" name="discount" id="discount" value="<?=$discount?>">
                         <input type="hidden" name="select_discount_fee" id="select_discount_fee"  value="<?=$select_discount_fee?>">
    <div class="sch_box">
        <div class="sch_tit">
            <h2>캠핑카, 간편하게 예약 후 바로 떠나세요!</h2>
        </div>

        <div class="sch_content">
            <div class="sch_form">
                <div class="sch_select sch_date">
                    <div class="sch_txt">
                        <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate">
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
    <? if($pageDiv == 'reserve_first'){?>
    <div id="sub_page_1">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_1.php";?>
    </div>
    <div id="sub_page_map">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_map.php";?>
    <?}?>
    <!-- 리스트 페이지 끝 -->

    <!-- 오른쪽 지도 -->
    <? if($pageDiv == 'reserve_second'){?>
    
    <!-- 오른쪽 지도 끝 -->
    </div>
    <!-- 상세페이지 -->
    <div id="sub_page_detail">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_detail.php";?>
    </div>
    <?}?>
    <!-- 상세페이지 끝 -->
</div>

    
<div class="main_wrap">
    <section id="login_form">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_login.php";?>
    </section>
    <section id="register_form">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_join.php";?>
    </section>
    <? if($pageDiv == 'reserve_fourth'){?>
    <section id="customer_info" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sec4.php";?>
    </section>
    <?}?>
    <? if($pageDiv == 'reserve_fifth'){?>
    <section id="reservation_completion" class="">
        <div id="room_reserve_end" style="">
        <h4 class="hide">예약 완료</h4>
        <div id="reserve_fourth_area">
        <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sec5_pc.php";?>
        </div>
        <div id="reserve_fourth_area_mo">
        <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sec5_mo.php";?>
        </div>
        <div class="button_box" style="text-align: center;">
         <input type="button" name="room_reserve_end_btn" id="room_reserve_end_btn" value="확인"  onclick="move_page('main');">
        </div>
        </div>
    </section>
    <?}?>
    <? if($pageDiv == 'reserve_confirm'){?>
    <section id="reservation_inquiry" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_inquiry.php";?>
    </section>
    <section id="reservation_inquiry_list" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_inquiry_list.php";?>        
    </section>
    <?}?>
    <!-- 상세페이지 끝 -->
</div>    
    
    
</div>
</form>
 <!-- 스크립트페이지 -->
 <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_script_test.php";?>
