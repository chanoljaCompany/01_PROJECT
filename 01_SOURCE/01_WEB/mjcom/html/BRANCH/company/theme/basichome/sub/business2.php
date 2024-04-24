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
$g5['navTitle'] = "Bussiness";
$g5['title'] = "사업영역";
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
    <div class="sub sub02" id="business02">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">사업영역</h1>
            <div class="inner">
                <div class="lf_box" data-aos="fade-left">
                    <h1 class="tit">사업영역</h1>
                    <ul>
                        <li>
                            <strong>명칭</strong>
                            <p>(주)골뱅이스토어</p>
                        </li>
                        <li>
                            <strong>설립일</strong>
                            <p>2021.11.12</p>
                        </li>
                        <li>
                            <strong>사업영역</strong>
                            <p>플랫폼사업</p>
                        </li>
                        <li>
                            <strong>사업안내</strong>
                            <p>웹사이트 제작, 테마제작, 유지보수</p>
                        </li>
                        <li>
                            <strong>소재지</strong>
                            <p>서울 가산디지털1로 128</p>
                        </li>
                        <li>
                            <strong>대표전화</strong>
                            <p>1661-4222</p>
                        </li>
                        <li>
                            <strong>문의전화</strong>
                            <p>평일 10:00~17:30</p>
                        </li>
                    </ul>
                </div>
                <div class="rt_box" data-aos="fade-right">
                    <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness_01.jpg">
                </div>
            </div>
        </section>
        <section class="sec sec2">
            <h2 class="blind">사업영역</h2>
            <div class="inner">
                <div class="text_box">
                    <div class="border">
                        <h2 class="tit">함께 나아가는 골뱅이스토어입니다.</h2>
                        <p>
                        잘 만든 홈페이지는 시간이 지나도 그 가치를 간직합니다. 다년간의 노하우와 경험으로 가장최적화된 디자인과 기술력을 선보입니다. 제작이 완성 된 후에도 꾸준한 소통으로 항상 만족할 수 있도록 노력하겠습니다. 기능은 동일하지만 다양한 효과를 주어 시각적으로 다른 것처럼 보여질 수 있습니다. 고객에게 홍보와 상품구매로 이어지는 최적화된 절차, 컨슈머의 이목을 끌기 위한 기능 개발 등 가치있는 홈페이지로써의 최적화된 '기술' 을 개발하기 위해 노력합니다.
                        </p>    
                    </div>
                </div>
                <div class="icon_box">
                    <ul>
                        <li data-aos="fade-left">
                            <span>
                                <i class="xi-alarm-o"></i>
                            </span>
                            <strong>
                            EASY AND FAST
                            </strong>
                            <p>
                            쉽게 사이트를 제작할수 있으며 빠른 시간안에 웹사이트를 만나볼 수 있습니다.
                            </p>
                        </li>
                        <li data-aos="fade-right">
                            <span>
                                <i class="xi-browser"></i>
                            </span>
                            <strong>
                            STRATEGY DEVELOPMENT
                            </strong>
                            <p>
                            전문적 제작 컨설팅 및 다양한 경험을 바탕으로 제대로 된 웹 서비스를 재공합니다.
                            </p>
                        </li>
                        <li data-aos="fade-left">
                            <span>
                                <i class="xi-airplay"></i>
                            </span>
                            <strong>
                            HIGH QUALITY
                            </strong>
                            <p>
                            차별화된 디자인과 체계적인 제작으로 고객님이 만족하는 웹사이트를 제작합니다.
                            </p>
                        </li>
                        <li data-aos="fade-right">
                            <span>
                                <i class="xi-flag-o"></i>
                            </span>
                            <strong>
                            PROJECT MANAGEMENT
                            </strong>
                            <p>
                            고객의 목적과 상황에 맞게 컨설팅 및 분석을 하여 고객의 맞는 웹서비스를 제공합니다.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="sec sec3">
            <h3 class="blind">STRATEGY</h3>
            <div class="inner">
                <h3 class="tit">STRATEGY</h3>
                <ul>
                    <li>
                        <div class="icon_box"  data-aos="flip-left">
                            <span>
                                <i class="xi-map"></i>
                            </span>
                        </div>
                        <dl>
                            <dt>미래비전</dt>
                            <dd>
                            미래에 대한 통찰과<span class="mo_br"></span>
                            끊임없는 혁신을 통해<span class="mo_br"></span>
                            더 나은 고객가치를 창출한다.
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <div class="icon_box"  data-aos="flip-left">
                            <span>
                                <i class="xi-map"></i>
                            </span>
                        </div>
                        <dl>
                            <dt>가치창출</dt>
                            <dd>
                            선진기술을 보급하고<span class="mo_br"></span>
                            안전 및 환경 우선 경영으로<span class="mo_br"></span>
                            기업의 사회적 책임을 다한다.
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <div class="icon_box"  data-aos="flip-left">
                            <span>
                                <i class="xi-map"></i>
                            </span>
                        </div>
                        <dl>
                            <dt>창조</dt>
                            <dd>
                            개인의 인격을 존중하고<span class="mo_br"></span>
                            역량 발휘 기회를 최대화하여<span class="mo_br"></span>
                            개인과 회사가 함께 성장한다.
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </section>
        <section class="sec sec4">
            <h4 class="blind">경영이념</h4>
            <div class="inner">
                <div class="text_box">
                    <h4 class="tit">경영이념</h4>
                    <p>
                    골뱅이스토어에서 제작한 다양한 컨셉의 <span class="mo_br2"></span>
                    고급 스킨으로 멋진 홈페이지를 구현해보세요!
                    </p>
                </div>
                    <ul>
                        <li  data-aos="fade-down">
                            <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness_manage_01.jpg">
                            <dl>
                                <dt>Web Design</dt>
                                <dd>
                                골뱅이스토어에서 제작한 다양한 컨셉의 고급 스킨으로
                                멋진 홈페이지를 구현해보세요!
                                </dd>
                            </dl>
                        </li>
                        <li  data-aos="fade-up">
                            <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness_manage_02.jpg">
                            <dl>
                                <dt>Web Design</dt>
                                <dd>
                                골뱅이스토어에서 제작한 다양한 컨셉의 고급 스킨으로
                                멋진 홈페이지를 구현해보세요!
                                </dd>
                            </dl>
                        </li>
                        <li  data-aos="fade-down">
                            <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness_manage_03.jpg">
                            <dl>
                                <dt>Web Design</dt>
                                <dd>
                                골뱅이스토어에서 제작한 다양한 컨셉의 고급 스킨으로
                                멋진 홈페이지를 구현해보세요!
                                </dd>
                            </dl>
                        </li>
                        <li  data-aos="fade-up">
                            <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness_manage_04.jpg">
                            <dl>
                                <dt>Web Design</dt>
                                <dd>
                                골뱅이스토어에서 제작한 다양한 컨셉의 고급 스킨으로
                                멋진 홈페이지를 구현해보세요!
                                </dd>
                            </dl>
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