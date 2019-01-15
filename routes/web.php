<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/home',
    function (){return view('home');
});
//Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
Route::get('/'         , ['as' => 'home.index' , 'uses' => 'HomeController@index']);
//Route::get('posts'     , ['as' => 'posts.index', 'uses' => 'PostsController@index']);
//Route::get('posts/{id}', ['as' => 'posts.show' , 'uses' => 'PostsController@show']);

// 後台
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);
	/////
	Route::get('news'         , ['as' => 'admin.news.index' , 'uses' => 'NewsController@index']);
    Route::get('news/create'   , ['as' => 'admin.news.create' , 'uses' => 'NewsController@create']);
    Route::post('news'         , ['as' => 'admin.news.store'  , 'uses' => 'NewsController@store']);
    Route::get('news/{id}/edit', ['as' => 'admin.news.edit'   , 'uses' => 'NewsController@edit']);
    Route::patch('news/{id}'   , ['as' => 'admin.news.update' , 'uses' => 'NewsController@update']);
    Route::delete('news/{id}'  , ['as' => 'admin.news.destroy', 'uses' => 'NewsController@destroy']);
    Route::post('news/show'  , ['as' => 'admin.news.show', 'uses' => 'NewsController@show']);

    Route::get('user',['as' => 'admin.dashboard.user', 'uses' => 'AdminDashboardController@index']);
    Route::get('mis',['as' => 'admin.dashboard.mis', 'uses' => 'AdminDashboardController@index']);
/////
    Route::get('posts'          , ['as' => 'admin.posts.index' , 'uses' => 'AdminPostsController@index']);
    Route::get('posts/create'   , ['as' => 'admin.posts.create' , 'uses' => 'AdminPostsController@create']);
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit'   , 'uses' => 'AdminPostsController@edit']);
    Route::patch('posts/{id}'   , ['as' => 'admin.posts.update' , 'uses' => 'AdminPostsController@update']);
    Route::post('posts'         , ['as' => 'admin.posts.store'  , 'uses' => 'AdminPostsController@store']);
    Route::delete('posts/{id}'  , ['as' => 'admin.posts.destroy', 'uses' => 'AdminPostsController@destroy']);
	////
	Route::get('places', ['as' => 'admin.places.index', 'uses' => 'PlaceController@index']);
	Route::get('places/create', ['as' => 'admin.places.create', 'uses' => 'PlaceController@create']);       //新增資產(1)
    Route::post('places', ['as' => 'admin.places.store', 'uses' => 'PlaceController@store']);               //新增資產(2)
    Route::get('places/{id}/edit', ['as' => 'admin.places.edit', 'uses' => 'PlaceController@edit']);        //修改資產(1)
    Route::patch('places/{id}', ['as' => 'admin.places.update', 'uses' => 'PlaceController@update']);     //修改資產(2)
    Route::delete('places/{id}', ['as' => 'admin.places.destroy', 'uses' => 'PlaceController@destroy']);   //刪除資產
    Route::post('places/search'  , ['as' => 'admin.places.search', 'uses' => 'PlaceController@Search']); //查詢星期
    Route::post('places/search1'  , ['as' => 'admin.places.search1', 'uses' => 'PlaceController@Search1']);	//查詢場地類別
	Route::post('places/search10'  , ['as' => 'admin.places.search10', 'uses' => 'PlaceController@Search10']);	//查詢開放時段
	Route::post('places/searchALL1'  , ['as' => 'admin.places.searchALL1', 'uses' => 'PlaceController@searchALL1']);	//查詢開放時段
    Route::get('places/{id}/data', ['as' => 'admin.places.data', 'uses' => 'PlaceController@data']);       //資產詳細資料

    Route::get('places/instascan', ['as' => 'admin.places.instascan', 'uses' => 'PlaceController@instascan']);

    //未做
    Route::post('places/searchAll'  , ['as' => 'admin.places.searchAll', 'uses' => 'PlaceController@SearchAll']);  //查詢資產(複雜)

    //報廢資產
    Route::patch('places/{id}/scrapped', ['as' => 'admin.places.scrapped', 'uses' => 'PlaceController@scrapped']);  
