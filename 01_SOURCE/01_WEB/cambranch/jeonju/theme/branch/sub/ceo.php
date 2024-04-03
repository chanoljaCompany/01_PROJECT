<?php
include_once('./_common.php');

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/sub.css">')

?>


<?php
$g5['navTitle'] = "차놀자캠핑";
$g5['title'] = "인사말";
?>




    <div class="sub sub01" id="ceo">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">인사말</h1>
            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit" style="color:#13568D; font-weight:800;">
                        누구나 꿈꾸던 캠핑카여행<br>
                        차놀자캠핑이 실현합니다.
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    차놀자 캠핑 전주지점에<br>
                                    오신것을 환영합니다.
                                </strong>
                            </dt>
                            <dd class="txt">
                                <p>
                                <strong>자동차와 여행의 서비스를 융합 자동차로 떠나는 자연,<span class="mo_br"></span>
                                사람이 함께하는 캠핑여행을 만들기 위해 노력합니다.</strong><span class="mo_br"></span>
                                저희 차놀자캠핑의 비전은 누구나 쉽고 <span class="mo_br"></span>
                                안전한 캠핑카 여행 서비스를 제공하기 위해<span class="mo_br"></span>
                                앞으로도 차놀자 캠핑의 노력과 가치가 세상에 더욱<span class="mo_br"></span>
                                알려지도록 더 좋은 서비스들을 개발하고 출시해<span class="mo_br"></span>
                                </p>
                                <p>
                                <strong>고객님에게 편리하고 안전한 혁신적인<span class="mo_br"></span>
                                캠핑 여행 서비스를 제공하겠습니다.</strong><span class="mo_br"></span>
                                여러분의 많은 관심 부탁드립니다.<span class="mo_br"></span>
                               
                                </p>
                            </dd>
                            <dd class="sign"> 
                                <p>
                                    전주지점 대표   전 숙 이
                                </p>
                                
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        AOS.init({
          // disable on internet explorer
            disable:  function msieversion() {
                return !!(window.navigator.userAgent.indexOf("MSIE ") > 0 || navigator.userAgent.match(
                    /Trident.*rv\:11\./))
            }

        })
    </script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>