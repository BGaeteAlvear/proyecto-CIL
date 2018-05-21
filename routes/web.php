<?php

// home
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
})->name('home');

// login y asociados GUEST
Route::get('/login', 'LoginController@showLogin')->name('login.show');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/login/send-password', 'LoginController@showSendPassword')->name('login.show-send-password');
Route::post('/login/send-password', 'LoginController@sendPassword')->name('login.send-password');
Route::get('/login/recovery-password', 'LoginController@showRecoveryPassword')->name('login.show-recovery-password');
Route::post('/login/recovery-password', 'LoginController@recoveryPassword')->name('login.recovery-password');

// todas las rutas al menos debes estar auntenficado
Route::middleware('auth')->group(function () {

    //dasboards
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/asigna-vs-aprob','DashboardController@getAsignVsAprob')->name('dashboard.get-asigna-vs-aprob');
    Route::get('/dashboard/nodes-statuses','DashboardController@getNodesStatuses')->name('dashboard.get-nodes-statuses');

    // pefil de usuario
    Route::prefix('profile')->group(function () {

        Route::get('/', 'UserController@getProfile')->name('profile');
        Route::post('update-profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::post('change-password', 'ProfileController@changePassword')->name('change-password');
    });

    //ADMIN
    //gestion de usuarios
    Route::middleware('admin')->group(function () {

        Route::prefix('management-users')->group(function () {
            Route::get('/', 'UserController@index')->name('management.users');
            Route::get('/all', 'UserController@getAll')->name('management.users.all');
            Route::get('/create', 'UserController@create')->name('management.users.create');
            Route::post('/store', 'UserController@store')->name('management.users.store');
            Route::post('/update', 'UserController@update')->name('management.users.update');
            Route::post('/change-status', 'UserController@changeStatus')->name('management.users.change-status');
            Route::post('/destroy', 'UserController@destroy')->name('management.users.destroy');
        });

        Route::prefix('management-games')->group(function () {
            Route::get('/', 'GameController@index')->name('management.games');
        });

    });


    Route::middleware('cajero')->group(function () {

    });



    Route::middleware('cliente')->group(function () {

    });

});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
