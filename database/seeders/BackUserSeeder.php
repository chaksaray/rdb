<?php

namespace Database\Seeders;

use App\Models\BackUser;
use Illuminate\Database\Seeder;

class BackUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackUser::factory()
            ->count(5)
            ->create();
    }
}
