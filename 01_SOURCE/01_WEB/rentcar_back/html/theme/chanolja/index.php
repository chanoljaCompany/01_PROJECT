<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

  <script>
    new WOW().init();
  </script>

<style>
#area00 {
  position: relative; /* absolute는 부모가 relative일 때 부모를 따라간다. */
  width: 100%;
  padding-bottom: 33.85%; /* 16:9 비율 */
}

#video00 {
  position: absolute;
  width: 100%; /* 부모에 맞게 꽉 채운다. */
  height: 100%;


}
</style>


<div class="blank" style="witdh : 100%; height : 90px;">
</div>


<div class="aboutWrap">
<div id="area00" >
<!--<iframe id="video00" src="<? G5_THEME_PATH ?>/slide/slide_banner.html" name="iframe" ></iframe> -->
<iframe id="video00" src="/slider/slider.html" name="iframe" ></iframe> 
</div>



<!--
<div id="area00" >
<div id="video00" >
<div id="visualm"> 
    <script type="text/javascript" src="/js/jssor.slider.min.js"></script>
        <script>
        jssor_1_slider_init = function() {
        
        var jssor_1_SlideshowTransitions = [
         {$Duration:600,$Delay:20,$Cols:10,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Opacity:2}
        ];
        
        var jssor_1_options = {
          $AutoPlay: true,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
          }
        };
        
        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        /*function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1024);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }*/
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        //$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    };
    </script>

        <div id="jssor_1" style="position: absolute; left:50%; margin-left:-750px; width:3000px; height:720px; visibility: hidden;">
        <div data-u="slides" style="position:relative; width:3000px; height:720px; overflow: hidden;">
            <div style='display: none;'><a href="/bbs/board.php?bo_table=notice&wr_id=20"><img src='/img/mVisual06.jpg'></a></div>
            <div style='display: none;'><a href="/bbs/content.php?co_id=cp_int" target="_blank"><img src='/img/mVisual01.jpg'></a></div>
            <div style='display: none;'><a href="https://trip.coupang.com/tp/categories/396468?channel=travelHomeGateway&q=" target="_blank"><img src='/img/mVisual02.jpg'></a></div>
            <div style='display: none;'><a href="https://www.wadiz.kr/web/campaign/detail/63368" target="_blank"><img src='/img/mVisual03.jpg' ></a></div>
            <div style='display: none;'><a href="/bbs/content.php?co_id=dealcar"><img src='/img/mVisual04.jpg' ></a></div>
            <div style='display: none;'><a href="/bbs/content.php?co_id=sharing"><img src='/img/mVisual05.jpg' ></a></div>
        </div>
        <!-- Bullet Navigator --
        <div data-u="navigator" class="jssorb05" data-autocenter="1">
            <!-- bullet navigator item prototype --
            <div data-u="prototype"></div>
        </div>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
</div> 
<!--//Visual --
</div>
</div>
-->


</div>
<!--
<div class="bannerWrap">
</div>
-->

<!-- PC용화면 -->


<div class="aboutWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s">GROW TOGETHER!</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">본사의 이익은 중요하지 않습니다. 오직, 고객과 지점 그리고 본사가 함께 상생하는것이 우리의 사명입니다.</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="first wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon1.png">
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon2.png">
                </li>

                <li class="third wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon3.png">
                </li>                                 
            </ul>
        </div>
		<div class="main_title">
            <h3 class="wow fadeInDown" data-wow-delay="0.3s">전국지점을 통한<span> 맞춤형 렌트카 </span>제공</h3>
        </div>
		        <div class="detail">
            <ul class="clearfix">
                <li class="first wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon4.png">
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon5.png">
                </li>
                <li class="third wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon6.png">
                </li>                                 
            </ul>
        </div>
    </div>
</div>



<div class="coreComWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s">2021년 3월 금융소비자 보호법 개정!!</h2>
            <h4 class="wow fadeInDown" data-wow-delay="0.4s"><span>여신금융협회 교육과 시험을 이수한 등록 상담사</span>를 통한 합법적인 상담으로<br>고객 컨설팅을 통한 맞춤형 상담을 제공합니다.</p></h4>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/coreCom.png">
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="sideWrap">
   <div class="box inner">
   		<div class="main_title1">
      <h1 class="wow fadeInDown" data-wow-delay="0.3s"><b>국내 최초</b> 매장형 장기렌트 판매</h1>
	  </div>
   </div>
</div>



