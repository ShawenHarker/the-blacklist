<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function blacklisted()
    {
        return $this->belongsTo(Blacklisted::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%')
                ->orWhere('reason_for_blacklisting', 'like', '%' . $search . '%')
        );
        $query->when($filters['university'] ?? false, fn($query, $university) => 
            $query
                ->whereHas('university', fn($query) =>
                    $query->where('name', $university)));
    }
}
