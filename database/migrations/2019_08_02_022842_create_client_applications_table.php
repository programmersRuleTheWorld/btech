<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('ref_id')->unique();
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('number')->nullable();
            $table->string('selection');
            $table->string('status')->nullable();
            $table->integer('user_id')->nullable()->foreign('user_id')->references('id')->on('users');
            $table->integer('dev_id')->nullable()->foreign('dev_id')->references('id')->on('users');
            $table->mediumText('project');
            $table->string('auth_code');
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
