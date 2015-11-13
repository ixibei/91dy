@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<div class="contenttitle2">
	<h3>幻灯片编辑</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field">
         	<input type="text" name="ftitle" value="{{$data['detail']->ftitle}}" class="smallinput">
            <select name="fclass" id="parent" style="min-width:120px;" onchange="changeCategory(this)">
                <option value="0">--请选择--</option>
                 @foreach($data['category'] as $val)
                 <option value="{{$val->id}}" @if($val->id == $data['detail']->classid) selected @endif>{{$val->classname}}</option>
                 @endforeach
            </select>
         </span>
    </p>
    <p>
         <label>大图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="bpic" class="smallinput" value="{{$data['detail']->bpic}}">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>小图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="spic" class="smallinput" value="{{$data['detail']->spic}}">
            <button class="stdbtn btn_lime" id="uploadNewsImg1">Upload</button>
         </span>
    </p>
    <p>
         <label>URL地址</label>
         <span class="field"><input type="text" name="furl" value="{{$data['detail']->furl}}" class="smallinput"> </span>
    </p>
    <p>
         <label>介绍</label>
         <span class="field"><textarea name="intro" >{{$data['detail']->intro}}</textarea> </span>
    </p>
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script type="text/javascript">
var json = [
	@foreach($data['ncategory'] as $key=>$val)
		{cid:{{$val->cid}},id:'{{$val->id}}',classname:'{{$val->classname}}'},
	@endforeach
]

initCategory();
function initCategory(){
	var classid = '{{ $data['detail']->classid }}';
	var nclassid = '{{ $data['detail']->fclass }}';
	var str = '<select name="fclass" style="margin-left:4px;">';
	for(i=0; i<json.length; i++){
		if(json[i]['cid'] == classid){
			if(json[i]['id'] == nclassid){
				str += '<option selected value='+json[i]['id']+'>'+json[i]['classname']+'</option>';
			} else {			
				str += '<option value='+json[i]['id']+'>'+json[i]['classname']+'</option>';
			}
		}
	}
	str += '</select>';
	$("select[name='fclass']").after(str);
}


function changeCategory(obj){
	val = $(obj).val();
	$(obj).next().remove();
	var str = '<select name="fclass" style="margin-left:4px;">';
	for(i=0; i<json.length; i++){
		if(json[i]['cid'] == val){
			str += '<option value='+json[i]['id']+'>'+json[i]['classname']+'</option>';
		}
	}
	str += '</select>';
	$(obj).after(str);
}


uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}','slide');
uploadify('#uploadNewsImg1','{{ url("uploadify/upload") }}','slide');
</script>
@stop
