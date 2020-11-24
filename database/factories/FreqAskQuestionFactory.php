<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FreqAskQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreqAskQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreqAskQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->text(255),
            'answer' => $this->faker->text,
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
