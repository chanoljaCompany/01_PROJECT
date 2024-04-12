<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/footer.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/icofont.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/slick.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/f1ca3de2c6.css" crossorigin="anonymous">

    </div>
    <div id="main">
        <div class="top-btn">
            <i class="xi-angle-up"></i>

        </div>
        <div id="fullpage">
            <div class="section main-section">
                <div class="main-slick">
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.jpeg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dd class="main_dd-one">차놀자<br>렌트카<br>창업 스쿨</dd>
                                <dd class="main_dd-two">차놀자<br>렌트카<br>창업 스쿨</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.jpeg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dd class="main_dd-one">차놀자<br>렌트카<br>창업 스쿨</dd>
                                <dd class="main_dd-two">차놀자<br>렌트카<br>창업 스쿨</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="controll">
                    <div class="progressBarContainer">
                        <div class="item">
                            <h3 class="bar_item_h3"></h3>
                            <span data-slick-index="0" class="progressBar"></span>
                        </div>
                        <div class="item">
                            <h3 class="bar_item_h3"></h3>
                            <span data-slick-index="1" class="progressBar"></span>
                        </div>
                        <!--
                            <div class="item">
                                <h3>03</h3>
                                <span data-slick-index="2" class="progressBar"></span>
                            </div>
                        -->
                    </div>
                    <!--
                    <div class="slick-btn">
                        <div class="pause-btn">
                            <i class="xi-pause"></i>
                        </div>
                        <div class="play-btn">
                            <i class="xi-play"></i>
                        </div>
                    </div>
                    -->
                    <div class="main-controll">
                    </div>
                </div>

                <div class="scroll_ani" style="display: block;">
                    <div></div>
                </div>
            </div>
<!--
            <script>
                let main_tits = document.getElementsByClassName('.menu_tit');
                let two_section = document.querySelector('.two_section');

                for (let i = 0; i < main_tits.length; i++) {
                    if (window.scrollY >= two_section.offsetTop) {
                        main_tits[i].classList.add('menu_white_tit');
                        main_tits[i].classList.remove('menu_black_tit');
                    } else {
                        main_tits[i].classList.remove('menu_white_tit');
                        main_tits[i].classList.add('menu_black_tit');
                    }
                }

            </script>
