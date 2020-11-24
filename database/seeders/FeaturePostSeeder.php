<?php

namespace Database\Seeders;

use App\Models\FeaturePost;
use Illuminate\Database\Seeder;

class FeaturePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeaturePost::factory()
            ->count(5)
            ->create();
    }
}
