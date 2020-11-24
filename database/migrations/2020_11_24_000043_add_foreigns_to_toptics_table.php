<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTopticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toptics', function (Blueprint $table) {
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories');
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
        Schema::table('toptics', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['status_id']);
        });
    }
}
