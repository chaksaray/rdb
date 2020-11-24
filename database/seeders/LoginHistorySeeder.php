<?php

namespace Database\Seeders;

use App\Models\LoginHistory;
use Illuminate\Database\Seeder;

class LoginHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginHistory::factory()
            ->count(5)
            ->create();
    }
}
