<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('classrooms', function ($table) {
            $table->softDeletes()->after('status');
        });

        DB::statement('ALTER TABLE classrooms MODIFY status ENUM("active", "archived", "deleted") DEFAULT "active"');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classrooms', function ($table) {
            $table->dropSoftDeletes();
        });

        DB::statement('ALTER TABLE classrooms MODIFY status ENUM("active", "archived") DEFAULT "active"');
    }
};
