    <!-- 리스트 페이지 -->
    <div style="width: 100%; min-height:720px;" class="col-md-7 col-sm-12 col-xs-12 list_left"  id="loadingArea">
        <div class="list_filter">
            <div class="list_content">
                <ul class="row">
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list_form" id="list_form_subcalendar">
                            <font size="4.5px" weight='800'>■ 대여 희망 날짜</font>
                            <div class="list_select">
                                <input type="date" class="selector flatpickr-input" value="" id="inputDate_sub" name="inputDate_sub">
                                <!--<span class="sch_down">
                                    <i class="fas fa-angle-down"></i>
                                </span>-->
                            </div>
                            <!--<div class="list_box">
                                <h4>날짜선택</h4>
                                <div class="list_select_calendar">
                                    <input type="date" class="selector flatpickr-input" value="" id="inputDate" name="inputDate">
                                     <input type="date" class="selector flatpickr-input" value="" id="inputDate_day"> 
                                </div>
                                <div class="check_btn"><a href="">선택완료</a></div>
                            </div>-->
                        </div>
                    </li>
	
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list_form" id="list_form_subarea">
                            <font size="4.5px" weight='800'>■ 대여 희망 지역</font>
                            <div class="list_select">
                                <p>지역선택</p><span class="sch_down"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="list_box">
                                <h4>지역선택</h4>
                                <div class="sch_checkbox" id="subArea">
								<!--
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
									-->
                                </div>
                                <div class="check_btn"><a href='javascript:void(0);' onclick="selecthide('list_form_subarea');">선택완료</a></div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list_form" id="list_form_subdetail">
                            <font size="4.5px" weight='800'>■ 세부검색</font>                            
                            <div class="list_select">
                                <p>더보기</p><span class="sch_down"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="list_box">
                                <div class="list_scroll">
                                    
                                    <div>
                                        <h4>동승인원수</h4>
                                        <input type="text" name='personnel'>
                                    </div>
                                    <div>
                                        <h4>차량 및 지역명으로 검색</h4>
                                        <input type="text" name='guestroom_name' value='제주'>
                                    </div>
                                    <!--
                                    <div class="sch_checkbox">
                                        <h4>반려동반 가능여부</h4>
                                        <input type="checkbox" name='pet_able' value='Y'>
                                        <label for="">반려동물 동반 가능</label>
                                    </div>                                    
                                    <div class="sch_checkbox">
                                        <h4>탁송(딜리버리) 가능여부</h4>
                                        <input type="checkbox" name='delivery_able' value='Y'>
                                        <label for="">딜리버리 가능</label>
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>기본 캠핑장비 제공여부</h4>
                                        <input type="checkbox" name='camping_able' value='Y'>
                                        <label for="">기본 캠핑장비 제공</label>
                                    </div>
                                    <div>
                                        <h4>가격범위</h4>
                                        <input type="text" size="10" name="sPrice" placeholder="최소"> - <input type="text" size="10"  name="ePrice" placeholder="최대">
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>운전면허 종류</h4>
                                        <p>복수선택 가능</p>
                                        <span>
                                            <input type="checkbox" name='driver_license[]' value='1종대형'>
                                            <label for="">1종 대형</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" name='driver_license[]' value='1종보통'>
                                            <label for="">1종 보통</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" name='driver_license[]' value='2종보통'>
                                            <label for="">2종 보통</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" name='driver_license[]' value='소형견인차'>
                                            <label for="">소형 견인차</label>
                                        </span>
                                    </div>
-->
                                    <div class="sch_checkbox" id="basicOption">
                                       
                                    </div>
                                </div>
                                <div class="check_btn"><a href='javascript:void(0);' onclick="selecthide('list_form_subdetail');">선택완료</a></div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="list_btn">
                <ul class="row">
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="list_search">
                        <a href="javascript:void(0);" onclick="findSearchData('sub');" >                            
                        <i class="fas fa-search"></i> 검색</a></div>
                    </li>
                    <!-- <li class="col-md-4 col-sm-6 col-xs-6 list_right">
                        <div class="list_clear"><a href="javascript:void(0);"><i class="fas fa-eraser"></i> 초기화</a></div>
                    </li> -->
                </ul>
            </div>

        </div>

        <ul class="sct sct_wrap lists-row"   id= "reserve_first_area">
            <!-- <li class='sct_li col-row-3' data-css='nocss' style='height:auto'>
                <div class='sct_img'>
                    <a href=''>
                        <img src='http://jwsntech.barunweb.co.kr/data/item/1646630363/thumb-test_353x220.jpg' width='353' height='220' alt='[카올라] 카니발 캠퍼밴 (2인승)' title='[카올라] 카니발 캠퍼밴 (2인승)'>
                    </a>
                </div>
                <div class='sct_ct_wrap'>
                    <div class='sct_txt'><a href=''>
                            [카올라] 카니발 캠퍼밴 (2인승)
                        </a></div>
                    <div class='sct_basic'>프리미엄 풀옵션 차박</div>
                </div>
                <div class='sct_sub_txt_wrap'>
                    <ul class='sct_sub_ul'>
                        <li><span> <i class='fas fa-map-marker-alt'></i> 차고지 : 대한민국 경기도 안양시</span></li>
                        <li><span> <i class='fas fa-address-card'></i> 2종 보통</span></li>
                        <li><span> <i class='fas fa-user-friends'></i> 동승 2명</span></li>
                        <li><span> <i class='fas fa-bed'></i> 취침 2명</span></li>
                        <li><span> <i class='fas fa-dog'></i> 반려동물 동반 가능</span></li>
                        <li><span> <i class='fas fa-bolt'></i> 딜리버리 가능</span></li>
                    </ul>
                    <div class='sct_sub_txt'><span><i class='far fa-calendar-check'></i> 잊지못할 밤, 150,000원 부터 </span></div>
                </div>
                <div class='sct_op_btn'>
                    <button type='button' class='btn_wish' data-it_id=''><span class='sound_only'>위시리스트</span><i class='far fa-heart'></i></button>
                </div>
            </li> -->
        </ul>

    </div>