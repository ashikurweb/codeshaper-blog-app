@extends('layouts.backend')
@section('title', 'Welcome to Dashboard')

@section('content')
@include('backend.partials.nav')
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- Total User -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-gradient-to-r from-blue-500 to-purple-600 shadow-soft-xl rounded-2xl bg-clip-border p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 font-sans font-semibold leading-normal text-lg text-white opacity-80">Total Users</p>
                            <h2 class="text-3xl font-bold text-white">{{ $currentUsers }}</h2>
                        </div>
                        <div class="p-3 bg-white bg-opacity-20 rounded-full">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-white opacity-80">{{ $userPercentageChange >= 0 ? '+' : '' }}{{ $userPercentageChange }}% from last month</p>
                    </div>
                </div>
            </div>
            
            <!-- Total Blog -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-gradient-to-r from-green-500 to-teal-600 shadow-soft-xl rounded-2xl bg-clip-border p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 font-sans font-semibold leading-normal text-lg text-white opacity-80">Total Blog</p>
                            <h2 class="text-3xl font-bold text-white">{{ $currentBlogs }}</h2>
                        </div>
                        <div class="p-3 bg-white bg-opacity-20 rounded-full">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-white opacity-80">{{ $blogPercentageChange >= 0 ? '+' : '' }}{{ $blogPercentageChange }}% from last month</p>
                    </div>
                </div>
            </div>
    
            <!-- Total Tags -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-gradient-to-r from-yellow-500 to-orange-600 shadow-soft-xl rounded-2xl bg-clip-border p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 font-sans font-semibold leading-normal text-lg text-white opacity-80">Total Tags</p>
                            <h2 class="text-3xl font-bold text-white">200</h2>
                        </div>
                        <div class="p-3 bg-white bg-opacity-20 rounded-full">
                            <i class="fa-solid fa-user-tag text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-white opacity-80">12% from last month</p>
                    </div>
                </div>
            </div>
    
            <!-- Total Categories -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-gradient-to-r from-red-500 to-pink-600 shadow-soft-xl rounded-2xl bg-clip-border p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 font-sans font-semibold leading-normal text-lg text-white opacity-80">Total Category</p>
                            <h2 class="text-3xl font-bold text-white">200</h2>
                        </div>
                        <div class="p-3 bg-white bg-opacity-20 rounded-full">
                            <i class="fa-solid fa-layer-group text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-white opacity-80">12% from last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection