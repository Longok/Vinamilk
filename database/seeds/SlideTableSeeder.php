<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slide')->insert(
            [
                [   
                    'name' => 'Slide Sữa chua',
                    'image' => 'Banner_nhan_hieu.jpg',   
                    'description'=> 'Sản phẩm mới',
                ],
                [
                    'name' => 'Slide Sữa bột',
                    'image' => 'Banner-Organic-Gold_PC.JPG.png',   
                    'description'=> 'Sản phẩm mới',
                ],
                [
                    'name' => 'Slide Happy Tea',
                    'image' => 'happy-mt-3.jpg',   
                    'description'=> 'Sản phẩm mới',
                ],
                [
                    'name' => 'Slide Sữa tươi',
                    'image' => 'VNM_Green-Farm_Banner_1920x914.jpg',   
                    'description'=> 'Sản phẩm mới',
                ],
            ]
        );
    }
}
