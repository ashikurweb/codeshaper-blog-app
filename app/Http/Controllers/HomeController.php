<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
        ->latest()->paginate(6);

        return view('frontend.index', compact('blogs'));
    }
}
