<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'student'
        ]);
        
        Role::create([
            'name' => 'admin',
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\University::factory(3)->create();
    }
}
