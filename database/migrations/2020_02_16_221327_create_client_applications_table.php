<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_applications', function (Blueprint $table) {
            $table->string('ref_id');
            $table->string('auth_code');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('company');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->mediumText('project_type');
            $table->string('project_status');
            $table->mediumText('project_description');
            $table->decimal('project_balance', 8, 2);
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('client_applications');
    }
}
