<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_THEME_PATH."/common/board.header.php");
?>
<!-- <h2 id='container_title'><?php echo $board['bo_subject'] ?><span class='sound_only'> 목록</span></h2> -->

</div>

<?php if($board['bo_table'] == '70' || '72') { ?>
<div class="container">

<?php } else { ?>
<div class="container">		
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 sidebar-right content-widget pdsl">
				<?php include_once(G5_THEME_PATH."/common/board.left.menu.php"); ?>
			</div>			
			<div class="col-md-9  col-sm-6 col-xs-12">
				<div class="row">	
					<h2 id='container_title'><i class="fab fa-envira"></i> <?php echo $board['bo_subject'] ?><span class='sound_only'> 목록</span></h2>
					<div class="col-md-12 col-sm-12">			
						<div class="astute-single-blog-content">
							<div class="single-blog-content">
<?php } ?>

<?php

if ($board['bo_table'] == '11')
include_once(G5_THEME_PATH."/sub/11.php");
                        
if ($board['bo_table'] == '12')
include_once(G5_THEME_PATH."/sub/12.php");

if ($board['bo_table'] == '21')
include_once(G5_THEME_PATH."/sub/21.php");

if ($board['bo_table'] == '22')
include_once(G5_THEME_PATH."/sub/22.php");

if ($board['bo_table'] == '23')
include_once(G5_THEME_PATH."/sub/23.php");

if ($board['bo_table'] == '24')
include_once(G5_THEME_PATH."/sub/ready.php");

if ($board['bo_table'] == '31')
include_once(G5_THEME_PATH."/sub/31.php");
                     
if ($board['bo_table'] == '41')
include_once(G5_THEME_PATH."/sub/41.php");
                        
if ($board['bo_table'] == '42')
include_once(G5_THEME_PATH."/sub/42.php");

if ($board['bo_table'] == '43')
include_once(G5_THEME_PATH."/sub/43.php");
                        
if ($board['bo_table'] == '44')
include_once(G5_THEME_PATH."/sub/ready.php");
                        
if ($board['bo_table'] == '52')
include_once(G5_THEME_PATH."/sub/ready.php");

if ($board['bo_table'] == '54')
include_once(G5_THEME_PATH."/sub/54.php");
                        
if ($board['bo_table'] == '61')
include_once(G5_THEME_PATH."/sub/ready.php");

if ($board['bo_table'] == '62')
include_once(G5_THEME_PATH."/sub/ready.php");

if ($board['bo_table'] == '70')
include_once(G5_THEME_PATH."/sub/reserve_camp.php");

if ($board['bo_table'] == 'mall')
include_once(G5_THEME_PATH."/sub/reserve_camp.php");

if ($board['bo_table'] == 'icairport')
include_once(G5_THEME_PATH."/sub/reserve_camp_icairport.php");

if ($board['bo_table'] == 'deajeo')
include_once(G5_THEME_PATH."/sub/reserve_camp_deajeo.php");

if ($board['bo_table'] == 'jeonju')
include_once(G5_THEME_PATH."/sub/reserve_camp_jeonju.php");

if ($board['bo_table'] == '71')
include_once(G5_THEME_PATH."/sub/71.php");
                            
if ($board['bo_table'] == '72')
include_once(G5_THEME_PATH."/sub/result.php");
                                
if ($board['bo_table'] == '73')
include_once(G5_THEME_PATH."/sub/73.php");

if ($board['bo_table'] == '101')
include_once(G5_THEME_PATH."/sub/101.php");

if ($board['bo_table'] == '102')
include_once(G5_THEME_PATH."/sub/102.php");

if ($board['bo_table'] == '103')
include_once(G5_THEME_PATH."/sub/103.php");

if ($board['bo_table'] == '104')
include_once(G5_THEME_PATH."/sub/104.php");

if ($board['bo_table'] == '105')
include_once(G5_THEME_PATH."/sub/105.php");

if ($board['bo_table'] == '106')
include_once(G5_THEME_PATH."/sub/106.php");

if ($board['bo_table'] == '107')
include_once(G5_THEME_PATH."/sub/107.php");

if ($board['bo_table'] == '108')
include_once(G5_THEME_PATH."/sub/108.php");

if ($board['bo_table'] == '109')
include_once(G5_THEME_PATH."/sub/109.php");

if ($board['bo_table'] == '110')
include_once(G5_THEME_PATH."/sub/110.php");

if ($board['bo_table'] == '111')
include_once(G5_THEME_PATH."/sub/111.php");

if ($board['bo_table'] == '112')
include_once(G5_THEME_PATH."/sub/112.php");

if ($board['bo_table'] == '113')
include_once(G5_THEME_PATH."/sub/113.php");



//echo "<img src='/img/21.jpg' alt=''>";
?>


<?php if($board['bo_table'] == '70' || '72') { ?>
</div>
<?php } else { ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>












<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>