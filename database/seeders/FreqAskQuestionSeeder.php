<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FreqAskQuestion;

class FreqAskQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreqAskQuestion::factory()
            ->count(5)
            ->create();
    }
}
