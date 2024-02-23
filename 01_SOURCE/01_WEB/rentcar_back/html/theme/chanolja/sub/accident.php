<?php

/* www/sub/new.php */



include_once('../common.php');



// 페이지 제목

$g5['title'] = "새로운 페이지";



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);



include_once(G5_PATH.'/head.php');

?>

<div class="ing_bnr_Wrap">
    <div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">차놀자렌트카 사고처리 VIP 서비스</h3>
     <div class="bnrline wow fadeInDown" data-wow-delay="0.1s"></div>
    <p class="wow fadeInDown" data-wow-delay="0.2s">피해를 당했을 경우 사고처리 및 법률 조언, 주유서비스, 완벽한정비, 동급이상 차량대여, 딜리버리 등<br>차놀자 VIP 사고처리 서비스를 경험해 보세요</p>
    </div>

</div>



<!-- 여기 아래부터 모든 HTML 요소 구성 끝 -->
<style>

  .pic1 { max-width:100%; height: auto;}

</style>


<div class="pageWrap1">
  <div class="box inner">
        <div class="main_title">
          <p><img src="<?php echo G5_THEME_IMG_URL ?>/accident.jpg" class="pic1" alt=""></p>

        </div>
    </div>
</div>

<!-- 여기 아래부터 모든 HTML 요소 구성 끝 
<img src="그림주소" style="max-width: 100%; height: auto;">
-->

<?php

include_once(G5_PATH.'/tail.php');

?>