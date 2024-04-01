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
$g5['navTitle'] = "일반렌트";
$g5['title'] = "카쉐어링";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
    <link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL?>/css/slick.css" />
</head>

<script type="text/javascript">/*<![CDATA[*/
    document.addEventListener("contextmenu",function(e){"IMG"===e.target.nodeName&&e.preventDefault()},!1);/*]]>*/</script>

<style>
    * {
    padding:0;
    margin:0;
    list-style:none;
    text-decoration:none;
}
.slick-arrow{
    cursor: pointer;
}
body{
    background-color: #fff;
}
.sec{
    width:100%;height: 770px;
    position: relative;
    display: flex;
}
.sec2{
    height:780px ;
}
.sec3{
    height: 640px;
}
.sec4{
    height: 810px;
}

.sec-left{
    width:52%;height: 100%;
    position: relative;
    display: flex;align-items: center;justify-content: center;
    font-size: 8rem;
    color:rgba(153, 153, 153, 0.6)
}
.sec1 .sec-left,
.sec3 .sec-left{
    background-color: rgba(0,0,0,0.1);
}
.sec-right{
    width:48%;height: 100%;
    position: relative;
    display: flex;align-items: center;justify-content: center;
    font-size: 8rem;
    color:rgba(153, 153, 153, 0.6)
}

.box{
    width:700px;height: 380px;
    background-color: #fff;
    position: absolute;
    top:50%;transform: translateY(-50%);
    right:300px;
    box-shadow: 0px 0px 100px 10px #ddd;
    color:#333;
    display: flex;align-items: center;
    align-content: center;
    flex-flow: row wrap;
    justify-content: center;
}
.sec2 .box{
    position: absolute;
    top:50%;transform: translateY(-50%);
    right: 0;
}

.sec4 .box{
    position: absolute;
    top:50%;transform: translateY(-50%);
    right: 0;
}

.box h3{
    font-size: 2rem;
    width:80%
}
.box p{
    font-size: 0.8rem;
    margin-top:30px;
    width:80%;
    color:#888
}

.box a{
    font-size: 0.8rem;
    position: absolute;
    bottom: 0;right: 30px;
    transform: translateY(50%);
    display: inline-block;
    padding:13px 60px;
    background-color: #333;
    color:#fff;
    border-radius: 10px;
    box-shadow: 0px 0px 20px 10px #ddd;
}

.sec5{
    height: 870px;
    background-color: #ddd;
}
.sec5-inner{
    width:1200px;height:100%;
    display: flex;flex-flow: row wrap;
    align-content: center;justify-content: center;
    margin:0 auto;
}

.sec5-inner>h3{
    font-size: 2.5rem;
    margin-bottom: 50px;
}
.sec5-slick{
    width:100%;height: 520px;



}
.slick-list,
.slick-track{
    width:100%;height: 100%;
}
.slick-track .slick-slide{
    position: relative;
    margin:0px 10px;
    overflow: visible;
}
.slick-slide .sec5-contents{
    width:100%;height: 70%;
    background-color: #fff;
    position: absolute;
    top:50%;left:50%;transform: translate(-50%,-50%);
    transition: .5s ease;
    display: flex;align-content: center;
    justify-content: center;flex-flow: row wrap;
}
.slick-current .sec5-contents{
    width:100%;height: 80%;
}
.slick-slide .sec5-contents h3{
    font-size: 1.5rem;
    width:100%;text-align: center;
    margin-bottom: 10px;
}
.slick-slide .sec5-contents p{
    width:70%;text-align: center;
    color:#888
}
.slick-slide .sec5-contents p:nth-of-type(1){
    margin-bottom: 30px;
    color:#333;
}
.thumbnail{
    width:90px;height: 90px;
    border-radius: 100%;
    position: absolute;
    background-color: #555;
    top:0;left:50%;
    transform: translate(-50%,-50%);
}

.sec5-controll{
    width:1400px;
    position: absolute;
    top:50%;left:50%;transform: translate(-50%,-50%);
    display: flex;align-items: center;justify-content: space-between;
}
.sec5-controll .slick-arrow{
    font-size: 3rem;
    color:#888;
}
.sec5-prev span::after {
    content: "\f104";
    font-family: FontAwesome;
    font-size:2.3em;
}
.sec5-next span::after {
    content: "\f105";
    font-family: FontAwesome;
    font-size:2.3em;
}
.sec6{
    height: 590px;
    background-color: rgba(0,0,0,0.3);
}

.sec6-inner{
    width:1200px;
    display: flex;flex-flow: row wrap;
    align-content: center;
    justify-content: center;
    margin:0 auto;
}
.sec6-inner h3{
    font-size: 2.5rem;
}
.sec6-inner p{
    font-size: 0.8rem;
    width:100%;
    text-align: center;
    margin:20px 0px;
}
.sec6-inner a{
    font-size: 0.8rem;
    padding:10px 60px;
    border-radius: 10px;
    background-color: #333;
    color:#fff;
    display: inline-block;
}

.sec7{
    height: 750px;
    display: flex;align-items: center;
    justify-content: center;
}

.sec7-inner{
    width:1100px;height:80%;
    display: flex;align-items: center;
    justify-content: center;
}
.sec7-left{
    width:50%;height: 100%;
}
.sec7-left h3{
    font-size: 2rem;
    line-height: 30px;
    margin:20px 0px;
}
.sec7-left p{
    font-size: 0.8rem;
    width:70%;
    color:#888;
}
.sec7-left a{
    padding:13px 60px;
    background-color: #333;
    color: #fff;
    border-radius: 10px;
    display: inline-block;
    margin-top:30px;
}
.sec7-right{
    width:50%;height: 100%;
    display: flex;align-items: center;
    justify-content: center;

}
.sec7-right ul{
    width: 42%;height: 90%;display: flex;flex-flow: row wrap;
    align-content: space-around;justify-content: center;
    align-self: flex-end;
}
.sec7-right ul:nth-of-type(1){
    align-self: flex-start;
    margin-right: 20px;
}
.sec7-right ul li{
    width:100%;height: 45%;
    background-color: #fff;
    border-radius: 20px;
    display: flex;flex-flow: row wrap;
    align-content: center;
    padding-left:20px;
}
.sec7-right ul li i{
    width:40px;height: 40px;
    font-size: 1.2rem;
    background-color:#333;
    display: flex;align-items: center;justify-content: center;
    color:#fff;
    border-radius: 5px;
}

