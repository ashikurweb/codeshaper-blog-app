@extends('layouts.frontend')
@section('title', 'Create Your Account')
@section('content')
<div class="flex items-center justify-center min-h-screen relative">
    <div class="relative w-full max-w-lg p-6 bg-white/10 backdrop-blur-2xl border border-white/15 shadow-2xl rounded-2xl">
        <h2 class="text-center text-3xl font-extrabold text-white">Create a New Account</h2>
        <form action="{{ route('register.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-3">
                <label for="name" class="block text-gray-300 text-md mb-1 font-medium">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-user text-gray-500"></i>
                    </div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border  text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('name') border-red-500 @else border-white/20  @enderror" placeholder="Enter your full name">

                    @error('name')
                        <p class="absolute right-0 top-full text-left text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="block text-gray-300 text-md mb-1 font-medium">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-envelope text-gray-500"></i>
                    </div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('email') border-red-500 @else border-white/20  @enderror" placeholder="Enter your email address">

                    @error('email')
                        <p class="absolute right-0 top-full text-left text-sm mt-2 text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="block text-gray-300 text-md mb-1 font-medium">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <i class="fa fa-lock text-gray-500"></i>
                    </div>
                    <input type="password" name="password" class="w-full pl-12 pr-4 py-3 rounded-lg bg-black/30 border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200 @error('password') border-red-500 @else border-white/20  @enderror" placeholder="******">
                    <i class="fas fa-eye absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 cursor-pointer"></i>

                    @error('password')
                        <p class="absolute right-0 top-full text-left text-sm mt-2 text-red-500 italic">{{ $message }}</p>
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

            <button class="w-full mb-3 mt-3 bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-medium shadow-lg transition duration-200">
                Sign Up
            </button>
        </form>
        <p class="text-center text-gray-400 text-sm mt-6">
            Already have an account? <a href="{{ route('login') }}" class="text-purple-400 hover:underline">Sign In</a>
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type="password"]').forEach(input => {
            const icon = input.nextElementSibling;
            icon.addEventListener('click', () => {
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>


@endpush