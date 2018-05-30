<?php

// home
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('welcome');
})->name('home');

///  index
Route::get('/register', 'RegisterController@register')->name('register');
Auth::routes();
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

        Route::prefix('config')->group(function () {
            Route::prefix('categories')->group(function () {
                Route::get('/', 'CategoryController@index')->name('categories');
                Route::get('/all', 'CategoryController@getAll')->name('categories.all');
                Route::post('/store', 'CategoryController@store')->name('categories.store');
                Route::post('/update', 'CategoryController@update')->name('categories.update');
                Route::post('/change-status', 'CategoryController@changeStatus')->name('categories.change-status');
                Route::post('/destroy', 'CategoryController@destroy')->name('categories.destroy');
            });

            Route::prefix('plataforms')->group(function () {
                Route::get('/', 'PlataformController@index')->name('plataforms');
                Route::get('/all', 'PlataformController@getAll')->name('plataforms.all');
                Route::post('/store', 'PlataformController@store')->name('plataforms.store');
                Route::post('/update', 'PlataformController@update')->name('plataforms.update');
                Route::post('/change-status', 'PlataformController@changeStatus')->name('plataforms.change-status');
                Route::post('/destroy', 'PlataformController@destroy')->name('plataforms.destroy');
            });

            Route::prefix('game-types')->group(function () {
                Route::get('/', 'GameTypesController@index')->name('game-types');
                Route::get('/all', 'GameTypesController@getAll')->name('game-types.all');
                Route::post('/store', 'GameTypesController@store')->name('game-types.store');
                Route::post('/update', 'GameTypesController@update')->name('game-types.update');
                Route::post('/change-status', 'GameTypesController@changeStatus')->name('game-types.change-status');
                Route::post('/destroy', 'GameTypesController@destroy')->name('game-types.destroy');
            });

            Route::prefix('companies')->group(function () {
                Route::get('/', 'CompaniesController@index')->name('companies');
                Route::get('/all', 'CompaniesController@getAll')->name('companies.all');
                Route::post('/store', 'CompaniesController@store')->name('companies.store');
                Route::post('/update', 'CompaniesController@update')->name('companies.update');
                Route::post('/change-status', 'CompaniesController@changeStatus')->name('companies.change-status');
                Route::post('/destroy', 'CompaniesController@destroy')->name('companies.destroy');
            });

            Route::prefix('media-types')->group(function () {
                Route::get('/', 'MediaTypesController@index')->name('media-types');
                Route::get('/all', 'MediaTypesController@getAll')->name('media-types.all');
                Route::post('/store', 'MediaTypesController@store')->name('media-types.store');
                Route::post('/update', 'MediaTypesController@update')->name('media-types.update');
                Route::post('/change-status', 'MediaTypesController@changeStatus')->name('media-types.change-status');
                Route::post('/destroy', 'MediaTypesController@destroy')->name('media-types.destroy');
            });

            Route::prefix('games')->group(function () {
                Route::get('/', 'GameController@index')->name('games');
                Route::get('/all', 'GameController@getAll')->name('games.all');
                Route::post('/store', 'GameController@store')->name('games.store');
                Route::post('/update', 'GameController@update')->name('games.update');
                Route::post('/change-status', 'GameController@changeStatus')->name('games.change-status');
                Route::post('/destroy', 'GameController@destroy')->name('games.destroy');
            });
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
