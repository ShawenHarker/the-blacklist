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
            $table->foreignId('user_id');
            $table->string('reason');
            $table->string('image')->nullable();
            $table->string('mp3')->nullable();
            $table->string('video')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blacklisteds');
    }
};
