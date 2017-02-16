<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_MedicalSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('medical_specialities')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Allergy & Immunology', 'option_group_name'=>null, 'description'=>'Allergy & Immunology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>2, 'name'=>'Cardiology', 'option_group_name'=>null, 'description'=>'Cardiology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>3, 'name'=>'Critical Care', 'option_group_name'=>null, 'description'=>'Critical Care', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>4, 'name'=>'Dermatology', 'option_group_name'=>null, 'description'=>'Dermatology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>5, 'name'=>'Diabetes & Endocrinology', 'option_group_name'=>null, 'description'=>'Diabetes & Endocrinology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>6, 'name'=>'Emergency Medicine', 'option_group_name'=>null, 'description'=>'Emergency Medicine', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>7, 'name'=>'Family Medicine', 'option_group_name'=>null, 'description'=>'Family Medicine', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>8, 'name'=>'Gastroenterology', 'option_group_name'=>null, 'description'=>'Gastroenterology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>9, 'name'=>'Hematology-Oncology', 'option_group_name'=>null, 'description'=>'Hematology-Oncology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>10, 'name'=>'HIV/AIDS', 'option_group_name'=>null, 'description'=>'HIV/AIDS', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>11, 'name'=>'Infectious Diseases', 'option_group_name'=>null, 'description'=>'Infectious Diseases', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>12, 'name'=>'Internal Medicine', 'option_group_name'=>null, 'description'=>'Internal Medicine', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>13, 'name'=>'Nephrology', 'option_group_name'=>null, 'description'=>'Nephrology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>14, 'name'=>'Neurology', 'option_group_name'=>null, 'description'=>'Neurology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>15, 'name'=>'Pathology & Lab Medicine', 'option_group_name'=>null, 'description'=>'Pathology & Lab Medicine', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>16, 'name'=>'Psychiatry', 'option_group_name'=>null, 'description'=>'Psychiatry', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>17, 'name'=>'Pulmonary Medicine', 'option_group_name'=>null, 'description'=>'Pulmonary Medicine', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>18, 'name'=>'Radiology', 'option_group_name'=>null, 'description'=>'Radiology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>19, 'name'=>'Rheumatology', 'option_group_name'=>null, 'description'=>'Rheumatology', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>20, 'name'=>'Transplantation', 'option_group_name'=>null, 'description'=>'Transplantation', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

    );

    DB::table('medical_specialities')->insert($objs);
}
}