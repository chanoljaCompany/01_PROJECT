(function($){
	$.fn.iniTab = function(options){
		var defaults = {
			iniNumber : 0,
			number : 3,
			ptPercent : 30,
			ptPx : 100
		};
		
		var options = $.extend({}, defaults, options);
		var totalTab = $(this);
		// console.log(totalTab)
		
		iniTabCss();
		$(window).resize(function(){
			iniTabCss();
		})
			
		function iniTabCss(){
			
			var totalTabWidth = $(totalTab).width();
			var tabMenu = $(totalTab).find("a.tab");
			var tabMenuParent = $(tabMenu).parent();
			var tabMenuParentHeight = $(tabMenuParent).height();
			var tabMenuParentSize = tabMenuParent.size();
			var lineSize = Math.ceil(tabMenuParentSize/options.number);
			var ptPcValue = options.ptPercent * 0.01;
			
			// console.log(totalTabWidth)
			
			var tabMenuParentHeightLine = tabMenuParentHeight * lineSize;
			
			
			
			var tabMenuParentHeightPdTop = tabMenuParentHeightLine + tabMenuParentHeight*ptPcValue;
			
			// console.log(tabMenuParentHeight)
			// console.log(tabMenuParentHeightLine)
			// console.log(tabMenuParentHeight*ptPcValue)
			// console.log(tabMenuParentHeightPdTop)
			
			
			
			// console.log(lineSize)
			
			var tabMenuParentWidth = totalTabWidth/options.number;
			
			/* console.log(tabMenuParentSize); */
			tabMenuParent.css('width',tabMenuParentWidth);
			$(totalTab).css('padding-top',tabMenuParentHeightPdTop);
			$(totalTab).css('padding-top',options.ptPx);
			
			for(var i=0; i<tabMenuParentSize; i++){
				var tabMenuParentNth = $(tabMenuParent).eq(i);
				var tabMenuParentNthLeft = tabMenuParentWidth*(i-Math.floor(i/options.number)*options.number);
				var tabMenuParentNthTop = tabMenuParentHeight*Math.floor(i/options.number)
				
				
				tabMenuParentNth.css('left', tabMenuParentNthLeft).css('top',tabMenuParentNthTop);		
			}		
		}
		
		
	
		var tabMenu = $(totalTab).find("a.tab");
		var tabMenuParent = $(tabMenu).parent();
		
		var tabCont = $(totalTab).find(".tabCont");
		$(tabCont).addClass("blind");
		var targetEl = $(tabMenu).eq(options.iniNumber).attr("href");
		$(targetEl).removeClass("blind");
		$(tabMenu).parent().removeClass("on");
		$(tabMenu).eq(options.iniNumber).parent().addClass("on");
		//$(tabMenu).eq(options.iniNumber).children("img").attr("src", $(tabMenu).eq(options.iniNumber).children("img").attr("src").replace("_off", "_on"));

		var tab = options.iniNumber;
		var oldTab;
		$(tabMenu).click(function(){
			oldTab = tab;
			tab = $(tabMenu).index(this);
			if (oldTab != tab){
				$(tabMenu).eq(oldTab).parent().removeClass("on");
				$(tabMenu).eq(tab).parent().addClass("on");
				//$(tabMenu).eq(oldTab).children("img").attr("src", $(tabMenu).eq(oldTab).children("img").attr("src").replace("_on","_off"));
				//$(tabMenu).eq(tab).children("img").attr("src", $(tabMenu).eq(tab).children("img").attr("src").replace("_off","_on"));
				$(tabCont).addClass("blind");
				var targetEl = $(tabMenu).eq(tab).attr("href");
				$(targetEl).removeClass("blind");
				return false;
			}
			var targetEl = $(tabMenu).eq(tab).attr("href");
			$(targetEl).removeClass("blind");
			return false;
		});
		
	}
})(jQuery);
