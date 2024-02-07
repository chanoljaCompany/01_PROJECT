<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

// 장바구니 또는 위시리스트 ajax 스크립트
add_javascript('<script src="'.G5_THEME_JS_URL.'/theme.shop.list.js"></script>', 10);
?>

<div class="sct11_wrap row">
    <div class="col-md-5 col-sm-12 col-xs-12 sct11_right">
        <div class="sct11_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481883.4093045765!2d126.50601824094628!3d37.490588374595774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c98d980dc9e0d%3A0x8e147623fc0b5e2d!2z67CU66W47Ju5!5e0!3m2!1sko!2skr!4v1646714264801!5m2!1sko!2skr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <div class="col-md-7 col-sm-12 col-xs-12 sct11_right">
        <div class="sct11_filter">
            <div class="sct11_content">
                <ul class="row">
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="sct11_form">
                            <h3>날짜선택</h3>
                            <div class="sct11_select"><p>날짜선택</p><span class="sch_down"><i class="fas fa-angle-down"></i></span></div>
                            <div class="sct11_box">
                                <h4>날짜선택</h4>
                                <div>
                                    달력
                                </div>
                                <div class="check_btn"><a href="">선택완료</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="sct11_form">
                            <h3>지역선택</h3>
                            <div class="sct11_select"><p>지역선택</p><span class="sch_down"><i class="fas fa-angle-down"></i></span></div>
                            <div class="sct11_box">
                                <h4>지역선택</h4>
                                <div class="sch_checkbox">
                                    <span>
                                        <input type="checkbox" id="chk1" name="chk1" value="강원" class="">
                                        <label for="chk1">강원</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk2" name="chk2" value="경기/인천" class="">
                                        <label for="chk2">경기/인천</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk3" name="chk3" value="광주/전라" class="">
                                        <label for="chk3">광주/전라</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk4" name="chk4" value="대구/울산/경북" class="">
                                        <label for="chk4">대구/울산/경북</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk5" name="chk5" value="대전/충청" class="">
                                        <label for="chk5">대전/충청</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk6" name="chk6" value="부산/경남" class="">
                                        <label for="chk6">부산/경남</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk7" name="chk7" value="서울" class="">
                                        <label for="chk7">서울</label>
                                    </span>
                                    <span>
                                        <input type="checkbox" id="chk8" name="chk8" value="제주" class="">
                                        <label for="chk8">제주</label>
                                    </span>
                                </div>
                                <div class="check_btn"><a href="">선택완료</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12">
                        <div class="sct11_form">
                            <h3>세부검색</h3>
                            <div class="sct11_select"><p>더보기</p><span class="sch_down"><i class="fas fa-angle-down"></i></span></div>
                            <div class="sct11_box">
                                <div class="sct11_scroll">
                                    <div>
                                        <h4>차량 및 업체명으로 검색</h4>
                                        <input type="text">
                                    </div>
                                    <div>
                                        <h4>동승인원수</h4>
                                        <input type="text">
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>반려동반 가능여부</h4>
                                        <input type="checkbox">
                                        <label for="">반려동물 동반 가능</label>
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>탁송(딜리버리) 가능여부</h4>
                                        <input type="checkbox">
                                        <label for="">딜리버리 가능</label>
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>기본 캠핑장비 제공여부</h4>
                                        <input type="checkbox">
                                        <label for="">기본 캠핑장비 제공</label>
                                    </div>
                                    <div>
                                        <h4>가격범위</h4>
                                        <input type="text" size="10" placeholder="최소"> - <input type="text" size="10" placeholder="최대">
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>운전면허 종류</h4>
                                        <p>복수선택 가능</p>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">1종 대형</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">1종 보통</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">2종 보통</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">소형 견인차</label>
                                        </span>
                                    </div>
                                    <div class="sch_checkbox">
                                        <h4>보유시설</h4>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">TV</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">가스레인지</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">냉수기</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">냉장고</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">루프박스</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">무시동 히터</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">물탱크</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">바닥난방</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">방충망</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">배기시설</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">블랙박스</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">블루투스 스피커</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">사이드어닝</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">샤워실</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">수면용품</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">스카이창</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">싱크대</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">암막커튼</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">에어컨</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">오수탱크</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">온수기</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">외부샤워기</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">유아용 카시트</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">유압식테이블</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">인덕션</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">전기레인지</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">전기콘센트</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">충전식배터리</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">침대</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">테이블</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">팝업루프</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">평탄화 키트</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">화장실</label>
                                        </span>
                                        <span>
                                            <input type="checkbox">
                                            <label for="">후방 카메라</label>
                                        </span>
                                    </div>
                                </div>
                                <div class="check_btn"><a href="">선택완료</a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="sct11_btn">
                <ul class="row">
                    <li class="col-md-2 col-sm-6 col-xs-6">
                        <div class="sct11_search"><a href=""><i class="fas fa-search"></i> 검색</a></div>
                    </li>
                    <li class="col-md-2 col-sm-6 col-xs-6 sct11_right">
                        <div class="sct11_clear"><a href=""><i class="fas fa-eraser"></i> 초기화</a></div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 상품진열 11 시작 { -->
        <?php
        $i = 0;

        $this->view_star = (method_exists($this, 'view_star')) ? $this->view_star : true;

        foreach((array) $list as $row){
            if( empty($row) ) continue;

            $item_link_href = shop_item_url($row['it_id']);     // 상품링크
            $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';     //사용자후기 평균별점
            $list_mod = $this->list_mod;    // 분류관리에서 1줄당 이미지 수 값 또는 파일에서 지정한 가로 수
            $is_soldout = is_soldout($row['it_id'], true);   // 품절인지 체크

            $classes = array();

            $classes[] = 'col-row-'.$list_mod;

            if( $i && ($i % $list_mod == 0) ){
                $classes[] = 'row-clear';
            }
            
            $i++;   // 변수 i 를 증가

            if ($i === 1) {
                if ($this->css) {
                    echo "<ul class=\"{$this->css}\">\n";
                } else {
                    echo "<ul class=\"sct sct_11 lists-row\">\n";
                }
            }
            
            echo "<li class=\"sct_li ".implode(' ', $classes)."\" data-css=\"nocss\" style=\"height:auto\">\n";
            echo "<div class=\"sct_img\">\n";

            if ($this->href) {
                echo "<a href=\"{$item_link_href}\">\n";
            }

            if ($this->view_it_img) {
                echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
            }

            if ($this->href) {
                echo "</a>\n";
            }
            
            echo "</div>\n";
            
            echo "<div class=\"sct_ct_wrap\">\n";
            
            // 사용후기 평점표시
            if ($this->view_star && $star_score) {
                echo "<div class=\"sct_star\"><span class=\"sound_only\">고객평점</span><img src=\"".G5_SHOP_URL."/img/s_star".$star_score.".png\" alt=\"별점 ".$star_score."점\" class=\"sit_star\"></div>\n";
            }
            
            if ($this->view_it_id) {
                echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
            }

            if ($this->href) {
                echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\">\n";
            }

            if ($this->view_it_name) {
                echo stripslashes($row['it_name'])."\n";
            }

            if ($this->href) {
                echo "</a></div>\n";
            }
            
            if ($this->view_it_basic && $row['it_basic']) {
                echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
            }

            echo "</div>\n";
            
            echo "<div class=\"sct_op_btn\">\n";
            echo "<button type=\"button\" class=\"btn_wish\" data-it_id=\"{$row['it_id']}\"><span class=\"sound_only\">위시리스트</span><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i></button>\n";
            
            echo "</li>\n";
        }   //end foreach

        if ($i >= 1) echo "</ul>\n";

        if($i === 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
        ?>
        <!-- } 상품진열 11 끝 -->
    </div>
</div>

<script>
//SNS 공유
$(function (){
	$(".btn_share").on("click", function() {
		$(this).parent("div").children(".sct_sns_wrap").show();
	});
    $('.sct_sns_bg, .sct_sns_cls').click(function(){
	    $('.sct_sns_wrap').hide();
	});
});	
$(function(){
    $(".sct11_select").click(function(){
        $(this).parent(".sct11_form").toggleClass("active");
    });
});		
</script>