<?php
Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'frontendorbackend'], function () {

        //Frontend
        Route::get('/', 'Frontend\HomeController@index');

        //Backend
        Route::group(['prefix' => 'backend'], function () {

            Route::get('/', 'Auth\AuthController@showLogin');
            Route::get('login', array('as'=>'backend/login','uses'=>'Auth\AuthController@showLogin'));
            Route::post('login', array('as'=>'backend/login','uses'=>'Auth\AuthController@doLogin'));
            Route::get('logout', array('as'=>'backend/logout','uses'=>'Auth\AuthController@doLogout'));
            Route::get('dashboard', array('as'=>'backend/dashboard','uses'=>'Core\DashboardController@dashboard'));
            Route::get('/errors/{errorId}', array('as'=>'backend//errors/{errorId}','uses'=>'Core\ErrorController@index'));
            Route::get('/unauthorize', array('as'=>'backend/unauthorize','uses'=>'Core\ErrorController@unauthorize'));

            // Password Reset Routes...
            Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
            Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
            Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

        });

        //Right
        Route::group(['middleware' => 'right'], function () {

            //Backend
            Route::group(['prefix' => 'backend'], function () {
                // Site Configuration
                Route::get('config', array('as'=>'backend/config','uses'=>'Core\ConfigController@edit'));
                Route::post('config', array('as'=>'backend/config','uses'=>'Core\ConfigController@update'));

                //User
                Route::get('user', array('as'=>'backend/user','uses'=>'Core\UserController@index'));
                Route::get('user/create', array('as'=>'backend/user/create','uses'=>'Core\UserController@create'));
                Route::post('user/store', array('as'=>'backend/user/store','uses'=>'Core\UserController@store'));
                Route::get('user/edit/{id}',  array('as'=>'backend/user/edit','uses'=>'Core\UserController@edit'));
                Route::post('user/update', array('as'=>'backend/user/update','uses'=>'Core\UserController@update'));
                Route::post('user/destroy', array('as'=>'backend/user/destroy','uses'=>'Core\UserController@destroy'));
                Route::get('user/profile/{id}', array('as'=>'backend/user/profile','uses'=>'Core\UserController@profile'));
                Route::get('userAuth', array('as'=>'backend/userAuth','uses'=>'Core\UserController@getAuthUser'));

                //Role
                Route::get('role', array('as'=>'backend/role','uses'=>'Core\RoleController@index'));
                Route::get('role/create',  array('as'=>'backend/role/create','uses'=>'Core\RoleController@create'));
                Route::post('role/store',  array('as'=>'backend/role/store','uses'=>'Core\RoleController@store'));
                Route::get('role/edit/{id}',  array('as'=>'backend/role/edit','uses'=>'Core\RoleController@edit'));
                Route::post('role/update',  array('as'=>'backend/role/update','uses'=>'Core\RoleController@update'));
                Route::post('role/destroy',  array('as'=>'backend/role/destroy','uses'=>'Core\RoleController@destroy'));
                Route::get('rolePermission/{roleId}', array('as'=>'backend/rolePermission','uses'=>'Core\RoleController@rolePermission'));
                Route::post('rolePermissionAssign/{id}',   array('as'=>'backend/rolePermissionAssign','uses'=>'Core\RoleController@rolePermissionAssign'));

                //Permission
                Route::get('permission', array('as'=>'backend/permission','uses'=>'Core\PermissionController@index'));
                Route::get('permission/create', array('as'=>'backend/permission/create','uses'=>'Core\PermissionController@create'));
                Route::post('permission/store', array('as'=>'backend/permission/store','uses'=>'Core\PermissionController@store'));
                Route::get('permission/edit/{id}', array('as'=>'backend/permission/edit','uses'=>'Core\PermissionController@edit'));
                Route::post('permission/update', array('as'=>'backend/permission/update','uses'=>'Core\PermissionController@update'));
                Route::post('permission/destroy', array('as'=>'backend/permission/destroy','uses'=>'Core\PermissionController@destroy'));

                //Event
                Route::get('event', array('as'=>'backend/event','uses'=>'Backend\EventController@index'));
                Route::get('event/create', array('as'=>'backend/event/create','uses'=>'Backend\EventController@create'));
                Route::post('event/store', array('as'=>'backend/event/store','uses'=>'Backend\EventController@store'));
                Route::get('event/edit/{id}', array('as'=>'backend/event/edit','uses'=>'Backend\EventController@edit'));
                Route::post('event/update', array('as'=>'backend/event/update','uses'=>'Backend\EventController@update'));
                Route::post('event/destroy', array('as'=>'backend/event/destroy','uses'=>'Backend\EventController@destroy'));

                //Page
                Route::get('page', array('as'=>'backend/page','uses'=>'Backend\PageController@index'));
                Route::get('page/create',  array('as'=>'backend/page/create','uses'=>'Backend\PageController@create'));
                Route::post('page/store', array('as'=>'backend/page/store','uses'=>'Backend\PageController@store'));
                Route::get('page/edit/{id}',  array('as'=>'backend/page/edit','uses'=>'Backend\PageController@edit'));
                Route::post('page/update',  array('as'=>'backend/page/update','uses'=>'Backend\PageController@update'));
                Route::post('page/destroy',  array('as'=>'backend/page/destroy','uses'=>'Backend\PageController@destroy'));

                //Menu
                Route::get('menu', array('as'=>'backend/menu','uses'=>'Backend\MenuController@index'));
                Route::get('menu/create', array('as'=>'backend/menu/create','uses'=>'Backend\MenuController@create'));
                Route::post('menu/store', array('as'=>'backend/menu/store','uses'=>'Backend\MenuController@store'));
                Route::get('menu/edit/{id}', array('as'=>'backend/menu/edit','uses'=>'Backend\MenuController@edit'));
                Route::post('menu/update', array('as'=>'backend/menu/update','uses'=>'Backend\MenuController@update'));
                Route::post('menu/destroy', array('as'=>'backend/menu/destroy','uses'=>'Backend\MenuController@destroy'));

                //Menudetail
                Route::get('menudetail', array('as'=>'backend/menudetail','uses'=>'Backend\MenudetailController@index'));
                Route::get('menudetail/create', array('as'=>'backend/menudetail/create','uses'=>'Backend\MenudetailController@create'));
                Route::post('menudetail/store', array('as'=>'backend/menudetail/store','uses'=>'Backend\MenudetailController@store'));
                Route::get('menudetail/edit/{id}', array('as'=>'backend/menudetail/edit','uses'=>'Backend\MenudetailController@edit'));
                Route::post('menudetail/update', array('as'=>'backend/menudetail/update','uses'=>'Backend\MenudetailController@update'));
                Route::post('menudetail/destroy', array('as'=>'backend/menudetail/destroy','uses'=>'Backend\MenudetailController@destroy'));

                //Template
                Route::get('template', array('as'=>'backend/template','uses'=>'Backend\TemplateController@index'));
                Route::get('template/create', array('as'=>'backend/template/create','uses'=>'Backend\TemplateController@create'));
                Route::post('template/store', array('as'=>'backend/template/store','uses'=>'Backend\TemplateController@store'));
                Route::get('template/edit/{id}', array('as'=>'backend/template/edit','uses'=>'Backend\TemplateController@edit'));
                Route::post('template/update', array('as'=>'backend/template/update','uses'=>'Backend\TemplateController@update'));
                Route::post('template/destroy', array('as'=>'backend/template/destroy','uses'=>'Backend\TemplateController@destroy'));

                //Template Sidebar Menu
                Route::get('templatesidebarmenu', array('as'=>'backend/templatesidebarmenu','uses'=>'Backend\TemplateSidebarMenuController@index'));
                Route::get('templatesidebarmenu/create', array('as'=>'backend/templatesidebarmenu/create','uses'=>'Backend\TemplateSidebarMenuController@create'));
                Route::post('templatesidebarmenu/store', array('as'=>'backend/templatesidebarmenu/store','uses'=>'Backend\TemplateSidebarMenuController@store'));
                Route::get('templatesidebarmenu/edit/{id}', array('as'=>'backend/templatesidebarmenu/edit','uses'=>'Backend\TemplateSidebarMenuController@edit'));
                Route::post('templatesidebarmenu/update', array('as'=>'backend/templatesidebarmenu/update','uses'=>'Backend\TemplateSidebarMenuController@update'));
                Route::post('templatesidebarmenu/destroy', array('as'=>'backend/templatesidebarmenu/destroy','uses'=>'Backend\TemplateSidebarMenuController@destroy'));

            });

        });

    });

});


 Route::group(['prefix' => 'api'], function () {
        
        Route::post('activate', array('as'=>'activate','uses'=>'ApiController@Activate'));
        Route::post('check', array('as'=>'check','uses'=>'ApiController@check'));
    });