<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'course_id',
        'semester_no',
        'semester_type',
    ];
    public function schedule()
    {
        # code...
        $this->belongsTo(Schedule::class);
    }
    public function courses()
    {
        # code...
        $this->hasMany(Course::class);
    }
}
