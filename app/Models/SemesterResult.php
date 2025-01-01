<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'semester_no',
        'semester_type',
        'student_id',
        'gpa',
        'total_courses',
        'total_credit_earned',
        'status',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