-->
            <style>

                .menu_white_tit {
                    color: #fff;
                }

                .menu_black_tit {
                    color: black;
                }

                .slick-slide {
                    transition: none !important;
                }

                .bar_item_h3{
                    width:10px;
                    height: 10px;
                    border: 2px solid #fff;
                    background: #fff;
                    border-radius: 100%;
                }

                .scroll_ani {
                    position: absolute;
                    height: 60px;
                    width: 40px;
                    left: 50%;
                    bottom: 8%;
                    border: 2px solid #fff;
                    border-radius: 50px;
                    z-index: 2;
                    transform: translate(-50%, -50%);
                    animation: scrollani_1 5000ms linear infinite;
                }

                .scroll_ani div {
                    width: 5px;
                    margin: 0 auto;
                    height: 5px;
                    background: #fff;
                    border-radius: 100%;
                    margin-top: 5px;
                    animation: scrollani_2 5000ms linear infinite;
                }

                @keyframes scrollani_1 {
                    0% {
                        opacity: 0;
                    }
                    0% {
                        opacity: 0;
                    }
                    42% {
                        opacity: 1;
                    }
                    58% {
                        opacity: 1;
                    }
                    62% {
                        opacity: 0;
                    }
                    100% {
                        opacity: 0;
                    }
                }

                @keyframes scrollani_2 {
                    0% {
                        margin-top: 5px;
                    }
                    42% {
                        margin-top: 5px;
                    }
                    46% {
                        margin-top: 5px;
                    }
                    54% {
                        margin-top: 15px;
                    }
                    58% {
                        margin-top: 21px;
                    }
                    100% {
                        margin-top: 21px;
                    }
                }

                .sec_h3{
                    font-size: 36px;
                    font-weight: 600;
                }

                .sec_h1{
                    font-size:72px;
                    font-weight: 900;
                    margin-top:3px;
                    margin-bottom:9px;
                }

                .sec_p {
                    font-size: 18px;
                    font-weight: 500;
                    margin-bottom: 40px
                }

                .sec_morebtn{
                    background-color: #54C3FD;
                    width: 282px;
                    height: 60px;
                    border: none;
                    border-radius: 40px;
                    color: #fff;
                    font-size: 18px;
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                }

                .morebtn_arrow {
                    position: relative;
                    right: -2px;
                    animation: 1000ms arrow_ infinite;
                }

                @keyframes arrow_ {
                    0% {
                        opacity: 0;
                        right: 5px;
                    }
                    100% {
                        opacity: 1;
                        right: -5px;
                    }
                }

                .sec1_card {
                    max-width: 590px;
                    width:100%;
                    height: 590px;
                    color:#fff;
                    margin: 0 auto;
                    overflow: hidden;
                    box-shadow: 0px 10px 20px -9px rgba(0, 0, 0, 0.5);
                    text-align: center;
                    transition:all 0.4s;
                    background: url(<?php echo G5_THEME_URL?>/img/main/sec1_img.png) center no-repeat;
                    background-size: 100%;
                }
            </style>

            <div class="section section1">
                <div class="sec1-inner">
                    <div class="sec1-lt">
                        <div>
                            <h3 class="sec_h3">RENTAL SERVICE</h3>
                            <h1 class="sec_h1">렌트카 창업 스쿨</h1>
                            <p class="sec_p">전문적인 렌트카 창업 교육으로 여러분의 꿈을 이뤄보세요.  <br>
                                비즈니스 성공을 향한 첫걸음을 차놀자와 함께하세요.
                            </p>
                            <button class="sec_morebtn"><span>MORE VIEW</span> <i class="fa-solid fa-chevrons-right morebtn_arrow"></i> </button>
                        </div>

                    </div>
                    <div class="sec1-rt">
                        <div class="sec1_card">

                            <!--<img style="max-width:590px; transition: all 0.4s"  src="<?php echo G5_THEME_URL?>/img/main/sec1_img.png" alt="sec1">-->
                            <!--
                            <div class=""></div>
                            <h3><a href="#">10 inspiring photos</a></h3>
                                <div class="intro"> <a href="#">Inspiration</a> </div>
                                -->
                        </div>
                        <!--
                            <div class="card-info">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim...
                                <a href="#">Read Article<span class="licon icon-arr icon-black"></span></a>
                            </div>
                        -->

                    </div>
                </div>
            </div>

            <div class="section section2">
                <div class="sec2-inner elm">
                    <div class="sec2-lt">
                        <div class="sec2-con">
                            <dl>
                                <dd><div class="line"></div>사업 역량</dd>
                                <dt>대한민국 최초, <br>&nbsp;&nbsp;&nbsp;&nbsp;최대 캠핑카 플랫폼</dt>
                                <dd> 차놀자 캠핑은 대한민국에서 최초로 캠핑카 대여플랫폼 사업을<br>
                                    시작한 건실한 사업자입니다.</dd>
                            </dl>
                            <a href="<?php echo G5_THEME_URL?>/sub/ch-company.php"><span>MORE VIEW</span></a>

                            <ul class="sec2-contents">
                                <li>
                                    <i class="icofont-chart-growth"></i>
                                    <p class="num" data-rate="180">0</p>
                                    <dl>
                                        <dt>대여가능 캠핑카</dt>
                                        <dd>Number of Campervans</dd>
                                    </dl>
                                </li>
                                <li>
                                    <i class="icofont-bulb-alt"></i>
                                    <p class="num" data-rate="50">0</p>
                                    <dl>
                                        <dt>지점수</dt>
                                        <dd>Branch office</dd>
                                    </dl>
                                </li>
                                <li>
                                    <i class="icofont-beaker"></i>
                                    <p class="num" data-rate="5">0</p>
                                    <dl>
                                        <dt>사업기간</dt>
                                        <dd>Business Story</dd>
                                    </dl>
                                </li>
                                <li>
                                    <i class="icofont-badge"></i>
                                    <p class="num" data-rate="13">0</p>
                                    <dl>
                                        <dt>지적재산권</dt>
                                        <dd>Intellectual Property</dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sec2-rt background"></div>
                </div>
            </div>

            <div class="section section3 two_section background">
                <div class="bg background"></div>
                <div class="sec3-inner">
                    <div class="sec3-tit">
                        <dl>
                            <dd><div class="line"></div>사업 비전</dd>
                            <dt>ESG & 모빌리티 기반 <br class="mo-br">
                            Maas형 여행 플랫폼</dt>
                            <dd>
                                캠핑문화 활성화 및 정착을 위해 끊임없이 연구하고 활동하며,<br>
                                건강한 미래 발전을 위하여 차놀자 캠핑이 노력합니다.
                            </dd>
                        </dl>
                    </div>
                    <ul class="sec3-contents">
                        <li>
                            <!-- <i class="icofont-dna"></i> -->
                            <dl>
                                <dt>친환경 전기캠핑카</dt>
                                <dd>차놀자캠핑은 전국최초 마사다 전기차 캠핑카 개발 및 운영 등 친환경 실현을 위한 캠핑문화 활성화에 기여하고 있습니다.</dd>
                            </dl>
                        </li>
                        <li>
                           <!-- <i class="icofont-dna"></i> -->
                            <dl>
                                <dt>ESG실현</dt>
                                <dd>친환경캠핑카개발, 쓰레기버리지않기, 환경보호하기등 다양한 캠페인을 통해 캠핑카 여행사의 ESG실현을 선도하고 있습니다</dd>
                            </dl>
                        </li>
                        <li>
                           <!-- <i class="icofont-dna"></i> -->
                            <dl>
                                <dt>Maas형 캠핑여행 패키지</dt>
                                <dd>대중교통 및 지역관광상품과 연계를 통해 캠핑카와 결합된 관광상품을 개발하고 지역발전에 이바지 하고 있습니다.</dd>
                            </dl>
                        </li>
                        <li>
                            <!-- <i class="icofont-dna"></i> -->
                            <dl>
                                <dt>관련기술개발사업</dt>
                                <dd>단순 플랫폼 사업이 아닌 관련 기술에 대한 끊임없는 연구와 기술발전을 통해 발전하는 캠핑여행문화에 기여하고 있습니다.</dd>
                            </dl>
                        </li>
                    </ul>
                    <div class="sec3-mo-dot"></div>
                </div>
            </div>

            <?php include_once(G5_THEME_PATH.'/tail.php'); ?>

            <div class="section fp-auto-height">
                
            </div>
        </div>
    </div>

    <script src="<?php echo G5_THEME_URL?>/js/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="<?php echo G5_THEME_URL?>/js/main.js"></script>
    <script src="<?php echo G5_THEME_URL?>/js/slick.js"></script>
    <script src="<?php echo G5_THEME_URL?>/js/slick.min.js"></script>
    <script src="<?php echo G5_THEME_URL?>/js/common.js"></script>
    <script>
        AOS.init({
         duration: 1200,
        });
    </script>
    
<?php
 include_once(G5_THEME_PATH.'/tail.sub.php');
 ?>