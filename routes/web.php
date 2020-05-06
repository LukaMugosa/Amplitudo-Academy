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
Route::get('/my-courses','MentorsCoursesController@index')->name('my-courses');
Route::resource('/courses','CoursesController');
Route::get('/about','PagesController@about')->name('about');
Route::get('/mentors/edit/{id}','MentorsController@edit');
Route::resource('/mentors','MentorsController');
Route::resource('/supervisors','SupervisorsController');
Route::get('/supervisors/edit/{id}','SupervisorsController@edit');
Route::get('/supervisors','SupervisorsController@index')->name('supervisors');
Route::get('/students','StudentsController@index')->name('astudents');
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::resource('/course','CoursesController');
Route::resource('/assignments','AssignmentsController');
Route::get('/profile/{id}','ProfilesController@show');
Route::resource('posts', 'PostsController');
Route::get('/posts/edit/{id}', 'PostsController@edit');
Route::resource('/projects','ProjectsController');
Route::get('/projects/edit/{id}','ProjectsController@edit');
//Route::get('/profile', 'ProfilesController@index')->name('profile');
Route::get('assignments/edit/{id}','AssignmentsController@edit');
Route::resource('/users', 'UsersController');

//Route::get('/edit_blog',function (){return "cao admine!";})->middleware('can:edit_blog')->name('edit_blog');
