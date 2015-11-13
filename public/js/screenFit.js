var screenType = '';
//¿íÕ­±ä»»js
(function(){
    var _isInArr = function(item, arr) {
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] == item) {
                return true;
            }
        }
        return false;
    };
    var _getIndex = function(item, arr) {
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] == item) {
                return i;
            }
        }
        return -1;
    };
    var _addClass = function(cls, elem) {
        var oriCls = elem.className,
            oriClsArr = oriCls.split(' ');
        if (_isInArr(cls, oriClsArr)) {
            return;
        }
        elem.className = oriCls + ' ' + cls;
    };
    
    var _removeClass = function(cls, elem) {
        var oriCls = elem.className,
            oriClsArr = oriCls.split(' ');
        if (_isInArr(cls, oriClsArr)) {
            var index = _getIndex(cls, oriClsArr);
            oriClsArr.splice(index, 1);
            elem.className = oriClsArr.join(' ');
        }
    };
    
    var _body = document.body;
    var _is980 = location.href.indexOf("m=1") > 0;
    var _type = _body.getAttribute("data-type");
    var _set = function(){
        var _width = Math.max(document.documentElement.clientWidth, _body.clientWidth);
        
        if (_type || _width<1251 || _is980){
            _addClass('sg-w980', _body);
            screenType = '_s';
        }else{
            _removeClass('sg-w980', _body);
        }
    };
    
    if (window.addEventListener) {
        window.addEventListener('resize', function() {
            _set()
        })
    } else if (window.attachEvent) {
        window.attachEvent('onresize', function() {
            _set()
        })
    };
    _set();
})();
