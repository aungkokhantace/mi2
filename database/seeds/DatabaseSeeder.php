<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Seeders
         $this->call(Default_ConfigSeeder::class);
         $this->call(Default_RoleSeeder::class);
         $this->call(Default_UserSeeder::class);
         $this->call(Default_PermissionSeeder::class);
         $this->call(Default_RolePermissionSeeder::class);
         $this->call(Default_Syncs_TablesSeeder::class);
//         $this->call(Default_CountriesSeeder::class);
         $this->call(Default_SettingSeeder::class);
         $this->call(Default_MenuSeeder::class);
         $this->call(Default_MenuDetailSeeder::class);
         $this->call(Default_TemplateSeeder::class);
         $this->call(Default_EventSeeder::class);
         $this->call(Default_PageSeeder::class);
         $this->call(Default_PostSeeder::class);
         $this->call(Default_MedicalSpecialitySeeder::class);
         $this->call(Default_TemplateSliderSeeder::class);
    }
}
