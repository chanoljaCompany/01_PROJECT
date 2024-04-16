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

<div id="top_blank" style="witdh : 100%; height : 90px;  position: relative;">
</div>

<!-- 검색바 -->
<div class="section_margin">
    <div class="aboutWrap">
       <div class="box inner" style="padding : 0px;">
        <div class="detail">
                  <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/serch_bar.jpg" style="max-width : 100%"></a>
            </div>
      </div>
    </div>

    <div class="aboutWrap_mo">
       <div class="box inner" style="padding : 0px;">
        <div class="detail">
                  <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/serch_bar_mo.jpg" style="max-width : 100%"></a>
            </div>
      </div>
    </div>

    <div class="slider" style="max-witdh : 100%;  position: relative;">
          <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_1.png"></div>
          <div><img src="<?php echo G5_THEME_IMG_URL ?>/top_banner/top_banner_2.png"></div>
    </div>

    <!-- 상단아이콘 PC -->
    <div class="coreComWrap">
       <div class="box inner">
            <div class="detail">
                <ul class="clearfix">
                    <li class="wow bounceInUp" data-wow-delay="0.5s">
                        <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.5s">
                        <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.5s">
                        <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.5s">
                        <a href="http://camping.dothome.co.kr/theme/basichome/sub/goods_info.php"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.5s">
                        <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                    </li>
                </ul>
            </div>
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






<div class="section_margin">
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
</div>




<div class="section_margin">
    <!--창업문의 -->
    <div class="aboutWrap">
       <div class="box inner" style="padding: 0px; padding-top: 200px;">
        <div class="detail">
           <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner2.jpeg" style="max-width : 100%"></a>
            </div>
      </div>
    </div>
    <!--캠핑카구매 -->
    <div class="aboutWrap">
       <div class="box inner" style="padding: 0px;">
            <div class="detail">
           <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner3.jpeg" style="max-width : 100%"></a>
            </div>
      </div>
    </div>
    <!--서비스센터 -->
    <div class="aboutWrap">
       <div class="box inner" style="padding: 0px; padding-bottom: 200px;">
            <div class="detail">
           <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner1.jpeg" style="max-width : 100%"></a>
            </div>
      </div>
    </div>
</div>



<div class="section_margin">
<!-- 유듀브 -->
<div class="aboutWrap">
   <div class="box inner">
        <div class="utube_wrap">
            <table>
                    <td width="40%">               
                       <h2>MEDIA</h2>
                       <h3>차놀자캠핑<br> 미디어</h3>
                       <h4>#차놀자캠핑 #캠핑카여행 #캠핑 #여행</h4>
                     </td>               
                     <td width="60%">               
                        <?php echo latest('theme/youtube_latest','91',1,50) ?>
                     </td>               
                </tr>
             </table>
        </div>
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
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 정보마당</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '51', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>






<!--NEWS -->
<div class="aboutWrap">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 PRESS</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=14"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', '14', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>


















<!-- 모바일 영역 -->


<!-- 상단아이콘 모바일 -->
<div class="coreComWrap_mo">
   <div class="box inner">
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/pack.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=70"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/campervan.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=24"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/place.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
                    </ul>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/goods.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>                
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=43"><img src="<?php echo G5_THEME_IMG_URL ?>/icon/meal.png" style="margin-left : 5px; margin-right : 5px:" ></a>
                </li>
            </ul>
        </div>

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


<!-- 유듀브 -->
<br>
<br>
<br>
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="utube_wrap"  style="max-width : 100%" >
                       <center> <font size=5><bold> 차놀자캠핑 미디어 </bold></font></br>
                       <font size=3>#차놀자캠핑 #캠핑카여행 #캠핑 #여행</font>  </center>
                       <iframe width="100%" height="280px" src="https://www.youtube.com/embed/3zUGRMQQ4P0?si=_-a4o3aUVp-2hfW-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                                                    </div>
    </div>
</div>

<!--창업문의 -->
<div class="aboutWrap_mo">
   <div class="box inner">
    <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner2.jpeg" style="max-width : 100%"></a>
        </div>
  </div>
</div>
<!--캠핑카구매 -->
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner3.jpeg" style="max-width : 100%"></a>
        </div>
  </div>
</div>
<!--서비스센터 -->
<div class="aboutWrap_mo">
   <div class="box inner">
        <div class="detail">
       <a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=53"><img src="<?php echo G5_THEME_IMG_URL ?>/banner1.jpeg" style="max-width : 100%"></a>
        </div>
  </div>
</div>


<!--공지사항 -->
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 정보마당</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
       <?php
        echo latest('theme/basic_news', '51', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>
<!--NEWS -->
<div class="aboutWrap_mo">
   <div class="box inner">
		<div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.4s">차놀자 PRESS</h2>
			<a href="http://www.chanolja.co.kr/bbs/board.php?bo_table=51"><h5 class="wow fadeInDown" data-wow-delay="0.4s">전체보기</h5></a>
        </div>
        <div class="detail">
        <?php echo latest('theme/basic_news', '14', 4, 100);        
         ?>
	    </div>	    
	</div>
</div>






 </div>

<div class="pop_up_back">
    <div class="pop_up">
        <div class="pop_up_x">✕</div>
        <div class="hide_pop_7_days"><input type="checkbox">7일 동안 이 팝업 보지 않기</div>
    </div>
</div>
<style>
.pop_up_back{
    z-index: 1000;
    background: rgb(0 0 0 / 0%);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
}

.pop_up{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-image: url(http://www.chanolja.co.kr/theme/template1/img/당첨자.jpeg);
    width: 350px;
    height: 490px;
    background-position: center;
    background-repeat: no-repeat;
}

.pop_up_x{
    color: red;
    font-size: 25px;
    position: absolute;
    right: 10px;
    top: 20px;
    padding: 10px;
    font-weight: bold;
}

.hide_pop_7_days{
    position: absolute;
    left: 50%;
    bottom: 30px;
    color: #000;
    width: 220px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    font-size: 16px;
    transform: translateX(-50%);
}

.hide_pop_7_days input{
    width: 22px;
    height: 22px;
}
</style>
<script>


// 팝업 닫기 버튼 클릭 시
$('.pop_up_x').click(() => {
    // 만약 체크박스가 체크되어 있다면
    if ($('.hide_pop_7_days input').is(':checked')) {
        // 현재 시간을 milliseconds 단위로 가져오기
        let now = new Date().getTime();
        // 7일 후의 시간을 milliseconds 단위로 계산
        let sevenDaysLater = now + (7 * 24 * 60 * 60 * 1000);

        // 로컬 스토리지에 sevenDaysLater 값을 'hidePopupUntil' 키로 저장
        localStorage.setItem('hidePopupUntil', sevenDaysLater);
    }

    // 팝업을 숨김
    $('.pop_up_back').css('display', 'none');
});

// 페이지 로드 시
$(document).ready(() => {
    // 로컬 스토리지에서 'hidePopupUntil' 값을 가져오기
    let hidePopupUntil = localStorage.getItem('hidePopupUntil');
    // 현재 시간을 milliseconds 단위로 가져오기
    let now = new Date().getTime();

    // 만약 'hidePopupUntil' 값이 존재하고, 현재 시간이 해당 값보다 작거나 같다면
    if (hidePopupUntil && now <= hidePopupUntil) {
        // 팝업을 숨김
        $('.pop_up_back').css('display', 'none');
    }
});


</script>
<style>
    .section_margin{
        margin-top: 200px;
        margin-bottom: 200px;
    }
</style>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>