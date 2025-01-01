<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'cgpa',
        'percentage',
        'total_credit_earned',
        'status',
    ];
    public function student()
    {
        # code...
        $this->belongsTo(Student::class);
    }
}
