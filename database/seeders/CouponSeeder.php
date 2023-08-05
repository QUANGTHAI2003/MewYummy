<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'code' => 'ABC123',
                'type' => 'fixed',
                'value' => 10,
                'cart_value' => 500000,
            ],
            [
                'code' => 'DEF456',
                'type' => 'percent',
                'value' => 30,
                'cart_value' => 100000,
            ],
            [
                'code' => 'GHI789',
                'type' => 'fixed',
                'value' => 100000,
                'cart_value' => 3000000,
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
