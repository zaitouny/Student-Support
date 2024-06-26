<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot('status','how_often','mark');
    }

    public function SubjectsForThisSemester()
    {
        return $this->belongsToMany(Subject::class)
                    ->withPivot('status')
                    ->wherePivot('status', 2);
    }

    /**
     * The attributes that are mass assignable.
     *
     *
     *  @var array<int, string>
     */
    protected $fillable = [
        'name',
        'roul',
        'uni_id',
        'year',
        'email',
        'password',
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
}
