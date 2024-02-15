<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/icofont.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/slick.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <div id="main">
       <div id="fullpage">
            <a href="#" class="fix-btn">
                <p>회사소개서</p>
                <i class="xi-download"></i>
            </a>
            <div class="sec-controll">
                <i class="xi-angle-up fp-up"></i>
                <i class="xi-angle-down fp-down"></i>
            </div>
            <div class="up-btn">
                <i class="xi-angle-up"></i>
            </div>
            <div class="sec section visual" data-anchor="1">
                <?php include_once(G5_PLUGIN_PATH.'/tl_banner/banner.lib.php');?>
                <?php echo banner_str('main_roll', 'main_bg'); ?>
            </div>
            <div class="section sec2" data-anchor="2">
            <div class="sec2-inner">
                <div class="sec2-lt">
                    <div class="txt">
                        <p>
                            골뱅이스토어는<br>
                            <strong>다년간의 경험과<br> 노하우를</strong><br>
                            <strong>바탕으로 최고의</strong><br>
                            <strong>홈페이지를</strong>
                            만듭니다.
                        </p>
                        <a href="#">회사소개 보기</a>
                    </div>
                    <ul>
                        <li>
                            타이틀 01
                            <span class="numb">2021</span>
                        </li>
                        <li>
                            타이틀 02
                            <span class="numb">823+</span>
                        </li>
                        <li>
                            타이틀 03
                            <span class="numb">1996</span>
                        </li>
                        <li>
                            타이틀 04
                            <span class="numb">111+</span>
                        </li>
                    </ul>
                </div>
                <div class="sec2-rt">
                    <video muted="" loop="" playsinline="" autoplay="" data-keepplaying="">
						<source type="video/mp4" src="https://player.vimeo.com/external/430278484.hd.mp4?s=ee886e0d3b43cc6acf15a087d29c610b227ba700&amp;profile_id=174">
					</video>
                </div>
            </div>
        </div>
        <div class="section sec3" data-anchor="3">
            <div class="content-wrap">
                <div class="sec3-inner">
                    <div class="sec3-lt">
                        <div class="sec3-txt">
                                <p>
                                    골뱅이스토어는<br>
                                    <strong>다년간의 경험과<br> 노하우를</strong><br>
                                    <strong>바탕으로 최고의</strong><br>
                                    <strong>홈페이지를</strong>
                                    만듭니다.
                                </p>
                                <a href="#">제품 보기</a>
                        </div>
                    </div>
                </div>
                <div class="sec3-rt">
                    <video muted="" loop="" playsinline="" autoplay="" data-keepplaying="">
                        <source type="video/mp4" src="https://player.vimeo.com/external/430278566.hd.mp4?s=2c381742f05e3908d3e31fab85c77deabd6ec29c&amp;profile_id=174">
                        <p>dfdf</p>
                    </video>    
                </div>
            </div>
        </div>
        <div class="section sec4" data-anchor="4">
            <div class="content-wrap">
                <div class="sec4-inner">
                    <div class="sec4-lt">
                        <div class="sec4-txt">
                                <p>
                                    골뱅이스토어는<br>
                                    <strong>다년간의 경험과<br> 노하우를</strong><br>
                                    <strong>바탕으로 최고의</strong><br>
                                    <strong>홈페이지를</strong>
                                    만듭니다.
                                </p>
                                <a href="#">제품 보기</a>
                        </div>
                    </div>
                </div>
                <div class="sec4-rt">
                        <video muted="" loop="" playsinline="" autoplay="" data-keepplaying="">
                            <source type="video/mp4" src="https://player.vimeo.com/external/430278645.hd.mp4?s=b18f97c015adf6588745d30f7791bc4bfb5fb88f&amp;profile_id=174">
                        </video>
                </div>
            </div>
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
        })

    </script>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');