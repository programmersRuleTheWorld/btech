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
Route::get('/affiliate_details', 'PagesController@affiliate_details')->name('affiliate_details')->middleware('two_factor_authentication');
Route::get('/operations_center', 'PagesController@operations_center')->name('operations_center')->middleware('two_factor_authentication');
Route::get('/development_center', 'PagesController@development_center')->name('development_center')->middleware('two_factor_authentication');
Route::get('/admin', 'PagesController@admin')->name('admin')->middleware('two_factor_authentication');
Route::post('/{clientapplication}/payment', 'PagesController@client_application_payment')->name('client_application_payment');
Route::post('/{clientapplication}/deposit', 'PagesController@client_application_deposit')->name('client_application_deposit');

//custom ClientApplicationsController routes
Route::patch('/clientapplications/appendto', 'ClientApplicationsController@appendto')->name('clientapplications.appendto')->middleware('two_factor_authentication');
Route::patch('/clientapplications/removefrom/{clientapplication}', 'ClientApplicationsController@removefrom')->name('clientapplications.removefrom')->middleware('two_factor_authentication');
Route::patch('/clientapplications/revokeall', 'ClientApplicationsController@revokeall')->name('clientapplications.revokeall')->middleware('two_factor_authentication');


//resource routes

Route::resource('posts', 'PostsController')->middleware('two_factor_authentication');
Route::resource('affiliatecampaigns', 'AffiliateCampaignsController')->middleware('two_factor_authentication');
Route::resource('contactus', 'ContactUsController')->middleware('two_factor_authentication');
Route::resource('clientapplications', 'ClientApplicationsController')->middleware('two_factor_authentication');
Route::resource('clientapplicationcomments', 'ClientApplicationCommentsController')->middleware('two_factor_authentication');
Route::resource('breakdownlists', 'BreakdownListsController')->middleware('two_factor_authentication');
Route::resource('breakdownitems', 'BreakdownItemsController')->middleware('two_factor_authentication');
Route::resource('users', 'UsersController')->middleware('two_factor_authentication');
Route::resource('servicecontracts', 'ServiceContractsController')->middleware('two_factor_authentication');
Route::resource('supporttickets', 'SupportTicketsController')->middleware('two_factor_authentication');
Route::resource('supportticketcomments', 'SupportTicketCommentsController')->middleware('two_factor_authentication');
Route::resource('operations', 'OperationsController')->middleware('two_factor_authentication');
Route::resource('repos', 'ReposController')->middleware('two_factor_authentication');
Route::resource('bugs', 'BugsController')->middleware('two_factor_authentication');
Route::resource('securityanalyses', 'SecurityAnalysesController')->middleware('two_factor_authentication');
Route::resource('threatitems', 'ThreatItemsController')->middleware('two_factor_authentication');

//custom AffiliateCampaigns routes
Route::get('/affiliatecampaigns/index/{user}', 'AffiliateCampaignsController@index')->name('affiliatecampaigns.index')->middleware('two_factor_authentication');
Route::patch('/affiliatecampaigns/update/{affiliatecampaign}', 'AffiliateCampaignsController@update')->name('affiliatecampaigns.update')->middleware('two_factor_authentication');

//custom SupportTickets routes
Route::patch('/supporttickets/{supportticket}/iscomplete', 'SupportTicketsController@iscomplete')->name('supporttickets.iscomplete')->middleware('two_factor_authentication');

//custom Operations routes
Route::get('/operations_center/operations/{operation}', 'OperationsController@show')->name('operations.show')->middleware('two_factor_authentication');

//custom Repos routes
Route::post('/operations_center/repos', 'ReposController@show')->name('repos.show')->middleware('two_factor_authentication');

//custom Bugs routes
Route::put('/development_center/repos/bugs/isComplete/{bug}', 'BugsController@isComplete')->name('bugs.iscomplete')->middleware('two_factor_authentication');

//custom ServiceContracts routes
Route::get('/servicecontracts/download/{servicecontract}', 'ServiceContractsController@download')->name('servicecontracts.download')->middleware('two_factor_authentication');

//custom BreakdownItems routes    
Route::put('/breakdownitems/updateprice/{breakdownitem}', 'BreakdownItemsController@updatePrice')->name('breakdownitems.updateprice')->middleware('two_factor_authentication');
Route::post('/breakdownitems/iscomplete/{breakdownitem}', 'BreakdownItemsController@isComplete')->name('breakdownitems.iscomplete')->middleware('two_factor_authentication');

//custom ThreatItems routes
Route::patch('/threatitems/iscomplete/{threatItem}', 'ThreatItemsController@isComplete')->name('threatitems.iscomplete')->middleware('two_factor_authentication');

//when setting updateRole as patch request, any request will replace update for some reason
Route::put('/users/{user}/updaterole', 'UsersController@updaterole')->name('users.updaterole')->middleware('two_factor_authentication');

Auth::routes([
    'register' => false,
]);

//2fa routes

Route::get('/2fa', 'TwoFactorController@show2faForm')->name('2fa')->middleware('auth');
Route::post('/2fa', 'TwoFactorController@verifyToken')->name('2fa.verify');

//payment intents generation route

Route::post('/paymentintents', 'PaymentIntentsController@generate')->name('paymentIntents');

//custom login route
Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
    
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('two_factor_authentication');
    
Route::get('/mailable', function(){
    $breakdownItem = App\BreakdownItem::find(1);
        
    return new App\Mail\BreakdownItems\StatusChange($breakdownItem);
});