<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_head',
        'is_permanent',
        'since',
        'created_at',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
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

    protected static function boot()
    {
        parent::boot();

        // Hook into the saving event
        static::saving(function ($faculty) {
            // Check if one year has passed since join_date
            if ($faculty->isOneYearCompleted()) {
                $faculty->is_permanent = true; // or any other status you need to set
            }
        });
    }

    // Method to check if one year has passed
    public function isOneYearCompleted()
    {
        $createdAt = Carbon::parse($this->created_at);
        $month = $createdAt->month;
        $day = $createdAt->day;
        $year = $this->since;
        $combinedDate = Carbon::createFromDate($year, $month, $day);
        $oneYearLater = $combinedDate->addYear();

        return Carbon::now()->greaterThanOrEqualTo($oneYearLater);
    }
}
