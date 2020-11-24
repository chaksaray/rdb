<?php

namespace Database\Factories;

use App\Models\AccountType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountType::class;

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
