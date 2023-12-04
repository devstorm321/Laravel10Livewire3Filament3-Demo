<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTestResponsesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('test_responses', function (Blueprint $table) {
            $table
                ->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_responses', function (Blueprint $table) {
            $table->dropForeign(['application_id']);
        });
    }
}
