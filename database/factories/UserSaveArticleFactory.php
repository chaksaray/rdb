<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\UserSaveArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSaveArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSaveArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'article_id' => \App\Models\Article::factory(),
        ];
    }
}
