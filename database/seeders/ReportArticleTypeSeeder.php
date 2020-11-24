<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportArticleType;

class ReportArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportArticleType::factory()
            ->count(5)
            ->create();
    }
}
