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
    return view('welcome');
});


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/post/store', 'PostController@store')->name('store');
    
    Route::get('/post/userPosts/{id}', 'PostController@userPosts')->name('userPosts');
    
    Route::get('/post/edit/{id}', 'PostController@edit')->name('edit');
    
    Route::post('/post/update', 'PostController@update')->name('update');
});
