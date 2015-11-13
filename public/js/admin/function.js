var jq = jQuery;
//单个点击更改状态
function changeStatus(obj,id,table,url,field){
	field = field ? field : 'status';
    jQuery.get(
		url, 
		{ id: id,table:table,field:field},
		function(jsondata){
			var data  = eval("("+jsondata+")");
			jQuery(obj).find('img').attr('src','/img/admin/status_'+data+'.png');
		}
	); 
}

//文章的内容匹配关键词
function parseKeywords(url){
	var content = $(".ke-edit-iframe").contents().find(".ke-content").html();
	console.log(content);
	  jQuery.post(
		url, 
		{content:content},
		function(jsondata){
 			var data  = eval("("+jsondata+")");
			$("#content").html(data['content']);
			$(".ke-edit-iframe").contents().find(".ke-content").html(data['content']);
			alert('替换成功！共替换了<span style="color:red;">'+data['num']+'</span>次');
		}
	); 
}

//文章中搜索诗词，话题
function relate(obj,whatField,url){
	var ajaxKeywords = $(obj).prev('input').val();
	if(!ajaxKeywords) return false;
	var haveData = false;
	$('.searchContent').each(function(){
		if($(this).attr('data') == (ajaxKeywords+'_'+whatField)){
			haveData = true;
			$(this).show();
		}
	});
	if(haveData){
		return true;
	} else{
		$('.searchContent').hide();
	}
	$.get(
		url, 
		{ ajaxKeywords: ajaxKeywords},
		function(jsondata){
			var html = '<ul class="searchContent" data="'+ajaxKeywords+'_'+whatField+'">';
			var data  = eval("("+jsondata+")");
			var len = data.length;
			if(len<1 || data == undefined){
				alert('没有找到<span style="color:red;">'+ajaxKeywords+'</span>类似数据！');
				return false;
			}
			for(i=0; i<len; i++){
				html += '<li onclick="addSearchContent(this,\''+whatField+'\','+data[i]['id']+')">'+data[i]['name']+'</li>';
			}
			html += '</ul>';
			$(obj).parent().parent().after(html);
		}
	); 
}

//搜索关键词 添加到对应的地方
function addSearchContent(obj,field,id){
	var content = $(obj).html();
	var selfclass = field+'_'+id;
	var existId = $('.'+selfclass).find('input').val();
	if(existId == id){
		return false;
	}
	var html = '<span class="u-relation-name '+selfclass+'">'+content+'<input type="hidden" name="'+field+'[]" value="'+id+'"><span class="close">x</span></span>';
	$('input[name="'+field+'"]').parent().append(html);
}

//批量更改状态
function option(table,url){
	var option = jq('#option').val();//操作
	if(option == 0){
		alert('请选择操作！');
		return;
	}
	var obj = jq(':checkbox[name="checkAll[]"]:checked');
	if(!obj.length){
    	alert('您没有选中任何选项！');
    	return false;
    }
	var data = '';
	obj.each(function(){
		data += jq(this).val()+',';
	});
	jQuery.get(
		url, 
		{table:table,option:option,data:data},
		function(data){
			alert(data['msg']);
		}
	); 
}

function uploadify(obj,url,path){
	var delImgPath = $(obj).siblings('input').attr('value');//如果存在删除的图片
	delImgPath = delImgPath ? delImgPath : '';	
	path = path ? path : 'news';
	$(obj).uploadify({
	   'formData' : {
		    'savePath' : path,
			'delImgPath' : delImgPath,
			'yearMonth' : '1',
		},
		'buttonText': 'Upload',
		'buttonClass': 'browser',
		'dataType':'html',
		'removeCompleted': false,			
		'swf'      : '/js/admin/uploadify/uploadify.swf',
		'uploader' : url,
		'multi' : false,
		'debug': false,
		'height': 30,
		'width':90,
		'auto': true,
		'fileTypeExts': '*.jpg;*.gif;*.png;*.jpeg;*.zip;*.torrent',
		'fileTypeDesc': '图片类型(*.jpg;*.jpeg;*.gif;*.png;*.zip,*.torrent)',
		'fileSizeLimit': '10240000',
		'progressData':'speed',
		'removeCompleted':true,
		'removeTimeout':0,
		'requestErrors':true,
		'onFallback':function()
		  {
			  alert("您的浏览器没有安装Flash");
		  },
		'onUploadSuccess' : function (file, resultData, response) {
			var result = eval("("+resultData+")");
			if(result.status == 0) {
			   alert(result.data);
			}else{
			 	var data = $(obj).siblings('input').attr('value',result.data);
			}
		}
	});
}

function changeCategory(obj,json){
	val = $(obj).val();
	$("select[name='nclassid']").remove();
	var str = '<select name="nclassid" style="margin-left:4px;"><option value="0">--请选择--</option>';
	for(i=0; i<json.length; i++){
		if(json[i]['cid'] == val){
			str += '<option value='+json[i]['id']+'>'+json[i]['classname']+'</option>';
		}
	}
	str += '</select>';
	$(obj).after(str);
}


$(".searchContent").live('mouseover',function(){
	$(this).show();
}).live('mouseout',function(){
	$(this).hide();
});

$(".u-relation-name .close").live('click',function(){
	$(this).parent().remove();
});