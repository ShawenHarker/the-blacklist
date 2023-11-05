<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklisted extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_teacher_id',
        'school_id',
        'reason',
        'image',
        'mp3',
        'video',
    ];

    public function studentTeacher()
    {
        return $this->belongsTo(StudentTeacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
