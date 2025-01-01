<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'fee_type',
        'challan_no',
        'amount_to_pay',
        'due_date',
        'fine_amount',
        'fine_date',
        'amount_paid',
        'bank_name',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
        'status',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function stripe()
    {
        return $this->belongsTo(Stripe::class);
    }
}
