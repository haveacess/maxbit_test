<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notFoundMock = "Категории не было в списке";

        DB::table('products')->insert([
            [
                'id' => 1,
                'parent_id' => null,
                'title' => 'Земляные работы',
                'price' => 230.11
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'title' => "1.2. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'title' => 'Леска',
                'price' => 11.55
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'title' => 'Утилизация грунта',
                'price' => 102.36
            ],
            [
                'id' => 5,
                'parent_id' => 4,
                'title' => 'Грунт',
                'price' => 22.36
            ],
            [
                'id' => 6,
                'parent_id' => 1,
                'title' => "1.4. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 7,
                'parent_id' => 6,
                'title' => "1.4.6. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 8,
                'parent_id' => 7,
                'title' => "1.4.6.1. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 9,
                'parent_id' => 8,
                'title' => 'Цемент',
                'price' => 65.38
            ],            
            [
                'id' => 10,
                'parent_id' => null,
                'title' => "2. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 11,
                'parent_id' => 10,
                'title' => "2.1. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 12,
                'parent_id' => 6,
                'title' => "1.4.3. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 13,
                'parent_id' => 12,
                'title' => "1.4.3.1. {$notFoundMock}",
                'price' => 0
            ],
            [
                'id' => 14,
                'parent_id' => 13,
                'title' => 'Щебень',
                'price' => 63.37
            ]
        ]);
    }
}
