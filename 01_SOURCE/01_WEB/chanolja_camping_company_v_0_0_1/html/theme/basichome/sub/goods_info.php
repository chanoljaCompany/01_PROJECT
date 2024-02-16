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
$g5['title'] = "캠핑용품대여";
$g5['sub-text']="손쉬운 캠핑, 용품대여부터 시작합니다.";
?>

    <div class="sub sub02" id="business1">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit"  id="con1">
                    <h3>캠핑카여행을 위해 준비된 다양한 캠핑용품</h3>
                </div>
                <div class="sec1-contents">
                    <div class="fake"></div>
                    <div class="sec1-lt">
                        <h5>캠핑용품 대여목록</h5>
                        <ul>
                            <li>
                                <div class="line"></div>
                                <a href="#con1">캠핑용품세트</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con2">바베큐세트</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con3">불멍세트</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con4">장작</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con5">캠핑용 숯</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con6">도킹텐트</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con7">일반텐트</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sec1-rt">
                        <ul>
                            <li class="business-con">
                               
                                <div class="img-box">
                                    <dl>
                                        <dt>01</dt>
                                        <dd data-split="캠핑용품세트">캠핑용품세트</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/041.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>캠핑을 위한 가장 기본용품<br>(유료옵션)</dt>
                                    <dd>의자, 테이블, 조리도구, 스피커, 코펠, 버너, 감성랜터<br> 앵두전구, 트링크모기장, 수세미, 일회용품, 핸드폰 충전기 등</dd>
                                </dl>

                            </li>
                            <li class="business-con" id="con2">
                            
                                <div class="img-box">
                                        <dl>
                                            <dt>02</dt>
                                            <dd data-split="바베큐세트">바베큐세트</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/042.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>캠핑을 위한 야외바베큐<br>(유료옵션)</dt>
                                        <dd>바베큐화로대, 일회용석쇠, 은박지, 숯불집게<br> 토치, 목잡갑, 바베큐용 숯</dd>
                                    </dl>
                                                            
                            </li>
                            <li class="business-con" id="con3">
                            
                            <div class="img-box">
                                    <dl>
                                            <dt>03</dt>
                                            <dd data-split="불멍세트">불멍세트</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/043.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>밤늦은시간 캠핑의묘미, 불멍<br>(유료옵션)</dt>
                                        <dd>불멍용화로대, 집게, 토치, 오로라가루<br> 장작, 목장갑 </dd>
                                    </dl>

                            </li>
                            <li class="business-con" id="con4">
                                                           <div class="img-box">
                                    <dl>
                                        <dt>04</dt>
                                        <dd data-split="장작">장작</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/044.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>불멍용 추가장작<br>(유료옵션)</dt>
                                    <dd>기나긴 밤, 짧은 불멍은 아쉽습니다. 좀 더 이야기할 수<br>있는 시간을 위해 추가 장착 구입이 가능합니다.</dd>
                                </dl>
                            
                            </li>
                            <li class="business-con" id="con5">
                            
                                <div class="img-box">
                                    <dl>
                                        <dt>05</dt>
                                        <dd data-split="캠핑용 숯">캠핑용 숯</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/045.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>맛있는 바베큐를 위한 좋은 숯<br>(유료옵션)</dt>
                                    <dd>잘못된 숯은 불이 잘 안붙고 연기만 납니다.<br>차놀자캠핑은 엄선된 숯을 추천드립니다.</dd>
                                </dl>
                                </a>
                                
                            </li>
                            <li class="business-con" id="con6">
                            
                               <div class="img-box">
                                    <dl>
                                        <dt>06</dt>
                                        <dd data-split="도킹텐트">도킹텐트</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/046.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>좁은 차박공간을 위한 해결책</dt>
                                    <dd>좋은 차박공간을 마법처럼 늘려주는 토킹텐트<br>트렁크 공간을 통해 좀더 넓은공간을 선사합니다.</dd>
                                </dl>
                               </a>
                                                            </li>
                            <li class="business-con" id="con7">
                                                           <div class="img-box">
                                    <dl>
                                        <dt>07</dt>
                                        <dd data-split="일반텐트">일반텐트</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/047.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>원터치 일반텐트</dt>
                                    <dd>2개의 공간에서 캠핑이 필요하다면, 확장을 위해서<br>설치가 편리한 차놀자캠핑이 엄선한 원터치 텐트가 있습니다.</dd>
                                </dl>
                    
                            </li>
                        </ul>
                    </div>
                </div>
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