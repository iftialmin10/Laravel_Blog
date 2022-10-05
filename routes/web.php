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

use App\Http\Controllers\UserController;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//webpage route
Route::get('/', 'FrontendController@home')->name('index');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/category/{id}', 'FrontendController@category')->name('category');
Route::get('/contact', 'FrontendController@contact')->name('contact');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


//admin route
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){

    Route::get('/dashboard', 'FrontendController@admin_dashboard_info')->name('adminpanel');

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::get('/post_details/{slug}', 'FrontendController@allpost')->name('post');
    Route::get('/Bloger_details/{user}', 'FrontendController@bloger_details')->name('bloger_details');
    //profile
    Route::get('/profile', 'ProfileController@index')->name('userprofile');
    Route::get('/edit_profile/{user}', 'ProfileController@edit_profile')->name('edit_profile');
    Route::put('/update_profile/{user}', 'ProfileController@update_profile')->name('update_profile');

});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function(){

    Route::get('/post_details/{slug}', 'FrontendController@allpost')->name('post');
    Route::get('/Bloger_details/{user}', 'FrontendController@bloger_details')->name('bloger_details');

    //post
    Route::get('/create_post', 'MyaccountController@create_post')->name('create_post');
    Route::post('/store_post', 'MyaccountController@store_post')->name('store_post');

    Route::get('/view_post/{post}', 'MyaccountController@view_post')->name('view_post');
    Route::get('/my_posts', 'MyaccountController@my_posts')->name('my_posts');

    Route::get('/edit_mypost/{slug}', 'MyaccountController@edit_post')->name('edit_mypost');
    Route::put('/update_mypost/{post}', 'MyaccountController@update_post')->name('update_mypost');
    Route::delete('/delete_post/{post}', 'MyaccountController@delete_post')->name('delete_mypost');

    //user profile
    Route::get('/my_profile', 'MyaccountController@index')->name('my_profile');
    Route::get('/edit_myprofile/{user}', 'MyaccountController@edit_profile')->name('edit_myprofile');
    Route::put('/update_myprofile/{user}', 'MyaccountController@update_profile')->name('update_myprofile');

});