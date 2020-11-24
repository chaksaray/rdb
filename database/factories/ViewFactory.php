<?php

namespace Database\Factories;

use App\Models\View;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View::class;

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
