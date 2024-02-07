<?php
/* www/sub/new.php */
include_once('../common.php');
// 페이지 제목
$g5['title'] = "새로운 페이지";
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_CSS_URL.'/sub.css">', 0);
include_once(G5_PATH.'/head.php');
?>
<style>
iframe {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    margin-top: 0px;
}​
</style>
<div class="breatcome_area">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="breatcome_title">
				<div class="breatcome_title_inner">
					<div class="breatcome_content">
						<ul>
							<li>
								<a href="http://bestchina.barunweb.co.kr">예약하기<i class="fa fa-angle-right"></i></a>실시간 예약															</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<iframe src="./index.php"></iframe>
</iframe>
<script type="text/javascript">
//<![CDATA[
function calcHeight(){
 //find the height of the internal page

 var the_height=
 document.getElementById('the_iframe').contentWindow.
 document.body.scrollHeight;

 //change the height of the iframe
 document.getElementById('the_iframe').height=
 the_height;

 //document.getElementById('the_iframe').scrolling = "no";
 document.getElementById('the_iframe').style.overflow = "hidden";
}
//
</script>
<?php
include_once(G5_PATH.'/tail.php');
?>
