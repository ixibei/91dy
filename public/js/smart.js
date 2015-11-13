/**
 * 搜狗机票smartbox
 * 调用示例：
 *   fSmart = SmartPlain();
 *   fSmart.init(from, "http://suggestion.www.kuxun.cn/jp_int_ext/index.php?source=sogou&q=");
 */
function SogouSmart(){
    /**
     * 输入框
     */
    var _input;

    /**
     * SmartBox数据获取接口,支持跨域
     */
	var _url;
	
    /**
     * 用于控制box展现的css类名
     */
    var _class;

    /**
     * 在body下创建的默认div Id
     */
    var _divId = "div_kan_hint";
    
    /**
     * 最小宽度
     */
    var _minWidth = 460; 
    
    var _offsetLeft = 4;
    var _offsetTop = 28;

    /**
     * Box宽度
     */
    var _width = _minWidth;
    
    var _form = null;
    /**
     * 默认宽度下能显示的字符串长度
     * 如果最长长度超过了这个，则按比例调整_width
     */
    var _strLen = 20;

    var _oWord = '';

    var _data = [];
    var _items = [];
    var _index = -1;
    var _preSearchWord;
    var _preKeyupWord;
	
	var _isOpen = false;

    /**
     * SmartBox初始化
     * @param  {[Jquery对象]}   input 需要加smartbox的元素
     * @param  {[type]}   url   smartBox数据获取接口,支持跨域
     * @param  {[string]} class smartbox外层div的class名，便于css控制不同的展现样式
     */
    var init = function(input, url, form, clas, width, offsetLeft, offsetTop){
        _minWidth = width?width:_minWidth;
        _offsetLeft = offsetLeft?offsetLeft:_offsetLeft;
        _offsetTop = offsetTop?offsetTop:_offsetTop;
        _input = input;
        _url = url;
        _class = clas;
        _form = form ? form : null;       

        _input.keyup(function(e){
            if(0 != _items.length && e.keyCode == 38){ //up
                _index = (_index < 0) ? (_items.length - 1) : (_index - 1);
                _clearHover();
                _setHover();
				if(-1 != _index){
					_input.attr('correct', true);
                }
            }else if(0 != _items.length && e.keyCode == 40){ //down
                _index = (_index > _items.length - 1) ? 0 : (_index + 1);
                _clearHover();
                _setHover();
				if(-1 != _index){
					_input.attr('correct', true);
                }
            }else if(e.keyCode == 13){ //Enter   
                //if(_preKeyupWord == $.trim(_input.val())){
                if(-1 != _index){
					_input.attr('correct', true);
                    _close();
                }else{
                    _search();
                }
            }else if(e.keyCode == 27){ //Esc
                _input.val(_oWord);
                _clearHover();
                _close();
            }else if(_preSearchWord != _input.val()){
                _search();
            }
            _preKeyupWord = $.trim(_input.val());
            return true;
        });

		_input.click(function(e){
			if(_isOpen){
				setTimeout(function(){
					_close();
				},100);
			}    
        });
		
        _input.blur(function(e){
			if(_isOpen){
				setTimeout(function(){
					_close();
				},362);
			}    
        });
    };

    var _search = function(){        
		_preSearchWord = $.trim(_input.val());              
		if(0 == _preSearchWord.length){
			_close();
			return;
		}
		
		$.ajax({
			type: "get",
			dataType: "jsonp",
			url: _url + encodeURIComponent(_preSearchWord),
			scriptCharset:'gbk',
			complete :function(data){
				return;
				/*
				if(0 == data.responseText.length){
					return;
				}
				var data = JSON.parse(data.responseText);				  
				_close();
				_oWord = _input.val();
				_data = data;
				_input.attr('correct', _isInData($.trim(_input.val())));
				_open();
				*/ 
			}
		});
    };
     
    window.sogou={};
    window.sogou.sug = function(response, status){
    	var data = response[1];
    	if (0 == data.length){
    		return;
    	}
    			  
		_close();
		_oWord = _input.val();
		_data = data;
		_input.attr('correct', _isInData($.trim(_input.val())));
		_open(); 
    }

    var _escapseHtml = function(text){
        if(text == undefined) return '';
        return text.replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }; 

    var _close = function(){
        _data = [];
		_isOpen = false;
        _items = [];
        _index = -1;
        $('#'+_divId).remove();
    }

    // 清除选中样式
    var _clearHover = function(){
        for (pos in _items) {
            _items[pos].removeClass('hover');
        }
    };

    // 清除选中样式
    var _setHover = function(){
       if(-1 == _index || _index == _items.length){
            _input.val(_oWord) 
        }else{
            _input.val(_items[_index].attr('item'));
             _items[_index].addClass('hover'); 
        }
    };

    var _open = function(){
        if( undefined == _data || 0 == _data.length ){
            return;
        }
		
		_isOpen = true;

        //Create Div
        var div = $("<div/>").attr('id', _divId).attr('class', "smartkey");
        var maxStrLen = 0;

        //Create items
        for(var idx=0; idx<_data.length; idx++){
			var hint = _data[idx];
			maxStrLen = (hint.length > maxStrLen) ? hint.length : maxStrLen;
			var a = $("<a/>").html(_escapseHtml(hint).replace(_input.val(), '<span class="key">' + _input.val() + '</span>'));
			a.attr('item', hint);
			_items.push(a);
			div.append(a);
        }
        
        //Adjust location and size
        if(maxStrLen > _strLen){
            _width = parseInt(((maxStrLen - _strLen)/_strLen + 1) * _minWidth);
        }else{
            _width = _minWidth;
        }
        var style="display:block;"+
                  "top:"+parseInt((_input.offset().top+_offsetTop))+"px;"+
                  "left:"+parseInt(_input.offset().left-_offsetLeft)+"px;"+
                  "width:"+_width+"px;"+
                  "z-index:1000;";   
        div.attr('style', style);
        $("body").append(div);
        
        //Bind Click
        $('#'+_divId).delegate('a', 'click', function(e){     
			_input.attr('correct', true);
            var word = $(this).attr('item');
            _input.val(word);
            
            if (_form){
                _form.submit();
            }
        });
    }
	
	//target内的值是否在smartbox的数据中
	var _isInData = function(value){
		return true;
	}

    return {
        'init':init
    }
};
