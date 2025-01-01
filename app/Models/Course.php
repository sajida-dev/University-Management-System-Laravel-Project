<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_code',
        'description',
    ];

    public function courseType()
    {
        # code...
        return $this->belongsTo(CourseType::class);
    }
    public function courseProgram()
    {
        # code...
        return $this->hasMany(CourseProgram::class);
    }
    public function programs()
    {
        # code...
        return $this->belongsToMany(Program::class);
    }
    public function courseResult()
    {
        # code...
        return $this->hasMany(CourseResult::class);
    }
}
