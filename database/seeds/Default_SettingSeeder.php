<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:18 PM
 */
use Illuminate\Database\Seeder;

class Default_SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_settings')->delete();

        $arr = array(
            ['code'=>'HEADER MENU', 'type'=>'MENU', 'value'=>'1','description'=>'Header Menu'],
            ['code'=>'MAIN MENU', 'type'=>'MENU', 'value'=>'2','description'=>'Main Menu'],
            ['code'=>'SIDE MENU', 'type'=>'MENU', 'value'=>'3','description'=>'Side Menu'],
            ['code'=>'FOOTER MENU', 'type'=>'MENU', 'value'=>'4','description'=>'Footer Menu'],
        );

        DB::table('core_settings')->insert($arr);
    }
}