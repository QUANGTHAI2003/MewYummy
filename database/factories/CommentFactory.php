<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id"    => User::all('id')->random()->id,
            "product_id" => Product::get('id')->random()->id,
            "content"    => $this->faker->paragraph(2),
        ];
    }
}
