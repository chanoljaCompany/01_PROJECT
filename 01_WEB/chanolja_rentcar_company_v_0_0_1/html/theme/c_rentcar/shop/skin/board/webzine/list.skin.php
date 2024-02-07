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
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/open-iconic.css">', 0);

// 날짜 계산 함수
function passing_time($datetime) {
	$time_lag = time() - strtotime($datetime);
	
	if($time_lag < 60) {
		$posting_time = "방금";
	} elseif($time_lag >= 60 and $time_lag < 3600) {
		$posting_time = floor($time_lag/60)."분 전";
	} elseif($time_lag >= 3600 and $time_lag < 86400) {
		$posting_time = floor($time_lag/3600)."시간 전";
	} elseif($time_lag >= 86400 and $time_lag < 2419200) {
		$posting_time = floor($time_lag/86400)."일 전";
	} else {
		$posting_time = date("y.m.d", strtotime($datetime));
	} 
	
	return $posting_time;
}
?>


<?php
$g5['title'] = "대메뉴2";
$g5['sub_title'] = "";

$g5['visual_tit'] = "웹진형";
$g5['visual_txt'] = "All progress takes place outside the comfort zone.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
</head>
<style>
    .sec {
        width:100%;
    }
    .sec .inner {
        width:1240px;
        padding:5% 20px;
        position:relative;
        margin:0 auto;
    }
    .board_tit {
        display:block;
        font-size:1.4em;
        font-weight:bold;
        transform:translateY(20px);
    }
    .board_txt {
        display:block;
        width:500px;
        transform:translateY(40px);
    }
    .btn_bo_user {
        padding-bottom:50px;
    }
    .board_webzine {margin:0 0 50px; }
    .board_webzine caption {padding:0;font-size:0;line-height:0;overflow:hidden}
    .board_webzine thead th {padding:20px 0;font-weight:normal;text-align:center;height:40px}
    .board_webzine thead th input {vertical-align:top} /* middle 로 하면 게시판 읽기에서 목록 사용시 체크박스 라인 깨짐 */
    .board_webzine tfoot th, .board_webzine tfoot td {padding:10px 0;background:#d7e0e2;text-align:center}
    .board_webzine tbody th {padding:8px 0;border-bottom:1px solid #e8e8e8}
    .board_webzine tr {}
    .board_webzine tr:hover {box-shadow:3px 3px 5px rgba(0,0,0,0.5);}
    .board_webzine td {color:#666;padding:10px 5px;line-height:1.4em;height:200px; word-break:break-all}
    .board_webzine tbody tr:hover td {background:#3576c6; color:#fff; transition-duration:0.6s;}
    .board_webzine tbody tr:hover span {color:#fff; transition-duration:0.6s;}
    .board_webzine a:hover {text-decoration:underline}
</style>
<body>
    <div class="sub sub01" id="business01">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <div class="sub_tab">
            <div class="inner">
                <ul>
                    <li><a href="../bbs/board.php?bo_table=gallery2">갤러리형</a></li>
                    <li><a href="../bbs/board.php?bo_table=list">리스트형</a></li>
                    <li class="on"><a href="../bbs/board.php?bo_table=webzine">웹진형</a></li>
                </ul>
            </div>
        </div>
        <section class="sec sec1">
            <article class="inner">
                <!-- 게시판 목록 시작 { -->
                <div id="bo_list" style="width:<?php echo $width; ?>">


                <!-- 게시판 페이지 정보 및 버튼 시작 { -->
                <div id="bo_btn_top">
                    <div id="bo_list_total">
                        <!-- 게시판 카테고리 시작 { -->
                        <?php if ($is_category) { ?>
                        <nav id="bo_cate" style="float:left; margin-right:25px;">
                            <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
                            <ul id="bo_cate_ul">
                                <?php echo $category_option ?>
                            </ul>
                        </nav>
                        <?php } ?>

                        <!-- } 게시판 카테고리 끝 -->
                    </div>

                    <?php if ($rss_href || $write_href) { ?>

                    <ul class="btn_bo_user">
                        <!--
                        <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_admin2 btn">RSS</a></li><?php } ?>
                        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin2 btn">관리자</a></li><?php } ?>
                        -->
                        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_b03 btn" title="게시판관리"><i class="oi oi-cog color-blue"></i></a></li><?php } ?>
                        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn color-blue-bg">글쓰기</a></li><?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <!-- } 게시판 페이지 정보 및 버튼 끝 -->


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

                <div class="board_webzine tbl_wrap">
                    <table>
                    <caption><?php echo $board['bo_subject'] ?> 목록</caption>

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
                            echo '<strong class="notice_icon"><i class="oi oi-bell" aria-hidden="true"></i><span class="sound_only">공지</span></strong>';
                        else if ($wr_id == $list[$i]['wr_id'])
                            echo "<span class=\"bo_current\">열람중</span>";
                        else
                            echo $list[$i]['num'];
                        ?>
                        </td>

                        <td class="td_subject" style="padding-right:20px; padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">

                        <br>

                            <div class="bo_tit">
                                
                                <a href="<?php echo $list[$i]['href'] ?>">
                                    <?php echo $list[$i]['icon_reply'] ?>
                                    <?php echo ( isset($list[$i]['icon_secret']) && !empty($list[$i]['icon_secret']) ) ? "<i class='oi oi-lock-locked'></i>" : "";?>
                                    <span class="board_tit"><?php echo $list[$i]['subject'] ?></span>
                                    <span class="board_txt"><?php echo cut_str(strip_tags($list[$i]['wr_content']),160," . . . ") ?></span>
                                </a>

                                <?php
                                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                                //if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                                //if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                                //if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
                                //if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                                ?>
                                <?php if ($list[$i]['comment_cnt']) { ?><span class="comment_b"><?php echo $list[$i]['wr_comment']; ?></span><?php } ?>
                            </div>

                            <?php if (strstr($list[$i][wr_option], "secret")) { ?>
                            <!-- 비밀글의 경우 출력내용 -->
                            <?php } else { ?>
                            <br><span class="small text-muted"><?php echo  cut_str(strip_tags($list[$i]['content']),100)?></span><br><br>
                            <?php } ?>


                            <?php if ($is_category && $list[$i]['ca_name']) { ?>
                            <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link color-gray mt-1"><?php echo $list[$i]['ca_name'] ?>　</a>
                            <?php } ?>
                            <?php if ($is_good) { ?><span class="bo_cate_link color-red mt-1"><i class="oi oi-heart"></i> <?php echo $list[$i]['wr_good'] ?></span><?php } ?>
                        


                        <br>
                        <br>

                        </td>
                        <td class="td_datetime">

                        <a href="<?php echo $list[$i]['href'] ?>">
                                            <?php
                                                    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
                                                
                                                    if($thumb['src']) {
                                                        $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
                                                    } else {
                                                        $img_content = '<img src="'.$board_skin_url.'/img/noimage.png" alt="" />';
                                                    }
                                                    echo $img_content;
                                            ?>
                                        </a>
                        </td>






                        <td class="td_datetime"><?php echo $list[$i]['name'] ?></td>
                        <!--<td class="td_datetime"><?php echo $list[$i]['datetime2'] ?></td>-->

                    </tr>
                    <?php } ?>
                    <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                    </tbody>
                    </table>
                </div>

                <?php if ($list_href || $is_checkbox || $write_href) { ?>
                <div class="bo_fx">
                    <?php if ($list_href || $write_href) { ?>
                    <ul class="btn_bo_user">
                        <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_admin btn" title="목록"><i class="oi oi-menu"></i></a></li><?php } ?>
                        <?php if ($is_checkbox) { ?>
                        <li><button type="submit" name="btn_submit" value="선택삭제" title="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="oi oi-trash"></i></button></li>
                        <li><button type="submit" name="btn_submit" value="선택복사" title="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="oi oi-file"></i></button></li>
                        <li><button type="submit" name="btn_submit" value="선택이동" title="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="oi oi-layers"></i></button></li>
                        <?php } ?>
                        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_admin btn" title="글쓰기"><i class="oi oi-pencil color-blue"></i></a></li><?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php } ?>

                </form>

                <!-- 게시판 검색 시작 { -->
                <fieldset id="bo_sch">
                    <legend>게시물 검색</legend>

                    <form name="fsearch" method="get">
                    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                    <input type="hidden" name="sca" value="<?php echo $sca ?>">
                    <input type="hidden" name="sop" value="and">
                    <label for="sfl" class="sound_only">검색대상</label>
                    <select name="sfl" id="sfl">
                        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
                        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
                    </select>
                    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어 입력">
                    <button type="submit" value="검색" class="sch_btn"><i class="oi oi-magnifying-glass" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                    </form>
                </fieldset>
                <!-- } 게시판 검색 끝 -->
                </div>
            </article>
        </section>
    </div>
</body>
</html>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>



<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>


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
