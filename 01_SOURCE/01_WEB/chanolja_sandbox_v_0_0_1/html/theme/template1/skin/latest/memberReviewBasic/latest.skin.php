<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
isset($options['width'])		? $width = $options['width'] : $width = 160;
isset($options['radius'])	? $height = $options['height'] : $height = 160;
isset($options['radius'])	? $radius = $options['radius'] : $radius = 2;
?>
<!-- single service -->
<div class="testimonial_list owl-carousel curosel-style">
<?php for ($i=0; $i<count($list); $i++) :  ?>
<div class="col-md-12">					
	<div class="single_testimonial">	
	<!-- Start Single Testimonial -->
		<div class="em_single_testimonial">
			<div class="em_test_thumb">
				<?php
        			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $width, $height);
        			if($thumb['src']) {
        			    $img = '<img class="img_left" src="'.$thumb['src'].'">';
        			} 
        			
                    //echo $list[$i]['icon_reply']." ";
                    echo "<a href=\"".$list[$i]['href']."\">";
                    
                    echo $img;
                    
                    echo "</a>";
                     ?>
			</div>											
			<div class="em_testi_title">
				<h2><?= $list[$i]['wr_subject'] ?><span><?= $list[$i]['wr_name'] ?></span></h2>											
			</div>
			<div class="em_testi_content">
				<div class="em_testi_text">
					<p><?= $list[$i]['wr_content'] ?></p>		
				</div>
			</div>
		</div>										
	</div>
</div>
<?php endfor; ?>
<?php if (count($list) == 0) { //게시물이 없을 때  ?>
	<div class="col-md-12">
		게시물이 없습니다.
	</div>
<?php }  ?>
</div>
<!-- single service -->
