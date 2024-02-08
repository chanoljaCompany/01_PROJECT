<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

//include_once(G5_THEME_PATH.'/head.php');
include_once(G5_THEME_PATH.'/header.php');
?>

<link rel="stylesheet" href="<?= G5_THEME_URL ?>/css/flexslider.css" type="text/css" media="screen" /> 
<div id="visual">
  <!-- FlexSlider -->
    <div class="flexslider">
        <ul class="slides">
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="v_txt">
            <img src="<?= G5_THEME_URL ?>/img/txt.png" alt="" />
        </div>
    </div>
</div>
  
<!-- FlexSlider -->
<script defer src="<?= G5_THEME_URL ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function(){
  SyntaxHighlighter.all();
});
$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "fade",
    duration:500,
    slideshowSpeed:5000
  });
});
</script>

<div class="banner_wrap">
    <ul class="f_wrap">
        <li>
            <a href="/bbs/board.php?bo_table=01">
                <img src="<?= G5_THEME_URL ?>/img/icon01.png" alt="" />
                <h2>보상자료</h2>
                <span>보상자료로 이동합니다.</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0102">
                <img src="<?= G5_THEME_URL ?>/img/icon02.png" alt="" />
                <h2>대토보상</h2>
                <span>대토보상으로 이동합니다.</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0104">
                <img src="<?= G5_THEME_URL ?>/img/icon03.png" alt="" />
                <h2>세무자료</h2>
                <span>세무자료로 이동합니다.</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0106">
                <img src="<?= G5_THEME_URL ?>/img/icon04.png" alt="" />
                <h2>보상예정매물</h2>
                <span>보상예정매물로 이동합니다.</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0108">
                <img src="<?= G5_THEME_URL ?>/img/icon05.png" alt="" />
                <h2>보상자금활동</h2>
                <span>보상자금활동로 이동합니다.</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0110">
                <img src="<?= G5_THEME_URL ?>/img/icon06.png" alt="" />
                <h2>업무의뢰</h2>
                <span>업무의뢰로 이동합니다.</span>
            </a>
        </li>
       
    </ul>
</div>

<div class="contents_wrap">
    <h2><b>L</b>AND <b>C</b>OMPENSATION</h2>
    <ul class="imgbtn f_wrap">
        <li>
            <a href="javascript:openPop()">
                <p>
                    <img src="<?= G5_THEME_URL ?>/img/btn01.jpg" alt="" />
                </p>
                <h3>보상절차</h3>
                <span>수용재결/절차/결정/종류/흐름/기간<br>
                토지보상절차에 대해<br>자세하게 안내해드립니다.</span>
                <span class="more">Detail View</span>
            </a>
        </li>
        <li class="business">
            <a href="javascript:openPop_2()">
                <p>
                    <img src="<?= G5_THEME_URL ?>/img/btn02.jpg" alt="" />
                </p>
                <h3>보상핵심</h3>
                <span>Know-how<br>토지보상 핵심에 대해<br>안내해드립니다.</span>
                <span class="more">Detail View</span>
            </a>
        </li>
        <li>
            <a href="/bbs/board.php?bo_table=0110">
                <p>
                    <img src="<?= G5_THEME_URL ?>/img/btn03.jpg" alt="" />
                </p>
                <h3>업무의뢰</h3>
                <span>010-8698-2040
                <br>토지보상업무 관련해<br>문의사항이 있으시면 언제든 연락주세요.</span>
                <span class="more">Detail View</span>
            </a>
        </li>
    </ul>
</div>
<div class="cus_wrap">
    <h2><b>관</b>련 <b>사</b>이트</h2>
    <?php echo latest("theme/banner_move", "0112", 10, 10); ?>
</div>
<script>

function openPop()
{

var popupX = (window.screen.width / 2) - (500/2);

var popupY= (window.screen.height /2) - (940/2);

window.open("<?= G5_THEME_URL ?>/img/popimg_01.png", "startpop", 'status=no, height=940, width=500, left='+ popupX + ', top='+ popupY + ', screenX='+ popupX + ', screenY= '+ popupY);
}

function openPop_2()
{

var popupX = (window.screen.width / 2) - (862/2);

var popupY= (window.screen.height /2) - (581/2);

window.open("<?= G5_THEME_URL ?>/img/popimg_02.png", "startpop", 'status=no, height=581, width=862, left='+ popupX + ', top='+ popupY + ', screenX='+ popupX + ', screenY= '+ popupY);
}
</script>

<?php
include_once(G5_THEME_PATH.'/footer.php');
// include_once(G5_THEME_PATH.'/tail.php');
?>