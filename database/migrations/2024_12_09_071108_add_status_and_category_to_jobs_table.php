<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->after('job_description');
            $table->enum('category', ['TECHNICAL POSITION', 'BACK OFFICE SUPPORT', 'INTERNS'])
                ->default('TECHNICAL POSITION')
                ->after('schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('category');
        });
    }
};
