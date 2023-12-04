<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToIntroductionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('introductions', function (Blueprint $table) {
            $table
                ->foreign('applicant_id')
                ->references('id')
                ->on('applicants')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('introductions', function (Blueprint $table) {
            $table->dropForeign(['applicant_id']);
            $table->dropForeign(['campaign_id']);
        });
    }
}
