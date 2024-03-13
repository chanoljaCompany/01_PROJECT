<?php 
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/responsive.css">',1);
?>

    <div id="theme_link" >
        <a href="https://face-theme.co.kr" target="_blank">
            <img src="<?php echo G5_THEME_URL?>/img/face/logo_white.png" alt="">
            <span>
                다른 테마 보기
                <i class="bi bi-chevron-right"></i>
            </span>
        </a>
        <a href="javascript:void(0)" class="popup_open">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            <span>
                반응형 확인하기
                <i class="bi bi-chevron-right"></i>
            </span>
        </a>
    </div>
    <div id="theme_popup">
        <ul>
            <li class="active">
                <a href="https://face-maker.co.kr" target="_blank">
                    <img src="<?php echo G5_THEME_URL?>/img/face/logo_white.png" alt="">
                    페이스메이커
                </a>
            </li>
            <li>
                <a href="#" onclick="window.open('<?php echo G5_URL?>', '_blank', 'width=1024 height=767  top=100px left=100px')">
                    <i class="bi bi-tablet"></i>
                    Tablet
                </a> 
            </li>
            <li>
                <a href="#" onclick="window.open('<?php echo G5_URL?>', '_blank', 'width=400 height=605 top=100px left=100px')">
                    <i class="bi bi-phone-landscape"></i>
                    Mobile
                </a> 
            </li>
            <li>
                <a href="https://fstore.iwinv.net/theme/atstore/shop/user.php" target="_blank">
                    <i class="bi bi-chat-left-dots"></i>
                    고객문의
                </a> 
            </li>
        </ul>
        <div class="pop_close">
            <i class="bi bi-x-lg"></i>
        </div>
    </div>

<script>
    $('.pop_close').click(function(){
        $('#theme_popup').addClass('on');
        $('.popup_open').addClass('active');
        $('#theme_link').addClass('active');
    });
    $('#theme_link a').mouseenter(function(){
        $(this).addClass('on');
    })
    $('#theme_link a').mouseleave(function(){
        $(this).removeClass('on');
    });
    $('.popup_open').click(function(){
        $('#theme_popup').removeClass('on');
        $('.popup_open').removeClass('active');
        $('#theme_link').removeClass('active');
    });
</script>






