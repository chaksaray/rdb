<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TrendingPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrendingPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrendingPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => $this->faker->randomNumber(0),
        ];
    }
}
