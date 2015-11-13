//轮播大图
var lunboConf = {
	'bigParent' : $("#lunboBig"),
	'smallParent' : $("#lunboSmall"),
	'textParent' : $("#lunboText")
}

var lunbo = new LunBo(lunboConf);
lunbo.init();

//喜剧排行榜切换
var rankConf = {
	'tabs' : $("#xiju_rank .tab-right-s a"),
	'contents' : $("#xiju_rank .wd-right-bang"),
	'tabShowClass' : 'select',
    'event' : 'mouseenter'
}
var tbChange_xiju = tabChange(rankConf);
tbChange_xiju.init();
//动作排行榜切换
var rankConf = {
	'tabs' : $("#dongzuo_rank .tab-right-s a"),
	'contents' : $("#dongzuo_rank .wd-right-bang"),
	'tabShowClass' : 'select',
    'event' : 'mouseenter'
}
var tbChange_dongzuo = tabChange(rankConf);
tbChange_dongzuo.init();
//恐怖排行榜切换
var rankConf = {
	'tabs' : $("#kongbu_rank .tab-right-s a"),
	'contents' : $("#kongbu_rank .wd-right-bang"),
	'tabShowClass' : 'select',
    'event' : 'mouseenter'
}
var tbChange_kongbu = tabChange(rankConf);
tbChange_kongbu.init();
//爱情排行榜切换
var rankConf = {
	'tabs' : $("#aiqing_rank .tab-right-s a"),
	'contents' : $("#aiqing_rank .wd-right-bang"),
	'tabShowClass' : 'select',
    'event' : 'mouseenter'
}
var tbChange_aiqing = tabChange(rankConf);
tbChange_aiqing.init();

//付费频道滚动
var vipRollConf = {
parent : $("#vip_image_roll .roll"),
toLeft : $("#vip_image_roll .hover-left"),
toRight : $("#vip_image_roll .hover-right"),
oneWidth : 220,
pageNum : 4,
leftNum : 5.6,
allNum : $("#vip_image_roll .roll .tele-bw-item-fix7").length
}
width = vipRollConf.allNum*(200+20)+400+"px";
$("#vip_image_roll .roll").width(width);
imageRoll(vipRollConf);

//预告片滚动
var trailerRollConf = {
parent : $("#trailer_image_roll .roll"),
toLeft : $("#trailer_image_roll .hover-left"),
toRight : $("#trailer_image_roll .hover-right"),
oneWidth : 220,
pageNum : 5,
leftNum : 5.6,
allNum : $("#trailer_image_roll .roll .tele-bw-item-fix2").length
}
width = trailerRollConf.allNum*(200+20)+400+"px";
$("#trailer_image_roll .roll").width(width);
imageRoll(trailerRollConf);
