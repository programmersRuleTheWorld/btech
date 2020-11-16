<?php

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

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
Route::get('/privacy_policy', 'PagesController@privacy_policy')->name('privacy');
Route::get('/service_agreement', 'PagesController@service_agreement')->name('service_agreement');
Route::get('/affiliate_details', 'PagesController@affiliate_details')->name('affiliate_details')->middleware('auth');
Route::get('/operations_center', 'PagesController@operations_center')->name('operations_center')->middleware('auth');
Route::get('/development_center', 'PagesController@development_center')->name('development_center')->middleware('auth');
Route::get('/admin', 'PagesController@admin')->name('admin')->middleware('auth');
Route::post('/{clientapplication}/payment', 'PagesController@client_application_payment')->name('client_application_payment')->middleware('auth');
Route::post('/{clientapplication}/deposit', 'PagesController@client_application_deposit')->name('client_application_deposit')->middleware('auth');

//custom ClientApplicationsController routes
Route::patch('/clientapplications/appendto', 'ClientApplicationsController@appendto')->name('clientapplications.appendto')->middleware('auth');
Route::patch('/clientapplications/removefrom/{clientapplication}', 'ClientApplicationsController@removefrom')->name('clientapplications.removefrom')->middleware('auth');
Route::patch('/clientapplications/revokeall', 'ClientApplicationsController@revokeall')->name('clientapplications.revokeall')->middleware('auth');


//resource routes

Route::resource('posts', 'PostsController')->middleware('auth');
Route::resource('affiliatecampaigns', 'AffiliateCampaignsController')->middleware('auth');
Route::resource('contactus', 'ContactUsController')->middleware('auth');
Route::resource('clientapplications', 'ClientApplicationsController')->middleware('auth');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController')->middleware('auth');
Route::resource('breakdownlists', 'BreakdownListsController')->middleware('auth');
Route::resource('breakdownitems', 'BreakdownItemsController')->middleware('auth');
Route::resource('users', 'UsersController')->middleware('auth');
Route::resource('servicecontracts', 'ServiceContractsController')->middleware('auth');
Route::resource('supporttickets', 'SupportTicketsController')->middleware('auth');
Route::resource('supportticketcomments', 'SupportTicketCommentsController')->middleware('auth');
Route::resource('operations', 'OperationsController')->middleware('auth');
Route::resource('repos', 'ReposController')->middleware('auth');
Route::resource('bugs', 'BugsController')->middleware('auth');
Route::resource('securityanalyses', 'SecurityAnalysesController')->middleware('auth');
Route::resource('threatitems', 'ThreatItemsController')->middleware('auth');

//custom AffiliateCampaigns routes
Route::get('/affiliatecampaigns/index/{user}', 'AffiliateCampaignsController@index')->name('affiliatecampaigns.index')->middleware('auth');
Route::patch('/affiliatecampaigns/update/{affiliatecampaign}', 'AffiliateCampaignsController@update')->name('affiliatecampaigns.update')->middleware('auth');

//custom SupportTickets routes
Route::patch('/supporttickets/{supportticket}/iscomplete', 'SupportTicketsController@iscomplete')->name('supporttickets.iscomplete')->middleware('auth');

//custom Operations routes
Route::get('/operations_center/operations/{operation}', 'OperationsController@show')->name('operations.show')->middleware('auth');

//custom Repos routes
Route::post('/operations_center/repos', 'ReposController@show')->name('repos.show')->middleware('auth');

//custom Bugs routes
Route::put('/development_center/repos/bugs/isComplete/{bug}', 'BugsController@isComplete')->name('bugs.iscomplete')->middleware('auth');

//custom ServiceContracts routes
Route::get('/servicecontracts/download/{servicecontract}', 'ServiceContractsController@download')->name('servicecontracts.download')->middleware('auth');

//custom BreakdownItems routes    
Route::put('/breakdownitems/updateprice/{breakdownitem}', 'BreakdownItemsController@updatePrice')->name('breakdownitems.updateprice')->middleware('auth');
Route::post('/breakdownitems/iscomplete/{breakdownitem}', 'BreakdownItemsController@isComplete')->name('breakdownitems.iscomplete')->middleware('auth');

//custom ThreatItems routes
Route::patch('/threatitems/iscomplete/{threatItem}', 'ThreatItemsController@isComplete')->name('threatitems.iscomplete')->middleware('auth');

//when setting updateRole as patch request, any request will replace update for some reason
Route::put('/users/{user}/updaterole', 'UsersController@updaterole')->name('users.updaterole')->middleware('auth');

Auth::routes([
    'register' => false,
]);

//2fa routes

Route::get('/2fa', 'TwoFactorController@show2faForm');
Route::post('/2fa', 'TwoFactorController@verifyToken');

//custom login route
Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
    
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
    
Route::get('/mailable', function(){
    $breakdownItem = App\BreakdownItem::find(1);
        
    return new App\Mail\BreakdownItems\StatusChange($breakdownItem);
});