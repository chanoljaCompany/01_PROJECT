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
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/jw-sub.css">')


?>


<?php
$g5['navTitle'] = "사업영역";
$g5['title'] = "기업형캠핑카플랜";
$g5['sub-text']="우수기업을 위한 임직원 복지형 서비스";
?>

    <div class="sub sub02" id="business1">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit"  id="con1">
                    <h3>임직원 복지를 위한 캠핑카 대여 운영 서비스</h3>
                </div>
                <br>
                <br>
                <br>
                <h3>페이지 준비중입니다.</h3>

                <!--
                <div class="sec1-contents">
                    <div class="fake"></div>
                    <div class="sec1-lt">
                        <h5>차놀자 ALL In ONE Service</h5>
                        <ul>
                            <li>
                                <div class="line"></div>
                                <a href="#con1">캠핑카/렌트카 대여</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con2">캠핑카 구매</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con3">캠핑장 예약</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con4">캠핑용품 대여 및 구매</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con5">캠핑용 밀키트 구매</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con6">캠핑정보</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sec1-rt">
                        <ul>
                            <li class="business-con">
                               
                                <div class="img-box">
                                    <dl>
                                        <dt>01</dt>
                                        <dd data-split="캠핑카/렌트카 대여">캠핑카/렌트카 대여</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/051.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>여행을 위한 수단, 캠핑카/렌트카 대여</dt>
                                    <dd>전국100여개지점 1200여대의 차놀자 렌트카를 통해<br>합리적인 가격으로 캠핑카/렌트카를 대여할 수 있습니다.</dd>
                                </dl>

                            </li>
                            <li class="business-con" id="con2">
                            
                                <div class="img-box">
                                        <dl>
                                            <dt>02</dt>
                                            <dd data-split="캠핑카 구매">캠핑카 구매</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/052.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>어려운 캠핑카 구매, 손쉽개 해결합니다</dt>
                                        <dd>차놀자캠핑과 제휴를 통한 제조사와 다양한 구매플랜<br>으로 부담없이 캠핑카를 구매할 수 있습니다.</dd>
                                    </dl>
                                                            
                            </li>
                            <li class="business-con" id="con3">
                            
                            <div class="img-box">
                                    <dl>
                                            <dt>03</dt>
                                            <dd data-split="캠핑장 예약">캠핑장 예약</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/053.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>어려운 오토캠핑장예약 차놀자가 함께합니다</dt>
                                        <dd>캠핑카가 들어갈 수 있는 어려운 캠핑장 찾기<br>차놀자캠핑의 인프라로 해결해 드립니다.</dd>
                                    </dl>

                            </li>
                            <li class="business-con" id="con4">
                                                           <div class="img-box">
                                    <dl>
                                        <dt>04</dt>
                                        <dd data-split="캠핑용품 대여 및 판매">캠핑용품 대여 및 판매</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/054.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>천차만별 가격대의 캠핑용품 고민</dt>
                                    <dd>가격대별 합리적인 캠핑용품 구성으로<br>캠핑용품 구매와 대여를 도와 드립니다.</dd>
                                </dl>
                            
                            </li>
                            <li class="business-con" id="con5">
                            
                                <div class="img-box">
                                    <dl>
                                        <dt>05</dt>
                                        <dd data-split="캠핑용 밀키트 구매">캠핑용 밀키트 구매</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/055.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>음식만 하다 끝나는 캠핑? 편리한 밀키트가 있습니다</dt>
                                    <dd>캠핑에 특화된 메뉴를 바탕으로<br>편리한 캠핑음식조리를 도와 드립니다.</dd>
                                </dl>
                                </a>
                                
                            </li>
                            <li class="business-con" id="con6">
                            
                               <div class="img-box">
                                    <dl>
                                        <dt>06</dt>
                                        <dd data-split="캠핑정보">캠핑정보</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/056.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>캠핑 어디를 가지??</dt>
                                    <dd>초보자도 쉽게 캠핑여행을 즐길 수 있는<br>다양한 캠핑지역 정보를 제공합니다.</dd>
                                </dl>
                               </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
-->
            </div>
        </div>
    </div>

<script>
        AOS.init({
          // disable on internet explorer
            disable:  function msieversion() {
                return !!(window.navigator.userAgent.indexOf("MSIE ") > 0 || navigator.userAgent.match(
                    /Trident.*rv\:11\./))
            }

        })

    var lastScrollTop=0;
    var delta=5;
    var navbarHeight=$('.inner').outerHeight();
    var didScroll;

    $(window).scroll(function(event){
        didScroll=true;
    });
    setInterval(function(){
        if(didScroll){
          hasScrolled();
          didScroll=false;
        }
    },250);
    function hasScrolled(){
        var st=$(this).scrollTop();
        if(Math.abs(lastScrollTop -st)<=delta)
        return;
        if(st>lastScrollTop && st>navbarHeight){
          $('#header').removeClass('nav-down').addClass('nav-up');
        }else{
          if(st+$(window).height()<$(document).height()){
            $('#header').removeClass('nav-up').addClass('nav-down');
          }
        }
        lastScrollTop=st;
    };

    $.fn.Scrolling = function(obj, tar) {
		var _this = this;
		$(window).scroll(function(e) {
			var end = obj + tar;
			$(window).scrollTop() >= obj ? _this.addClass("fixed") : _this.removeClass("fixed");
			if($(window).scrollTop() >= end) _this.removeClass("fixed");
		});
	};
    $(".sec1-lt").Scrolling($(".sec1").offset().top,($('html').height() - $("#footer").height()));

    $(window).scroll(function(){
        let wScroll=$(window).scrollTop();
        let con=$(".sec1-lt ul li");

        if(wScroll>=$('.business-con').eq(6).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(6).addClass('on')
        }else if(wScroll>=$('.business-con').eq(5).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(5).addClass('on')
        }else if(wScroll>=$('.business-con').eq(4).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(4).addClass('on')
        }else if(wScroll>=$('.business-con').eq(3).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(3).addClass('on')
        }else if(wScroll>=$('.business-con').eq(2).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(2).addClass('on')
        }else if(wScroll>=$('.business-con').eq(1).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(1).addClass('on')
        }else if(wScroll>=$('.business-con').eq(0).offset().top-$('.business-con').height()/2){
            con.removeClass('on')
            con.eq(0).addClass('on')
        }
    });

    $(document).ready(function($) {
        $(".sec1-lt ul li a").click(function(event){         
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
        });
});

</script>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>