.sec7-right ul li dl dt{
    font-size: 1rem;
    font-weight: 500;
    margin:10px 0px;
}
.sec7-right ul li dl dd{
    font-size: 0.8rem;
}

.sec8{
    height: 770px;
    background-color: rgba(0,0,0,0.3);
    border-radius: 0px 300px 0px 0px;
    overflow: hidden;
    display: flex;align-items: center;justify-content: center;
}
.sec8-inner{
    width:1140px;height: 65%;
    overflow: visible;
    position: relative;
}
.sec8-left{
    height: 100%;
    width:33%;
}
.sec8-left h3{
    font-size: 2rem;
    line-height: 30px;
    margin:20px 0px;
}
.sec8-left p{
    font-size: 0.8rem;
    width:90%;
    color:#333;
}
.sec8-left a{
    padding:13px 60px;
    background-color: #333;
    color: #fff;
    border-radius: 10px;
    display: inline-block;
    margin-top:30px;
}
.sec8-right{
    width:100%;
    height: 100%;
    position: absolute;
    left:35%;
    top:0;
}
.sec8-slick{
    width:100%;height: 100%;
}
.sec8-slick .slick-slide{
    height: 100%;
    position: relative
}
.slick-current .sec8-con{
    height: 100%;
    display: flex;flex-flow:row wrap;
    justify-content: center;
    align-content: center;
    background-color: #ddd;
}
.sec8-con{
    height: 70%;width:100%;
    background-color: #fff;
    transition: .5s ease;
    border-radius: 10px 10px 10px 70px;
    position: relative;
}
.slick-slide .sec8-con p,
.slick-slide .sec8-con span{
    display: none;
    transition: .5s ease;
}
.slick-current .sec8-con p{
    display: block;
    width:80%;
    margin-bottom: 30px;
}
.slick-current .sec8-con span{
    display: block;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 30px;
    position: absolute;
    top:20px;left:40px;
}
.slick-current .sec8-con span::after{
    content: "";
    width:100%;height: 3px;
    background-color: #333;
    position: absolute;
    bottom: 0;left: 0;
}
.slick-current .sec8-con h3{
    width:80%;padding:0;
    margin-bottom: 30px;
}

.sec8-con h3{
    font-size: 2rem;
    padding:40px 0px 0px 40px;
    line-height: 30px;
}
.sec8-con i{
    font-size: 2rem;
    position: absolute;bottom: 20px;right: 40px;
}
@media screen and (max-width:1440px){
    .box{
        right: 150px;
    }
    .sec2 .box,
    .sec4 .box{
        right: -150px;
    }
    .sec5-inner{
        width:90%;
    }
    .sec5-controll{
        width:98%;
    }
    .sec6{
        height: 450px;
    }
}
@media screen and (max-width:1240px){

    .box{
        width:600px;height: 340px;
        z-index: 999;
        right:150px
    }
 
    .sec2 .box,
    .sec4 .box{
        left: -150px;
    }
    .sec5-inner{
        width:90%;
    }
    .sec5-controll{
        width:100%;
    }
    .sec6{
        height: 450px;
    }
    .sec6-inner
    .sec7-inner{
        width:95%;
    }

    .sec7-right ul{
        width:50%;
    }

    .sec8-left{
        width:40%;
    }
    .sec8-inner{
        width:95%;
    }
    .sec8-right{
        left:40%;
        width:80%;
    }
    .slick-current .sec8-con h3{
        font-size: 1.5rem;
    }
}

@media screen and (max-width:900px) {
    .box{
        width:450px;height: 300px;
        right: 50px;
    }
    .sec1{
        height: 670px;
    }
    .sec2{
        height: 680px;
    }
    .sec3{
        height: 540px;
    }
    .sec4{
        height: 710px;
    }
    .sec-left{
        width:70%;
    }
    .sec-right{
        width:30%;
    }
    .sec2 .sec-left,
    .sec4 .sec-left{
        width:30%;
    }
    .sec2 .sec-right,
    .sec4 .sec-right{
        width:70%;
    }
    .sec2 .box,
    .sec4 .box{
        left: 50px;
    }
    .box h3{
        font-size: 1.5rem;
    }
    .box p{
        margin-top:15px;
    }
    .box a{
        padding:10px 40px
    }
    .sec5{
        height: 670px;
    }
    .slick-slide .sec5-contents p{
        width:90%;
    }
    .sec5-slick{
        width:100%;height: 420px;
    }
    .slick-slide .sec5-contents{
        height: 65%;
    }
    .slick-current .sec5-contents{
        width:100%;height: 75%;
    }
    .slick-track .slick-slide{
        margin:0px 5px;
    }
    .sec6{
        height: 400px;
    }
    .sec6-inner h3{
        font-size: 2rem;
    }
    .sec6-inner p{
        width:80%;
    }
    
    .sec7{
        height: 1000px;
    }
    .sec7-inner{
        flex-flow: row wrap;
        width:95%;
        height: 85%;
    }
    .sec7-left{
        width:100%;height:auto;
    }
    .sec7-right{
        width:100%;height: 70%;
        margin-top:30px
    }
    .sec7-right ul{
        width:48%;height: 100%;
    }
    .sec8{
        height: 1000px;
    }
    .sec8-inner{
        flex-flow: row wrap;
        width:95%;height: 85%;
    }

    .sec8-left{
        width:100%;height: auto;
    }
    .sec8-right{
        width:100%;height: 60%;
        position: static;
        margin-top:50px;
    }
    .sec8-con h3{
        padding:40px 0px 0px 20px;
        font-size: 1.5rem;
    }
    .slick-current .sec8-con span{
        left:30px;
    }
}

/* 페이지 */
#tit {width:1240px; margin : 0 auto; background:url('/img/page/icon.png') 0px 0px no-repeat; padding-left:35px; min-height:30px; font-size:26px; color:#000; font-family: 'S-CoreDream-3Light'; margin-bottom:20px; clear:both;background-color:#fff;}
.mt30 {margin-top:30px !important;}
.mt80 {margin-top:80px !important;}

/* 인사말 */
#company {position:relative; idth:100%; max-height:740px; padding:80px 90px; background:url('/img/page/ceo_bg.jpg') no-repeat right;}
#company .greeting h1 {font-size:35px; line-height:50px; color:#13568D; font-family: 'S-CoreDream-4Regular';}
#company .greeting h2 {font-size:24px; line-height:35px; color:#000; margin:50px 0; font-weight:normal;}
#company .greeting p {font-size:18px; line-height:32px; color:#888;}
#company .greeting p b {color:#333;}
#company .greeting img {margin:50px 0 20px;}
#company .ceo {position:absolute; right:0; bottom:0;}

