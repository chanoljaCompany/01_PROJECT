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

    <style>
        #ceo .sec1 .inner{
            padding: 50px  30px !important;
        }

        .step_box {display:flex; justify-content:center; flex-wrap:wrap; max-width:1200px; margin:0 auto; margin-bottom:50px;}
        .step_box li {position:relative; width:170px; height:170px; text-align:center; margin:10px 35px; padding-top:35px; border-radius:20px; background:#fff; border:1px solid #ddd; font-size:18px;}
        .step_box li h4 {font-size:20px; color:#999; font-family: 'S-CoreDream-2ExtraLight';}
        .step_box li img {margin:10px 0;}
        .step_box li p {font-size:16px; color:#111;}
    </style>

    <div class="sub sub01" id="ceo">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">캠핑카</h1>
            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/camper_page_img01.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
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
                                height: 60px;
                                width:200px;
                                font-size: 20px;
                                color: #fff;
                            " onclick="location.href='https://my.matterport.com/show/?m=z59P7VWF3mV'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/camper_page_img02.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
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
                                height: 60px;
                                width: 200px;
                                font-size: 20px;
                                color: #fff;
                            " onclick="location.href='https://my.matterport.com/show/?m=2rT6RWEQkVL'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="inner">
                <div class="lf_box">
                    <img src="<?php echo G5_THEME_URL?>/img/sub/camper_page_img03.jpeg">
                </div>
                <div class="rt_box">
                    <div class="text_box">
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
                                height: 60px;
                                width:200px;
                                font-size: 20px;
                                color: #fff;
                            "
                             onclick="location.href='https://my.matterport.com/show/?m=fi2i7VHgGpJ'">3D View</button>
                        </dl>
                    </div>
                </div>
            </div>

            <h1 style="font-size:50px; text-align: center; margin: 50px 0px; color:#207ad1;">문의 하기</h1>

            <div style="margin: 0 auto; width:1200px; text-align: center;">
                <button style="width:500px; height:60px; margin-top:20px; margin-bottom:50px; background-color: #207ad1; color:#fff; border: none; border-radius:20px; font-size:20px;"
                    onclick="location.href='https://pf.kakao.com/_ZIxcxnT/chat'">대여 실시간 문의</button>
            </div>
            <ul class="step_box">
                <li><a href="https://www.youtube.com/c/Hansolscamplife"><i class="xi-youtube-play" style="font-size:50px; color:#666; margin:10px 0px;"></i></a><p>유튜브</p></li>
                <li><a href="https://pf.kakao.com/_hYxltxj"> <img style="width:50px;" src="http://rentcaragn.dothome.co.kr/branch/hansol/theme/c_rentcar/img/kakao.png" /> </a><p>카카오채널</p></li>
                <li><a href="https://www.instagram.com/hansol_rent/"> <i style="font-size:50px; color:#666; margin:10px 0px;" class="xi-instagram"></i> </a><p>인스타그램</p></li>
                <li style="padding-top:60px"><p style="padding-bottom:15px;">연락처</p> <span style="font-weight:bold; font-size:18px;"> 1811-9632 </br> 010-5134-7200 </span></li>
                <li style="padding-top:60px;"><p style="padding-bottom:15px;">카카오톡 플러스친구</p> <span style="font-weight:bold; font-size:14px;">@ 한솔네트웍스주식회사</span></li>
            </ul>



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