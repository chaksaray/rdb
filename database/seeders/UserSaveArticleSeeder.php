<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSaveArticle;

class UserSaveArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSaveArticle::factory()
            ->count(5)
            ->create();
    }
}
