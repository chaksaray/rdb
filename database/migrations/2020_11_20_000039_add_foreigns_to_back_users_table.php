<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToBackUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('back_users', function (Blueprint $table) {
            $table
                ->foreign('back_user_role_id')
                ->references('id')
                ->on('back_user_roles');
            $table
                ->foreign('status_id')
                ->references('id')
                ->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('back_users', function (Blueprint $table) {
            $table->dropForeign(['back_user_role_id']);
            $table->dropForeign(['status_id']);
        });
    }
}
