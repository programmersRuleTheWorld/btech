<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_item_id')->foreign('item_id')->references('item_id')->on('breakdown_items')->onDelete('cascade');
            $table->unsignedBigInteger('parent_list_id')->foreign('list_id')->references('list_id')->on('breakdown_lists')->onDelete('cascade');
            $table->string('parent_ref_id')->foreign('parent_ref_id')->references('parent_ref_id')->on('client_applications')->onDelete('cascade');
            $table->string('transaction_description');
            $table->string('transaction_type');
            $table->string('transaction_status');
            $table->decimal('transaction_amount', 8, 2);
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
        Schema::dropIfExists('transactions');
    }
}
