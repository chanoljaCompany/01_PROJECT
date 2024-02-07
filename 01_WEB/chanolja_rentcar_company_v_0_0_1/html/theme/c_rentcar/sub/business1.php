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
$g5['title'] = "사업안내";
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
    <div class="sub sub02" id="business01">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">사업안내</h1>
            <div class="inner">
                <h1 class="title">사업안내</h1>
                <img src="<?php echo G5_THEME_URL?>/img/sub_visual_02.jpg" class="pc_img">
                <img src="<?php echo G5_THEME_URL?>/img/sub_visual_02.jpg" class="mo_img">
                <ul>
                    <li data-aos="fade-up">
                        <dl>
                            <dt>Marketing</dt>
                            <dd>
                                골뱅이스토어는 고객들의 의견을 존중하고
                                획기적인 기획과 저가격으로 최고의 효과로 마케팅을 합니다.
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-down">
                        <dl>
                            <dt>Golbaeng-i</dt>
                            <dd>
                            저희 골뱅이스토어는 고객에게 만족을 드리기 위해 지난 수년간의 노력과 수차례의 시행착오를 통해 고객님들과 함께 성장해왔습니다. 
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-up">
                        <dl>
                            <dt>Title Text</dt>
                            <dd>
                                하나의 건물에서 직원의 모든 욕구를 충족하고, 다양한 기능의 복합화를 통해, 출근 후 퇴근시까지 모든 과정이 사옥내에서 가능한 원스탑 오피스의 실현이
                                가능합니다.
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </section>
        <section class="sec sec2">
            <h2 class="blind">사업안내</h2>
            <div class="inner">
                <div class="text_box">
                    <h2 class="tit">About Us</h2>
                    <p class="txt">골뱅이스토어 디자인</p>
                </div>
                <ul>
                    <li data-aos="fade-down">
                        <div class="icon">
                            <i class="xi-search"></i>
                        </div>
                        <dl>
                            <dt>RESEARCH & STRATEGY</dt>
                            <dd>
                                <p>연구에서부터 실행에 이르기까지 고객의 의견과 원하는 스타일을 반영하여 홈페이지를 구축합니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-up">
                        <div class="icon">
                            <i class="xi-lightbulb-o"></i>
                        </div>
                        <dl>
                            <dt>WEB DESIGN</dt>
                            <dd>
                                <p>풍부한 경험과 무한한 상상력으로 성공적인 서비스를 창출합니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-down">
                        <div class="icon">
                            <i class="xi-presentation"></i>
                        </div>
                        <dl>
                            <dt>WEB DEVELOPMENT</dt>
                            <dd>
                                <p>골뱅이스토어는 회사의 이미지와 디자인을 결합하고 전달하여 감정을 불러 일으키고 전략을 유도합니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-down">
                        <div class="icon">
                            <i class="xi-paper-o"></i>
                        </div>
                        <dl>
                            <dt>BUILDING WEB SERVICES</dt>
                            <dd>
                                <p>골뱅이스토어는 고품질의 설계 및 웹사이트 구축을 제공하기 위해 최선을 다하고 있습니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-up">
                        <div class="icon">
                            <i class="xi-my-location"></i>
                        </div>
                        <dl>
                            <dt>STRATEGIC THINKIN</dt>
                            <dd>
                                <p>말로만 앞서지 않고 직접 보여드리는 서비스를 제공합니다. 웹사이트 제작은 고객의 목적과 상황에 맞게 컨설팅 후 웹사이트를 제작합니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <li data-aos="fade-down">
                        <div class="icon">
                            <i class="xi-call"></i>
                        </div>
                        <dl>
                            <dt>AT Store MAINTENANCE</dt>
                            <dd>
                                <p>웹에이전시 업체와의 지속적인 '소통'이라고 생각합니다. 운영 중 일어날 수 밖에 없는 유지보수에 대해 지속적으로 케어할 수 있도록 노력합니다.</p>
                            </dd>
                        </dl>
                    </li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </section>
        <section class="sec sec4">
            <h4 class="blind">사업안내</h4>
            <div class="inner">
                <div class="lfBox">
                    <img src="<?php echo G5_THEME_URL?>/img/bussiness01_sec4_img01.jpg"> 
                </div>
                <div class="rtBox">
                    <div class="text_box">
                        <h4 data-aos="fade-down">
                            골뱅이스토어란?
                        </h4>
                        <p data-aos="fade-up">
                            잘 만든 홈페이지는 시간이 지나도 그 가치를 간직합니다. 다년간의 노하우와 경험으로<br>
                            가장 최적화된 디자인과 기술력을 선보입니다. 제작이 완성된 후에도 꾸준한 소통으로<br>
                            항상 만족할 수 있도록 노력하겠습니다. 기능은 동일하지만 다양한 효과를 주어 시각적인<br>
                            다른 것처럼 보여질 수 있습니다. 고객에게 홍보와 상품구매로 이어지는 최적화된 절차,<br>
                            컨슈머의 이목을 끌기 위한 기능 개발 등 가치있는 웹사이트로 최적회된 '기술'을 개발하기<br>
                            위해 노력합니다.
                        </p>
                        <a href="<?php echo G5_BBS_URL?>/board.php?bo_table=product01">
                            <span>더보기</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec sec5">
            <h5 class="blind">사업안내</h5>
            <div class="inner">
                <div class="text_box">
                    <h5>
                        <strong>ATSTORE</strong>
                        TEMPLATE SKIN'S
                    </h5>
                    <p>
                        골뱅이스토어에서 제작한 다양한 컨셉의 고급 스킨으로<span class="mo_br"></span>
                        멋진 홈페이지를 구현해보세요!
                    </p>
                </div>
                <ul>
                    <li data-aos="fade-down">
                        <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness02_img01.jpg">
                    </li>
                    <li data-aos="fade-up">
                        <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness02_img02.jpg">
                    </li>
                    <li data-aos="fade-down">
                        <img src="<?php echo G5_THEME_URL?>/img/sub_bussiness02_img03.jpg">
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
        disable: function msieversion() {
            return !!(window.navigator.userAgent.indexOf("MSIE ") > 0 || navigator.userAgent.match(
                /Trident.*rv\:11\./))
        }

    })
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>