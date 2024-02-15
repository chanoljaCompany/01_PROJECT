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
$g5['title'] = "지점모집안내";
$g5['sub-text']="캠핑인구 1000만 시대, 차놀자와 함께 하실 지점사업자를 모십니다.";
?>


    <div class="sub sub02" id="business2">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit">
                    <h3>캠핑카 사업</h3>
                </div>
                <div class="sec1-contents">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-busi1.jpg" alt="img">
                    
                </div>
                <dl>
                    <dt>
                        전국 최대규모 차놀자캠핑카 함께하는 캠핑카사업
                    </dt>
                    <dd style="work-break: auto-phrase;">
                    캠핑카의 특성상 현재 대기업의 진입이 되지 않은 유일한 산업입니다.<br>
                    지역에서 몇대의 캠핑카로 온라인을 운영중인 사업과 캠핑카 대여 인프라 없이<br>
                    단순 소개를 통한 연결 플랫폼만으로 운영하는 형태가 지금까지의 경쟁사입니다.<br>
                    차놀자 캠핑은 차놀자렌트카(주)의 인프라와 전국 다양한 렌트카 업체와 제휴를<br>
                    통해 50여개 지점과 180여대의 캠핑카 대여 서비스 사업을 구축하였습니다.<br>
                    <br>
                    캠핑 시장은 이제 시장인구 700만을 지나 1000만을 돌입하고 있으며 6조 원대의 <br>
                    거대시장을 성장하고 있습니다. 점점 커지는 시장과 달리 캠핑카 대여 가능차량은<br>
                    시장 요구를 따라가지 못하고 있습니다.<br>
                    <br>
                    빠르게 성장하는 캠핑 시장에 차놀자캠핑과 함께 도전하세요<br>
                    차놀자 캠핑은 홈쇼핑 판매, 대기업, 각종 폐쇄몰 및 유통업체에 마케팅과 영업을 진행중에 있으며<br>
                    다년간의 렌트카 사업의 노하우를 바탕으로 하는 경영정책으로<br>
                    함께 성장할 수 있는 발판이 되어 드릴것 입니다.<br>
                    
                    
                    </dd>
                </dl>
            </div>
            <div class="sec3-inner">
                <ul>
                    <li data-aos="fade-up">
                        <h4>지점사업자 개소</h4>
                        <dl>
                            <dt>렌트카 지점개소를 통한 사업</dt>
                            <dd>
                                <span>&bull;</span> 차놀자렌트카(주)의 지점으로 2~3대의 캠핑카로 렌트카 사업을<br> 시작할 수 있습니다
                            </dd>
                            <dd>
                                <span>&bull;</span> 일부는 구매로, 일부는 위탁운영 차량으로 최소한의 금액으로<br> 사업을 시작할 수 있습니다
                            </dd>
                            <dd>
                                <span>&bull;</span> 차놀자캠핑의 시스템 인프라를 바탕으로 함께 시작합니다.
                            </dd>
                        </dl>
                        <div class="list-img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-img1.jpg" alt="img">
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <h4>개인위탁운영</h4>
                        <dl>
                            <dt>개인유휴캠핑카의 렌트카 위탁사업</dt>
                            <dd>
                                <span>&bull;</span> 3년 미만 개인캠핑카를 지점에 위탁하여 수익사업이 가능합니다
                            </dd>
                            <dd>
                                <span>&bull;</span> 렌트카로 명의 변경 후 평소에는 캠핑카 대여로<br> 수익을 얻고 내가 필요할 때는 개인캠핑카로 사용합니다.
                            </dd>
                            <dd>
                                <span>&bull;</span> 렌트카로 변경에 따라, 매년 보험료, 주차비, 관리비 등<br> 해결로 편리한 운영관리가 가능 해집니다.
                            </dd>
                        </dl>
                        <div class="list-img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-img2.jpg" alt="img">
                        </div>
                    </li>
                </ul>
            </div>

            <!--
            <div class="sec2-inner">
                <div class="link-inner">
                    <div class="link-tit">
                        <h4>최고의 기술력과 경쟁력으로<br> 세계 최고의<br class="mo-br"> 철강기업을 향해<br> 달려가는 OOOOO</h4>
                    </div>
                    <ul class="link-rt">
                        <p>Check Our Other Business.</p>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">조선산업</a>
                        </li>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">철강산업</a>
                        </li>
                        <li>
                           <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">에너지산업</a>
                        </li>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">건설산업</a>
                        </li>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">산업기계</a>
                        </li>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">환경사업</a>
                        </li>
                        <li>
                            <a href="<?php echo G5_THEME_URL?>/sub/jw-business1.php">가스산업</a>
                        </li>
                    </ul>
                </div>
            </div>
-->


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


    $(window).scroll(function(){
        let wScroll=$(window).scrollTop();

        if(wScroll>=$('.sec1').offset().top-$('.sec1').height()/2){
            $('.sec1-contents').addClass('on')
        }else{
            $('.sec1-contents').removeClass('on')
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