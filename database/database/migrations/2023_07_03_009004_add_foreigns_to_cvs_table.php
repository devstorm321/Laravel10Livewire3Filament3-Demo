<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCvsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table
                ->foreign('applicant_id')
                ->references('id')
                ->on('applicants')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->dropForeign(['applicant_id']);
        });
    }
}
