<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
        'attendance_date',
        'status',
    ];

    public function student()
    {
        # code...
        $this->belongsTo(Student::class);
    }

    public function course()
    {
        # code...
        $this->belongsTo(Course::class);
    }
}
