<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
    return view('admin.home');
})->name('home');





Route::get('categories/get-ajax','AdminController\CategoryController@getAjaxCategories');
Route::get('ads/get-ajax','AdminController\AdsController@getAjaxAds');

//Route::get('categories/{locale}', 'AdminController\CatController@index');
//Route::get('categories/{locale}/{id}/edit','AdminController\CatController@edit');

Route::resource('categories', 'AdminController\CategoryController');
Route::resource('ads', 'AdminController\AdsController');
Route::get('switchLang/{lang}', 'AdminController\CategoryController@switchLang')->name('switchLanguage');

Route::group(['middleware' => ['auth']], function() {

    Route::get('users/get-ajax','AdminController\UserController@getAjaxUser');
    Route::resource('users','AdminController\UserController');
    Route::get('roles/get-ajax','AdminController\RoleController@getAjaxRole');
    Route::resource('roles','AdminController\RoleController');

});
