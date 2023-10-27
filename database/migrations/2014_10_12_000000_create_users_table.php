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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(1);
            $table->foreignId('university_id')->nullable()->default(null);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 150)->unique();
            $table->string('password')->nullable();
            $table->string('location');
            $table->boolean('is_blacklisted')->default(false);
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
