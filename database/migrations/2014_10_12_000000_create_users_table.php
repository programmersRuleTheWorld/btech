<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->decimal('user_balance', 8, 2);
            $table->string('email')->unique();
            $table->string('affiliate_id')->unique();
            $table->string('referred_by')->nullable();
            $table->string('two_factor_token')->nullable();
            $table->datetime('two_factor_expiry')->nullable();
            $table->decimal('user_spend', 8, 2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('user_earnings', 8, 2);
            $table->rememberToken();
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
