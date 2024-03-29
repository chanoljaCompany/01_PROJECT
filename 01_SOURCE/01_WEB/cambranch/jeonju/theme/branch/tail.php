<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
<!-- } 콘텐츠 끝 -->
        <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/footer.css">
        <footer id="footer">
                    <div class="foo-inner">
                        <div class="logo">
                            <img src="<?php echo G5_THEME_URL?>/img/face/text_logo_black.png" alt="logo">
                        </div>
                        <div class="foo-info">
                            <div class="foo-tp">
                                <ul>
                                    <li>
                                        <a href="<?php echo G5_BBS_URL?>/content.php?co_id=privacy">
                                            개인정보처리방침
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo G5_THEME_URL?>/theme/basichome/sub/ch-company.php">
                                            회사소개
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo G5_BBS_URL?>/content.php?co_id=provision">
                                            이용약관
                                        </a>
                                    </li>
                                </ul>
                                <div class="family-tab">
                                    <p>FAMILY SITE</p>
                                    <i class="xi-angle-right"></i>
                                    <ul class="f-tab">
                                        <li>
                                            <a href="http://www.chanolja-union.kr/">차놀자협동조합</a>
                                        </li>
                                        <li>
                                            <a href="http://www.gsrent.kr/">차놀자렌트카</a>
                                        </li>
                                        <li>
                                            <a href="https://smartstore.naver.com/chanolja">차놀자캠핑스마트스토어</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="foo-btm">
                                <div class="foo-lt">
                                    <ul>
                                        <li>
                                            인천 중구 운남동 476-21
                                        </li>
                                        <li>
                                            사업자등록번호 : 538-85-02228
                                        </li>
                                        <li>
                                            Copyright © Chanolja All Rights Reserved.
                                        </li>
                                    </ul>
                                </div>
                                <div class="foo-rt">
                                    <ul class="phone">
                                        <li>
                                            대표전화 02-6442-7873
                                        </li>
                                        <li>
                                            월~금 09:00 - 18:00
                                        </li>
                                    </ul>
                                    <!--
                                    <ul class="sns">
                                        <li>
                                            <a href="#">
                                                <i class="xi-instagram"></i>
                                            </a>         
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="xi-youtube-play"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="xi-facebook-official"></i>
                                            </a>
                                        </li>
                                    </ul>
-->
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->
<script>
    $('.site-wrap li').click(function(){
        $(this).find('.site-wrap-sub').toggleClass('on');
    });
    /*
    $('.family-tab').click(function(){
        $('.f-tab').stop().slideUp();
    });
    */
    $('.family-tab').click(function(){
        var $fTab = $('.f-tab');
        if ($fTab.css("display") === "none") {
            $fTab.css("display", "block"); // 닫혀 있을 때 열기
        } else {
            $fTab.css("display", "none"); // 열려 있을 때 닫기
        }
    });

</script>
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");