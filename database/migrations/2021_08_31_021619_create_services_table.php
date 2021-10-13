<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_operation_id')->foreign('parent_operation_id')->references('id')->on('operations');
            $table->unsignedBigInteger('parent_user_id')->foreign('parent_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('parent_ref_id')->foreign('parent_ref_id')->references('ref_id')->on('client_applications');
            $table->string('name');
            $table->string('duration');
            $table->unsignedBigInteger('cost');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('services');
    }
}
