
jQuery(window).ready(function () {
	_lightbox();
});

/** LightBox
 **************************************************************** **/
function _lightbox() {
	var _el = jQuery(".lightbox");

	if(_el.length > 0) {

		if(typeof(jQuery.magnificPopup) == "undefined") {
			return false;
		}

		jQuery.extend(true, jQuery.magnificPopup.defaults, {
			tClose: 		'Close',
			tLoading: 		'Loading...',

			gallery: {
				tPrev: 		'Previous',
				tNext: 		'Next',
				tCounter: 	'%curr% / %total%'
			},

			image: 	{ 
				tError: 	'Image not loaded!',
				titleSrc: function(item) {
					var _data = '';
					if(item.el.attr('data-source')){
						_data += '<a class="image-source-link line-height-25" href="'+item.el.attr('data-source')+'" target="_self">' + item.el.attr('title') + '</a>';
					}
					if(item.el.attr('data-content')){
						_data += '<small class="mt-5 fs-14 line-height-20">'+item.el.attr('data-content')+'</small>';
					}
					return _data;
				}
			},

			ajax: 	{ 
				tError: 	'Content not loaded!' 
			}
		});

		_el.each(function() {

			var _t 			= jQuery(this),
				options 	= _t.attr('data-plugin-options'),
				config		= {},
				defaults 	= {
					type: 				'image',
					fixedContentPos: 	false,
					fixedBgPos: 		false,
					mainClass: 			'mfp-no-margins mfp-with-zoom',
					closeOnContentClick: true,
					closeOnBgClick: 	true,
					image: {
						verticalFit: 	true
					},

					zoom: {
						enabled: 		false,
						duration: 		300
					},

					gallery: {
						enabled: false,
						navigateByImgClick: true,
						preload: 			[0,1],
						arrowMarkup: 		'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
						tPrev: 				'Previous',
						tNext: 				'Next',
						tCounter: 			'<span class="mfp-counter">%curr% / %total%</span>'
					},
				};

			if(_t.data("plugin-options")) {
				config = jQuery.extend({}, defaults, options, _t.data("plugin-options"));
			}

			jQuery(this).magnificPopup(config);

		});

	}

}