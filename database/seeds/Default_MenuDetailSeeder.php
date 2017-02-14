<?php
/**
 * Created by PhpStorm.
 * Author : Aung Ko Khant
 * Date: Feb/01/2017
 * Time: 11:32 AM
 */

use Illuminate\Database\Seeder;
class Default_MenuDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('menu_detail')->delete();

    $objs = array(
        ['id'=>1, 'menu_id'=>'2','page_id'=>'1', 'menu_order' =>'1', 'status' =>'active', 'menu_group' =>'1', 'menu_group_order' =>'1', 'name' =>'Home', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>2, 'menu_id'=>'2','page_id'=>'2', 'menu_order' =>'2', 'status' =>'active', 'menu_group' =>'2', 'menu_group_order' =>'1', 'name' =>'Membership', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>3, 'menu_id'=>'2','page_id'=>'3', 'menu_order' =>'3', 'status' =>'active', 'menu_group' =>'3', 'menu_group_order' =>'1', 'name' =>'Publications', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>4, 'menu_id'=>'2','page_id'=>'4', 'menu_order' =>'1', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Meetings', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>5, 'menu_id'=>'2','page_id'=>'5', 'menu_order' =>'5', 'status' =>'active', 'menu_group' =>'5', 'menu_group_order' =>'1', 'name' =>'Education', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>6, 'menu_id'=>'2','page_id'=>'6', 'menu_order' =>'6', 'status' =>'active', 'menu_group' =>'6', 'menu_group_order' =>'1', 'name' =>'Activities', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>7, 'menu_id'=>'2','page_id'=>'7', 'menu_order' =>'7', 'status' =>'active', 'menu_group' =>'7', 'menu_group_order' =>'1', 'name' =>'Advocacy', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>8, 'menu_id'=>'2','page_id'=>'8', 'menu_order' =>'8', 'status' =>'active', 'menu_group' =>'8', 'menu_group_order' =>'1', 'name' =>'Awards', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>9, 'menu_id'=>'2','page_id'=>'9', 'menu_order' =>'9', 'status' =>'active', 'menu_group' =>'9', 'menu_group_order' =>'1', 'name' =>'About Us', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>10, 'menu_id'=>'2','page_id'=>'10', 'menu_order' =>'10', 'status' =>'active', 'menu_group' =>'10', 'menu_group_order' =>'1', 'name' =>'Partner Website', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>11, 'menu_id'=>'3','page_id'=>'11', 'menu_order' =>'1', 'status' =>'active', 'menu_group' =>'1', 'menu_group_order' =>'1', 'name' =>'Home', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>12, 'menu_id'=>'3','page_id'=>'12', 'menu_order' =>'2', 'status' =>'active', 'menu_group' =>'2', 'menu_group_order' =>'1', 'name' =>'Register', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>13, 'menu_id'=>'3','page_id'=>'13', 'menu_order' =>'3', 'status' =>'active', 'menu_group' =>'3', 'menu_group_order' =>'1', 'name' =>'Call for Abstract', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>14, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'4', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Exhibitor Information', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>15, 'menu_id'=>'3','page_id'=>'15', 'menu_order' =>'5', 'status' =>'active', 'menu_group' =>'5', 'menu_group_order' =>'1', 'name' =>'Conference Information', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>16, 'menu_id'=>'3','page_id'=>'16', 'menu_order' =>'6', 'status' =>'active', 'menu_group' =>'6', 'menu_group_order' =>'1', 'name' =>'Other Information', 'parent_id' =>'0', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>17, 'menu_id'=>'3','page_id'=>'17', 'menu_order' =>'1', 'status' =>'active', 'menu_group' =>'6', 'menu_group_order' =>'1', 'name' =>'Local Information', 'parent_id' =>'16', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>18, 'menu_id'=>'3','page_id'=>'18', 'menu_order' =>'2', 'status' =>'active', 'menu_group' =>'6', 'menu_group_order' =>'1', 'name' =>'VISA Information', 'parent_id' =>'16', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>19, 'menu_id'=>'3','page_id'=>'19', 'menu_order' =>'3', 'status' =>'active', 'menu_group' =>'6', 'menu_group_order' =>'1', 'name' =>'Housing and Travel', 'parent_id' =>'16', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>20, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'1', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Agenda', 'parent_id' =>'14', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>21, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'2', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Speakers', 'parent_id' =>'14', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>22, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'3', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Committees', 'parent_id' =>'14', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>23, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'4', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Secretariat', 'parent_id' =>'14', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        ['id'=>24, 'menu_id'=>'3','page_id'=>'14', 'menu_order' =>'5', 'status' =>'active', 'menu_group' =>'4', 'menu_group_order' =>'1', 'name' =>'Contact Us', 'parent_id' =>'14', 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],

    );

    DB::table('menu_detail')->insert($objs);
}
}