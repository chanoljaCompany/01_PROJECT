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
$g5['title'] = "회사소개";
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
<style>


</style>
<body>
    <div class="sub sub01" id="company">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec01">
            <article>
                <div class="wrap" data-aos="fade-up" data-aos-duration="600" >
                    <div class="txt_box">
                        <p>잘 만든 홈페이지는 시간이 지나도 그 가치를 간직합니다.</p>
                        <h2>사람의 마음을 움직이는 골뱅이스토어</h2>
                        <strong>
                            다년간의 노하우와 경험으로 가장최적화된 디자인과 기술력을 선보입니다.<span class="mo_br"></span>
                            제작이 완성된 후에도 꾸준한 소통으로 항상 만족할수 있도록 노력하겠습니다 
                        </strong>
                    </div>
                    <div class="img_box">
                        <img src="<?php echo G5_THEME_URL?>/img/sub_company01.png">
                    </div>
                </div>
            </article>
        </section>

        <section class="sec sec02">
            <article>
                <div class="wrap">
                    <div class="txt_box">
                        <p>At Store Template</p>
                        <h2>귀사의 성공적인 홈페이지를 열어드리겠습니다.</h2>
                    </div>
                    <div class="icon_box">
                        <ul>
                            <li data-aos="fade-up" data-aos-duration="300">

                                <i class="xi-desktop"></i>
                                <div class="icon_txt">
                                    <strong>UI/UX 기반 철저한 기획</strong>
                                    <p>웹표준/웹접근성 준수 코딩<span class="mo_br"></span></p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="600">

                                <i class="xi-wrench"></i>
                                <div class="icon_txt">
                                    <strong>높은 품질과 안정성</strong>
                                    <p>제작이 완성된 후에도 꾸준한 소통으로<span class="mo_br"></span>항상 만족할수 있도록 노력하겠습니다.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="900">
                                <i class="xi-lightbulb-o"></i>
                                <div class="icon_txt">
                                    <strong>다양한 아이디어 기반 홈페이지</strong>
                                    <p>가치있는 홈페이지를 만들기 위해<span class="mo_br"></span>골뱅이스토어는 노력합니다.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1200">

                                <i class="xi-call-incoming"></i>
                                <div class="icon_txt">
                                    <strong>고객과 소통하는 골뱅이스토어</strong>
                                    <p>고객사의 원하는 바를 지속적인 협의를 통해<span class="mo_br"></span>요구사항을 최대한 반영하도록 노력하겠습니다.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">

                                <i class="xi-alarm-clock-o"></i>
                                <div class="icon_txt">
                                    <strong>기술 개발에 많은 시간 투자</strong>
                                    <p>가치있는 홈페이지로써의 최적화된<span class="mo_br"></span>'기술' 을 개발하기 위해 노력합니다.</p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1800">

                                <i class="xi-touch"></i>
                                <div class="icon_txt">
                                    <strong>100% 반응형 모바일구현</strong>
                                    <p>모든IT기기 자유로운 호환<span class="mo_br"></span>최상의 상태를 보여주는 반응형WEB </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
        <section class="sec sec03">
            <article>
                <div class="content3_wrap container">
                    <div class="img_box" data-aos="fade-right" data-aos-duration="600"><img
                            src="<?php echo G5_THEME_URL?>/img/sub_company02.png" alt="">
                    </div>
                    <div class="txt_box" data-aos="fade-left" data-aos-duration="600">
                        <h2>웹 사이트를 위해<br>제작한 아름다운 템플릿</h2>
                        <ul class="txt">
                            <li><i class="xi-check-min"></i>아름답고 이해하기 쉬운 UI,
                                전문 애니메이션</li>
                            <li><i class="xi-check-min"></i>가장 최적화된 디자인과 기술력</li>
                            <li><i class="xi-check-min"></i>유연하고 편리하며 다양한 용도로 서비스 제공</li>
                            <li><i class="xi-check-min"></i>다양한 경험을 기반으로 창의적인 아이디어 찾기</li>
                            <li><i class="xi-check-min"></i>제한 없는 전원 및 사용자 지정 가능성</li>
                            <li><i class="xi-check-min"></i>다양한 동적 모션이 가능한 웹홈페이지</li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>

        <section class="sec sec04">
            <article>
                <div class="wrap">
                    <div class="tab_wrap left"data-aos="fade-right" data-aos-duration="600">
                        <div class="tab_inner">
                            <div class="tab_txt">
                                <h2>완벽한 설계 기반<sapn class="mo_br"></sapn><strong>100% 반응형 홈페이지</strong></h2>
                            </div>

                            <div class="faq-content">
                                <button class="question" id="que-1"><span id="que-1-toggle">+</span><span>'반응형'이란
                                        무엇인가요?</span></button>
                                <div class="answer" id="ans-1">이용자의 기기화면이나 환경에 맞게 자유자재로 변하는 웹홈페이지입니다.</div>
                            </div>
                            <div class="faq-content">
                                <button class="question" id="que-2"><span id="que-2-toggle">+</span><span>'왜 반응형 이어야 할까요? </span></button>
                                <div class="answer" id="ans-2">
                                단 하나의 웹사이트로 다양한 디바이스에 대응을 하며 유지보수 및 추가 수정에 대해 시간과 비용면에서도 보다 효율적입니다.
                                </div>
                            </div>
                            <div class="faq-content">
                                <button class="question" id="que-3"><span id="que-3-toggle">+</span><span>
                                    '반응형 웹'의 장점을 알려주세요.
                                </span>
                                </button>
                                <div class="answer" id="ans-3">
                                    같은 도메인을 사용하므로 비용적 절감이 가능하며 유지보수가 간편합니다. 구축비용의 감소와 더불어 검색엔진(SEO)노출이 용이합니다. 브라우저 크기에 따라 디바이스의 모드에 따라 자연스럽게 레이아웃이 반응합니다.
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="img_box right"data-aos="fade-left" data-aos-duration="600">
                        <img src="<?php echo G5_THEME_URL?>/img/sub_company03.png" alt="">
                    </div>
                </div>
            </article>
        </section>
        <!-- <section class="sec sec05">
            <article>
                <div class="wrap">
                    <div class="txt_box">
                        <h2>Lorem, ipsum.</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur<span class="mo_br"></span> adipisicing elit. Eveniet
                            illum eum libero voluptatem quis commodi, <span class="mo_br"></span>vitae sapiente
                            reprehenderit dolore voluptates?</p>
                    </div>
                    <div class="box_wrap">
                        <div class="row">
                            <ul>
                                <li>
                                    <div class="icon_wrap" data-aos="fade-up" data-aos-duration="600">
                                        <div class="icon">
                                            <i class="xi-flight-takeoff"></i>
                                        </div>
                                        <div class="txt_box">
                                            <strong>Lorem, ipsum.</strong>
                                            <p>텍스트를 입력해주세요. 텍스트<span class="mo_br"></span>텍스트를 입력해주세요.텍스트 <span
                                                    class="mo_br"></span>텍스트를 입력해주세요.
                                            </p>
                                        </div>
                                        <div class="deep">
                                            <p>Lorem, ipsum dolor.</p>
                                            <strong>Lorem ipsum dolor sit amet.</strong>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon_wrap" data-aos="fade-up" data-aos-duration="900">
                                        <div class="icon">
                                            <i class="xi-flight-land"></i>
                                        </div>
                                        <div class="txt_box">
                                            <strong>Lorem, ipsum.</strong>
                                            <p>텍스트를 입력해주세요. 텍스트<span class="mo_br"></span>텍스트를 입력해주세요.텍스트 <span
                                                    class="mo_br"></span>텍스트를 입력해주세요.
                                            </p>
                                        </div>
                                        <div class="deep">
                                            <p>Lorem, ipsum dolor.</p>
                                            <strong>Lorem ipsum dolor sit amet.</strong>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon_wrap" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="icon">
                                            <i class="xi-airplane"></i>
                                        </div>
                                        <div class="txt_box">
                                            <strong>Lorem, ipsum.</strong>
                                            <p>텍스트를 입력해주세요. 텍스트<span class="mo_br"></span>텍스트를 입력해주세요.텍스트 <span
                                                    class="mo_br"></span>텍스트를 입력해주세요.
                                            </p>
                                        </div>
                                        <div class="deep">
                                            <p>Lorem, ipsum dolor.</p>
                                            <strong>Lorem ipsum dolor sit amet.</strong>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon_wrap" data-aos="fade-up" data-aos-duration="1500">
                                        <div class="icon">
                                            <i class="xi-all"></i>
                                        </div>
                                        <div class="txt_box">
                                            <strong>Lorem, ipsum.</strong>
                                            <p>텍스트를 입력해주세요. 텍스트<span class="mo_br"></span>텍스트를 입력해주세요.텍스트 <span
                                                    class="mo_br"></span>텍스트를 입력해주세요.
                                            </p>
                                        </div>
                                        <div class="deep">
                                            <p>Lorem, ipsum dolor.</p>
                                            <strong>Lorem ipsum dolor sit amet.</strong>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
        </section> -->
        <section class="sec sec06">
            <article>
                <div class="content7_wrap container">
                    <div class="ul_box">
                        <ul>
                            <li>
                                <span>Build perfect websites</span>
                                <h2>골뱅이스토어의 다양한 <br>디자인의 웹사이트 구축</h2>
                                <p>
                                텍스트를 입력해주세요 텍스트를 입력해주세요.텍스트를 입력해주세요 텍스트를 입력해주세요
