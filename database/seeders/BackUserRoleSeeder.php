<?php

namespace Database\Seeders;

use App\Models\BackUserRole;
use Illuminate\Database\Seeder;

class BackUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackUserRole::factory()
            ->count(5)
            ->create();
    }
}
