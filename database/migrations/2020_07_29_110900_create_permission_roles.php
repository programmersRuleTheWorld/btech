<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id')->foreign('permission_id')->references('id')->on('permissions');
            $table->unsignedBigInteger('role_id')->foreign('role_id')->references('id')->on('roles');
            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_roles');
    }
}
