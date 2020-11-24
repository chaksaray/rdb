<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\NewsLetterType;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsLetterTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsLetterType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];
    }
}
