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
        Schema::create('student_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->nullable()->default(null);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('location');
            $table->boolean('is_blacklisted')->default(false);
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_teachers');
    }
};