<div class="coreComWrap1">
   <div class="box inner">
        <div class="main_title">
		<br>
    	<br>
	    <br>
            <h5 class="wow fadeInDown" data-wow-delay="0.3s">렌터카 창업 <span>차놀자렌터카</span>와 함께 하세요.</h5>
			<br>
			<br>
			<br>
     		<br>
            <h6 class="wow fadeInDown" data-wow-delay="0.4s">이제는 자동도 공유의 시대!!<br>자동차라는 한가지 아이템으로<span> 소자본 창업</span>이 가능하며<br>자동차 <span>판매/렌터 경력의 노하우</span>를 가진<span> 차놀자렌터카</span>와 함께 성장하세요!</p></h6>
        </div>
    </div>
</div>




<!-- 모바일용 화면 -->


<div class="aboutWrap_mo">
<div id="area00" >
<!--<iframe id="video00" src="<? G5_THEME_PATH ?>/slide/slide_banner.html" name="iframe" ></iframe> -->
<iframe id="video00" src="/slider/slider.html" name="iframe" ></iframe> 
</div>

<div class="aboutWrap_mo">
   <div class="box_m inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s">GROW TOGETHER!</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">본사의 이익은 중요하지 않습니다. 오직, 고객과 지점 그리고 본사가 함께 상생하는것이 우리의 사명입니다.</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="first wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon1.png">
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon2.png">
                </li>

                <li class="third wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon3.png">
                </li>                                 
            </ul>
        </div>
		<div class="main_title">

            <h3 class="wow fadeInDown" data-wow-delay="0.3s"><center>전국지점을 통한<br><span> 맞춤형 렌트카 </span>제공</center></h3>

        </div>
		        <div class="detail">
            <ul class="clearfix">
                <li class="first wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon4.png">
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon5.png">
                </li>
                <li class="third wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon6.png">
                </li>                                 
            </ul>
        </div>
    </div>
</div>



<div class="coreComWrap_mo">
   <div class="box_m inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s">2021년 3월 금융소비자<br>보호법 개정!!</h2>
            <h4 class="wow fadeInDown" data-wow-delay="0.4s"><span>여신금융협회 교육과 시험을 이수한<br>등록 상담사</span>를 통한 합법적인<br>상담으로고객 컨설팅을 통한<br>맞춤형 상담을 제공합니다.</p></h4>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/coreCom_mo.png">
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="sideWrap_mo">
   <div class="box_m inner">
   		<div class="main_title1">
      <h1 class="wow fadeInDown" data-wow-delay="0.3s"><b>국내 최초</b> 매장형 장기렌트 판매</h1>
	  </div>
   </div>
</div>



<div class="coreComWrap1_mo">
   <div class="box_m inner">
        <div class="main_title">
		<br>
    	<br>
	    <br>
            <h5 class="wow fadeInDown" data-wow-delay="0.3s">렌터카 창업<br><span>차놀자렌터카</span>와<br> 함께 하세요.</h5>
			<br>
			<br>
			<br>
     		<br>
            <h6 class="wow fadeInDown" data-wow-delay="0.4s">이제는 자동도 공유의 시대!!<br>자동차라는 한가지 아이템으로<br><span>소자본 창업</span>이 가능하며<br>자동차 <span>판매/렌터 경력의 노하우</span>를<br>가진<span> 차놀자렌터카</span>와 함께 성장하세요!</p></h6>
        </div>
    </div>
</div>

<!--
<div class="portfolioWrap">
    <div class="inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>PORTFOLIO</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">앞서가는 트렌드와 끊임없이 발전해가는 골뱅이커뮤니케이션입니다.</p>
        </div>
        <div class="latest_wr wow bounceInUp" data-wow-delay="0.5s">
            <?php echo latest('theme/okcarousel', 'at01_gallery', 6, 0, 300,300);?>
        </div>
        <div class="latest_wr2 wow bounceInUp" data-wow-delay="0.5s">
            <?php echo latest('theme/pic_basic', 'at01_gallery', 6, 0, 300,300);?>
        </div>
        <div class="port_go">
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=at01_gallery">포트폴리오 더보기</a>
        </div>
    </div>

</div>
<div class="consertWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>CONSERTING</h2>
        </div>
        <div class="latest_wr wow bounceInUp" data-wow-delay="0.4s">
            <div class="ing_projects">
                <?php echo latest('theme/basic', 'QA', 6, 24, 1);?>
            </div>
            
            <div class="news wow bounceInUp" data-wow-delay="0.5s">
                <?php echo latest('theme/basic', 'at01_news', 6, 24, 2);?>
            </div>
        </div>
    </div>
</div>
<div class="contactWrap">
    <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>CONTACT</span>US</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">골뱅이커뮤니케이션으로 찾아오시는 길을 안내해드립니다.</p>
        </div>
        <div class="detail">
            <div id="daumRoughmapContainer1556788142621" class="root_daum_roughmap root_daum_roughmap_landing wow bounceInUp" style="width:100%;"></div>
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp": "1556788142621",
                    "key": "tcr4",
                }).render();
            </script>
        </div>
    </div>
</div>
-->
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>