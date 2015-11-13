<?php

//admin 后台域名
$domain = substr($_SERVER['HTTP_HOST'],strpos($_SERVER['HTTP_HOST'],'.')+1);

Route::group(['domain'=>'www.'.$domain,'prefix'=>'','before'=>'website'],function() {

	Route::any('/', array('uses' => 'HomeController@index'));

	Route::any('/category/{url}', array('uses' => 'MovieCategoryController@index','as'=>'movieCategory'));
	Route::any('/category/{url}/{country}_{year}_{mingxing}', array('uses' => 'MovieCategoryController@index','as'=>'movieCategorySearch'));

	Route::any('/movie/{id}.html', array('uses' => 'MovieController@detail'));

});

//管理后台
Route::group(['domain'=>'admin.'.$domain,'prefix'=>'/','before'=>'auth.backend'],function(){
	Route::match('get|post','/',array('as'=>'verify','uses'=>'Admin_LoginController@verify'));
	Route::any('logout',array('as'=>'logout','uses'=>'Admin_LoginController@logout'));
	Route::any('dashboard.html',array('as'=>'dashboard','uses'=>'Admin_NavController@dashboard'));

	Route::controllers(array(
		'nav' => 'Admin_NavController',
		'uploadify' => 'Admin_UploadifyController',
		'user' => 'Admin_UserController',
		'movieCategory' => 'Admin_MovieCategoryController',
		'country' => 'Admin_CountryController',
		'person' => 'Admin_PersonController',//电影专题
		'movie' => 'Admin_MovieController',//电影
		'demo' => 'Admin_DemoController',
		'dynasty' => 'Admin_DynastyController',
		'keywords' => 'Admin_KeywordsController',
		'news' => 'Admin_NewsController',
		'poem' => 'Admin_PoemController',
		'slide' => 'Admin_SlideController',
		'slideCategory' => 'Admin_SlideCategoryController',
		'feedback' => 'Admin_FeedbackController',
		'friendLink' => 'Admin_FriendLinkController',
		'topic' => 'Admin_TopicController',
	));
	//公共管理
	Route::any('base/changeStatus',array('as'=>'changeStatus','uses'=>'Admin_BaseController@changeStatus'));//改变状态
	Route::any('base/option',array('as'=>'option','uses'=>'Admin_BaseController@option'));//批量操作
	Route::any('base/parseKeywords',array('as'=>'parseKeywords','uses'=>'Admin_BaseController@parseKeywords'));//更新单篇文章内的关键词
	Route::any('base/updateAllKeywords',array('as'=>'updateAllKeywords','uses'=>'Admin_BaseController@updateAllKeywords'));//更新全部文章内的关键词
});