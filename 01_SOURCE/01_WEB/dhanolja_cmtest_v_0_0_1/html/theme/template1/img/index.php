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

<div id="top_blank" style="witdh : 100%; height : 90px;">
 </div>

<div id="serch_bar" style="witdh : 100%; height : 70px;">
<a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/serch_bar.jpg" style="margin : auto;" ></a>
 </div>

<div class="slider" style=>
      <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_1.png"></div>
      <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_2.png"></div>
    </div>


<!-- 상단아이콘 PC -->
<div class="coreComWrap">
   <div class="box inner">

<!-- 아이콘 -->
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="margin-left : 5px; margin-right : 5px:" ></a>
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
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=special"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/splide2', 'special', 4, 4);        
         ?>
	    </div>	    
	</div>
</div>

<!--창업문의 -->
<div class="aboutWrap">
   <div class="box inner">
    <div class="detail">
       <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_1.jpg" style="max-width : 100%"></a>
        </div>
  </div>
</div>




<!--공지사항 -->
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 정보마당</h2>
			<a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '51', 4, 4);        
         ?>
	    </div>	    
	</div>
</div>
</div>



<!--캠핑카구매 -->
<div class="aboutWrap">
   <div class="box inner">
    <div class="detail">
       <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/business_2.jpg" style="max-width : 100%"></a>
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
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자캠핑 신규입점</h2>
			<a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/splide3', 'n_rentcar', 4, 15);      
         ?>
	    </div>	    
	</div>
</div>
</div>




<!--NEWS -->
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 PRESS</h2>
			<a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '14', 4, 4);        
         ?>
	    </div>	    
	</div>
</div>
</div>




<!--서비스센터 -->
<div class="aboutWrap">
   <div class="box inner">
    <div class="detail">
       <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/customer.png" style="max-width : 100%"></a>
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
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/장기차렌트.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캠핑카.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/화물운송.png" style="margin-left : 5px; margin-right : 5px:" ></a>
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
                    <a href="http://chanolja-union.kr/bbs/content.php?co_id=ready"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/캐피탈.png" style="margin-left : 5px; margin-right : 5px" ></a>
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
<div class="aboutWrap_mo">
	<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">미디어</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=youtube"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
   <div class="box inner">
        <div class="detail">
       <a href="http://chanolja-union.kr/bbs/board.php?bo_table=youtube"><img src="<?php echo G5_THEME_IMG_URL ?>/미디어.png" style="max-width : 100%"></a>
</div>
</div>
</div>

<!--게시판 모바일  -->
<div class="aboutWrap_mo">
	<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자정보마당</h2>
			<a href="http://chanolja-union.kr/bbs/board.php?bo_table=notice"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
     </div>
   <div class="box inner">
        <div class="detail">
       <a href="http://chanolja-union.kr/bbs/board.php?bo_table=notice"><img src="<?php echo G5_THEME_IMG_URL ?>/게시판데모.png" style="max-width : 100%"></a>
</div>
</div>
</div>


 </div>




<?php
include_once(G5_THEME_PATH.'/tail.php');
?>