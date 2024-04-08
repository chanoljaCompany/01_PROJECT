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
    }

    .utube_wrap h3 {
        font-size: 3em;
        position: relative;
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
</style>



<div id="top_blank" style="witdh : 100%; height : 90px;">
 </div>

<div class="slider" style=>
      <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner1.jpg"></div>

      <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner2.jpg"></div>
    </div>
</div>

<style>
    .bx-wrapper img {
        border-radius: 30px !important;
    }

    @media screen and (max-width:600px) {
        .bx-wrapper img {
            border-radius: 10px !important;
        }
    }
</style>


<!-- 상단아이콘 PC -->
<div class="coreComWrap">
   <div class="box inner">

<!-- 1번 줄 -->
        <div class="main_title">
            <p class="wow fadeInDown" data-wow-delay="0.4s">자동차 대여 서비스</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://gsrent.kr/"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/렌트카.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캠핑카.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캐피탈.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://carplay.kr/"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/장기차렌트.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/관광버스.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>

<!-- 2번 줄 -->
        <div class="main_title">
            <p class="wow fadeInDown" data-wow-delay="0.4s">자동차 종합 서비스</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/공업사.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/정비소.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/자동차검사.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/세차서비스.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/견인서비스.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
            </ul>
        </div>

<!-- 3번 줄 -->
<div class="main_title">
            <p class="wow fadeInDown" data-wow-delay="0.4s">자동차 용품 및 악세서리</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/차량용품.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                   <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"> <img src="<?php echo G5_THEME_IMG_URL ?>/icon/블랙박스.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/타이어.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/차박용품.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/썬팅.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
            </ul>
        </div>


<!-- 4번 줄 -->
		<div class="main_title">
            <p class="wow fadeInDown" data-wow-delay="0.4s">자동차 영업인</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/신차판매.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/중고차판매.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/자동차보험.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/렌터카사고팔기.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/화물운송.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>

<!-- 5번 줄 -->
		<div class="main_title">
            <p class="wow fadeInDown" data-wow-delay="0.4s">협동조합 아카데미</p>
        </div>
        <div class="detail">
            <ul class="clearfix" style="

                display: flex;
                justify-content: flex-start;
                margin-left: 30px;

            ">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja-union.kr/bbs/board.php?bo_table=admission"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/admi.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
            </ul>
        </div>

    </div>
</div>





<!-- 특가이벤트 슬라이드 스크립트  -->
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
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">특가이벤트</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=special"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/splide2', 'special', 4, 4);        
         ?>
	    </div>	    
	</div>
</div>



<!--추천 -->

<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">이달의 추천업체</h2>
            <a href="http://chanolja-union.kr/bbs/board.php?bo_table=recom"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
   <?php
    echo latest('theme/pic_basic', 'recom', 6, 30);        
    ?>
	    </div>	    
		</div>
	    </div>




<!--신규입점 -->

<style>

h1 {
  font-size: 35px;
  text-align: center;
  padding: 4% 0px;
  letter-spacing: 1px;
}



.main input[type=radio] {
	display: none;
}
#tab-1:checked ~ .tab label:nth-child(1),
#tab-2:checked ~ .tab label:nth-child(2),
#tab-3:checked ~ .tab label:nth-child(3),
#tab-4:checked ~ .tab label:nth-child(4) {
    height : 66px ;
	border-bottom : 3px #36688f solid;
    /*margin-bottom : 10px; */
/*  box-shadow: none; */
}
.content > div {
	display: none;
}
#tab-1:checked ~ .content div:nth-child(1),
#tab-2:checked ~ .content div:nth-child(2),
#tab-3:checked ~ .content div:nth-child(3),
#tab-4:checked ~ .content div:nth-child(4)  {
	display: block;
}
.main {
  margin: 0 auto;
  main-width:1380px;
  max-width: 100%;
}
.tab {
  overflow: hidden;
}
.tab label {
    font-size: 18px;
    cursor: pointer;
    float: left;
/*    width: 25%;
    text-align: center;  */
    padding: 15px 0;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
    user-select: none;
    -webkit-user-select: none;
}
.content {
/* background-color: rgba(0, 0, 0, 0.2);
  min-height: 250px; */
}
.content > div{
   padding: 0px;
   line-height: 1.5;
   font-size: 17px;
}
</style>


