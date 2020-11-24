<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LogoutHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogoutHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogoutHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
