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

Route::get('/', function () {
    return view('frontend.main');
});

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
});
