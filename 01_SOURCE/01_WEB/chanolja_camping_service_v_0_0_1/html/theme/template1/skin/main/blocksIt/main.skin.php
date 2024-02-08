<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>
<script type="text/javascript" src="<?= G5_THEME_URL ?>/assets/js/masonry.pkgd.js"></script>
<style>
ul{list-style:none;list-style:none;font-family:"Malgun Gothic", "Georgia", "Arial", "Sans-serif"}
.masonry{width:100%;padding:0px;font-size:0px;display:inline-block;}
.masonry .item{
	display:block;border:1px solid #ffffff;min-height:50px;box-sizing:border-box;
	background:#1fa98d;font-size:30px;color:#ffffff;text-align:center;
}
.masonry .w1{width:100px;}
.masonry .w2{width:200px;}
.masonry .w3{width:300px;}
.masonry .w4{width:400px;}
.masonry .w5{width:500px;}
.masonry .w6{width:600px;}

.masonry .h100{height:100px;}
.masonry .h200{height:200px;}
.masonry .h300{height:300px;}
.masonry .h400{height:400px;}
.masonry .h500{height:500px;}
.masonry .h600{height:600px;}
.masonry img{width:100%;height:100%;}

</style>
<script>
$(function(){
	$masonry = $(".masonry").masonry({
		itemSelector	: ".item",
		columnWidth	: 100
	});
});
</script>

<!-- style center -->
<div class="about_area2" style="padding:0px;">		
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <ul class="masonry">
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                	<li class="item w<?=rand(1,6)?> h<?=rand(1,6)?>00"><img src="<?= G5_THEME_URL ?>/assets/images/16.jpg" /></li>
                </ul>
			</div>
		</div>
	</div>
</div>
