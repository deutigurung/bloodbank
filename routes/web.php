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
Route::get('/join-us', 'FrontendController@joinForm')->name('joinForm');
Route::post('/join-us', 'FrontendController@joinRequest')->name('joinRequest');
Route::get('/search-blood', 'FrontendController@searchBloodForm')->name('searchBloodForm');
Route::post('/search-blood', 'FrontendController@searchBloodStore')->name('searchBloodStore');
Route::post('/contact-store', 'FrontendController@contactStore')->name('contactStore');
Route::post('/emergency-request-store', 'FrontendController@emergencyRequestStore')->name('emergencyRequestStore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('blood-stock','HomeController@bloodStock')->name('bloodStock');

//backend url
Route::group(['middleware' => 'auth','namespace' => 'Backend'], function () {
    Route::resource('role','RoleController');
    Route::get('profile','UserController@profile');
    Route::post('changePassword','UserController@changePassword')->name('user.changePassword');
    Route::resource('user','UserController');
    Route::resource('location','LocationController');
    Route::resource('donor','DonorController');
    Route::put('donor/status/{id}','DonorController@updateStatus')->name('donor.status');
    Route::resource('volunteer','VolunteerController');
    Route::put('volunteer/status/{id}','VolunteerController@updateStatus')->name('volunteer.status');
    Route::resource('blogCategory','BlogCategoryController');
    Route::resource('blog','BlogController');
    Route::get('contacts','ContactController@index')->name('contacts.index');
    Route::get('emergency-requests','EmergencyRequestController@index')->name('emergency-requests.index');
    Route::get('emergency-requests/status/{id}','EmergencyRequestController@status')->name('emergency-requests.status');

    Route::resource('blood-donate','BloodDonateController');
    Route::resource('blood-seeker','BloodSeekerController');

    Route::resource('volunteer-campaign','CampaignController');

});
