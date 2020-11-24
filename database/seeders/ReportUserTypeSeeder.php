<?php

namespace Database\Seeders;

use App\Models\ReportUserType;
use Illuminate\Database\Seeder;

class ReportUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportUserType::factory()
            ->count(5)
            ->create();
    }
}
