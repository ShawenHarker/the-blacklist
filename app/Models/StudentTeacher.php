<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'location',
    ];
    
    public function blacklisted()
    {
        return $this->hasMany(Blacklisted::class);
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%')
        );
        $query->when($filters['school'] ?? false, fn($query, $school) => 
            $query
                ->whereHas('school', fn($query) =>
                    $query->where('name', $school)));
    }
}
