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

    </div>
    <div id="main">
        <div class="top-btn">
            <i class="xi-angle-up"></i>

        </div>
        <div id="fullpage">
            <div class="section main-section">
                <div class="main-slick">
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/메인_04.jpg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dt>국내 최대/최다 캠핑카 플랫폼</dt>
                                <dd>전국 50여개 지점과 <br class="mo-br"> 180여대 캠핑카 인프라</dd>
                                <dd>#캠핑카여행 #캠핑카대여 #전국캠핑카</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/메인_03.jpg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dt>전국 어디서나 캠핑여행이 필요할 때</dt>
                                <dd>차놀자캠핑 종합 여행 <br class="mo-br"> 플랫폼 서비스</dd>
                                <dd>#캠핑여행 #캠핑취미 #캠핑레저</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/배너01.jpg')"></div>
                        <div class="main-tit">
                            <dl>
                                <dt>행복한 삶을 위한 여가활동 서비스</dt>
                                <dd>차놀자캠핑의 다양한 여가지원 <br><br class="mo-br"> 서비스는 여유있는 삶을 드립니다</dd>
                                <dd>#전국지점네트워크 #기업형여가서비스</dd>
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
                            <div class="line"></div><span>사업영역</span>
                        </div>
                            <div class="sec1-slick">
                                <div class="_dl">
                                    <dl>
                                        <dt>
                                            캠핑카 기반 종합<br>여행 플랫폼
                                        </dt>
                                        <dd>
                                            차놀자캠핑은 단순한 캠피카 대여 플랫폼이 아닙니다.<br>
                                            캠핑카와 렌터카등 모빌리티 기반의 종합 여행플랫폼입니다.
                                        </dd>
                                        <dd>
                                            캠핑카대여, 캠핑카기반 지역여행패키지, 캠핑장, 캠핑음식 등<br>
                                            캠핑카를 기반하는 종합 여행패키지 상품을 만날 수 있습니다<br>
                                        
                                        </dd>
                                    </dl>
                                    <a href="<?php echo G5_THEME_URL?>/sub/allinone.php"><span>MORE VIEW</span></a>
                                </div>
                                <div class="_dl">
                                    <dl>
                                        <dt>
                                            임직원 복지형<br> 캠핑카 서비스
                                        </dt>
                                        <dd>
                                            차놀자캠핑의 전국 지점 인프라를 바탕으로 기업체의 복지플랜과<br>결합이 가능합니다. 차놀자캠핑카 제휴를 통해 임직원들은<br>어디서나 할인된 가격으로 캠핑카 여행이 가능해집니다.
                                             
                                        </dd>
                                        <dd>
                                            임직원을 위한 차별화된 복지서비스, 지금 바로 차놀자와 상의하세요
                                        </dd>
                                    </dl>
                                    <a href="<?php echo G5_THEME_URL?>/sub/b2b_camp.php"><span>MORE VIEW</span></a>
                                </div>
                                <div class="_dl">
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
                                    <a href="http://chanolja.co.kr/bbs/board.php?bo_table=rv_rental_mng"><span>MORE VIEW</span></a>
                                </div>
                            </div>
                            <div class="progressWrap">
                                <div class="item2">
                                    <h3>캠핑종합여행사</h3>
                                    <span data-slick-index="0" class="progress"></span>
                                </div>
                                <div class="item2">
                                    <h3>기업복지형플랜</h3>
                                    <span data-slick-index="1" class="progress"></span>
                                </div>
                                <div class="item2">
                                    <h3>수익형캠핑카</h3>
                                    <span data-slick-index="2" class="progress"></span>
                                </div>
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

            <div class="section section3 background">
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
                                <dt>지역과 상생하는 Maas형 캠핑여행 패키지</dt>
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


            <div class="section section4 fp-auto-height" >
                <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/main/14.jpg')"></div>
                <div class="sec4-inner">
                    <div class="sec4-tit">
                        <dl>
                            <dd><div class="line"></div>Our News</dd>
                            <dt>대한민국 캠핑카 <br class="mo-br"> 사업의 중심에 있는<br>
                                차놀자 캠핑의 <br class="mo-br"> 소식을 확인하세요.
                            </dt>
                            <dd>
                            차놀자캠핑의 이벤트, 행사 등 다양한 소식을 전해드립니다.<br>
                            건강한 삶을 만들어가는 차놀자 캠핑
                            </dd>
                        </dl>
                        <a href="http://camping.dothome.co.kr/bbs/board.php?bo_table=14"><span>MORE VIEW</span></a>
                    </div>
                    <div class="sec4-contents">
                        <div class="news-tit">
                            <h4>NEWS</h4>
                            <div class="sec4-arrow"></div>
                        </div>
                        <?php echo latest("theme/slider","14",3,100)?>
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