<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/header.php');
include_once(G5_THEME_PATH.'/lib/groupmenu.lib.php');
?>

<!-- 콘텐츠 시작 { -->
<div class="s_top_wrap">
    <div id="sub_top">
        <img src="/img/s_txt.png" alt="" />
    </div>
</div>
<div id="wrapper">
    <div id="aside">
        <?php echo groupmenu('adffix', 24);?> 
        <div class="s_cus">
            <h3><b>Customer center</b><br><?=$config[cf_1]?> 고객센터</h3>
            <p>
                <!-- <strong><?=$config[cf_4]?></strong> -->
                <strong><?=$config[cf_8]?></strong>
            </p>
            <p class="txt">*궁금하신 사항 문의주세요.<br>항상 친절하게 답변해드립니다.</p>
        </div>
    </div>
    <div id="container">
        <?php include_once(G5_THEME_PATH.'/my_position.php');?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>