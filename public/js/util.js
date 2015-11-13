function KanUtil(){
    function readGet() {
        var uriStr = window.location.href.replace(/&amp;/g, '&').replace(/\#.*$/, '');
        var _GET = {};
        var paraArr, paraSplit;
        if (uriStr.indexOf('?') > - 1) {
            uriArr = uriStr.split('?');
            paraStr = uriArr[1];
        }
        else {
            return _GET;
        }
        if (paraStr.indexOf('&') > - 1) {
            paraArr = paraStr.split('&');
        }
        else {
            paraArr = new Array(paraStr);
        }
        for (var i = 0; i < paraArr.length; i++) {
            try {
                paraArr[i] = paraArr[i].indexOf('=') > - 1 ? paraArr[i] : paraArr[i] + '=';
                paraSplit = paraArr[i].split('=');
                _GET[paraSplit[0]] = decodeURIComponent(paraSplit[1].replace(/\+/g, ' '));
            }
            catch(e) {
                //may have malform url error
            }
        }
        return _GET;
    }; 

    return {
        readGet:readGet
    };
}

Util = KanUtil();
