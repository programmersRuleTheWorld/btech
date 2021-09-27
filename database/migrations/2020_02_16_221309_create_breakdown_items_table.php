<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakdownItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakdown_items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('parent_list_id')->foreign('parent_list_id')->references('list_id')->on('breakdown_lists')->onDelete('cascade');
            $table->string('parent_item_id')->foreign('parent_item_id')->references('list_id')->on('breakdown_lists')->onDelete('cascade')->nullable();
            $table->string('parent_ref_id')->foreign('parent_ref_id')->references('item_id')->on('breakdown_items')->onDelete('cascade');
            $table->boolean('item_status');
            $table->string('payment_status');
            $table->boolean('frontend');
            $table->string('item_description');
            $table->decimal('item_deposit', 8, 2);
            $table->decimal('item_balance', 8, 2);
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
        Schema::dropIfExists('breakdown_items');
    }
}
