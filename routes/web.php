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

// 1ユーザー
Route::get('/home', function () {
    return view('home');
});

//求人検索
Route::get('/jobs/index', 'JobsController@index');
Route::get('/jobs/show/{id}', 'JobsController@show');
Route::post('/jobs/update', 'JobsController@update');

//お気に入り
Route::post('/jobFavorites/create', 'JobFavoriteController@create');
Route::post('/jobFavorites/destroy/{id}', 'JobFavoriteController@destroy');

//ログイン
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@logout');

//2管理者
Route::get('/admin/home', function () {
    return view('/admin/home');
});

Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm');
Route::post('admin/register', 'Admin\RegisterController@register');

Route::get('/admin/login', 'Admin\LoginController@showLoginForm');
Route::post('/admin/login', 'Admin\LoginController@login');

Route::get('/admin/logout', 'Admin\LoginController@logout');

///企業
Route::get('/admin/companies/new', 'Admin\CompaniesController@new');
Route::post('/admin/companies/create', 'Admin\CompaniesController@create');
Route::get('/admin/companies/show/{id}', 'Admin\CompaniesController@show');
Route::get('/admin/companies/index', 'Admin\CompaniesController@index');
Route::get('/admin/companies/edit/{id}', 'Admin\CompaniesController@edit');
Route::post('/admin/companies/update', 'Admin\CompaniesController@update');
Route::delete('/admin/companies/destroy/{id}', 'Admin\CompaniesController@destroy');

//求人
Route::get('/admin/jobs/new', 'Admin\JobsController@new');
Route::post('/admin/jobs/create', 'Admin\JobsController@create');
Route::get('/admin/jobs/show/{id}', 'Admin\JobsController@show');
Route::get('/admin/jobs/index', 'Admin\JobsController@index');
Route::get('/admin/jobs/edit/{id}', 'Admin\JobsController@edit');
Route::post('/admin/jobs/update', 'Admin\JobsController@update');
Route::delete('/admin/jobs/destroy/{id}', 'Admin\JobsController@destroy');

///スキル
Route::get('/admin/skills/new', 'Admin\SkillsController@new');
Route::post('/admin/skills/create', 'Admin\SkillsController@create');
Route::get('/admin/skills/show/{id}', 'Admin\SkillsController@show');
Route::get('/admin/skills/index', 'Admin\SkillsController@index');
Route::get('/admin/skills/edit/{id}', 'Admin\SkillsController@edit');
Route::post('/admin/skills/update', 'Admin\SkillsController@update');
Route::delete('/admin/skills/destroy/{id}', 'Admin\SkillsController@destroy');
