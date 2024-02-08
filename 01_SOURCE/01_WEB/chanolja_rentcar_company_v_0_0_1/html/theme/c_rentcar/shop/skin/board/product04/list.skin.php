<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/sub.css">', 1);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/common.css">', 2);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/board.css">', 3);

$board['bo_gallery_width']= 383;
$board['bo_gallery_height']= 220;

?>


<?php
$g5['navTitle'] = "Product";
$g5['title'] = "제품소개4";
?>

<div class="sub" id="product03">
    <?php include_once(G5_THEME_PATH.'/head.php'); ?>
    <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
    <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">

    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <section class="sec sec1">
        <div class="sec1-inner">
            <!-- 게시판 페이지 정보 및 버튼 시작 { -->
            <div id="bo_btn_top" style="position:absolute; top:20px; left:50%; transform:translateX(-50%);">

            <ul class="btn_bo_user">
                <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
                <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
                <li>
                    <button type="button" class="btn_bo_sch btn_b01 btn" title="게시판 검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">게시판 검색</span></button>
                </li>
                <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                <?php if ($is_admin == 'super' || $is_auth) {  ?>
                <li>
                    <button type="button" class="btn_more_opt is_list_btn btn_b01 btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
                    <?php if ($is_checkbox) { ?>	
                    <ul class="more_opt is_list_btn">  
                        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
                        <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
                        <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
                    </ul>
                    <?php } ?>
                </li>
                <?php }  ?>
            </ul>
            </div>
            <!-- } 게시판 페이지 정보 및 버튼 끝 -->
            <h3>Lorem Ipsum dolor</h3>
            <div class="sec1-slick">
                <?php for ($i=0; $i<count($list); $i++) {

                $classes = array();

                $classes[] = 'gall_li';
                $classes[] = 'col-gn-'.$bo_gallery_cols;

                if( $i && ($i % $bo_gallery_cols == 0) ){
                    $classes[] = 'box_clear';
                }

                if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                    $classes[] = 'gall_now';
                }

                $line_height_style = ($board['bo_gallery_height'] > 0) ? 'line-height:'.$board['bo_gallery_height'].'px' : '';
                ?>
                <div>
                    <div class="sec1-contents">
                        <div class="thumbnail">
                            <?php echo get_member_profile_img($view['mb_id']) ?>
                        </div>
                        <a href="<?php echo $list[$i]['href'] ?>">
                            <h3><?php echo $list[$i]['name'] ?></h3>
                            <p><?php echo $list[$i]['subject'] ?></p>
                            <p><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 280, '..'); ?></p>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
            </div>
        </div>
        <div class="sec1-controll"></div>
    </section>
    </form>
    <section class="sec sec6">
        <div class="sec6-inner">
            <h3>문의사항이 있으신가요?</h3>
            <p>문의사항을 빠르게 답변 드립니다. 온라인으로 문의해주세요!<p>
            <a href="<?php echo G5_URL?>/bbs/board.php?bo_table=qna">LEARN MORE</a>
        </div>
    </section>

</div>
<script src="<?php echo G5_THEME_URL?>/js/slick.min.js"></script>
<script src="<?php echo G5_THEME_URL?>/js/slick.js"></script>
<script>
  $(document).ready(function(){
            $('.sec1-slick').slick({
                slidesToShow:3,
                slidesToScroll:1,
                arrows:true,
                appendArrows:$('.sec1-controll'),
                prevArrow:'<div class="sec1-prev"><span></span></div>',
                nextArrow:'<div class="sec1-next"><span></span></div>',
                centerMode:true,
                centerPadding:'0px',
                responsive:[
                    {
                        breakpoint:901,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"100px",
                            arrows:false,
                        }
                    },
                    {
                        breakpoint:601,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"20px",
                            arrows:false,
                        }
                    }
                ]
            })
        });
</script>
</html>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>