<?php

/* Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These routes are loaded
| by the RouteServiceProvider within a group which contains the "web" middleware group. */

// Route::get('/', function () { return view('welcome'); });

// Auth::routes();
Auth::routes(['verify' => true]);


// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

//(OK) Routes to get the page registration page
// Route::get('/register/page', 'RegisterPageController@index')->name('register.page.index');

//(OK) Route for registered user profile page
Route::get('/{username}', 'ProfileController@showProfilePage')->name('profilePage')->where('username', '[\w\d]+');

//(OK) Routes to check if user is verified before displaying the pages
Route::group(['middleware' => ['verified']], function() {
   //(OK) Route only for Registered User to use Home for News Feed (disabled auth and verified middleware in constructor in controller)
   Route::get('/home', 'HomeController@index')->name('home');
   //(OK) Route to get the user details form after redirected from the email verify process
   Route::get('register/user/details', 'RegisterUserController@getUserDetailsForm')->name('register.user.details');
   //(OK) Route to post the user details form on submittion
   Route::post('register/user/details', 'RegisterUserController@postUserDetailsForm')->name('register.user.details');
   //(OK) Route to get image upload page after redirected from the register/user/details page
   Route::get('register/user/image', 'RegisterUserController@getUserImageForm')->name('register.user.image');
   //(OK) Route to post image after upload from the register/user/images page
   Route::post('register/user/image', 'RegisterUserController@postUserImageForm')->name('register.user.image');
});

//(OK) Route to get city using state_id through ajax request
Route::post('/get/city', 'AjaxRequestController@ajaxGetCity')->name('get.city');
//(OK) Route to check if email is unique through ajax request on register page
Route::post('/email/unique', 'AjaxRequestController@checkUniqueEmail')->name('email.unique');
