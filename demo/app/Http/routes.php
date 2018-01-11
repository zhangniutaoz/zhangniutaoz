<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=> 'homes','prefix'=> 'home'],function()
{
	Route::get('index','IndexController@index');
});
//后台
Route::group(['namespace' => 'admins','prefix' => 'admin'], function()
{
	Route::get('index','IndexController@index');
	Route::get('home','IndexController@home');
	Route::get('sortads','SortAdsController@index');
	Route::get('sortads/del','SortAdsController@del');
	Route::get('sortads/update','SortAdsController@update');
	Route::get('brandmanage/del','BrandManageController@del');
	Route::get('brandmanage/brandadd','BrandManageController@update');
	Route::post('brandmanage/add','BrandManageController@add');
	Route::post('brandmanage/edit','BrandManageController@edit');
	Route::post('sortads/add','SortAdsController@add');
	Route::post('sortads/edit','SortAdsController@edit');
	Route::resource('competence','CompetenceController');
	Route::resource('adminlist','AdminListController');
	Route::resource('admininfo','AdminInfoController');
	Route::resource('productlist','ProductListController');
	Route::resource('brandmanage','BrandManageController');
	Route::resource('bannerify','BannerIfyController');
	Route::resource('categorymanage','CategoryManageController');
});

