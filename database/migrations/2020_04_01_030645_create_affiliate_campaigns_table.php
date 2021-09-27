<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('affiliate_id')->foreign('affiliate_id')->references('referred_by')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('referred_user_id')->foreign('referred_user_id')->references('id')->on('users')->unique()->onDelete('cascade');
            $table->decimal('commission_rate', 3, 2);
            $table->decimal('campaign_balance', 9, 2);
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
        Schema::dropIfExists('affiliates');
    }
}
