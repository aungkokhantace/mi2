<?php
/**
 * Created by PhpStorm.
 * Author: Soe Thandar Aung
 * Date: 11/2/2016
 * Time: 2:17 PM
 */
use Illuminate\Database\Seeder;
class Default_TemplateSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_slider_detail')->delete();
        DB::table('template_slider')->delete();

        $sliders = array(
            ['id'=>1, 'name'=>'Slider1', 'description'=>'Slider1', 'template_id'=>1, 'active'=>1, 'created_by' =>'1', 'updated_by' =>'1', 'created_at' =>'2017-01-30 09:19:53', 'updated_at' =>'2017-01-30 09:19:53' ],
        );

        $sliderdetails = array(
            ['id'=>1, 'image_name'=>'Slider 1', 'image_url'=>'images/slider_images/Slider1.jpg', 'description'=>'Slider 1', 'template_slider_id'=>1],
            ['id'=>2, 'image_name'=>'Slider 2', 'image_url'=>'images/slider_images/Slider2.jpg', 'description'=>'Slider 2', 'template_slider_id'=>1],
            ['id'=>3, 'image_name'=>'Slider 3', 'image_url'=>'images/slider_images/Slider3.jpg', 'description'=>'Slider 3', 'template_slider_id'=>1],
            ['id'=>4, 'image_name'=>'Slider 4', 'image_url'=>'images/slider_images/Slider4.jpg', 'description'=>'Slider 4', 'template_slider_id'=>1],
            ['id'=>5, 'image_name'=>'Slider 5', 'image_url'=>'images/slider_images/Slider5.jpg', 'description'=>'Slider 5', 'template_slider_id'=>1],
        );

        DB::table('template_slider')->insert($sliders);
        DB::table('template_slider_detail')->insert($sliderdetails);
    }
}