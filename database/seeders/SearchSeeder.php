<?php

namespace Database\Seeders;

use App\Models\Search;
use Illuminate\Database\Seeder;

class SearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Search::factory()
            ->count(5)
            ->create();
    }
}
