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
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">/*<![CDATA[*/
        document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>

    <style>
        @media screen and (max-width: 400px) {
            .main-slick div:nth-child(1) .bg {
                background-image: url('<?php echo G5_THEME_URL?>/img/mainbanner1_mobile.png') !important;
            }
            .main-slick div:nth-child(2) .bg {
                background-image: url('<?php echo G5_THEME_URL?>/img/mainbanner2_mobile.png') !important;
            }
            .main-slick div:nth-child(3) .bg {
                background-image: url('<?php echo G5_THEME_URL?>/img/mainbanner3_mobile.png') !important;
            }
        }

        center{
            margin-top: 60px;
        }
    </style>


    </div>
    <div id="main">
        <div class="top-btn">
            <i class="xi-angle-up"></i>

        </div>
        <div id="fullpage">
            <div class="section main-section">
                <div class="main-slick">
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/mainbanner1.jpeg')">							
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/mainbanner2.jpeg')">
                        </div>
                    </div>
                    <div>
                        <div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/mainbanner3.jpeg')">
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




<!-- main #1 -->

            <div class="section section1">
				<center>

                 <h2 style="word-break: auto-phrase;">고객이 원하는 차량을 시간만큼, 고객이 필요한 <span>모든 렌터카 서비스</span> 제공  </h2>

<br>
<br>
<br>

 				</center>
                <div class="sec1-inner">
                     <div class="sec1-lt">
                        <div>

                        <img src = "<?php echo G5_THEME_URL?>/img/main/section1_left.jpg">                                       
                        </div>
                    </div>
                    <div class="sec1-rt">
                        <div class="category">
	
                        </div>
                            <div class="sec1-slick">
                                <div class="_dl">
                                    <dl>
                                     <img src = "<?php echo G5_THEME_URL?>/img/main/section1_img.png" style="width : 100%;">                                       

                                    </dl>
									<center>
                                    <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php"><h3>일반렌트카 문의</h3></a>
									</center>
                                </div>
                            </div>

						
                    </div>
                </div>
            </div>




<!-- main #2 -->

            <div class="section section2">
				<center>

                 <h2 style="word-break: auto-phrase;">렌터카 창업! <span>차놀자 렌트카</span>와 함께하세요.</h2>

<br>
<br>
<br>

 				</center>
                <div class="sec2-inner" style="width:100%; flex-wrap: wrap;">
                     <div class="sec2-lt" style="position : static; padding: 10px; max-width: 620px;">
                        <div>

                            <img src = "<?php echo G5_THEME_URL?>/img/main/sec2-lt.png" style="border-radius:10px; max-width : 600px; width:100%;">
                            <div style="    display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                margin-top: 20px;">
                                    <div style="font-size: 30px; font-weight: bold; margin-bottom: 20px; text-align: center">GROW TOGETHER!</div>
                                    <div style="font-size: 20px; text-align: center;">
                                        <div>본사의 이익은 중요하지 않습니다.</div>
                                        <div>오직 고객과 지점 그리고 본사가 함께 상생하는 것이</div>
                                        <div>우리의 사명입니다.</div>
                                    </div>
                                </div>
                            </div>
                    </div>

	                  <div class="sec2-rt" style="position : static; opacity: 1; padding: 10px; max-width: 620px;">
                        <div>

                            <img src = "<?php echo G5_THEME_URL?>/img/main/sec2-rt.png" style="border-radius:10px; max-width : 600px; width : 100%;">
                            <div style="    display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                margin-top: 20px;">
                                <div style="font-size: 30px; font-weight: bold; margin-bottom: 20px; text-align: center;">렌터카 창업 자동차 <span style="font-size: 30px;">토탈 플랫폼 차놀자</span>와 함께 하세요.</div>
                                <div style="font-size: 20px; text-align: center">
                                    <div>이제는 자동차도 공유의 시대!</div>
                                    <div>자동차라는 한 가지 아이템으로 소자본 창업이 가능하며</div>
                                    <div>자동차 판매/렌트 25년 경력의 노하우를 가진 차놀자와 함께 성장하세요!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

					<!--
                    <div class="sec2-rt">
                        <div class="category">
	
                        </div>
                            <div class="sec2-slick">
                                <div class="_dl">
                                    <dl>
                                     <img src = "<?php echo G5_THEME_URL?>/img/main/sec2-rt.jpg">                                       

                                    </dl>

                                </div>
                            </div>

						
                    </div>
                </div>
													<center>
                                    <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php"><h3>일반렌트카 문의</h3></a>
									</center>
