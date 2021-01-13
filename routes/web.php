<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});
Route::get('/maps', 'HomeController@maps')->name('maps');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/movingAvg', 'CoronaController@movingAvg')->name('movingAvg');
Route::get('/provincechart', 'CoronaController@provinceChart');
Route::get('/provinceLowestChart', 'CoronaController@provinceLowestChart');

Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/update-contact/{id}', 'CoronaController@update')->name('update-contact');
Route::post('/save-contact/{id}', 'CoronaController@saveContact')->name('save-contact');
Route::post('/storeContact', 'CoronaController@storeContact')->name('store-contact');
Route::post('/deleteContact/{id}', 'CoronaController@delete')->name('delete-contact');


Route::get('/post','HomeController@post')->name('post');
Route::get('/addpost','HomeController@addpost')->name('add-post');
Route::get('/viewpost/{id}','HomeController@viewpost')->name('view-post');
Route::post('/updatepost/{id}','HomeController@updatepost')->name('update-post');
Route::post('/savepost','HomeController@savepost')->name('save-post');
Route::post('/deletepost/{id}','HomeController@deletepost')->name('delete-post');

Route::get('/kesimpulan','HomeController@kesimpulan')->name('kesimpulan');
Route::post('/updatepost','HomeController@updateanalisa')->name('update-analisa');


Route::get('/admin','HomeController@admin')->name('admin');
Route::get('/addadmin','HomeController@addAdmin')->name('add-admin');
Route::post('/storeAdmin','HomeController@storeAdmin')->name('store-admin');
Route::get('/update-contact/{id}', 'CoronaController@update')->name('update-contact');

