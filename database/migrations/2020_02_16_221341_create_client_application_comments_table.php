<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientApplicationCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_application_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->string('parent_ref_id')->foreign('parent_ref_id')->references('ref_id')->on('client_applications')->onDelete('cascade');
            $table->string('comment_title')->nullable();
            $table->mediumText('comment_body');
            $table->string('comment_status');
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
        Schema::dropIfExists('client_application_comments');
    }
}
