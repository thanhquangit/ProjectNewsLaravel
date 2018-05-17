<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',function(){
	return view('admin.layout.index');
});

Route::get('/','HomeController@index');
Route::get('category/{id}','CategoryHomeController@getListCategory');
Route::get('detail/{id}','CategoryHomeController@getDetailNews');
Route::get('admin/login','LoginController@getLogin');
Route::post('admin/login','LoginController@postLogin');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::group(['prefix'=>'category'], function(){
		Route::get('list','CategoryController@getListCategory');
		Route::get('add','CategoryController@getAddCategory');
		Route::post('add','CategoryController@postAddCategory');
		Route::get('edit/{id}','CategoryController@getEditCategory');
		Route::post('edit/{id}', 'CategoryController@postEditCategory');
		Route::get('delete/{id}','CategoryController@getDeleteCategory');
	});
	Route::group(['prefix'=>'type'], function(){
		Route::get('list','TypeController@getListType');
		Route::get('add','TypeController@getAddType');
		Route::post('add','TypeController@postAddType');
		Route::get('edit/{id}','TypeController@getEditType');
		Route::post('edit/{id}','TypeController@postEdittype');
		Route::get('delete/{id}','TypeController@getDeleteType');
	});
	Route::group(['prefix'=>'news'], function(){
		Route::get('list','NewsController@getListNews');
		Route::get('add','NewsController@getAddNews');
		Route::post('add','NewsController@postAddNews');
		Route::get('edit/{id}','NewsController@getEditNews');
		Route::post('edit/{id}','NewsController@postEditNews');
		Route::get('delete/{id}','NewsController@getDeleteNews');
	});
	Route::group(['prefix'=>'ajax'], function(){
		Route::get('type/{id}','AjaxController@getTypeByCategory');
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('delete/{id}/{idTinTuc}','NewsController@getDeleteComment');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('list','SlideController@getListSlide');
		Route::get('add','SlideController@getAddSlide');
		Route::post('add','SlideController@postAddSlide');
		Route::get('edit/{id}','SlideController@getEditSlide');
		Route::post('edit/{id}','SlideController@postEditSlide');
		Route::get('delete/{id}','SlideController@getDeleteSlide');
	});
	Route::group(['prefix'=>'users'],function(){
		Route::get('list','UsersController@getListUser');
		Route::get('add','UsersController@getAddUser');
		Route::post('add','UsersController@postAddUser');
		Route::get('edit/{id}','UsersController@getEditUser');
		Route::post('edit/{id}','UsersController@postEditUser');
		Route::get('delete/{id}','UsersController@getDeleteUser');
	});
});