<?php

namespace App\Imports;

use App\Models\StudentTeacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentTeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentTeacher([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],	
            'location' => $row['location'],	
        ]);
    }
}
