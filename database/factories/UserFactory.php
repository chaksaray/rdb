<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'bio' => $this->faker->sentence(15),
            'is_recieve_new_letter' => $this->faker->boolean,
            'is_social_notification' => $this->faker->boolean,
            'is_recieve_email_from_followed_author' => $this->faker->boolean,
            'is_metion_notification' => $this->faker->boolean,
            'is_promotion' => $this->faker->boolean,
            'account_type_id' => \App\Models\AccountType::factory(),
            'gender_id' => \App\Models\Gender::factory(),
            'report_user_type_id' => \App\Models\ReportUserType::factory(),
        ];
    }
}
