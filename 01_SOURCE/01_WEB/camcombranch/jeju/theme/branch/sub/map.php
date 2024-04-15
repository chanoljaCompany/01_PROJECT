<?php
include_once('./_common.php');

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/sub.css">', 1);
?>

<?php
$g5['navTitle'] = "제주지점";
$g5['title'] = "오시는길";
?>

<div class="sub sub01" id="map">
    <?php include_once(G5_THEME_PATH.'/head.php'); ?>
    <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
    <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
    <section class="sec sec1">
        <h1 class="blind">오시는 길</h1>
        <article class="inner">
        <h1 class="title">오시는 길</h1>
            <!-- * 카카오맵 - 지도퍼가기 -->
            <!-- 1. 지도 노드 -->
            <div id="daumRoughmapContainer1713165998212" class="root_daum_roughmap root_daum_roughmap_landing"></div>

            <!--
                2. 설치 스크립트
                * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
            -->
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

            <!-- 3. 실행 스크립트 -->
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp" : "1713165998212",
                    "key" : "2iydj",
                    "mapWidth" : "100%",
                    "mapHeight" : "100%"
                }).render();
            </script>
            <div class="map_info elm">
                <div class="lf_box">
                    <span>
                        <i class="xi-maker"></i>
                    </span>
                </div>
                <div class="rt_box">
                    <strong>차놀자캠핑 제주지점</strong>
                    <p>
                        <span>ADDRESS</span>
                        <span>제주특별자치도 제주시 어영길 26</span>
                    </p>
                    <p>
                        <span>Tel</span>
                        <span>1811-6526</span>
                    </p>
                </div>
            </div>

            <div class="topBox">
                <?php if($is_mobile) { ?>
                <div class="infoBox" id="timap">
                    <div class="titBox">
                        <p class="icon">
                            <i class="xi-car"></i>
                        </p>
                        <p class="text">자차로 오시는 방법</p>
                    </div>
                    <div class="btnBox">

                        <a href="javascript:void(0);" onclick="location.href='https://apis.openapi.sk.com/tmap/app/routes?appKey=①발급받은키값&name=②T맵에노출될상호명&lon=③경도&lat=③위도'">
                            <span>네비게이션 +</span>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <!--
                <div class="infoBox infoBox1">
                    <div class="titBox">
                        <p class="icon">
                            <i class="xi-subway"></i>
                        </p>
                        <p class="text">지하철로 오시는 길</p>
                    </div>
                    <ul>
                        <li>
                            <p  class="line line2">
                                <span>2</span>
                            </p>
                            <p class="tit">
                                2호선 잠실역
                            </p>
                            <p class="txt">
                            5번출구에서 3314, 3315번 버스 환승 후 송파구민회관에서 하차
                            </p>
                        </li>
                        <li>
                            <p  class="line line2">
                                <span>2</span>
                            </p>
                            <p class="tit">
                                3호선 학여울역
                            </p>
                            <p class="txt">
                            5번 출구에서 하차
                            </p>
                        </li>
                        <li>
                            <p  class="line line3">
                                <span>3</span>
                            </p>
                            <p class="tit">
                                2호선 신촌역
                            </p>
                            <p class="txt">
                            2번 출구에서 하차
                            </p>
                        </li>
                        <li>
                            <p  class="line line1">
                                <span>1</span>
                            </p>
                            <p class="tit">
                                1호선 가산디지털
                            </p>
                            <p class="txt">
                            2번 출구에서 하차
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="infoBox infoBox2">
                    <div class="titBox">
                        <p class="icon">
                            <i class="xi-bus"></i>
                        </p>
                        <p class="text">버스로 오시는 길</p>
                    </div>
                    <ul>
                        <li>
                            <dl>
                                <dt>가산디지털단지역</dt>
                                <dd>1. 간선버스(파랑색) 342</dd>
                                <dd>2. 지선버스(초록색) 3318,2523</dd>
                                <dd>3. 일반버스 : 30-3 , 30-5, 88</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>대림역</dt>
                                <dd>1. 간선버스(파랑색) 342</dd>
                                <dd>2. 지선버스(초록색) 3318,2523</dd>
                                <dd>3. 일반버스 : 30-3 , 30-5, 88</dd>
                            </dl>
                        </li>
                    </ul>
                </div> -->
            </div>
            </article>       
        </section>
    </div>


<script>

    $(document).ready(function(){ //start
	//animate_elems

    var $elems = $(".elm");
    var winheight = $(window).height();
	$elems.addClass('active');
    $(window).scroll(function () {
        animate_elems();
    });
    function animate_elems() {
        wintop = $(window).scrollTop();

        $elems.each(function () {
            $elm = $(this);
            topcoords = $elm.offset().top;

            if (wintop >= (topcoords - (winheight * 0.5))) {
                $elm.addClass('on');
               
            } 
        });
    }; // end animate_elems
});//end
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>