<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerSitesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('career_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_active');
            $table->string('name');
            $table->string('url');
            $table->string('background_color')->nullable();
            $table->string('buttons_color')->nullable();
            $table->string('submit_button_label')->nullable();
            $table->string('redirect_url');
            $table->string('company_video_presentation_url')->nullable();
            $table->string('cover_pic_path')->nullable();
            $table->text('post_apply_text');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('unit_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_sites');
    }
}
