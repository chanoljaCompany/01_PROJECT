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
$g5['title'] = "캠핑카 안내";
$g5['sub-text']="친환경 차박부터 모터홈까지, 모든 캠핑카 대여 서비스 제공";
?>

    <div class="sub sub02" id="business1">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit"  id="con1">
                    <h3>여행목적과 인원에 맞는 다양한 캠핑카</h3>
                </div>
                <div class="sec1-contents">
                    <div class="fake"></div>
                    <div class="sec1-lt">
                        <h5>CAMPERVANS</h5>
                        <ul>
                            <li>
                                <div class="line"></div>
                                <a href="#con1">레이 차박캠핑카</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con2">전기차 차박캠핑카(일반)</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con3">전기차 차박캠핑카(대형)</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con4">스타렉스 차박캠핑카</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con5">렉스턴칸 모터홈캠핑카</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con6">스타렉스 모터홈캠핑카</a>
                            </li>
                            <li>
                                <div class="line"></div>
                                <a href="#con7">포터/봉고기반 모터홈캠핑카</a>
                            </li>
                            
                        </ul>                      
                        
                    </div>
                    <div class="sec1-rt">
                        <ul>
                            <li class="business-con">
                               
                                <div class="img-box">
                                    <dl>
                                        <dt>01</dt>
                                        <dd data-split="레이 차박캠핑카">레이 차박캠핑카</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/031.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>20대 초반~30대 중반 인기</dt>
                                    <dd>레이기반 2인승 차박캠핑카입니다.(2종보통)<br> 연인 또는 친구와 함께 가볍게 캠핑카 여행을 떠나볼 수 있습니다.</dd>
                                </dl>

                            </li>
                            <li class="business-con" id="con2">
                            
                                <div class="img-box">
                                        <dl>
                                            <dt>02</dt>
                                            <dd data-split="전기차 차박캠핑카">전기차 차박캠핑카</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/032.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>20대 초~30대 후반 인기</dt>
                                        <dd>2~4인승 가능한 전기차 기반의 캠핑카입니다.(2종보통)<br> 친환경 캠핑카로 자유로운 여행이 가능합니다.</dd>
                                    </dl>
                                                            
                            </li>
                            <li class="business-con" id="con3">
                            
                            <div class="img-box">
                                    <dl>
                                            <dt>03</dt>
                                            <dd data-split="전기차 차박캠핑카">전기차 차박캠핑카</dd>
                                        </dl>
                                        <img src="<?php echo G5_THEME_URL?>/img/sub/033.jpg" alt="sub">
                                    </div>
                                    <dl class="busi-info">
                                        <dt>15인승 기반의 대형 차박</dt>
                                        <dd>2~4인을 위한 전기차 기반 차박 캠핑카입니다.(1종보통)<br> 대용량의 전기차 배터리로 편리한 캠핑여행을 만들어 드립니다. </dd>
                                    </dl>

                            </li>
                            <li class="business-con" id="con4">
                                                           <div class="img-box">
                                    <dl>
                                        <dt>04</dt>
                                        <dd data-split="스타렉스 차박캠핑카">스타렉스 차박캠핑카</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/034.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>3~4인 가족여행용 모터홈</dt>
                                    <dd>스타렉스를 바탕으로 제조된 차박캠핑카입니다.(2종보통)<br> 가족단위 단란한 캠핑여행을 위한 차박 캠핑카 입니다.</dd>
                                </dl>
                            
                            </li>
                            <li class="business-con" id="con5">
                            
                                <div class="img-box">
                                    <dl>
                                        <dt>05</dt>
                                        <dd data-split="렉스턴칸 모터홈캠핑카">렉스턴칸 모터홈캠핑카</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/035.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>3~5인을 위한 모터홈</dt>
                                    <dd>장거리 가족여행을 위한 모터홈 캠핑카입니다.<br> 편안한 승차감과 넉넉한 공간을 가진 모터홈 캠핑카입니다.</dd>
                                </dl>
                                </a>
                                
                            </li>
                            <li class="business-con" id="con6">
                            
                               <div class="img-box">
                                    <dl>
                                        <dt>06</dt>
                                        <dd data-split="스타렉스 모터홈캠핑카">스타렉스 모터홈캠핑카</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/036.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>30대~50대 가족형 </dt>
                                    <dd>스타렉스를 기반의 가족여행용 모터홈 캠핑카입니다.<br> 넉넉한 공간을 바탕으로 행복한 캠핑카 여행을 만들어드립니다.</dd>
                                </dl>
                               </a>
                                                            </li>
                            <li class="business-con" id="con7">
                                                           <div class="img-box">
                                    <dl>
                                        <dt>07</dt>
                                        <dd data-split="포터/봉고기반 모터홈캠핑카">포터/봉고기반 모터홈캠핑카</dd>
                                    </dl>
                                    <img src="<?php echo G5_THEME_URL?>/img/sub/037.jpg" alt="sub">
                                </div>
                                <dl class="busi-info">
                                    <dt>3~5인의 다목적 모터홈</dt>
                                    <dd>가족여행, 파티룸, 신혼여행 등 다목적 캠핑카입니다.<br> 캠핑을 위한 모든 공간과 기능이 넉넉히 갖춰지 다양한 용도에 맞는 모터홈캠핑카입니다.</dd>
                                </dl>
                    
                            </li>
                        </ul>
                        <BR>
                        <BR>
                        <BR>
                        <font size="10px">
                        <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=purc"><STRONG class="pure_str">▶▶▶ 캠핑카 구매 문의</STRONG></H3></a>


                        </font>
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