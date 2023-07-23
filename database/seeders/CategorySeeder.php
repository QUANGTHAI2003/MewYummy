<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Rau củ',
                'slug' => 'rau-cu',
                'is_active' => true,
            ],
            [
                'name' => 'Trái cây',
                'slug' => 'trai-cay',
                'is_active' => true,
            ],
            [
                'name' => 'Đồ khô',
                'slug' => 'do-kho',
                'is_active' => true,
            ],
            [
                'name' => 'Đồ tươi',
                'slug' => 'do-tuoi',
                'is_active' => true,
            ],
        ]);
    }
}
