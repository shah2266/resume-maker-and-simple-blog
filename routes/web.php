<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('website.home');
//});

//FrontEnd
Route::get('/', 'FrontEnd\FrontPageController@index');
Route::get('/resume', 'FrontEnd\FrontPageController@myResume');
Route::get('/contact', 'FrontEnd\FrontPageController@contact');
Route::get('/blog', 'FrontEnd\PostController@index');
Route::get('/blog/post/{slug}', 'FrontEnd\PostController@single');
Route::get('/blog/category/{slug}', 'FrontEnd\PostController@categoryWisePost');
Route::get('/blog/search', 'FrontEnd\PostController@search');
Route::post('/contact/send', 'FrontEnd\FrontPageController@storeContactMessage');
Route::get('/resume/download','FrontEnd\FrontPageController@downloadable');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//Route::get('/company', 'CompanyController@index');


Route::group([
    'prefix' => 'control',
    'middleware' => 'auth'
], function () {
    Route::resource('/company', 'CompanyController');
    Route::resource('/banner', 'BannerController');
    Route::get('/bannerType', 'BannerController@bannerActive');
});

Route::group([
   'prefix' => 'control',
   'middleware' => 'auth',
], function (){
    Route::get('/contact/page/index', 'ContactController@display');
    Route::get('/contact/page/add', 'ContactController@addForm');
    Route::post('/contact/page/add', 'ContactController@added');
    Route::get('/contact/page/{id}/edit', 'ContactController@editFrom');
    Route::patch('/contact/page/{id}', 'ContactController@change');
    Route::get('/contact', 'ContactController@index');
    Route::get('/contact/{id}', 'ContactController@show');
    Route::delete('/contact/{id}', 'ContactController@destroy');
});

Route::group([
   'prefix' => 'control/resume',
   'middleware' => 'auth'
], function(){
    Route::get("/", 'ResumeController@index');
    Route::resource('/personal', 'PersonalController');
    Route::resource('/education', 'EducationController');
    Route::resource('/training', 'TrainingController');
    Route::resource('/professional', 'ProfessionalController');
});


Route::group([
    'prefix' => 'control/blog',
    'middleware' => 'auth'
], function(){
    Route::resource('/page', 'Blog\BlogPageController');
    Route::resource('/category', 'Blog\CategoryController');
    Route::resource('/tag', 'Blog\TagController');
    Route::resource('/post', 'Blog\PostController');
});

