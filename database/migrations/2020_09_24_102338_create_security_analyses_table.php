<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_analyses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operation_id')->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('severity')->nullable();
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
        Schema::dropIfExists('security_analyses');
    }
}
