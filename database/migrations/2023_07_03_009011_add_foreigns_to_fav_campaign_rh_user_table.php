<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToFavCampaignRhUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fav_campaign_rh_user', function (Blueprint $table) {
            $table
                ->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('rh_user_id')
                ->references('id')
                ->on('rh_users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fav_campaign_rh_user', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['rh_user_id']);
        });
    }
}
