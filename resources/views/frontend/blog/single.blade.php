@extends('layouts.frontend')
@section('title', $blog->title)

@section('content')
<div class="max-w-4xl mx-auto p-6 overflow-hidden">
    <!-- Image Section -->
    <div class="relative h-full overflow-hidden rounded-t-xl">
        <img 
            src="{{ asset('uploads/blogs/' . ($blog->image ? $blog->image : 'https://ai-watch.ec.europa.eu/sites/default/files/styles/oe_theme_medium_no_crop/public/2022-02/AI%20Landscape.jpg?itok=VRk0lEKY')) }}" 
            alt="{{ $blog->title }}" 
            class="w-full h-full object-cover"
        />
        <!-- Category Badge -->
        <div class="absolute top-4 left-4 bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow-md">
            {{ $blog->category }}
        </div>
    </div>

    <!-- Content Section -->
    <div class="p-6">
        <!-- Title -->
        <h1 class="text-3xl font-bold text-blue-900 mb-4">
            {{ $blog->title }}
        </h1>

        <!-- Metadata (Author and Created At) -->
        <div class="flex items-center space-x-4 text-gray-200 mb-6">
            <div class="flex items-center space-x-2">
                <i class="fas fa-user"></i>
                <span class="text-sm">{{ $blog->author }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-calendar-days"></i>
                <span class="text-sm">{{ $blog->created_at->format('d M, Y') }}</span>
            </div>
        </div>

        <!-- Content -->
        <div class="prose max-w-none mb-5 text-white">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <!-- Published At (if available) -->
        @if ($blog->published_at)
            <div class="text-gray-500 mb-6">
                <strong>Published at:</strong> {{ \Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}
            </div>
        @endif
    </div>
</div>
@endsection