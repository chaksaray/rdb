<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToPageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_users', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('page_id')
                ->references('id')
                ->on('pages');
            $table
                ->foreign('page_role_id')
                ->references('id')
                ->on('page_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_users', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['page_id']);
            $table->dropForeign(['page_role_id']);
        });
    }
}
