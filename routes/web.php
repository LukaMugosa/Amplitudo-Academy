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

Route::get('/home','PagesController@index')->name('home');
Route::resource('/courses','CoursesController');
Route::get('/about','PagesController@about')->name('about');
Route::get('/mentors','MentorsController@index')->name('mentors');
Route::get('/supervisors','SupervisorsController@index')->name('supervisors');
Route::get('/students','StudentsController@index')->name('students');
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');


Route::get('/profile/{id}','ProfilesController@show');
Route::resource('posts', 'PostsController');
//Route::get('/profile', 'ProfilesController@index')->name('profile');

Route::resource('/users', 'UsersController');

//Route::get('/edit_blog',function (){return "cao admine!";})->middleware('can:edit_blog')->name('edit_blog');
