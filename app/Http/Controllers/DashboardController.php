<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () 
    {
         // Total User 
         $currentUsers = User::count();
         $currentBlogs = Blog::count();
 
         $lastMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)->count();
         $lastMonthBlogs = User::whereMonth('created_at', now()->subMonth()->month)->count();
 
         $userPercentageChange = $this->calculatePercentageChange($lastMonthUsers, $currentUsers);
         $blogPercentageChange = $this->calculatePercentageChange($lastMonthBlogs, $currentBlogs);
 
 
         return view ('backend.index', compact('currentUsers', 'currentBlogs', 'userPercentageChange', 'blogPercentageChange'));
    }

    private function calculatePercentageChange($oldValue, $newValue) 
    {
        if ($oldValue === 0) {
            return $newValue > 0 ? 100 : 0;
        }

        return round((($newValue - $oldValue) / $oldValue) * 100); 
    }
}