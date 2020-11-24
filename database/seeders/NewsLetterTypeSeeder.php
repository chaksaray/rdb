<?php

namespace Database\Seeders;

use App\Models\NewsLetterType;
use Illuminate\Database\Seeder;

class NewsLetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsLetterType::factory()
            ->count(5)
            ->create();
    }
}
