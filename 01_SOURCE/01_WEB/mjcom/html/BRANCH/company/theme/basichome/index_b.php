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
                    border-radius: 20px;
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
                    background: #54C3FE;
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
                    background: #54C3FE;
                    color:#fff;
                }
                .card-info a:hover span{
                    filter: brightness(10);
                    opacity:1
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
                /* section2 css */
                @import url("https://api.fontshare.com/v2/css?f[]=archivo@100,200,300,400,500,600,700,800,900&f[]=clash-display@200,300,400,500,600,700&display=swap");

                /* ------------------------------------------------ */
                /* -------------------- SLIDER -------------------- */
                /* ------------------------------------------------ */

                .slider {
                    width: calc(3 * var(--slide-width));
                    height: calc(2 * var(--slide-height));
                    display: flex;
                    align-items: center;
                }

                .fp-controlArrow {
                    display: none;
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
                }

                .slide[data-current] {
                    --slide-scale: 1.2;
                    --slide-tz: 0px;
                    --slide-tx: 0px;
                    --slide-rotY: 0;

                    pointer-events: auto;
                }

                .slide[data-next] {
                    --slide-tx: calc(1 * var(--slide-width) * 1.07);
                    --slide-rotY: -45deg;
                }

                .slide[data-previous] {
                    --slide-tx: calc(-1 * var(--slide-width) * 1.07);
                    --slide-rotY: 45deg;
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
                    width: calc(100% - var(--padding));
                    height: calc(100% - var(--padding));
                    transform-style: preserve-3d;
                    transform: rotateX(var(--rotX)) rotateY(var(--rotY));
                }

                .slide--image__wrapper {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                }
                */
                .slide--image {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transform: translate(-50%, -50%) scale(1.25)
                    translate3d(var(--bgPosX), var(--bgPosY), 0);
                    transition: filter var(--slide-transition-duration)
                    var(--slide-transition-easing);
                }
                /*
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
                */
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


                /* ------------------------------------------- */
                /*
                                .support {
                                    position: absolute;
                                    right: 10px;
                                    bottom: 10px;
                                    padding: 10px;
                                    display: flex;
                                    a {
                                        margin: 0 10px;
                                        color: #fff;
                                        font-size: 1.8rem;
                                        backface-visibility: hidden;
                                        transition: all 150ms ease;
                                        &:hover {
                                            transform: scale(1.1);
                                        }
                                    }
                                }

                 */
            </style>

            <script>
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

                export function tilt(node, options) {
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



                function change(direction) {
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

                        Object.values(current).map((el) => el.setAttribute("data-current", ""));
                        Object.values(previous).map((el) => el.setAttribute("data-previous", ""));
                        Object.values(next).map((el) => el.setAttribute("data-next", ""));
                    };
                }
            </script>

            <div class="section section2" style="background-image: url('http://mjcom.dothome.co.kr/theme/basichome/img/main/sec2_backimg.png')">
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
                                            <div class="slide--image__wrapper">
                                                <img class="slide--image" src="https://source.unsplash.com/Z8dtTatMVMw" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(https://source.unsplash.com/Z8dtTatMVMw); --dir: 0" data-current></div>

                                    <!-- slide 2 -->
                                    <div class="slide" data-next>
                                        <div class="slide__inner">
                                            <div class="slide--image__wrapper">
                                                <img class="slide--image" src="https://source.unsplash.com/9dmycbFE7mQ" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(https://source.unsplash.com/9dmycbFE7mQ); --dir: 1" data-next></div>

                                    <!-- slide 3 -->
                                    <div class="slide" data-previous>
                                        <div class="slide__inner">
                                            <div class="slide--image__wrapper">
                                                <img class="slide--image" src="https://source.unsplash.com/m7K4KzL5aQ8" alt="Image 1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide__bg" style="--bg: url(https://source.unsplash.com/m7K4KzL5aQ8); --dir: -1" data-previous></div>
                                </div>
                                <div class="slides--infos">
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

                            <button class="slider--btn slider--btn__next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </button>
                        </div>

                        <div class="support">
                            <a href="https://twitter.com/DevLoop01" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                                </svg>
                            </a>
                            <a href="https://github.com/devloop01/voyage-slider" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
                                    <path d="M9 18c-4.51 2-5-2-7-2" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <style>

                /* section3 css */
                <!--
                .fp-slides {
                    width:70%;
                }
                -->

                .slider_li {
                    width:377px; height: 377px; border-radius: 20px; background-color: #54C3FE;
                }

                .slider_li div h1 {
                    font-size:50px;
                }

                .slider_li div h3 {
                    font-size:28px;
                }

            </style>
            <div class="section section3 two_section background">
                <div class="bg background"></div>
                <div class="sec3-inner">
                    <div class="sec3-tit">
                        <dl>
                            <dd>NEWS & NOTICE</dd>
                            <dt>새로운 소식을 확인해보세요!</dt>
                        </dl>
                    </div>
                    <div style="display: flex; ">
                        <div style="width:30%;">
                            <p>
                                가상 텍스트 가상 텍스트 <br> 가상 텍스트 가상 텍스트
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
                        <div style="width: 70%; ">
                            <ul style="display: flex; flex-wrap: nowrap;">
                                <li class="slider_li" >
                                    <div>
                                        <h1 style="font-size: 50px;">창업 교육</h1>
                                        <h3>가상텍스트 가상텍스트</h3>
                                    </div>
                                    <div>
                                        <img src="http://mjcom.dothome.co.kr/theme/basichome/img/main/news_icon.png"/>
                                    </div>
                                </li>

                                <li class="slider_li" >
                                    <div>
                                        <h1 style="font-size: 50px;">창업 교육</h1>
                                        <h3>가상텍스트 가상텍스트</h3>
                                    </div>
                                    <div>
                                        <img src="http://mjcom.dothome.co.kr/theme/basichome/img/main/news_icon.png"/>
                                    </div>
                                </li>

                                <li class="slider_li" >
                                    <div>
                                        <h1 style="font-size: 50px;">창업 교육</h1>
                                        <h3>가상텍스트 가상텍스트</h3>
                                    </div>
                                    <div>
                                        <img src="http://mjcom.dothome.co.kr/theme/basichome/img/main/news_icon.png"/>
                                    </div>
                                </li>

                                <li class="slider_li" >
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

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>