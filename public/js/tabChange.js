function tabChange(conf) {
	var tabs = conf['tabs'];
	var contents = conf['contents'];
	var tabShowClass = conf['tabShowClass'] ? conf['tabShowClass'] : 'active';
    var evn = conf['event'] ? conf['event']:'click';
    var num = tabs.length;

	function init() {
		if (tabs.length != contents.length) {
			return false;
		}
	    if(evn == 'click'){
            for (var i=0; i<num; i++) {
                (function(index) {
                    $(tabs[index]).click(function() {
                        change(index);
                        return false;
                    });
                })(i);
            }

        }  else if(evn == 'mouseenter') {
            for (var i=0; i<num; i++) {
                (function(index) {
                    $(tabs[index]).mouseenter(function() {
                        change(index);
                        return false;
                    });
                })(i);
            }

        }
	}

    function change(index) {
        for (var j = 0; j < num; j++) {
            $(tabs[j]).removeClass(tabShowClass);
            $(contents[j]).hide();
        }

        $(tabs[index]).addClass(tabShowClass);
        $(contents[index]).show();
    }

	return {
		init : init
	};
}
