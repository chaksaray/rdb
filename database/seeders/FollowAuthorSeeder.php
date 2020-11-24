<?php

namespace Database\Seeders;

use App\Models\FollowAuthor;
use Illuminate\Database\Seeder;

class FollowAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FollowAuthor::factory()
            ->count(5)
            ->create();
    }
}
