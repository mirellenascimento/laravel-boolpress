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
    return redirect('posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController')->middleware('auth')->except(['index', 'show']);
Route::resource('user', 'UserController')->only(['index', 'show']);

Route::resource('posts', 'PostsController')->middleware('auth')->except(['index', 'show']);
Route::resource('posts', 'PostsController')->only(['index', 'show']);


Route::resource('categories', 'CategoriesController')->only(['index', 'show']);

Route::resource('tags', 'TagsController')->only(['index', 'show']);
