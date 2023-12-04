<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToRhUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rh_users', function (Blueprint $table) {
            $table
                ->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('brand_id')
                ->references('id')
                ->on('brands')
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
        Schema::table('rh_users', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['unit_id']);
        });
    }
}
