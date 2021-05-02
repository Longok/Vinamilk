<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [   
                    'category_id' => '1',
                    'name' => 'Sữa bột Organic Gold',
                    'desc' => 'Bổ sung 100% DHA từ tảo tinh khiết từ biển, là nguồn DHA tự nhiên & cao cấp, giúp hỗ trợ phát triển não bộ',   
                    'image'=> 'product-hop-sua-gold.png',
                    'price'=> '320000',
                    'discount'=> '0',
                    'quantity'=> '48',
                    'sale'=> '0'
                ],
                [
                    'category_id' => '2',
                    'name' => 'Sữa bột pha sẵn Grow Plus',
                    'desc' => 'Bổ sung 100% DHA từ tảo tinh khiết từ biển, là nguồn DHA tự nhiên & cao cấp, giúp hỗ trợ phát triển não bộ',   
                    'image'=> 'growplus.png',
                    'price'=> '35000',
                    'discount'=> '0',
                    'quantity'=> '48',
                    'sale'=> '0'
                ],
                [
                    'category_id' => '3',
                    'name' => 'Sữa tươi Green Farm',
                    'desc' => 'Không sử dụng thuốc trừ sâu hóa học & phân nón hóa học',   
                    'image'=> 'sugar-180ml.png',
                    'price'=> '25000',
                    'discount'=> '0',
                    'quantity'=> '48',
                    'sale'=> '0'
                ],
                [
                    'category_id' => '4',
                    'name' => 'Sữa chua ít đường',
                    'desc' => 'Sử dụng công nghệ lên men tự nhiên với chủng men thuần khiết Bulgaricus, sữa chua ăn trắng Vinamilk mang hương vị tươi ngon, thanh khiết đặc trưng và có bổ sung Canxi và Vitamin D3, giúp cơ thể hấp thu dưỡng chất tốt hơn, mang lại hệ xương chắc khoẻ và giúp cho gia đình bạn luôn năng động, vui khoẻ mỗi ngày.',   
                    'image'=> 'it-duong-498-451.png',
                    'price'=> '22000',
                    'discount'=> '0',
                    'quantity'=> '48',
                    'sale'=> '0'
                ],
                [
                    'category_id' => '5',
                    'name' => 'Kem dừa Socola',
                    'desc' => 'Sự kết hợp độc đáo giữa vị béo của kem sữa với Sô-cô-la ngọt ngào, Cà Phê thơm dịu nhẹ hay Matcha thanh mát',   
                    'image'=> 'duasocola.jpg',
                    'price'=> '8500',
                    'discount'=> '0',
                    'quantity'=> '48',
                    'sale'=> '0'
                ]
            ]
        );
    }
}
