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
$g5['title'] = "단기일반렌트";
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

<script>
    $(document).ready(function(){
        $('.navi').click(function(){
            $('#mysub2').css('display', 'block');
        });
    })
</script>

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

@media screen and (max-width:600px){
    #st_title{
        background: none !important;
    }
    #st_title p{
        color: #111 !important;
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

#st_title {width:100%; padding:55px 60px; letter-spacing:0; background:url('/img/page/short_term_bg.jpg') #151b27 right center no-repeat;}
#st_title h3 {font-size:30px; margin-bottom:30px; color:#00e7ff; font-family: 'S-CoreDream-3Light'; text-align: center;}
#st_title p {font-size:18px; line-height:30px; color:#bfc8d8; font-family: 'S-CoreDream-3Light'; text-align: center;}

#cp_title {width:100%; padding:70px 0; text-align:center; letter-spacing:0; background:url('/img/page/cp_int_bg.jpg') center center no-repeat;}
#cp_title h3 {font-size:30px; line-height:55px;  color:#fff; font-family: 'S-CoreDream-2ExtraLight';}
#cp_title h3 b {font-family: 'S-CoreDream-3Light';}

#pro {    width: 95%;
    border-top: 1px solid #ddd;
    padding: 30px 0;
    margin: 0 auto;
    max-width: 1240px;
}
#pro:last-child {border-bottom:1px solid #ddd;}
.bdb1 {border-bottom:1px solid #ddd;}
#pro #num {width:100px;float:left;font-size:30px;line-height:35px;color:#13568D; font-weight:bold; text-align:center;}
#pro #bac {width:90%;float:right;font-size:20px;line-height:35px;color:#888; word-break:keep-all;}
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

#pro #sr01 {width:1230px; margin:30px auto 0;}
#pro #sr01 div { border:2px solid #13568D; border-radius:20px; padding:30px 20px; box-sizing:border-box; width:390px; min-height:390px; float:left; margin:10px; font-size:18px; line-height:35px; color:#888;}
#pro #sr01 div h2 {text-align:center; color:#222; font-size:24px; margin-bottom:20px;}
#pro #sr01 div h2 img {margin-bottom:30px; opacity:0.4;}

#pro #sr02 {width:1080px; margin:30px auto 0; font-size:18px; color:#444;text-align:center;border-collapse: collapse;border:1px solid #ddd;}
#pro #sr02 thead td {background:#13568d;color:#fff;}
#pro #sr02 td {border:1px solid #ddd; padding:10px 0;}
#pro #sr02 tbody td:nth-child(2) {background:#f3fbfc; color:#111;}

#pro #sr03 {width:1350px; margin:30px auto 0;}
#pro #sr03 div {width:100%;margin:1%; min-height:218px; box-sizing:border-box; border:1px solid #ddd; font-size:18px; line-height:28px; color:#888; padding:30px 30px 30px 470px;}
#pro #sr03 div:first-child {background:url(/img/page/sharingType01.jpg) no-repeat;}
#pro #sr03 div:nth-child(2) {background:url(/img/page/sharingType02.jpg) no-repeat;}
#pro #sr03 div:nth-child(3) {background:url(/img/page/sharingType03.jpg) no-repeat;}
#pro #sr03 div:last-child {background:url(/img/page/sharingType04.jpg) no-repeat;}
#pro #sr03 div:nth-child(odd) {margin-right:20px;}
#pro #sr03 div p {padding:20px;}
#pro #sr03 h2 {color:#222; font-size:24px; margin-bottom:15px;}

#pro #sr04 { width:1300px; margin:30px auto 0;}
#pro #sr04 div {width:100%; min-height:280px; box-sizing:border-box; padding:50px 0 50px 400px; border-bottom:1px dashed #ddd; background:url('/img/page/sharingCase01.jpg') no-repeat 10px 50px;}
#pro #sr04 div:nth-child(2) {padding:50px 0;background:url('/img/page/sharingCase02.png') no-repeat 900px 50px;}
#pro #sr04 div:last-child {border-bottom:none;background:url('/img/page/sharingCase03.png') no-repeat 10px 50px;}
#pro #sr04 div h2 {font-size:24px; color:333;}
#pro #sr04 div p {font-size:18px; line-heihgt:35px; color:#888;width:900px;  margin-top:10px; word-break:keep-all;}
#pro #sr04 div p span{font-size:14px; color:#aaa;}

#pro #sr05 {width:1350px; margin:30px auto 0;}
#pro #sr05 div {width:100%;margin:1%; min-height:218px; box-sizing:border-box; border:1px solid #ddd; font-size:18px; line-height:28px; color:#888; padding:30px 30px 30px 470px;}
#pro #sr05 div:first-child {background:url(/img/page/sharingApp01.jpg) left bottom no-repeat; margin-right:20px;}
#pro #sr05 div:last-child {background:url(/img/page/sharingApp02.jpg) left bottom no-repeat;}
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
 <div id="st_title">
	<h3>안전하고 즐거운 시간 되세요 : )</h3>
    <p>차량 대여 및 반납시 계약서 작성 및 차량 체크로 인하여 약 10분~20분 정도의<br class="mb_none">시간이 소요될 수 있으므로 이용에 참고하여 주시기 바랍니다.<br>거리 특성상 배/회차 비용이 발생할 수 있습니다.</p>
