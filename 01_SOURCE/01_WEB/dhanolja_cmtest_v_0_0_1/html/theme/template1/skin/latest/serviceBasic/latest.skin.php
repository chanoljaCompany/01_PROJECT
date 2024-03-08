<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
isset($options['width'])		? $width = $options['width'] : $width = 300;
isset($options['radius'])	? $height = $options['height'] : $height = 280;
isset($options['radius'])	? $radius = $options['radius'] : $radius = 2;
?>
<!-- single service -->
<?php for ($i=0; $i<count($list); $i++) :  ?>
<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="em-service">
		<div class="em_service_content">
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
	</div>
</div>
<?php endfor; ?>
<?php if (count($list) == 0) { //게시물이 없을 때  ?>
<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="em-service">
		<div class="em_service_content">    
			게시물이 없습니다.
		</div>
	</div>
</div>
<?php }  ?>
<!-- single service -->