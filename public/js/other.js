/*杂七杂八小功能*/

/*顶部导航hover*/
function navHover(container, className) {
	
	var defaultHighlight = container.find('.' + className);	
	container.on('mouseenter', 'li', function(){
		$(this).addClass(className).siblings().removeClass(className);
	});
	
	container.mouseleave(function(){
		if (defaultHighlight.length > 0){
			defaultHighlight.addClass(className).siblings().removeClass(className);
		}
		else{
			$(this).find("li").removeClass(className);
		}
	})
}

navHover($('.nav_list'), 'nav_current');
navHover($('.sub-header .sub-nav'), 'cur');

/* 返回顶部按钮 */
(function(){
    var to_top = $('#to_top');
    if (to_top.length == 0){
        return;
    }
    $(window).on('scroll', function() {
	    var vh = $(window).height();
	    var st = document.documentElement.scrollTop || document.body.scrollTop;
	    if (st > vh) {
		    to_top.css('display', 'block');
	    } else {
		    to_top.css('display', 'none');
	    }
    });
})();



