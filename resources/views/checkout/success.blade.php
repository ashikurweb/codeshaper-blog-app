@extends('layouts.frontend')
@section('title', 'Subscription Successfully');

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-slate-900 shadow-lg rounded-lg p-8 max-w-md text-center">
        <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <h2 class="text-2xl font-semibold text-green-500">Subscription Successful!</h2>
        <p class="text-gray-300 mt-2">Thank you for subscribing. You now have full access.</p>
        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">Go to Dashboard</a>
    </div>
</div>
@endsection