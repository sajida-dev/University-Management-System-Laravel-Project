<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'total_marks',
        'obtained_marks',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
