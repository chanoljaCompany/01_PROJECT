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
$g5['navTitle'] = "Business";
$g5['title'] = "사업안내";
$g5['sub-text']="풍푸한 경험과 세계의 연구진들과 함께 혁신적인 기술로 한국 철강사업을 이끌어가겠습니다.";
?>

    <div class="sub sub02" id="business1">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit"  id="con1">
                    <h3>혁신적인 기술, 철강산업의 선두주자</h3>
                </div>
                <div class="sec1-contents">
                    <div class="fake"></div>
                    <div class="sec1-lt">
                        <h5>OUR BUSINESS</h5>
                        <ul>
                            <li>
                                <div class="line"></div>
                                <a href="#con1">SHIPBUILDING</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con2">STEEL</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con3">ENERGY</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con4">CONSTRUCTION</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con5">INDUSTRY</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con6">ENVIRONMENT</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con7">GAS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sec1-rt">
                        <ul>
                            <li class="business-con">
                               <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                <div class="img-box">
                                    <dl>
                                        <dt>01</dt>
                                        <dd data-split="SHIPBUILDING">SHIPBUILDING</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-조선.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>세계 유수의 조선사업</dt>
                                    <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                </dl>
                               </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con2">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                <div class="img-box">
                                        <dl>
                                            <dt>02</dt>
                                            <dd data-split="STEEL">STEEL</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub-철.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>세계 유수의 조선사업</dt>
                                        <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                    </dl>
                               </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con3">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    <div class="img-box">
                                    <dl>
                                            <dt>03</dt>
                                            <dd data-split="ENERGY">ENERGY</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub-에너지.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>세계 유수의 조선사업</dt>
                                        <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                    </dl>
                                </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con4">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                               <div class="img-box">
                                    <dl>
                                        <dt>04</dt>
                                        <dd data-split="CONSTRUCTION">CONSTRUCTION</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-건설.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>세계 유수의 조선사업</dt>
                                    <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                </dl>
                               </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con5">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                <div class="img-box">
                                    <dl>
                                        <dt>05</dt>
                                        <dd data-split="INDUSTRY">INDUSTRY</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-산업.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>세계 유수의 조선사업</dt>
                                    <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                </dl>
                                </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con6">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                               <div class="img-box">
                                    <dl>
                                        <dt>06</dt>
                                        <dd data-split="ENVIRONMENT">ENVIRONMENT</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-환경.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>세계 유수의 조선사업</dt>
                                    <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                </dl>
                               </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
                            </li>
                            <li class="business-con" id="con7">
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                               <div class="img-box">
                                    <dl>
                                        <dt>07</dt>
                                        <dd data-split="GAS INDUSTRY">GAS INDUSTRY</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-가스.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>세계 유수의 조선사업</dt>
                                    <dd>세계 최고의 기술력, 초 일류 기술 경영으로<br> 조선사업을 선도하며 발전하는 OOOOO.</dd>
                                </dl>
                               </a>
                                <a class="mo-a" href="<?php echo G5_THEME_URL?>/sub/jw-business2.php">
                                    MORE VIEW <i class="xi-angle-right-min"></i>
                                </a>
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