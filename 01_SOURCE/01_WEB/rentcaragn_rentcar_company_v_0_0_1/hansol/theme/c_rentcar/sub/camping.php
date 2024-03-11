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
$g5['navTitle'] = "인천 섬투어";
$g5['title'] = "캠핑카";
?>

    <script type="text/javascript">/*<![CDATA[*/
        document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>


    <div class="sub sub01" id="ceo">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">캠핑카</h1>
            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit">
                        캠핑카
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>인섬 레이 어닝타입</span>
                                </strong>
                            </dt>
                            <button style="
                                background: #207ad1;
                                border: solid 1px #eee;
                                padding: 10px;
                                border-radius: 20px;
                                height: 50px;
                                font-size: 20px;
                                color: #fff;
                            " onclick="location.href='https://my.matterport.com/show/?m=z59P7VWF3mV'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit">
                        캠핑카
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>한솔네트웍스 스타렉스A</span>
                                </strong>
                            </dt>
                            <button style="
                                background: #207ad1;
                                border: solid 1px #eee;
                                padding: 10px;
                                border-radius: 20px;
                                height: 50px;
                                font-size: 20px;
                                color: #fff;
                            " onclick="location.href='https://my.matterport.com/show/?m=2rT6RWEQkVL'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/ceo_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
                        <h1 class="tit">
                        캠핑카
                        </h1>
                        <dl>
                            <dt>
                                <strong>
                                    <span>한솔네트웍스 스타렉스B</span>
                                </strong>
                            </dt>
                            <button style="
                                background: #207ad1;
                                border: solid 1px #eee;
                                padding: 10px;
                                border-radius: 20px;
                                height: 50px;
                                font-size: 20px;
                                color: #fff;
                            "
                             onclick="location.href='https://my.matterport.com/show/?m=fi2i7VHgGpJ'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <div id="bac">유튜브 <button onclick="location.href='https://www.youtube.com/c/Hansolscamplife'"> 바로가기 </button> </br> 카카오채널 <button onclick="location.href='https://pf.kakao.com/_hYxltxj'"> 바로가기 </button> </br> 인스타그램 <button onclick="location.href='https://www.instagram.com/hansol_rent/'"> 바로가기 </button>
                </br> 연락처 1811-9632/010-5134-7200 </br> 카카오톡 플러스친구 @한솔네트웍스주식회사 </div>
            <button onclick="location.href='https://pf.kakao.com/_ZIxcxnT/chat'">대여 실시간 문의</button>
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