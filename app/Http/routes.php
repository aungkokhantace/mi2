<?php
Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'frontendorbackend'], function () {


        //Frontend // Event Home // event_home
        Route::get('/', 'Frontend\HomeController@index');
        Route::get('/home', 'Frontend\HomeController@index');

        Route::get('register/create',  array('as'=>'register/create','uses'=>'Frontend\RegisterController@create'));
        Route::post('register/store', array('as'=>'register/store','uses'=>'Frontend\RegisterController@store'));

        //Event ( Abstarct Form )
        Route::get('abstractform/call', array('as'=>'abstractform/call','uses'=>'Frontend\AbstractformController@call'));
        Route::get('abstractform/create', array('as'=>'abstractform/create','uses'=>'Frontend\AbstractformController@create'));
        Route::post('abstractform/store', array('as'=>'abstractform/store','uses'=>'Frontend\AbstractformController@store'));

        // event_exhibitor_info
        // event_conference_info
        // event_other_info
//        Route::get('event/exhibitor', array('as'=>'event/call','uses'=>'Frontend\HomeController@exhibitor'));
//        Route::get('event/conference', array('as'=>'event/conference','uses'=>'Frontend\HomeController@conference'));
//        Route::get('event/other', array('as'=>'event/other','uses'=>'Frontend\HomeController@other'));

        //frontend pages with new routes
        Route::get('home/register',  array('as'=>'home/register','uses'=>'Frontend\RegisterController@call'));
        Route::get('home/abstract', array('as'=>'home/abstract','uses'=>'Frontend\AbstractformController@call'));
        Route::get('home/exhibitor', array('as'=>'home/exhibitor','uses'=>'Frontend\HomeController@exhibitor'));
        Route::get('home/conference', array('as'=>'home/conference','uses'=>'Frontend\HomeController@conference'));
        Route::get('home/other', array('as'=>'home/other','uses'=>'Frontend\HomeController@other'));

        Route::get('comingsoon', array('as'=>'event/other','uses'=>'Frontend\HomeController@comingsoon'));


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

            //Event Registration Report
            Route::get('report/registration', array('as'=>'backend/report/registration','uses'=>'Report\RegistrationReportController@index'));
            Route::get('report/registration/search/{from_date?}/{to_date?}', array('as'=>'backend/report/registration/search/{from_date?}/{to_date?}','uses'=>'Report\RegistrationReportController@search'));
            Route::get('report/registration/exportexcel/{from_date?}/{to_date?}', array('as'=>'backend/report/registration/exportexcel/{from_date?}/{to_date?}','uses'=>'Report\RegistrationReportController@excel'));
            Route::get('report/registration/export', array('as'=>'backend/report/registration/export','uses'=>'Report\RegistrationReportController@export'));

            //Event Abstract Report
            Route::get('report/abstract', array('as'=>'backend/report/abstract','uses'=>'Report\AbstractReportController@index'));
            Route::get('report/abstract/search/{from_date?}/{to_date?}', array('as'=>'backend/report/abstract/search/{from_date?}/{to_date?}','uses'=>'Report\AbstractReportController@search'));
            Route::get('report/abstract/exportexcel/{from_date?}/{to_date?}', array('as'=>'backend/report/abstract/exportexcel/{from_date?}/{to_date?}','uses'=>'Report\AbstractReportController@excel'));
            Route::get('report/abstract/export', array('as'=>'backend/report/abstract/export','uses'=>'Report\AbstractReportController@export'));

        });       


    //Frontend
    Route::get('/', 'Frontend\HomeController@index');
    Route::get('/testpage', 'Frontend\HomeController@test');

