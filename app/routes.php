<?php

//admin 后台域名
$domain = substr($_SERVER['HTTP_HOST'],strpos($_SERVER['HTTP_HOST'],'.')+1);

Route::group(['domain'=>'www.'.$domain,'prefix'=>'','before'=>'website'],function() {

	Route::any('/', array('uses' => 'HomeController@index'));
	//最新电影分类
	Route::any('/news/', array('uses' => 'MovieCategoryController@news','as'=>'movieNews'));
	Route::any('/news/{country}_{mingxing}_{orderBy}_{currentPage}', array('uses' => 'MovieCategoryController@news','as'=>'movieNewsSearch'));
	//电影导航分类
	Route::any('/category/{url}', array('uses' => 'MovieCategoryController@index','as'=>'movieCategory'));
	Route::any('/category/{url}/{country}_{year}_{mingxing}_{orderBy}_{currentPage}', array('uses' => 'MovieCategoryController@index','as'=>'movieCategorySearch'));
	//电影详情和播放地址
	Route::any('/movie/{id}.html', array('uses' => 'MovieController@detail','as'=>'movieDetail'));//电影详情地址
	Route::any('/play/{id}.html', array('uses' => 'MovieController@play','as'=>'moviePlay'));//播放地址
	//明星导演
	Route::any('/mingxing/{id}.html', array('uses' => 'PersonController@detail','as'=>'personDetail'));
	//文章
	Route::any('/article/{id}.html', array('uses' => 'ArticleController@detail','as'=>'articleDetail'));
	Route::any('/article/', array('uses' => 'ArticleController@index','as'=>'article'));

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
		'keywords' => 'Admin_KeywordsController',
		'news' => 'Admin_NewsController',
		'slide' => 'Admin_SlideController',
		'slideCategory' => 'Admin_SlideCategoryController',
		'feedback' => 'Admin_FeedbackController',
		'friendLink' => 'Admin_FriendLinkController',
	));
	//公共管理
	Route::any('base/changeStatus',array('as'=>'changeStatus','uses'=>'Admin_BaseController@changeStatus'));//改变状态
	Route::any('base/option',array('as'=>'option','uses'=>'Admin_BaseController@option'));//批量操作
	Route::any('base/parseKeywords',array('as'=>'parseKeywords','uses'=>'Admin_BaseController@parseKeywords'));//更新单篇文章内的关键词
	Route::any('base/updateAllKeywords',array('as'=>'updateAllKeywords','uses'=>'Admin_BaseController@updateAllKeywords'));//更新全部文章内的关键词
});