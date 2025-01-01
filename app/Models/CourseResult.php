<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'student_id',
        'mid_marks',
        'practical_marks',
        'sessional_marks',
        'final_marks',
        'percentage',
        'semester',
        'year',
    ];
    public function course()
    {
        # code...
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        # code...
        return $this->belongsTo(Student::class);
    }
}