텍스트를 입력해주세요 텍스트를 입력해주세요. 텍스트를 입력해주세요 텍스트를 입력해주세요.
                                </p>
                                <a href="<?php echo G5_URL?>/bbs/board.php?bo_table=list01">VIEW MORE</a>
                            </li>
                            <li><span>Build perfect websites</span>
                                <h2>골뱅이스토어의 다양한 <br>디자인의 웹사이트 구축</h2>
                                <p>
                                텍스트를 입력해주세요 텍스트를 입력해주세요.텍스트를 입력해주세요 텍스트를 입력해주세요
텍스트를 입력해주세요 텍스트를 입력해주세요. 텍스트를 입력해주세요 텍스트를 입력해주세요. 텍스트를 입력해주세요 텍스트를 입력해주세요.
                                </p>
                                <a href="<?php echo G5_URL?>/bbs/board.php?bo_table=list02">VIEW MORE</a>
                            </li>
                            <li><img src="<?php echo G5_THEME_URL?>/img/sub_company04.png" alt="">
                    </div>
                    </li>
                    </ul>
                </div>
            </article>
        </section>
        <section class="sec sec07">
            <article>
                <div class="pj" data-aos="flip-right" data-aos-duration="1500">
                    <h2>새로운 프로젝트를 원하세요?</h2>
                    <p>우리는 귀사의 프로젝트에 대해 듣고 싶습니다.</p>
                    <a href="<?php echo G5_URL?>/bbs/board.php?bo_table=qna">VIEW MORE</a>
                </div>
            </article>
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
    <script>
        $('.question').click(function(){
            $('.answer').not($(this).siblings()).removeClass("on")
            $(this).siblings().toggleClass('on');
        });
    </script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>