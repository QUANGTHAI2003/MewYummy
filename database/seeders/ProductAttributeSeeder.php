<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Sizes',
            ],
            [
                'name' => 'Weight',
            ],
            [
                'name' => 'Color',
            ],
        ];

        DB::table('product_attributes')->insert($data);
    }
}
