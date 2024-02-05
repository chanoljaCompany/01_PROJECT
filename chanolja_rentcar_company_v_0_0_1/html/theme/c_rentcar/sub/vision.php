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
?>


<?php
$g5['navTitle'] = "Company";
$g5['title'] = "비전";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
</head>

<body>
    <div class="sub sub04" id="vision">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">비전</h1>
            <div class="inner">
                <h1 class="title">비전</h1>
                <!-- pc version -->
                <div class="visionBox">
                    <ul class="text_box"> 
                        <li class="list list1">
                            <div class="txtBox">
                                <p>
                                페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                                </p>
                            </div>
                            <div class="titBox">
                                <div>
                                    <p>
                                        <strong>RESPECT</strong>
                                        <span>
                                            Story of US
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list list2">
                            <div class="titBox">
                                <div>
                                    <p>
                                        <strong>RESPECT</strong>
                                        <span>
                                            Story of US
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="txtBox">
                                <p>
                                페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                                </p>
                            </div>
                        </li>
                        <li class="list list3">
                            <div class="titBox">
                                <div>
                                    <p>
                                        <strong>RESPECT</strong>
                                        <span>
                                            Story of US
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="txtBox">
                                <p>
                                페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="circle">
                        <p>
                            <span>
                            페이스메이커<br>
                                비전 페이지
                            </span>
                        </p>
                    </div>
                </div>
                <!-- mo version -->
                <div class="mo_visionBox">
                    <ul class="circleBox">
                        <li>
                            <div>
                                <p>
                                    <strong>RESPECT</strong>
                                    <span>
                                        Story of US
                                    </span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>
                                    <strong>RESPECT</strong>
                                    <span>
                                        Story of US
                                    </span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>
                                    <strong>RESPECT</strong>
                                    <span>
                                        Story of US
                                    </span>
                                </p>
                            </div>
                        </li>
                    </ul>
                    <ul class="infoBox">
                        <li>
                            <strong>01</strong>
                            <p>
                            페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                            </p>
                        </li>
                        <li>
                            <strong>02</strong>
                            <p>
                            페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                            </p>
                        </li>
                        <li>
                            <strong>03</strong>
                            <p>
                            페이스메이커는 회사의 이미지와<br>
                                디자인을 결합하고 전달하여 감정을<br>
                                불러 일으키고 전략을 유도합니다.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="sec sec2">
            <h2 class="blind">비전</h2>
            <div class="inner">
                <h2 class="tit">미래 비전</h2>
                <p class="txt">
                     바르게 성장하기 위해 페이스메이커는 미래 가치의 혁신을 통해 변화와 확장의 의지를 다지며 새롭게 도전하려고 합니다.
                </p>
                <ul>
                    <li  data-aos="fade-down">
                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub_vision01.jpg">
                    </li>
                    <li data-aos="fade-up">
                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub_vision02.jpg">
                    </li>
                    <li  data-aos="fade-down">
                        <img src="<?php echo G5_THEME_URL?>/img/sub/sub_vision03.jpg">
                    </li>
                </ul>
            </div>
        </section>
    </div>
</body>
</html>
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