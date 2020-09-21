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

Route::get('/', 'Frontend\HomeController@index');


Route::get('contact_us','UserController\PagesController@contactus')->name('contact_us');
//Route::match(['get', 'post'], 'contactUSPost','UserController\PagesController@contactus');
Route::post('contactUsPost', 'UserController\PagesController@contactUSPost')->name('contactUsPost');


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/menu','Frontend\MenuController@index')->name('menu');
    Route::get('/quote_menu','Frontend\MenuController@quoteMenu')->name('menu.quote');
    Route::get('/quote_menu/create','Frontend\MenuController@quoteSubMenu')->name('quote_menu.create');

    Route::get('/client/menu','Frontend\MenuController@clientMenu')->name('menu.client');
    Route::get('/billing/menu','Frontend\MenuController@billingMenu')->name('menu.billing');
    Route::get('/billing/menu/create','Frontend\MenuController@billingSubMenu')->name('billing_menu.create');
    Route::get('/billing/sub_menu/create','Frontend\MenuController@createBillingSubMenu')->name('billing_sub_menu.create');
    Route::get('/configuration/menu','Frontend\MenuController@configurationMenu')->name('configuration.menu');
    //Route::get('/quote_menu/create','Frontend\MenuController@quoteSubMenu')->name('quote_menu.create');


    Route::get('/profile','Frontend\ProfileController@index')->name('profile');
    Route::post('/profile/update','Frontend\ProfileController@updateProfile');

    Route::get('/clients','Frontend\ClientController@index')->name('client.list');




    Route::get('/without_qoute/clients/bill','Frontend\ClientController@index')->name('without_quote.client_bill');
    // Folder files
    Route::get('/clients/folder','Frontend\ClientController@index')->name('client.folder');
    Route::get('/clients/folder/{clientId}/address/{id}','Frontend\ClientFileController@folderLists')->name('client.folder_list');
    Route::post('/clients/folder/create','Frontend\ClientFileController@createFolder')->name('client.folder_create');
    Route::post('/clients/folder/all_files','Frontend\ClientFileController@folderFiles')->name('client.folder_file');
    Route::post('/clients/file/upload','Frontend\ClientFileController@uploadFiles')->name('client.file_upload');
    Route::get('/clients/folder/file/delete/{id}','Frontend\ClientFileController@deleteFile')->name('client.file_delete');
    Route::post('/clients/folder/delete','Frontend\ClientFileController@deleteFolder')->name('client.folder_delete');
    Route::post('/clients/folder/all','Frontend\ClientFileController@getFolderLists')->name('client.folder_all');

    Route::post('/clients/note/save','Frontend\ClientFileController@saveNote')->name('client.note_save');
    Route::post('/clients/note/update','Frontend\ClientFileController@updateNote')->name('client.note_update');
    Route::get('/clients/note/{id}','Frontend\ClientFileController@getNote')->name('client.note_single');


    Route::get('/clients/delete','Frontend\ClientController@index')->name('client.delete');
    Route::get('/clients/show','Frontend\ClientController@index')->name('client.show');


    Route::get('/search_client','Frontend\ClientController@searchClient')->name('client.search');
    //Route::get('/quote/search_client','Frontend\ClientController@searchClientQuote')->name('client.searchQuote');

    Route::get('/client_menu','Frontend\ClientController@clientMenu')->name('client.menu');
    Route::get('/clients/add','Frontend\ClientController@create')->name('client.create');
    Route::post('/clients/save','Frontend\ClientController@store');
    Route::post('/clients/update','Frontend\ClientController@update');
    Route::get('/clients/edit/{id}','Frontend\ClientController@edit')->name('client.edit');
    Route::get('/clients/delete/{id}','Frontend\ClientController@delete')->name('client_list.delete');
    Route::get('/clients/show/{id}','Frontend\ClientController@show')->name('client_list.show');

    Route::get('/email_configuration','Frontend\EmailConfigurationController@index')->name('email_configuration');


    Route::post('/email_configuration/save','Frontend\EmailConfigurationController@store')->name('email_configuration.save');

    Route::post('/load_email_template','Frontend\EmailConfigurationController@loadEmailTemplate')->name('email_configuration.loadEmailTemplate');



    // setting
    Route::get('/setting/logo','Frontend\SettingController@logoSetting')->name('setting.logo');
    Route::get('/setting/home_image','Frontend\SettingController@logoSetting')->name('setting.home_image');
    Route::get('/setting/contact_image','Frontend\SettingController@logoSetting')->name('setting.contact_image');
    Route::post('/setting/upload/image','Frontend\SettingController@uploadImage')->name('setting.upload_image');


    // Quotes
    Route::get('/clients_quote','Frontend\ClientQuoteController@clientQuotes')->name('clients_quote.list');



    Route::get('/quote','Frontend\QuoteController@index')->name('quote.list');
    Route::get('/quote/edit','Frontend\QuoteController@index')->name('quote.edit');
    Route::get('/quote/show','Frontend\QuoteController@index')->name('quote.show');
    //

    Route::get('/quote_bill/edit','Frontend\QuoteController@getBillQuoteLists')->name('bill.edit');
    Route::get('/quote_bill/show','Frontend\QuoteController@getBillQuoteLists')->name('bill.show');

    Route::get('/quote_bill/delete','Frontend\QuoteController@getBillQuoteLists')->name('bill.delete_list');


    Route::get('/quote/delete','Frontend\QuoteController@index')->name('quote.delete_list');
    Route::post('/quote_bill/delete','Frontend\QuoteController@delete')->name('quote_bill.delete');


   // Route::get('/billing/quote','Frontend\QuoteController@getBillQuoteLists')->name('quote_bill.list');
    Route::get('/billing/pre_bill','Frontend\BillingController@getPreBillLists')->name('pre_bill.quote_list');




    Route::get('/quote/{clientId}/send/{id}','Frontend\QuoteController@getSingleQuote')->name('quote.single');

   // Route::get('/quote/{clientId}/send/{id}','Frontend\QuoteController@getSingleQuote')->name('quote.list_edit');


    Route::get('/search_quote','Frontend\QuoteController@searchQuote')->name('quote.search');
    Route::get('/search_quote_bill','Frontend\QuoteController@searchQuoteBill')->name('quote.search');

    Route::get('/search_pre_bill','Frontend\BillingController@searchPreBill')->name('quote.search');

    Route::get('/pre_draft/{id}/bill','Frontend\QuoteController@preDraftBill')->name('pre_draft_bill');

    Route::get('/pre_draft/{id}/non_client','Frontend\QuoteController@preDraftBillNonClient')->name('pre_draft_bill.non_client');

    Route::post('/quote/client/generate_pdf','Frontend\QuoteController@generatePdf')->name('quote.generate_pdf');

    Route::get('/clients_quote/add','Frontend\QuoteController@clientQuotesCreate')->name('quote.add');

    Route::get('/without_qoute/add_bill','Frontend\QuoteController@clientQuotesCreate')->name('without_quote.add_bill');

    Route::get('/bills/list','Frontend\BillingController@billsList')->name('bills.list');

    Route::post('/bills/status','Frontend\BillingController@updateBillStatus')->name('bills.status');
    Route::get('/bills/search_bill','Frontend\BillingController@searchBill')->name('bills.search');



    Route::get('/bills/email_attachment','Frontend\BillingController@emailAttachment')->name('bills.attachment');

    Route::post('/email/send/attachment','Frontend\BillingController@sendEmailAttachment')->name('email.attachment');


    Route::post('/email/send_quote_bill','Frontend\BillingController@sendQuoteBill')->name('send.quote_bill');





    Route::post('/quote/save','Frontend\QuoteController@save')->name('quote.save');
    Route::get('/quote/client/{filename}','Frontend\QuoteController@viewPdf')->name('quote.save');

    Route::get('/quote/email_draft/{id}','Frontend\QuoteController@getDraftEmail')->name('quote.save');

    // stats

    Route::get('/technical/statistics','Frontend\StatisticsController@index')->name('tech.statistics');
    Route::get('/technical/statistics/per_year','Frontend\StatisticsController@getPerYear')->name('tech.per_year');
    Route::get('/technical/statistics/per_month/{year}','Frontend\StatisticsController@getPerMonth')->name('tech.per_month');

    Route::get('/technical/statistics/compare_income/{year}','Frontend\StatisticsController@getCompareIncome')->name('tech.compare_income');

    Route::get('/technical/statistics/per_client','Frontend\StatisticsController@getPerClient')->name('tech.per_client');
    Route::get('/technical/statistics/unconverted_quotes','Frontend\StatisticsController@totalUnconvertedQuotes')->name('tech.unconverted_quotes');
    Route::get('/technical/statistics/unpaid_bill','Frontend\StatisticsController@totalUnpaidBill')->name('tech.unpaid_bill');


    Route::get('/technical/statistics/search_client','Frontend\StatisticsController@incomeSearchClient')->name('tech.search_client');




});

Route::get('/contact','Frontend\ContactController@index')->name('contact_us');
Route::post('/contact','Frontend\ContactController@contactUs');
Route::get('/pdf_test','Frontend\ContactController@checkPdf');

Route::post('/login','Auth\LoginController@postLogin');








