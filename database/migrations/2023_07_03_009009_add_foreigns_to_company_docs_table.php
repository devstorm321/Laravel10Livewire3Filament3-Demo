<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCompanyDocsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('company_docs', function (Blueprint $table) {
            $table
                ->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_docs', function (Blueprint $table) {
            $table->dropForeign(['entity_id']);
        });
    }
}