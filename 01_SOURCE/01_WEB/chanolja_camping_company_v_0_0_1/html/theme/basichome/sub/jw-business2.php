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
$g5['title'] = "사업영역";
$g5['sub-text']="풍푸한 경험과 세계의 연구진들과 함께 혁신적인 기술로 한국 철강사업을 이끌어가겠습니다.";
?>


    <div class="sub sub02" id="business2">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec1">
            <div class="sec1-inner">
                <div class="sec1-tit">
                    <h3>조선산업</h3>
                </div>
                <div class="sec1-contents">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/sub-busi1.jpg" alt="img">
                    <h4>SHIPBUILDING</h4>
                </div>
                <dl>
                    <dt>
                        세계 유수의 조선용 철강산업
                    </dt>
                    <dd>
                    후판은 일반적으로 두께가 6mm이상의 두꺼운 강판을 말하며, 선박건조에 가장 많이 사용되고 있습니다.<br> 재질에 따라 조선용, 일반구조용, 용접구조용, 등 다양한 분야에서 사양됩니다.
                    Tanker, Bulk Carrier, LPG, LNG 운반선 등 특수선, 해양구조물에<br> 많이 사용되고 선박의
                    다양화에 따라 품질의 고급화와 다양화가 요구되고 있는 추세입니다.
                    </dd>
                </dl>
            </div>
            <div class="sec3-inner">
                <ul>
                    <li data-aos="fade-up">
                        <h4>STEEL PLATES</h4>
                        <dl>
                            <dt>THICK PLATE 사업용도</dt>
                            <dd>
                                <span>&bull;</span> 후판, 선박산업게 가장 많이 이용되는 판재류. 교량,보일러 및<br> 압력용기 등 산업시설에도 이용
                            </dd>
                            <dd>
                                <span>&bull;</span> 열연강판, 강판의 중간재로서 냉연강판을 만들기 위한 재료
                            </dd>
                            <dd>
                                <span>&bull;</span> 특수강, 구조용 특수강, 공구강, 부식에 강한 스테인리스강 등
                            </dd>
                        </dl>
                        <div class="list-img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-img1.jpg" alt="img">
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <h4>KOSA</h4>
                        <dl>
                            <dt>세계 철강 수요</dt>
                            <dd>
                                <span>&bull;</span> 지난해의 기저효과 영향으로 수요 증가율은 제한적
                            </dd>
                            <dd>
                                <span>&bull;</span> 올해 글로벌 철강 수요는 지난해보다 2.2% 늘어난<br> 18억9640만t 에 달할 것으로 예상
                            </dd>
                            <dd>
                                <span>&bull;</span> 지속적인 인플레이션과 중국의 성장 둔화는 철강<br> 수요 회복에 있어서 제약 요인
                            </dd>
                        </dl>
                        <div class="list-img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-img2.jpg" alt="img">
                        </div>
                    </li>
                </ul>
            </div>

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