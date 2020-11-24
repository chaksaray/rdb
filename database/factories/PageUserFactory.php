<?php

namespace Database\Factories;

use App\Models\PageUser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PageUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'page_id' => \App\Models\Page::factory(),
            'page_role_id' => \App\Models\PageRole::factory(),
        ];
    }
}
