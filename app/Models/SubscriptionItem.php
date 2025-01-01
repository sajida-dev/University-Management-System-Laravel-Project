<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;

class SubscriptionItem extends Model
{
    use HasFactory;
    public function subscription()
    {
        # code...
        $this->hasOne(Subscription::class);
    }
    public function stripe()
    {
        # code...
        $this->hasOne(Stripe::class);
    }
}
