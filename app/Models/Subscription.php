<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = ['user_id', 'stripe_id', 'stripe_status', 'stripe_price', 'quantity', 'trial_ends_at', 'ends_at'];

    protected $dates = ['ends_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionItems()
    {
        return $this->hasMany(SubscriptionItem::class);
    }

    public function getEndsAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->setTimezone('Asia/Dhaka') : null;
    }
}
