<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

//페이징네이션 커스텀 재정의
include_once($board_skin_path."/list.paging.skin.php");
$write_pages = get_paging_theme(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './board.php?bo_table='.$bo_table.$qstr.'&amp;page=');

include_once(G5_THEME_PATH."/common/board.header.php");
?>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

	<?php if($is_admin) : ?>
    <h4>사용자화면</h4>
    <?php endif; ?>
    
    <div class="row">
    	<div class="col-md-8 mx-md-auto text-center">
			<h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-2">Our <strong class="font-weight-extra-bold">History</strong></h2>
			<p>회사연혁 소개 게시판</p>

			<section class="timeline" id="timeline">
				<div class="timeline-body">
					<?
					$sql = "SELECT * FROM $write_table ORDER BY wr_3 {$board["bo_4"]}, wr_1 {$board["bo_4"]}, wr_2 {$board["bo_4"]}";
            
            		$result=sql_query($sql);
            		$num_rows = sql_num_rows($result);
            		$count = 0;
            		
            		$aryList = array();
            		while($data = sql_fetch_array($result)) 
            		{
            		    $aryList[$data["wr_3"]][$data["wr_1"]][$data["wr_2"]] = $data;
            		}
            		
				    $trCnt = 1;
				    
				    foreach($aryList as $key => $val) :
				    ?>
					<div class="timeline-date">
						<h3 class="text-primary font-weight-bold"><?= $key ?></h3>
					</div>

					<?php foreach($val as $subKey => $subVal) : ?>
					
						<?php foreach($subVal as $thirdKey => $thirdVal) : 
						$cls = "left";
						if($trCnt % 2 == 0)
						{
						    $cls = "right";
						}
						
						$thumb = get_list_thumbnail($board['bo_table'], $thirdVal['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
						
						if($thumb['src']) 
						{
						    $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" style="width:100%;">';
						}
						?>
					
					<article class="timeline-box <?= $cls ?> text-left  appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="<?=$trCnt?>0">
						<div class="timeline-box-arrow"></div>
						<div class="p-2">
							<div class="row mb-2">
								<div class="col">
									<div class="post-image">
										<?= $img_content ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="post-content">
										<h2 class="font-weight-semibold text-5 line-height-4 mt-1 mb-1 text-primary"><?= $thirdVal["wr_subject"] ?></h2>
										<p class="mt-1 mb-1"><?= $thirdVal["wr_content"] ?></p>
									</div>
		
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="post-meta">
										<span><i class="far fa-calendar-alt"></i> <?= $key ?> 년 <?= $subKey ?> 월 <?= $thirdKey ?> 일 </span>
									</div>
								</div>
							</div>
						</div>
					</article>
						<?php
						$trCnt++;
						endforeach; ?>
					<?php endforeach; ?>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
	</div>

	<?php if($is_admin) : ?>
	<h4>관리자화면<strong class="font-weight-extra-bold text-color-primary">(관리자인경우만 보임)</strong></h4>
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top">
        <div id="bo_list_total">
            <h4>Total <?php echo number_format($total_count) ?>건 <?php echo $page ?> 페이지</h4>
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="list-unstyled float-right">
            <?php if ($rss_href) { ?><li class="inlineB"><a href="<?php echo $rss_href ?>" class="btn btn-outline btn-primary mb-2"><i class="icon-directions icons" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li class="inlineB"><a href="<?php echo $admin_href ?>" class="btn btn-outline btn-secondary mb-2"><i class="icon-user icons" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li class="inlineB"><a href="<?php echo $write_href ?>" class="btn btn-outline btn-quaternary mb-2"><i class="icon-pencil icons" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate float-left">
        <ul class="list-unstyled">
            <?php echo str_replace("<li><a", "<li class='float-left'><a class='btn btn-outline btn-primary mb-2'", $category_option) ?>
        </ul>
    </nav>
    <?php } ?>
        
    <!-- } 게시판 카테고리 끝 -->
	
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table class="table table-hover">
        <thead>
        <tr>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회 <i class="fa fa-sort" aria-hidden="true"></i></a></th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_num2">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong class="notice_icon"><i class="fa fa-bullhorn" aria-hidden="true"></i><span class="sound_only">공지</span></strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>

            <td class="td_subject" style="padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">
                <?php
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a> | 
                <?php } ?>
                <div class="bo_tit">
                    
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <?php echo $list[$i]['icon_reply'] ?>
                        <?php
                            if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                         ?>
                        <?php echo $list[$i]['subject'] ?>
                       
                    </a>
                    &nbsp;
                    <?php
                    // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                    // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                    if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file'])."&nbsp;";
                    if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link'])."&nbsp;";
                    if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new'])."&nbsp;";
                    if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot'])."&nbsp;";
                    ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                </div>

            </td>
            <td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
            <td class="td_datetime"><?php echo $list[$i]['datetime2'] ?></td>

        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="text-center">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>
    
	<div class="row float-left">
    	<div class="col-lg-12">
    		<!-- 페이지 -->
			<?php echo $write_pages;  ?>
    	</div>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="list-unstyled">
            <?php if ($is_checkbox) { ?>
            <li class="float-left"><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-outline btn-secondary mb-2"><i class="icon-trash icons" aria-hidden="true"></i> 선택삭제</button></li>
            <li class="float-left"><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-outline btn-secondary mb-2"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li class="float-left"><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-outline btn-secondary mb-2"><i class="icon-cursor-move icons" aria-hidden="true"></i> 선택이동</button></li>
            <?php } ?>
            <?php if ($list_href) { ?><li class="float-right"><a href="<?php echo $list_href ?>" class="btn btn-outline btn-quaternary mb-2"><i class="icon-list icons" aria-hidden="true"></i> 목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li class="float-right"><a href="<?php echo $write_href ?>" class="btn btn-outline btn-quaternary mb-2"><i class="icon-pencil icons" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>

    </form>
    
    <div style="clear:both;"></div>
    <div class="divider">
		<i class="fas fa-star"></i>
	</div>
    <div class="text-center"> 
       <!-- 게시판 검색 시작 { -->
    <fieldset id="bo_sch">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        
        <div class="row">
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
				        	
        		<div class="form-row">
                    <div class="form-group col-sm-3">
                        <select name="sfl" id="sfl" class="form-control">
                            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
                            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                            <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
						<div class="input-group input-group">
    						<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="form-control form-control-sm"" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
    						<span class="input-group-append">
    							<button type="submit" value="검색" class="btn btn-light"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
    						</span>
    					</div>                        
                    </div>
                </div>
        	
        	</div>
        	<div class="col-md-4"></div>
        </div>
        </form>
    </fieldset>
    <!-- } 게시판 검색 끝 -->   
    </div>
    <?php endif; ?>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>