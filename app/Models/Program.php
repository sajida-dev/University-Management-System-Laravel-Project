<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'program_level_id',
        'department_id',
        'total_credits',
    ];
    public function application()
    {
        # code...
        return $this->hasMany(Application::class);
    }
    public function courseProgram()
    {
        # code...
        return $this->hasMany(CourseProgram::class);
    }
    public function programLevel()
    {
        return $this->belongsTo(ProgramLevel::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function student()
    {
        # code...
        return $this->hasMany(Student::class);
    }
}
