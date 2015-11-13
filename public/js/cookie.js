if (typeof String.trim != 'function'){
    String.prototype.trim = function(){
        return this.replace(/(^\s*)|(\s*$)/g, "");
    }
}

function cookie_set(name, value, expires, path){
    if(expires == 'long'){
        var date = new Date();
        date.setTime(date.getTime() + (3650 * 24 * 60 * 60 * 1000));
        expires = date.toUTCString();
    }
    else if(typeof expires == 'object'){
        expires = expires.toUTCString();
    }
    document.cookie = (name+'='+value+(expires?'; expires='+expires:'')+";path="+(path ? path : "/") );
}

function cookie_get(name){
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.substring(0, name.length + 1) == (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}

function cookie_del(name){
    cookie_set(name, null, new Date(1970,1,1));
}

