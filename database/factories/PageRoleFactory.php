<?php

namespace Database\Factories;

use App\Models\PageRole;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PageRole::class;

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
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
