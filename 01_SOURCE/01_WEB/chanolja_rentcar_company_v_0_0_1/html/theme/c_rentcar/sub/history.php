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
$g5['navTitle'] = "회사소개";
$g5['title'] = "회사연혁";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
</head>
<style>
    

</style>
<body>
    <div class="sub sub01" id="history">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <h1 class="blind">연혁</h1>
            <article class="inner">
                <div class="inner_box">
                    <ul class="history_wrap">
                        <li class="historyBox history_01 active" index="01">
                            <div class="history_left aos-init aos-animate" data-aos="fade-up">
                                <img src="<?php echo G5_THEME_URL?>/img/sub_history01.jpg" alt="" style="max-width:100%">
                                <p></p>
                                <h3>2010-2022</h3>
                            </div>
                            <div class="history_right">
                                <ul class="list">
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2010</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)지에스렌트카 & 오토리스(평택, 대표이사 서경북) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2017</span>
                                        </div>
                                        <div class="info">
                                            <p>디지파츠렌트(용인, 대표이사 정성일) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2018</span>
                                        </div>
                                        <div class="info">
                                            <p class="info_css">(주)한솔렌트카(부평, 대표이사 부수현) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2019</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)지에스렌트카(공주, 대표이사 유길상) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2020</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)지에스렌트카&오토리스(공주, 대표이사 이정숙)</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2020</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)지에스렌트카(수원, 대표이사 공선기) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2020</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)모아렌트카(천안, 대표이사 최냠규) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2020</span>
                                        </div>
                                        <div class="info">
                                            <p>(주)캠버(서울, 대표이사 김영신) ,파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                        <div class="year">
                                            <span>2022</span>
                                        </div>
                                        <div class="info">
                                            <p>차놀자 렌터카 대표 장성민, 파생법인</p>
                                        </div>
                                    </li>
                                    <li class="history_00 history_css aos-init aos-animate" data-aos="fade-up">
                                    </li>
                                    <div class="line">
                                        <span class="bar"></span>
                                    </div>
                                </ul>
                            </div>
                        </li>
                    </ul>
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
    $(function(){
        const HEIGHT = 240;
        let activeHistoryIndex = '01';
        let prevActiveHistoryIndex = '';
        let lastScroll = '0';

        function sumHeight(arr, index) {
            return arr
                .slice(0, index)
                .reduce(function (prev, cur) {
                    return prev += (cur + 5)
                }, 0);
        }

        function getDotIndex(heights) {
            return heights.findIndex(function (height) {
                return height > $('.history_' + activeHistoryIndex).find('.bar').outerHeight();
            });
        }

        function scrollUpEvent() {
            const $prevDot = $('.history_' + prevActiveHistoryIndex).find('.history_00');
            const $nextDot = $('.history_0' + ((prevActiveHistoryIndex * 1) + 1)).find('.history_00');

            $nextDot.removeClass('on');

            if (prevActiveHistoryIndex !== activeHistoryIndex) {
                $prevDot.removeClass('on');
            }
        }

        function scrollDownEvent() {
            const $prevDot = $('.history_' + prevActiveHistoryIndex).find('.history_00');

            if (prevActiveHistoryIndex !== activeHistoryIndex) {
                $prevDot.addClass('on');
            }
        }

        function activeDot() {
            const scrollType = $('body').attr('scroll-type');
            const $dots = $('.history_' + activeHistoryIndex).find('.history_00');
            const dotHeights = $dots
                .toArray()
                .map(function (dot) {
                    return $(dot).outerHeight();
                });

            const heights = dotHeights.map(function (height, index) {
                return height + sumHeight(dotHeights, index);
            });

            let index = getDotIndex(heights);
            const $prevDot = $('.history_' + prevActiveHistoryIndex).find('.history_00');

            const scrollTypeFn = {
                up: scrollUpEvent,
                down: scrollDownEvent
            } [scrollType];

            $dots.removeClass('on');

            scrollTypeFn();

            if (index === -1) {
                $prevDot.addClass('on');
            }

            for (let i = 0; i <= index; i++) {
                $($dots[i]).addClass('on');
            }
        }

        function moveBar() {
            const scrollType = $('body').attr('scroll-type');
            const sTop = $(window).scrollTop();
            const winH = $(window).outerHeight();
            const $el = $('.history_' + activeHistoryIndex);
            const nowScroll = ((sTop + winH - HEIGHT) - $el.offset().top);
            const nowHeight = $el.outerHeight();
            const percent = nowScroll / nowHeight * 100;
            const $bar = $el.find('.bar');

            if (scrollType === 'up' && prevActiveHistoryIndex !== activeHistoryIndex) {
                $('.history_' + prevActiveHistoryIndex).find('.bar').height(0)
                return;
            }

            $bar.height(percent + '%');

            setTimeout(function () {
                activeDot();
            }, 90);
        }

        function scrollEventHandler() {
            const sTop = $(window).scrollTop();
            const winH = $(window).outerHeight();
            const $histories = $('.historyBox');
            let scrollType = 'down';

            prevActiveHistoryIndex = activeHistoryIndex;

            if (lastScroll > sTop) {
                scrollType = 'up';
            }

            $histories.removeClass('active');

            $histories
                .toArray()
                .map(function (historyBox) {
                    const top = $(historyBox).offset().top;
                    const scrollTop = (sTop + winH - HEIGHT);

                    if (top < scrollTop) {
                        $(historyBox).addClass('active');
                        activeHistoryIndex = $(historyBox).attr('index');
                    }

                    if (scrollTop < (scrollTop + 50)) {
                        moveBar();
                    }
                });

            lastScroll = sTop;

            $('body').attr('scroll-type', scrollType);
        }

        $(window).scroll(scrollEventHandler);

        scrollEventHandler();

        AOS.init({
            
            duration: 600, // values from 0 to 3000, with step 50ms
            easing: 'linear',
            offset: 100,
        });


    });
    </script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>