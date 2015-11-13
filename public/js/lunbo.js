var LunBo = function(conf) {
	//大图容器
	var bigParent = conf['bigParent'];
	//小图容器
	var smallParent = conf['smallParent'];
	//文字容器
	var textParent = conf['textParent'];
	var index = 0;
	var speed = 5;
	
	var bigList = bigParent.find(".player-item");
	var textList = textParent.find(".txt");
	var smallList = smallParent.find("a");
	var num = smallList.length;
	var timer = null;
	var stayTimer = null;
	
	var loop = function() {
		index++;
		if (index >= num) {
			index = 0;
		}

		showIndex();
	}

	var showIndex = function() {
		for (i = 0; i < num; i++) {
			if (i == index) {
				$(bigList[i]).fadeIn(1000);
				$(textList[i]).addClass('ft');
				$(smallList[i]).addClass('on');
			} else {
				$(bigList[i]).hide();
				$(textList[i]).removeClass('ft');
				$(smallList[i]).removeClass('on');
			}
		}
	}

	var event = function() {
		smallParent.on('mouseenter', 'a', function() {
			var elem = this;
			//悬停200ms才会显示
			stayTimer = setTimeout(function(){
				stopAuto();
				index = getIndex(elem);
				showIndex();
			}, 200);
			return false;
		}).on('mouseleave', 'a', function() {
			clearTimeout(stayTimer);
			startAuto();
			return false;
		});
	}
	
	var getIndex = function(elem){
		for (i = 0; i < num; i++) {
			if (smallList[i] == elem) {
				return i;
			}
		}
		
		return 0;
	}
	
	var startAuto = function() {
		stopAuto();
		timer = setInterval(function() {
			loop();
		}, speed * 1000);
	}

	var stopAuto = function() {
		if (timer) {
			window.clearInterval(timer);
		}
	}

	var init = function() {
		event();
		startAuto();
	}

	return {
		init : init
	};
}
