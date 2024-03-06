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
$g5['navTitle'] = "회사소개";
$g5['title'] = "인사말";
?>

    <script type="text/javascript">/*<![CDATA[*/
        document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>


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
                        차량은 럭셔리하게,<br>
                        가격은 실속있게
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>안녕하세요. 한솔 렌트카를
                                    찾아주셔서 감사합니다.</span>
                                </strong>
                            </dt>
                            <dd class="txt">
                                <p>
                                원하는 차를, 워하는 시간에, 원하는 장소로 <span class="mo_br"></span>
                                고객의 시간과 비용을 절약해드리며,<span class="mo_br"></span>
                                고객의 편의와 안전을 최우선 합니다. <span class="mo_br"></span>
                                많은 이용 부탁드립니다. 감사합니다. <span class="mo_br"></span>

                                <span class="mo_br"></span>
                                <span class="mo_br"></span>
                                <h1 class="tit">
                                사전예약하고 스마트하게 놀자!
                                </h1>
                                <span class="mo_br"></span>
                                </p>
                               
                            </dd>
                            <!-- <dd class="sign">
                                <p>
                                    대표이사/협동조합 이사장   전 은 태
                                </p>
                                <p>
                                    <img src="<?php echo G5_THEME_URL?>//img/sub/ceo_sign.png">
                                </p>
                            </dd> -->
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