<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

?>
<!--
    <div id="">
    <?include "$_SERVER[DOCUMENT_ROOT]/theme/template1/sub/finder.php";?>
    </div>
-->

<style>
    .nivoSlider img {max-height: 826px;}
</style>

<!-- SLIDER  AREA -->
<div class="main-slider-area">
    <div class="container-fluid">
        <div class="row">
            <div class="em-nivo-slider-wrapper ">
                <div id="mainSlider" class="nivoSlider em-slider-image">
                    <img src="<?= G5_THEME_URL ?>/assets/images/slider_a.jpg" alt="" title="#htmlcaption1_30" />
                    <img src="<?= G5_THEME_URL ?>/assets/images/slider_b.jpg" alt="" title="#htmlcaption1_28" />
                    <img src="<?= G5_THEME_URL ?>/assets/images/slider_c.jpg" alt="" title="#htmlcaption1_29" />
                </div>


                <!-- em_slider style-1 start -->
                <div id="htmlcaption1_30" class="nivo-html-caption em-slider-content-nivo">
                    <div class="em_slider_inner container  text-center">
                        <div class="wow fadeInUpBig" data-wow-duration="1.2s" data-wow-delay="0s">
                            <h2 class="em-slider-title" style="">국내 최대 지점 현재 전국40개지점과</h2>
                            <h2 class="em-slider-title" style="">국내 최대 100여대의 캠핑카 기반 공유 서비스를 통해</h2>
                            <h2 class="em-slider-title" style="">캠핑여행문화를 만들어 가고 있습니다</h2>
                        </div>
                        <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                            <p class="em-slider-descript"><span style="">차놀자캠핑</span></p>
                        </div>
                        <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">
                            <a class="em-active-button" href="/bbs/board.php?bo_table=70">캠핑카 예약하기</a>
                            <!-- 							<a class="withput-active" href="#">vote now</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- em_slider style-1 end -->

            <!-- em_slider style-1 start -->
            <div id="htmlcaption1_28" class="nivo-html-caption em-slider-content-nivo">
                    <div class="em_slider_inner container  text-center">
                        <div class="wow fadeInUpBig" data-wow-duration="1.2s" data-wow-delay="0s">
                            <h2 class="em-slider-title" style="">국내 최대 지점 현재 전국40개지점과</h2>
                            <h2 class="em-slider-title" style="">국내 최대 100여대의 캠핑카 기반 공유 서비스를 통해</h2>
                            <h2 class="em-slider-title" style="">캠핑여행문화를 만들어 가고 있습니다</h2>
                        </div>
                        <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                            <p class="em-slider-descript"><span style="">차놀자캠핑</span></p>
                        </div>
                        <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">
                            <a class="em-active-button" href="/bbs/board.php?bo_table=53">CONTACT US</a>
                            <!-- 							<a class="withput-active" href="#">vote now</a> -->
                        </div>
                    </div>
            </div>
            <div id="htmlcaption1_29" class="nivo-html-caption em-slider-content-nivo">
                                    <div class="em_slider_inner container  text-center">
                        <div class="wow fadeInUpBig" data-wow-duration="1.2s" data-wow-delay="0s">
                            <h2 class="em-slider-title" style="">서울에서 가까운 천혜의 바다 캠핑</h2>
                            <h2 class="em-slider-title" style="">차놀자캠핑과 덕적도 호박회관의 콜라보를 통해</h2>
                            <h2 class="em-slider-title" style="">인천 덕적도로 여러분을 초대합니다</h2>
                        </div>
                        <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                            <p class="em-slider-descript"><span style="">차놀자캠핑</span></p>
                        </div>
                        <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">
                            <a class="em-active-button" href="https://smartstore.naver.com/chanolja/products/7631381176?NaPm=ct%3Dlbbq83xc%7Cci%3D31f4a3333afed9e5f90cf318de836030a33f40b3%7Ctr%3Dsls%7Csn%3D6416704%7Chk%3D37bd2624db5cd75f2db58647809c7f23208ebad3">패키지 이용하기</a>
                            <!-- 							<a class="withput-active" href="#">vote now</a> -->
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>

