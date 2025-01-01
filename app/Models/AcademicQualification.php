<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'degree_level',
        'board_id',
        'university_id',
        'registration_no',
        'roll_no',
        'passing_year',
        'exam_type',
        'total_marks',
        'obtained_marks',
    ];

    public function user()
    {
        # code...
        $this->belongsToMany(User::class);
    }
    public function board()
    {
        # code...
        $this->belongsToMany(Board::class);
    }
    public function university()
    {
        # code...
        $this->belongsToMany(University::class);
    }
    public function examType()
    {
        # code...
        $this->belongsToMany(ExamType::class);
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