#hstr {width:100%;}
#hstr #hsbox {display:flex; justify-content:space-between;}
#hstr #hsbox div {width:32%; margin-right:15px; border:1px solid #ddd; box-sizing:border-box;}
#hstr #hsbox div:last-child{margin-right:0;}
#hstr #hsbox div p {height:250px; box-sizing:border-box; background:url('/img/page/ceoBox01.jpg') no-repeat; text-align:center; color:#fff; padding-top:100px; font-size:28px; line-height:32px; font-family: 'S-CoreDream-5Medium'; background-size:100%;}
#hstr #hsbox div span {font-size:18px; font-family: 'S-CoreDream-2ExtraLight';letter-spacing:2px; opacity:0.9;}
#hstr #hsbox div:nth-child(2) p {background:url('/img/page/ceoBox02.jpg') no-repeat; background-size:100%;}
#hstr #hsbox div:nth-child(3) p {background:url('/img/page/ceoBox03.jpg') no-repeat; background-size:100%;}
#hstr #hsbox div ul {margin:30px 20px;}
#hstr #hsbox div ul li {font-size:18px; line-height:32px; color:#777;}
#hstr #hsbox div ul li:before {content:"ㆍ "; color:#00d4ea; font-weight:bold;}

/* 회사개요 */
#about table {width:100%; border-top:2px solid #222; border-collapse: collapse;}
#about table th {background:#f5f5f5; padding:10px 0; text-align:center; border-bottom:1px solid #ddd; font-size:19px; font-family: 'S-CoreDream-3Light';}
#about table td {text-align:left; font-size:18px; padding:10px 20px; border-bottom:1px solid #ddd; font-family: 'S-CoreDream-3Light';}
#about ul.drv {width:100%; display:flex; flex-wrap:wrap;}
#about ul.drv li {width:330px; margin:10px; border:1px solid #e7e7e7; text-align:center; padding:30px 0; font-size:18px; color:#555;}
#about ul.drv li h4 {font-size:20px; color:#13568D; margin-bottom:10px;}
#about ul.drv li span {font-size:16px;}

/* 연혁 */
.history_title {width:100%; height:200px; line-height:200px; font-size:24px; letter-spacing:5px; color:#fff; text-align:center; margin-bottom:40px; background:url('/img/page/history_title.jpg') center center no-repeat;}

/* 오시는길 */
#mapArea {width:900px; float:left;}
#mapInfo {width:480px; float:left; margin-left:20px; min-height:500px; border-top:2px solid #13568D; border-bottom:2px solid #13568D; box-sizing:border-box; padding:50px 30px 10px;}
#mapInfo h2 {font-size:24px; color:#13568D;}
#mapInfo p {margin-top:28px; color:#888; font-size:18px; line-height:30px;}
#mapInfo p b {color:#000;}
#mapInfo a {border:1px solid #13568D; color:#13568D; font-weight:bold; width:100%; padding:10px; font-size:18px; margin-top:30px; display:inline-block; text-align:center;transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s; -o-transition:all 0.3s;}
#mapInfo a:hover {background:#13568D; color:#fff;}

/* 개설절차 */
#step .gs_eu {width:100%; max-height:400px; padding:20px; display:flex; justify-content:flex-end; background:url('/img/page/step_bg.jpg') #bfced1 left center no-repeat;}
#step .gs_eu .txt_box {width:720px; padding:55px 70px; background:rgba(255,255,255,0.6);}
#step .gs_eu .txt_box h3 {font-size:30px; color:#13568D; margin-bottom:40px;}
#step .gs_eu .txt_box ul li {font-size:20px; margin:10px 0; font-family: 'S-CoreDream-3Light';}
#step .gs_eu .txt_box ul li img {margin-right:15px;}
#step h2.step_title {font-size:30px; margin:80px 0 50px; text-align:center;}
#step ul.step_box {display:flex; justify-content:center; flex-wrap:wrap; max-width:1200px; margin:0 auto;}
#step ul.step_box li {position:relative; width:230px; height:230px; text-align:center; margin:10px 35px; padding-top:35px; border-radius:50%; background:#fff; border:1px solid #ddd;}
#step ul.step_box li:after {position:absolute; right:-45px; top:110px; content:"▶"; color:#ddd;}
#step ul.step_box li:last-child:after {display:none;}
#step ul.step_box li h4 {font-size:20px; color:#999; font-family: 'S-CoreDream-2ExtraLight';}
#step ul.step_box li img {margin:25px 0;}
#step ul.step_box li p {font-size:20px; color:#111;}

#st_title {width:1240px; padding:55px 60px; letter-spacing:0; background:url('/img/page/short_term_bg.jpg') #151b27 right center no-repeat; margin: 0 auto;}
#st_title h3 {font-size:30px; margin-bottom:30px; color:#00e7ff; font-family: 'S-CoreDream-3Light';}
#st_title p {font-size:18px; line-height:30px; color:#bfc8d8; font-family: 'S-CoreDream-3Light';}

#cp_title {width:100%; padding:70px 0; text-align:center; letter-spacing:0; background:url('/img/page/cp_int_bg.jpg') center center no-repeat;}
#cp_title h3 {font-size:30px; line-height:55px;  color:#fff; font-family: 'S-CoreDream-2ExtraLight';}
#cp_title h3 b {font-family: 'S-CoreDream-3Light';}

#pro {max-width:1240px; border-top:1px solid #ddd; padding:30px 30px; margin : 0 auto; width:100%;}
#pro:last-child {border-bottom:1px solid #ddd;}
.bdb1 {border-bottom:1px solid #ddd;}
#pro #num {width:100px;float:left;font-size:30px;line-height:35px;color:#13568D; font-weight:bold; text-align:center;}
#pro #bac {width:80%;float:left;font-size:20px;line-height:35px;color:#888; word-break:keep-all;}
#pro #bac b {color:#13568D;}
#pro #clbt {clear:both;}
#pro #center {margin-top:30px;width:100%;text-align:center;}
#pro #rental03 {width:900px; margin:30px auto 0;}
#pro #rental03 div {width:280px;padding:50px;text-align:center;background:#f5f5f5;border-radius:20px; float:left; font-size:18px; color:#333; margin-right:30px;}
#pro #rental03 div:last-child {margin-right:0;}
#pro #rental06 {width:900px; margin:30px auto 0;}
#pro #rental06 div {width:280px;padding:50px;text-align:center;background:#13568d;border-radius:20px; float:left; font-size:18px; color:#fff; margin-right:30px;}
#pro #rental06 div:nth-child(2) {background:#f7c510;}
#pro #rental06 div:last-child {margin-right:0;}

/*#h80 {width:1240px; margin: 0 auto; clear:both; content:""; height:80px;width:100%; border-top:1px solid #ddd;}*/
#h80 {width:1240px; margin: 0 auto; clear:both; content:""; height:80px;width:100%;}

#rtls { border:1px solid #ddd; border-collapse: collapse; border-top:3px solid #13568d; border-bottom:2px solid #13568d;}
#rtls thead {background:#f5f5f5;}
#rtls tr td:first-child {background:#f5f5f5;}
#rtls td {text-align:center; font-size:16px; padding:8px 0; border:1px solid #ddd;}

#pro #again03 {width:900px; margin:30px auto 0; background:#f5f5f5; border-radius:20px; text-align:center; font-size:18px; color:#333; padding:20px 0;}
#pro #again03 img {margin-right:20px;}
#pro #again03 span {color:#13568d; font-size:24px;}

#pro #van01 {width:1020px; margin:30px auto 0;}
#pro #van01 div { border:2px solid #13568D; border-radius:20px; padding:30px 0; box-sizing:border-box; width:320px; min-height:300px; text-align:center; float:left; margin:0 10px; font-size:18px; line-height:35px; color:#888;}
#pro #van01 div:last-child {margin-right:none; color:#fff; background:#13568D;}
#pro #van01 div:last-child h2 {color:#fff;}
#pro #van01 div h2 {color:#222; font-size:24px; margin-bottom:20px;}

#pro #van03 {width:1050px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;}
#pro #van03 tr:nth-child(2) td,#pro #van03 tr:nth-child(4) td {padding:20px 0;}

#pro #van04 {width:850px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;border-collapse: collapse;border:1px solid #ddd;}
#pro #van04 thead td {background:#13568d;color:#fff; font-size:19px;}
#pro #van04 td {border:1px solid #ddd; padding:10px 0;}
#pro #van04 tbody td:last-child {background:#f3fbfc; color:#111;}

#srTab {width:100%; }
#srTab li {width:50%;float:left;text-align:center;border:1px solid #ddd; line-height:50px; font-size:18px;margin-bottom:50px; color:#222;transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s; -o-transition:all 0.3s;}
#srTab .on {background:#13568D !important; color:#fff !important;}
#srTab li:hover {background:#f5f5f5; color:#222;}

#pro #sr01 {    max-width: 1230px;
    margin: 30px auto 0;
    width: 100%;
}
#pro #sr01 div { border:2px solid #13568D; border-radius:20px; padding:30px 20px; box-sizing:border-box; width:310px; min-height:390px; float:left; margin:10px; font-size:18px; line-height:35px; color:#888; }
#pro #sr01 div h2 {text-align:center; color:#222; font-size:24px; margin-bottom:20px;}
#pro #sr01 div h2 img {margin-bottom:30px; opacity:0.4;}

#pro #sr02 {max-width: 1080px;
    margin: 30px auto 0;
    font-size: 18px;
    color: #444;
    text-align: center;
    border-collapse: collapse;
    border: 1px solid #ddd;
    width: 90%;}
