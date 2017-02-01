<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:18 PM
 */
use Illuminate\Database\Seeder;

class Default_ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_configs')->delete();

        $roles = array(
            ['code'=>'SETTING_COMPANY_NAME', 'type'=>'SETTING', 'value'=>'AcePlus Backend','description'=>'Company Name'],
            ['code'=>'SETTING_LOGO', 'type'=>'SETTING', 'value'=>'/images/logo.jpg','description'=>'Company Logo'],
            ['code'=>'LOG_MAX_FILES', 'type'=>'SETTING', 'value'=>'60','description'=>'Maximum Log File Count'],
            ['code'=>'HEADER_MENU', 'type'=>'SETTING', 'value'=>'on','description'=>'Header Menu Flag'],
            ['code'=>'FOOTER_MENU', 'type'=>'SETTING', 'value'=>'on','description'=>'Footer Menu Flag']
        );

        DB::table('core_configs')->insert($roles);
    }
}