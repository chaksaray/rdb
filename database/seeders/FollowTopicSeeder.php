<?php

namespace Database\Seeders;

use App\Models\FollowTopic;
use Illuminate\Database\Seeder;

class FollowTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FollowTopic::factory()
            ->count(5)
            ->create();
    }
}
