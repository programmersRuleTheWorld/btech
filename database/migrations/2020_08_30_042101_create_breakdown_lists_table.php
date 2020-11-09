<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakdownListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakdown_lists', function (Blueprint $table) {
            $table->bigIncrements('list_id');
            $table->string('parent_ref_id')->foreign('parent_ref_id')->references('ref_id')->on('client_applications')->onDelete('cascade');
            $table->date('due_date');
            $table->boolean('list_status');
            $table->string('list_title');
            $table->string('list_description');
            $table->decimal('list_balance', 8, 2);
            $table->decimal('list_deposit', 8, 2);
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
        Schema::dropIfExists('breakdown_lists');
    }
}
