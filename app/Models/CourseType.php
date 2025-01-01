<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;

    public function course()
    {
        # code...
        return $this->hasMany(Course::class);
    }
    public function courseProgram()
    {
        # code...
        return $this->hasMany(CourseProgram::class);
    }
}
