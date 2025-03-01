@extends('layouts.frontend')
@section('title', 'Forgot Password')

@section('content')
<div class="flex items-center justify-center min-h-screen relative">
    <div class="relative w-full max-w-md p-6 bg-white/10 backdrop-blur-2xl border border-white/15 shadow-2xl rounded-2xl">
        <h2 class="text-center text-3xl font-extrabold text-white">Welcome Back</h2>
        <form action="{{ route('forgot.store') }}" method="POST" class="mt-6">
            @csrf

            <div class="mb-3">
                <label for="email" class="block text-gray-300 text-md mb-1 font-medium">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-envelope text-gray-500"></i>
                    </div>
                    <input type="email" name="email" id="email" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('email') border-red-500 @else border-white/20  @enderror" placeholder="Enter your email address">
            
                    @error('email')
                        <p class="absolute right-0 top-full text-left text-sm text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        
            <button class="w-full mb-3 mt-3 bg-rose-600 hover:bg-rose-500 transition-all text-white py-3 rounded-lg font-medium shadow-lg">
                Forgot Password
            </button>
        </form>
        <p class="text-center text-gray-400 text-sm mt-6">
            Back to ? <a href="{{ route('login') }}" class="text-purple-400 hover:underline">Sign In</a>
        </p>
    </div>
</div>
@endsection