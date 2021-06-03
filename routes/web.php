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
//    return view('frontend.main');
//});
Route::get('/', 'FrontendController@index')->name('frontend');
Route::get('/donor-form', 'FrontendController@donorForm')->name('donorForm');
Route::post('/donor-form', 'FrontendController@donorStore')->name('donorStore');
Route::get('/search-blood', 'FrontendController@searchBloodForm')->name('searchBloodForm');
Route::post('/search-blood', 'FrontendController@searchBloodStore')->name('searchBloodStore');
Route::post('/contact-store', 'FrontendController@contactStore')->name('contactStore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//backend url
Route::group(['middleware' => 'auth','namespace' => 'Backend'], function () {
    Route::resource('role','RoleController');
    Route::resource('user','UserController');
    Route::resource('location','LocationController');
    Route::resource('donor','DonorController');
    Route::resource('volunteer','VolunteerController');
    Route::resource('blogCategory','BlogCategoryController');
    Route::resource('blog','BlogController');
    Route::get('contacts','ContactController@index')->name('contacts.index');
});
