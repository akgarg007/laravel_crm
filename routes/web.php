<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::prefix('admin')->group(function(){
    Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin-form');
    Route::post('login','Auth\AdminLoginController@login')->name('admin-login');
    Route::post('logout','Auth\AdminLoginController@logout')->name('admin-logout');
});


Route::middleware(['auth'])->group(function(){
    Route::get('projects/create/{company_id?}','ProjectsController@create');

    // All Rsource Routes check - php artisan route:list
    Route::resource('companies', 'CompaniesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('roles', 'RolesController');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');

});

Route::get('admin/user_destroy/{user_id?}','AdminController@user_destroy');
// Route::get('admin/add_user','AdminController@add_user')->name('admin/add_user');