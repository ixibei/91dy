@extends('admin.layouts.header')
@section('contents') 
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>朝代管理 > 朝代列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('dynasty','{{URL::to('base/option')}}')">应 用</button>
    </div>
        
   <!--内容-->
  <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb">
    <thead>
      <tr>
        <th class="head0"  width="5%">
        	<div class="checker" id="uniform-undefined">
            	<span class="">
            		<div class="checker" id="uniform-undefined">
                    	<span class="">
			              	<input type="checkbox" class="checkall" style="opacity: 0;">
              			</span>
                	</div>
            	</span>
            </div>
        </th>
        <th class="head1">ID</th>
        <th class="head1">名称</th>
        <th class="head0" >文件名</th>
        <th class="head1"  width="5%">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($data as $key=>$val)
    <tr class="group">
      <td>
      	<div class="checker" id="uniform-undefined">
        	<span>
          		<div class="checker" id="uniform-undefined">
                	<span class="checked">
			            <input type="checkbox" name="checkAll[]"  value="{{$val['id']}}" style="opacity: 0;">
            		</span>
                 </div>
          	</span>
          </div>
      </td>
      <td>{{$val['id']}}</td>
      <td style=" text-align:left; margin-left:10px;">{{$val['classname']}}</td>
      <td>{{$val['filename']}}</td>
      <td class="center">{{ HTML::link(URL::action("Admin_DynastyController@getEdit",array($val['id'])), '编辑') }}</td>
    </tr>
    	@if(isset($val['children']))
        @foreach($val['children'] as $k=>$v)
        	    <tr>
                  <td>
                    <div class="checker" id="uniform-undefined">
                        <span>
                            <div class="checker" id="uniform-undefined">
                                <span class="checked">
                                    <input type="checkbox" name="checkAll[]"  value="{{$v['id']}}" style="opacity: 0;">
                                </span>
                             </div>
                        </span>
                      </div>
                  </td>
				  <td>{{$val['id']}}</td>
                  <td style=" text-indent:40px; text-align:left; margin-left:10px;">{{$v['classname']}}</td>
                  <td>{{$v['filename']}}</td>
                  <td class="center">{{ HTML::link(URL::action("Admin_DynastyController@getEdit",array($v['id'])), '编辑') }}</td>
                </tr>
	    @endforeach        
        @endif
    @endforeach
      </tbody>
  </table>
    </div>
@stop