<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'=>fake()->numberBetween(1,4),
            'title' => fake()->text(20),
            'content' => fake()->text(1000),
            'image' => '/images/no-image.jpg',
            'updated_at'=>now(),
            'created_at'=>now(),
        ];
    }
}
