<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'stripe_plan_id',
        'stripe_monthly_price_id',
        'stripe_yearly_price_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_plans')
                    ->withPivot('status', 'created_at', 'updated_at');
    }
}
