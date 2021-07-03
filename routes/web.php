<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'mainController@index')->name('main');

Auth::routes();  

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create','PostController@create')->name('post.create');

Route::match(['PUT','PATCH'],'/store','PostController@store')->name('post.store');

Route::get('/post/{id}', 'PostController@show')->name('post.show');

// Route::get('/post/{id}', 'PostController@show')->name('post.store');

Route::get('/admin/edit/{id}', 'PostController@edit')->name('post.edit');

Route::match(['PUT','PATCH'],'/update/{post}','PostController@update')->name('post.update');

Route::delete('/admin/destroy/{id}', 'PostController@destroy')->name('post.destroy');


