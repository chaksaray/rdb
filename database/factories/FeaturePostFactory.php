<?php

namespace Database\Factories;

use App\Models\FeaturePost;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeaturePostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeaturePost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artilce_id' => $this->faker->randomNumber(0),
        ];
    }
}
