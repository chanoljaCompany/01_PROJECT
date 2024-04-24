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
            <i class="fa-solid fa-chevron-up"></i>

        </div>
        <div id="fullpage">
            <div class="section main-section">
                <div class="main-slick">
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.png')"></div>
                        <div class="main-tit">
                            <dl>
                                <dd class="main_dd-one">국내<br>최대 최다<br>캠핑카 플랫폼</dd>
                                <dd class="main_dd-two">국내<br>최대 최다<br>캠핑카 플랫폼</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.png')"></div>
                        <div class="main-tit">
                            <dl>
                                <dd class="main_dd-one">국내<br>최대 최다<br>캠핑카 플랫폼</dd>
                                <dd class="main_dd-two">국내<br>최대 최다<br>캠핑카 플랫폼</dd>
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
                    </div>
                    <div class="main-controll">
                    </div>
                </div>

                <div class="scroll_ani" style="display: block;">
                    <div></div>
                </div>
            </div>
            <style>
                .black_tit {
                    color: black !important;
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

                /* section1 css */

                .sec1-lt div h3{
                    font-size:36px;
                    color: #54C3F1;

                }

                .sec1-lt div h1{
                    font-size:60px;
                    margin-bottom: 3px;
                    transition-delay: 300ms !important;
                }

                .sec1-lt div p {
                    font-size:18px;
                    margin-bottom:44px;
                    transition-delay: 600ms !important;
                }

                .sec1-rt {
                    transition-delay: 1100ms !important;
                }


                @keyframes slideUpAnimation {
                    from {
                        opacity: 0;
                        transform: translateY(50px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .sec1_li h3 {
                    margin-top:35px;
                    margin-bottom:32px;
                    font-size:25px;
                }

                .sec1_li p {
                    font-size:18px;
                    margin-bottom: 52px;
                }


                .sec1_li div span {
                    font-size:20px;
                    margin-right: 32px;
                }

                .slick-track{
                    width:100%;
                }

                .sec1_div {
                    cursor:pointer;
                    display: flex;
                    align-items: center;
                }

                .sec1_arrow{
                    background: #575757;
                    border-radius: 50%;
                    width: 40px;
                    height:40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .sec1_arrow .fa_arrow{
                    color:#fff;
                    font-size:20px
                }

                .sec1_arrow:hover{
                    background: linear-gradient(123.88deg, #00D9E8 -379.29%, #08C8E7 7.97%, #3673E7 51.03%, #5835E6 128.72%, #6D0EE6 192.47%, #7500E6 579.61%);
                }
                .section1.hide .s1_h3,
                .section1.hide .s1_h1,
                .section1.hide .s1_p,
                .section1.hide .sec1-rt {opacity: 0; transform: translateY(100px); }


                .section1 .s1_h3,
                .section1 .s1_h1,
                .section1 .s1_p,
                .section1 .sec1-rt {opacity: 1 ; transform: translateY(0); transition: all 1000ms ease-out; }

            </style>


            <div class="section hide section1" style="background: #fff">
                <!--
                <div class="" style="display: flex; flex-direction: column; height: 100%; position: relative; top:50%; left:50%; transform: translate(-50%, -35%);">
               -->
                <div class="" style="display: flex; flex-direction: column; height: 100%; justify-content: center;">
                    <div class="sec1-lt" style="width:1200px; margin: 0 auto;">
                        <div style="width:1200px; text-align:center;">
                            <h3 class="s1_h3">BUSINESS</h3>
                            <h1 class="s1_h1">차놀자 캠핑카</h1>
                            <p class="s1_p">
                                차놀자 캠핑은 편리한 예약 시스템과 안전한 이용환경을 제공하여 <br>
                                캠핑여행을 즐기는 이들에게 최고의 서비스를 제공합니다.
                            </p>
                        </div>
                    </div>
                    <div class="sec1-rt" >
                        <div class="sec1_contents">
                            <ul style="display: flex; justify-content: space-around; height:550px; align-items: center;">
                                <li class="sec1_li" >
                                    <img src="<?php echo G5_THEME_URL?>/img/main/main_business_icon1.png"/>
                                    <h3>맞춤 서비스 제공</h3>
                                    <p>
                                        경쟁력 있는 가격 정책과 </br>
                                        유동적인 예약시스템을 통해 </br>
                                        고객들에게 편의를 제공합니다.
                                    </p>
                                    <div class="sec1_div">
                                        <span>회사소개</span>
                                        <div class="sec1_arrow">
                                            <i class="fa-solid fa-chevron-right fa_arrow"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="sec1_li">
                                    <img src="<?php echo G5_THEME_URL?>/img/main/main_business_icon2.png"/>
                                    <h3>맞춤 서비스 제공</h3>
                                    <p>
                                        경쟁력 있는 가격 정책과 </br>
                                        유동적인 예약시스템을 통해 </br>
                                        고객들에게 편의를 제공합니다.
                                    </p>
                                    <div class="sec1_div">
                                        <span>회사소개</span>
                                        <div class="sec1_arrow">
                                            <i class="fa-solid fa-chevron-right fa_arrow"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="sec1_li">
                                    <img src="<?php echo G5_THEME_URL?>/img/main/main_business_icon3.png"/>
                                    <h3>맞춤 서비스 제공</h3>
                                    <p>
                                        경쟁력 있는 가격 정책과 </br>
                                        유동적인 예약시스템을 통해 </br>
                                        고객들에게 편의를 제공합니다.
                                    </p>
                                    <div class="sec1_div">
                                        <span>회사소개</span>
                                        <div class="sec1_arrow">
                                            <i class="fa-solid fa-chevron-right fa_arrow"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .sec2-lt div h3{
                    font-size:36px;
                    color: #fff;
                }

                .sec2-lt div h1{
                    font-size:60px;
                    margin-bottom: 3px;
                    color:#fff;
                }

                .sec2-lt div p {
                    font-size:18px;
                    margin-bottom:44px;
                    color:#fff;
                }

                .sec2_li h3 {
                    margin-top:35px;
                    margin-bottom:32px;
                    font-size:25px;
                }

                .sec2_li p {
                    font-size:18px;
                    margin-bottom: 52px;
                }


                .sec2_li div span {
                    font-size:20px;
                    margin-right: 32px;
                }

                .slick-track{
                    width:100%;
                }

                .sec2_div {
                    cursor:pointer;
                    display: flex;
                    align-items: center;
                }

                .sec_morebtn{
                    background-color: transparent;
                    width: 282px;
                    height: 60px;
                    border: 1px solid #fff;
                    border-radius: 40px;
                    color: #fff;
                    font-size: 18px;
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                }

                .sec_morebtn:hover{
                    transition: none !important;
                    border:1px solid #54C3FE;
                    background-color:#54C3FE;
                }

                .sec_morebtn:not(:hover) {
                    transition: none !important; /* 마우스가 요소에 올라갔다가 떠날 때 트랜지션 제거 */
                }

                .morebtn_arrow {
                    position: relative;
                    right: -2px;
                    animation: 1000ms arrow_ infinite;
                }

                .sec2_li {
                    width: 25%;
                    height: 360px;
                    color: #fff;
                    position: relative;
                    border:1px solid #fff;
                    cursor:pointer;
                }

                .sec2_li::before {
                    content: "";
                    position: absolute;
                    top: 100%; /* 초기에 아래로 숨겨둠 */
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: #54C3FE;
                    transition: top 0.3s ease; /* top 속성 변화에 대한 transition 효과 */
                }


                .sec2_li:hover::before {
                    top: 0; /* 호버 시 위로 올라오는 애니메이션 효과 */
                }

                .sec2_li:hover .sec2_li_lf{
                    opacity: 0;
                    transition: all 2s ease;
                }


                .sec2_li_lf{
                    opacity: 1;
                    width: 100%;
                    height: 100%;
                    backdrop-filter:  blur(10px);
                    transition: all 2s ease;
                    mix-blend-mode: overlay;
                }

                .sec2_li_rf{
                    position: absolute;
                    color:#fff;
                    top:50%;
                    left:50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                }

                .sec2_li_rf p{
                    font-size:25px;
                }

                .sec2_li_rf h1{
                    font-size: 150px;
                    -webkit-text-stroke: 5px #fff;
                }

                .section2.hide .s2_h3,
                .section2.hide .s2_h1,
                .section2.hide .s2_p,
                .section2.hide .sec_morebtn{opacity: 0; transform: translateY(100px); }

                .section2 .s2_h3,
                .section2 .s2_h1,
                .section2 .s2_p,
                .section2 .sec_morebtn{opacity: 1 ; transform: translateY(0); transition: all 750ms ease-out; }

                .section2 .s2_h1{
                    transition-delay: 300ms;
                }

                .section2 .s2_p{
                    transition-delay: 600ms;
                }

                .section2 .sec_morebtn{
                    transition-delay: 900ms;
                }




            </style>

            <div class="section hide section2" style="background-image: url('<?php echo G5_THEME_URL?>/img/common/sec2_banner.png'); background-repeat: no-repeat; height: 100%; background-size: cover;" >
                <div class="" style="display: flex; flex-direction: column; height: 100%; justify-content: center;">
                    <div class="sec2-lt" style="width:1200px; margin: 0 auto;">
                        <div style="width:1200px; text-align:center; align-items: center; display: flex; flex-direction:column; margin-top:15%;">
                            <h3 class="s2_h3">Lorem lpsum</h3>
                            <h1 class="s2_h1">국내 최대 캠핑카 플랫폼</h1>
                            <p class="s2_p">
                                차놀자 캠핑은 편리한 예약 시스템과 안전한 이용환경을 제공하여 <br>
                                캠핑여행을 즐기는 이들에게 최고의 서비스를 제공합니다.
                            </p>
                            <button class="sec_morebtn"><span>MORE VIEW</span> <i class="fa-solid fa-chevrons-right morebtn_arrow"></i> </button>
                        </div>
                    </div>
                    <div class="sec2-rt" >
                        <div class="sec2_contents">
                            <ul style="display: flex; justify-content: space-around; height:360px; align-items: center; width: 100vw; position: absolute; bottom: 0px;  ">

                                <li class="sec2_li" >
                                    <div class="sec2_li_lf">
                                    </div>
                                    <div class="sec2_li_rf">
                                        <p>
                                            대여 가능 캠핑카 </br>
                                            Number of Campervans
                                        </p>
                                        <h1>180</h1>
                                    </div>

                                </li>

                                <li class="sec2_li">
                                    <div class="sec2_li_lf">
                                    </div>
                                    <div class="sec2_li_rf">
                                        <p>
                                            지점 수 </br>
                                            Branch Office
                                        </p>
                                        <h1>50</h1>
                                    </div>
                                </li>
                                <li class="sec2_li">
                                    <div class="sec2_li_lf">
                                    </div>
                                    <div class="sec2_li_rf">
                                        <p>
                                            사업 기간 </br>
                                            Business Story
                                        </p>
                                        <h1>5</h1>
                                    </div>
                                </li>
                                <li class="sec2_li sec2_li_on">
                                    <div class="sec2_li_lf">
                                    </div>
                                    <div class="sec2_li_rf">
                                        <p>
                                            지적재산권 </br>
                                            Intellectual Property
                                        </p>
                                        <h1>13</h1>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <style>

                /* section3 css */
                .fp-slides {
                    width:90%;
                }

                .slider_ul {
                    padding-bottom: 20px;
                }

                .slider_li {
                    width:377px; height: 377px; border-radius: 20px; background-color: #fff;
                    display: inline-block;
                    margin-right: 28px;
                    box-shadow: 3px 0px 20px rgba(0, 0, 0, 0.15);
                }

                .first_slider_li{
                    background-color: #54C3FE;
                    box-shadow: none;
                }

                .slider_li:last-child {
                    margin-right: 0; /* 마지막 요소의 마진을 0으로 설정 */
                }

                .slider_li div {
                    text-align: center;
                }

                .slider_li div h3 {
                    font-size:28px;
                    color:#000;
                    margin-bottom: 127px;
                }

                .first_slider_li div h3{
                    color: #fff;
                }

                .news_h1 {
                    font-size: 50px;
                    color: #000;
                    font-weight: 900;
                    margin-top:45px;
                    margin-bottom: 20px;
                }

                .first_slider_li div h1 {
                    color:#fff;
                }



                .news_icon {
                    width: 74px;
                    margin-right: 21px;
                }

                .slider_imgdiv{
                    text-align: end !important;
                }

                /* 스크롤바 */
                .slider_ul::-webkit-scrollbar {
                    width: 12px; /* 스크롤바 너비 */
                }

                /* 스크롤바 트랙 */
                .slider_ul::-webkit-scrollbar-track {
                    background: #f1f1f1; /* 스크롤바 트랙 색상 */
                }

                /* 스크롤바 색상 */
                .slider_ul::-webkit-scrollbar-thumb {
                    background-color: #54C3FE; /* 스크롤바 색상 */
                }

                /* 마우스를 갖다대었을 때의 스크롤바 색상 */
                .slider_ul::-webkit-scrollbar-thumb:hover {
                    background-color: #3F9AE0; /* 스크롤바 색상 */
                }

                .section3.hide dd,
                .section3.hide dt,
                .section3.hide p,
                .section3.hide ul{opacity: 0; transform: translateY(100px); }

                .section3 dd,
                .section3 dt,
                .section3 p,
                .section3 ul{opacity: 1 ; transform: translateY(0); transition: all 750ms ease-out; }

                .section3 dt{
                    transition-delay: 300ms;
                }

                .section3 p{
                    transition-delay: 600ms;
                }

                .section3 ul{
                    transition-delay: 1100ms;
                }



            </style>



            <div class="section hide section3 two_section background" style="background: #fff;">
                <div class="bg background"></div>
                <div class="sec3-inner " >
                    <div class="sec3-tit">
                        <dl>
                            <dd>NEWS & NOTICE</dd>
                            <dt>새로운 소식을 확인해보세요!</dt>
                        </dl>
                    </div>
                    <div style="display: flex; ">
                        <div style="width:30%; padding-top:20px">
                            <p style="font-size:28px; font-weight: 500;">
                                새로운 소식과 공지를 <br> 빠르게 확인해보세요.
                            </p>
                        </div>
<!--
                        <div class="slider-container">
                                <div class="slide">Slide 1</div>
                                <div class="slide">Slide 2</div>
                                <div class="slide">Slide 3</div>
                            </div>
                        </div>
-->
                        <ul class="slider_ul" style="padding-top:20px; width: 70%; overflow-x: auto; white-space: nowrap; cursor:pointer;">
                            <li class="slider_li first_slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">차놀자 캠핑</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>
                        </ul>
                    </div>
<!--
                        <div class="slide" >
                            <ul>
                                <li class="" style="width:377px; height: 377px; border-radius: 20px; background-color: #54C3FE;">
                                    <div>
                                        <h1 style="font-size: 50px;">창업 교육</h1>
                                        <h3>가상텍스트 가상텍스트</h3>
                                    </div>
                                    <div>
                                        <img src="http://mjcom.dothome.co.kr/theme/basichome/img/main/news_icon.png"/>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        -->
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
    <script>
        function updateFirstVisibleLiClass() {
            var container = document.querySelector('.slider_ul');
            var lis = container.querySelectorAll('.slider_li');

            // 눈에 보이는 영역의 상단과 하단 좌표
            var visibleTop = container.scrollTop;
            var visibleBottom = visibleTop + container.clientHeight;

            var isFirstVisibleLiAdded = false;

            for (var i = 0; i < lis.length; i++) {
                var rect = lis[i].getBoundingClientRect();

                // 요소가 눈에 보이는지 여부 확인
                var isVisible = (rect.top < visibleBottom && rect.bottom > visibleTop);

                // 첫 번째로 눈에 보이는 요소에만 클래스 추가
                if (isVisible && !isFirstVisibleLiAdded) {
                    lis[i].classList.add('first_visible_li');
                    isFirstVisibleLiAdded = true;
                } else {
                    lis[i].classList.remove('first_visible_li');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateFirstVisibleLiClass(); // 페이지 로드 시 실행하여 초기 상태를 설정합니다.
        });

        document.querySelector('.slider_ul').addEventListener('scroll', updateFirstVisibleLiClass);
    </script>


    <script>
        let isMouseDown = false;
        let startX;
        let scrollLeft;

        const sliderUl = document.querySelector('.slider_ul');

        sliderUl.addEventListener('mousedown', (e) => {
            isMouseDown = true;
            sliderUl.classList.add('active');
            startX = e.pageX - sliderUl.offsetLeft;
            scrollLeft = sliderUl.scrollLeft;
        });

        sliderUl.addEventListener('mouseleave', () => {
            isMouseDown = false;
            sliderUl.classList.remove('active');
        });

        sliderUl.addEventListener('mouseup', () => {
            isMouseDown = false;
            sliderUl.classList.remove('active');
        });

        sliderUl.addEventListener('mousemove', (e) => {
            if (!isMouseDown) return;
            e.preventDefault();
            const x = e.pageX - sliderUl.offsetLeft;
            const walk = (x - startX) * 3; // 조절 가능한 스크롤 속도
            sliderUl.scrollLeft = scrollLeft - walk;
        });

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Intersection Observer 생성
            const observer = new IntersectionObserver(handleIntersection, {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            });

            // 감시할 대상 요소 선택
            const sections = document.querySelectorAll('.section');

            // 각 섹션을 감시
            sections.forEach(section => {
                observer.observe(section);
            });

            // 콜백 함수
            function handleIntersection(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const hideElement = entry.target.classList.contains('hide') ? entry.target : null;
                        if (hideElement && hideElement.classList.contains('active')) {
                            hideElement.classList.remove('hide');
                        }
                    }
                });
            }
        });

    </script>




    <!--
        Copyright (c) 2024 by kjoon (https://codepen.io/kjoon/pen/dyYrGBx)

        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

    -->


<?php
 include_once(G5_THEME_PATH.'/tail.sub.php');
 ?>