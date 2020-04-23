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





Auth::routes();

Route::get('/profile', 'ProfilesController@index')->name('profile');
Route::get('/','PagesController@index');
Route::get('/courses','PagesController@courses')->name('courses');
Route::get('/about','PagesController@about')->name('about');
Route::get('/edit_blog',function (){return "cao admine!";})->middleware('can:edit_blog')->name('edit_blog');
Route::get('/dashboard', function (){return view('dashboards.dashboard');})->name('dashboard');
Route::resource('/', 'UsersController');
Route::get('/profile/{id}','ProfilesController@show');
Route::resource('posts', 'PostsController');
