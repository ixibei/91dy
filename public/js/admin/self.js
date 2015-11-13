var autoNav = function(){
    var _self = this;

    this._construct = function(){
        _self._initNav();
    }

    this._initNav = function(){
        if(!navgation){
            alert('NO MESSAGE !');
        }
        navgation = eval(""+navgation+"");
        var groups = '';
        var current = '';
        var nav = '';
		var expand = 'style="display:none;"';
		if(_expand == 1){
			expand = 'style="display:block;"';
		}
        for(i in navgation){
            if(i == 0){
                current = 'class="current"';
                nav += '<div class="vernav2 iconmenu" style="display:block;" data="menu'+navgation[i]['sort']+'"><ul>';
            } else {
                current = '';
                nav += '<div class="vernav2 iconmenu" style="display:none;" data="menu'+navgation[i]['sort']+'"><ul>';
            }
            groups += '<li '+current+' id="menu'+navgation[i]['sort']+'"><a href="javascript:void(0)"><span class="icon icon-flatscreen"></span>'+navgation[i]['name']+'</a></li>';//大栏目
            //组中有导航菜单
            if(navgation[i]['children']){
                for(k in navgation[i]['children']){
                    //组中导航菜单存在子菜单
                    if(navgation[i]['children'][k]['children']){
                        nav += '<li><a href="#formsub'+navgation[i]['children'][k]['id']+'" class="editor">'+navgation[i]['children'][k]['name']+'</a>';
                        nav += '<ul id="formsub'+navgation[i]['children'][k]['id']+'" '+expand+'>';
                        for(j in navgation[i]['children'][k]['children']){
							if(navgation[i]['children'][k]['children'][j]){
								var navEscape = navgation[i]['children'][k]['children'][j]['url'].replace('/','_');
								nav += '<li id="menu_'+navEscape+'" ><a target="iframeContent" href="'+navgation[i]['children'][k]['children'][j]['url']+'">'+navgation[i]['children'][k]['children'][j]['name']+'</a></li>';
							}                            
                        }
                        nav += '</ul></li>';
                    } else {
                        nav += '<li><a href="'+navgation[i]['children'][k]['url']+'" class="elements">'+navgation[i]['children'][k]['name']+'</a></li>';//不存在子菜单
                    }
                }
            }
            nav += '</ul><a class="togglemenu"></a><br /><br /></div>';
        }
        jQuery(".header").after(nav);
        jQuery(".headermenu").html(groups);
        _self.autoNav()//自动展开页面
    }

    this.autoNav = function(){
        var trueUrl = jQuery.cookie('currentUrl');//当前cookie中是否存在着之前的url
        jQuery('.headermenu li').removeClass('current');
        if(trueUrl){
			var url = trueUrl.replace('/','_');
            var html = jQuery('#menu_'+url).html();
            jQuery('#menu_'+url).addClass('current');//子导航
			jQuery('#menu_'+url).parent().show();
            jQuery('#menu_'+url).parent().parent().addClass('current');//导航
            var obj = jQuery('#menu_'+url).parent().parent().parent().parent();
            var id = obj.attr('data');
            obj.siblings().find('.vernav2').hide();
            obj.show();
            if(!jQuery('#'+id).hasClass('current')){
                jQuery('#'+id).addClass('current');
            }
            jQuery("#iframeContent").attr('src',trueUrl);
        } else {
			//如果第一次登入没有cookie的情况下，默认跳转到新闻详情里
            jQuery('#menu_news_index').parent().parent().addClass('current');//导航
			var obj = jQuery("#menu_news_index").parent().parent().parent().parent();
            obj.siblings().find('.vernav2').hide();
            obj.show();
			$("#menu_news_index").addClass('current');
			$("#menu3").addClass('current');
		}
    }

}

jQuery(function(){
    var nav = new autoNav();
    nav._construct();
});