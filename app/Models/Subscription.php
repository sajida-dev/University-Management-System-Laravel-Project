<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;

class Subscription extends Model
{
    use HasFactory;
    public function user()
    {
        # code...
        $this->hasOne(User::class);
    }
    public function stripe()
    {
        # code...
        $this->hasOne(Stripe::class);
    }
}
