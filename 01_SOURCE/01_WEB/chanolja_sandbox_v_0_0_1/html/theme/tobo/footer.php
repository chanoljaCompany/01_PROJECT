<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}

?>
<div id="ft2"><!-- 푸터 -->
		<div class="ft2_1">
<!--             <div class="f_logo">
                <a href="/"><img src="/img/f_logo.png" alt="<?=$config[cf_1]?>"></a>
            </div> -->
            <div class="ft_wrap">
                <div class="f_info">
                    <?=$config[cf_1]?> | 대표 : <?=$config[cf_2]?> | 사업자 번호 : <?=$config[cf_3]?> | tel : <?=$config[cf_4]?> | fax : <?=$config[cf_5]?> | e-mail : <?=$config[cf_7]?> | 통신판매업신고증 2019-서울강북-0084호
                    <br>
                    주소 : <?=$config[cf_6]?> | Copyright &copy; <b><?=$config[cf_1]?>.</b> All rights reserved.
                </div>
            </div>
		</div>
</div> 

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">모바일 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>