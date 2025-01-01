<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DisabilityDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'disability_type',
        'accomodation_for_entrance_exam',
    ];
    public function user()
    {
        # code...
        $this->hasOne(User::class);
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
        return $query->where('user_id', Auth::id());
    }
}
