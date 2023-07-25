<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            ['Ớt ngọt Đà Lạt', 3, 35000, 0],
            ['Hành tây', 3, 25000, 15000],
            ['Snack lá ngắn', 3, 75000, 60000],
            ['Cam canh Hà Giang', 3, 65000, 55000],
            ['Nho không hạt', 4, 300000, 250000],
            ['Thăn Lưng Bò Mỹ Black Angus, Rib Eye (500gr)', 1, 900000, 0],
            ['BẸ VAI BÒ MỸ, CHUCK FLAP (500GR)', 1, 300000, 260000],
            ['Đầu Than Bò Mỹ (500gr)', 1, 250000, 200000],
            ['Bánh Tráng Cuốn Thịt Heo', 2, 25000, 20000],
            ['Gà Sốt Nước Tương', 2, 150000, 120000]
        ];

        $insertData = [];

        foreach ($data as $product) {
            $insertData[] = [
                'name'          => $product[0],
                'slug'          => Str::slug($product[0]),
                'category_id'   => $product[1],
                'regular_price' => $product[2],
                'sale_price'    => $product[3],
                'stock_qty'     => 100,
                'description'   => 'Đang cập nhật...',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }

        $chunks = array_chunk($insertData, 5);

        foreach ($chunks as $chunk) {
            DB::table('products')->insert($chunk);
        }
    }
}
