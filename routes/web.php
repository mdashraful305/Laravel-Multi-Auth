<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

//Clear all cache
Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});

Auth::routes();

//Route for frontend
Route::get('/', 'HomeController@index')->name('home');


// Route for Admin
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //User route
    Route::resource('/user','UserController');
    Route::get('user/delete/{id}','UserController@destroy')->name('user.destroy');


    //Profile route
    Route::get('/profile','DashboardController@profile')->name('profile');
    Route::post('/profile/update/{id}','DashboardController@User_update')->name('profile.update');

});
// Route for vendor
Route::group(['as' => 'vendor.', 'prefix' => 'vendor', 'namespace' => 'Vendor', 'middleware' => ['auth', 'vendor']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Profile route
    Route::get('/profile','DashboardController@profile')->name('profile');
    Route::post('/profile/update/{id}','DashboardController@User_update')->name('user.update');

});
// Route for Customer
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Profile route
    Route::get('/profile','DashboardController@profile')->name('profile');
    Route::post('/profile/update/{id}','DashboardController@User_update')->name('user.update');

});

