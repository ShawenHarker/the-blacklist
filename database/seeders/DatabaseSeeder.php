<?php

namespace Database\Seeders;

use App\Models\BlacklistingSchoolStudentTeacher;
use App\Models\School;
use App\Models\StudentTeacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $studentTeachers = StudentTeacher::factory(10)->create();

        User::factory(1)->create();

        $school1 = School::create([
            'name' => 'University Of Cape Town',
            'location' => 'Rondebosch, Cape Town, 7700, South Africa',
            'website' => 'https://www.uct.ac.za',
        ]);

        $school2 = School::create([
            'name' => 'Cape Peninsula University of Technology',
            'location' => 'Bellville, Cape Town, 7493, South Africa',
            'website' => 'https://www.cput.ac.za',
        ]);

        foreach ($studentTeachers as $studentTeacher) {
            if ($studentTeacher->id % 2 === 0) {
                BlacklistingSchoolStudentTeacher::create([
                    'student_teacher_id' => $studentTeacher->id,
                    'school_id' => $school1->id,
                ]);
            } else {
                BlacklistingSchoolStudentTeacher::create([
                    'student_teacher_id' => $studentTeacher->id,
                    'school_id' => $school2->id,
                ]);
            }
        }
    }
}
