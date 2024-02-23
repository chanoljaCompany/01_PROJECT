<?php

/* www/sub/new.php */



include_once('../common.php');



// 페이지 제목

$g5['title'] = "회사소개";



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);



include_once(G5_PATH.'/head.php');

?>

<div class="blank" style="witdh : 100%; height : 90px;">
</div>

<div class="ing_bnr_Wrap">
    <div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">인 사 말</h3>
     <div class="bnrline wow fadeInDown" data-wow-delay="0.1s"></div>
    <p class="wow fadeInDown" data-wow-delay="0.2s">최선의 다하는 차놀자렌트카 입니다</p>
    </div>

</div>



<!-- 여기 아래부터 모든 HTML 요소 구성 끝 -->
<style>

  .pic1 { max-width:100%; height: auto;}

</style>


<div class="pageWrap1">
  <div class="box inner">
        <div class="main_title">
          <img src="<?php echo G5_THEME_IMG_URL ?>/company.jpg" class="pic1" alt="">
          <img src="<?php echo G5_THEME_IMG_URL ?>/company2.jpg" class="pic1" alt="">

        </div>
    </div>
</div>

<!-- 여기 아래부터 모든 HTML 요소 구성 끝 
<img src="그림주소" style="max-width: 100%; height: auto;">
-->

<?php

include_once(G5_PATH.'/tail.php');

?>