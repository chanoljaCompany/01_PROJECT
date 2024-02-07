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

    // $(window).scroll(function(){
    //     if ($(window).scrollTop() >= 10) {
    //         $('.sub').addClass('sticky');
    //     }
    //     else {
    //         $('.sub').removeClass('sticky');
    //     }
    // });
    
});//end
