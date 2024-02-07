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
$g5['navTitle'] = "Product";
$g5['title'] = "제품소개1";
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
    background-color: #eee;
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
    <div class="sub sub01" id="product1">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="sec sec1">
            <div class="sec-left">
                IMG
            </div>
            <div class="sec-right">
                <div class="box">
                    <h3>Lorem Ipsum</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero facilis doloribus illum. Placeat error, molestias facere consectetur excepturi facilis tempore culpa ad pariatur sunt, cupiditate earum delectus quibusdam impedit? Nemo!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni molestias minima nulla vel ducimus tempora, quasi ipsa, rerum quae iure eligendi facere vitae facilis totam officiis iste blanditiis, dolorem nobis!</p>
                    <a href="#">LEARN MORE</a>
                </div>
            </div>
        </section>
        <section class="sec sec2">
            <div class="sec-left">
                <div class="box">
                    <h3>Lorem Ipsum</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero facilis doloribus illum. Placeat error, molestias facere consectetur excepturi facilis tempore culpa ad pariatur sunt, cupiditate earum delectus quibusdam impedit? Nemo!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni molestias minima nulla vel ducimus tempora, quasi ipsa, rerum quae iure eligendi facere vitae facilis totam officiis iste blanditiis, dolorem nobis!</p>
                    <a href="#">LEARN MORE</a>
                </div>
            </div>
            <div class="sec-right">
                PNG
            </div>
        </section>
        <section class="sec sec3">
            <div class="sec-left">
                IMG
            </div>
            <div class="sec-right">
                <div class="box">
                    <h3>Lorem Ipsum</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero facilis doloribus illum. Placeat error, molestias facere consectetur excepturi facilis tempore culpa ad pariatur sunt, cupiditate earum delectus quibusdam impedit? Nemo!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni molestias minima nulla vel ducimus tempora, quasi ipsa, rerum quae iure eligendi facere vitae facilis totam officiis iste blanditiis, dolorem nobis!</p>
                    <a href="#">LEARN MORE</a>
                </div>
            </div>
        </section>
        <section class="sec sec4">
            <div class="sec-left">
                <div class="box">
                    <h3>Lorem Ipsum</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero facilis doloribus illum. Placeat error, molestias facere consectetur excepturi facilis tempore culpa ad pariatur sunt, cupiditate earum delectus quibusdam impedit? Nemo!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni molestias minima nulla vel ducimus tempora, quasi ipsa, rerum quae iure eligendi facere vitae facilis totam officiis iste blanditiis, dolorem nobis!</p>
                    <a href="#">LEARN MORE</a>
                </div>
            </div>
            <div class="sec-right">
                PNG
            </div>
        </section>

        <section class="sec sec5">
            <div class="sec5-inner">
                <h3>Lorem Ipsum dolor</h3>
                <div class="sec5-slick">
                    <div>
                        <div class="sec5-contents">
                            <div class="thumbnail"></div>
                            <h3>John Doe</h3>
                            <p>lorem ipsum</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis odio nemo veritatis maiores voluptatem vitae tempora quibusdam, molestiae error, voluptates in? Pariatur incidunt sit labore rerum nesciunt consequatur veritatis at?</p>
                        </div>
                    </div>
                    <div>
                        <div class="sec5-contents">
                            <div class="thumbnail"></div>
                            <h3>John Doe</h3>
                            <p>lorem ipsum</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi optio quia unde? Reiciendis sed quae eligendi voluptatem obcaecati! Expedita corporis vel suscipit. Ullam totam dolor minima aliquid delectus itaque provident?</p>
                        </div>
                    </div>
                    <div>
                        <div class="sec5-contents">
                            <div class="thumbnail"></div>
                            <h3>John Doe</h3>
                            <p>lorem ipsum</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatum doloribus, distinctio consequuntur laudantium voluptate, esse iste maxime repellat vel praesentium, aspernatur dignissimos? Suscipit perferendis consequuntur quisquam esse tempore perspiciatis?</p>
                        </div>
                    </div>
                    <div>
                        <div class="sec5-contents">
                            <div class="thumbnail"></div>
                            <h3>John Doe</h3>
                            <p>lorem ipsum</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo pariatur libero voluptatem veritatis autem repudiandae commodi? Omnis inventore dolorem rerum recusandae accusantium quae. Ut saepe quaerat quia laudantium expedita? Harum.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="sec5-controll"></div>
        </section>

        <section class="sec sec6">
            <div class="sec6-inner">
                <h3>Lorem Ipsum Dolor, Sit ?</h3>
                <p> amet consectetur adipisicing elit. Explicabo pariatur libero voluptatem veritatis autem repudiandae commodi? Omnis<p>
                <a href="#">LEARN MORE</a>
            </div>
        </section>

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