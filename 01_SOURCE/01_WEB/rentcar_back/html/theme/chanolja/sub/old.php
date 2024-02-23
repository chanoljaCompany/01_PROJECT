<?php

/* www/sub/new.php */



include_once('../common.php');



// 페이지 제목

$g5['title'] = "차놀자렌터카 | 중고렌터카";



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);



include_once(G5_PATH.'/head.php');

?>

<div class="ing_bnr_Wrap">
    <div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">중고렌터카</h3>
     <div class="bnrline wow fadeInDown"></div>
    <p class="wow fadeInDown">중고차 렌터카 시스템</p>
    </div>

</div>



<!-- 여기 아래부터 모든 HTML 요소 구성 끝 -->
<style>

  .pic1 { max-width:100%; height: auto;}

</style>


<div class="pageWrap1">
<br>
<br>
<br>
<br>
<br>
<h2> 페이지 준비 중입니다. </h2>
<br>
<br>
<br>
<br>
</div>

<!-- 여기 아래부터 모든 HTML 요소 구성 끝 
<img src="그림주소" style="max-width: 100%; height: auto;">
-->

<?php

include_once(G5_PATH.'/tail.php');

?>