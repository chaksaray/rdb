<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'body' => $this->faker->text,
            'feature_image' => $this->faker->text(255),
            'page_id' => $this->faker->randomNumber(0),
            'tags' => $this->faker->text(255),
            'read_time' => $this->faker->randomNumber(0),
            'user_id' => \App\Models\User::factory(),
            'status_id' => \App\Models\Status::factory(),
            'category_id' => \App\Models\Category::factory(),
            'article_status_id' => \App\Models\ArticleStatus::factory(),
            'report_article_type_id' => \App\Models\ReportArticleType::factory(),
        ];
    }
}
