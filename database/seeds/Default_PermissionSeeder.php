<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:18 PM
 */
use Illuminate\Database\Seeder;
class Default_PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_permissions')->delete();

        $permissions = array(

            // Roles
            ['id'=>1,'module'=>'Role','name'=>'Listing','description'=>'Role Listing','url'=>'backend/role'],
            ['id'=>2,'module'=>'Role','name'=>'New','description'=>'Role New','url'=>'backend/role/create'],
            ['id'=>3,'module'=>'Role','name'=>'Store','description'=>'Role Store','url'=>'backend/role/store'],
            ['id'=>4,'module'=>'Role','name'=>'Edit','description'=>'Role Edit','url'=>'backend/role/edit'],
            ['id'=>5,'module'=>'Role','name'=>'Update','description'=>'Role Update','url'=>'backend/role/update'],
            ['id'=>6,'module'=>'Role','name'=>'Destroy','description'=>'Role Destroy','url'=>'backend/role/destroy'],
            ['id'=>7,'module'=>'Role','name'=>'Permission View','description'=>'Role Permission View','url'=>'backend/rolePermission'],
            ['id'=>8,'module'=>'Role','name'=>'Permission Assign','description'=>'Role Permission Assign','url'=>'backend/rolePermissionAssign'],

            // Users
            ['id'=>9,'module'=>'User','name'=>'Listing','description'=>'User Listing','url'=>'backend/user'],
            ['id'=>10,'module'=>'User','name'=>'New','description'=>'User New','url'=>'backend/user/create'],
            ['id'=>11,'module'=>'User','name'=>'Store','description'=>'User Store','url'=>'backend/user/store'],
            ['id'=>12,'module'=>'User','name'=>'Edit','description'=>'User Edit','url'=>'backend/user/edit'],
            ['id'=>13,'module'=>'User','name'=>'Update','description'=>'User Update','url'=>'backend/user/update'],
            ['id'=>14,'module'=>'User','name'=>'Destroy','description'=>'User Destroy','url'=>'backend/user/destroy'],
            ['id'=>15,'module'=>'User','name'=>'Auth','description'=>'Getting Auth User','url'=>'backend/userAuth'],
            ['id'=>16,'module'=>'User','name'=>'Profile','description'=>'User Profile','url'=>'backend/user/profile'],

            // Permissions
            ['id'=>17,'module'=>'Permission','name'=>'Listing','description'=>'Permission Listing','url'=>'backend/permission'],
            ['id'=>18,'module'=>'Permission','name'=>'New','description'=>'Permission New','url'=>'backend/permission/create'],
            ['id'=>19,'module'=>'Permission','name'=>'Store','description'=>'Permission Store','url'=>'backend/permission/store'],
            ['id'=>20,'module'=>'Permission','name'=>'Edit','description'=>'Permission Edit','url'=>'backend/permission/edit'],
            ['id'=>21,'module'=>'Permission','name'=>'Update','description'=>'Permission Update','url'=>'backend/permission/update'],
            ['id'=>22,'module'=>'Permission','name'=>'Destroy','description'=>'Permission Destroy','url'=>'backend/permission/destroy'],

            // Configs
            ['id'=>23,'module'=>'Config','name'=>'View','description'=>'Editing','url'=>'backend/config'],

            ['id'=>30,'module'=>'Backend','name'=>'Listing','description'=>'Backend Listing','url'=>'backend'],
            ['id'=>31,'module'=>'Backend','name'=>'New','description'=>'Backend New','url'=>'backend/create'],
            ['id'=>32,'module'=>'Backend','name'=>'Store','description'=>'Backend Store','url'=>'backend/store'],
            ['id'=>33,'module'=>'Backend','name'=>'Edit','description'=>'Backend Edit','url'=>'backend/edit'],
            ['id'=>34,'module'=>'Backend','name'=>'Update','description'=>'Backend Update','url'=>'backend/update'],
            ['id'=>35,'module'=>'Backend','name'=>'Detail','description'=>'Backend Detail','url'=>'backend/detail'],
            ['id'=>36,'module'=>'Backend','name'=>'Detail Update','description'=>'Backend Update','url'=>'backend/detail/update'],

            ['id'=>37,'module'=>'Frontend','name'=>'Listing','description'=>'Listing','url'=>'frontend'],
            ['id'=>38,'module'=>'Frontend','name'=>'Log','description'=>'Backend','url'=>'log/backend'],
            ['id'=>39,'module'=>'Frontend','name'=>'Log','description'=>'Frontend','url'=>'log/frontend'],

            ['id'=>40,'module'=>'Frontend','name'=>'Log','description'=>'Activation','url'=>'log/activation'],
            ['id'=>41,'module'=>'Frontend','name'=>'Update Status','description'=>'Update Status','url'=>'frontend/updatestatus'],
            ['id'=>42,'module'=>'Frontend','name'=>'Update','description'=>'Update Frontend','url'=>'frontend/update'],
            ['id'=>43,'module'=>'Frontend','name'=>'Edit','description'=>'Edit Frontend','url'=>'frontend/edit'],

            //Event
            ['id'=>50,'module'=>'Event','name'=>'Listing','description'=>'Event Listing','url'=>'backend/event'],
            ['id'=>51,'module'=>'Event','name'=>'New','description'=>'Event New','url'=>'backend/event/create'],
            ['id'=>52,'module'=>'Event','name'=>'Store','description'=>'Event Store','url'=>'backend/event/store'],
            ['id'=>53,'module'=>'Event','name'=>'Edit','description'=>'Event Edit','url'=>'backend/event/edit'],
            ['id'=>54,'module'=>'Event','name'=>'Update','description'=>'Event Update','url'=>'backend/event/update'],
            ['id'=>55,'module'=>'Event','name'=>'Destroy','description'=>'Event Destroy','url'=>'backend/event/destroy'],

            // Pages
            ['id'=>60,'module'=>'Page','name'=>'Listing','description'=>'Page Listing','url'=>'backend/page'],
            ['id'=>61,'module'=>'Page','name'=>'New','description'=>'Page New','url'=>'backend/page/create'],
            ['id'=>62,'module'=>'Page','name'=>'Store','description'=>'Page Store','url'=>'backend/page/store'],
            ['id'=>63,'module'=>'Page','name'=>'Edit','description'=>'Page Edit','url'=>'backend/page/edit'],
            ['id'=>64,'module'=>'Page','name'=>'Update','description'=>'Page Update','url'=>'backend/page/update'],
            ['id'=>65,'module'=>'Page','name'=>'Destroy','description'=>'Page Destroy','url'=>'backend/page/destroy'],

            //Menu
            ['id'=>70,'module'=>'Menu','name'=>'Listing','description'=>'Menu Listing','url'=>'backend/menu'],
            ['id'=>71,'module'=>'Menu','name'=>'New','description'=>'Menu New','url'=>'backend/menu/create'],
            ['id'=>72,'module'=>'Menu','name'=>'Store','description'=>'Menu Store','url'=>'backend/menu/store'],
            ['id'=>73,'module'=>'Menu','name'=>'Edit','description'=>'Menu Edit','url'=>'backend/menu/edit'],
            ['id'=>74,'module'=>'Menu','name'=>'Update','description'=>'Menu Update','url'=>'backend/menu/update'],
            ['id'=>75,'module'=>'Menu','name'=>'Destroy','description'=>'Menu Destroy','url'=>'backend/menu/destroy'],

            //Menudetail
            ['id'=>80,'module'=>'Menudetail','name'=>'Listing','description'=>'Menu Detail Listing','url'=>'backend/menudetail'],
            ['id'=>81,'module'=>'Menudetail','name'=>'New','description'=>'Menu Detail New','url'=>'backend/menudetail/create'],
            ['id'=>82,'module'=>'Menudetail','name'=>'Store','description'=>'Menu Detail Store','url'=>'backend/menudetail/store'],
            ['id'=>83,'module'=>'Menudetail','name'=>'Edit','description'=>'Menu Detail Edit','url'=>'backend/menudetail/edit'],
            ['id'=>84,'module'=>'Menudetail','name'=>'Update','description'=>'Menu Detail Update','url'=>'backend/menudetail/update'],
            ['id'=>85,'module'=>'Menudetail','name'=>'Destroy','description'=>'Menu Detail Destroy','url'=>'backend/menudetail/destroy'],

            //Template
            ['id'=>90,'module'=>'Template','name'=>'Listing','description'=>'Template Listing','url'=>'backend/template'],
            ['id'=>91,'module'=>'Template','name'=>'New','description'=>'Template New','url'=>'backend/template/create'],
            ['id'=>92,'module'=>'Template','name'=>'Store','description'=>'Template Store','url'=>'backend/template/store'],
            ['id'=>93,'module'=>'Template','name'=>'Edit','description'=>'Template Edit','url'=>'backend/template/edit'],
            ['id'=>94,'module'=>'Template','name'=>'Update','description'=>'Template Update','url'=>'backend/template/update'],
            ['id'=>95,'module'=>'Template','name'=>'Destroy','description'=>'Template Destroy','url'=>'backend/template/destroy'],

            //Template Sidebar Menu
            ['id'=>100,'module'=>'Template Sidebar Menu','name'=>'Listing','description'=>'Template Sidebar Menu Listing','url'=>'backend/templatesidebarmenu'],
            ['id'=>101,'module'=>'Template Sidebar Menu','name'=>'New','description'=>'Template Sidebar Menu New','url'=>'backend/templatesidebarmenu/create'],
            ['id'=>102,'module'=>'Template Sidebar Menu','name'=>'Store','description'=>'Template Sidebar Menu Store','url'=>'backend/templatesidebarmenu/store'],
            ['id'=>103,'module'=>'Template Sidebar Menu','name'=>'Edit','description'=>'Template Sidebar Menu Edit','url'=>'backend/templatesidebarmenu/edit'],
            ['id'=>104,'module'=>'Template Sidebar Menu','name'=>'Update','description'=>'Template Sidebar Menu Update','url'=>'backend/templatesidebarmenu/update'],
            ['id'=>105,'module'=>'Template Sidebar Menu','name'=>'Destroy','description'=>'Template Sidebar Menu Destroy','url'=>'backend/templatesidebarmenu/destroy'],

            //Template Slider
            ['id'=>110,'module'=>'Template Slider','name'=>'Listing','description'=>'Template Slider Listing','url'=>'backend/templateslider'],
            ['id'=>111,'module'=>'Template Slider','name'=>'Create','description'=>'Template Slider Create','url'=>'backend/templateslider/create'],
            ['id'=>112,'module'=>'Template Slider','name'=>'Store','description'=>'Template Slider Store','url'=>'backend/templateslider/store'],
            ['id'=>113,'module'=>'Template Slider','name'=>'Edit','description'=>'Template Slider Edit','url'=>'backend/templateslider/edit'],
            ['id'=>114,'module'=>'Template Slider','name'=>'Update','description'=>'Template Slider Update','url'=>'backend/templateslider/update'],
            ['id'=>115,'module'=>'Template Slider','name'=>'Destroy','description'=>'Template Slider Destroy','url'=>'backend/templateslider/destroy'],
            ['id'=>116,'module'=>'Template Slider Detail','name'=>'New','description'=>'Template Slider Detail New','url'=>'backend/templatesliderdetail/create'],
            ['id'=>117,'module'=>'Template Slider Detail','name'=>'Store','description'=>'Template Slider Detail Store','url'=>'backend/templatesliderdetail/store'],
            ['id'=>118,'module'=>'Template Slider Detail','name'=>'Destroy','description'=>'Template Slider Detail Destroy','url'=>'backend/templatesliderdetail/destroy'],

            //Event Registration
            ['id'=>120,'module'=>'Register','name'=>'Listing','description'=>'Register Listing','url'=>'backend/register'],
            ['id'=>121,'module'=>'Register','name'=>'Store','description'=>'Register Store','url'=>'backend/register/store'],
            ['id'=>122,'module'=>'Register','name'=>'Edit','description'=>'Register Edit','url'=>'backend/register/edit'],
            ['id'=>123,'module'=>'Register','name'=>'Update','description'=>'Register Update','url'=>'backend/register/update'],
            ['id'=>124,'module'=>'Register','name'=>'Destroy','description'=>'Register Destroy','url'=>'backend/register/destroy'],
            ['id'=>125,'module'=>'Register','name'=>'Confirm','description'=>'Register Confirm','url'=>'backend/register/confirm'],

            // Abstractform
            ['id'=>130,'module'=>'Abstractform','name'=>'Listing','description'=>'Abstractform Listing','url'=>'backend/abstractform'],
            ['id'=>131,'module'=>'Abstractform','name'=>'Edit','description'=>'Abstractform Edit','url'=>'backend/abstractform/edit'],
            ['id'=>132,'module'=>'Abstractform','name'=>'Update','description'=>'Abstractform Update','url'=>'backend/abstractform/update'],
            ['id'=>133,'module'=>'Abstractform','name'=>'Destroy','description'=>'Abstractform Destroy','url'=>'backend/abstractform/destroy'],
            ['id'=>134,'module'=>'Abstractform','name'=>'Edit Reject','description'=>'Abstractform Edit Reject','url'=>'backend/abstractform/edit_reject'],
            ['id'=>135,'module'=>'Abstractform','name'=>'Reject','description'=>'Abstractform Reject','url'=>'backend/abstractform/reject'],

            //Post
            ['id'=>140,'module'=>'Post','name'=>'Listing','description'=>'Post Listing','url'=>'backend/post'],
            ['id'=>141,'module'=>'Post','name'=>'Create','description'=>'Post Create','url'=>'backend/post/create'],
            ['id'=>142,'module'=>'Post','name'=>'Store','description'=>'Post Store','url'=>'backend/post/store'],
            ['id'=>143,'module'=>'Post','name'=>'Edit','description'=>'Post Edit','url'=>'backend/post/edit'],
            ['id'=>144,'module'=>'Post','name'=>'Update','description'=>'Post Update','url'=>'backend/post/update'],
            ['id'=>145,'module'=>'Post','name'=>'Destroy','description'=>'Post Destroy','url'=>'backend/post/destroy'],

            //Event Email
            ['id'=>150,'module'=>'Event Email','name'=>'Listing','description'=>'Event Email Listing','url'=>'backend/eventemail'],
            ['id'=>151,'module'=>'Event Email','name'=>'Create','description'=>'Event Email Create','url'=>'backend/eventemail/create'],
            ['id'=>152,'module'=>'Event Email','name'=>'Store','description'=>'Event Email Store','url'=>'backend/eventemail/store'],
            ['id'=>153,'module'=>'Event Email','name'=>'Edit','description'=>'Event Email Edit','url'=>'backend/eventemail/edit'],
            ['id'=>154,'module'=>'Event Email','name'=>'Update','description'=>'Event Email Update','url'=>'backend/eventemail/update'],
            ['id'=>155,'module'=>'Event Email','name'=>'Destroy','description'=>'Event Email Destroy','url'=>'backend/eventemail/destroy'],

            //Registration Email Body
//            ['id'=>160,'module'=>'Registration Email','name'=>'View','description'=>'Registration Email Update','url'=>'backend/registrationemail'],

            //Abstract Email Body
//            ['id'=>165,'module'=>'Abstract Email','name'=>'View','description'=>'Abstract Email Update','url'=>'backend/abstractemail'],

            //Medical Specialities
            ['id'=>170,'module'=>'Medical Speciality','name'=>'Listing','description'=>'Medical Speciality Listing','url'=>'backend/medicalspeciality'],
            ['id'=>171,'module'=>'Medical Speciality','name'=>'Create','description'=>'Medical Speciality Create','url'=>'backend/medicalspeciality/create'],
            ['id'=>172,'module'=>'Medical Speciality','name'=>'Store','description'=>'Medical Speciality Store','url'=>'backend/medicalspeciality/store'],
            ['id'=>173,'module'=>'Medical Speciality','name'=>'Edit','description'=>'Medical Speciality Edit','url'=>'backend/medicalspeciality/edit'],
            ['id'=>174,'module'=>'Medical Speciality','name'=>'Update','description'=>'Medical Speciality Update','url'=>'backend/medicalspeciality/update'],
            ['id'=>175,'module'=>'Medical Speciality','name'=>'Destroy','description'=>'Medical Speciality Destroy','url'=>'backend/medicalspeciality/destroy'],

            //Registration submit user email
            ['id'=>180,'module'=>'Registration Submit User Email','name'=>'View','description'=>'Registration Submit User Email','url'=>'backend/registration_submit_user_email'],

            //Registration submit admin email
            ['id'=>181,'module'=>'Registration Submit Admin Email','name'=>'View','description'=>'Registration Submit Admin Email','url'=>'backend/registration_submit_admin_email'],

            //Registration confirm user email
            ['id'=>182,'module'=>'Registration Confirm User Email','name'=>'View','description'=>'Registration Confirm User Email','url'=>'backend/registration_confirm_user_email'],

            //Registration confirm admin email
            ['id'=>183,'module'=>'Registration Confirm Admin Email','name'=>'View','description'=>'Registration Confirm Admin Email','url'=>'backend/registration_confirm_admin_email'],

            //Abstract submit user email
            ['id'=>184,'module'=>'Abstract Submit User Email','name'=>'View','description'=>'Abstract Submit User Email','url'=>'backend/abstract_submit_user_email'],

            //Abstract submit admin email
            ['id'=>185,'module'=>'Abstract Submit Admin Email','name'=>'View','description'=>'Abstract Submit Admin Email','url'=>'backend/abstract_submit_admin_email'],

            //Abstract confirm user email 1
            ['id'=>186,'module'=>'Abstract Confirm User Email 1','name'=>'View','description'=>'Abstract Confirm User Email 1','url'=>'backend/abstract_confirm_user_email_1'],

            //Abstract confirm admin email 1
            ['id'=>187,'module'=>'Abstract Confirm Admin Email 1','name'=>'View','description'=>'Abstract Confirm Admin Email 1','url'=>'backend/abstract_confirm_admin_email_1'],

            //Abstract confirm user email 2
            ['id'=>188,'module'=>'Abstract Confirm User Email 2','name'=>'View','description'=>'Abstract Confirm User Email 2','url'=>'backend/abstract_confirm_user_email_2'],

            //Abstract confirm admin email 2
            ['id'=>189,'module'=>'Abstract Confirm Admin Email 2','name'=>'View','description'=>'Abstract Confirm Admin Email 2','url'=>'backend/abstract_confirm_admin_email_2'],

            //Abstract reject user email
            ['id'=>190,'module'=>'Abstract Reject User Email','name'=>'View','description'=>'Abstract Reject User Email','url'=>'backend/abstract_reject_user_email'],

            //Abstract reject admin email
            ['id'=>191,'module'=>'Abstract Reject Admin Email','name'=>'View','description'=>'Abstract Reject Admin Email','url'=>'backend/abstract_reject_admin_email'],

            //Registration Categories
            ['id'=>200,'module'=>'Registration Category','name'=>'Listing','description'=>'Registration Category Listing','url'=>'backend/registrationcategory'],
            ['id'=>201,'module'=>'Registration Category','name'=>'Create','description'=>'Registration Category Create','url'=>'backend/registrationcategory/create'],
            ['id'=>202,'module'=>'Registration Category','name'=>'Store','description'=>'Registration Category Store','url'=>'backend/registrationcategory/store'],
            ['id'=>203,'module'=>'Registration Category','name'=>'Edit','description'=>'Registration Category Edit','url'=>'backend/registrationcategory/edit'],
            ['id'=>204,'module'=>'Registration Category','name'=>'Update','description'=>'Registration Category Update','url'=>'backend/registrationcategory/update'],
            ['id'=>205,'module'=>'Registration Category','name'=>'Destroy','description'=>'Registration Category Destroy','url'=>'backend/registrationcategory/destroy'],

        );


        DB::table('core_permissions')->insert($permissions);
    }
}