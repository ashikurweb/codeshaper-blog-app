<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where(function ($query) {
            $query->where('status', Blog::STATUS_PUBLISHED)
                ->orWhere(function ($query) {
                    $query->where('status', Blog::STATUS_SCHEDULED)
                            ->where('published_at', '<=', now());
                });
        })
        ->latest()->paginate(6);

        return view('frontend.index', compact('blogs'));
    }
}
