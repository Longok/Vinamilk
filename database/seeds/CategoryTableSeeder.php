<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Sữa bột'
                ],
                [
                    'name' => 'Sữa bột pha sẵn'
                ],
                [
                    'name' => 'Sữa tươi'
                ],
                [
                    'name' => 'Sữa chua'
                ],
                [
                    'name' => 'Kem'
                ]
            ]
        );
    }
}
