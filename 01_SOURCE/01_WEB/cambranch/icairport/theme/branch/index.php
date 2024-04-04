<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    // include_once(G5_THEME_PATH.'/index.php');
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

    </div>
    <div id="main">
        <div class="top-btn">
            <i class="xi-angle-up"></i>

        </div>
        <div id="fullpage">
            <div class="section main-section">
                <div class="main-slick">
                    <div>
                        <!--
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner1.jpg')"></div>
                        -->
                        <video style="width: 100vw; padding: 0px; margin: 0px;" muted autoplay playsinline loop data-keepplaying src="<?php echo G5_THEME_URL?>/img/common/main_banner_mp4.mp4"></video>
                        <div class="main-tit">
                            <dl>
                                <dt>국내 최대/최다 캠핑카 플랫폼</dt>
                                <dd>전국 50여개 지점과 <br class="mo-br"> 180여대 캠핑카 인프라</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner2.jpg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dt>수도권에서 가장 가까운 캠핑카 여행</dt>
                                <dd>차놀자 인천공항지점 <br class="mo-br"> 캠핑카 토탈 서비스</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner3.jpg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dt>캠핑여행을 위한 최신 캠핑카보유</dt>
                                <dd>최고의 옵션을 가진 캠핑카가<br class="mo-br"> 여러분을 기다립니다.</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="controll">
                    <div class="progressBarContainer">
                            <div class="item">
                                <h3>01</h3>
                                <span data-slick-index="0" class="progressBar"></span>
                            </div>
                            <div class="item">
                                <h3>02</h3>
                                <span data-slick-index="1" class="progressBar"></span>
                            </div>
                            <div class="item">
                                <h3>03</h3>
                                <span data-slick-index="2" class="progressBar"></span>
                            </div>
                    </div>
                    <div class="slick-btn">
                        <div class="pause-btn">
                            <i class="xi-pause"></i>
                        </div>
                        <div class="play-btn">
                            <i class="xi-play"></i>
                        </div>
                    </div>
                    <div class="main-controll">
                    </div>
                </div>
            </div>



            <div class="section section1">
                <div class="sec1-inner">
                    <div class="sec1-lt">
                        <div>
                            <img src="<?php echo G5_THEME_URL?>/img/main/Product_01.jpg" alt="sec1">
                        </div>
                        <div>
                            <img src="<?php echo G5_THEME_URL?>/img/main/Product_02.jpg" alt="sec1">
                        </div>
                        <div>
                            <img src="<?php echo G5_THEME_URL?>/img/main/Product_03.jpg" alt="sec1">
                        </div>
                    </div>
                    <div class="sec1-rt">
                        <div class="category">
                            <div class="line"></div><span>차놀자캠핑 서비스</span>
                        </div>
                            <div class="sec1-slick">
                                <div class="_dl">
                                    <dl>
                                        <dt>
                                            캠핑여행을 위한<br>지점 보유 캠핑카
                                        </dt>
                                        <dd>
                                            꿈에 그리던 캠핑카 여행, 어려우신가요?.<br>
                                            차놀자캠핑과 만나면 다양한 서비스를 통해 캠핑카 여행이 쉬워집니다.
                                        </dd>
                                        <dd>
                                            캠핑카대여, 캠핑용품, 캠핑음식, 캠핑장 정보 등<br>
                                            차별화된 차놀자 캠핑만의 서비스를 받아 보세요<br>
                                        
                                        </dd>
                                    </dl>
                                    <a href="http://cambranch.dothome.co.kr/BRANCH/icairport/bbs/board.php?bo_table=carlist"><span>MORE VIEW</span></a>
                                </div>
                                <div class="_dl">
                                    <dl>
                                        <dt>
                                            캠핑카 여행을 위한<br>다양한 부가서비스
                                        </dt>
                                        <dd>
                                            캠핑카여행을 위한 다양한 캠핑용품과<br>장작, 숯등일 준비되어 있습니다<br>이제 먹을것만 챙기면 됩니다.
                                             
                                        </dd>
                                        <dd>
                                            편리한 캠핑카여행을 떠나볼까요/
                                        </dd>
                                    </dl>
                                    <a href="http://cambranch.dothome.co.kr/BRANCH/icairport/theme/branch/sub/goods_info.php"><span>MORE VIEW</span></a>
                                </div>
                                <!--<div class="_dl">
                                    <dl>
                                        <dt>
                                            수익형 캠핑카 
                                        </dt>
                                        <dd>
                                            1년에 몇 번 안타는 캠핑카 때문에 고민이신가요?<br>억 대의 캠핑카 구매에 망설이시나요?
                                        </dd>
                                        <dd>
                                            차놀자 캠핑의 수익형 위탁운영 서비스는 고민을 해결합니다.<br>
                                            차놀자 캠핑 본사의 홍보마케팅 정책과, 전국 인프라를 바탕으로<br>
                                            필요한 곳에 위탁운영을 실시하여 수익을 안겨드립니다.
                                        </dd>
                                    </dl>
                                    <a href="<?php echo G5_THEME_URL?>/sub/sub/sandbox.php"><span>MORE VIEW</span></a>
                                </div> -->
                            </div>
                            <div class="progressWrap">
                                <div class="item2">
                                    <h3>대여가능 캠핑카</h3>
                                    <span data-slick-index="0" class="progress"></span>
                                </div>
                                <div class="item2">
                                    <h3>캠핑용품 등 </h3>
                                    <span data-slick-index="1" class="progress"></span>
                                </div>
                                <!--<div class="item2">
                                    <h3>수익형캠핑카</h3>
                                    <span data-slick-index="2" class="progress"></span>
                                </div> -->
                                <div class="sec1-controll">
                                    <div class="sec1-pause">
                                        <i class="xi-pause"></i>
                                    </div>
                                    <div class="sec1-play">
                                        <i class="xi-play sec1-play"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="section section2">
                <div class="sec2-inner elm">
                    <div class="sec2-lt">
                        <div class="sec2-con">
                            <dl>
                                <dd><div class="line"></div>믿을 수 있는 차놀자 캠핑 네트워크</dd>
                                <dt>대한민국 최초, <br>&nbsp;&nbsp;&nbsp;&nbsp;최대 캠핑카 플랫폼</dt>
                                <dd> 차놀자 캠핑은 대한민국에서 최초로 캠핑카 대여플랫폼 사업을<br>
                                    시작한 믿을 수 있는 인프라입니다.</dd>
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


            <div class="section section4 fp-auto-height" >
                <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/main/14.jpg')"></div>
                <div class="sec4-inner">
                    <div class="sec4-tit">
                        <dl>
                            <dd><div class="line"></div>Real 후기</dd>
                            <dt>백문이 불여일견! <br class="mo-br"> 생생한 고객후기를<br>
                                통해 캠핑카 여행을 <br class="mo-br">계획해 볼까요?
                            </dt>
                            <dd>
                            차놀자 캠핑카를 통해 여행하신 실제 고객님들의.<br>
                            생생한 고객 후기 입니다.
                            </dd>
                        </dl>
                        <a href="http://cambranch.dothome.co.kr/BRANCH/icairport/bbs/board.php?bo_table=replay"><span>MORE VIEW</span></a>
                    </div>
                    <div class="sec4-contents">
                        <div class="news-tit">
                            <h4>고객후기</h4>
                            <div class="sec4-arrow"></div>
                        </div>
                        <?php echo latest("theme/slider","replay",3,100)?>
                    </div>
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