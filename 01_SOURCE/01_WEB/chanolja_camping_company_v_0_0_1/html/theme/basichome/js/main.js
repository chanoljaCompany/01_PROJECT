
$(window).resize(function(){
	loaction.reload();
});

$(document).ready(function(){
    if($(window).width()>1000){
        new fullpage('#fullpage', {
            scrollingSpeed:500,
            fitToSection: true,
            responsiveWidth:1000,
            fitToSectionDelay:1000,
            scrollBar: true,
            verticalCentered: true,
            sectionSeletor:'.section',
            normalScrollElements: '.fp-auto-height',
            anchors: ['1', '2', '3', '4'],
            navigation:true,
            /* 
            onLeave:function(origin,destination,direction,index){
                if(origin.anchor=="1"){
                    $('.fix-btn').addClass('back_');
                }else if(destination.index==0){
                        {
                        $('.fix-btn').removeClass('back_')
                    }
                }
            },
                                    */
             onLeave: function (section,destination) {
                 if(destination.index!==0){
                     $('#header').addClass('active');
                     $('.top-btn').addClass('on')
                 }else{
                     $('#header').removeClass('active')
                     $('.top-btn').removeClass('on')
                 }

                 if(destination.index==1){
                     $('#fp-nav ul li').addClass('on');
                 }else{
                     $('#fp-nav ul li').removeClass('on');
                 }
                 if(destination.index==1 || destination.index==5){
                    $('.top-btn').addClass('active')
                 }else{
                    $('.top-btn').removeClass('active');
                 }

             },
             afterLoad:function(section,destination){
                if(destination.index==4 || destination.index==5){
                    $('.sec4-contents').addClass('on')
                }else{
                    $('.sec4-contents').removeClass('on')
                }
             }
        })
    }
    $('.mouse').click(function(destination){
        $('#fullpage').destination.eq(1);
    });

    $('.main-slick').slick({
        slidesToShow:1,
        slidesToScroll:1,
        appendArrows:$('.main-controll'),
        prevArrow:"<div><i class='xi-angle-left'></i></div>",
        nextArrow:"<div><i class='xi-angle-right'></i></div>",
        fade:true,
    });

    var percentTime;
    var tick;
    var time = 1;
    var progressBarIndex = 0;

    $('.progressBarContainer .progressBar').each(function(index) {
        var progress = "<div class='inProgress inProgress" + index + "'></div>";
        $(this).html(progress);

    });
    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        tick = setInterval(interval, 10);
        currentProgress()
    }
    function interval() {
        if (($('.main-slick .slick-track div[data-slick-index="' + progressBarIndex + '"]').attr("aria-hidden")) === "true") {
            progressBarIndex = $('.main-slick .slick-track div[aria-hidden="false"]').data("slickIndex");
            startProgressbar();
        } else {
            percentTime += 1 / (time + 5);
            $('.inProgress' + progressBarIndex).css({
                width: percentTime + "%"
            });
            if (percentTime >= 100) {
                $('.main-slick').slick('slickNext');
                progressBarIndex++;
                if (progressBarIndex > 2) {
                    progressBarIndex = 0;
                }
                startProgressbar();
                currentProgress()
            }
        }
    }

    function resetProgressbar() {
        $('.inProgress').css({
            width: 0 + '%'
        });
        clearInterval(tick);
    }
    startProgressbar();
    currentProgress()
    // End ticking machine

    $('.progressBarContainer div').click(function () {
    	clearInterval(tick);
    	var goToThisIndex = $(this).find("span").data("slickIndex");
    	$('.main-slick').slick('slickGoTo', goToThisIndex, false);
    	startProgressbar();
        $('.pause-btn').css({display:"block"});
        $('.play-btn').css({display:"none"})
    });


    function currentProgress(){
        if($('.main-slick .slick-slide').has('slick-current')){
            $(this).addClass("on")
            $('.progressBar').css({display:"none"})
            $('.progressBar').eq($('.main-slick .slick-current').index()).css({display:"block"})
        }else{
        }
    };

    $('.pause-btn').click(function(){
        clearInterval(tick);
        $(this).css({display:"none"})
        $('.play-btn').css({display:"flex"})
    });
    $('.play-btn').click(function(){
        startProgressbar();
        $(this).css({display:"none"})
        $('.pause-btn').css({display:"flex"})
    });


    $(".sec1-lt").slick({
        slidesToShow:1,
        slidesToScroll:1,
        fade:true,
        arrows:false,
        asNavFor:$('.sec1-slick'),
    });
    $('.sec1-slick').slick({
        slidesToShow:1,
        slidesToScroll:1,
        fade:true,
        arrows:false,
        asNavFor:$('.sec1-lt'),
        draggable:false,
    });

    var percentTime2;
    var tick2;
    var time2 = 1;
    var progressBarIndex2 = 0;

    $('.progressWrap .progress').each(function(index) {
        var progress2 = "<div class='inProgresss inProgresss" + index + "'></div>";
        $(this).html(progress2);

    });
    function startProgressbar2() {
        resetProgressbar2();
        percentTime2 = 0;
        tick2 = setInterval(interval2, 10);
    }
    function interval2() {
        if (($('.sec1-slick .slick-track div[data-slick-index="' + progressBarIndex2 + '"]').attr("aria-hidden")) === "true") {
            progressBarIndex2 = $('.sec1-slick .slick-track div[aria-hidden="false"]').data("slickIndex");
            startProgressbar2();
        } else {
            percentTime2 += 1 / (time2 + 5);
            $('.inProgresss' + progressBarIndex2).css({
                width: percentTime2 + "%"
            });
            if (percentTime2 >= 100) {
                $('.sec1-slick').slick('slickNext');
                progressBarIndex2++;
                if (progressBarIndex2 > 2) {
                    progressBarIndex2 = 0;
                }
                startProgressbar2();
            }
        }
    }

    function resetProgressbar2() {
        $('.inProgresss').css({
            width: 0 + '%'
        });
        clearInterval(tick2);
    }
    startProgressbar2();
    // End ticking machine

    $('.progressWrap .item2').click(function () {
    	clearInterval(tick2);
    	var goToThisIndex2 = $(this).find("span").data("slickIndex");
    	$('.sec1-slick').slick('slickGoTo', goToThisIndex2, false);
        $('.sec1-pause').css({display:"block"});
        $('.sec1-play').css({display:"none"});
    	startProgressbar2();
    });

    $('.sec1-pause').click(function(){
        clearInterval(tick2);
        $(this).css({display:"none"})
        $('.sec1-play').css({display:"flex"})
    });
    $('.sec1-play').click(function(){
        startProgressbar2();
        $(this).css({display:"none"})
        $('.sec1-pause').css({display:"flex"})
    });


    var $elems = $(".elm");
    var winheight = $(window).height();
    var executed=false;
    $elems.addClass('active');
    $(window).scroll(function () {
        animate_elems();
    });
    function animate_elems() {
        wintop = $(window).scrollTop();
        $elems.each(function () {
            $elm = $(this);
            topcoords = $elm.offset().top;
            if(executed==false){
                if (wintop >= (topcoords - (winheight * 0.5))) {
                        var progressRate=$('.num').eq(0).attr("data-rate");
                        $({rate:0}).animate({rate:progressRate},{
                            duration:1000,
                            progress:function(){
                                var now=this.rate;
                                $('.num').eq(0).html(Math.ceil(now))
                            }
                        })
                        var progressRate1=$('.num').eq(1).attr("data-rate");
                        $({rate:0}).animate({rate:progressRate1},{
                            duration:1000,
                            progress:function(){
                                var now=this.rate;
                                $('.num').eq(1).html("0"+(Math.ceil(now)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','))
                            }
                        })
                        var progressRate2=$('.num').eq(2).attr("data-rate");
                        $({rate:0}).animate({rate:progressRate2},{
                            duration:1000,
                            progress:function(){
                                var now=this.rate;
                                $('.num').eq(2).html((Math.ceil(now)))
                            }
                        })
                        var progressRate3=$('.num').eq(3).attr("data-rate");
                        $({rate:0}).animate({rate:progressRate3},{
                            duration:1000,
                            progress:function(){
                                var now=this.rate;
                                $('.num').eq(3).html((Math.ceil(now)))
                            }
                        })
                
                    executed=true;
                }
            }
        });
    }; 

    $('.sec2-contents li').mouseenter(function(){
        let indexNum=$(this).index();
        let i=0;
        for(i=0;i<4;i++){
            $('.sec2-rt').removeClass("on"+i);
        }
        $('.sec2-rt').addClass('on'+indexNum);
    });
    $('.sec4-contents ul').slick({
        slidesToShow:3,
        slidesToScroll:1,
        appendArrows:$('.sec4-arrow'),
        prevArrow:"<div><i class='xi-angle-left'></i></div>",
        nextArrow:"<div><i class='xi-angle-right'></i></div>",
        responsive:[
            {
                breakpoint:1001,
                settings:{
                    slidesToShow:2,
                }
            },
            {
                breakpoint:601,
                settings:{
                    slidesToShow:1,
                }
            }
        ]
    });

    if($(window).width()<1240){
        $('.sec3-contents').slick({
            slidesToShow:3,
            slidesToScroll:1,
            centerMode:true,
            arrows:false,
            dots:true,
            appendDots:$('.sec3-mo-dot'),
            dotsClass:"sec3-dot",
            responsive:[
                {
                    breakpoint:601,
                    settings:{
                        slidesToShow:1,
                    }
                }
            ]
        });
    }
    $('.sec3-contents li').click(function(){
        let goIndex=$(this).data('slickIndex');
        $('.sec3-contents').slick('slickGoTo',goIndex,false)
    });
    $(window).on('load resize', function() { 		
        if($(window).width() < 1001 && $(window).width()>=601) { 			
            $('.sec3-contents').slick('unslick'); 		
        }else{ 			
            $('.sec3-contents').not('.slick-initialized').slick(slickOptions); 		
        } 
    });



    $('.family-tab').click(function(){
        $('.f-tab').stop().slideToggle();
    });
    $('.family-tab').mouseleave(function(){
        $('.f-tab').stop().slideUp();
    });



    $('.top-btn').click(function(){
        $('html,body').animate({
            scrollTop:0
        },500);
    });

    

  

})


