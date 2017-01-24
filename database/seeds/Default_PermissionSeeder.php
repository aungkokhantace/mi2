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

            //Event Registration
            ['id'=>120,'module'=>'Register','name'=>'Listing','description'=>'Register Listing','url'=>'backend/register'],
            ['id'=>121,'module'=>'Register','name'=>'Store','description'=>'Register Store','url'=>'backend/register/store'],
            ['id'=>122,'module'=>'Register','name'=>'Edit','description'=>'Register Edit','url'=>'backend/register/edit'],
            ['id'=>123,'module'=>'Register','name'=>'Update','description'=>'Register Update','url'=>'backend/register/update'],
            ['id'=>124,'module'=>'Register','name'=>'Destroy','description'=>'Register Destroy','url'=>'backend/register/destroy'],
            ['id'=>125,'module'=>'Register','name'=>'Confirm','description'=>'Register Confirm','url'=>'backend/register/confirm'],
        );


        DB::table('core_permissions')->insert($permissions);
    }
}