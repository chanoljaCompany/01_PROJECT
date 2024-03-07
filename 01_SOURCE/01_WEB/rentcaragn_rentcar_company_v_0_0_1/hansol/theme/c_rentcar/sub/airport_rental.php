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
$g5['navTitle'] = "차놀자네트워크";
$g5['title'] = "인천공항&김포공항";
?>

    <script type="text/javascript">/*<![CDATA[*/
        document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>


    <div class="sub sub01" id="ceo">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">인천공항&김포공항</h1>
            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit">
                        의전&픽업
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>일반대여</span>
                                </strong>
                            </dt>
                            <dd class="txt">
                                <p>
                                인천공항,김포공항 의전 서비스 카니발 하이리무진과 수입 대형 차종 의전 <span class="mo_br"></span>
                                웨딩카 서비스 문의 010-5134-7200
                                <span class="mo_br"></span>
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