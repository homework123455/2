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
	Route::get('announcements'         , ['as' => 'admin.announcements.index' , 'uses' => 'AnnouncementsController@index']);
    Route::get('announcements/create'   , ['as' => 'admin.announcements.create' , 'uses' => 'AnnouncementsController@create']);
    Route::post('announcements'         , ['as' => 'admin.announcements.store'  , 'uses' => 'AnnouncementsController@store']);
    Route::get('announcements/{id}/edit', ['as' => 'admin.announcements.edit'   , 'uses' => 'AnnouncementsController@edit']);
    Route::patch('announcements/{id}'   , ['as' => 'admin.announcements.update' , 'uses' => 'AnnouncementsController@update']);
    Route::delete('announcements/{id}'  , ['as' => 'admin.announcements.destroy', 'uses' => 'AnnouncementsController@destroy']);
    Route::post('announcements/show'  , ['as' => 'admin.announcements.show', 'uses' => 'AnnouncementsController@show']);

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
	Route::get('assets', ['as' => 'admin.assets.index', 'uses' => 'AssetController@index']);
	Route::get('assets/create', ['as' => 'admin.assets.create', 'uses' => 'AssetController@create']);       //新增資產(1)
    Route::post('assets', ['as' => 'admin.asset.store', 'uses' => 'AssetController@store']);               //新增資產(2)
    Route::get('assets/{id}/edit', ['as' => 'admin.assets.edit', 'uses' => 'AssetController@edit']);        //修改資產(1)
    Route::patch('assets/{id}', ['as' => 'admin.assets.update', 'uses' => 'AssetController@update']);     //修改資產(2)
    Route::delete('assets/{id}', ['as' => 'admin.assets.destroy', 'uses' => 'AssetController@destroy']);   //刪除資產
    Route::post('assets/search'  , ['as' => 'admin.assets.search', 'uses' => 'AssetController@Search']); //查詢星期
    Route::post('assets/search1'  , ['as' => 'admin.assets.search1', 'uses' => 'AssetController@Search1']);	//查詢場地類別
	Route::post('assets/search10'  , ['as' => 'admin.assets.search10', 'uses' => 'AssetController@Search10']);	//查詢開放時段
	Route::post('assets/searchALL1'  , ['as' => 'admin.assets.searchALL1', 'uses' => 'AssetController@searchALL1']);	//查詢開放時段
    Route::get('assets/{id}/data', ['as' => 'admin.assets.data', 'uses' => 'AssetController@data']);       //資產詳細資料

    Route::get('assets/instascan', ['as' => 'admin.assets.instascan', 'uses' => 'AssetController@instascan']);

    //未做
    Route::post('assets/searchAll'  , ['as' => 'admin.assets.searchAll', 'uses' => 'AssetController@SearchAll']);  //查詢資產(複雜)

    //報廢資產
    Route::patch('assets/{id}/scrapped', ['as' => 'admin.assets.scrapped', 'uses' => 'AssetController@scrapped']);  
