<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    public function academicQualification()
    {
        # code...
        $this->hasMany(AcademicQualification::class);
    }
}
