<?php
use UxWeb\SweetAlert\SweetAlert as Alert;
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

Route::get('/', function () {
    return view('template.base');
})->name('home');


Route::get('dashboard', function(){
    return view('template.base');
})->name('dashboard');

Route::prefix('profile')->group(function () {

    Route::get('/', function () {
        return view('sections.profile.index');
    })->name('profile');

});


Route::prefix('users')->group(function () {

    Route::get('/','UserController@index')->name('users');
    Route::get('/all', 'UserController@getAll')->name('users.all');
    Route::get('/create','UserController@create')->name('users.create');
    Route::post('/store','UserController@store')->name('users.store');
    Route::post('/update', 'UserController@update')->name('users.update');
    Route::post('/change-status', 'UserController@changeStatus')->name('users.change-status');
    Route::post('/destroy', 'UserController@destroy')->name('users.destroy');

});



Route::prefix('config')->group(function () {

    Route::get('/', function(){
        return view('sections.config.index');
    })->name('config');

    // rutas categoria de nodos
    Route::prefix('node-categories')->group(function () {
        Route::get('/', 'NodeCategoryController@index')->name('node-categories');
        Route::get('/all', 'NodeCategoryController@getAll')->name('node-categories.all');
        Route::post('/store', 'NodeCategoryController@store')->name('node-categories.store');
        Route::post('/update', 'NodeCategoryController@update')->name('node-categories.update');
        Route::post('/change-status', 'NodeCategoryController@changeStatus')->name('node-categories.change-status');
        Route::post('/destroy', 'NodeCategoryController@destroy')->name('node-categories.destroy');
    });

    Route::prefix('node-subcategories')->group(function () {
        Route::get('/', 'NodeSubcategoryController@index')->name('node-subcategories');
        Route::get('/all', 'NodeSubcategoryController@getAll')->name('node-subcategories.all');
        Route::post('/store', 'NodeSubcategoryController@store')->name('node-subcategories.store');
        Route::post('/update', 'NodeSubcategoryController@update')->name('node-subcategories.update');
        Route::post('/change-status', 'NodeSubcategoryController@changeStatus')->name('node-subcategories.change-status');
        Route::post('/destroy', 'NodeSubcategoryController@destroy')->name('node-subcategories.destroy');
    });


});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
