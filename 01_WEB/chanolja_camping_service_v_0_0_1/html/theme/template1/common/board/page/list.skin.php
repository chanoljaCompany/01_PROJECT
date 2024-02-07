<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// 전체목록보이기 사용 체크된경우 제거하기 - 해피정
if ($board[bo_use_list_view] == "1") { 
  sql_query("update $g5[board_table] set bo_use_list_view='' where bo_table='$bo_table'", false); 
}
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<?php
// 글이 있다면 뷰페이지로 없다면 쓰기버튼 출력
$subsql = " select * from $g5[write_prefix]$bo_table ";
$subrow = sql_fetch($subsql);

if($subrow[wr_id]) {
goto_url("./board.php?bo_table=$bo_table&wr_id=$subrow[wr_id]");
 } else if ($write_href) {
	 
include_once(G5_THEME_PATH."/common/board.header.php");

?>

</div>
<div class="container">		

		<div class="row">

			<div class="col-md-3 col-sm-6 col-xs-12 sidebar-right content-widget pdsl">
				<?php include_once(G5_THEME_PATH."/common/board.left.menu.php"); ?>
			</div>			
			<div class="col-md-9  col-sm-6 col-xs-12">
					<h2 id='container_title'><i class="fab fa-envira"></i> <?php echo $board['bo_subject'] ?><span class='sound_only'> 목록</span></h2>
				<div class="row">			
					<div class="col-md-12 col-sm-12">			
						<div class="astute-single-blog-content">
							<div class="single-blog-content">
<!-- 게시판 목록 시작 { -->

<div id="bo_list" style="width:<?php echo $width; ?>">
    <div class="bo_fx">
        <?php if ($write_href) {?>
        <ul id="btn_writer">
            <?php if ($write_href) { ?><li><a href="<?=$write_href?>" class="btn_b02">글쓰기</a></li><? } ?>
            <?php if ($admin_href) { ?><li><a href="<?=$admin_href?>" class="btn_admin">관리자</a></li><? } ?>
        </ul>
        <?php } ?>
    </div>
	<?php } ?>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>