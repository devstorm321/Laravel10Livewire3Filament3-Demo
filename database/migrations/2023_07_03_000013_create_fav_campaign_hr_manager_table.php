<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavCampaignHrManagerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fav_campaign_hr_manager', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('hr_manager_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fav_campaign_hr_manager');
    }
}