<div class="main_con_top_wrap">
    <div class="main_con_top_wrap_center">

        <div class="main_icon_tit_text">
            <h2>BUSINESS</h2>
            <h3>차놀자캠핑은 캠핑카 공유서비스와 캠핑여행문화를 함께 만들어가고 있습니다.</h3>
        </div>

        <div class="main_con_top_list col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="main_con_top_list_img">
                <a href="/bbs/board.php?bo_table=21">
                    <img src="/theme/template1/assets/images/bs_ico1.png" alt="캠핑카 대여">
                </a>
            </div>
            <div class="main_con_top_list_text">캠핑카 대여 서비스</div>
        </div>

        <div class="main_con_top_list col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="main_con_top_list_img"><a href="/bbs/board.php?bo_table=22"><img src="/theme/template1/assets/images/bs_ico2.png" alt="캠핑카 대여"></a></div>
            <div class="main_con_top_list_text">캠핑카 판매</div>
        </div>

        <div class="main_con_top_list col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="main_con_top_list_img"><a href="/bbs/board.php?bo_table=23"><img src="/theme/template1/assets/images/bs_ico3.png" alt="캠핑카 대여"></a></div>
            <div class="main_con_top_list_text">캠핑용품 판매 및 대여</div>
        </div>

        <div class="main_con_top_list col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="main_con_top_list_img"><a href="/bbs/board.php?bo_table=24"><img src="/theme/template1/assets/images/bs_ico4.png" alt="캠핑카 대여"></a></div>
            <div class="main_con_top_list_text">캠핑장 안내</div>
        </div>
    </div>
</div>


<!-- style center -->
<div class="about_area2">
    <div class="container">
        <div class="row">
            <h2>PARTNER JOIN &amp; INQUIRY</h2>
            <h3>즐겁고 편안한 캠핑의 처음부터 끝까지<br />새로운 비지니스를 함께 할 상생 파트너를 모집합니다.</h3>
            <p>#캠핑카 #캠핑장 #캠핑용품 #캠핑음식 #캠핑게임 #수익형 공유 렌트카 #캠핑카 수리/주차/세차/방역</p>
        </div>
		<br><br>
		<center>
		   <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-delay="0s">
				   <a class="em-active-button" href="/bbs/board.php?bo_table=53">온라인 문의하기</a>
				   <div>
				   <!--
		<ul>
<li>
           <p>

		   <a href="/bbs/write.php?bo_table=53">온라인 문의하기</a></p>
		   </li>
		   </ul>
		   -->
		   		</center>
    </div>
</div>


<div id="ourservices" class="team_area2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title_in_area team">
                    <div class="title_p">
                        <div class="title_ptx">
                            <h2>SERVICE</h2>
                            <p>차놀자캠핑만의 다양한 서비스를 통해 만족도를 높여 드립니다.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 ">
                <a href="/bbs/board.php?bo_table=41">
                    <img src="/theme/template1/assets/images/sv_1.png" alt="지점현황">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 ">
                <a href="/bbs/board.php?bo_table=42">
                    <img src="/theme/template1/assets/images/sv_2.png" alt="보유차량">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 ">
                <a href="/bbs/board.php?bo_table=43">
                    <img src="/theme/template1/assets/images/sv_3.png" alt="올인원서비스">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 ">
                <a href="/bbs/board.php?bo_table=44">
                    <img src="/theme/template1/assets/images/sv_4.png" alt="서비스정보">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- counter area end	 -->
<!-- service_area -->




