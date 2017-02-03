<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:17 PM
 */
use Illuminate\Database\Seeder;
class Default_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_roles')->delete();

        $roles = array(
            ['id'=>1, 'name'=>'SUPER-ADMIN', 'description'=>'This is super admin role'],
            ['id'=>2, 'name'=>'ADMINISTRATOR', 'description'=>'This is administrator role'],
        );

        DB::table('core_roles')->insert($roles);
    }
}