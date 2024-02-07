<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_THEME_PATH."/common/board.header.php");

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
						<h2><?php echo $board['bo_subject'] ?></h2>						
							<!-- IMAGE -->
							<div class="em-image">	
								<img src="<?= G5_THEME_URL ?>/assets/images/icon.png" alt="title image" />
							</div>
							<!-- TEXT -->
							<p class=" text-alignm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. tempor incididunt</p>
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
									<a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="<?= $thumb['src'] ?>"><i class="fa fa-arrows"></i></a>
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
	<?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="row">
        <?php if ($list_href || $write_href) { ?>
        <div class="col-md-12">
			<div class="portfolio_menu text-right">
				<ul class="filter_menu ">
                    <?php if ($list_href) { ?><li onclick="document.location.href='<?php echo $list_href ?>'">목록</li><?php } ?>
                    <?php if ($write_href) { ?><li onclick="document.location.href='<?php echo $write_href ?>'">글쓰기</li><?php } ?>
                    										
				</ul>
			</div>
		</div>
        <?php } ?>
    </div>
    <?php } ?>
<!-- } 게시판 목록 끝 -->
<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>