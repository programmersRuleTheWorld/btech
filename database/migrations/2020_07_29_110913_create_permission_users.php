<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_users', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id')->foreign('permission_id')->references('id')->on('permissions');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->primary(['permission_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_users');
    }
}
