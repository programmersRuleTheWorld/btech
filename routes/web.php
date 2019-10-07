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

//custom PagesController routes
Route::get('/', 'PagesController@index')->name('index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/admin', 'PagesController@admin')->name('admin');

//custom ClientApplicationsController routes

Route::patch('/clientapplications/appendto', 'ClientApplicationsController@appendto')->name('clientapplications.appendto');
Route::patch('/clientapplications/removefrom/{clientapplication}', 'ClientApplicationsController@removefrom')->name('clientapplications.removefrom');
Route::patch('/clientapplications/revokeall', 'ClientApplicationsController@revokeall')->name('clientapplications.revokeall');

//custom ClientApplicationComments routes

Route::post('/clientapplicationcomments/store/{comment}')->name('clientapplicationcomments.store');

//posts controller
Route::resource('posts', 'PostsController');
Route::resource('clientapplications', 'ClientApplicationsController');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController');

Auth::routes([ 'register' => true,
                'reset' => true,
                'verify' => true ]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');