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
Route::get('/company_services', 'PagesController@services')->name('company_services');
// Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/privacy_policy', 'PagesController@privacy_policy')->name('privacy');
Route::get('/service_agreement', 'PagesController@service_agreement')->name('service_agreement');
Route::get('/affiliate_details', 'PagesController@affiliate_details')->name('affiliate_details')->middleware('two_factor_authentication');
Route::get('/admin/{user?}', 'PagesController@admin')->name('admin')->middleware('two_factor_authentication');
Route::post('/payment', 'PagesController@client_application_payment')->name('client_application_payment');
Route::post('/deposit', 'PagesController@client_application_deposit')->name('client_application_deposit');
Route::post('/services_payment', "PagesController@client_application_services")->name('client_application_services');
Route::post('/dashboard_privileged/{user}', "DashboardController@privileged")->name('dashboard_privileged');


//query routes
Route::post('/admin/querySearch', 'QueriesController@adminSearch')->name('adminSearch');

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
Route::resource('services', 'ServicesController')->middleware('two_factor_authentication');
Route::resource('supporttickets', 'SupportTicketsController')->middleware('two_factor_authentication');
Route::resource('supportticketcomments', 'SupportTicketCommentsController')->middleware('two_factor_authentication');
Route::resource('operations', 'OperationsController')->middleware('two_factor_authentication');
Route::resource('repos', 'ReposController')->middleware('two_factor_authentication');
Route::resource('bugs', 'BugsController')->middleware('two_factor_authentication');
Route::resource('securityanalyses', 'SecurityAnalysesController')->middleware('two_factor_authentication');
Route::resource('threatitems', 'ThreatItemsController')->middleware('two_factor_authentication');
Route::resource('transactions', 'TransactionsController')->middleware('two_factor_authentication');

//custom AffiliateCampaigns routes
Route::get('/affiliatecampaigns/index/{user}', 'AffiliateCampaignsController@index')->name('affiliatecampaigns.index')->middleware('two_factor_authentication');
Route::patch('/affiliatecampaigns/update/{affiliatecampaign}', 'AffiliateCampaignsController@update')->name('affiliatecampaigns.update')->middleware('two_factor_authentication');

//custom SupportTickets routes
Route::patch('/supporttickets/{supportticket}/iscomplete', 'SupportTicketsController@iscomplete')->name('supporttickets.iscomplete')->middleware('two_factor_authentication');

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
Route::post('/paymentintent', 'PaymentsController@paymentIntent')->middleware('two_factor_authentication');

//client application hydration routes
Route::post('/clientapplication/data', 'DataHydrationController@clientapplication');
Route::get('/clientapplication/privacy', 'DataHydrationController@privacy');
Route::post('/breakdownlists/blDateUpdate', 'DataHydrationController@blDateUpdate')->name('blDateUpdate');
Route::post('/breakdownlists/blDelete', 'DataHydrationController@blDelete')->name('blDelete');
Route::post('/breakdownlists/blCreate', 'DataHydrationController@blCreate')->name('blCreate');
Route::post('/breakdownitems/biStatusUpdate', 'DataHydrationController@biStatusUpdate')->name('biStatusUpdate');
Route::post('/breakdownitems/biCreate', 'DataHydrationController@biCreate')->name('biCreate');
Route::post('/breakdownitems/biDelete', 'DataHydrationController@biDelete')->name('biDelete');
Route::post('/breakdownitems/biPriceUpdate', 'DataHydrationController@biPriceUpdate')->name('biPriceUpdate');
Route::post('/comments/commentDelete', 'DataHydrationController@commentDelete')->name('commentDelete');
Route::post('/comments/commentCreate', 'DataHydrationController@commentCreate')->name('commentCreate');

//webhook endpoints
Route::post('/ca_paid', 'WebhookEventControllers\ClientApplicationPaidController@paymentintent_succeeded');

//payment hydration routes
Route::post('/payment/hydration', 'DataHydrationController@paymentHydration')->name('paymentHydration');

//custom login route
Route::get('/register/{referred_by?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
    
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('two_factor_authentication');
    
Route::get('/mailable', function(){
    $breakdownItem = App\BreakdownItem::find(1);
        
    return new App\Mail\BreakdownItems\StatusChange($breakdownItem);
});