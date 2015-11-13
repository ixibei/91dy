(function($, factory) {
    if ($) {
        factory($)
    }
})(window.jQuery, function($) {

    var init = function() {

        var unique = null;

        var app = function() {
            this._guid = 0;
            this.data = null;
        };

        $.extend(app.prototype, {
            guid: function() {
                return 'a_d_' + (this._guid++)
            },
            createElement: function(d) {
                var dfd = $.Deferred();
                if (!d) {
                    dfd.reject();
                    return;
                };
                var $el = $('<div>', {
                    id: this.guid(),
                    style: d.extend
                }).addClass(d.className);
                if (d.pbflag) {
                    $el.attr('pbflag', d.pbflag)
                };

                dfd.resolve($el);
                return dfd;
            },
            createImg: function(d) {
                if (d.$target.length == 0) return;
                this.createElement(d).then(function($el) {
                    var w = d.css.width;
                    var h = d.css.height;
                    if (d.className == 'wd-module') { // 宽窄屏不设置宽
                        delete d.css.width;
                    };
                    $el.css(d.css || {}).append('<a href="' + d.targeturl + '" target="_blank" style="display:block;width:' + w + 'px;height:' + h + 'px;"><img style="display:block;width:100%;height:100%;" src="' + d.fileurl + '" /></a>');
                    d.$target[d.method]($el);
                });
            },
            createIframe: function(d) {
                if (d.$target.length == 0) return;
                this.createElement(d).then(function($el) {
                    $el.css(d.css).append('<iframe src="' + d.fileurl + '" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>');
                    d.$target[d.method]($el);
                });
            },
            load: function(d) {
                if (',41,51,61,71,81,'.indexOf(',' + d.pid + ',') > -1) {
                    var $el = $('.sub_nav_bg');

                    $.extend(d, {
                        css: {
                            width: 1200,
                            height: 70,
                            margin: '20px auto',
                            overflow: 'hidden'
                        },
                        $target: $el.length ? $el : $('.nav_bg'),
                        method: 'after',
                        className: 'wd-module'
                    })
                } else if (d.pid == 92) {
                    $.extend(d, {
                        css: {
                            width: 240,
                            height: 100,
                            marginTop: 10,
                            marginBottom: 10
                        },
                        $target: $('.comic-intro dt'),
                        method: 'append'
                    })
                } else if (d.pid == 91) {
                    $.extend(d, {
                        css: {
                            width: 860,
                            height: 90
                        },
                        //$target: $('.comic-intro'),
                        //method: 'after'
                        $target: $('#recommend_module'),
                        method: 'before'
                    });
                };
                if (d.mtype == 2) {
                    this.createImg(d);
                } else if (d.mtype == 5) {
                    this.createIframe(d);
                }

            },
            init: function() {
                var advid = location.href.match(/adv_id=([\d,]+)/);
                advid && (advid = advid[1]);

                $.ajax({
                    url: advid ? 'http://advadmin.d.sogou-inc.com/AdvPreview.php' : '/GetAdv.php',
                    dataType: "jsonp",
                    data: advid ? {
                        adv_id: advid
                    } : {
                        pcode: spb_vars.pcode, //'tv_player'
                        id: window.gid || 0 //'180830436'
                    }
                }).done($.proxy(function(data) {
                    if (!data) return;
                    this.data = data
                    for (var id in data) {
                        if (data.hasOwnProperty(id)) {
                            this.load(data[id][0])
                        };
                    };
                }, this));
            }
        });
        return function() {
            return unique || (unique = new app)
        }
    }();

    $(function() {
        var app = init();
        app.init();
    });
});
