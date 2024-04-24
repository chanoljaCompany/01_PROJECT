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
                        <!--<div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.mp4')"></div>-->
                        <video id="main_banner_mp4" style="width: 100%; padding: 0px; margin: 0px;" muted autoplay playsinline data-keepplaying src="<?php echo G5_THEME_URL?>/img/common/main_banner.mp4"></video>
                        <div class="main-tit" ">
                            <dl>
                                <dd class="main_dd-one">차놀자<br>렌트카<br>창업 스쿨</dd>
                                <dd class="main_dd-two">차놀자<br>렌트카<br>창업 스쿨</dd>
                            </dl>
                        </div>
                    </div>
                    <div>
                        <!--<div class="bg background" style="background-image:url('<?php echo G5_THEME_URL?>/img/common/main_banner.mp4')"></div>-->
                        <video id="main_banner_mp4" style="width: 100%; padding: 0px; margin: 0px;" muted autoplay playsinline data-keepplaying src="<?php echo G5_THEME_URL?>/img/common/main_banner.mp4"></video>
                        <div class="main-tit" ">
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
                    bottom: 10%;
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
                    background-color: #54C3FE;
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

                .sec_morebtn:hover{
                    background-color: #54C3FE !important;
                    border: 1px solid #54C3FE !important;
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
                    position:relative;
                    max-width: 590px;
                    width:590px;
                    height: 590px;
                    color:#fff;
                    margin: 0 auto;
                    overflow: hidden;
                    box-shadow: 0px 10px 20px -9px rgba(0, 0, 0, 0.5);
                    text-align: center;
                    transition:all 0.4s;
                    background: url(<?php echo G5_THEME_URL?>/img/main/sec1_img.png) center no-repeat;
                    background-size: 100%;
                    border-radius: 20px;
                    cursor: pointer;
                }
                .sec1_card a{
                    color:#fff;
                    text-decoration:none;
                    transition:all 0.2s
                }
                .sec1_card .color-overlay {
                    width: 590px;
                    height: 590px;
                    position: absolute;
                    z-index: 10;
                    top: 0;
                    left: 0;
                    transition: background 0.3s cubic-bezier(0.33, 0.66, 0.66, 1);
                    border-radius: 20px;
                }
                .sec1_card:hover .card-info {
                    opacity: 1;
                    bottom: 170px;
                }
                .sec1_card:hover .color-overlay {
                    background: rgba(64, 84, 94,0.5);
                }
                .sec1_card:hover .title-content{
                    margin-top:170px
                }
                .title-content {
                    text-align: center;
                    margin: 45% 0 0 0;
                    width: 100%;
                    transition:all 0.6s;
                    position:absolute;
                    z-index: 30;
                    top:0;
                    left:0;
                }

                .sec1_card:hover .sec1_card_title:after{

                    width:20%
                }

                .sec1_card h3,h1 {
                    font-size: 1.9em;
                    font-weight: 400;
                    letter-spacing: 1px;
                    margin-bottom: 0;
                    display:inline-block;
                }
                .sec1_card h3 a{
                    text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                    transition:all 0.2s;
                    font-size: 30px;
                }
                .sec1_card h3 a:hover{
                    text-shadow: 0px 8px 20px rgba(0, 0, 0, 0.95);
                }
                .sec1_card_title:after {
                    content: " ";
                    display: block;
                    height: 2px;
                    margin: 20px auto;
                    width:20%;
                    border: 0;
                    background: #54C3FD;
                    transition:all 0.2s

                }

                .intro {
                    width: 170px;
                    margin: 0 auto;
                    color: #ddd;
                    font-style: italic;
                    line-height: 18px;
                }
                .intro a{
                    color: #ddd
                }
                .intro a:hover{
                    text-decoration:underline
                }
                .card-info {
/*
                    card-info {
                        box-sizing: border-box;
                        padding: 0;
                        width: 100%;
                        position: absolute;
                        bottom: -40px;
                        left: 0;
                        margin: 0 auto;
                        padding: 0 50px;
                        font-style: 16px;
                        line-height: 24px;
                        z-index: 20;
                        opacity: 0;
                        transition: bottom 0.64s, opacity 0.63s cubic-bezier(0.33, 0.66, 0.66, 1);
                    }
        */

                    box-sizing: border-box;
                    width: 100%;
                    margin: 0 auto;
                    padding: 0 50px;
                    font-style: 16px;
                    line-height: 24px;
                    opacity: 0;
                    bottom: -40px;
                    left: 0;
                    position: absolute;
                    z-index: 30;
                    transition: bottom 0.64s, opacity 0.63s cubic-bezier(0.33, 0.66, 0.66, 1);
                }

                .card-info a{
                    display:block;
                    width:100px;
                    margin:15px auto;
                    background:#fff;
                    color:#444;
                    padding:3px 10px;
                    border-radius:2px;
                    font-size:0.8em
                }
                .card-info a:hover{
                    background: #54C3FD;
                    color:#fff;
                }
                .card-info a:hover span{
                    filter: brightness(10);
                    opacity:1
                }

                .section1.hide .sec_h3,
                .section1.hide .sec_h1,
                .section1.hide .sec_p,
                .section1.hide .sec_morebtn,
                .section1.hide .sec1-rt{opacity: 0; transform: translateY(100px); }

                .section1 .sec_h3,
                .section1 .sec_h1,
                .section1 .sec_p,
                .section1 .sec_morebtn,
                .section1 .sec1-rt{opacity: 1 ; transform: translateY(0); transition: all 750ms ease-out; }

                .section1 .sec_h1{
                    transition-delay: 300ms;
                }

                .section1 .sec_p{
                    transition-delay: 600ms;
                }

                .section1 .sec_morebtn{
                    transition-delay: 900ms;
                }

                .section1 .sec1-rt{
                    transition-delay: 1200ms;
                }
            </style>

            <div class="section hide section1" style="background: #fff">
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

                            <div class="title-content">
                                <h3 class="sec1_card_title"><a href="#">렌트카 창업 스쿨</a></h3>
                                <div class="intro"> <a href="#">Inspiration</a> </div>
                            </div>
                            <div class="card-info">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim...
                                <a href="#">Read Article<span class="licon icon-arr icon-black"></span></a>
                            </div>
                            <div class="color-overlay"></div>


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

            <style>
                @import url("https://api.fontshare.com/v2/css?f[]=archivo@100,200,300,400,500,600,700,800,900&f[]=clash-display@200,300,400,500,600,700&display=swap");

                :root {
                    --slide-width: min(25vw, 300px);
                    --slide-aspect: 2 / 3;

                    --slide-transition-duration: 800ms;
                    --slide-transition-easing: ease;

                    --font-archivo: "Archivo", sans-serif;
                    --font-clash-display: "Clash Display", sans-serif;
                }

                button {
                    border: none;
                    background: none;
                    cursor: pointer;
                    &:focus {
                        outline: none;
                        border: none;
                    }
                }

                .fp-controlArrow{
                    display: none;
                }

                /* ------------------------------------------------ */
                /* -------------------- SLIDER -------------------- */
                /* ------------------------------------------------ */

                .slider {
                    width: 100%;
                    height: calc(2 * var(--slide-height));
                    display: flex;
                    align-items: center;
                }

                .slider--btn {
                    --size: 40px;

                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    opacity: 0.7;
                    transition: opacity 250ms cubic-bezier(0.215, 0.61, 0.355, 1);
                    z-index: 999;

                    & svg {
                        width: var(--size);
                        height: var(--size);
                        stroke: white;
                    }

                    &:hover {
                        opacity: 1;
                    }
                }

                .slides__wrapper {
                    width: 100%;
                    height: 100%;

                    display: grid;
                    place-items: center;

                    & > * {
                        grid-area: 1 / -1;
                    }
                }

                .slides,
                .slides--infos {
                    width: 100%;
                    height: 100%;

                    pointer-events: none;

                    display: grid;
                    place-items: center;
                    & > * {
                        grid-area: 1 / -1;
                    }
                }


                .fp-slidesContainer{
                    width: 100% !important;
                }

                /* ------------------------------------------------ */
                /* -------------------- SLIDE --------------------- */
                /* ------------------------------------------------ */

                .slide {
                    --slide-tx: 0px;
                    --slide-ty: 0vh;
                    --padding: 0px;
                    --offset: 0;

                    width: var(--slide-width);
                    height: auto;
                    aspect-ratio: var(--slide-aspect);
                    user-select: none;
                    perspective: 800px;

                    transform: perspective(1000px)
                    translate3d(var(--slide-tx), var(--slide-ty), var(--slide-tz, 0))
                    rotateY(var(--slide-rotY)) scale(var(--slide-scale));
                    transition: transform var(--slide-transition-duration)
                    var(--slide-transition-easing);

                    position:relative;
                }

                .slide[data-current] {
                    --slide-scale: 1.2;
                    --slide-tz: 0px;
                    --slide-tx: 0px;
                    --slide-rotY: 0;

                    z-index: 30 !important;
                    pointer-events: auto;
                }


                .slide[data-next] {
                    --slide-tx: calc(1 * var(--slide-width) * 1.07);
                    /*--slide-rotY: -45deg;*/
                    z-index: 10 !important;
                }

                .slide[data-previous] {
                    --slide-tx: calc(-1 * var(--slide-width) * 1.07);
                    /*--slide-rotY: 45deg;*/
                    z-index: 10 !important;
                }

                .slide:not([data-current]) {
                    --slide-scale: 1;
                    --slide-tz: 0;
                    /* --slide-tx: calc(var(--offset) * var(--slide-width) * 1.05); */
                    /* --slide-rotY: calc(var(--dir) * -45deg); */

                    pointer-events: none;
                }

                .slide[data-current] {
                    & .slide--image {
                        filter: brightness(0.8);
                    }
                }

                .slide:not([data-current]) {
                    & .slide--image {
                        filter: brightness(0.5);
                    }
                }

                .slide__inner {
                    --rotX: 0;
                    --rotY: 0;
                    --bgPosX: 0%;
                    --bgPosY: 0%;

                    position: relative;
                    left: calc(var(--padding) / 2);
                    top: calc(var(--padding) / 2);
                    transform-style: preserve-3d;
                    transform: rotateX(var(--rotX)) rotateY(var(--rotY));
                }

                .slide--image__wrapper {
                    position: relative;
                    width: 210px;
                    height: 320px;
                    overflow: hidden;
                }

                .slide--image {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    object-fit: cover;
                    transform: translate(-50%, -50%) scale(1.25)
                    translate3d(var(--bgPosX), var(--bgPosY), 0);
                    transition: filter var(--slide-transition-duration)
                    var(--slide-transition-easing);
                }

                .slide__bg {
                    position: fixed;
                    inset: -20%;
                    background-image: var(--bg);
                    background-size: cover;
                    background-position: center center;

                    z-index: -1;
                    pointer-events: none;

                    transition: opacity var(--slide-transition-duration) ease,
                    transform var(--slide-transition-duration) ease;

                    &::before {
                        content: "";
                        position: absolute;
                        inset: 0;
                    }

                    &::before {
                        background: rgba(0, 0, 0, 0.8);
                        backdrop-filter: blur(8px);
                    }

                    &:not([data-current]) {
                        opacity: 0;
                    }

                    &[data-previous] {
                        transform: translateX(-10%);
                    }

                    &[data-next] {
                        transform: translateX(10%);
                    }
                }

                /* ------------ SLIDE INFO ---------------- */

                .slide-info {
                    --padding: 0px;

                    position: relative;
                    width: var(--slide-width);
                    height: 100%;
                    aspect-ratio: var(--slide-aspect);
                    user-select: none;
                    perspective: 800px;
                    z-index: 100;
                }

                .slide-info[data-current] {
                    & .slide-info--text span {
                        opacity: 1;
                        transform: translate3d(0, 0, 0);
                        transition-delay: 250ms;
                    }
                }

                .slide-info:not([data-current]) {
                    & .slide-info--text span {
                        opacity: 0;
                        transform: translate3d(0, 100%, 0);
                        transition-delay: 0ms;
                    }
                }

                .slide-info__inner {
                    position: relative;
                    left: calc(var(--padding) / 2);
                    top: calc(var(--padding) / 2);
                    width: calc(100% - var(--padding));
                    height: calc(100% - var(--padding));
                    transform-style: preserve-3d;
                    transform: rotateX(var(--rotX)) rotateY(var(--rotY));
                }

                .slide-info--text__wrapper {
                    --z-offset: 45px;

                    position: absolute;
                    height: fit-content;
                    left: -15%;
                    bottom: 15%;
                    transform: translateZ(var(--z-offset));
                    z-index: 2;
                    pointer-events: none;
                }

                .slide-info--text {
                    font-family: var(--font-clash-display);
                    color: #fff;
                    overflow: hidden;

                    & span {
                        display: block;
                        white-space: nowrap;
                        transition: var(--slide-transition-duration) var(--slide-transition-easing);
                        transition-property: opacity, transform;
                    }

                    &[data-title],
                    &[data-subtitle] {
                        font-size: min(3cqw, 2.4rem);
                        font-weight: 800;
                        letter-spacing: 0.2cqw;
                        white-space: nowrap;
                        text-transform: uppercase;
                    }

                    &[data-subtitle] {
                        margin-left: 2cqw;
                        font-size: min(2.2cqw, 1.8rem);
                        font-weight: 600;
                    }

                    &[data-description] {
                        margin-left: 1cqw;
                        font-size: min(1.5cqw, 0.95rem);
                        font-family: var(--font-archivo);
                        font-weight: 300;
                    }
                }

            </style>

            <script>

                // Start
                setup();
                // -------------------------------------------------
                // ------------------ Utilities --------------------
                // -------------------------------------------------

                // Math utilities
                const wrap = (n, max) => (n + max) % max;
                const lerp = (a, b, t) => a + (b - a) * t;

                // DOM utilities
                const isHTMLElement = (el) => el instanceof HTMLElement;

                const genId = (() => {
                    let count = 0;
                    return () => {
                        return (count++).toString();
                    };
                })();

                class Raf {
                    constructor() {
                        this.rafId = 0;
                        this.raf = this.raf.bind(this);
                        this.callbacks = [];

                        this.start();
                    }

                    start() {
                        this.raf();
                    }

                    stop() {
                        cancelAnimationFrame(this.rafId);
                    }

                    raf() {
                        this.callbacks.forEach(({ callback, id }) => callback({ id }));
                        this.rafId = requestAnimationFrame(this.raf);
                    }

                    add(callback, id) {
                        this.callbacks.push({ callback, id: id || genId() });
                    }

                    remove(id) {
                        this.callbacks = this.callbacks.filter((callback) => callback.id !== id);
                    }
                }

                class Vec2 {
                    constructor(x = 0, y = 0) {
                        this.x = x;
                        this.y = y;
                    }

                    set(x, y) {
                        this.x = x;
                        this.y = y;
                    }

                    lerp(v, t) {
                        this.x = lerp(this.x, v.x, t);
                        this.y = lerp(this.y, v.y, t);
                    }
                }

                const vec2 = (x = 0, y = 0) => new Vec2(x, y);

                function tilt(node, options) {
                    let { trigger, target } = resolveOptions(node, options);

                    let lerpAmount = 0.06;

                    const rotDeg = { current: vec2(), target: vec2() };
                    const bgPos = { current: vec2(), target: vec2() };

                    const update = (newOptions) => {
                        destroy();
                        ({ trigger, target } = resolveOptions(node, newOptions));
                        init();
                    };

                    let rafId;

                    function ticker({ id }) {
                        rafId = id;

                        rotDeg.current.lerp(rotDeg.target, lerpAmount);
                        bgPos.current.lerp(bgPos.target, lerpAmount);

                        for (const el of target) {
                            el.style.setProperty("--rotX", rotDeg.current.y.toFixed(2) + "deg");
                            el.style.setProperty("--rotY", rotDeg.current.x.toFixed(2) + "deg");

                            el.style.setProperty("--bgPosX", bgPos.current.x.toFixed(2) + "%");
                            el.style.setProperty("--bgPosY", bgPos.current.y.toFixed(2) + "%");
                        }
                    }

                    const onMouseMove = ({ offsetX, offsetY }) => {
                        lerpAmount = 0.1;

                        for (const el of target) {
                            const ox = (offsetX - el.clientWidth * 0.5) / (Math.PI * 3);
                            const oy = -(offsetY - el.clientHeight * 0.5) / (Math.PI * 4);

                            rotDeg.target.set(ox, oy);
                            bgPos.target.set(-ox * 0.3, oy * 0.3);
                        }
                    };

                    const onMouseLeave = () => {
                        lerpAmount = 0.06;

                        rotDeg.target.set(0, 0);
                        bgPos.target.set(0, 0);
                    };

                    const addListeners = () => {
                        trigger.addEventListener("mousemove", onMouseMove);
                        trigger.addEventListener("mouseleave", onMouseLeave);
                    };

                    const removeListeners = () => {
                        trigger.removeEventListener("mousemove", onMouseMove);
                        trigger.removeEventListener("mouseleave", onMouseLeave);
                    };

                    const destroy = () => {
                        removeListeners();
                        raf.remove(rafId);
                    };

                    return { destroy, update };
                }

                function resolveOptions(node, options) {
                    return {
                        trigger: options?.trigger ?? node,
                        target: options?.target
                            ? Array.isArray(options.target)
                                ? options.target
                                : [options.target]
                            : [node]
                    };
                }

                // -----------------------------------------------------

                // Global Raf Instance
                const raf = new Raf();

                function init() {

                    console.log('init')

                    const slides = [...document.querySelectorAll(".slide")];
                    const slidesInfo = [...document.querySelectorAll(".slide-info")];

                    const buttons = {
                        prev: document.querySelector(".slider--btn__prev"),
                        next: document.querySelector(".slider--btn__next")
                    };

                    slides.forEach((slide, i) => {
                        const slideInner = slide.querySelector(".slide__inner");
                        const slideInfoInner = slidesInfo[i].querySelector(".slide-info__inner");

                        tilt(slide, { target: [slideInner, slideInfoInner] });
                    });

                    buttons.prev.addEventListener("click", change(-1));
                    buttons.next.addEventListener("click", change(1));
                }

                function setup() {
                    const images = document.querySelectorAll("img");
                    let loadedImages = 0;
                    let totalImages = images.length;
                    let progress = {
                        current: 0,
                        target: 0
                    };

                    images.forEach((image) => {
                        if (image.complete) {
                            // 이미지가 이미 로드된 경우
                            loadedImages++;
                        } else {
                            // 이미지가 로드되지 않은 경우 load 이벤트를 기다림
                            image.addEventListener('load', () => {
                                loadedImages++;
                                if (loadedImages === totalImages) {
                                    progress.target = loadedImages / totalImages;
                                    const progressPercent = Math.round(progress.target * 100);
                                    loaderText.textContent = `${progressPercent}%`;
                                    if (progressPercent === 100) {
                                        init();
                                    }
                                }
                            });
                            image.addEventListener('error', () => {
                                // 이미지 로드에 실패한 경우에 대한 처리도 추가할 수 있음
                                console.error('Failed to load image: ', image.src);
                                loadedImages++; // 로드 실패한 이미지도 카운트에 포함하여 전체 카운트를 완료하도록 함
                                if (loadedImages === totalImages) {
                                    progress.target = loadedImages / totalImages;
                                    const progressPercent = Math.round(progress.target * 100);
                                    loaderText.textContent = `${progressPercent}%`;
                                    if (progressPercent === 100) {
                                        init();
                                    }
                                }
                            });
                        }
                    });
                }


                // 페이지 로드 완료 후 이미지 로딩 상태 확인 시작
                window.addEventListener('load', () => {
                    setup();
                    init();
                });

                function change(direction) {

                    console.log('change');

                    return () => {
                        let current = {
                            slide: document.querySelector(".slide[data-current]"),
                            slideInfo: document.querySelector(".slide-info[data-current]"),
                            slideBg: document.querySelector(".slide__bg[data-current]")
                        };
                        let previous = {
                            slide: document.querySelector(".slide[data-previous]"),
                            slideInfo: document.querySelector(".slide-info[data-previous]"),
                            slideBg: document.querySelector(".slide__bg[data-previous]")
                        };
                        let next = {
                            slide: document.querySelector(".slide[data-next]"),
                            slideInfo: document.querySelector(".slide-info[data-next]"),
                            slideBg: document.querySelector(".slide__bg[data-next]")
                        };

                        Object.values(current).map((el) => el.removeAttribute("data-current"));
                        Object.values(previous).map((el) => el.removeAttribute("data-previous"));
                        Object.values(next).map((el) => el.removeAttribute("data-next"));

                        if (direction === 1) {
                            let temp = current;
                            current = next;
                            next = previous;
                            previous = temp;

                            current.slide.style.zIndex = "20";
                            previous.slide.style.zIndex = "30";
                            next.slide.style.zIndex = "10";
                        } else if (direction === -1) {
                            let temp = current;
                            current = previous;
                            previous = next;
                            next = temp;

                            current.slide.style.zIndex = "20";
                            previous.slide.style.zIndex = "10";
                            next.slide.style.zIndex = "30";
                        }

                        const currentSlide = document.querySelector('.slide[data-current]');
                        const slidesContainer = document.querySelector('.slides');

                        if (currentSlide && slidesContainer) {
                            slidesContainer.prepend(currentSlide);
                        }

                        Object.values(current).map((el) => el.setAttribute("data-current", ""));
                        Object.values(previous).map((el) => el.setAttribute("data-previous", ""));
                        Object.values(next).map((el) => el.setAttribute("data-next", ""));
                    };
                }
            </script>

            <style>

                .section2.hide .sec_h3,
                .section2.hide .sec_h1,
                .section2.hide .sec_p,
                .section2.hide .sec_morebtn{opacity: 0; transform: translateY(100px); }

                .section2 .sec_h3,
                .section2 .sec_h1,
                .section2 .sec_p,
                .section2 .sec_morebtn{opacity: 1 ; transform: translateY(0); transition: all 750ms ease-out; }

                .section2 .sec_h1{
                    transition-delay: 300ms;
                }

                .section2 .sec_p{
                    transition-delay: 600ms;
                }

                .section2 .sec_morebtn{
                    transition-delay: 900ms;
                }
            </style>

            <div class="section hide section2" >
                <div class="sec2-inner elm">
                    <div class="sec2-lt">
                        <div>
                            <h3 class="sec_h3" style="color:#fff">RENTAL SERVICE</h3>
                            <h1 class="sec_h1" style="color:#fff">지점 소개</h1>
                            <p class="sec_p" style="color:#fff">전문적인 렌트카 창업 교육으로 여러분의 꿈을 이뤄보세요.  <br>
                                비즈니스 성공을 향한 첫걸음을 차놀자와 함께하세요.
                            </p>
                            <button class="sec_morebtn" style="color:#fff; background-color: unset; border: 2px solid;"><span style="color:#fff">MORE VIEW</span> <i class="fa-solid fa-chevrons-right morebtn_arrow" style="color:#fff"></i> </button>
                        </div>
                    </div>
                    <div class="sec2-rt background">
                        <div class="slider">
                            <button class="slider--btn slider--btn__prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m15 18-6-6 6-6" />
                                </svg>
                            </button>

                            <div class="slides__wrapper">
                                <div class="slides">
                                    <!-- slide 1 -->
                                    <div class="slide" data-current>
                                        <div class="slide__inner">
                                            <div class="slide--image__wrapper" style="right:-16px;">
                                                <img class="slide--image" src="<?php echo G5_THEME_URL?>/img/main/sec2_img1.jpg" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(<?php echo G5_THEME_URL?>/img/main/sec2_img1.jpg); --dir: 0" data-current></div>

                                    <!-- slide 2 -->
                                    <div class="slide" data-next>
                                        <div class="slide__inner">
                                            <div class="slide--image__wrapper">
                                                <img class="slide--image" src="<?php echo G5_THEME_URL?>/img/main/sec2_img3.png" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(<?php echo G5_THEME_URL?>/img/main/sec2_img3.png); --dir: 1" data-next></div>

                                    <!-- slide 3 -->
                                    <div class="slide" data-previous>
                                        <div class="slide__inner">
                                            <div class="slide--image__wrapper" style="right:39px;">
                                                <img class="slide--image" src="<?php echo G5_THEME_URL?>/img/main/sec2_img2.jpg" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(<?php echo G5_THEME_URL?>/img/main/sec2_img2.jpg); --dir: -1" data-previous></div>
                                </div>

                                <div class="slides--infos" style="position:absolute; top:50%; left:50%; z-index:99; transform:translate(-33%, -65%);">
                                    <!-- Slide Info 1 -->
                                    <div class="slide-info" data-current>
                                        <div class="slide-info__inner">
                                            <div class="slide-info--text__wrapper">
                                                <div data-title class="slide-info--text">
                                                    <span>Highlands</span>
                                                </div>
                                                <div data-subtitle class="slide-info--text">
                                                    <span>Scotland</span>
                                                </div>
                                                <div data-description class="slide-info--text">
                                                    <span>The mountains are calling</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide Info 2 -->
                                    <div class="slide-info" data-next>
                                        <div class="slide-info__inner">
                                            <div class="slide-info--text__wrapper">
                                                <div data-title class="slide-info--text">
                                                    <span>Machu Pichu</span>
                                                </div>
                                                <div data-subtitle class="slide-info--text">
                                                    <span>Peru</span>
                                                </div>
                                                <div data-description class="slide-info--text">
                                                    <span>Adventure is never far away</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide Info 3 -->

                                    <div class="slide-info" data-previous>
                                        <div class="slide-info__inner">
                                            <div class="slide-info--text__wrapper">
                                                <div data-title class="slide-info--text">
                                                    <span>Chamonix</span>
                                                </div>
                                                <div data-subtitle class="slide-info--text">
                                                    <span>France</span>
                                                </div>
                                                <div data-description class="slide-info--text">
                                                    <span>Let your dreams come true</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="slider--btn slider--btn__next" style="position:absolute; right:15%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <style>

                /* section3 css */

                .slider_ul {
                    padding-bottom: 20px;
                }

                .slider_li {
                    width:377px; height: 377px; border-radius: 20px; background-color: #fff;
                    display: inline-block;
                    margin-right: 28px;
                    box-shadow: 3px 0px 20px rgba(0, 0, 0, 0.15);
                    cursor: pointer;
                }

                .first_slider_li{
                    background-color: #54C3FD;
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
                    background-color: #54C3FD; /* 스크롤바 색상 */
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
                    transition-delay: 900ms;
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
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
                                    <h3>가상텍스트 가상텍스트</h3>
                                </div>
                                <div class="slider_imgdiv">
                                    <img class="news_icon" src="<?php echo G5_THEME_URL?>/img/main/news_icon2.png"/>
                                </div>
                            </li>

                            <li class="slider_li" >
                                <div>
                                    <h1 class="news_h1">창업 교육</h1>
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
                                <li class="" style="width:377px; height: 377px; border-radius: 20px; background-color: #54C3FD;">
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

        Copyright (c) 2024 by Nodws (https://codepen.io/nodws/pen/edvjdJ)

        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

        Copyright (c) 2024 by Kurtis Young (https://codepen.io/kurtisyoung/pen/zqyYvX)

        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

        Copyright (c) 2024 by Sikriti Dakua (https://codepen.io/dev_loop/pen/MWKbJmO)

        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


    -->

<?php
 include_once(G5_THEME_PATH.'/tail.sub.php');
 ?>