#pro #sr02 thead td {background:#13568d;color:#fff;}
#pro #sr02 td {border:1px solid #ddd; padding:10px 0;}
#pro #sr02 tbody td:nth-child(2) {background:#f3fbfc; color:#111;}

#pro #sr03 {max-width:1350px; min-width: 320px; width: 100%; margin:30px auto 0;}
#pro #sr03 div { min-width: 320px; margin:1%; min-height:218px; box-sizing:border-box; border:1px solid #ddd; font-size:18px; line-height:28px; color:#888; }
#pro #sr03 div:first-child {}
#pro #sr03 div:nth-child(2) {}
#pro #sr03 div:nth-child(3) {}
#pro #sr03 div:last-child {}
#pro #sr03 div:nth-child(odd) {margin-right:20px;}
#pro #sr03 div p {padding:20px;}
#pro #sr03 h2 {color:#222; font-size:24px; margin-bottom:15px;}

#pro #sr04 { max-width:1300px; min-width: 320px; width: 100%; margin:30px auto 0;}
#pro #sr04 div {width:100%; padding: 30px 0; box-sizing:border-box; display: flex; flex-wrap: wrap; justify-content: flex-start; border-bottom:1px dashed #ddd; }
#pro #sr04 div:nth-child(2) {padding:50px 0;}
#pro #sr04 div:last-child {border-bottom:none;}
#pro #sr04 div h2 {font-size:24px; color:333;}
#pro #sr04 div p {font-size:18px; line-heihgt:35px; color:#888;  margin-top:10px; word-break:keep-all;}
#pro #sr04 div p span{font-size:14px; color:#aaa;}

#pro #sr05 {max-width:1350px; min-width: 320px; width: 100%; margin:30px auto 0;}
#pro #sr05 div {width:100%;margin:1%; min-height:218px; box-sizing:border-box; border:1px solid #ddd; font-size:18px; line-height:28px; color:#888; }
#pro #sr05 div:first-child {margin-right:20px;}
#pro #sr05 div:last-child {}
#pro #sr05 div p {padding:20px; word-break:keep-all;}
#pro #sr05 h2 {color:#222; font-size:24px; margin-bottom:15px;}

#pro #dc03 {width:900px; margin:40px auto 0;}
#pro #dc03 div { box-sizing:border-box; width:280px; min-height:280px; float:left; margin-right:15px; font-size:18px; line-height:35px; color:#888;text-align:center; }
#pro #dc03 div h2 {color:#222; font-size:24px;}
#pro #dc03 div h2 img {margin-bottom:20px;}

#pro #lr01 {width:1350px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;border-collapse: collapse;border:1px solid #ddd;}
#pro #lr01 thead td {background:#13568d;color:#fff;}
#pro #lr01 td {border:1px solid #ddd; padding:10px 0;}
#pro #lr01 tbody td:first-child {background:#f3fbfc; color:#111;}

#pro #lr02 {width:1360px; margin:30px auto 0; display:flex; flex-wrap:wrap; justify-content:center;}
#pro #lr02 div { border:2px solid #13568D; border-radius:20px; padding:30px 20px; box-sizing:border-box; width:320px; float:left; margin:10px; font-size:18px; text-align:center; word-break:keep-all; line-height:30px; color:#888;}
#pro #lr02 div h2 {color:#222; font-size:24px; margin-bottom:20px;}
#pro #lr02 div h2 img {margin-bottom:30px; opacity:0.4;}

