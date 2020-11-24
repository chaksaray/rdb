<?php

namespace Database\Factories;

use App\Models\BackUser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BackUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'back_user_role_id' => \App\Models\BackUserRole::factory(),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
