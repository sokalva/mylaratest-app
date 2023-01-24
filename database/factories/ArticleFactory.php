<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence(6, true);
//        $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -2);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'body' => $this->faker->paragraph(5, true),
            'img' => 'https://via.placeholder.com/600/5F113B/FFFFFF/?text=LARAVEL:9.*',
            'slug' => $slug,
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
            'published_at' => Carbon::now(),

        ];
    }
}
