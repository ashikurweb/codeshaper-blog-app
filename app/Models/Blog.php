<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    // Status Constants
    const STATUS_DRAFT = 'draft';
    const STATUS_SCHEDULED = 'scheduled';
    const STATUS_PUBLISHED = 'published';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if ($blog->status === self::STATUS_SCHEDULED) {
                $blog->published_at = now()->addMinutes(2);
            } elseif ($blog->status === self::STATUS_PUBLISHED) {
                $blog->published_at = now();
            } else {
                $blog->published_at = null; 
            }
        });
    }


    public function scopeScheduled( $query )
    {
        return $query->where('status', self::STATUS_SCHEDULED)
                     ->whereNotNull('published_at')
                     ->where('published_at', '>', now());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}