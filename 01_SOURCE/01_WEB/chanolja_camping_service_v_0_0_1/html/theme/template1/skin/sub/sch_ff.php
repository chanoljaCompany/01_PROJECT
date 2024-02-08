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
                         <input type="hidden" name="mapid" id="mapid"  value="">
                         <input type="hidden" name="reserve_interval_day_val" id="reserve_interval_day_val"  value="">
						     <div class="col-md-7 col-sm-12 col-xs-12 list_left"  id="loadingArea">

<div class="list_filter">
            <div class="list_content">
                <ul class="row">
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list_form" id="list_form_subcalendar">
                            <h3>날짜선택</h3>
                            <div class="list_select">
                                <input type="date" class="selector flatpickr-input" value="" id="inputDate_sub" name="inputDate_sub">
                            </div>
                        </div>
                    </li>
	
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list_form" id="list_form_subarea">
                            <h3>지역선택</h3>
                            <div class="list_select">
                                <p>지역선택</p><span class="sch_down"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="list_box">
                                <h4>지역선택</h4>
                                <div class="sch_checkbox" id="subArea">
                                    <span>
                                        <input type="checkbox" id="chk1" name="area_sub[]" value="강원" class="">
                                        <label for="chk1">강원</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk2" name="area_sub[]" value="경기/인천" class="">
                                        <label for="chk2">경기/인천</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk3" name="area_sub[]" value="광주/전라" class="">
                                        <label for="chk3">광주/전라</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk4" name="area_sub[]" value="대구/울산/경북" class="">
                                        <label for="chk4">대구/울산/경북</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk5" name="area_sub[]" value="대전/충청" class="">
                                        <label for="chk5">대전/충청</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk6" name="area_sub[]" value="부산/경남" class="">
                                        <label for="chk6">부산/경남</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk7" name="area_sub[]" value="서울" class="">
                                        <label for="chk7">서울</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk8" name="area_sub[]" value="제주" class="">
                                        <label for="chk8">제주</label>
                                    </span>
                                </div>
                                <div class="check_btn"><a href='javascript:void(0);' onclick="selecthide('list_form_subarea');">선택완료</a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="list_btn">
                <ul class="row">
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="list_search">
                        <a href="javascript:void(0);" onclick="findSearchData('main');" >                            
                        <i class="fas fa-search"></i> 검색</a></div>
                    </li>
                </ul>
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


                         
                         