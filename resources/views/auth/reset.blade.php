@extends('layouts.frontend')
@section('title', 'Reset Password')

@section('content')
<div class="flex items-center justify-center min-h-screen relative">
    <div class="relative w-full max-w-md p-6 bg-white/10 backdrop-blur-2xl border border-white/15 shadow-2xl rounded-2xl">
        <h2 class="text-center text-3xl font-extrabold text-white">Welcome Back</h2>
        <form action="{{ route('reset.password.store', $token) }}" method="POST" class="mt-6">
            @csrf

            <div class="mb-6">
                <label for="password" class="block text-gray-300 text-md mb-1 font-medium">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-lock text-gray-500"></i>
                    </div>
                    <input type="password" name="password" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('password') border-red-500 @else border-white/20  @enderror" placeholder="******">
                    <i class="fas fa-eye absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 cursor-pointer"></i>

                    @error('password')
                        <p class="absolute right-0 top-full text-left text-sm mt-1 text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="block text-gray-300 text-md mb-1 font-medium">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-lock text-gray-500"></i>
                    </div>
                    <input type="password" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('password') border-red-500 @else border-white/20  @enderror" placeholder="******" name="password_confirmation">
                    <i class="fas fa-eye absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 cursor-pointer"></i>
                </div>
            </div>

            @error('failed')
                <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror

            <button class="w-full mb-3 mt-3 bg-amber-600 hover:bg-amber-700 transition-all text-white py-3 rounded-lg font-medium shadow-lg">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection