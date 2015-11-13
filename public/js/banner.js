 (function(factory, cookie) {
     var t = +new Date;
     var t1 = 1447084800 * 1000;
     var t2 = 1447257600 * 1000;
     if (t > t1 && t < t2 && cookie('tm1111') == null) {
         factory(cookie);
     };
 })(function(cookie) {

     var url = location.href;
     // /^https?:\/\/haha\.sogou\.com.*/.test(url)
     var href;

     if (url.indexOf('haha.sogou.com') > -1) {
         href = 'http://s.click.taobao.com/t?e=m%3D2%26s%3DAYA5xf8rpJEcQipKwQzePCperVdZeJviK7Vc7tFgwiFRAdhuF14FMbXa%2BdK35EMEJ1gyddu7kN9bpnDuwQww1MeQPEbgvEegBtx5xlc67yQXd%2Fi%2BOyEoxKUuZxIcp9pfUIgVEmFmgnbDX0%2BHH2IEVaX4VWt66S4EJPwiig1bxLP9BvYCQR6XAr%2BKQ71wHNCAqP8YyUoZZlq4cXg3ii9waXPs9Sj9Qli1np4c65at3FeX3cwyLTlAhj2l4PysJx%2FP'
     } else if (url.indexOf('tianqi.sogou.com') > -1) {
         href = 'http://s.click.taobao.com/t?e=m%3D2%26s%3DT8ls3uccotwcQipKwQzePCperVdZeJviK7Vc7tFgwiFRAdhuF14FMct1VKrhA%2F%2F1RitN3%2FurF3xbpnDuwQww1MeQPEbgvEegd7gSrgbW%2FvBLRbz3emjrhKUuZxIcp9pfUIgVEmFmgnbDX0%2BHH2IEVaX4VWt66S4EJPwiig1bxLP9BvYCQR6XAr%2BKQ71wHNCAqP8YyUoZZlq4cXg3ii9waXPs9Sj9Qli1np4c65at3FeX3cwyLTlAhj2l4PysJx%2FP'
     } else if (url.indexOf('tuan.sogou.com') > -1) {
         href = 'http://s.click.taobao.com/t?e=m%3D2%26s%3D9FoKTVkCoLMcQipKwQzePCperVdZeJviK7Vc7tFgwiFRAdhuF14FMQ%2FepOWqGzmVt4hWD5k2kjNbpnDuwQww1MeQPEbgvEegv8noTrvgU7TTuM2c0GZd%2FqUuZxIcp9pfUIgVEmFmgnbDX0%2BHH2IEVaX4VWt66S4EJPwiig1bxLP9BvYCQR6XAr%2BKQ71wHNCAqP8YyUoZZlq4cXg3ii9waXPs9Sj9Qli1np4c65at3FeX3cwyLTlAhj2l4PysJx%2FP'
     } else if (url.indexOf('mai.sogou.com') > -1) {
         href = 'http://s.click.taobao.com/t?e=m%3D2%26s%3DFEoOcbWh12IcQipKwQzePCperVdZeJviK7Vc7tFgwiFRAdhuF14FMWp4IuoKuYQOlovu%2FCElQOtbpnDuwQww1MeQPEbgvEegv8noTrvgU7RnnSIfW387waUuZxIcp9pfUIgVEmFmgnbDX0%2BHH2IEVaX4VWt66S4EJPwiig1bxLP9BvYCQR6XAr%2BKQ71wHNCAqP8YyUoZZlq4cXg3ii9waXPs9Sj9Qli1np4c65at3FeX3cwyLTlAhj2l4PysJx%2FP'
     } else {
         // url.indexOf('kan.sogou.com') > -1
         href = 'http://s.click.taobao.com/t?e=m%3D2%26s%3DEdWs8TtJMbocQipKwQzePCperVdZeJviK7Vc7tFgwiFRAdhuF14FMdNUDL3r%2BFI%2Ft4hWD5k2kjNbpnDuwQww1MeQPEbgvEegBtx5xlc67yQZzfvm8NhVjqUuZxIcp9pfUIgVEmFmgnbDX0%2BHH2IEVaX4VWt66S4EJPwiig1bxLP9BvYCQR6XAr%2BKQ71wHNCAqP8YyUoZZlq4cXg3ii9waXPs9Sj9Qli1np4c65at3FeX3cwyLTlAhj2l4PysJx%2FP'
     };

     document.write('<a href="' + href + '" id="tm1111_banner" target="_blank" style="background:url(http://p0.123.sogoucdn.com/imgu/2015/11/20151102193900_209.png) center no-repeat; width:100%; height:60px; display:block; position:relative; z-index:100"><span id="tm1111_banner_close" style="width:26px; height:26px;position:absolute; left: 50%; top:0; margin-left: 466px;"></span></a>');

     var banner = document.getElementById('tm1111_banner');

     document.getElementById('tm1111_banner_close').onmousedown = function(e) {
         e || (e = window.event);
         if (e.stopPropagation) {
             e.stopPropagation();
             e.preventDefault();
         } else {
             e.returnValue = false;
         };
         
         cookie('tm1111', 1, {
             expires: 3,
             path:'/'
         });
         banner.style.display = 'none';
         banner = null;
         
         return false;
     }
 }, function(name, value, options) {
     if (typeof value != 'undefined') { // name and value given, set cookie
         options = options || {};
         if (value === null) {
             value = '';
             options.expires = -1;
         }
         var expires = '';
         if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
             var date;
             if (typeof options.expires == 'number') {
                 date = new Date();
                 date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
             } else {
                 date = options.expires;
             }
             expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
         }
         var path = options.path ? '; path=' + options.path : '';
         var domain = options.domain ? '; domain=' + options.domain : '';
         var secure = options.secure ? '; secure' : '';
         document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
     } else { // only name given, get cookie
         var cookieValue = null;
         if (document.cookie && document.cookie != '') {
             var cookies = document.cookie.split(';');
             for (var i = 0; i < cookies.length; i++) {
                 var cookie = cookies[i].replace(/^\s+|\s+$/g,'');
                 // Does this cookie string begin with the name we want?
                 if (cookie.substring(0, name.length + 1) == (name + '=')) {
                     cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                     break;
                 }
             }
         }
         return cookieValue;
     }
 });
