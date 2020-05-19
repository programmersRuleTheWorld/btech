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
            $table->string('affiliate_id')->foreign('affiliate_id')->references('referred_by')->on('users');
            $table->string('referred_user_id')->foreign('referred_user_id')->references('id')->on('users')->unique();
            $table->decimal('commission_rate', 2, 2);
            $table->decimal('campaign_balance', 5, 2);
            $table->primary(['affiliate_id', 'referred_user_id']);
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
