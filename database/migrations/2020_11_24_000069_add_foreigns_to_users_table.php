<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->foreign('account_type_id')
                ->references('id')
                ->on('account_types');
            $table
                ->foreign('gender_id')
                ->references('id')
                ->on('genders');
            $table
                ->foreign('report_user_type_id')
                ->references('id')
                ->on('report_user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['account_type_id']);
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['report_user_type_id']);
        });
    }
}
