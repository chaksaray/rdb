<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

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
            'website' => $this->faker->text(255),
            'profile' => $this->faker->text(255),
            'cover' => $this->faker->text(255),
            'user_name' => $this->faker->text(255),
            'created_by' => $this->faker->randomNumber(0),
            'custom_url' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'category_id' => \App\Models\Category::factory(),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
