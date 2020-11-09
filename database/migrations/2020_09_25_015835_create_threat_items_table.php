<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreatItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threat_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('security_analysis_id')->foreign('security_analysis_id')->references('id')->on('security_analyses')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('severity')->nullable();
            $table->string('attack_surface')->nullable();
            $table->string('attack_type')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('threat_items');
    }
}
