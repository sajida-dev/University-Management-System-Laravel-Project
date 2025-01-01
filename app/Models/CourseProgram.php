<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'course_type_id',
        'semester',
        'program_id',
    ];
    public function course()
    {
        # code...
        return $this->belongsTo(Course::class);
    }
    public function program()
    {
        # code...
        return $this->belongsTo(Program::class);
    }
    public function courseType()
    {
        # code...
        return $this->belongsTo(CourseType::class);
    }
}
