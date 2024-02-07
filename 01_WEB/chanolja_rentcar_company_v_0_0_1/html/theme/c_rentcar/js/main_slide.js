

jQuery(function($){

	// �꾩쓽�� �곸뿭�� 留뚮뱾�� �ㅽ겕濡ㅻ컮 �ш린 痢≪젙
	function getScrollBarWidth(){
		if($(document).height() > $(window).height()){
			$('body').append('<div id="fakescrollbar" style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"></div>');
			fakeScrollBar = $('#fakescrollbar');
			fakeScrollBar.append('<div style="height:100px;">&nbsp;</div>');
			var w1 = fakeScrollBar.find('div').innerWidth();
			fakeScrollBar.css('overflow-y', 'scroll');
			var w2 = $('#fakescrollbar').find('div').html('html is required to init new width.').innerWidth();
			fakeScrollBar.remove();
			return (w1-w2);
		}
		return 0;
	}

	// 硫붿씤 鍮꾩＜�� �믪씠媛� �ㅼ젙
	if ( $("#main_visual.full-height").length > 0 ) {
		mainVisualHeight();
		function mainVisualHeight () {
			scrollWidth = getScrollBarWidth();
			var win_width = $(window).outerWidth() + scrollWidth;
			var visual_height = $(window).height();	// header媛� fixed or absolute�쇨꼍�� - $("#header").height() ��젣
			if ( win_width < 1221 ) {
				$(".main-visual-con").height(visual_height);
			}else {
				$(".main-visual-con").css("height","100%");
			}
		}
		$(window).on('resize', mainVisualHeight);
	}
	
	// 硫붿씤 鍮꾩＜�� 
	$(".main-visual-con").each(function  () {
		var $visualSlide = $(this);
		var $visualSlideItem = $(this).find(".main-visual-item");
		var visualNum = $visualSlideItem.length;
		var $visualControls = $(".visual-control");
	
		$visualControls.find('.paging-controls .total').text(visualNum);

		$visualSlide.on('init', function(event, slick) {
			$visualSlideItem.eq(0).addClass("active-item");
			$(".main-visual-con .slick-dots").find("li").eq(0).addClass("active-item");
		});
		$visualSlide.on('beforeChange', function(event, slick, currentSlide, nextSlide) {	
			// 鍮꾩＜�쇱쁺��
			$visualSlideItem.removeClass("active-item");
			$visualSlideItem.eq(nextSlide).addClass("active-item");
			// Custom paging
			$(".main-visual-con li").removeClass("active-item");
			$(this).find(".slick-dots").find("li").eq(nextSlide).addClass("active-item"); 
			// �꾩옱index �쒖떆
			$visualControls.find('.paging-controls .cur').text(nextSlide + 1);
		})

		// 硫붿씤 鍮꾩＜�� �щ씪�대뱶
		$visualSlide.slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			dots:true,
			autoplay:true,
			speed:1000,
			infinite:true,
			autoplaySpeed: 3000,
			easing: 'easeInOutQuint',
			pauseOnHover:false,
			zIndex:1,
			prevArrow: '.visual-control .prev',
			nextArrow: '.visual-control .next',
			customPaging : function(slider, i) {
				var title = $(slider.$slides[i].innerHTML).find('div[data-title]').data('title');
				var en_title = $(slider.$slides[i].innerHTML).find('div[data-en-title]').data('en-title');
				return '<a><p class="loading-bar-paging-tit"><strong>'+title+'</strong><span>'+en_title+'</span></p><span class="loading-bar-line"></span></a>';
			},
		});
			
		$visualControls.find('.pause-visual-btn').click(function  () {
			$visualSlide.slick("slickPause");
			$(this).hide().siblings().show();
		});
		$visualControls.find('.play-visual-btn').click(function  () {
			$visualSlide.slick("slickPlay");
			$(this).hide().siblings().show();
		});
	});


});

$(document).ready(function() {
    var btn = $(".btn");
    btn.click(function() {
        btn.toggleClass("paused");
        return false;
    });
});

$('.btn').on('click', function(e) {
    e.preventDefault();
            if (jQuery(this).hasClass("pause")) { // add class where you want to add class active for process
                jQuery(this).removeClass("pause");
    jQuery('.main-visual-con').slick('slickPause');
    jQuery('.left-banner-slide').slick('slickPause');
        jQuery(this).addClass("play");
            } else {
                jQuery(this).removeClass("play");
                jQuery(this).addClass("pause");
        $('.main-visual-con').slick('slickPlay');
        $('.left-banner-slide').slick('slickPlay');
    }
});



        //  e:main_visual        
        $('.slider_box2').slick({
            infinite:true,
            slidesToShow:1,
            autoplay:true,
            autoplaySpeed:2000,
            arrows:false,
            dots:false
        });




        // sec4 card_list




        $(document).ready(function() {
            var btn = $(".sec4_p");
            btn.click(function() {
                btn.toggleClass("paused");
                return false;
            });
        });

        $('.sec4_p').on('click', function(e) {
        e.preventDefault();
                if (jQuery(this).hasClass("pause")) { // add class where you want to add class active for process
                    jQuery(this).removeClass("pause");
        jQuery('.card_list').slick('slickPause');
            jQuery(this).addClass("play");
                } else {
                    jQuery(this).removeClass("play");
                    jQuery(this).addClass("pause");
            $('.card_list').slick('slickPlay');
        }
            
        });

        $('.card_list').each(function(){
        var $visualSlide = $(this);
        var $visualSlideItem = $(this).find(".list");
        var visualNum = $visualSlideItem.length;
        
        var $status = $('.sec4_paging');
        var $total = $('.sec4_total');
        var $slickElement = $('.card_list');

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.html( '<span class="current_slide">' + i + '</span>');
            $total.html( '<span class="total_slides"> ' + slick.slideCount + '</span>');
        });  
        $visualSlide.slick({
            infinite:true,
            slidesToShow:4,
            slidesToScroll: 1,
            autoplay:true,
            autoplaySpeed:1000,
            arrow:true,
            prevArrow: '.sec4_prev',
			nextArrow: '.sec4_next',
            responsive: [
                {
                breakpoint: 1600,
                settings: {
                    slidesToShow:3,
                    slidesToScroll:1,
                    infinite: true,
                }
                },
                {
                breakpoint:1220,
                settings: {
                    slidesToShow:3,
                    slidesToScroll:1,
                    infinite: true
                }
                },
                {
                breakpoint:900,
                settings: {
                    slidesToShow:1,
                    slidesToScroll: 1
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });        

        });


