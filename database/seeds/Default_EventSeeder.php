<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('events')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Event 1','description'=>'Event 1', 'status' => "1", 'url' => "url", 'title' => "Event 1", 'page_menu_order' => 1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
    );

    DB::table('events')->insert($objs);
}
}