<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('menu')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Header Menu','description'=>'', 'category' =>'1', 'active' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>2, 'name'=>'Main Menu','description'=>'', 'category' =>'2', 'active' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>3, 'name'=>'Side Menu','description'=>'', 'category' =>'3', 'active' =>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>4, 'name'=>'Footer Menu','description'=>'', 'category' =>'4', 'active' =>0, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

    );

    DB::table('menu')->insert($objs);
}
}