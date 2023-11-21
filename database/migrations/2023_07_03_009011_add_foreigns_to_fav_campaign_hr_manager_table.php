<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToFavCampaignHrManagerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fav_campaign_hr_manager', function (Blueprint $table) {
            $table
                ->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('hr_manager_id')
                ->references('id')
                ->on('hr_managers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fav_campaign_hr_manager', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['hr_manager_id']);
        });
    }
}
