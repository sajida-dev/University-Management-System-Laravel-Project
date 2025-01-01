<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile',
        'blood_group_id',
        'marital_status',
        'date_of_birth',
        'relgion_id',
        'gender_id',
        'is_disability',
        'father_name',
        'father_cnic',
        'is_father_alive',
        'father_phone_number',
        'is_old_student',
        'registration_no',
    ];
    public function gender()
    {
        return $this->belongsToMany(Gender::class);
    }
    public function bloodGroup()
    {
        return $this->belongsToMany(BloodGroup::class);
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    /**
     * Scope a query to only include personal info for a specific user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForUser($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
