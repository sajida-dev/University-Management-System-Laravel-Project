<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'fname',
        'lname',
        'email',
        'password',
        'cnic',
        'phone_number',
        'role_id'
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

    public function academicQualification()
    {
        # code...
        return $this->hasMany(AcademicQualification::class);
    }
    public function addressDetail()
    {
        # code...
        return $this->hasMany(AddressDetail::class);
    }
    public function application()
    {
        # code...
        return $this->hasMany(Application::class);
    }
    public function faculty()
    {
        return $this->hasOne(Faculty::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function majorSubjects()
    {
        return $this->hasOne(MajorSubject::class);
    }
    public function otherDetail()
    {
        return $this->hasOne(OtherDetail::class);
    }
    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class);
    }
    public function role()
    {
        # code...
        return $this->belongsTo(Role::class);
    }
}
