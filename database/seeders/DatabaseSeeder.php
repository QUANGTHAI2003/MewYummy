<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call([
            RolesAndPermissionsSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ProductAttributeSeeder::class,
            CommentSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
