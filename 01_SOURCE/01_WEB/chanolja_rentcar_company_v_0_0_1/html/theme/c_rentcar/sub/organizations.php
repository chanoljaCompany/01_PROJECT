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
$g5['title'] = "조직도";
?>


<body>
    <div class="sub sub01" id="organizations">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">조직도</h1>
            <div class="inner">
                <div class="org">
                    <p class="head">
                        <span>CEO</span>
                    </p>
                    <ul class="org_list">
                        <li>
                            <p class="tit">team manager</p>
                            <p>team 1</p>
                            <p>team 2</p>
                            <p>team 3</p>
                            <p>team 3</p>
                        </li>
                        <li>
                            <p class="tit">team manager</p>
                            <p>team 1</p>
                            <p>team 2</p>
                            <p>team 3</p>
                            <p>team 3</p>
                            <p>team 3</p>
                        </li>
                        <li>
                            <p class="tit">team manager</p>
                            <p>team 1</p>
                            <p>team 2</p>
                            <p>team 3</p>
                            <p>team 3</p>
                        </li>
                        <li>
                            <p class="tit">team manager</p>
                            <p>team 1</p>
                            <p>team 2</p>
                            <p>team 3</p>
                            <p>team 3</p>
                        </li>
                        <li>
                            <p class="tit">team manager</p>
                            <p>team 1</p>
                            <p>team 2</p>
                            <p>team 3</p>
                            <p>team 3</p>
                        </li>
                    </ul>
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