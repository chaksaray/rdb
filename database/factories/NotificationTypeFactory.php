<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\NotificationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NotificationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'follower_id' => $this->faker->randomNumber(0),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
