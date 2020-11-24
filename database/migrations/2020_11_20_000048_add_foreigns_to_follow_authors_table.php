<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToFollowAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follow_authors', function (Blueprint $table) {
            $table
                ->foreign('follower_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('author_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follow_authors', function (Blueprint $table) {
            $table->dropForeign(['follower_id']);
            $table->dropForeign(['author_id']);
        });
    }
}
