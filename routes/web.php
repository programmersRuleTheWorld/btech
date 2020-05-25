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

//custom ClientApplicationComments routes

Route::post('/clientapplicationcomments/store/{clientapplicationcomment}')->name('clientapplicationcomments.store');

//custom BreakdownItems routes

Route::patch('/breakdownitems/updateprice/{breakdownitem}', 'BreakdownItemsController@updatePrice')->name('breakdownitems.updateprice');
Route::post('/breakdownitems/iscomplete/{breakdownitem}', 'BreakdownItemsController@isComplete')->name('breakdownitems.iscomplete');

Route::resource('contactus', 'ContactUsController');
Route::resource('posts', 'PostsController');
Route::resource('clientapplications', 'ClientApplicationsController');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController');
Route::resource('breakdownitems', 'BreakdownItemsController');
Route::resource('profiles', 'ProfilesController');
Route::resource('affiliatecampaigns', 'AffiliateCampaignsController');

Auth::routes([
    'register' => false,
    'verify' => false,
]);

Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/COVID-19_EMERGENCY_MESSAGE', function()
{
    $title = "Emergency Notice";
    return view('pages.covid_notice')->with('title', $title);
})->name('covid.notice');
Route::post('/covidform', 'CovidFormsController@store')->name('covid.form');
Route::get('/thanks', function(){$covid = App\CovidForm::find(1); return new App\Mail\Covid($covid);});
