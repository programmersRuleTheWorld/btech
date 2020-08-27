<?php

use App\Http\Middleware\CovidRedirect;

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
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/privacy_policy', 'PagesController@privacy')->name('privacy');
Route::get('/service_agreement', 'PagesController@service_agreement')->name('service_agreement');
Route::get('/affiliate_details', 'PagesController@affiliate_details')->name('affiliate_details');
Route::get('/admin', 'PagesController@admin')->name('admin');

//custom ClientApplicationsController routes

Route::patch('/clientapplications/appendto', 'ClientApplicationsController@appendto')->name('clientapplications.appendto');
Route::patch('/clientapplications/removefrom/{clientapplication}', 'ClientApplicationsController@removefrom')->name('clientapplications.removefrom');
Route::patch('/clientapplications/revokeall', 'ClientApplicationsController@revokeall')->name('clientapplications.revokeall');

Route::resource('contactus', 'ContactUsController');
Route::resource('posts', 'PostsController');
Route::resource('clientapplications', 'ClientApplicationsController');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController');
Route::resource('breakdownitems', 'BreakdownItemsController');
Route::resource('users', 'UsersController');
Route::resource('servicecontracts', 'ServiceContractsController');

//custom BreakdownItems routes    
Route::put('/breakdownitems/updateprice/{breakdownitem}', 'BreakdownItemsController@updatePrice')->name('breakdownitems.updateprice');
Route::post('/breakdownitems/iscomplete/{breakdownitem}', 'BreakdownItemsController@isComplete')->name('breakdownitems.iscomplete');

//when setting updateRole as patch request, any request will replace update for some reason
Route::put('/users/{user}', 'UsersController@updateRole')->name('users.updateRole');

Auth::routes([
    'register' => false,
]);

Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');