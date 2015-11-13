@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>编辑分类</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="classname" value="{{$data['detail']->classname}}" class="smallinput"></span>
    </p>
    <p>
         <label>文件名</label>
         <span class="field"><input type="text" name="filename" value="{{$data['detail']->filename}}" class="smallinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="{{$data['detail']->sort}}" class="smallinput"></span>
    </p>
    <p>
         <label>所属分类</label>
         <span class="field">
         <select name="cid" id="selection">
         	<option value="0">--请选择--</option>
             @foreach($data['category'] as $val)
                <option value="{{$val['id']}}" @if($val['id'] == $data['detail']->cid) selected @endif>{{$val['classname']}}</option>
             @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>标题</label>
         <span class="field"><textarea name="Tilte">{{ $data['detail']->Tilte }}</textarea></span>
    </p>
    <p>
         <label>关键词</label>
         <span class="field"><textarea name="Keywords">{{ $data['detail']->Keywords }}</textarea></span>
    </p>
    <p>
         <label>描述</label>
         <span class="field"><textarea name="Descriptions">{{ $data['detail']->Descriptions }}</textarea></span>
    </p>
    <p>
         <label>相关选项</label>
         <span class="field" style="padding:11px;">
         	<input type="checkbox" name="is_wenhua" value="1" style="opacity: 0;" @if($data['detail']->is_wenhua==1) checked @endif> 域名是否wenhua开头
            <input type="checkbox" name="is_mini" value="1" style="opacity: 0;" @if($data['detail']->is_mini==1) checked @endif> 是否mini导航
            <input type="checkbox" name="status" value="1" style="opacity: 0;" @if($data['detail']->status==1) checked @endif> 是否导航显示
        </span>
    </p>    
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop
