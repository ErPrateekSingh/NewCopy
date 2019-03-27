<?php
/* Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These routes are loaded
| by the RouteServiceProvider within a group which contains the "web" middleware group. */

// Route::get('/', function () { return view('welcome'); });

Auth::routes(['verify' => true]);

// (For Test)Routes for search result page
Route::get('/search', function () { return view('pages.search.searchResult');});


//(OK) Routes for Controllers Within "App\Http\Controllers\User" Namespace
Route::group(['namespace' => 'User'], function() {
  //(OK) Routes for Verified User only
  Route::group(['middleware' => 'verified'], function() {
    //(OK) Route only for Registered User to use Home for News Feed (disabled auth and verified middleware in constructor in controller)
    Route::get('/home', 'HomeController@index')->name('home');

    //(OK) Routes for Verified User only
    Route::group(['prefix' => 'register/user', 'as' => 'register.user.'], function() {
      //(OK) Route to get the user details form after redirected from the email verify process
      Route::get('/details', 'RegisterController@getUserDetailsForm')->name('details');
      //(OK) Route to post the user details form on submittion
      Route::post('/details', 'RegisterController@postUserDetailsForm')->name('details');
      //(OK) Route to get image upload page after redirected from the register/user/details page
      Route::get('/image', 'RegisterController@getUserImageForm')->name('image');
      //(OK) Route to post image after upload from the register/user/images page
      Route::post('/image', 'RegisterController@postUserImageForm')->name('image');
    });
  });
  //(OK) Matches The "/userName/page" URL
  Route::group(['prefix' => '{username}', 'where'  => ['username' => '[\w\d]+']], function() {
    //(OK) Route for registered user profile page
    Route::get('/', 'ProfileController@showProfilePage')->name('profilePage');
    //(OK) Route for registered user review page
    Route::get('/reviews', 'ReviewController@showReviewPage')->name('reviewPage');
    //(OK) Route for registered user review page
    Route::get('/photos', 'ImageController@showPhotoPage')->name('photoPage');
  });
});



//(OK) Routes for Controllers Within "App\Http\Controllers\Page" Namespace
Route::group(['namespace' => 'Page'], function() {
  //(OK) Matches The "/register/page" URL
  Route::group(['prefix' => 'register/page', 'as' => 'register.page.'], function() {
    //(OK) Routes to get the page registration page
    Route::get('/', 'RegisterController@index')->name('index');

    //(OK) Routes for Verified User only
    Route::group(['middleware' => 'verified'], function() {
      //(OK) Route to get the page categoty form redirected from page index page
      Route::get('category', 'RegisterController@getPageCategoryForm')->name('category');
      //(OK) Route to get the page categoty form redirected from page index page
      Route::post('category', 'RegisterController@postPageCategoryForm')->name('category');
    });
  });
});

//(OK) Route to get city using state_id through ajax request
Route::post('/get/city', 'AjaxRequestController@ajaxGetCity')->name('get.city');
//(OK) Route to get subcategory using category_id through ajax request
Route::post('/get/subcategory', 'AjaxRequestController@ajaxGetSubCategory')->name('get.subcategory');
//(OK) Route to check if email is unique through ajax request on register page
Route::post('/email/unique', 'AjaxRequestController@checkUniqueEmail')->name('email.unique');
