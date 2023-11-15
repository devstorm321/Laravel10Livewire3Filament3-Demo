<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCareerSitesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('career_sites', function (Blueprint $table) {
            $table
                ->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('career_sites', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
            $table->dropForeign(['unit_id']);
        });
    }
}
