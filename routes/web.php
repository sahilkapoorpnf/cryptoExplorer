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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->middleware(['auth'])->name('logout');

/* Frontend */
Route::prefix(LaravelLocalization::setLocale())->name('front.')->middleware('installed:true')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('search', 'SearchController@index')->name('search');
    Route::get('blocks/{id}', 'BlockController@index')->name('block');
    Route::get('addresses/{id}', 'AddressController@index')->name('address');
    Route::get('transactions/{id}', 'TransactionController@index')->name('transaction');
    Route::get('page/{slug}', 'PageController@display');
});

/* Backend */
Route::prefix(LaravelLocalization::setLocale() . '/admin')->name('admin.')->middleware(['installed:true','auth'])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::post('update', 'AdminController@update')->name('update');
    Route::get('logo/delete', 'AdminController@delLogo')->name('logo.delete');
});

/* Installation */
Route::prefix('install')->name('install.')->namespace('Install')->middleware('installed:false')->group(function () {
    Route::get('1', 'InstallationController@step1')->name('step1');
    Route::post('db', 'InstallationController@db')->name('db');
    Route::get('2', 'InstallationController@step2')->name('step2');
    Route::post('3', 'InstallationController@step3')->name('step3');
    Route::post('4', 'InstallationController@step4')->name('step4');
});