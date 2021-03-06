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
Route::get('/mycourses','CoursesStudentController@index')->name('mycourses');
Route::get('/mymentors','MentorsStudentController@index')->name('mymentors');
Route::get('/homework','HomeworkStudentController@index')->name('homework');
Route::post('/homework','HomeworkStudentController@store');
Route::get('/my-projects','StudentProjectController@index')->name('my-projects');
Route::resource('/courses','CoursesController');
Route::get('/courses/create','CoursesController@create')->middleware('can:add_courses');
Route::post('/comments/store','CommentsController@store');
Route::delete('/comments/{id}','CommentsController@destroy');
Route::get('/about','PagesController@about')->name('about');
Route::get('/mentors/edit/{id}','MentorsController@edit');
Route::resource('/mentors','MentorsController');
Route::resource('/supervisors','SupervisorsController');
Route::get('/supervisors/edit/{id}','SupervisorsController@edit');
Route::get('/supervisors','SupervisorsController@index')->name('supervisors');
Route::get('/students','StudentsController@index')->name('students');
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::resource('/course','CoursesController');
Route::resource('/assignments','AssignmentsController');
Route::get('/profile/{id}','ProfilesController@show');
Route::post('/profile/{id}','ProfilesController@update');
Route::resource('posts', 'PostsController');
Route::get('/posts/edit/{id}', 'PostsController@edit');
Route::resource('/projects','ProjectsController');
Route::get('/projects/edit/{id}','ProjectsController@edit');
Route::get('/my-badges','BadgesController@index')->name('my-badges');
//Route::get('/profile', 'ProfilesController@index')->name('profile');
Route::get('assignments/edit/{id}','AssignmentsController@edit');
Route::resource('/users', 'UsersController');
Route::get('/my-mentors','MentorsSupervisorsController@index')->name('my-mentors');
Route::resource('reports','ReportsController');
Route::get('/reports/edit/{id}','ReportsController@edit');
Route::post('/my-projects','StudentProjectController@store');
Route::get('/download/{file_name}','DownloadCoursesController@downloadVideoMaterial');
Route::get('/download-homework/{file_name}','DownloadHomeworkController@downloadHomework');
Route::get('/download-project/{file_name}','DownloadProjectsController@downloadProject');
Route::get('/payments','PaymentsController@index');
Route::post('/payments','PaymentsController@store');
Route::post('/ratings','RatingsController@store');
Route::resource('ratings','RatingsController');
Route::get('/courses/edit/{id}','CoursesController@edit');
//Route::get('/edit_blog',function (){return "cao admine!";})->middleware('can:edit_blog')->name('edit_blog');