<style>
    #ourservices a:hover img {
        transform: scale(1.05);
        transition: all 0.4s;
    }

    .utube_wrap {
        padding: 100px 0;
        background: #eee;
    }

    .utube_wrap .box_all {
        padding-top: 100px;
    }

    .utube_wrap h2 {
        font-size: 3em;
    }

    .utube_wrap h3 {
        font-size: 3em;
        position: relative;
    }

    .utube_wrap h3:before {
        position: absolute;
        content: '';
        left: 0;
        width: 30px;
        height: 3px;
        background: #333;
        bottom: -25px;
    }

    .utube_wrap h4 {
        font-size: 1em;
        padding-top: 50px;
    }

    .utube_wrap p {
        padding-top: 50px;
    }

    .utube_wrap p a {
        font-size: 1.1em;
        border: 1px solid #333;
        font-weight: bold;
        padding: 10px 30px;
    }

    .utube_wrap p:hover a {
        border: 1px solid #4ebcfb;
        background: #4ebcfb;
        transition: all 0.4s;
        color: #fff;
    }

    .pkg_wrap {
        background: url(/theme/template1/assets/images/pkg.png) top no-repeat;
        background-attachment: fixed;
        min-height: 400px;
    }

    .pkg_wrap h2 {
        text-align: center;
        font-size: 3em;
        color: #fff;
        padding: 20px 0;
        margin-top: 80px;
    }

    .pkg_wrap h3 {
        text-align: center;
        font-size: 1.7em;
        color: #fff;
        line-height: 1.5;
    }

    .pkg_wrap p {
        text-align: center;
        padding: 100px 0;
    }

    .pkg_wrap p a {
        color: #fff;
        border: 1px solid #fff;
        padding: 10px 50px;
    }
    .ntc_wrap{padding:100px 0; background: #eee;}
    .ntc_wrap h2{font-size:3em; text-align: center;}
    .ntc_wrap h3{font-size:1.2em;text-align: center;color:#777;}
    .ntc_wrap p {text-align: center;}
    .ntc_wrap h4{text-align: center;}
    .ntc_wrap h4 a{border:1px solid #ddd;padding:10px 40px; font-size:0.75em;}
    .ntc_wrap h4 a:nth-child(1){display: none;}
    .ntc_wrap h4:hover a{border:1px solid #4ebcfb; background: #4ebcfb; color:#fff; transition: all 0.4s;}
    .qa_wrap{padding:100px 0; background: url('/theme/template1/assets/images/qa_bg.png') top no-repeat; background-attachment: fixed; min-height: 400px;}
    .qa_wrap h2{font-size:3em; text-align: center;color:#fff;}
    .qa_wrap h3{font-size:1.2em;text-align: center;color:#fff;}
    .qa_wrap p{text-align: center; padding-top:50px;}
    .qa_wrap p a{color:#fff; border:1px solid #fff; padding:10px 30px;;}
    .qa_wrap .tel_n{color:#fff; font-size:2.5em; font-weight: bold; position: relative;}
    .qa_wrap .tel_n:before{color:#fff; font-size:2.5em; font-weight: bold; position: absolute; left:50%; top:20px; width:2px; height:30px; background: #fff; content: ''; transform: translate(-50%,0);}
    .ptn_wrap{padding:100px 0; }
    .ptn_wrap h2{font-size:3em; text-align: center; }
    .ptn_wrap h3{font-size:1.2em; text-align: center; }
    .ptn_wrap p{text-align: center; }
    .ptn_wrap p img{width:100%; }
</style>


<div class="utube_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12 l_box box_all">
                <h2>MEDIA</h2>
                <h3>차놀자캠핑<br> 미디어</h3>
                <h4>#차놀자캠핑 #캠핑카여행 #캠핑 #여행</h4>
                <!--<p><a href="">더보기</a></p>-->
            </div>
            <div class="col-md-9 col-xs-12 r_box box_all">
                <?php echo latest('theme/youtube_latest','91',1,50) ?>
            </div>
        </div>
    </div>
</div>

<div class="pkg_wrap">
    <div class="container">
        <div class="row">
            <h2>CAMPING CAR PACKAGE</h2>
            <h3>세상에서 가장 쉽고 안전한 캠핑카 여행<br />차놀자캠핑이 시작합니다.</h3>
            <p><a href="#">캠핑여행 패키지 구매하기</a></p>
        </div>
    </div>
</div>

<div class="ntc_wrap">
    <div class="container">
        <h2>NEWS</h2>
        <h3>다양한 소식을 확인해 보세요!</h3>
        <?php echo latest('theme/basic','51',3,50) ?>
        <h4><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=51" style="font-size: 17px;">더보기</a></h4>
    </div>
</div>

<div class="qa_wrap">
    <div class="container">
        <div class="row">
            <h2>CUSTOMER CENTER</h2>
            <h3>차놀자캠핑은 고객님과 함께 합니다.</h3>
            <p><a href="/bbs/write.php?bo_table=53">온라인 문의하기</a></p>
            <p class="tel_n"><?=$config['cf_4']; ?></p>
            <h3>고객센터 운영시간 : 평일 09~18시</h3>
        </div>
    </div>
</div>

<!--
<div class="ptn_wrap">
    <div class="container">
        <div class="row">
            <h2>PARTNER</h2>
            <h3>상생 파트너와 함께 새로운 문화를 만들어 갑니다.</h3>
            <p><img src="/theme/template1/assets/images/ptn.png" alt="파트너"></p>
        </div>
    </div>
</div>
-->
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>