<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

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
Route::get('/', 'MainController@index')->name('main');

Auth::routes();  

Route::get('/tags','TagController@show')->name('tags');

Route::get('/admin/posts', 'HomeController@index')->name('posts');

Route::get('/create','PostController@create')->name('post.create');

Route::match(['PUT','PATCH'],'/store','PostController@store')->name('post.store');

Route::get('/post/{id}', 'PostController@show')->name('post.show');

// Route::get('/post/{id}', 'PostController@show')->name('post.store');

Route::get('/admin/edit/{id}', 'PostController@edit')->name('post.edit');

Route::match(['PUT','PATCH'],'/update/{id}','PostController@update')->name('post.update');

Route::delete('/admin/destroy/{id}', 'PostController@destroy')->name('post.destroy');

Route::get('/user','UsersController@index')->name("admin.user");

Route::get('/sendaAnEmail', 'MailController@index')->name("sendMail.index");

Route::post('/sendaAnEmail/send', 'MailController@send')->name("sendMail.send");
