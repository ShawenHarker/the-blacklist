<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\University;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'student'
        ]);
        
        Role::create([
            'name' => 'admin',
        ]);

        User::factory(10)->create();

        University::create([
            'name' => 'University Of Cape Town',
            'location' => 'Rondebosch, Cape Town, 7700, South Africa',
            'website' => 'https://www.uct.ac.za/',
            'student_count' => 1000,
        ]);
    }
}
