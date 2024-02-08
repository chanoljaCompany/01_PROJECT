<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<?php /*?>
<div class="lt">
    <strong class="lt_title"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></strong>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt'])
                echo $list[$i]['comment_cnt'];

            echo "</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
            if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
            if (isset($list[$i]['icon_file'])) echo " " . $list[$i]['icon_file'];
            if (isset($list[$i]['icon_link'])) echo " " . $list[$i]['icon_link'];
            if (isset($list[$i]['icon_secret'])) echo " " . $list[$i]['icon_secret'];
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a></div>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
<?*/?>

<?php 

$sql = "select * from {$g5['board_table']} where bo_table = '{$bo_table}'";
$board = sql_fetch($sql);

$is_category = false;
$category_option = '';
if ($board['bo_use_category']) {
    $is_category = true;
    $category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;
    
     $categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
     for ($i=0; $i<count($categories); $i++) {
         $category = trim($categories[$i]);
         if ($category=='') continue;
         $category_option .= '<li data-filter=".'.$category.'">';
         $category_option .= ''.$category.'</li>';
     }
}
?>

<div class="portfolio_area3">
		<div class="container_fluid">		
			<div class="row ">
				<div class="col-md-12">
					<div class="section-title  t_center port">
						<!-- title -->
						<h2>영보 홍보갤러리</h2>						
							<!-- IMAGE -->
							<div class="em-image">	
								<img src="<?= G5_THEME_URL ?>/assets/images/icon.png" alt="title image" />
							</div>
							<!-- TEXT -->
							<p class=" text-alignm">
													영보국제평생교육원은 선진일류대학으로서의 위상을 정립하기 위해서,<br>
													선진인재 교육, 글로벌 연구 선도, 지역사회 발전을 3대 목표로 삼아 이를 달성하고자 합니다.<br>
							</p>
					</div>			
					<div class="portfolio_menu ">
						<ul class="filter_menu ">
							<li data-filter="">ALL</li>
							<?php echo $category_option ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row li">
				<div class="em_load">
					<!-- single portfoloi -->
					<?php for ($i=0; $i<count($list); $i++) :  ?>
					<div class="col-md-4 col-sm-6 col-lg-3 col-xs-12 grid-item <?= $list[$i]["ca_name"] ?>">
						<div class="single_portfolio">
							<div class="single_portfolio_inner">
								<div class="single_portfolio_thumb">
									<?php
									$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 480, 380);
                        			if($thumb['src']) {
                        			    $img = '<img src="'.$thumb['src'].'">';
                        			} 
                                    echo $img;
                                     ?>
								</div>
								<div class="single_portfolio_icon">
									<a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="<?= $thumb['src'] ?>"><i class="fas fa-mouse-pointer"></i></a>
								</div>
								<div class="portfolio_content">
									<div class="portfolio_content_inner">
										<h3><a href="<?= $list[$i]['href'] ?>"><?= $list[$i]['subject'] ?></a></h3>
										<p><span><?= $list[$i]["ca_name"] ?></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endfor; ?>
				</div>			
			</div>			
		</div>				
	</div>