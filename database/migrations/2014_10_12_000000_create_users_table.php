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
            $table->increments('id');
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->string('password', 191);
            $table->text('address')->nullable();
            $table->string('job_title', 191)->nullable();
            $table->string('phone_country_code', 191)->nullable();
            $table->string('phone_number', 191)->nullable();
            $table->text('two_factor_options')->nullable();
            $table->string('integration_id', 191)->nullable();
            $table->string('gateway', 191)->nullable();
            $table->string('card_brand', 191)->nullable();
            $table->string('card_last_four', 191)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->string('payment_method_token', 191)->nullable();
            $table->rememberToken();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->text('notification_preferences')->nullable();
            $table->integer('reward_points')->unsigned()->nullable();
            
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