#pro #cp01 {width:1200px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;}
#pro #cp01 td {padding:0 10px;}
#pro #cp01 td img {width:100%;}

#cpc_wrap {width:100%; display:flex; justify-content:space-between;}
#cpc_wrap #cpc_table01 {width:750px; font-size:18px; color:#444;text-align:center;border-collapse: collapse;}
#cpc_wrap #cpc_table01 thead th {background:#13568d; border-left:1px solid #17c2d5;color:#fff; font-size:19px; padding:10px; font-weight:normal;}
#cpc_wrap #cpc_table01 thead th:first-child {border-left:0;}
#cpc_wrap #cpc_table01 tbody th {background:#f5f5f5; padding:15px; border-bottom:1px solid #ddd;}
#cpc_wrap #cpc_table01 tbody td {color:#111; padding:15px; border-bottom:1px solid #ddd; word-break:keep-all;}
#cpc_wrap #cpc_table01 tbody tr:last-child td:last-child {border-left:1px dashed #ccc;}

#cpc_table02 {width:100%; font-size:18px; color:#444;text-align:center;border-collapse: collapse;}
#cpc_table02 thead th {background:#13568d; border-left:1px solid #17c2d5;color:#fff; font-size:19px; padding:10px; font-weight:normal;}
#cpc_table02 thead th:first-child {border-left:0;}
#cpc_table02 tbody th {background:#f5f5f5; padding:15px; border-bottom:1px solid #ddd;}
#cpc_table02 tbody td {color:#111; padding:15px; border-bottom:1px solid #ddd; word-break:keep-all;}
#cpc_table02 tbody td:nth-child(2) {border-right:1px dashed #ccc;}

