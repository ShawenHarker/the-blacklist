<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\StudentTeacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        StudentTeacher::factory(10)->create();
        
        User::factory(1)->create();

        School::create([
            'name' => 'University Of Cape Town',
            'location' => 'Rondebosch, Cape Town, 7700, South Africa',
            'website' => 'https://www.uct.ac.za/',
        ]);

        School::create([
            'name' => 'Cape Peninsula University of Technology',
            'location' => 'Bellville, Cape Town, 7493, South Africa',
            'website' => 'https://www.cput.ac.za/',
        ]);
    }
}
