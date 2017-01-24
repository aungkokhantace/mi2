<?php
Route::group(['middleware' => 'web'], function () {

    //Frontend
    Route::get('/', 'Frontend\HomeController@index');
    //Registration
    //Route::get('register', array('as'=>'register','uses'=>'Frontend\RegisterController@index'));
    Route::get('register/create',  array('as'=>'register/create','uses'=>'Frontend\RegisterController@create'));
    Route::post('register/store', array('as'=>'register/store','uses'=>'Frontend\RegisterController@store'));

    

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

    Route::get('register', array('as'=>'register','uses'=>'Backend\RegisterController@index'));
    Route::get('register/edit/{id}',  array('as'=>'register/edit','uses'=>'Backend\RegisterController@edit'));
    Route::post('register/update',  array('as'=>'register/update','uses'=>'Backend\RegisterController@update'));
    Route::post('register/destroy',  array('as'=>'register/destroy','uses'=>'Backend\RegisterController@destroy'));
    Route::get('register/confirm/{registerId}',array('as'=>'register/confirm','uses'=>'Backend\RegisterController@confirm'));
    Route::post('register/confirm',array('as'=>'register/confirm','uses'=>'Backend\RegisterController@registerConfirm'));

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

            //Event
            Route::get('event', array('as'=>'event','uses'=>'Backend\EventController@index'));
            Route::get('event/create', array('as'=>'event/create','uses'=>'Backend\EventController@create'));
            Route::post('event/store', array('as'=>'event/store','uses'=>'Backend\EventController@store'));
            Route::get('event/edit/{id}', array('as'=>'event/edit','uses'=>'Backend\EventController@edit'));
            Route::post('event/update', array('as'=>'event/update','uses'=>'Backend\EventController@update'));
            Route::post('event/destroy', array('as'=>'event/destroy','uses'=>'Backend\EventController@destroy'));
           
            //Page
            Route::get('page', array('as'=>'page','uses'=>'Backend\PageController@index'));
            Route::get('page/create',  array('as'=>'page/create','uses'=>'Backend\PageController@create'));
            Route::post('page/store', array('as'=>'page/store','uses'=>'Backend\PageController@store'));
            Route::get('page/edit/{id}',  array('as'=>'page/edit','uses'=>'Backend\PageController@edit'));
            Route::post('page/update',  array('as'=>'page/update','uses'=>'Backend\PageController@update'));
            Route::post('page/destroy',  array('as'=>'page/destroy','uses'=>'Backend\PageController@destroy'));
                  

        });

    });



});


 Route::group(['prefix' => 'api'], function () {
        
        Route::post('activate', array('as'=>'activate','uses'=>'ApiController@Activate'));
        Route::post('check', array('as'=>'check','uses'=>'ApiController@check'));
    });