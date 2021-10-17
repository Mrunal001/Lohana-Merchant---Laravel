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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('country', ['uses'=>'Admin\CountryController@datatable']);
    Route::get('country/getposts', ['as'=>'datatable.getposts','uses'=>'Admin\CountryController@getPosts']);

    Route::resource('/country', 'Admin\CountryController');
    Route::resource('/state', 'Admin\StateController');
    Route::resource('/city', 'Admin\CityController');
    Route::resource('/business_category', 'Admin\BusinessCategoryController');
    Route::get('/registered_business', 'Admin\RegisteredBusinessController@index');
    Route::post('/changeStatus', 'Admin\RegisteredBusinessController@changeStatus');
    Route::get('/advertisement', 'Admin\AdvertisementController@index');
    Route::post('/ADchangeStatus', 'Admin\AdvertisementController@changeStatus');

    Route::resource('/user_registration_details', 'Admin\UserRegistrationDetailsController');

    // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

/*End Admin routes*/ 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::post('api/get-state-list','APIController@getStateList');
Route::post('api/get-city-list','APIController@getCityList');

Route::resource('/registered_business', 'RegisteredBusinessController');

Route::resource('/add_advertise', 'AddAdvertiseController');

Route::get('/change_password','ChangePasswordController@showChangePasswordForm');

Route::post('/update_password','ChangePasswordController@update_pass');

Route::resource('/list_registerd_business', 'ListRegisterdBusinessController');

Route::resource('/view_registered_busines', 'ViewRegisteredBusinessController');

Route::resource('/categories', 'CategoriesController');
