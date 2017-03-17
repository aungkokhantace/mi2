<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 7/4/2016
 * Time: 3:03 PM
 */

use Illuminate\Database\Seeder;
class Default_UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('core_users')->delete();

    $roles = array(
        ['id'=>1, 'user_name'=>'admin','display_name'=>'Super-Admin', 'password' =>'$2y$10$NLS2i1NpEUuQgoLgYk0QSOxsKxk6u1PFdeYJkpCraq2rS6polwYI6', 'email' =>'waiyanaung@aceplussolutions.com','role_id' =>'1','staff_id'=>'0001','address'=>'Building 5, Room 10, MICT Park, Hlaing Township, Yangon, Myanmar','description'=>'This is super admin role'],

        ['id'=>2, 'user_name'=>'administrator','display_name'=>'Administrator', 'password' =>'$2y$10$y5c8.r5Wfp8ZyuHVjy5f2OxkmR5.GyAJW4Yw9rOvAwyejvMBLSGt.', 'email' =>'administrator@gmail.com','role_id' =>'2','staff_id'=>'0002','address'=>'','description'=>'This is admin role'],
        //password for administrator = "12345@mi2"

        ['id'=>3, 'user_name'=>'registration_admin','display_name'=>'registration_admin', 'password' =>'$2y$10$7txQGR10/PzPm08VgEH3wOPHA0tfcFbkSKx.jDMoqQFNRUURioOk2', 'email' =>'registrationadmin@gmail.com','role_id' =>'3','staff_id'=>'0003','address'=>'','description'=>'This is registration admin role'],
        //password for registration_admin = "11111111"

        ['id'=>4, 'user_name'=>'abstract_admin','display_name'=>'abstract_admin', 'password' =>'$2y$10$7txQGR10/PzPm08VgEH3wOPHA0tfcFbkSKx.jDMoqQFNRUURioOk2', 'email' =>'abstractadmin@gmail.com','role_id' =>'4','staff_id'=>'0004','address'=>'','description'=>'This is abstract admin role'],
        //password for abstract_admin = "11111111"
    );

    DB::table('core_users')->insert($roles);
}
}