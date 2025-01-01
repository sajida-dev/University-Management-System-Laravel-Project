<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'program_level_id',
        'program_id',
        'merit',
    ];

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        # code...
        return $this->belongsTo(Program::class);
    }

    public function programLevel()
    {
        # code...
        return $this->belongsTo(ProgramLevel::class);
    }
    /**
     * Scope a query to only include personal info for a specific user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForUser($query)
    {
        return $query->where('user_id', auth()->id());
    }
}
