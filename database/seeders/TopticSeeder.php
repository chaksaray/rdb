<?php

namespace Database\Seeders;

use App\Models\Toptic;
use Illuminate\Database\Seeder;

class TopticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toptic::factory()
            ->count(5)
            ->create();
    }
}
