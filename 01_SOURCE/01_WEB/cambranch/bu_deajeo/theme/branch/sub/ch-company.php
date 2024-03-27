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
$g5['navTitle'] = "차놀자캠핑";
$g5['title'] = "기업소개";
$g5['sub-text']="안녕하세요. 차놀자캠핑 부산대저지점입니다.";
?>



    <div class="sub sub02" id="company">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <!-- <div class="sec1-tit">
                    <dl>
                        <dt>
                        
                        혁신적인 기술로<br>
                        철강산업의 선두주자로<br>
                        세계를 향해 도약하겠습니다.
                        </dt>
                        <dd>
                        제작이 완성된 후에도 꾸준한 소통으로 항상 만족할 수 있도록 노력하겠습니다.
                        기능은 동일하지만 다양한 효과를 주어 시각적으로 다른 것처럼 보여질 수
                        있습니다. 고객에게 홍보와 상품구매로 이어지는 최적화된 절차, 컨슈머의
                        이목을 끌기 위한 개능 개발 등 가치있는 홈페이지로써의 최적화된 '기술'을
                        개발하기 위해 노력합니다.
                        </dd>
                    </dl>
                </div> -->
                <div class="sec1-contents">
                    <div class="img-wrap">
                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub-com.jpg" alt="img">
                        

                    </div>
                </div>
            </div>

            <!--
            <div class="sec2-inner">
                <div class="sec2-tp">
                    <h4>VARIOUS<br>
                        STEEL<br>
                        INDUSTRIES
                    </h4>
                    <div class="sec2-list-wrap">
                        <dl class="sec2-list">
                            <dt>Steel Plates<br>
                                Industry
                            </dt>
                            <dd>SHIPBUILDING</dd>
                            <dd>AUTOMOBILE</dd>
                            <dd>PRESSURE VESSEL</dd>
                            <dd>MECHANICAL</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                        </dl>
                        <dl class="sec2-list">
                            <dt>Environment<br> Industry</dt>
                            <dd>ECO-FRIENDLY</dd>
                            <dd>STEEL PROTECTION</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                        </dl>
                        <dl class="sec2-list">
                            <dt>Future Energy<br> Industry</dt>
                            <dd>OCEAN WIND</dd>
                            <dd>NATURE CONSTRUCTION</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                            <dd>FACE-MAKER LIST 01</dd>
                        </dl>
                    </div>
                </div>

            </div>
-->
            <div class="sec3-inner">
                <div class="sec3-lt">
                    <h3>차놀자캠핑 VISION</h3>
                    <ul>
                        <li class="on" data-img="<?php echo G5_THEME_URL?>/img/sub/011.jpg">
                            <dl>
                                <dt>수도권 관광 메카 <span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>수도권에가 가장 가까운 바다와 천혜의 자연을 갖춘.<br>
                                    영종도에 위치한 부산대저 지점입니다.
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/012.jpg">
                            <dl>
                                 <dt>가장 가까운 캠핑카여행<span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>아름다운 바다와 산, 그리고 자연이 숨쉬는 영종도<br>
                                    그곳이 바로 고객님의 가장 가까운 곳에 있습니다.
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/013.jpg">
                            <dl>
                                 <dt>캠핑 ALL in ONE <span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>캠핑카, 캠핑용품, 캠핑장, 캠핑음식등 다양한 서비스를<br>
                                    기반으로 편리한 캠핑여행을 만들어 드립니다. 
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/014.jpg">
                            <dl>
                                 <dt>캠핑카 종합솔루션 <span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>기업을 위한 캠핑카 상품, 일반 캠핑카 대여, 캠핑카 판매 등<br>
                                    캠핑카와 관련된 모든 종합 서비스를 제공합니다.
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/015.jpg">
                            <dl>
                                 <dt>차놀자캠핑의 목표<span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>대한민국 누구나 어디서나 캠핑카를 가지고 여행을 할 수 있는<br>
                                    시대를 만들기 위해 노력하고 있습니다.
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <div class="sec3-img">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/011.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>

<script>
        AOS.init({
            duration: 1200,
          // disable on internet explorer
            disable:  function msieversion() {
                return !!(window.navigator.userAgent.indexOf("MSIE ") > 0 || navigator.userAgent.match(
                    /Trident.*rv\:11\./));
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

    $(document).ready(function(){
        $('#company .sec3-lt ul li').click(function(){
            $('#company .sec3-lt ul li').removeClass("on");
            $('#company .sec3-lt ul li').removeClass("active");
            $('#company .sec3-lt ul li dd').stop().slideUp();
            $(this).addClass('active')
            $(this).find('dd').slideDown();
        });
        $('#company .sec3-lt ul li').click(function(){
            let imgSrc=$(this).attr('data-img');
            $('.sec3-img img').attr('src',imgSrc);
        });
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