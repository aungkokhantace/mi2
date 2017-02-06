<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('pages')->delete();

    $objs = array(
        ['id'=>1, 'name'=>'Home','description'=>'Home description', 'content' =>'Home content', 'status' =>'active', 'url' =>'main_home', 'title' =>'Home title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>2, 'name'=>'Membership','description'=>'Membership description', 'content' =>'Membership content', 'status' =>'active', 'url' =>'main_membership', 'title' =>'Membership title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>3, 'name'=>'Publications','description'=>'Publications description', 'content' =>'Publications content', 'status' =>'active', 'url' =>'main_publications', 'title' =>'Publications title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>4, 'name'=>'Meetings','description'=>'Meetings description', 'content' =>'Meetings content', 'status' =>'active', 'url' =>'main_meetings', 'title' =>'Meetings title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>5, 'name'=>'Education','description'=>'Education description', 'content' =>'Education content', 'status' =>'active', 'url' =>'main_education', 'title' =>'Education title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>6, 'name'=>'Activities','description'=>'Activities description', 'content' =>'Activities content', 'status' =>'active', 'url' =>'main_activities', 'title' =>'Activities title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>7, 'name'=>'Advocacy','description'=>'Advocacy description', 'content' =>'Advocacy content', 'status' =>'active', 'url' =>'main_advocacy', 'title' =>'Advocacy title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>8, 'name'=>'Awards','description'=>'Awards description', 'content' =>'Awards content', 'status' =>'active', 'url' =>'main_awards', 'title' =>'Awards title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>9, 'name'=>'About Us','description'=>'About Us description', 'content' =>'About Us content', 'status' =>'active', 'url' =>'main_about_us', 'title' =>'About Us title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>10, 'name'=>'Partner Website','description'=>'Partner Website description', 'content' =>'Partner Website content', 'status' =>'active', 'url' =>'main_partner_website', 'title' =>'Partner Website title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>11, 'name'=>'Home','description'=>'Home description', 'content' =>'Home content', 'status' =>'active', 'url' =>'home', 'title' =>'Home title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>12, 'name'=>'Register','description'=>'Register description', 'content' =>'Register content', 'status' =>'active', 'url' =>'register/create', 'title' =>'Register title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>13, 'name'=>'Abstract','description'=>'Abstract description', 'content' =>'Abstract content', 'status' =>'active', 'url' =>'abstractform/call', 'title' =>'Abstract title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>14, 'name'=>'Exhibitor','description'=>'Exhibitor description', 'content' =>'Exhibitor content', 'status' =>'active', 'url' =>'event/exhibitor', 'title' =>'Exhibitor title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>15, 'name'=>'Conference','description'=>'Conference description', 'content' =>'Conference content', 'status' =>'active', 'url' =>'event/conference', 'title' =>'Conference title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>16, 'name'=>'Other','description'=>'Other description', 'content' =>'Other content', 'status' =>'active', 'url' =>'event/other', 'title' =>'Other title', 'page_menu_order' =>'1', 'events_id' =>'1', 'templates_id' =>'1', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

    );

    DB::table('pages')->insert($objs);
}
}