<?php

namespace Database\Seeders;

use App\Models\LogoutHistory;
use Illuminate\Database\Seeder;

class LogoutHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogoutHistory::factory()
            ->count(5)
            ->create();
    }
}
