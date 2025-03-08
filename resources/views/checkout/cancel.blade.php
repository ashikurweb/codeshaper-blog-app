@extends('layouts.frontend')
@section('title', 'Subscription Cancel')


@section('content')
<div class="min-h-screen flex items-center justify-center bg-red-100">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
        <svg class="w-16 h-16 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <h2 class="text-2xl font-semibold text-red-700">Subscription Canceled</h2>
        <p class="text-gray-600 mt-2">Your subscription has been canceled. If this was a mistake, you can re-subscribe anytime.</p>
        <a href="{{ route('home') }}" class="mt-4 inline-block bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">Choose a Plan</a>
    </div>
</div>
@endsection