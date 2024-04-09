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

   $(document).ready(function () {

       console.log(document.cookie.indexOf("pop_up1"));
       if(document.cookie.indexOf("pop_up1") === -1 || document.cookie.indexOf("pop_up2") === -1  ){ // 못 찾으면

           if(document.cookie.indexOf("pop_up1") !== -1) {
               $('.pop_up1').css('display', 'none');
           }

           if(document.cookie.indexOf("pop_up2") !== -1) {
               $('.pop_up2').css('display', 'none');
           }

           $('.pop_up_back').css('display', 'block');
           $('body').css('position', 'fixed');
       }

   });
  </script>

<!-- 추가 css 영역-->
<style>
    /* 유튜브 */
    #ourservices a:hover img {
        transform: scale(1.05);
        transition: all 0.4s;
    }

    .utube_wrap {
        padding: 10px 0;
    }

    .utube_wrap .box_all {
        padding-top: 0px;
    }

    .utube_wrap h2 {
        font-size: 3em;
        font-weight:700;
        color:#000;
    }

    .utube_wrap h3 {
        font-size: 3em;
        position: relative;
        font-weight:700;
        color:#000;
    }

    .utube_wrap h3:before {
        position: absolute;
        content: '';
        left: 0;
        width: 30px;
        height: 3px;
        background: #333;
        bottom: -25px;
    }

    .utube_wrap h4 {
        font-size: 1em;
        padding-top: 50px;
    }

    .utube_wrap p {
        padding-top: 50px;
    }

    .utube_wrap p a {
        font-size: 1.1em;
        border: 1px solid #333;
        font-weight: bold;
        padding: 10px 30px;
    }

    .utube_wrap p:hover a {
        border: 1px solid #4ebcfb;
        background: #4ebcfb;
        transition: all 0.4s;
        color: #fff;
    }

    .pkg_wrap {
        background: url(/theme/template1/assets/images/pkg.png) top no-repeat;
        background-attachment: fixed;
        min-height: 400px;
    }

    .pkg_wrap h2 {
        text-align: center;
        font-size: 3em;
        color: #fff;
        padding: 20px 0;
        margin-top: 80px;
    }

    .pkg_wrap h3 {
        text-align: center;
        font-size: 1.7em;
        color: #fff;
        line-height: 1.5;
    }

    .pkg_wrap p {
        text-align: center;
        padding: 100px 0;
    }

    .pkg_wrap p a {
        color: #fff;
        border: 1px solid #fff;
        padding: 10px 50px;
    }
    .ntc_wrap{padding:100px 0; background: #eee;}
    .ntc_wrap h2{font-size:3em; text-align: center;}
    .ntc_wrap h3{font-size:1.2em;text-align: center;color:#777;}
    .ntc_wrap p {text-align: center;}
    .ntc_wrap h4{text-align: center;}
    .ntc_wrap h4 a{border:1px solid #ddd;padding:10px 40px; font-size:0.75em;}
    .ntc_wrap h4 a:nth-child(1){display: none;}
    .ntc_wrap h4:hover a{border:1px solid #4ebcfb; background: #4ebcfb; color:#fff; transition: all 0.4s;}
    .qa_wrap{padding:100px 0; background: url('/theme/template1/assets/images/qa_bg.png') top no-repeat; background-attachment: fixed; min-height: 400px;}
    .qa_wrap h2{font-size:3em; text-align: center;color:#fff;}
    .qa_wrap h3{font-size:1.2em;text-align: center;color:#fff;}
    .qa_wrap p{text-align: center; padding-top:50px;}
    .qa_wrap p a{color:#fff; border:1px solid #fff; padding:10px 30px;;}
    .qa_wrap .tel_n{color:#fff; font-size:2.5em; font-weight: bold; position: relative;}
    .qa_wrap .tel_n:before{color:#fff; font-size:2.5em; font-weight: bold; position: absolute; left:50%; top:20px; width:2px; height:30px; background: #fff; content: ''; transform: translate(-50%,0);}
    .ptn_wrap{padding:100px 0; }
    .ptn_wrap h2{font-size:3em; text-align: center; }
    .ptn_wrap h3{font-size:1.2em; text-align: center; }
    .ptn_wrap p{text-align: center; }
    .ptn_wrap p img{width:100%; }

    .splide__slide{
        padding-top:10px !important;
        padding-bottom: 30px !important;
        text-align:center;

    }

    .splide__slide a {
        display:flex;
        justify-content:center;
    }

    .splide__slide strong{
        font-size:20px;
    }

    .splide__arrow--prev{
        left:-1.5em !important;
        height:3em !important;
        width:3em !important;
        border-radius:10px !important;
        background:#fff !important;
        box-shadow:0 10px 30px -10px rgba(0,0,0,1);
        opacity:1 !important;
    }

    .splide__arrow--next{
        right:-1.5em !important;
        height:3em !important;
        width:3em !important;
        border-radius:10px !important;
        background:#fff !important;
        box-shadow:0 10px 30px -10px rgba(0,0,0,1);
        opacity:1 !important;
    }

    .splide__arrow--prev:hover{
        border:2px solid #54C3FE;
    }

    .splide__arrow--next:hover{
        border:2px solid #54C3FE;
    }



    @media screen and (max-width:480px){
        .splide__slide strong{
            font-size:10px;
        }

        .splide__arrow--prev{
            left:1em !important;
            height:2em !important;
            width:2em !important;
            background:#ddd !important;
            border-radius:5px !important;
            top: 33% !important;
        }

        .splide__arrow--next{
            right:1em !important;
            height:2em !important;
            width:2em !important;
            background:#ddd !important;
            border-radius:5px !important;
            top: 33% !important;
        }
    }
</style>


<!-- 검색바 -->
<div class="aboutWrap" style="margin-bottom: 20px !important; margin-top: 20px;">
   <div class="box inner" style="padding : 0px;">
    <div class="detail">
              <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall" style="display:flex; position:relative;">
                <img style="border-radius:10px; box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1; width:85%;" src="<?php echo G5_THEME_IMG_URL ?>/serch_bar1.png" style="max-width : 100%">
                <span
                    style="position:absolute; font-size:19px; top:50%; left:7%; transform: translateY(-50%); font-weight:bold;"
                >캠핑여행 일정을 세워볼까요 ?</span>
                <img style="box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1; margin-left:25px;" src="<?php echo G5_THEME_IMG_URL ?>/serch_bar2.png" style="max-width : 100%">
                <span
                    style="font-size:19px; position:absolute; right:43px; color:#fff;  top: 50%; transform: translateY(-50%);  letter-spacing:1px;"
                >Search</span>
              </a>
        </div>
  </div>
</div>

<div class="aboutWrap_mo" style="margin-bottom: 20px !important; ">
   <div class="box inner" style="padding : 0px;">
    <div class="detail">
              <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall" style="display:flex; position:relative;">
                <img style="border-radius:10px; box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1; width:75%;" src="<?php echo G5_THEME_IMG_URL ?>/serch_bar1.png" style="max-width : 100%">
                <span
                    style="position:absolute; top:50%; left:7%; transform: translateY(-50%); font-weight:bold;"
                >캠핑여행 일정을 세워볼까요 ?</span>
                <div style="position: relative;">
                    <img style="box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1; width:100%;" src="<?php echo G5_THEME_IMG_URL ?>/serch_bar2.png" style="max-width : 100%">
                    <span
                        style="position:absolute; left:50%; color:#fff;  top: 50%; transform: translate(-50%, -50%);  letter-spacing:1px;"
                    >Search</span>
                </div>
              </a>
        </div>
  </div>
</div>
<!--
<div class="aboutWrap_mo">
   <div class="box inner" style="padding : 0px;">
    <div class="detail">
              <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/serch_bar_mo.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>
-->
<div class="slider" style="max-witdh : 100%;  position: relative;">
      <div><img class="slider_img1" src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_1.png" style="border-radius: 20px; "></div>
      <div><img class="slider_img2" src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_2.png" style="border-radius: 20px; "></div>
</div>

<!-- 상단아이콘 PC -->
<div class="coreComWrap">
   <div class="box inner">
        <div class="detail">
            <ul class="clearfix">
                <!--
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>

                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>


                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>

                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>

                </li>

                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                -->

                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>

                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>

                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://company.chanolja.co.kr/theme/basichome/sub/goods_info.php"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="margin-right : 60px; width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://company.chanolja.co.kr/bbs/board.php?bo_table=52"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="width:192px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>

            </ul>
        </div>
    </div>
</div>

<style>
    .bounceInUp img:hover{
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .85) !important;
        filter: blur(0) brightness(1.05);
        transition: all 150ms ease-out;
    }
    .bounceInUp img:active{
        box-shadow: 0 1px 3px -1px rgba(0, 0, 0, 1);
        box-sizing: border-box;
        filter: blur(0) brightness(.80);
        transition: all 150ms ease-out;
        transform: scale(.99);
    }
</style>

<!-- 문의하기 PC -->
<div class="coreComWrap">
   <div class="box inner">
        <div class="detail">
            <ul class="clearfix2">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja.co.kr/bbs/board.php?bo_table=rv_rental_mng">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/business__1.png" style="margin-right:40px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="#">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/business__2.png" style="margin-right:40px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>

                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://company.chanolja.co.kr/bbs/board.php?bo_table=52">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/customer__.png" style=" border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- 캠핑 추천 슬라이드 스크립트  -->
<script>
let curPos = 0;
let postion = 0;
let start_x, end_x;
const IMAGE_WIDTH = 430;
const images = document.querySelector(".images")

images.addEventListener('touchstart', touch_start);
images.addEventListener('touchend', touch_end);

function prev(){
  if(curPos > 0){
    postion += IMAGE_WIDTH;
    images.style.transform = `translateX(${postion}px)`;
    curPos = curPos - 1;
  }
}
function next(){
  if(curPos < 8){
    postion -= IMAGE_WIDTH;
    images.style.transform = `translateX(${postion}px)`;
    curPos = curPos + 1;
  }
}

function touch_start(event) {
  start_x = event.touches[0].pageX
}

function touch_end(event) {
  end_x = event.changedTouches[0].pageX;
  if(start_x > end_x){
    next();
  }else{
    prev();
  }
}
</script>



<!-- 롤링배너  -->
<div class="aboutWrap">
    <div class="box inner">
     		<div class="main_title">
               <h2 class="wow fadeInDown" data-wow-delay="0.4s">이달의 추천 캠핑여행</h2>
		      <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=tour_guide"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
            </div>
            <div class="detail">
            <?php  echo latest('theme/splide2', 'tour_guide', 4, 4);   ?>
	        </div>
	</div>
</div>

<!--신규입점 -->
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자캠핑 신규입점</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=2222"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/splide3', '2222', 4, 15);
         ?>
	    </div>
	</div>
</div>

<!--
 !--창업문의 --
<div class="aboutWrap" style="margin-bottom: 80px !important">
   <div class="box inner">
    <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_1.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>

 !--캠핑카구매 --
<div class="aboutWrap" style="margin-bottom: 80px !important">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_2.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>

 !--서비스센터 --
<div class="aboutWrap">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/customer.png" style="max-width : 100%"></a>
        </div>
  </div>
</div>
-->

<!-- 유듀브 -->

<div class="aboutWrap">
   <div class="box inner">
        <div class="utube_wrap">
            <table style="width:100%;">
                    <td width="40%">
                       <h3>차놀자캠핑<br> 미디어</h3>
                       <h4>#차놀자캠핑 #캠핑카여행 #캠핑 #여행</h4>
                     </td>
                     <td width="60%">
                       <!--  <?php echo latest('theme/youtube_latest','91',1,50) ?> -->
                        <iframe style="border-radius:20px;" width="100%" height="400px" src="https://www.youtube.com/embed/-hBJW-ZgL0I?si=fZBO3WeF02q3yMpi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                     </td>
                </tr>
             </table>
        </div>
    </div>
</div>

<!--
<div class="aboutWrap">
   <div class="box inner">
         <div class="row">
              <div class="col-md-9 col-xs-12 l_box box_all">
                     <div class="utube_wrap"><?php echo latest('theme/youtube_latest','91',1,50) ?></div>
              </div>
              <div class="col-md-3 col-xs-12 l_box box_all">#차놀자캠핑 #캠핑카여행 #캠핑 #여행</div>
         </div>
   </div>
</div> -->
<!-- 유듀브끝 -->

<!--공지사항 -->
<!--
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 정보마당</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '51', 4, 120);
         ?>
	    </div>
	</div>
</div>
-->






<!--NEWS -->
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 뉴스</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=14"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', '14', 4, 120);
         ?>
	    </div>
	</div>
</div>





















<!-- 모바일 영역 -->


<!-- 상단아이콘 모바일 -->
<div class="coreComWrap_mo">
   <div class="box inner">
        <div class="detail" style="display:flex; justify-content: center;">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s" style="margin-left:10px;">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="width:90px; margin-left : 5px; margin-right : 5px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=mall"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="width:90px; margin-left : 5px; margin-right : 5px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="width:90px;margin-left : 5px; margin-right : 5px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                    </ul>
        </div>
        <div class="detail">
            <ul class="clearfix" style="margin-bottom: 20px; margin-top:20px;" >
                <li class="wow bounceInUp" data-wow-delay="0.5s" style="margin-left:20px;">
                    <a href="http://company.chanolja.co.kr/theme/basichome/sub/goods_info.php"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="width:90px;margin-left : 5px; margin-right : 5px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
                <li style="margin-right:30%;" class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://company.chanolja.co.kr/bbs/board.php?bo_table=52"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="width:90px;margin-left : 5px; margin-right : 5px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" ></a>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- 문의하기 모바일 -->
<div class="coreComWrap_mo">
   <div class="box inner">
        <div class="detail">
            <ul class="clearfix2" >
                <li class="wow bounceInUp" data-wow-delay="0.5s" style="margin:20px;  width:88% !important;">
                    <a href="http://chanolja.co.kr/bbs/board.php?bo_table=rv_rental_mng">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/business__1.png" style="margin-right:40px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s" style="margin:20px; width:88% !important;">
                    <a href="#">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/business__2.png" style="margin-right:40px; border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>

                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s"
                    style="visibility: visible; animation-delay: 0.5s; width:88% !important; ">
                    <a href="http://gsrent.kr/bbs/board.php?bo_table=qanda">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/customer__.png" style=" border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
            </ul>
        </div>
        <!--
        <div class="detail">
            <ul class="clearfix2" style="align-items:flex-start;">
                <li class="wow bounceInUp" data-wow-delay="0.5s"
                    style="visibility: visible; width:38% !important; animation-delay: 0.5s; margin-left:20px;">
                    <a href="http://gsrent.kr/bbs/board.php?bo_table=qanda">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/customer__.png" style=" border-radius: 20px;  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .35); opacity:1;" >
                    </a>
                </li>
            </ul>
        </div>
         -->
    </div>
</div>

<!-- 모바일 캠핑여행 배너 슬라이드  -->
<script>
let curPos = 0;
let postion = 0;
let start_x, end_x;
const IMAGE_WIDTH = 60;
const images = document.querySelector(".images1") 
 
images.addEventListener('touchstart', touch_start);
images.addEventListener('touchend', touch_end);
 
function prev(){
  if(curPos > 0){
    postion += IMAGE_WIDTH;
    images.style.transform = `translateX(${postion}px)`;
    curPos = curPos - 1;
  }
}
function next(){
  if(curPos < 8){
    postion -= IMAGE_WIDTH;
    images.style.transform = `translateX(${postion}px)`;
    curPos = curPos + 1;
  }
}
 
function touch_start(event) {
  start_x = event.touches[0].pageX
}
 
function touch_end(event) {
  end_x = event.changedTouches[0].pageX;
  if(start_x > end_x){
    next();
  }else{
    prev();
  }
}
</script>

<!-- 롤링배너 모바일 -->
<div class="aboutWrap_mo">
    <div class="box inner">
     		<div class="main_title">
               <h2 class="wow fadeInDown" data-wow-delay="0.4s">이달의 추천 캠핑여행</h2>
		      <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=tour_guide"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
            </div>
            <div class="detail">
            <?php  echo latest('theme/splide22', 'tour_guide', 4, 4);   ?>
	        </div>	    
	</div>
</div>

<!--신규입점 -->
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자캠핑 신규입점</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=2222"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/splide33', '2222', 4, 15);
         ?>
	    </div>
	</div>
</div>

<!--
 !--창업문의 --
<div class="aboutWrap_mo" style="margin-bottom: 20px !important">
   <div class="box inner">
    <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_1.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>

 !--캠핑카구매 --
<div class="aboutWrap_mo" style="margin-bottom: 20px !important">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_2.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>

 !--서비스센터 --
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/customer.png" style="max-width : 100%"></a>
        </div>
  </div>
</div>
-->
<!-- 유듀브 -->
<br>
<br>
<br>
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="utube_wrap"  style="max-width : 100%" >
                       <center> <font size=5><bold> 차놀자캠핑 미디어 </bold></font></br>
                       <font size=3>#차놀자캠핑 #캠핑카여행 #캠핑 #여행</font>  </center>
                       <div style="position:relative;height:0;padding-bottom:56.25%">
                           <iframe src="https://www.youtube.com/embed/-hBJW-ZgL0I?si=fZBO3WeF02q3yMpi"
                           style="position:absolute;width:100%;height:100%;left:0; border-radius:20px;"
                           frameborder="0" allowfullscreen></iframe>
                       </div>
        </div>
    </div>
</div>



<!--공지사항 -->
<!--
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 정보마당</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '51', 4, 4);        
         ?>
	    </div>	    
	</div>
</div>
-->

<!--NEWS -->
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 뉴스</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=14"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', '14', 4, 300);        
         ?>
	    </div>	    
	</div>
</div>

 </div>


<div class="pop_up_back" style="display:none;" >
    <div class="pop_up1">
        <div style="cursor:pointer; width: auto; height:80vh; display:flex; justify-content: center;" >
            <img onclick="location.href='http://chatour.dothome.co.kr/bbs/board.php?bo_table=event&wr_id=10'" style="width:80%; border-top-left-radius: 10px; border-top-right-radius: 10px; " src="http://www.chanolja.co.kr/theme/template1/img/event_pop_up.jpg" />
        </div>
         <div  class="pop_up_spans">
              <div class="pop_up_btns">
                  <span onClick="Pop_up_no_Display_1(1)" style="cursor:pointer; font-weight:900; color:#fff;">오늘 그만 보기</span>
                  <span onClick="Pop_up_no(1)" style="color:#fff;  font-weight:bold; cursor:pointer; font-weight:900;">닫기</span>
              </div>
         </div>
    </div>


    <div class="pop_up2">
        <div style="cursor:pointer; width: auto; display:flex; justify-content: center;" >
            <img onclick="location.href='http://chatour.dothome.co.kr/bbs/board.php?bo_table=event&wr_id=11'" style="width:80%; border-top-left-radius: 10px; border-top-right-radius: 10px; " src="http://www.chanolja.co.kr/theme/template1/img/event_pop_up2.jpg" />
        </div>
        <div  class="pop_up_spans">
            <div class="pop_up_btns" >
                <span onClick="Pop_up_no_Display_1(2)" style="cursor:pointer; font-weight:900; color:#fff">오늘 그만 보기</span>
                <span onClick="Pop_up_no(2)" style="color:#fff;  font-weight:bold; cursor:pointer; font-weight:900;">닫기</span>
            </div>
        </div>
    </div>

</div>


<script>
    // 모바일 화면일 때 이미지 경로 변경
    if (window.innerWidth <= 600) {
        document.querySelector('.slider_img1').src = "<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_mo1.png";
        document.querySelector('.slider_img2').src = "<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_mo2.png";
    }
</script>

<style>
  .pop_up_back{
    z-index: 1000;
    background: rgb(0 0 0 / 50%);
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0px;
    left: 0px;
  }

  .pop_up1{
      position: relative;
      top: 50%;
      left: 35%;
      transform: translate(-50%, -80%);
      max-height: 500px;
      max-width: 500px;
      width: 80%;
      margin-left: 420px;
      background-size: 100%;
      background-position: center;
      background-repeat: no-repeat;
      align-items: center;
      display:flex;
      flex-direction: column;
      height: 50vh;
  }

  .pop_up2{
      position: absolute;
      top: 50%;
      left: 35%;
      transform: translate(-50%, -80%);
      max-height: 500px;
      max-width: 500px;
      width: 80%;
      background-size: 100%;
      background-position: center;
      background-repeat: no-repeat;
      align-items: center;
      display:flex;
      flex-direction: column;
      height: 50vh;
  }
/*
  .pop_up_x{
    color: red;
    font-size: 25px;
    position: absolute;
    right: 20px;
    top: 20px;
    padding: 10px;
    font-weight: bold;
    cursor:pointer;
  }
*/
   .pop_up_spans{
        position:relative;
        bottom:0px;
        left:0px;
        width:80%;
        max-width:500px;
        font-size:15px;
        display:flex;
        flex-direction: column;
   }

  .pop_up_btns {
    display:flex;
    justify-content: space-around;
    background:#13568D;
    padding-bottom: 10px;
    padding-top: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
  }

    @media screen and (max-width: 600px) {
         .pop_up_spans{
            font-size:14px;
        }
        .slider_img1{
             border-radius: 10px !important;
         }

         .slider_img2{
            border-radius: 10px !important;
         }

        .pop_up1 {
            transform: translate(-50%, -55%);
            left: 50%;
            margin-left: 0px;
        }

        .pop_up2 {
            left: 50%;
            top: 62%;
        }

    }

    @media screen and (max-width: 480px) {
        .pop_up_spans{
            font-size:10px;
        }

        .clearfix2{
            display:flex !important;
            flex-direction: column;
            align-items: center;
        }

        .clearfix2 li{
            width: 70% !important;
        }
    }

    @media screen and (max-width: 360px) {
             .pop_up_spans{
                font-size:8px;
            }

            .clearfix2{
                display:flex !important;
                flex-direction: column;
                align-items: center;
            }

            .clearfix2 li{
                width: 70% !important;
            }
        }

</style>
<script>


/*
  $('.pop_up_x').click(()=>{
    $('.pop_up_back').css('display', 'none');
  }) */

  function setCookie(name, value, exDay) {
    var todayDate = new Date();
    todayDate.setDate(todayDate.getDate() + exDay);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
  }

  function Pop_up_no_Display_1(num) {
      console.log(num)
      if(num === 1) {
          setCookie("pop_up1", "done", "1");
          $('.pop_up1').css('display', 'none');

          if($('.pop_up2').css('display')==='none') {
              $('.pop_up_back').css('display', 'none');
              $('body').css('position', 'relative');
          }

      }else {
          setCookie("pop_up2", "done", "1");
          $('.pop_up2').css('display', 'none');
          if($('.pop_up1').css('display')==='none') {
              $('.pop_up_back').css('display', 'none');
              $('body').css('position', 'relative');
          }
      }

  }

  function Pop_up_no(num) {
      if(num === 1) {
          $('.pop_up1').css('display', 'none');

          if($('.pop_up2').css('display')==='none') {
              $('.pop_up_back').css('display', 'none');
              $('body').css('position', 'relative');
          }

          $('.pop_up_back').css('display', 'none');
          $('body').css('position', 'relative');
      }else {
          $('.pop_up2').css('display', 'none');
          if($('.pop_up1').css('display')==='none') {
              $('.pop_up_back').css('display', 'none');
              $('body').css('position', 'relative');
          }
      }

  }
</script>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>