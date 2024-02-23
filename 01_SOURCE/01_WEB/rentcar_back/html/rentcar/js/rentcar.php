<?php

/* www/sub/new.php */



include_once('../common.php');



// 페이지 제목

$g5['title'] = "할부형렌터카";



// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);



include_once(G5_PATH.'/head.php');

?>


<div class="blank" style="witdh : 100%; height : 90px;">
</div>


<div class="ing_bnr_Wrap">
    <div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">장기렌터카</h3>
     <div class="bnrline wow fadeInDown"></div>
    <p class="wow fadeInDown">고객을 위한 최적의 조건으로 차량을 이용할 수 있습니다</p>
    </div>

</div>


<!--

<script type="text/javascript">
// iframe resize
function autoResize(i)
{
    var iframeHeight=
    (i).contentWindow.document.body.scrollHeight;
    (i).height=iframeHeight+20;
}

</script>



<script language='JavaScript' type='text/javascript'>

      function do_resize() {
      resizeFrame("iframe_main",1);
      }

      function resizeFrame(ifr_id,re){
    //가로길이는 유동적인 경우가 드물기 때문에 주석처리!
      var ifr= document.getElementById(ifr_id) ;
      var innerBody = ifr.contentWindow.document.body;
      var innerHeight = innerBody.scrollHeight + (innerBody.offsetHeight - innerBody.clientHeight);
      //var innerWidth = document.body.scrollWidth + (document.body.offsetWidth - document.body.clientWidth);

      if (ifr.style.height != innerHeight) //주석제거시 다음 구문으로 교체 -> if (ifr.style.height != innerHeight || ifr.style.width != innerWidth)
      {
        ifr.style.height = innerHeight;
        //ifr.style.width = innerWidth;
      }

      if(!re) {
        try{
        innerBody.attachEvent('onclick',parent.do_resize);
        innerBody.attachEvent('onkeyup',parent.do_resize);
        //글작성 상황에서 클릭없이 타이핑하면서 창이 늘어나는 상황이면 윗줄 주석제거
        } catch(e) {
        innerBody.addEventListener("click", parent.do_resize, false);
        innerBody.addEventListener("keyup", parent.do_resize, false);
        //글작성 상황에서 클릭없이 타이핑하면서 창이 늘어나는 상황이면 윗줄 주석제거
        }
      }
      }
	      </script>
  -->


<script>
<script type='text/javascript'>
  $(function() {
   $('#test2').load(function() {
    $(this).css("height", $(this).contents().find("body").height() + "px");
   });
  });
 </script>
</script>


<iframe id="test2" width="100%" src ="./rentcar/index.php'?>" />



<div class="pageWrap1">
  <div class="box inner">
        <div class="main_title">

          <!-- <iframe src="<?php echo G5_URL.'/rentcar/index.php'?>" onload="autoResize(this)" scrolling="yes" frameborder="0" style="width:100%;"></iframe> -->

<!-- <iframe width="100%" height="100%" id="the_iframe" onload="calcHeight();" src="<?php echo G5_URL.'/rentcar/index.php'?>" scrolling="yes" frameborder="1" height="1"></iframe> -->
         <!--  <IFRAME id="iframe_main" name="iframe_main" src="<?php echo G5_URL.'/rentcar/index.php'?>" marginWidth=0 marginHeight=0 frameBorder=0 width="100%" height="100%" scrolling="yes" onload="resizeFrame(this.id,false);"></IFRAME> -->
        </div>
    </div>
</div>




<?php

include_once(G5_PATH.'/tail.php');

?>