<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperClientapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_client_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('dev_id')->foreign('dev_id')->references('id')->on('users');
            $table->unsignedBigInteger('ref_id')->foreign('ref_id')->references('ref_id')->on('client_applications');
            $table->primary(['dev_id', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_client_applications');
    }
}
