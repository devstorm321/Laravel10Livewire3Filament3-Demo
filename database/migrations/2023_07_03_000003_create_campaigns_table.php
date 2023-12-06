<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('video_interview_url')->nullable();
            $table->string('video_presentation_url')->nullable();
            $table->text('description');
            $table->string('mail_contact')->nullable();
            $table->json('requirement_list')->nullable();
            $table->json('linked_in_version')->nullable();
            $table->json('contracts_types')->nullable();
            $table->boolean('public_show_entity');
            $table->json('travel_scope')->nullable();
            $table->json('work_schedule')->nullable();
            $table->string('start_date_expected')->nullable();
            $table->boolean('show_salary_range');
            $table->string('salary_range')->nullable();
            $table->string('work_location_coordinates')->nullable();
            $table->boolean('show_on_linked_in');
            $table->boolean('show_on_indeed');
            $table->boolean('show_on_carreer_site');
            $table->json('private_tags')->nullable();
            $table->json('public_tags')->nullable();
            $table->boolean('manager_email_alerts');
            $table->json('managers');
            $table->json('survey')->nullable();
            $table->string('trimoji_test')->nullable();
            $table->string('illustration')->nullable();
            $table->json('contract_type');
            $table->json('employment_type');
            $table->json('progress');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('campaigns');
    }
}
