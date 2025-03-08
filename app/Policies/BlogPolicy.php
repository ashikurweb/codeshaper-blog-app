<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    // public function create(User $user)
    // {
    //     if ($user->subscribed('default')) {
    //         $subscriptionType = $user->subscriptions->first()->type;
    //         if ($subscriptionType === 'Basic' && $user->blogs->count() < 50) {
    //             return true;
    //         } elseif ($subscriptionType === 'Pro' && $user->blogs->count() < 100) {
    //             return true;
    //         } elseif ($subscriptionType === 'Enterprise') {
    //             return true;
    //         }
    //     }
    //     return $user->blogs->count() < 2;
    // }

    public function edit (User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }

    public function update(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }

    public function delete(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }
}
