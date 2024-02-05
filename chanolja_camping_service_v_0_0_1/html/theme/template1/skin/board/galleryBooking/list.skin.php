<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_THEME_PATH."/common/board.header.php");
?>
</div>
<div class="container">		
    <div class="row">
        <div class="col-md-12  col-sm-12 col-xs-12">
            <h2 id='container_title'><i class="fab fa-envira"></i> <?php echo $board['bo_subject'] ?><span class='sound_only'> 목록</span></h2>
            <div class="astute-single-blog-content">
                <div class="single-blog-content">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <!-- 게시판 목록 시작 { -->
                            <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
                                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                                <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                                <input type="hidden" name="stx" value="<?php echo $stx ?>">
                                <input type="hidden" name="spt" value="<?php echo $spt ?>">
                                <input type="hidden" name="sst" value="<?php echo $sst ?>">
                                <input type="hidden" name="sod" value="<?php echo $sod ?>">
                                <input type="hidden" name="page" value="<?php echo $page ?>">
                                <input type="hidden" name="sw" value="">
                                
                                <div class="row">	
                                    <?php for ($i=0; $i<count($list); $i++) {
                                    if($i>0 && ($i % $bo_gallery_cols == 0))
                                        $style = 'clear:both;';
                                    else
                                        $style = '';
                                    if ($i == 0) $k = 0;
                                    $k += 1;
                                    if ($k % $bo_gallery_cols == 0) $style .= "margin:0 !important;";
                                    ?>		
                                    <div class="col-md-4 col-sm-6">	
                                        <!-- <div class="checkbox">
                                            <label>	
                                                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>"> 선택
                                            </label>
                                        </div> -->		
                                        <div class="astute-single-blog_mg">						
                                            <div class="astute-single-blog_adn ">					
                                            <!-- BLOG THUMB -->
                                                <div class="blog_adn_thumb_inner">
                                                    <div class="astute-blog-thumb_adn ">
                                                        <a href="<?php echo $list[$i]['href'] ?>">
                                                            <?php
                                                            if ($list[$i]['is_notice']) { // 공지사항  ?>
                                                                <strong style="width:<?php echo $board['bo_gallery_width'] ?>px;height:<?php echo $board['bo_gallery_height'] ?>px">공지</strong>
                                                            <?php } else {
                                                                $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], 0,false,true);
                                        
                                                                if($thumb['src']) {
                                                                    $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" style="height:auto;">';
                                                                } else {
                                                                    $img_content = '<img src="'.G5_THEME_URL.'/assets/images/blog2.jpg" style="height:auto;">';
                                                                }
                                        
                                                                echo $img_content;
                                                            }
                                                             ?>
                                                            <!-- <img src="<?= G5_THEME_URL ?>/assets/images/blog2.jpg"  alt="blog1"> -->
                                                        </a>
                                                    </div>
                                                    <!-- BLOG TITLE -->
                                                    <div class="blog-page-title_adn2">
                                                        <h2>
                                                            <a href="<?php echo $list[$i]['href'] ?>">
                                                                <?php echo $list[$i]['subject']; ?>
                                                            </a>
                                                        </h2>			
                                                    </div>
                                                </div>
                                                <div class="em-blog-content-area_adn ">
                                                    <!-- <p><i class="fa fa-user"></i> 작성자 : <?php echo $list[$i]['name'] ?></p>
                                                    <p><i class="fa fa-calendar"></i> 작성일 : <?php echo $list[$i]['datetime2'] ?></p>
                                                    <p><i class="fa fa-check" aria-hidden="true"></i> 조회 : <?php echo $list[$i]['wr_hit'] ?></p>
                                                    <?php if ($is_good) { ?><p>추천<strong><?php echo $list[$i]['wr_good'] ?></strong></p><?php } ?>
                                                    <?php if ($is_nogood) { ?><p>비추천<<strong><?php echo $list[$i]['wr_nogood'] ?></strong></p><?php } ?> -->
                                                </div>			
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                     <?php if (count($list) == 0) { echo "<div class=\"col-md-12 text-center\">게시물이 없습니다.</div>"; } ?>
                                 </div>
                            
                                <?php if ($list_href || $is_checkbox || $write_href) { ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php if ($is_checkbox) { ?>
                                        <ul class="btn_bo_adm" style="list-style:none;padding-left:0px;">
                                            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
                                            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
                                            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                    <?php if ($list_href || $write_href) { ?>
                                    <div class="col-md-4">
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
                            </form>
                                
                            <?php if($is_checkbox) { ?>
                            <noscript>
                            <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
                            </noscript>
                            <?php } ?>
                            
                            <!-- 페이지 -->
                            <?php echo $write_pages;  ?>
                            <!-- 게시물 검색 시작 { -->
                            <fieldset id="bo_sch" >
                                <form name="fsearch" method="get" class="form-inline">
                                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                                <input type="hidden" name="sop" value="and">
                                <label for="sfl" class="sound_only">검색대상</label>
                                <select name="sfl" id="sfl" class="form-control input-sm">
                                    <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                                    <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                                </select>
                                <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                                <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="form-control input-sm" size="15" maxlength="20">
                                <input type="submit" value="검색" class="astute_btn" style="padding:3px 5px;margin:0px;">
                                </form>
                            </fieldset>
                            <!-- } 게시물 검색 끝 -->

                        </div>	
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            지도
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

    if (sw == 'copy')
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