Route::patch('assets/{id}/scrapped1', ['as' => 'admin.assets.scrapped1', 'uses' => 'AssetController@scrapped1']); 	//報廢資產

    //未做
    //Route::patch('assets/{id}/scrapped', ['as' => 'admin.assets.update', 'uses' => 'AssetController@update']);     //取消報修資產

    //租用資產
    Route::get('assets/{id}/lending', ['as' => 'admin.lendings.create', 'uses' => 'AssetController@lendings_create']);     //租用資產(1)
    Route::post('assets/{id}/lending', ['as' => 'admin.lendings.store', 'uses' => 'AssetController@lendings_store']);     //租用資產(2)
    Route::patch('assets/{aid}/lending/{id}', ['as' => 'admin.lendings.return', 'uses' => 'AssetController@lendings_return']);     //歸還資產

    //申請
    Route::get('assets/{id}/application', ['as' => 'admin.assets.application', 'uses' => 'MaintaincesController@create']);             //員工申請資產(1)
    Route::patch('assets/{id}/application/store', ['as' => 'admin.assets.application.store', 'uses' => 'MaintaincesController@store']);  //員工申請資產(2)

    //報修
    Route::get('maintainces', ['as' => 'admin.maintainces.index', 'uses' => 'MaintaincesController@index']);                        //報修主畫面
    Route::get('maintainces/{id}/show', ['as' => 'admin.maintainces.show', 'uses' => 'MaintaincesController@show']);               //選擇維修方式(1)
    Route::patch('maintainces/{id}'  , ['as' => 'admin.maintainces.process', 'uses' => 'MaintaincesController@process']);            //選擇維修方式(2)
    Route::get('maintainces/{id}/details'  , ['as' => 'admin.maintainces.details', 'uses' => 'MaintainceItemsController@index']);      //輸入維修項目資料
    Route::post('maintainces/{id}/detail'  , ['as' => 'admin.maintainces.details.store', 'uses' => 'MaintainceItemsController@store']);  //新增維修項目
    Route::post('maintainces/{id}/complete'  , ['as' => 'admin.maintainces.complete', 'uses' => 'MaintaincesController@complete']);  //完成維修
    Route::get('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.edit', 'uses' => 'MaintainceItemsController@edit']);                 //修改維修項目資料(1)
    Route::patch('maintainces/{mid}/details/{id}'  , ['as' => 'admin.maintainces.details.update', 'uses' => 'MaintainceItemsController@update']);   //修改維修項目資料(2)
    Route::delete('maintainces/{id}'  , ['as' => 'admin.maintainces.destroy', 'uses' => 'MaintaincesController@destroy']);  //刪除維修項目

    //耗材
    Route::get('supplies'          , ['as' => 'admin.supplies.index' , 'uses' => 'SuppliesController@index']);
    Route::get('supplies/create'   , ['as' => 'admin.supplies.create' , 'uses' => 'SuppliesController@create']);
    Route::post('supplies'         , ['as' => 'admin.supplies.store'  , 'uses' => 'SuppliesController@store']);
    Route::get('supplies/{id}/edit', ['as' => 'admin.supplies.edit'   , 'uses' => 'SuppliesController@edit']);
    Route::patch('supplies/{id}'   , ['as' => 'admin.supplies.update' , 'uses' => 'SuppliesController@update']);
    Route::delete('supplies/{id}'  , ['as' => 'admin.supplies.destroy', 'uses' => 'SuppliesController@destroy']);
    Route::post('supplies/show'  , ['as' => 'admin.supplies.show', 'uses' => 'SuppliesController@show']);//查詢
    Route::get('supplies/{id}/data', ['as' => 'admin.supplies.data', 'uses' => 'SuppliesController@data']);       //詳細資料

    //廠商
    Route::get('vendors'         , ['as' => 'admin.vendors.index' , 'uses' => 'VendorsController@index']);
    Route::get('vendors/create'   , ['as' => 'admin.vendors.create' , 'uses' => 'VendorsController@create']);
    Route::post('vendors'         , ['as' => 'admin.vendors.store'  , 'uses' => 'VendorsController@store']);
    Route::get('vendors/{id}/edit', ['as' => 'admin.vendors.edit'   , 'uses' => 'VendorsController@edit']);
    Route::patch('vendors/{id}'   , ['as' => 'admin.vendors.update' , 'uses' => 'VendorsController@update']);
    Route::delete('vendors/{id}'  , ['as' => 'admin.vendors.destroy', 'uses' => 'VendorsController@destroy']);
    Route::post('vendors/show'  , ['as' => 'admin.vendors.show', 'uses' => 'VendorsController@show']);
    Route::get('vendors/{id}/data', ['as' => 'admin.vendors.data', 'uses' => 'VendorsController@data']);       //詳細資料

    //耗材領取
   Route::get('supplies/{id}/receive',['as' => 'admin.supplies.receive' , 'uses' => 'ReceivesController@create']);
    Route::post('supplies/{id}'   , ['as' => 'admin.receives.store' , 'uses' => 'ReceivesController@store']);    //添購跟新增合起來
    Route::get('supplies/{id}/buy', ['as' => 'admin.supplies.buy', 'uses' => 'SuppliesController@buy']);        //添購耗材
    Route::patch('supplies/{id}', ['as' => 'admin.supplies.buyupdate', 'uses' => 'SuppliesController@buyupdate']);
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
    Route::patch('users/{id}/wrongdata/store', ['as' => 'admin.users.showwrong.wrongstore', 'uses' => 'UsersController@wrongstore']);



});

Route::get('/tracy',function(){throw new \Exception('Tracy works');} );