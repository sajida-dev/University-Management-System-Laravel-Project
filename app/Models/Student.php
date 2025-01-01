<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'user_id',
        'program_id',
        'enrollment_date',
        'from',
        'to',
    ];

    public function courseResult()
    {
        # code...
        return $this->hasMany(CourseResult::class);
    }

    public function semesterResult()
    {
        # code...
        return $this->hasMany(SemesterResult::class);
    }

    public function completeResult()
    {
        # code...
        return $this->hasOne(CompleteResult::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    public function program()
    {
        # code...
        return $this->belongsTo(Program::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
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
        return $query->where('user_id', auth()->id());
    }
}
