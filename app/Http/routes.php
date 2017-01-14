<?php
Route::group(['middleware' => 'web'], function () {

    //Frontend
    Route::get('/', 'Frontend\HomeController@index');

    //Backend
    Route::group(['prefix' => 'backend'], function () {

    Route::get('/', 'Auth\AuthController@showLogin');
    Route::get('login', array('as'=>'login','uses'=>'Auth\AuthController@showLogin'));
    Route::post('login', array('as'=>'login','uses'=>'Auth\AuthController@doLogin'));
    Route::get('logout', array('as'=>'logout','uses'=>'Auth\AuthController@doLogout'));
    Route::get('dashboard', array('as'=>'dashboard','uses'=>'Core\DashboardController@dashboard'));
    Route::get('/errors/{errorId}', array('as'=>'/errors/{errorId}','uses'=>'Core\ErrorController@index'));
    Route::get('/unauthorize', array('as'=>'/unauthorize','uses'=>'Core\ErrorController@unauthorize'));

    // Password Reset Routes...
    Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
    Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
    Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
    });

    Route::group(['middleware' => 'right'], function () {


        //Backend
        Route::group(['prefix' => 'backend'], function () {
            // Site Configuration
            Route::get('config', array('as'=>'config','uses'=>'Core\ConfigController@edit'));
            Route::post('config', array('as'=>'config','uses'=>'Core\ConfigController@update'));

            //User
            Route::get('user', array('as'=>'user','uses'=>'Core\UserController@index'));
            Route::get('user/create', array('as'=>'user/create','uses'=>'Core\UserController@create'));
            Route::post('user/store', array('as'=>'user/store','uses'=>'Core\UserController@store'));
            Route::get('user/edit/{id}',  array('as'=>'user/edit','uses'=>'Core\UserController@edit'));
            Route::post('user/update', array('as'=>'user/update','uses'=>'Core\UserController@update'));
            Route::post('user/destroy', array('as'=>'user/destroy','uses'=>'Core\UserController@destroy'));
            Route::get('user/profile/{id}', array('as'=>'user/profile','uses'=>'Core\UserController@profile'));
            Route::get('userAuth', array('as'=>'userAuth','uses'=>'Core\UserController@getAuthUser'));

            //Role
            Route::get('role', array('as'=>'role','uses'=>'Core\RoleController@index'));
            Route::get('role/create',  array('as'=>'role/create','uses'=>'Core\RoleController@create'));
            Route::post('role/store',  array('as'=>'role/store','uses'=>'Core\RoleController@store'));
            Route::get('role/edit/{id}',  array('as'=>'role/edit','uses'=>'Core\RoleController@edit'));
            Route::post('role/update',  array('as'=>'role/update','uses'=>'Core\RoleController@update'));
            Route::post('role/destroy',  array('as'=>'role/destroy','uses'=>'Core\RoleController@destroy'));
            Route::get('rolePermission/{roleId}', array('as'=>'rolePermission','uses'=>'Core\RoleController@rolePermission'));
            Route::post('rolePermissionAssign/{id}',   array('as'=>'rolePermissionAssign','uses'=>'Core\RoleController@rolePermissionAssign'));

            //Permission
            Route::get('permission', array('as'=>'permission','uses'=>'Core\PermissionController@index'));
            Route::get('permission/create', array('as'=>'permission/create','uses'=>'Core\PermissionController@create'));
            Route::post('permission/store', array('as'=>'permission/store','uses'=>'Core\PermissionController@store'));
            Route::get('permission/edit/{id}', array('as'=>'permission/edit','uses'=>'Core\PermissionController@edit'));
            Route::post('permission/update', array('as'=>'permission/update','uses'=>'Core\PermissionController@update'));
            Route::post('permission/destroy', array('as'=>'permission/destroy','uses'=>'Core\PermissionController@destroy'));
        });

    });



});


 Route::group(['prefix' => 'api'], function () {
        
        Route::post('activate', array('as'=>'activate','uses'=>'ApiController@Activate'));
        Route::post('check', array('as'=>'check','uses'=>'ApiController@check'));
    });