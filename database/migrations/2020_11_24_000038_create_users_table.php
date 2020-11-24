<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->unsignedBigInteger('account_type_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('report_user_type_id');
            $table->string('avatar')->nullable();
            $table->text('bio');
            $table->boolean('is_recieve_new_letter');
            $table->boolean('is_social_notification');
            $table->boolean('is_recieve_email_from_followed_author');
            $table->boolean('is_metion_notification');
            $table->boolean('is_promotion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
