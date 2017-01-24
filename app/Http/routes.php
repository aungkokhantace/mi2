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

            //Menu
            Route::get('menu', array('as'=>'menu','uses'=>'Backend\MenuController@index'));
            Route::get('menu/create', array('as'=>'menu/create','uses'=>'Backend\MenuController@create'));
            Route::post('menu/store', array('as'=>'menu/store','uses'=>'Backend\MenuController@store'));
            Route::get('menu/edit/{id}', array('as'=>'menu/edit','uses'=>'Backend\MenuController@edit'));
            Route::post('menu/update', array('as'=>'menu/update','uses'=>'Backend\MenuController@update'));
            Route::post('menu/destroy', array('as'=>'menu/destroy','uses'=>'Backend\MenuController@destroy'));

            //Menudetail
            Route::get('menudetail', array('as'=>'menudetail','uses'=>'Backend\MenudetailController@index'));
            Route::get('menudetail/create', array('as'=>'menudetail/create','uses'=>'Backend\MenudetailController@create'));
            Route::post('menudetail/store', array('as'=>'menudetail/store','uses'=>'Backend\MenudetailController@store'));
            Route::get('menudetail/edit/{id}', array('as'=>'menudetail/edit','uses'=>'Backend\MenudetailController@edit'));
            Route::post('menudetail/update', array('as'=>'menudetail/update','uses'=>'Backend\MenudetailController@update'));
            Route::post('menudetail/destroy', array('as'=>'menudetail/destroy','uses'=>'Backend\MenudetailController@destroy'));

            //Template
            Route::get('template', array('as'=>'template','uses'=>'Backend\TemplateController@index'));
            Route::get('template/create', array('as'=>'template/create','uses'=>'Backend\TemplateController@create'));
            Route::post('template/store', array('as'=>'template/store','uses'=>'Backend\TemplateController@store'));
            Route::get('template/edit/{id}', array('as'=>'template/edit','uses'=>'Backend\TemplateController@edit'));
            Route::post('template/update', array('as'=>'template/update','uses'=>'Backend\TemplateController@update'));
            Route::post('template/destroy', array('as'=>'template/destroy','uses'=>'Backend\TemplateController@destroy'));

            //Template Sidebar Menu
            Route::get('templatesidebarmenu', array('as'=>'templatesidebarmenu','uses'=>'Backend\TemplateSidebarMenuController@index'));
            Route::get('templatesidebarmenu/create', array('as'=>'templatesidebarmenu/create','uses'=>'Backend\TemplateSidebarMenuController@create'));
            Route::post('templatesidebarmenu/store', array('as'=>'templatesidebarmenu/store','uses'=>'Backend\TemplateSidebarMenuController@store'));
            Route::get('templatesidebarmenu/edit/{id}', array('as'=>'templatesidebarmenu/edit','uses'=>'Backend\TemplateSidebarMenuController@edit'));
            Route::post('templatesidebarmenu/update', array('as'=>'templatesidebarmenu/update','uses'=>'Backend\TemplateSidebarMenuController@update'));
            Route::post('templatesidebarmenu/destroy', array('as'=>'templatesidebarmenu/destroy','uses'=>'Backend\TemplateSidebarMenuController@destroy'));

            //Template Slider
            Route::get('templateslider', array('as'=>'templateslider','uses'=>'Backend\TemplateSliderController@index'));
            Route::get('templateslider/create', array('as'=>'templateslider/create','uses'=>'Backend\TemplateSliderController@create'));
            Route::post('templateslider/store', array('as'=>'templateslider/store','uses'=>'Backend\TemplateSliderController@store'));
            Route::get('templateslider/edit/{id}', array('as'=>'templateslider/edit','uses'=>'Backend\TemplateSliderController@edit'));
            Route::post('templateslider/update', array('as'=>'templateslider/update','uses'=>'Backend\TemplateSliderController@update'));
            Route::post('templateslider/destroy', array('as'=>'templateslider/destroy','uses'=>'Backend\TemplateSliderController@destroy'));

            //Template Slider Detail
            Route::get('templatesliderdetail', array('as'=>'templatesliderdetail','uses'=>'Backend\TemplateSliderController@index'));
            Route::get('templatesliderdetail/create', array('as'=>'templatesliderdetail/create','uses'=>'Backend\TemplateSliderController@addImage'));
            Route::post('templatesliderdetail/store', array('as'=>'templatesliderdetail/store','uses'=>'Backend\TemplateSliderController@storeImage'));
            Route::get('templatesliderdetail/edit/{id}', array('as'=>'templatesliderdetail/edit','uses'=>'Backend\TemplateSliderController@edit'));
            Route::post('templatesliderdetail/update', array('as'=>'templatesliderdetail/update','uses'=>'Backend\TemplateSliderController@update'));
            Route::post('templatesliderdetail/destroy', array('as'=>'templatesliderdetail/destroy','uses'=>'Backend\TemplateSliderController@destroy'));
        });

    });

});


 Route::group(['prefix' => 'api'], function () {
        
        Route::post('activate', array('as'=>'activate','uses'=>'ApiController@Activate'));
        Route::post('check', array('as'=>'check','uses'=>'ApiController@check'));
    });