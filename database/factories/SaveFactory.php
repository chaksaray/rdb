<?php

namespace Database\Factories;

use App\Models\Save;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Save::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => \App\Models\Article::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
