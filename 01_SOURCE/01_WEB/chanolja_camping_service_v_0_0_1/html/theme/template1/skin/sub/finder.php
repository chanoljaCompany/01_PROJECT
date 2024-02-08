<?php
error_reporting(E_ALL);
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
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link rel="stylesheet" type="text/css" href="http://www.chanolja.co.kr/theme/template1/sub/reserve_camp.css">
<link rel="stylesheet" type="text/css" href="http://www.chanolja.co.kr//theme/template1/sub/result.css">
<script type="text/javascript" src="http://bestchina.barunweb.co.kr/theme/template1/assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="http://jwsntech.barunweb.co.kr/js/shop.list.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>


<div class="sch_top bg0" id="sch_topbg">
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


     <div class="sch2_box">

        <div class="sch_content">

            <div class="sch_form">

<table>
<tbody>
<tr>
<td>
                <div class="sch_select sch_date">

                    <div class="sch_txt">
                        <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate" >

                    </div>

                </div>

</td>
<td>


                <div class="sch_select sch_locate" id="sch_pop">

                    <div class="sch_txt">
                        <p>어디서 출발하시나요?</p>
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


</td>
<td>

            <div class="sch_submit">
			<a class="em-active-button" href="/bbs/board.php?bo_table=70">캠핑카 예약하기</a>
				<!-- <a href="javascript:void(0);" onclick="findSearchData('main');"><i class="fas fa-search"></i> 검색-->
                </a>
            </div>
</td>
</tr>
</tbody>
</table>

        </div>

    </div>
</div>

		
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