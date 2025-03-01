<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionItem extends Model
{
    protected $guarded = [];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
