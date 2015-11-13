var imageRoll = function(conf) {
    var parent = conf['parent'];
    var toLeft = conf['toLeft'];
    var toRight = conf['toRight'];
    //每个图的宽度
    var oneWidth = conf['oneWidth'];
    //每页翻多少个图
    var pageNum = conf['pageNum'];
    //最后一页多少个图
    var leftNum = conf['leftNum'] ? conf['leftNum'] : pageNum;    

    var allNum = conf['allNum'];
    
    if (allNum == 0){
        return;
    }
    
    if (allNum == pageNum){
        toLeft.hide();
        toRight.hide();
        return;
    }

    var pageLength = oneWidth * pageNum;
    var minLength = -1 * (oneWidth * allNum - oneWidth * leftNum);
    var length = 0;
    
    toRight.click(function() {
        if (parent.is(":animated")) {
            return;
        }
        
        //翻到最后一页
        if (length == minLength){
            length = 0;
        }
        else{
            length -= pageLength;
            if (length < minLength){
                length = minLength;
            }
        }
        parent.animate({
            left : length
        }, 500);

        return false;
    });

    toLeft.click(function() {
        if (length == 0){
            length = minLength;
        }
        else{
            length += pageLength;
            if (length > 0){
                length = 0;
            }
        }
        parent.animate({
            left : length
        }, 500);
        
        return false;
    });
}
