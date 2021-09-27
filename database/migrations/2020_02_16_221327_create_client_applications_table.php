<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_applications', function (Blueprint $table) {
            $table->string('ref_id');
            $table->string('project_name');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('cascade');
            $table->string('auth_code');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->mediumText('project_type');
            $table->string('existing_site')->nullable();
            $table->string('site_type')->nullable();
            $table->string('gov_contract');
            $table->string('domain_name')->nullable();
            $table->string('where_hosted')->nullable();
            $table->string('site_url')->nullable();
            $table->string('backend_type')->nullable();
            $table->string('backend_framework')->nullable();
            $table->string('frontend_framework')->nullable();
            $table->string('backend_framework_type')->nullable();
            $table->string('frontend_framework_type')->nullable();
            $table->string('is_platform')->nullable();
            $table->string('platform_type')->nullable();
            $table->string('db_type')->nullable();
            $table->string('test_scope')->nullable();
            $table->string('security_incidents')->nullable();
            $table->string('legacy_backend_type')->nullable();
            $table->string('new_or_existing_app')->nullable();
            $table->string('app_store')->nullable();
            $table->mediumText('project_description')->nullable();
            $table->string('project_status');
            $table->boolean('support');
            $table->boolean('vulnerability');
            $table->boolean('bug');
            $table->string('payment_status');
            $table->decimal('project_balance', 8, 2);
            $table->decimal('project_deposit', 8, 2);
            $table->decimal('project_deposit_rate', 8, 2);
            $table->date('due_date');
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
        Schema::dropIfExists('client_applications');
    }
}
