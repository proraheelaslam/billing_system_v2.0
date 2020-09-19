<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    //'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\V1\AuthController@login');
    Route::post('signup', 'Api\V1\AuthController@signup');
    Route::get('signup/activate/{token}', 'Api\V1\AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Api\V1\AuthController@logout');
        Route::get('user', 'Api\V1\AuthController@user');
    });

    Route::get('products','Api\V1\ProductController@viewProducts');
    Route::match(['get', 'post'], 'addProduct','Api\V1\ProductController@addProduct');
    //Route::post('addProduct','Api\V1\ProductController@addProduct');
    Route::match(['get', 'post'], 'editProduct/{id}','Api\V1\ProductController@editProduct');
    Route::match(['get', 'post'], 'deleteProduct/{id}','Api\V1\ProductController@deleteProduct');
    Route::get('categoryProductList/{id}','Api\V1\ProductController@categoryProductList');

    Route::post('add_images/{id}','Api\V1\ProductController@addImages');
    Route::get('delete_image/{id}','Api\V1\ProductController@deleteProductAltImage');
  
    Route::get('categories','Api\V1\CategoryController@viewCategories');
    Route::post('add-category','Api\V1\CategoryController@addCategory');
    Route::post('edit-category/{id}','Api\V1\CategoryController@editCategory');
    Route::get('delete-category/{id}','Api\V1\CategoryController@deleteCategory');
    
});


Route::group([
    //'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'Api\V1\PasswordResetController@create');
    Route::get('find/{token}', 'Api\V1\PasswordResetController@find');
    Route::post('reset', 'Api\V1\PasswordResetController@reset');
});