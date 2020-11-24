<?php

namespace Database\Seeders;

use App\Models\TrendingPost;
use Illuminate\Database\Seeder;

class TrendingPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrendingPost::factory()
            ->count(5)
            ->create();
    }
}
