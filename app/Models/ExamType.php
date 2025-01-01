<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;

    public function academicQualification()
    {
        # code...
        $this->hasMany(AcademicQualification::class);
    }
}
