<?php

namespace Database\Seeders;

use App\Models\PageRole;
use Illuminate\Database\Seeder;

class PageRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageRole::factory()
            ->count(5)
            ->create();
    }
}
