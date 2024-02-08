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
$g5['navTitle'] = "Company";
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
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit">
                        모두가 자동차를 이야기 할 때,<br>
                        저희는 사람을 이야기 합니다.
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>자동차 토탈 플랫폼 차놀자 입니다
                                    홈페이지 방문을 진심으로 환영합니다.</span>
                                </strong>
                            </dt>
                            <dd class="txt">
                                <p>
                                저의 <strong>차놀자</strong>는 자동차 판매업계 출신 경력을 기반으로<span class="mo_br"></span>
                                “빠르게 변화하는 자동차 시장”에서 <strong>소비자의 다양한 NEEDS</strong>에 맞는 상품을 <span class="mo_br"></span>
                                개발하고 경제적인 선택을 할 수 있도록 <strong>맞춤형 시스템을 구축</strong>하고 있습니다.<span class="mo_br"></span>
                                <span class="mo_br"></span>
                                고객이 원하는 차를 가장 경제적으로 이용할 수 있도록<span class="mo_br"></span>
                                도와드리는게 저희의 임무 입니다.<span class="mo_br"></span>
                                <span class="mo_br"></span>
                                <span class="mo_br"></span>
                                <h1 class="tit">
                                GROW TOGETHER!
                                </h1>
                                <span class="mo_br"></span>
                                <strong>본사의 이익이 아니라 고객도, 지점도 함께 혜택을 누리고</strong><span class="mo_br"></span>
                                <strong>함께 성장하는 것이 [차놀자]의 이념이고 사명입니다.</strong><span class="mo_br"></span>                                
                                </p>
                               
                            </dd>
                            <dd class="sign"> 
                                <p>
                                    대표이사/협동조합 이사장   전 은 태
                                </p>
                                <p>
                                    <img src="<?php echo G5_THEME_URL?>//img/sub/ceo_sign.jpg">
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