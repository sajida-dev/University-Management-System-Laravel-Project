<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function application()
    {
        # code...
        $this->hasMany(Application::class);
    }
    public function faculties()
    {
        # code...
        $this->hasMany(Faculty::class);
    }

    public function job()
    {
        # code...
        $this->hasMany(Job::class);
    }
}
