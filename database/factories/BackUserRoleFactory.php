<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BackUserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackUserRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BackUserRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