Route::patch('places/{id}/scrapped1', ['as' => 'admin.places.scrapped1', 'uses' => 'PlaceController@scrapped1']); 	//報廢資產

    //未做
    //Route::patch('places/{id}/scrapped', ['as' => 'admin.places.update', 'uses' => 'PlaceController@update']);     //取消報修資產

    //租用資產
    Route::get('places/{id}/lending', ['as' => 'admin.lendings.create', 'uses' => 'PlaceController@lendings_create']);     //租用資產(1)
    Route::post('places/{id}/lending', ['as' => 'admin.lendings.store', 'uses' => 'PlaceController@lendings_store']);     //租用資產(2)
    Route::patch('places/{aid}/lending/{id}', ['as' => 'admin.lendings.return', 'uses' => 'PlaceController@lendings_return']);     //歸還資產

    //申請
    Route::get('places/{id}/application', ['as' => 'admin.places.application', 'uses' => 'MaintaincesController@create']);             //員工申請資產(1)
    Route::patch('places/{id}/application/store', ['as' => 'admin.places.application.store', 'uses' => 'MaintaincesController@store']);  //員工申請資產(2)

    //報修
    Route::get('maintainces', ['as' => 'admin.maintainces.index', 'uses' => 'MaintaincesController@index']);                        //報修主畫面
    Route::get('maintainces/{id}/show', ['as' => 'admin.maintainces.show', 'uses' => 'MaintaincesController@show']);               //選擇維修方式(1)
    Route::patch('maintainces/{id}'  , ['as' => 'admin.maintainces.process', 'uses' => 'MaintaincesController@process']);            //選擇維修方式(2)
    //Route::get('maintainces/{id}/details'  , ['as' => 'admin.maintainces.details', 'uses' => 'MaintainceItemsController@index']);      //輸入維修項目資料
   // Route::post('maintainces/{id}/detail'  , ['as' => 'admin.maintainces.details.store', 'uses' => 'MaintainceItemsController@store']);  //新增維修項目
    Route::post('maintainces/{id}/complete'  , ['as' => 'admin.maintainces.complete', 'uses' => 'MaintaincesController@complete']);  //完成維修
   // Route::get('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.edit', 'uses' => 'MaintainceItemsController@edit']);                 //修改維修項目資料(1)
    //Route::patch('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.details.update', 'uses' => 'MaintainceItemsController@update']);   //修改維修項目資料(2)
    Route::delete('maintainces/{id}'  , ['as' => 'admin.maintainces.destroy', 'uses' => 'MaintaincesController@destroy']);  //刪除維修項目

    
	//使用者
    Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UsersController@index']);              //使用者主畫面
    Route::get('users/create', ['as' => 'admin.users.create', 'uses' => 'UsersController@create']);       //新增使用者(1)
    Route::post('users', ['as' => 'admin.users.store', 'uses' => 'UsersController@store']);               //新增使用者(2)
    Route::get('users/{id}/edit', ['as' => 'admin.users.edit', 'uses' => 'UsersController@edit']);        //修改使用者(1)
    Route::patch('users/{id}', ['as' => 'admin.users.update', 'uses' => 'UsersController@update']);     //修改使用者(2)
    Route::delete('users/{id}', ['as' => 'admin.users.destroy', 'uses' => 'UsersController@destroy']);   //刪除使用者
    Route::post('users/search'  , ['as' => 'admin.users.search', 'uses' => 'UsersController@Search']);  //查詢使用者
    Route::get('users/{id}/data', ['as' => 'admin.users.data', 'uses' => 'UsersController@data']);
    Route::get('users/{id}/wrongdata', ['as' => 'admin.users.showwrong', 'uses' => 'UsersController@wrongdata']);
    Route::get('users/{id}/wrongdata/create', ['as' => 'admin.users.showwrong.wrongcreate', 'uses' => 'UsersController@wrongcreate']);
    Route::patch('users/{id}/wrongdata', ['as' => 'admin.users.showwrong.wrongstore', 'uses' => 'UsersController@wrongstore']);
	Route::delete('users/{id}/wrongdata/{wid}', ['as' => 'admin.users.showwrong.destroy1', 'uses' => 'UsersController@destroy1']);
	Route::get('users/{id}/wrongdata/{wid}/wrongedit', ['as' => 'admin.users.showwrong.wrongedit'   , 'uses' => 'UsersController@wrongedit']);
    Route::patch('users/{id}/wrongdata/{wid}'   , ['as' => 'admin.users.showwrong.update1' , 'uses' => 'UsersController@update1']);



});

Route::get('/tracy',function(){throw new \Exception('Tracy works');} );