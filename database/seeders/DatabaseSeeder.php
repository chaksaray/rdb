<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(BackUserSeeder::class);
        $this->call(ArticleStatusSeeder::class);
        $this->call(BackUserRoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(TopticSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(ShareSeeder::class);
        $this->call(FollowAuthorSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(PageUserSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(LoginHistorySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SaveSeeder::class);
        $this->call(UserSaveArticleSeeder::class);
        $this->call(LogoutHistorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ViewSeeder::class);
        $this->call(FreqAskQuestionSeeder::class);
        $this->call(ReportArticleTypeSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ReportUserTypeSeeder::class);
        $this->call(NewsLetterTypeSeeder::class);
        $this->call(PageRoleSeeder::class);
        $this->call(FollowTopicSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SearchSeeder::class);
        $this->call(FeaturePostSeeder::class);
        $this->call(TrendingPostSeeder::class);
        $this->call(NotificationTypeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