.cp_tail {width:100%; text-align:center; font-size:22px; line-height:50px; margin-top:60px; padding:40px; background:#f5f5f5; border-radius:60px 0 60px 0;}
.cp_tail span {font-size:20px; color:#e80000;}

h3.ctf_txt {font-size:24px; text-align:center; margin:80px auto 60px; padding:40px 0; border-radius:15px; font-weight:normal; background:#f5f5f5;}
#pro #cpc_table03 {width:600px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;}
#pro #cpc_table03 tr:nth-child(2) td,#pro #cpc_table03 tr:nth-child(4) td {padding:20px 0;}

#brc {width:100%; height:600px; background:url('/img/page/branch.png') no-repeat;}
#brc table {float:right; margin-top:320px;/*width:800px;*/}
#brc table input, #brc table select {border:1px solid #ddd; border-radius:8px; height:50px; font-size:18px; color:#888;padding-left:10px; margin-left:5px;}
#brc table #ft_btn {padding:0; border:0;width:120px;height:110px;}
#brc table #name {width:300px;}
#brc table #tel,#brc table #subject_select {width:300px;}
#brc table #area_select {width:300px;}
#brc table #ckbx,#brc table #ckbx a {font-size:14px; color:#888; line-height:30px;}
#brc table #ckbx a {margin-left:10px;}
#brc table #ckbx .checkbox {margin-right:10px; height:20px;}



@media screen and (max-width:600px) {
    .sec1{
        height: 570px;
    }
    .sec2{
        height: 580px;
    }
    .sec3{
        height: 440px;
    }
    .sec4{
        height: 610px;
    }
    .sec-left{
        width:100%;
    }
    .sec-right{
        width:0%;
        position: static
    }
    .sec2 .sec-left,
    .sec4 .sec-left{
        width:0%;
        position: static
    }
    .sec2 .sec-right,
    .sec4 .sec-right{
        width:100%;

    }
    .sec2 .box,
    .sec4 .box{
        transform: translate(-50%,-50%);
        left:50%;top:50%;
    }
    .box{
        width:95%;height: 350px;
        left:50%;top:50%;
        transform: translate(-50%,-50%);
    }

    .sec5-inner>h3{
        font-size: 1.5rem;
        margin-bottom: 30px;
    }
    .thumbnail{
        width:70px;height: 70px;;
    }
    .sec6-inner h3{
        font-size: 1.5rem;
    }
    .sec6-inner a{
        padding:10px 40px;
    }
    .sec6-inner p{
        width:95%;
    }
    .sec7-right ul li{
        padding-left:10px;
    }
    .sec7-left p{
        width:90%;
    }
    .sec7-right{
        justify-content: space-between;
    }
    .sec7-right ul{
        width:49%;
    }
    .sec7-right ul:nth-of-type(1){
        margin-right: 0;
    }
    .sec7-right ul li dl dd{
        line-height: 16px;
        height: 80px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        word-wrap:break-word;
        -webkit-box-orient: vertical;
    }
    .sec7-left h3,
    .sec8-left>h3{
        font-size: 1.5rem;
        line-height: 25px;
    }
    .sec7-left a,
    .sec8-left a{
        padding:10px 40px;
        margin-top:20px;
    }

    .sec8{
        border-radius: 0px 100px 0px 0px;
    }

    .rent04_img{
        width:100%;
    }
}
</style>
<body>
    <div class="sub sub01" id="product2">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
 <br>
 <br>
 <br>
 <br>
 <ul id="srTab">
        	<li class="left on">그룹형 카쉐어링</li>
            <li class="right">현대캐피탈 딜카</li>
            <script>
                $('#srTab > li.left').click(() => {
                    

                    $('#srTab > li.left').addClass('on');
                    $('#srTab > li.right').removeClass('on');
                    $('.shar_div').css('display','block');
                    $('.dircar').css('display','none');
                });  
                $('#srTab > li.right').click(() => {
                    
                    
                    $('#srTab > li.right').addClass('on');
                    $('#srTab > li.left').removeClass('on');
                    $('.shar_div').css('display','none');
                    $('.dircar').css('display','block');
                    
                });                
            </script>
        </ul>
        <div class="shar_div" style="">

        <div class="cont cont_1" style="width:100%;">
                <div class="cont_tit">
                    <h2 id="tit">그룹형 카쉐어링 특장점</h2>
                </div>
                
                <div class="cont_txt">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">01</div> 
                        <div class="cont_txt_top_right">카쉐어링이란 <span>최저 10분 단위로 차를 탈 수 있는 초 단기 렌터카 서비스</span>로 공유 경제 확산 및 IT 기술 결합을 통해 매년 2배 이상 성장하고 있는 경제적인 자동차 공유 서비스입니다.</div> 
                    </div>
                    <div class="cont_txt_bot">

                        <div class="cont_txt_box cont_txt_bot_left">
                            <h2><img src="/img/page/sharingCon01.png"><br>경제성</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 도로 위 자동차<br>16대 이상 대체 효과
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 불 필요한 주차 면적 감소
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 자동차 유지비용 및 운영비용 감소
                                </div>
                            </div>
                        </div>

                        <div class="cont_txt_box cont_txt_bot_middle">
                            <h2><img src="/img/page/sharingCon02.png"><br>친환경</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 이산화탄소 배출량<br>연간 50만 톤 이상 감소
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 온실 가스 감소에 따른<br>녹색 교통 실현
                                </div>
                            </div>
                        </div>

                        <div class="cont_txt_box cont_txt_bot_right">
                            <h2><img src="/img/page/sharingCon03.png"><br>사회적 기여</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 커뮤니티 내 유휴 차량 공유
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 교통 불편 지역의 새로운 대안
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 교통 고밀도 지역 자동차 증가 억제
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cont_txt">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">02</div> 
                        <div class="cont_txt_top_right">카셰어링은 기존 렌터카와 달리, 번거로운 대여 절차없이 스마트폰으로 간편하게 예약하고 가까운 곳에 있는 자동차를 바로 이용할 수 있습니다. 업무상 외근, 쇼핑과 같은 개인 용무에 적합합니다. </div> 
                    </div>
                    <div class="cont_txt_bot">
                        <table id="sr02" cellspacing="0" cellpadding="0">	
                            <thead>
                                <tr>
                                    <td>구분</td>
                                    <td>카쉐어링</td>
                                    <td>렌터카</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>이용자</td>
                                    <td>회원제</td>
                                    <td>일반인</td>
                                </tr>
                                <tr>
                                    <td>이용시간</td>
                                    <td>10~30분 단위로 이용가능</td>
                                    <td>1일 단위</td>
                                </tr>
                                <tr>
                                    <td>이용방법</td>
                                    <td>스마트폰으로 예약, 이용(無人운영)</td>
                                    <td>계약서 작성, 키 전달, 차량 인도 등 번거로움</td>
                                </tr>
                                <tr>
                                    <td>차량위치</td>
                                    <td>사람들의 왕래가 많은곳에 임의 배치</td>
                                    <td>키 인도 제약으로 차량 배치에 제약 있음</td>
                                </tr>
                                <tr>
                                    <td>결제방법</td>
                                    <td>가입 시 등록한 신용카드 통합 결제 </td>
                                    <td>차량 임차료와 주유비, 보험료 별도 지불</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                <div id="pro">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">03</div> 
                        <div class="cont_txt_top_right">기업, 건물, 아파트 등에 속한 공동체 구성원들 끼리 자동차를 공유하는 그룹형 카쉐어링입니다. </div> 
                    </div>
                    <div id="clbt"></div>
                    <div id="sr03">
                        <div style="display: flex; flex-wrap: wrap;">
                            <img class="rent04_img" src="/img/page/sharingType01.jpg">

                            <span style="padding: 20px; ">
                                <h2>기업</h2>
                                - 기업 보유 법인 차량 또는 장기 렌트 차량을 카쉐어링으로 공유<br>
                                - 법인 차량 운영 효율 향상<br>
                                - 업무시간 외에 임직원이 저렴하게 개인 용도로 이용 가능<br>
                                - 비용 처리를 위한 운행 일지 리포트
                            </span>
                        </div>

                        <div style="display: flex; flex-flow: wrap;">
                            <img class="rent04_img" src="/img/page/sharingType02.jpg">

                            <span style="padding: 20px; ">
                                <h2>아파트/주택단지</h2>
                                - 아파트 단지 입주민 전용 카쉐어링 서비스<br>
                                - 쇼핑, 장보기, 자녀 픽업을 위해 활용 가능<br>
                                - 아파트 입주민 복지 향상
                            </span>
                        </div>

                        <div style="display: flex; flex-flow: wrap;">
                            <img class="rent04_img" src="/img/page/sharingType03.jpg">

                            <span style="padding: 20px">
                                <h2>학교/커뮤니티</h2>
                                - 시골, 시외 대학교 등 교통 저밀도 지역의 대안 교통 수단으로 활용<br>
                                - 자가용 미 보유자들이 저렴한 비용으로 사용 가능
                            </span>
                        </div>

                        <div style="display: flex; flex-flow: wrap;">
                            <img class="rent04_img" src="/img/page/sharingType04.jpg">
                            <span style="padding: 20px">
                                <h2>집합체건물</h2>
                                - 수많은 기업이 입주해 있는 집합체 건물에서 공용 자동차를 확보, 공유하여 필요한 시간만 이용<br>
                                - 기업 보유 차량과 자가용 이용을 줄여, 주차장을 효율적으로 이용
                            </span>
                        </div>
                    </div>
                    <div id="clbt"></div>
                </div>
                <div id="pro">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">04</div> 
                        <div class="cont_txt_top_right">카쉐어링의 경제성은 이미 상용화를 통한 여러 사례들로 입증되었습니다. <br><b>기업이 도입 시, 보유 차량 수와 관리/유지비를 획기적으로 절감</b>할 수 있습니다.</div> 
                    </div>
                    <div id="clbt"></div>
                    <div id="sr04">
                        <div>
                            <img class="rent04_img" src="/img/page/sharingCase01.jpg">
                            <span style="margin-left: 20px;">
                                <h2>한국도로공사 도입</h2>
                                <span style="font-size:18px; color:#888;  margin-top:10px; word-break:keep-all;">
                                한국도로공사는 2016년 1월부터 OTORIDE 그룹형 카쉐어링 서비스를 도입한 이후,<br/>
                                현재까지 전국 10개 건설사업단에서 총 80대의 차량을 운영하고 있습니다.<br/>
                                서비스 도입 후 차량 이용의 투명성을 확보하고 개인 용도로 활용할 수 있는 방법을 제시하였으며,<br/> 향후 확대 적용할 예정입니다.
                                </span>
                            </span>
                        </div>
                        <div>
                            <img class="rent04_img" src="/img/page/sharingCase02.png">
                            <span style="margin-left: 20px;">
                                <h2>연간 유지비 200만원이상 절감</h2>
                                <p>- 아반떼 10년 탄다고 가정할 때, 연간 차량 운영비는 약 630만원정도 필요합니다.<br>
                                - 동일한 차량을 카쉐어링으로 이용한다면,<br> 연간 운영비는  약 422만원으로 매년 208만 원을 절감할 수 있습니다.<br>
                                <span>(출처 : 서울시 홈페이지<!--http://traffic.seoul.go.kr/archives/9344-->)</span></p>
                            </span>
                        </div>
                        <div>
                            <img class="rent04_img" src="/img/page/sharingCase03.png">
                            <span style="margin-top:20px; margin-left: 20px;">
                                <h2>일반 차 16대 이상 대체</h2>
                                <p>- 1대의 카쉐어링 차가 도로 위의 일반 차 16.8대를 대체합니다.<br>
                                - 기업 보유 차량 감차 효과 및 비용 절감이 가능해집니다.<br>
                                - 일반 차량 대비, 비용 사용 내역을 투명하게 관리할 수 있습니다.<br>
                                <span>(출처 : 2015년 4월, 휴먼교통연구실)</span></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="pro">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">05</div> 
                        <div class="cont_txt_top_right">그룹 운영자용 관리도구와 사용자용 모바일 앱은 자동차 관제 운영 및 이용에 필요한 모든 기능을 갖춤과 동시에 편리한 이용을 위해 사용자 경험을 최대한 고려하였습니다.</div> 
                    </div>
                    <div id="clbt"></div>
                    <div id="sr05">
                        <div style="display: flex; flex-wrap: wrap">
                            <img class="rent04_img" src="/img/page/sharingApp01.jpg">
                            <span style="padding: 20px;">
                                <h2>관리 콘솔(Web)</h2>
                                차량  운행 현황을 바로 확인할 수 있습니다. (사고 영상 정보, 위치 정보 등) <br>
                                차량 별 운행 기록 및 운행 경로,  연료 사용량 등 운행 정보 로그를 제공합니다. <br>
                                다양한 운영 통계 및 월별 이용 리포트로 차량 관리 비용을 분석할 수 있습니다. <br>
                                OBD-II 정보를 분석하여 상태 및 점검 비용 예측 가능합니다. <br>
                                원격 시동 제어로 차량 도난 시, 사용을 예방할 수 있습니다. <br>
                                이용자와 차량을 등록하고 관리할 수 있습니다. <br>
                            </span>
                        </div>
                        <div style="display: flex; flex-wrap: wrap">
                            <img class="rent04_img" src="/img/page/sharingApp02.jpg">
                            <span style="padding: 20px;">
                                <h2>모바일 앱</h2>
                                스마트폰 앱으로 원하는 시간 만큼만 예약하고 자동차를 이용할 수 있습니다. <br>
                                자동차 키 없이, 터치 만으로 원격으로 차량 도어 개폐가 가능합니다. <br>
                                통신 음영 지역에서는 블루투스로 차량을 제어할 수 있습니다. <br>
                                넓은 주차장에서 자동차 위치 확인이 편리합니다. (혼, 라이트 제어) <br>
                                Android, iOS를 지원합니다. <br/>
                            </span>
                        </div>
                    </div>
                    <div id="clbt"></div>
                </div>
        </div>
     	<div class="dircar" style="display: none;">
        
            <div class="cont cont_1">
                <div class="cont_tit">
                    <h2 id="tit">현대 캐피탈 딜카 특장점</h2>
                </div>
                
                <div class="cont_txt">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">01</div> 
                        <div class="cont_txt_top_right">카쉐어링이란 <span>최저 10분 단위로 차를 탈 수 있는 초 단기 렌터카 서비스</span>로 공유 경제 확산 및 IT 기술 결합을 통해 매년 2배 이상 성장하고 있는 경제적인 자동차 공유 서비스입니다.</div> 
                    </div>
                    <div class="cont_txt_bot">

                        <div class="cont_txt_box cont_txt_bot_left">
                            <h2><img src="/img/page/sharingCon01.png"><br>경제성</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 도로 위 자동차<br>16대 이상 대체 효과
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 불 필요한 주차 면적 감소
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 자동차 유지비용 및 운영비용 감소
                                </div>
                            </div>
                        </div>

                        <div class="cont_txt_box cont_txt_bot_middle">
                            <h2><img src="/img/page/sharingCon02.png"><br>친환경</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 이산화탄소 배출량<br>연간 50만 톤 이상 감소
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 온실 가스 감소에 따른<br>녹색 교통 실현
                                </div>
                            </div>
                        </div>

                        <div class="cont_txt_box cont_txt_bot_right">
                            <h2><img src="/img/page/sharingCon03.png"><br>사회적 기여</h2>
                            <div class="cont_txt_bot_left_list">
                                <div class="cont_txt_bot_left_list_row">
                                    - 커뮤니티 내 유휴 차량 공유
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 교통 불편 지역의 새로운 대안
                                </div>
                                <div class="cont_txt_bot_left_list_row">
                                    - 교통 고밀도 지역 자동차 증가 억제
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cont_txt">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">02</div> 
                        <div class="cont_txt_top_right">카셰어링은 기존 렌터카와 달리, 번거로운 대여 절차없이 스마트폰으로 간편하게 예약하고 가까운 곳에 있는 자동차를 바로 이용할 수 있습니다. 업무상 외근, 쇼핑과 같은 개인 용무에 적합합니다. </div> 
                    </div>
                    <div class="cont_txt_bot">
                        <table id="sr02" cellspacing="0" cellpadding="0">	
                            <thead>
                                <tr>
                                    <td>구분</td>
                                    <td>카쉐어링</td>
                                    <td>렌터카</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>이용자</td>
                                    <td>회원제</td>
                                    <td>일반인</td>
                                </tr>
                                <tr>
                                    <td>이용시간</td>
                                    <td>10~30분 단위로 이용가능</td>
                                    <td>1일 단위</td>
                                </tr>
                                <tr>
                                    <td>이용방법</td>
                                    <td>스마트폰으로 예약, 이용(無人운영)</td>
                                    <td>계약서 작성, 키 전달, 차량 인도 등 번거로움</td>
                                </tr>
                                <tr>
                                    <td>차량위치</td>
                                    <td>사람들의 왕래가 많은곳에 임의 배치</td>
                                    <td>키 인도 제약으로 차량 배치에 제약 있음</td>
                                </tr>
                                <tr>
                                    <td>결제방법</td>
                                    <td>가입 시 등록한 신용카드 통합 결제 </td>
                                    <td>차량 임차료와 주유비, 보험료 별도 지불</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="cont_txt">
                    <div class="cont_txt_top"> 
                        <div class="cont_txt_top_left">03</div> 
                        <div class="cont_txt_top_right">
                            딜카는 어디서나 배달반납 가능한 딜리버리 카셰어링 플랫폼입니다.<br>
                            언제 어디서나 내차가 필요한 순간, 기사님이 직접 배달해주는 딜카를 이용하실 수 있습니다.<br>
                            (절차 : 회원가입 &gt; 예약/결제 &gt;픽업 &gt; 주유 &gt; 반납)
                        </div>
                    </div>

                    <div class="cont_txt_bot">
                        <div class="s3_cont_txt_box cont_txt_bot_left">
                            <h2><img src="/img/page/delcarCase01.png"><br>수도권</h2>
                            <div class="s3_cont_txt">
                            원하는 곳으로<br>
                            배달받고 바로 출발!<br>
                            반납도 자유롭게!</div>
                        </div>
                        <div class="s3_cont_txt_box cont_txt_bot_middle">
                        <h2><img src="/img/page/delcarCase02.png"><br>KTX 픽업존</h2>
                        <div class="s3_cont_txt">
                            전국 19개 KTX<br>
                            픽업존에서 찾고<br>
                            내 차처럼 편하게 여행!</div>
                        </div>
                        <div class="s3_cont_txt_box cont_txt_bot_right">
                            <h2><img src="/img/page/delcarCase03.png"><br>제주도</h2>
                            <div class="s3_cont_txt">
                            비행기 탈 때 예약!<br>
                            서류 작성없이<br>
                            24시간 무료!
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            <style>
            .dircar,.shar_div{
                display: flex;
                flex-direction: column;
                align-items: center;
                max-width: 1240px;
                width: 100%;
                min-width: 320px;
                margin: auto;
            }
            .cont_tit{ 
                display: flex;
                justify-content: flex-start;
                align-items: center;
                flex-wrap: wrap;
                font-size: 30px;
                width: 100%;
            }
            .cont_tit img{
                width: 25px;
                height: 28px;
                margin-right: 10px;
            }
            .cont_txt{
                width: 100%;
                border-top: 1px solid #ddd;
                padding: 30px 30px;
            }
            .cont_txt_top{
                display: flex;
                justify-content: flex-start;
                align-items: flex-start;
            }
            .cont_txt_top_left{
                font-size:30px;
                line-height: 35px;
                color: #13568D;
                font-weight: bold;
            }
            .cont_txt_top_right{
                margin-left: 20px;
                font-size: 20px;
                line-height: 35px;
                color: #888;
                word-break: auto-phrase;
            }
            
            .cont_txt_top_right span{
                color:#13568D;
                font-weight:bold;
            }

            .cont_txt_bot{
                display: flex;
                justify-content: center;
                width: 100%;
                max-width: 1200px;
                min-width: 320px;
                margin: 30px auto 0 auto;
                flex-wrap: wrap;
            }

            .cont_txt_bot_left_list{
                font-size: 18px;
                line-height: 35px;
                color: #888;
            }

            .cont_txt_box{
                border: 2px solid #13568D ;
                border-radius: 20px;
                padding: 30px 20px;
                box-sizing: border-box;
                width: 320px;
                min-height: 320px;
                margin: 15px;
            }

            .cont_txt_box h2{
                text-align: center;
                color: #222;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .cont_txt_box h2 img{ 
                margin-bottom:15px;
            }

            #sr02{
                max-width: 1080px;
                width: 100%;
                min-width: 320px;
                margin: 30px auto 0;
                font-size: 18px;
                color: #444;
                text-align: center;
                border-collapse: collapse;
                border: 1px solid #ddd;
            }

            #sr02 thead tr td {
                background: #13568D;
                color: #fff;
            }  
            
            #sr02 tr td {
                padding: 10px 0;
            }

            #sr02 tbody tr td:nth-child(2) {
                background: #f3fbfc;
                color: #111;    
            }

            .s3_cont_txt_box{
                padding: 30px 20px;
                box-sizing: border-box;
                width: 320px;
                min-height: 320px;
                margin: 15px;
            }
            .s3_cont_txt_box h2 {
                text-align: center;
                color: #222;
                font-size: 24px;
                margin-bottom: 20px;
            }
            .s3_cont_txt_box h2 img {
                margin-bottom: 15px;
            }

            .s3_cont_txt{
                margin-right: 15px;
                font-size: 18px;
                line-height: 28px;
                color: #888;
                text-align: center;
            }
            
            </style>
            <div class="cont cont_2">

            </div>
            <style>
            
            </style>
            <div class="cont cont_3">

            </div>
            <style>
            
            </style>
        </div>
    </div>
