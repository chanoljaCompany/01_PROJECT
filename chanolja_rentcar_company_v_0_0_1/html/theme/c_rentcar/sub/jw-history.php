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
$g5['navTitle'] = "Company";
$g5['title'] = "연혁";
$g5['sub-text']="풍푸한 경험과 세계의 연구진들과 함께 혁신적인 기술로 한국 철강사업을 이끌어가겠습니다.";
?>



    <div class="sub sub02" id="history">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <div class="sec">
            <div class="sec-inner">
                <div class="sec1">
                    <div class="sec-lt">
                        <div class="img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-his1.jpg" alt="history">
                        </div>
                    </div>
                    <div class="sec-rt">
                        <h4 class="align-h4">
                            ~PRESENT
                        </h4>
                        <ul data-aos="fade-left">
                            <li>
                                <h6>2022</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요.<br>
                                        텍스트를 입력하세요.</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요.</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h6>2021</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요. <br>
                                        텍스트를 입력하세요.</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h6>2020</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요. <br>
                                        텍스트를 입력하세요.</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요.</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sec2">
                    <div class="sec-lt">
                        <h4>
                            2010~
                        </h4>
                        <ul data-aos="fade-right">
                             <li>
                                <ul class="his-con">
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요. <br>
                                        텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>
                                </ul>
                                <h6>2021</h6>
                            </li>
                            <li>
                                <ul class="his-con">
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요. <br>
                                        텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>

                                </ul>
                                <h6>2021</h6>
                            </li>
                            <li>
                                <ul class="his-con">
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요. <br>
                                        텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>
                                    <li>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요.</p>
                                        <span>&#183</span>
                                    </li>
                                </ul>
                                <h6>2021</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="sec-rt">
                        <div class="img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-his3.jpg" alt="history">
                        </div>
                    </div>
                </div>
                <div class="sec1">
                    <div class="sec-lt">
                        <div class="img-wrap">
                            <img src="<?php echo G5_THEME_URL?>/img/sub/sub-his2.jpg" alt="history">
                        </div>
                    </div>
                    <div class="sec-rt">
                        <div class="last-dot"></div>
                        <h4>
                            SINCE 1996
                        </h4>
                        <ul data-aos="fade-left">
                            <li>
                                <h6>2022</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요 <br>
                                        텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h6>2021</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요 <br>
                                        텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h6>2020</h6>
                                <ul class="his-con">
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요. 텍스트를 입력하세요 <br>
                                        텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                    <li>
                                        <span>&#183</span>
                                        <p>텍스트를 입력하세요</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
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
        let con=$(".img-wrap");

        if(wScroll>=$('.sec1').eq(0).offset().top-$('.sec1').height()/2){
            con.eq(0).addClass('on');
            $('.sec1').eq(0).addClass('on')
        }else{
            $('.sec1').eq(0).removeClass('on')
        }
        
        if(wScroll>=$('.sec2').offset().top-$('.sec2').height()/2){
            con.eq(1).addClass('on')
            $('.sec2').addClass("on");
        }else{
            $('.sec2').removeClass('on')
        }
        
        if(wScroll>=$('.sec1').eq(1).offset().top-$('.sec1').height()/2){
            con.eq(2).addClass('on');
            $('.sec1').eq(1).addClass('on')
        }else{
            $('.sec1').eq(1).removeClass('on')
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