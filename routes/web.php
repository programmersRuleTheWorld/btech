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
Route::get('/privacy_policy', 'PagesController@privacy_policy')->name('privacy');
Route::get('/service_agreement', 'PagesController@service_agreement')->name('service_agreement');
Route::get('/affiliate_details', 'PagesController@affiliate_details')->name('affiliate_details');
Route::get('/operations_center', 'PagesController@operations_center')->name('operations_center');
Route::get('/development_center', 'PagesController@development_center')->name('development_center');
Route::get('/admin', 'PagesController@admin')->name('admin');
Route::post('/{clientapplication}/payment', 'PagesController@client_application_payment')->name('client_application_payment');
Route::post('/{clientapplication}/deposit', 'PagesController@client_application_deposit')->name('client_application_deposit');

//custom ClientApplicationsController routes
Route::patch('/clientapplications/appendto', 'ClientApplicationsController@appendto')->name('clientapplications.appendto');
Route::patch('/clientapplications/removefrom/{clientapplication}', 'ClientApplicationsController@removefrom')->name('clientapplications.removefrom');
Route::patch('/clientapplications/revokeall', 'ClientApplicationsController@revokeall')->name('clientapplications.revokeall');

//resource routes

Route::resource('posts', 'PostsController');
Route::resource('affiliatecampaigns', 'AffiliateCampaignsController');
Route::resource('contactus', 'ContactUsController');
Route::resource('clientapplications', 'ClientApplicationsController');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController');
Route::resource('breakdownlists', 'BreakdownListsController');
Route::resource('breakdownitems', 'BreakdownItemsController');
Route::resource('users', 'UsersController');
Route::resource('servicecontracts', 'ServiceContractsController');
Route::resource('supporttickets', 'SupportTicketsController');
Route::resource('supportticketcomments', 'SupportTicketCommentsController');
Route::resource('operations', 'OperationsController');
Route::resource('repos', 'ReposController');
Route::resource('bugs', 'BugsController');
Route::resource('securityanalyses', 'SecurityAnalysesController');
Route::resource('threatitems', 'ThreatItemsController');

//custom AffiliateCampaigns routes
Route::get('/affiliatecampaigns/index/{user}', 'AffiliateCampaignsController@index')->name('affiliatecampaigns.index');
Route::patch('/affiliatecampaigns/update/{affiliatecampaign}', 'AffiliateCampaignsController@update')->name('affiliatecampaigns.update');

//custom SupportTickets routes
Route::patch('/supporttickets/{supportticket}/iscomplete', 'SupportTicketsController@iscomplete')->name('supporttickets.iscomplete');

//custom Operations routes
Route::get('/operations_center/operations/{operation}', 'OperationsController@show')->name('operations.show');

//custom Repos routes
Route::post('/operations_center/repos', 'ReposController@show')->name('repos.show');

//custom Bugs routes
Route::put('/development_center/repos/bugs/isComplete/{bug}', 'BugsController@isComplete')->name('bugs.iscomplete');

//custom ServiceContracts routes
Route::get('/servicecontracts/download/{servicecontract}', 'ServiceContractsController@download')->name('servicecontracts.download');

//custom BreakdownItems routes    
Route::put('/breakdownitems/updateprice/{breakdownitem}', 'BreakdownItemsController@updatePrice')->name('breakdownitems.updateprice');
Route::post('/breakdownitems/iscomplete/{breakdownitem}', 'BreakdownItemsController@isComplete')->name('breakdownitems.iscomplete');

//custom ThreatItems routes
Route::patch('/threatitems/iscomplete/{threatItem}', 'ThreatItemsController@isComplete')->name('threatitems.iscomplete');

//when setting updateRole as patch request, any request will replace update for some reason
Route::put('/users/{user}/updaterole', 'UsersController@updaterole')->name('users.updaterole');

Auth::routes([
    'register' => false,
]);

Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/mailable', function(){
    $breakdownItem = App\BreakdownItem::find(1);

    return new App\Mail\BreakdownItems\StatusChange($breakdownItem);
});