-->
            </div>


            <div class="section section4">
				<center>


<br>
<br>
<br>

 				</center>
                <div class="sec4-inner" style="    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;">
                     <div class="sec4-lt" >
                        <div>
						
                        <h2><span>사고대차,</span><br>이제 여러분이<br>선택하세요.  </h2>

						<h1>아직도, 사고시에 보험사를 통해 차량을 바도 계시나요?<br>몇일을 사용해도 고객님의 조건에 맞는 렌트카를 선택해 보세요.<br>

                                 <a href="<?php echo G5_THEME_URL?>/sub/jw-business2.php" style="width: 100%; max-width: 300px;"><h3>지금 바로 상담 <br> 041-522-7000</h3></a>
                        </h1>
                        </div>
                    </div>
                    <div class="sec4-rt">
                        <div class="category">
	
                        </div>
                            <div class="sec4-slick">
                                <div class="_dl">
                                    <dl>
                                     <img src = "<?php echo G5_THEME_URL?>/img/main/sec4-img.png" style="width: 100%; max-width: 600px; border-radius: 10px;">

                                    </dl>

                                </div>
                            </div>

						
                    </div>
                </div>
            </div>


			<!-- main #5 -->
            <div class="section section5">
				<center>


<br>
<br>
<br>

 				</center>
                <div class="sec5-inner" style="    
                    width: 100%;
                    max-width: 1240px;
                    flex-wrap: wrap;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;"
                >
                    <div class="sec5-rt" style="
    max-width: 960px;
    min-width: 320px;">
                        <div class="category">
    
                        </div>
                        <div class="sec5-slick">
                            <div class="_dl">
                                <dl>
                                <img src = "<?php echo G5_THEME_URL?>/img/main/sec5-img.png" style="min-width : 320px; max-width:600px; width:100%; border-radius: 10px;">

                                </dl>

                            </div>
                        </div>
                    </div>
                     <div class="sec5-lt" style="
    max-width: 960px;
    min-width: 320px;">
                        <div>
						
                            <h2>캠핑카 여행도 이제<br><span>합리적인 가격</span>의<br><span>렌터카</span>로 떠날 수 있습니다.  </h2>
						    <h1>캠핑카구매, 개조, 렌트, 수익형 렌트, 캠핑장 예약 등<br>모든 캠핑여행 서비스가 한 곳에서!
                                <a href="http://www.chanolja.co.kr/" style="width: 100%; max-width: 300px;" ><h3>캠핑카 예약하기</h3></a>
                            </h1>
                        </div>
                    </div>

                </div>
            </div>

			<!-- main #6 -->

    <script>
      $(document).ready(function(){
        $(".slider").bxSlider();
      });
    </script>
			
                    
    <div class="section section6" style="position: relative">
				<center>

                 <h2 style="word-break: auto-phrase;">차놀자가 여러분께 이야기 드립니다.</h2>
                </center>
                      
                <div class="sec6-inner" style="width:100%; flex-wrap: wrap;">


                     <div class="sec6-lt" style="position : static">
                        <div>
                            <?php echo latest('theme/basic_news', 'notice', 4, 100);  ?>
                        </div>
                     </div>

                    <div class="sec6-rt" style="position : static">
                        <div>
                            <?php echo latest('theme/basic_news', 'news', 4, 100);  ?>
                        </div>
                    </div>

                </div>
        <div class="slider" style="max-width : 100%">
            <div><img src="<?php echo G5_THEME_IMG_URL ?>/mnkim/bt_banner.jpg" style="width: 100%; position: relative; left: 0px; bottom: 0px;" > </div>
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
<style>
    body {
        word-break:auto-phrase;
    }
</style>