</body>
</html>
<script src="<?php echo G5_THEME_URL?>/js/slick.min.js"></script>
<script src="<?php echo G5_THEME_URL?>/js/slick.js"></script>
<script>

    $(document).ready(function(){ //start
	//animate_elems

    var $elems = $(".elm");
    var winheight = $(window).height();
	$elems.addClass('active');
    $(window).scroll(function () {
        animate_elems();
    });
    function animate_elems() {
        wintop = $(window).scrollTop();

        $elems.each(function () {
            $elm = $(this);
            topcoords = $elm.offset().top;

            if (wintop >= (topcoords - (winheight * 0.5))) {
                $elm.addClass('on');
               
            } 
        });
    }; // end animate_elems
});//end
</script>
<script>
  $(document).ready(function(){
            $('.sec5-slick').slick({
                slidesToShow:3,
                slidesToScroll:1,
                arrows:true,
                appendArrows:$('.sec5-controll'),
                prevArrow:'<div class="sec5-prev"><span></span></div>',
                nextArrow:'<div class="sec5-next"><span></span></div>',
                centerMode:true,
                centerPadding:'0px',
                responsive:[
                    {
                        breakpoint:901,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"100px",
                            arrows:false,
                        }
                    },
                    {
                        breakpoint:601,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"20px",
                            arrows:false,
                        }
                    }
                ]
            })

            $('.sec8-slick').slick({
                slidesToShow:3,
                slidesToScroll:1,
                arrows:false,
                autoplay:true,
                autoplaySpeed:2000,
                responsive:[
                    {
                        breakpoint:1241,
                        settings:{
                            slidesToShow:2,

                        }
                    },
                    {
                        breakpoint:901,
                        settings:{
                            slidesToShow:1,

                        }
                    }
                ]
            });
        });
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>