<div class="aboutWrap">
   <div class="box inner">
   		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">신규 입점 사업체</h2>
        </div>

        <div class="detail">
           <div class="main">
            <input type="radio" id="tab-1" name="show" checked/>
            <input type="radio" id="tab-2" name="show" />
            <input type="radio" id="tab-3" name="show" />
           <input type="radio" id="tab-4" name="show" />
               <div class="tab">
                <label for="tab-1"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_렌트카.png" style="margin-left : 5px; margin-right : 5px" ></label>
                <label for="tab-2"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_캠핑카.png" style="margin-left : 5px; margin-right : 5px" ></label>
                <label for="tab-3"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_공업사.png" style="margin-left : 5px; margin-right : 5px" ></label>
                <label for="tab-4"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_차량용품.png" style="margin-left : 5px; margin-right : 5px" ></label>
                </div>
                <div class="content">
                      <div class="content-dis">
                   	  <?php echo latest('theme/splide3', 'n_rentcar', 4, 15); ?>
                     </div>
                     <div class="content-dis">
                     <?php echo latest('theme/splide4', 'n_campervan', 4, 15); ?>
                      </div>
                      <div class="content-dis">
                      <?php echo latest('theme/splide5', 'n_repair', 4, 15); ?>
                       </div>
                       <div class="content-dis">
                  	  <?php echo latest('theme/splide6', 'n_acc', 4, 15); ?>
                      </div>
                 <div>
         </div>

        </div>
</div>
</div>

<br>
<br>
<br>
<br>



<!-- 미디어 -->
<div class="aboutWrap">
<div class="box inner">
        <div class="utube_wrap">
            <table style=" width : 100%; " >
                    <td width="50%">               
                       <h2>MEDIA</h2><br><br><br>
                       <h3>차놀자협동조합<br><br><br> 미디어</h3>
                       <h4>#자동차토탈플랫폼 #수익형렌트카 #자동차서비스 #장기렌트</h4>
                     </td>               
                     <td width="50%">    
                         <iframe width="100%" height="400px" src="https://www.youtube.com/embed/FvNXS0VlsOc" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                                                               
                        <!-- <?php echo latest('theme/youtube_latest','youtube',1,50) ?> -->
                     </td>               
                </tr>
             </table>
        </div>
    </div>
</div>




<!--게시판 -->
<div class="aboutWrap">
    <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자정보마당</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=notice"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', 'notice', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>


 </div>


 </div>






















<!-- 모바일 영역 -->




<!-- 상단아이콘 모바일 -->
<div class="coreComWrap_mo">
   <div class="box inner">

<!-- 1번 줄 -->
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://gsrent.kr/"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/렌트카.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://carplay.kr/"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/장기차렌트.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캐피탈.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캠핑카.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>

<!-- 2번 줄 -->
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/관광버스.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/공업사.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/정비소.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/자동차검사.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>

            </ul>
        </div>

<!-- 3번 줄 -->
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/세차서비스.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/견인서비스.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
				<li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/차량용품.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                   <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"> <img src="<?php echo G5_THEME_IMG_URL ?>/icon/블랙박스.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>


<!-- 4번 줄 -->
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/타이어.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/차박용품.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/썬팅.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/신차판매.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>

            </ul>
        </div>

<!-- 5번 줄 -->
   <div class="detail">
            <ul class="clearfix">
                 <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/중고차판매.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/자동차보험.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/렌터카사고팔기.png" style="margin-left : 5px; margin-right : 5px" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/화물운송.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>
<!-- 6번 줄 -->
   <div class="detail">
            <ul class="clearfix">
                 <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja-union.kr/bbs/board.php?bo_table=admission"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/admi.png" style="margin-left : 5px; margin-right : 5px" ></a>
					</li>
            </ul>
        </div>


    </div>
</div>

<!-- 특가이벤트 슬라이드 스크립트  -->
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
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">특가이벤트</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=special"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
   <?php
    echo latest('theme/splide22', 'special', 4, 4);        
    ?>
	    </div>	    
		</div>
	    </div>




<!--추천 모바일 -->

<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">이달의 추천업체</h2>
            <a href="http://chanolja-union.kr/bbs/board.php?bo_table=recom"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
   <?php
    echo latest('theme/pic_basic1', 'recom', 6, 30);        
    ?>
	    </div>	    
		</div>
	    </div>



