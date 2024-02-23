<?php

/* www/sub/new.php */



include_once('../common.php');



// 페이지 제목

$g5['title'] = "중고차렌터카";



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);



include_once(G5_PATH.'/head.php');

?>


<div class="blank" style="witdh : 100%; height : 90px;">
</div>

<div class="ing_bnr_Wrap">
    <div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">중고차렌터카</h3>
     <div class="bnrline wow fadeInDown"></div>
    <p class="wow fadeInDown">고객을 위한 최적의 조건으로 차량을 이용할 수 있습니다</p>
    </div>

</div>





<div class="pageWrap1">
  <div class="box inner">
       <div class="main_title">
		<iframe id="board" width="100%" scrolling="no" src="<?php echo G5_URL.'/carshop/index.php'?>" frameborder="0"></iframe>


<script>
 function resize_frame(id) {

 var frm = document.getElementById("board");

 function resize() {

 var ms_ie = false;

  var ua = window.navigator.userAgent;

  var old_ie = ua.indexOf('MSIE ');

  var new_ie = ua.indexOf('Trident/');

 

  if ((old_ie > -1) || (new_ie > -1)) {

   ms_ie = true;

  }

 

  if ( ms_ie ) {

   //IE specific code goes here

  var iframeHeight=frm.contentWindow.document.body.scrollHeight;

  frm.height=iframeHeight+20;

  }else{

  frm.style.height = "auto"; // set default height for Opera

  contentHeight = frm.contentWindow.document.documentElement.scrollHeight;

  frm.style.height = contentHeight + 23 + "px"; // 23px for IE7

  }

 }

 if (frm.addEventListener) {

 frm.addEventListener('load', resize, false);

 } else {

 frm.attachEvent('onload', resize);

 }

}

resize_frame('board'); 

</script>

        </div>
    </div>
</div>

<!-- 여기 아래부터 모든 HTML 요소 구성 끝 
<img src="그림주소" style="max-width: 100%; height: auto;">
-->

<?php

include_once(G5_PATH.'/tail.php');

?>