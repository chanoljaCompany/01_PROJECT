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
                                        <a href="<?php echo G5_THEME_URL?>/sub/gs-company.php">
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
                                            <a style="display:block" href="http://www.chanolja-union.kr/">차놀자협동조합</a>
                                        </li>
                                        <li>
                                            <a style="display:block" href="http://chanolja.co.kr/">차놀자캠핑</a>
                                        </li>
                                        <li>
                                            <a style="display:block" href="https://www.youtube.com/channel/UCjBtbct7aCsJ4fo0S4g5bRQ/">차놀자TV</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="foo-btm">
                                <div class="foo-lt">
                                    <ul>
                                        <li>
                                            차놀자렌트카(주)&지에스렌트카(주), <br>
											충청남도 천안시 동남구 충절로 224 1층 차놀자
                                        </li>
                                        <li>
                                            지에스렌트카(주) 사업자등록번호 : 312-81-36863 / 차놀자렌트카(주) 사업자등록번호 : 369-86-01538
                                        </li>
                                        <li>
                                            Copyright © Chanolja Innovation All Rights Reserved.
                                        </li>
                                    </ul>
                                </div>
                                <div class="foo-rt">
                                    <ul class="phone">
                                        <li>
                                            대표전화 041-522-7000~1
                                        </li>
                                        <li>
                                            월~금 09:00 - 18:00
                                        </li>
                                    </ul>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <div id="qna_btn" style="display:none;">
                    <a href="/bbs/write.php?bo_table=qanda"><i class="fa fa-commenting-o" aria-hidden="true"></i> 문의하기</a>
                </div>
                <style>
                    #qna_btn {
                        position: fixed;
                        right: 50%;
                        margin-right: -140px;
                        bottom: 30px;
                        z-index: 99999;
                    }
                    #qna_btn a {
                        transition: all 0.5s;
                        display: block;
                        width: 280px;
                        font-size: 22px;
                        padding: 10px 0;
                        text-align: center;
                        line-height: 50px;
                        border-radius: 5px;
                        color: #fff;
                        background: #15668E;
                        box-shadow: 0 5px 10px rgba(0,0,0,0.2);
                        animation-name: topmove;
                        animation-duration: 0.8s;
                        animation-timing-function: linear;
                        animation-iteration-count: infinite;
                        animation-direction: alternate;
                        position: relative;
                    }

                    #qna_btn a:hover{
                        background-color: #ffffff;
                        color: #15668E;
                        border: 3px solid #15668E;
                    }

                </style>

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

    $('.family-tab').click(function(){
        $('.f-tab').stop().slideUp();

        $('.f-tab').css("display", "block"); // 슬라이드 보이게 수정
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
?>