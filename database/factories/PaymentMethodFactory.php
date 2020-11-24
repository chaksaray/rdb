<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'icon' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
