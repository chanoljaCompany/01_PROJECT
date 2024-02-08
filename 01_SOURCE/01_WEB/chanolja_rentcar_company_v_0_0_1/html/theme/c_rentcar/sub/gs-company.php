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
$g5['navTitle'] = "회사소개";
$g5['title'] = "회사소개";
$g5['sub-text']="차놀자는 자동차 서비스 사업의 새로운 비전을 열어갑니다";
?>

    <script type="text/javascript">/*<![CDATA[*/
        document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>


    <div class="sub sub02" id="company">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-contents">
                    <div class="img-wrap">
                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub-com.jpg" alt="img">
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="sec2-inner">
                <div class="sec2-tp">
                    <h4>AUTOMOBILE<br>
                        TOTAL SERVICE<br>
                        PLATFORM
                    </h4>
                    <div class="sec2-list-wrap">
                        <dl class="sec2-list">
                            <dt>RENTAL<br>
                                SERVICE
                            </dt>
                            <dd>RENTCAR</dd>
                            <dd>CAMPER VAN</dd>
                            <dd>CAR SALES</dd>
                            <dd>USED CAR SALES</dd>
                            
                        </dl>
                        <dl class="sec2-list">
                            <dt>AUTPOMOBILE<br> SERVICE</dt>
                            <dd>REPAIR SHOP</dd>
                            <dd>WASH SERVICE&SHOP</dd>
                            <dd>CAR ACCESSORY SHOP</dd>
                            <dd>WINDOWS TINTING</dd>
                            <dd>CAR INSPECTION</dd>
                            
                        </dl>
                        <dl class="sec2-list">
                            <dt>AUTO BUSINESS<br>FOUNDRY</dt>
                            <dd>AUTO FINANCE SERVICE</dd>
                            <dd>AUTO INSURANCE SERVICE</dd>
                            <dd>SYSTEM DEVELOPEMENT</dd>
                            <dd>CAR SERVICE SOFTWARE</dd>
                            
                            
                            
                        </dl>
                    </div>
                </div>

            </div>

            <div class="sec3-inner">
                <div class="sec3-lt">
                    <h3>파생법인 및 인증현황</h3>
                    <ul>
                        <li class="on" data-img="<?php echo G5_THEME_URL?>/img/sub/02.jpg">
                            <dl>
                                <dt>파생법인 <span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>다양한 사업영업 확장을 위한 파생법인 <br>지에스렌트카 주식회사 <br>(주)지에스렌트카 <br>차놀자렌트카 주식회사 <br>차놀자캠핑:엠제이이노베이션(주) <br>(주)한솔네트웍스 <br>(주)캠버 <br>(주)모아렌트카 <br>(주)디지파츠렌트 <br>차놀자캐피탈
                                    
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/08.jpg">
                            <dl>
                                 <dt>특허현황<span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>비즈니스 모델 특허 현황 <br>특허 제10-2216764호 <br>특허 제 10-2269891호 
                                </dd>
                            </dl>
                        </li>
                        <li data-img="<?php echo G5_THEME_URL?>/img/sub/05.jpg">
                            <dl>
                                 <dt>상표등록<span><i class="xi-angle-down-min"></i></span></dt>
                                <dd>차놀자 상표 등록 현황 <br>상표 제40-1578493호 <br>상표 제40-1578494호 <br>상표 제40-1578495호 <br>상표 제40-1578496호 
                                </dd>
                            </dl>
                        </li>
    
                    </ul>
                </div>
                <div class="sec3-img">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/02.png" alt="img">
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