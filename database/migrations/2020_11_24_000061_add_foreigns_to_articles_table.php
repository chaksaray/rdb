<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table
                ->foreign('article_status_id')
                ->references('id')
                ->on('article_statuses');
            $table
                ->foreign('report_article_type_id')
                ->references('id')
                ->on('report_article_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['article_status_id']);
            $table->dropForeign(['report_article_type_id']);
        });
    }
}
