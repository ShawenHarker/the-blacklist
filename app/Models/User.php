<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    // protected function setBirthdateAttribute($value)
    // {
    //     $this->attributes['Date created'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(format: 'dd/MM/yyyy');
    //     $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(format: 'dd/MM/yyyy');
    // }
}
