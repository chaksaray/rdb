<?php

namespace Database\Factories;

use App\Models\Toptic;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Toptic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'icon' => $this->faker->text(255),
            'category_id' => \App\Models\Category::factory(),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
