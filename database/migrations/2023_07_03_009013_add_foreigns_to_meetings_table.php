<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table
                ->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('applicant_id')
                ->references('id')
                ->on('applicants')
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
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropForeign(['campaign_id']);
            $table->dropForeign(['applicant_id']);
            $table->dropForeign(['rh_user_id']);
        });
    }
}
