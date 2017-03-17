<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:17 PM
 */
use Illuminate\Database\Seeder;
class Default_RegistrationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registration_categories')->delete();

        $array = array(
            ['id'=>1, 'name'=>'International Delegate', 'currency_type'=>'usd', 'early_bird_fee'=>250, 'normal_fee'=>300, 'on_site_fee'=>300, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53'],
            ['id'=>2, 'name'=>'International Trainee', 'currency_type'=>'usd', 'early_bird_fee'=>200, 'normal_fee'=>240, 'on_site_fee'=>240, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53'],
            ['id'=>3, 'name'=>'Local Delegate (Member)', 'currency_type'=>'mmk', 'early_bird_fee'=>100000, 'normal_fee'=>150000, 'on_site_fee'=>175000, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53'],
            ['id'=>4, 'name'=>'Local Delegate (Non-member)', 'currency_type'=>'mmk', 'early_bird_fee'=>150000, 'normal_fee'=>200000, 'on_site_fee'=>225000, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53'],
            ['id'=>5, 'name'=>'Local Trainee', 'currency_type'=>'mmk', 'early_bird_fee'=>50000, 'normal_fee'=>50000, 'on_site_fee'=>50000, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53'],
        );

        DB::table('registration_categories')->insert($array);
    }
}