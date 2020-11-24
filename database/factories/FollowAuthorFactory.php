<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FollowAuthor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowAuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FollowAuthor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'follower_id' => \App\Models\User::factory(),
            'author_id' => \App\Models\User::factory(),
        ];
    }
}
