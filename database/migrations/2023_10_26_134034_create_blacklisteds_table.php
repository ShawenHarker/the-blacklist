<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blacklisteds', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->foreignId('student_teacher_id');
            $table->foreignId('school_id');
            $table->string('image')->nullable();
            $table->string('mp3')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();   
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blacklisteds');
    }
};
