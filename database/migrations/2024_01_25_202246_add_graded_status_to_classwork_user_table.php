<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('classwork_user', function (Blueprint $table) {

//            $table->enum('status',['assigned','draft','submitted','returned','graded'])->default('assigned')->change();
            DB::statement("ALTER TABLE classwork_user MODIFY COLUMN status ENUM('assigned', 'draft', 'submitted', 'returned', 'graded')");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classwork_user', function (Blueprint $table) {
//            $table->enum('status',['assigned','draft','submitted','returned'])->default('assigned')->change();
            DB::statement("ALTER TABLE classwork_user MODIFY COLUMN status ENUM('assigned', 'draft', 'submitted', 'returned')");

        });
    }
};
