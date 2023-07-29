<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Ớt ngọt Đà Lạt', 3, 35000, 0],
            ['Hành tây củ', 1, 25000, 15000],
            ['Snack lá ngắn', 1, 75000, 60000],
            ['Cam canh Hà Giang', 2, 65000, 55000],
            ['Nho không hạt', 2, 300000, 250000],
            ['Thăn Lưng Bò Mỹ Black Angus, Rib Eye (500gr)', 4, 900000, 0],
            ['BẸ VAI BÒ MỸ, CHUCK FLAP (500GR)', 4, 300000, 260000],
            ['Đầu Thăn Bò Mỹ (500gr)', 4, 250000, 200000],
            ['Cherry Đà Lạt', 2, 600000, 405000],
            ['Dẻ Sườn Bò Mỹ , Rib Finger (500gr)', 4, 205000, 0],
            ['Sườn Non Bò Mỹ , Short Ribs (500gr)', 4, 259000, 0],
            ['Ba Chỉ Bò Mỹ , Short Plate (500gr)', 4, 180000, 0],
            ['Lõi Nạc Vai Bò Mỹ , Top Blade (500gr)', 4, 250000, 194000],
            ['Thăn Ngoại Bò Mỹ , Striploin (500gr)', 4, 350000, 325000],
            ['Ghẹ Xanh Sống', 3, 325000, 0],
            ['Tôm Càng Xanh Sống', 3, 440000, 340000],
            ['Cá Tầm Sống', 3, 445000, 0],
            ['Ngao Hai Cồi Sống', 3, 130000, 0],
            ['Bào Ngư Hàn Quốc Sống Lớn', 3, 750000, 0],
            ['Chanh vàng không hạt', 3, 55000, 35000],
            ['Cồi Sò Điệp Size S', 3, 170000, 0],
            ['Ốc Hương Sống (70-80con)', 3, 295000, 125000],
            ['Tôm Hùm Alaska Sống Lớn', 3, 1350000, 1290000]
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

        $chunks = array_chunk($insertData, 10);

        foreach ($chunks as $chunk) {
            DB::table('products')->insert($chunk);
        }
    }
}
