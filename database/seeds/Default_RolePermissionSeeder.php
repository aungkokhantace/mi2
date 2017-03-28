<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:19 PM
 */

use Illuminate\Database\Seeder;

class Default_RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_permission_role')->delete();

        $roles = array(
//          start  role-permissions for super-administrator //developer account
            ['role_id'=>1, 'permission_id'=>1],
            ['role_id'=>1, 'permission_id'=>2],
            ['role_id'=>1, 'permission_id'=>3],
            ['role_id'=>1, 'permission_id'=>4],
            ['role_id'=>1, 'permission_id'=>5],
            ['role_id'=>1, 'permission_id'=>6],
            ['role_id'=>1, 'permission_id'=>7],
            ['role_id'=>1, 'permission_id'=>8],
            ['role_id'=>1, 'permission_id'=>9],
            ['role_id'=>1, 'permission_id'=>10],
            ['role_id'=>1, 'permission_id'=>11],
            ['role_id'=>1, 'permission_id'=>12],
            ['role_id'=>1, 'permission_id'=>13],
            ['role_id'=>1, 'permission_id'=>14],
            ['role_id'=>1, 'permission_id'=>15],
            ['role_id'=>1, 'permission_id'=>16],
            ['role_id'=>1, 'permission_id'=>17],
            ['role_id'=>1, 'permission_id'=>18],
            ['role_id'=>1, 'permission_id'=>19],
            ['role_id'=>1, 'permission_id'=>20],
            ['role_id'=>1, 'permission_id'=>21],
            ['role_id'=>1, 'permission_id'=>22],
            ['role_id'=>1, 'permission_id'=>23],

            ['role_id'=>1, 'permission_id'=>25],

            ['role_id'=>1, 'permission_id'=>30],
            ['role_id'=>1, 'permission_id'=>31],
            ['role_id'=>1, 'permission_id'=>32],
            ['role_id'=>1, 'permission_id'=>33],
            ['role_id'=>1, 'permission_id'=>34],
            ['role_id'=>1, 'permission_id'=>35],
            ['role_id'=>1, 'permission_id'=>36],
            ['role_id'=>1, 'permission_id'=>37],
            ['role_id'=>1, 'permission_id'=>38],
            ['role_id'=>1, 'permission_id'=>39],

            ['role_id'=>1, 'permission_id'=>40],
            ['role_id'=>1, 'permission_id'=>41],
            ['role_id'=>1, 'permission_id'=>42],
            ['role_id'=>1, 'permission_id'=>43],

            ['role_id'=>1, 'permission_id'=>50],
            ['role_id'=>1, 'permission_id'=>51],
            ['role_id'=>1, 'permission_id'=>52],
            ['role_id'=>1, 'permission_id'=>53],
            ['role_id'=>1, 'permission_id'=>54],
            ['role_id'=>1, 'permission_id'=>55],

            ['role_id'=>1, 'permission_id'=>60],
            ['role_id'=>1, 'permission_id'=>61],
            ['role_id'=>1, 'permission_id'=>62],
            ['role_id'=>1, 'permission_id'=>63],
            ['role_id'=>1, 'permission_id'=>64],
            ['role_id'=>1, 'permission_id'=>65],


            ['role_id'=>1, 'permission_id'=>70],
            ['role_id'=>1, 'permission_id'=>71],
            ['role_id'=>1, 'permission_id'=>72],
            ['role_id'=>1, 'permission_id'=>73],
            ['role_id'=>1, 'permission_id'=>74],
            ['role_id'=>1, 'permission_id'=>75],

            ['role_id'=>1, 'permission_id'=>80],
            ['role_id'=>1, 'permission_id'=>81],
            ['role_id'=>1, 'permission_id'=>82],
            ['role_id'=>1, 'permission_id'=>83],
            ['role_id'=>1, 'permission_id'=>84],
            ['role_id'=>1, 'permission_id'=>85],

            ['role_id'=>1, 'permission_id'=>90],
            ['role_id'=>1, 'permission_id'=>91],
            ['role_id'=>1, 'permission_id'=>92],
            ['role_id'=>1, 'permission_id'=>93],
            ['role_id'=>1, 'permission_id'=>94],
            ['role_id'=>1, 'permission_id'=>95],

            ['role_id'=>1, 'permission_id'=>100],
            ['role_id'=>1, 'permission_id'=>101],
            ['role_id'=>1, 'permission_id'=>102],
            ['role_id'=>1, 'permission_id'=>103],
            ['role_id'=>1, 'permission_id'=>104],
            ['role_id'=>1, 'permission_id'=>105],

            ['role_id'=>1, 'permission_id'=>110],
            ['role_id'=>1, 'permission_id'=>111],
            ['role_id'=>1, 'permission_id'=>112],
            ['role_id'=>1, 'permission_id'=>113],
            ['role_id'=>1, 'permission_id'=>114],
            ['role_id'=>1, 'permission_id'=>115],
            ['role_id'=>1, 'permission_id'=>116],
            ['role_id'=>1, 'permission_id'=>117],
            ['role_id'=>1, 'permission_id'=>118],

            ['role_id'=>1, 'permission_id'=>120],
            ['role_id'=>1, 'permission_id'=>121],
            ['role_id'=>1, 'permission_id'=>122],
            ['role_id'=>1, 'permission_id'=>123],
            ['role_id'=>1, 'permission_id'=>124],
            ['role_id'=>1, 'permission_id'=>125],

            ['role_id'=>1, 'permission_id'=>130],
            ['role_id'=>1, 'permission_id'=>131],
            ['role_id'=>1, 'permission_id'=>132],
            ['role_id'=>1, 'permission_id'=>133],
            ['role_id'=>1, 'permission_id'=>134],
            ['role_id'=>1, 'permission_id'=>135],

            ['role_id'=>1, 'permission_id'=>140],
            ['role_id'=>1, 'permission_id'=>141],
            ['role_id'=>1, 'permission_id'=>142],
            ['role_id'=>1, 'permission_id'=>143],
            ['role_id'=>1, 'permission_id'=>144],
            ['role_id'=>1, 'permission_id'=>145],

            ['role_id'=>1, 'permission_id'=>150],
            ['role_id'=>1, 'permission_id'=>151],
            ['role_id'=>1, 'permission_id'=>152],
            ['role_id'=>1, 'permission_id'=>153],
            ['role_id'=>1, 'permission_id'=>154],
            ['role_id'=>1, 'permission_id'=>155],

//            ['role_id'=>1, 'permission_id'=>160],

//            ['role_id'=>1, 'permission_id'=>165],

            ['role_id'=>1, 'permission_id'=>170],
            ['role_id'=>1, 'permission_id'=>171],
            ['role_id'=>1, 'permission_id'=>172],
            ['role_id'=>1, 'permission_id'=>173],
            ['role_id'=>1, 'permission_id'=>174],
            ['role_id'=>1, 'permission_id'=>175],

            //email formats
            ['role_id'=>1, 'permission_id'=>180],
            ['role_id'=>1, 'permission_id'=>181],
            ['role_id'=>1, 'permission_id'=>182],
            ['role_id'=>1, 'permission_id'=>183],
            ['role_id'=>1, 'permission_id'=>184],
            ['role_id'=>1, 'permission_id'=>185],
            ['role_id'=>1, 'permission_id'=>186],
            ['role_id'=>1, 'permission_id'=>187],
            ['role_id'=>1, 'permission_id'=>188],
            ['role_id'=>1, 'permission_id'=>189],
            ['role_id'=>1, 'permission_id'=>190],
            ['role_id'=>1, 'permission_id'=>191],

            //registration categories
            ['role_id'=>1, 'permission_id'=>200],
            ['role_id'=>1, 'permission_id'=>201],
            ['role_id'=>1, 'permission_id'=>202],
            ['role_id'=>1, 'permission_id'=>203],
            ['role_id'=>1, 'permission_id'=>204],
            ['role_id'=>1, 'permission_id'=>205],

            ['role_id'=>1, 'permission_id'=>250],
//          end  role-permissions for super-administrator //developer account


//          start role-permissions for administrator //user account
            ['role_id'=>2, 'permission_id'=>1],
            ['role_id'=>2, 'permission_id'=>2],
            ['role_id'=>2, 'permission_id'=>3],
            ['role_id'=>2, 'permission_id'=>4],
            ['role_id'=>2, 'permission_id'=>5],
            ['role_id'=>2, 'permission_id'=>6],
            ['role_id'=>2, 'permission_id'=>7],
            ['role_id'=>2, 'permission_id'=>8],
            ['role_id'=>2, 'permission_id'=>9],
            ['role_id'=>2, 'permission_id'=>10],
            ['role_id'=>2, 'permission_id'=>11],
            ['role_id'=>2, 'permission_id'=>12],
            ['role_id'=>2, 'permission_id'=>13],
            ['role_id'=>2, 'permission_id'=>14],
            ['role_id'=>2, 'permission_id'=>15],
            ['role_id'=>2, 'permission_id'=>16],
            ['role_id'=>2, 'permission_id'=>17],
            ['role_id'=>2, 'permission_id'=>18],
            ['role_id'=>2, 'permission_id'=>19],
            ['role_id'=>2, 'permission_id'=>20],
            ['role_id'=>2, 'permission_id'=>21],
            ['role_id'=>2, 'permission_id'=>22],
            ['role_id'=>2, 'permission_id'=>23],

            ['role_id'=>2, 'permission_id'=>25],

            ['role_id'=>2, 'permission_id'=>30],
            ['role_id'=>2, 'permission_id'=>31],
            ['role_id'=>2, 'permission_id'=>32],
            ['role_id'=>2, 'permission_id'=>33],
            ['role_id'=>2, 'permission_id'=>34],
            ['role_id'=>2, 'permission_id'=>35],
            ['role_id'=>2, 'permission_id'=>36],
            ['role_id'=>2, 'permission_id'=>37],
            ['role_id'=>2, 'permission_id'=>38],
            ['role_id'=>2, 'permission_id'=>39],

            ['role_id'=>2, 'permission_id'=>40],
            ['role_id'=>2, 'permission_id'=>41],
            ['role_id'=>2, 'permission_id'=>42],
            ['role_id'=>2, 'permission_id'=>43],

            ['role_id'=>2, 'permission_id'=>50],
            ['role_id'=>2, 'permission_id'=>51],
            ['role_id'=>2, 'permission_id'=>52],
            ['role_id'=>2, 'permission_id'=>53],
            ['role_id'=>2, 'permission_id'=>54],
            ['role_id'=>2, 'permission_id'=>55],

            ['role_id'=>2, 'permission_id'=>60],
            ['role_id'=>2, 'permission_id'=>61],
            ['role_id'=>2, 'permission_id'=>62],
            ['role_id'=>2, 'permission_id'=>63],
            ['role_id'=>2, 'permission_id'=>64],
            ['role_id'=>2, 'permission_id'=>65],


            ['role_id'=>2, 'permission_id'=>70],
            ['role_id'=>2, 'permission_id'=>71],
            ['role_id'=>2, 'permission_id'=>72],
            ['role_id'=>2, 'permission_id'=>73],
            ['role_id'=>2, 'permission_id'=>74],
            ['role_id'=>2, 'permission_id'=>75],

            ['role_id'=>2, 'permission_id'=>80],
            ['role_id'=>2, 'permission_id'=>81],
            ['role_id'=>2, 'permission_id'=>82],
            ['role_id'=>2, 'permission_id'=>83],
            ['role_id'=>2, 'permission_id'=>84],
            ['role_id'=>2, 'permission_id'=>85],

            ['role_id'=>2, 'permission_id'=>90],
            ['role_id'=>2, 'permission_id'=>91],
            ['role_id'=>2, 'permission_id'=>92],
            ['role_id'=>2, 'permission_id'=>93],
            ['role_id'=>2, 'permission_id'=>94],
            ['role_id'=>2, 'permission_id'=>95],

            ['role_id'=>2, 'permission_id'=>100],
            ['role_id'=>2, 'permission_id'=>101],
            ['role_id'=>2, 'permission_id'=>102],
            ['role_id'=>2, 'permission_id'=>103],
            ['role_id'=>2, 'permission_id'=>104],
            ['role_id'=>2, 'permission_id'=>105],

            ['role_id'=>2, 'permission_id'=>110],
            ['role_id'=>2, 'permission_id'=>111],
            ['role_id'=>2, 'permission_id'=>112],
            ['role_id'=>2, 'permission_id'=>113],
            ['role_id'=>2, 'permission_id'=>114],
            ['role_id'=>2, 'permission_id'=>115],
            ['role_id'=>2, 'permission_id'=>116],
            ['role_id'=>2, 'permission_id'=>117],
            ['role_id'=>2, 'permission_id'=>118],

            ['role_id'=>2, 'permission_id'=>120],
            ['role_id'=>2, 'permission_id'=>121],
            ['role_id'=>2, 'permission_id'=>122],
            ['role_id'=>2, 'permission_id'=>123],
            ['role_id'=>2, 'permission_id'=>124],
            ['role_id'=>2, 'permission_id'=>125],

            ['role_id'=>2, 'permission_id'=>130],
            ['role_id'=>2, 'permission_id'=>131],
            ['role_id'=>2, 'permission_id'=>132],
            ['role_id'=>2, 'permission_id'=>133],
            ['role_id'=>2, 'permission_id'=>134],
            ['role_id'=>2, 'permission_id'=>135],

            ['role_id'=>2, 'permission_id'=>140],
            ['role_id'=>2, 'permission_id'=>141],
            ['role_id'=>2, 'permission_id'=>142],
            ['role_id'=>2, 'permission_id'=>143],
            ['role_id'=>2, 'permission_id'=>144],
            ['role_id'=>2, 'permission_id'=>145],

            ['role_id'=>2, 'permission_id'=>150],
            ['role_id'=>2, 'permission_id'=>151],
            ['role_id'=>2, 'permission_id'=>152],
            ['role_id'=>2, 'permission_id'=>153],
            ['role_id'=>2, 'permission_id'=>154],
            ['role_id'=>2, 'permission_id'=>155],

//            ['role_id'=>2, 'permission_id'=>160],

//            ['role_id'=>2, 'permission_id'=>165],

            ['role_id'=>2, 'permission_id'=>170],
            ['role_id'=>2, 'permission_id'=>171],
            ['role_id'=>2, 'permission_id'=>172],
            ['role_id'=>2, 'permission_id'=>173],
            ['role_id'=>2, 'permission_id'=>174],
            ['role_id'=>2, 'permission_id'=>175],

            //email formats
            ['role_id'=>2, 'permission_id'=>180],
            ['role_id'=>2, 'permission_id'=>181],
            ['role_id'=>2, 'permission_id'=>182],
            ['role_id'=>2, 'permission_id'=>183],
            ['role_id'=>2, 'permission_id'=>184],
            ['role_id'=>2, 'permission_id'=>185],
            ['role_id'=>2, 'permission_id'=>186],
            ['role_id'=>2, 'permission_id'=>187],
            ['role_id'=>2, 'permission_id'=>188],
            ['role_id'=>2, 'permission_id'=>189],
            ['role_id'=>2, 'permission_id'=>190],
            ['role_id'=>2, 'permission_id'=>191],

            //registration categories
            ['role_id'=>2, 'permission_id'=>200],
            ['role_id'=>2, 'permission_id'=>201],
            ['role_id'=>2, 'permission_id'=>202],
            ['role_id'=>2, 'permission_id'=>203],
            ['role_id'=>2, 'permission_id'=>204],
            ['role_id'=>2, 'permission_id'=>205],
//           end role-permissions for administrator //user account

            //start registration admin permissions
            //for dashboard after login //userAuth permission
            ['role_id'=>3, 'permission_id'=>15],
            ['role_id'=>3, 'permission_id'=>16],

            //user update permission for edit profile
            ['role_id'=>3, 'permission_id'=>13],

            //for profile update
            ['role_id'=>3, 'permission_id'=>25],

            //for registration CRUD
            ['role_id'=>3, 'permission_id'=>120],
            ['role_id'=>3, 'permission_id'=>121],
            ['role_id'=>3, 'permission_id'=>122],
            ['role_id'=>3, 'permission_id'=>123],
            ['role_id'=>3, 'permission_id'=>124],
            ['role_id'=>3, 'permission_id'=>125],

            //registration email templates
            ['role_id'=>3, 'permission_id'=>180],
            ['role_id'=>3, 'permission_id'=>181],
            ['role_id'=>3, 'permission_id'=>182],
            ['role_id'=>3, 'permission_id'=>183],

            //end registration admin permissions

            //start abstract admin permissions
            //for dashboard after login //userAuth permission
            ['role_id'=>4, 'permission_id'=>15],
            ['role_id'=>4, 'permission_id'=>16],

            //user update permission for edit profile
            ['role_id'=>4, 'permission_id'=>13],

            //for profile update
            ['role_id'=>4, 'permission_id'=>25],

            //for abstract CRUD
            ['role_id'=>4, 'permission_id'=>130],
            ['role_id'=>4, 'permission_id'=>131],
            ['role_id'=>4, 'permission_id'=>132],
            ['role_id'=>4, 'permission_id'=>133],
            ['role_id'=>4, 'permission_id'=>134],
            ['role_id'=>4, 'permission_id'=>135],

            //abstract email templates
            ['role_id'=>4, 'permission_id'=>184],
            ['role_id'=>4, 'permission_id'=>185],
            ['role_id'=>4, 'permission_id'=>186],
            ['role_id'=>4, 'permission_id'=>187],
            ['role_id'=>4, 'permission_id'=>188],
            ['role_id'=>4, 'permission_id'=>189],
            ['role_id'=>4, 'permission_id'=>190],
            ['role_id'=>4, 'permission_id'=>191],

            //end abstract admin permissions

        );

        DB::table('core_permission_role')->insert($roles);
    }
}
