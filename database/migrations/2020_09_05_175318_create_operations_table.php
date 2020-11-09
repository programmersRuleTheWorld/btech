<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_ref_id')->foreign('parent_ref_id')->references('ref_id')->on('client_applications')->onDelete('cascade');
            $table->string('user_id')->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('cascade');
            $table->string('domain_host')->nullable();
            $table->string('server_host')->nullable();
            $table->string('public_ip')->nullable();
            $table->string('operation_type')->nullable();
            $table->string('server_type')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('uptime_status')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('operations');
    }
}
