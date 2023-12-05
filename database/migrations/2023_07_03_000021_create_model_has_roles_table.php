<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasRolesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('roleable_id');
            $table->string('roleable_type');
            $table->unsignedBigInteger('model_has_role_id');
            $table->string('model_has_role_type');

            $table->index('roleable_id');
            $table->index('roleable_type');
            $table->index('model_has_role_id');
            $table->index('model_has_role_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
    }
}
