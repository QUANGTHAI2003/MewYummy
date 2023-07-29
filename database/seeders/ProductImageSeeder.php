<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [];

        for ($i = 1; $i <= 23; $i++) {
            $data[] = [
                'image'      => 'pro' . $i . '.webp',
                'product_id' => $i,
                'created_at' => Carbon::now()->subDays(mt_rand(1, 30))->subHours(mt_rand(1, 24))->subMinutes(mt_rand(1, 60))->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }

        DB::table('product_images')->insert($data);
    }
}