<!--신규입점 모바일 

<style>
.main_mo input[type=radio] {
	display: none;
}
#tab-1:checked ~ .tab label:nth-child(1),
#tab-2:checked ~ .tab label:nth-child(2),
#tab-3:checked ~ .tab label:nth-child(3),
#tab-4:checked ~ .tab label:nth-child(4) {
    /*margin-bottom : 10px; */
/*  box-shadow: none; */
}
.content_mo > div {
	display: none;
}
#tab-1:checked ~ .content div:nth-child(1),
#tab-2:checked ~ .content div:nth-child(2),
#tab-3:checked ~ .content div:nth-child(3),
#tab-4:checked ~ .content div:nth-child(4)  {
	display: block;
}
.main_mo {
  margin: 0 auto;
  main-width:1380px;
  max-width: 100%;
}
.tab_mo {
  overflow: hidden;
}
.tab_mo label {
    font-size: 18px;
    cursor: pointer;
    float: left;
/*    width: 25%;
    text-align: center;  */
    padding: 15px 0;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
    user-select: none;
    -webkit-user-select: none;
}
.content_mo {
/* background-color: rgba(0, 0, 0, 0.2);
  min-height: 250px; */
}
.content_mo > div{
   padding: 0px;
   line-height: 1.5;
   font-size: 17px;
}
</style>

<div class="aboutWrap_mo">
   <div class="box inner">
   		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">신규 입점 사업체</h2>
        </div>

        <div class="detail">
           <div class="main_mo">
            <input type="radio" id="tab-1" name="show" checked/>
            <input type="radio" id="tab-2" name="show" />
            <input type="radio" id="tab-3" name="show" />
           <input type="radio" id="tab_-4" name="show" />
               <div class="tab_mo">
                <label for="tab-1"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_렌트카_mo.png" style="margin-left : 2px; margin-right : 2px" ></label>
                <label for="tab-2"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_캠핑카_mo.png" style="margin-left : 2px; margin-right : 2px" ></label>
                <label for="tab-3"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_공업사_mo.png" style="margin-left : 2px; margin-right : 2px" ></label>
                <label for="tab-4"><img src="<?php echo G5_THEME_IMG_URL ?>/btn/btn_차량용품_mo.png" style="margin-left : 2px; margin-right : 2px" ></label>
              </div>
              <div class="content_mo">
                      <div class="content_mo-dis">
                   	  <?php echo latest('theme/splide33', 'n_rentcar', 4, 15); ?>
                     </div>
                     <div class="content_mo-dis">
                     <?php echo latest('theme/splide44', 'n_campervan', 4, 15); ?>
                      </div>
                      <div class="content_mo-dis">
                      <?php echo latest('theme/splide55', 'n_repair', 4, 15); ?>
                       </div>
                       <div class="content_mo-dis">
                  	  <?php echo latest('theme/splide66', 'n_acc', 4, 15); ?>
                      </div>
               <div>
         </div>

        </div>
</div>
</div>
</div>

-->

<div class="aboutWrap_mo">
	<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">신규 입점 사업체</h2>
        </div>
   <div class="box inner">
        <div class="detail">
       <a href="http://chanolja-union.kr/bbs/board.php?bo_table=n_campervan&wr_id=2"><img src="<?php echo G5_THEME_IMG_URL ?>/new_mo.png" style="max-width : 100%" style="margin : 0 auto;"></a>
</div>
</div>
</div>



<!--신규입점 모바일  끝-->





<!-- 미디어 모바일 -->
<br>
<br>
<br>
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="utube_wrap"  style="max-width : 100%" >
                       <center> <font size=5><bold> 차놀자협동조합 미디어 </bold></font></br>
                       <font size=3>##자동차토탈플랫폼 #수익형렌트카 #자동차서비스 #장기렌트</font>  </center>
                       <iframe width="100%" height="280px" src="https://www.youtube.com/embed/FvNXS0VlsOc" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                                                    
       </div>
    </div>
</div>

<!--게시판 모바일  -->
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자정보마당</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=notice"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', 'notice', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>


 </div>




<?php
include_once(G5_THEME_PATH.'/tail.php');
?>