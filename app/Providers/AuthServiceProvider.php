<?php

namespace App\Providers;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Blog::class => BlogPolicy::class
    ];
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Blog::class, BlogPolicy::class);

        Gate::define('edit-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define('update-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define('destroy-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });
    }
}