//    Route::get('register/create',  array('as'=>'register/create','uses'=>'Frontend\RegisterController@create'));
    Route::post('register/store', array('as'=>'register/store','uses'=>'Frontend\RegisterController@store'));

    //Event ( Abstarct Form )
    Route::get('abstractform/create', array('as'=>'abstractform/create','uses'=>'Frontend\AbstractformController@create'));
    Route::post('abstractform/store', array('as'=>'abstractform/store','uses'=>'Frontend\AbstractformController@store'));


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

                //Template Slider
                Route::get('templateslider', array('as'=>'backend/templateslider','uses'=>'Backend\TemplateSliderController@index'));
                Route::get('templateslider/create', array('as'=>'backend/templateslider/create','uses'=>'Backend\TemplateSliderController@create'));
                Route::post('templateslider/store', array('as'=>'backend/templateslider/store','uses'=>'Backend\TemplateSliderController@store'));
                Route::get('templateslider/edit/{id}', array('as'=>'backend/templateslider/edit','uses'=>'Backend\TemplateSliderController@edit'));
                Route::post('templateslider/update', array('as'=>'backend/templateslider/update','uses'=>'Backend\TemplateSliderController@update'));
                Route::post('templateslider/destroy', array('as'=>'backend/templateslider/destroy','uses'=>'Backend\TemplateSliderController@destroy'));

                //Template Slider Detail
                Route::get('templatesliderdetail/create/{id}', array('as'=>'backend/templatesliderdetail/create','uses'=>'Backend\TemplateSliderController@addImage'));
                Route::post('templatesliderdetail/store', array('as'=>'backend/templatesliderdetail/store','uses'=>'Backend\TemplateSliderController@storeImage'));
                Route::post('templatesliderdetail/destroy', array('as'=>'backend/templatesliderdetail/destroy','uses'=>'Backend\TemplateSliderController@deleteImage'));

                //Register
                Route::get('register', array('as'=>'backend/register','uses'=>'Backend\RegisterController@index'));
                Route::get('register/edit/{id}',  array('as'=>'backend/register/edit','uses'=>'Backend\RegisterController@edit'));
                Route::post('register/update',  array('as'=>'backend/register/update','uses'=>'Backend\RegisterController@update'));
                Route::post('register/destroy',  array('as'=>'backend/register/destroy','uses'=>'Backend\RegisterController@destroy'));
                Route::get('register/confirm/{registerId}',array('as'=>'backend/register/confirm','uses'=>'Backend\RegisterController@confirm'));
                Route::post('register/confirm',array('as'=>'backend/register/confirm','uses'=>'Backend\RegisterController@registerConfirm'));

                //Abstractform
                Route::get('abstractform', array('as'=>'backend/abstractform','uses'=>'Backend\AbstractformController@index'));
                Route::get('abstractform/edit/{id}',  array('as'=>'backend/abstractform/edit','uses'=>'Backend\AbstractformController@edit'));
                Route::post('abstractform/update',  array('as'=>'backend/abstractform/update','uses'=>'Backend\AbstractformController@update'));
                Route::get('abstractform/download', array('as'=>'backend/abstractform/download','uses'=>'Backend\AbstractformController@download'));
                Route::post('abstractform/destroy',  array('as'=>'backend/abstractform/destroy','uses'=>'Backend\AbstractformController@destroy'));

                //Post
                Route::get('post', array('as'=>'backend/post','uses'=>'Backend\PostController@index'));
                Route::get('post/create', array('as'=>'backend/post/create','uses'=>'Backend\PostController@create'));
                Route::get('post/edit/{id}', array('as'=>'backend/post/edit','uses'=>'Backend\PostController@edit'));
                Route::post('post/store', array('as'=>'backend/post/store','uses'=>'Backend\PostController@store'));
                Route::post('post/update', array('as'=>'backend/post/update','uses'=>'Backend\PostController@update'));
                Route::post('post/destroy', array('as'=>'backend/post/destroy','uses'=>'Backend\PostController@destroy'));

                //Registration Email
                Route::get('registrationemail', array('as'=>'backend/registrationemail','uses'=>'Backend\RegistrationEmailController@edit'));
                Route::post('registrationemail', array('as'=>'backend/registrationemail','uses'=>'Backend\RegistrationEmailController@update'));

                //Abstract Email
                Route::get('abstractemail', array('as'=>'backend/abstractemail','uses'=>'Backend\AbstractEmailController@edit'));
                Route::post('abstractemail', array('as'=>'backend/abstractemail','uses'=>'Backend\AbstractEmailController@update'));

                //Event Emails(create to-emails)
                Route::get('eventemail', array('as'=>'backend/eventemail','uses'=>'Backend\EventEmailController@index'));
                Route::get('eventemail/create', array('as'=>'backend/eventemail/create','uses'=>'Backend\EventEmailController@create'));
                Route::get('eventemail/edit/{id}', array('as'=>'backend/eventemail/edit','uses'=>'Backend\EventEmailController@edit'));
                Route::post('eventemail/store', array('as'=>'backend/eventemail/store','uses'=>'Backend\EventEmailController@store'));
                Route::post('eventemail/update', array('as'=>'backend/eventemail/update','uses'=>'Backend\EventEmailController@update'));
                Route::post('eventemail/destroy', array('as'=>'backend/eventemail/destroy','uses'=>'Backend\EventEmailController@destroy'));

                //Medical Specialities
                Route::get('medicalspeciality', array('as'=>'backend/medicalspeciality','uses'=>'Backend\MedicalSpecialityController@index'));
                Route::get('medicalspeciality/create', array('as'=>'backend/medicalspeciality/create','uses'=>'Backend\MedicalSpecialityController@create'));
                Route::post('medicalspeciality/store', array('as'=>'backend/medicalspeciality/store','uses'=>'Backend\MedicalSpecialityController@store'));
                Route::get('medicalspeciality/edit/{id}', array('as'=>'backend/medicalspeciality/edit','uses'=>'Backend\MedicalSpecialityController@edit'));
                Route::post('medicalspeciality/update', array('as'=>'backend/medicalspeciality/update','uses'=>'Backend\MedicalSpecialityController@update'));
                Route::post('medicalspeciality/destroy', array('as'=>'backend/medicalspeciality/destroy','uses'=>'Backend\MedicalSpecialityController@destroy'));
            });

        });

    });

});



Route::group(['prefix' => 'api'], function () {

    Route::post('activate', array('as'=>'activate','uses'=>'ApiController@Activate'));
    Route::post('check', array('as'=>'check','uses'=>'ApiController@check'));
});