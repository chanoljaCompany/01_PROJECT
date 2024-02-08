<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQ6VJRTL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<?php
//error_reporting(E_ALL);
ini_set("display_errors", 1);
$con_ip = $_SERVER["REMOTE_ADDR"];
if($con_ip == '118.37.116.172') $wr_test = 'AT';
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$divisionType = trim(isset($_REQUEST['divisionType'])) ? $_REQUEST['divisionType'] : '1';//상품타입
$dataType = trim(isset($_REQUEST['dataType'])) ? $_REQUEST['dataType'] : '';//상품타입
$dateType = trim(isset($_REQUEST['dateType'])) ? $_REQUEST['dateType'] : '';//상품타입
$act_target = trim(isset($_REQUEST['act_target'])) ? $_REQUEST['act_target'] : '';//상품타입
$car_code = trim(isset($_REQUEST['car_code'])) ? $_REQUEST['car_code'] : '';//상품타입
// $pay_target = trim(isset($_REQUEST['pay_target'])) ? $_REQUEST['pay_target'] : '';//상품타입
if($act_target == 'card_return'){
    $array_implode = json_encode($_POST);
    $authsuccess = $_POST['success'];
    $orderId = $_POST['orderId'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO pay_card_log (clog,reg_date) VALUE ('$array_implode',now())";
    sql_query($sql);
   
    // echo "
    // authsuccess > $authsuccess <br>
    // orderId > $orderId <br>
    // ";
    if($authsuccess == 'true') { //결제성공
        $sql_up = "UPDATE guestroom_reservation SET
                    guestroom_reserve_status = '3'
                   ,guestroom_reserve_payment_status = '2'
                   ,guestroom_reserve_payment_date = now()
                   ,guestroom_reserve_payment_total = '$amount'
                    WHERE 1=1
                    AND guestroom_reserve_code = '$orderId'
                    ";
        sql_query($sql_up);
    }
    else{//결제실패
        echo "<script>alert('결제에 실패하였습니다.');</script>";
		echo "<meta http-equiv='Refresh' content='0; URL=/bbs/board.php?bo_table=70'>";
		exit;
    }
    // foreach ($_POST as $key => $value){
	// echo $key.'='.$value.'<br />';
    // // echo " $key <br>";
    // if($key == 'authResultCode' && $value == '0000') {
    //     if($key == 'orderId'){
    //     $orderId = $value;
    //     echo "
    //     orderId > $orderId <br>
    //     ";
    //     }
    //  }
    // }
}
// http://choriforest.visithappy.co.kr/client/index_main.php?divisionType=3&act_target=1111
$todate = date("Y-m-d");
$nextdate = date('Y-m-d', strtotime("+1 day", time()));
$intidate = $todate."~".$nextdate;
// echo "
// intidate > $intidate <br>
// ";
$get_management_value = get_management_value();
// $get_wzp_pension_info = get_wzp_pension_info();
// print_r($get_wzp_pension_info);


include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>aa -->
<div class="subpage bg" id="subpagebg">
	<div class="sch_bg">
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
                         <input type="hidden" name="mapid" id="mapid"  value="">
                         <input type="hidden" name="reserve_interval_day_val" id="reserve_interval_day_val"  value="">

<br>
<br>
<br>
<br>	
<br>		 
<br>		 
<br>		 
<br>		 	 
                         
    <div class="sch_box">

        <div class="sch_tit">
            <b><font size="6" bold >예약문의 1811-6526</font></b>
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
                        <p>어디서 캠핑카를 빌려볼까요?</p>
                        <span class="sch_down">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </div>

                    <div class="sch_pop sch_check" >
                        <h3>대여희망지역</h3>
                        <p>복수선택가능합니다</p>
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

    <div class="creating_box" style="">
        <img src="../../theme/template1/img/예약문의.jpeg">
        </img>
    </div>

</div>
<br>
<br>



<!--서치박스 끝-->
</div>





<div class="box inner">
<div class="subpage">
<br>
<br>
<br>
<br>	
<br>		 
<br>		 
<br>		 
<br>	

    <!-- 리스트 페이지 -->
    
    <div id="sub_page_1">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_1.php";?>
    </div>

    <!-- 리스트 페이지 끝 -->

    <!-- 오른쪽 지도 
    <div id="sub_page_map">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_map.php";?>
    </div>
    <!-- 오른쪽 지도 끝 -->
    <!-- 상세페이지 -->
    <div id="sub_page_detail">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_detail.php";?>
    </div>
    <!-- 상세페이지 끝 -->
</div>
</div>
    
<div class="main_wrap">
    <!-- 상세페이지 -->
    <section id="customer_info" class="">
    <?
    // if($wr_test == 'AT'){
    //     include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sec44.php";
    // }
    // else{
        include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sec4.php";    
    // }
    ?>
    </section>
    <!-- 상세페이지 끝 -->
    <section id="login_form">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_login.php";?>
    </section>
    <section id="memberjoin" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_join.php";?>
    </section>
    <!-- 상세페이지 -->
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
    <section id="reservation_inquiry" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_inquiry.php";?>
    </section>
    <section id="reservation_inquiry_list" class="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_inquiry_list.php";?>        
    </section>
    <!-- 상세페이지 끝 -->
</div>    
    
    
</div>
</form>
 <!-- 스크립트페이지 -->


<!-- 전환페이지 설정 -->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script> 
<script type="text/javascript"> 
var _nasa={};
if(window.wcs) _nasa["cnv"] = wcs.cnv("1","10"); // 전환유형, 전환가치 설정해야함. 설치매뉴얼 참고

</script> 


<?
   // if($wr_test == 'AT'){
   // include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_script_dev.php";
   // }
   // else{
       include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/sub_page_script.php";    
   // }
?>
 <style>
        #copyUrl {
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 1px;
            margin: 0;
            padding: 0;
            border: 0;
        }

    </style>
 <input type="text" class="copyurl_input" style="" id="copyUrl">
<script>
    const url = new URLSearchParams(location.search);


if(url.get('manager_type') == 1){
    console.log('매니저 페이지');
    $('.creating_box').css('display','none');
    $('.sch_box').css('display','block');
}else{
    console.log('일반 페이지');
    $('.creating_box').css('display','flex');
    $('.sch_box').css('display','none');
}
</script>