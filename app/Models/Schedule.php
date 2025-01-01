<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'start_time',
        'end_time',
        'date',
    ];
    public function courseSchedule()
    {
        # code...
        $this->hasOne(CourseSchedule::class);
    }
}
