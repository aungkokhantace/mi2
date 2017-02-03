<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('templates')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Template 1','description'=>'Template 1', 'has_slider' => 1, 'has_sidebar' => 1, 'active' => 1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
    );

    DB::table('templates')->insert($objs);
}
}