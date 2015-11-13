function Performance(care){
    if (!care){
        care = [
            'site.css',
            'jquery.min.js',
        ];
    }

    if (typeof performance!="object" || typeof performance.getEntries!="function") {
        return;
    }

    var rd = Math.round;
    var c = document.cookie;
    var loc = c.match(/IPLOC=(\w+)/)?RegExp.$1:'_';

    function cal(rawData){
        var p = rawData;
        var result = {
            name:p.resource ? p.resource : spb_vars.pcode,
            dns:rd(p.domainLookupEnd - p.domainLookupStart),
            tcp:rd(p.connectEnd - p.connectStart),
            dl1:rd(p.responseEnd - p.fetchStart),
            dl2:rd(p.responseEnd - p.responseStart),
            loc:loc
        };

        return result;
    }

    function mkLog(d){
        var log = [];
        for (var i=0;i<d.length;i++){
            var item = [];
            for (var k in d[i]){
                item.push([k, d[i][k]].join('='));   
            }

            log.push(item.join(','));
        }

        return log.join('||');
    }

    var row = performance.getEntries();
    var pList = [performance.timing];
    //获取所关心项目的时间值
    for (var i=0; i<row.length; i++){
        for (var j=0; j<care.length; j++){
            if (row[i].name.indexOf(care[j]) != -1){
                row[i].resource = care[j]; 
                pList.push(row[i]);
            }
        }       
    }
    
    //计算所关心项目的各时间值
    for (var i=0; i<pList.length; i++){
        pList[i] = cal(pList[i]);
    }

    console.table(pList);
    
    if(Math.random()*(100 - 1) + 1 > 95) {
        var log = mkLog(pList);
        var img = new Image;
        img.src = "/img/performance.gif?"+log;
    }
}

$(document).ready(function(){
    Performance();
});