</div>

<h2 id="tit" class="mt80">절차안내</h2>
<div id="pro">
    <div id="num">01</div>
    <div id="bac"><b class="cl_navy">예약하기</b> 전화예약 · 온라인예약·지점방문예약<br>※ 전화 또는 온라인 예약시 차종별 가능여부를 반드시 확인하시기 바랍니다.<br>
    <b>09:30 ~ 20:00 까지 배/회차 가능</b></div>        
     <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">02</div>
    <div id="bac"><b class="cl_navy">계약서 작성</b><br>차량임대차계약서 작성(면허증 지참)<br>※ 처음 이용하시는 경우에는 신원확인을 위해 주민등록증제시를 요구할 수 있습니다.</div>
    <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">03</div>
    <div id="bac"><b class="cl_navy">요금결제</b><br>카드결제(방문고객), 현금결제 가능</div>
    <div id="clbt"></div>
</div>
<div id="pro" class="bdb1">
    <div id="num">04</div>
    <div id="bac"><b class="cl_navy">차량인수</b><br>차량 확인 후 인수<br>※ 차량외관, 작동상태, 유류량을 확인하고 차량임대차 계약서 서명 후 인수</div>
    <div id="clbt"></div>
</div>
 
<h2 id="tit" class="mt80">대여시 유의사항</h2>
<div id="pro">
    <div id="num">01</div>
    <div id="bac"><b class="cl_navy">대여자격 확인하기</b><br>렌터카는 차종에 따라 대여자격이 상이하기 때문에 기본대여자격을 갖추신 경우라도<br class="mb_none"><b>대여를 원하시는 차종에 대한 상세 대여자격을 사전에 반드시 확인</b>하시기 바랍니다.</div>        
     <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">02</div>
    <div id="bac"><b class="cl_navy">보험 및 보상내용 확인하기</b><br>차놀자렌터카는 모든 차량이 대인/대물/자손보험에 가입되어 있으며,<br class="mb_none">
    차량소해면책제도(LDW)를 운영하여 만일에 있을지 모르는 사고를 보상받을 수 있도록 하고있습니다.</div>
    <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">03</div>
    <div id="bac"><b class="cl_navy">차량 인수전 차량 상태 및 유류상태를 꼼꼼히 살피고 계약서 작성하기</b></div>
    <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">04</div>
    <div id="bac"><b class="cl_navy">계약서 작성을 위해 제시한 신분증/운전면허증 챙기기</b></div>
    <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">05</div>
    <div id="bac"><b class="cl_navy">고객용 계약서는 차량을 반납할 때까지 보관하기</b></div>
    <div id="clbt"></div>
</div>
<div id="pro" class="bdb1">
    <div id="num">06</div>
    <div id="bac"><b class="cl_navy">긴급연락처 확인하기</b><br>사고 등 긴급상황 발생시 연락 가능한 긴급연락처가 대여차량 내에 부착되어 있습니다.<br>
    차량대여시 반드시 긴급연락처가 부착된 곳을 확인하시어 안전하고 편안하게 렌터카를 이용하세요.</div>
    <div id="clbt"></div>
</div>

<h2 id="tit" class="mt80">사고대차</h2>
<div id="pro">
    <div id="num">01</div>
    <div id="bac"><b class="cl_navy">24시 보험대차란?</b><br>교통사고로 차량에 피해를 입으신 고객에게 가해차량의 보험회사로부터 파손된 차량을 수리받는 기간동안 차량을 대여해주는 서비스입니다.<br>
    지에스렌터카는 회원님들이 100% 피해가 아닌 8:2 정도의 과실비율이 나오더라도 과실부분을 지원해드리므로 렌트에 소요되는 비용은 전혀 없습니다.</div>        
    <div id="clbt"></div>
</div>
<div id="pro">
    <div id="num">02</div>
    <div id="bac"><b class="cl_navy">방어운전! 의지와 관계없는 사고!</b><br>사고피해시 접수번호 받으시고 차량입고 날짜 정하셔서 연락주시면 최고의 서비스로 모시겠습니다.</div>        
    <div id="clbt"></div>
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