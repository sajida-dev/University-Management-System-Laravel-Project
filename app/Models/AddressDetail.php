<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'temp_postal_address',
        'temp_city',
        'per_postal_address',
        'per_city',
    ];

    public function user()
    {
        # code...
        $this->belongsTo(User::class);
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
