<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$bo_array = explode("|",$bo_table);

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
include_once($latest_skin_path."/expend_gallery_muliti.php");

for($i=0; $i<count($bo_array); $i++){
	if($i==0){
		$union = "(SELECT `wr_id`, `wr_subject`, `wr_datetime`, '{$bo_array[$i]}' as 'bo_table' FROM `g5_write_{$bo_array[$i]}`)";
	}else{
		$union .= "UNION ALL (SELECT `wr_id`, `wr_subject`, `wr_datetime`, '{$bo_array[$i]}' as 'bo_table' FROM `g5_write_{$bo_array[$i]}`)";
	}
}
$union .=" order by `wr_datetime` DESC LIMIT 0,{$rows};";


$aa = sql_query2_multi($union);


$i=0;
while($aabb = sql_fetch_array($aa)){
	$list[$i]['wr_id'] = $aabb['wr_id'];
	$list[$i]['subject'] = $aabb['wr_subject'];
	$list[$i]['subject'] = mb_substr($list[$i]['subject'],0,$subject_len,"utf-8");
	$list[$i]['wr_subject'] = $aabb['wr_subject'];
	$list[$i]['bo_table'] = $aabb['bo_table'];
	$i++;
}


$slideSort="F".mt_rand(111111,999999).mt_rand(10,99)."A"; //고유 클래스(각 슬라이더마다 사용)
$imgcount =  count($list); //총 이미지 갯수 선언
$imgwidth=array(); // 이미지 개별 사이즈 처리($list for문 안에서 사용해야함. 위 주석처럼 사용해야함)
$img['width'] = 200; //이미지 고정 가로 사이즈
$img['height'] = 145; //이미지 고정 세로 사이즈
$topSize=$imgcount*($img['width']+22); //이미지 갯수 * 이미지 가로 사이즈 => 탑#top의 길이 비교에 사용함
$topSize=(int)$topSize; //위 변수를 정수형으로 강제 변환해버림
$imgW = $img['width']+22;
$sliderType = "2";
$titleOn = false; //true => 타이틀 보이기, false => 타이틀 보이지 않기
$speed = "20"; //슬라이드 속도

if($titleOn){
	$heights=$img['height']+33;
	$heights2 = $img['height']+20;
}else{
	$heights=$img['height']+20;
	$heights2 = $img['height']+10;
}
?>
<script src="<?=$latest_skin_url?>/marquee.js?<?php echo mt_rand(0,999999); ?>"></script>
<style>   

#<?php echo $slideSort; ?>_top{
	width:99.6%;
	overflow:hidden; 
	margin-top:10px;
	position:relative;
    padding:0 0 30px;

}

.<?php echo $slideSort; ?> { min-height:<?php echo $heights; ?>px;  position:Relative;  margin-left:-<?php echo $topSize; ?>px;}
.<?php echo $slideSort; ?> ul{text-align:center; position:absolute; width:<?=$topSize*2?>px;padding:5px 0px; margin:0px;height:<?php echo $heights2; ?>px;overflow:hidden;}
.<?php echo $slideSort; ?> li{float:left;list-style:none;text-align:center;width:<?=$img['width']+10?>px;max-height:<?php echo $img['height']+10; ?>px;overflow:hidden;border:1px solid #ccc;margin:0 5px;padding:5px 0;}
.<?php echo $slideSort; ?> li img {}
.moveBtn {position:absolute; z-index:9999999; cursor:pointer; font-size:20px; line-height:21px;font-weight:bold;width:25px;text-align:center;height:25px;cursor:pointer;top:40%;background:#666;opacity:0.8;color:#fff;font-weight:bolder;border-radius:5px;}
</style>

<span class="<?php echo $slideSort; ?>_dire" style="display:none;">좌</span>


<div id="<?php echo $slideSort; ?>_top">
<div class="moveBtn" style="left:5px;" onclick="<?php echo $slideSort; ?>_left();">
	&lt;
</div>
<div class="moveBtn" style="right:5px;" onclick="<?php echo $slideSort; ?>_right();">
	&gt;
</div>
<?php
	//print_r2($bo_href);
?>
<div class="banner_wraper <?php echo $slideSort; ?>"  onmouseover="<?php echo $slideSort; ?>_stop();" onmouseleave="<?php echo $slideSort; ?>_start();">
	<ul style="">
		<?php
		if($imgcount!="0"){
			for ($i=0; $i<count($list); $i++) {
				$bo_table = $bo_href[$i];
			 ?>
			<li><? gallery_size_full_muliti($list[$i]['wr_id'], $list[$i]['bo_table'], $img['width'], $img['height']); ?><? if($titleOn){?><div><?=$list[$i]['subject'];?></div><?php } ?></li>
			<?php } ?>
		<? }else{ ?>
		<li>
			게시물이 없습니다.
		</li>
		<? } ?>
	</ul>
</div>
</div>
<script>
	<?php
		if($sliderType == "1"){
			include $latest_skin_path."/version/type1.js";	
		}else{
			include $latest_skin_path."/version/type2.js";	
		}		
	?>
</script>