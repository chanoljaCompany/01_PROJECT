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

$sql = "select * from {$write_table}";
$rows = sql_query($sql);

$list = array();
while($row = sql_fetch_array($rows))
{
    $list[] = get_list($row, $board, $board_skin_url);
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
									<a class="portfolio-icon venobox vbox-item" data-gall="<?= $list[$i]["ca_name"] ?>" href="<?= $thumb['src'] ?>"><i class="fa fa-arrows"></i></a>
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



<div style="display:none;">
	<?php 
     $v_img_count = count($view['file']);
     if($v_img_count) {
         
         for ($i=0; $i<=count($view['file']); $i++) {
             if ($view['file'][$i]['view']) {
     ?>
	<a class="venobox vbox-item" id="imageData<?=$i?>" data-gall="viewImg" href="<?= $view['file'][$i]["path"]."/".$view['file'][$i]["file"] ?>"><img src="<?= $view['file'][$i]["path"]."/".$view['file'][$i]["file"] ?>"></a>
	<?php 
             }
         }
     }
	?>
</div>


<script>
$(document).ready(function(){
	$("#imageData0").click();
});

</script>

