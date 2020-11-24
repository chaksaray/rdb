<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleStatus::class;

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
