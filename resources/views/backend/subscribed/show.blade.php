@extends('layouts.backend')
@section('title', 'Subscribed Users')

@section('content')
@include('backend.partials.nav')
<div class="p-3">
    <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">User</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Stripe ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Quantity</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Ends At</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Upgrade</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subscription->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subscription->stripe_id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="px-2 py-2 text-sm {{ $subscription->stripe_status == 'active' ? 'bg-green-100 text-green-500' : 'bg-red-100 text-red-500' }} rounded-full">
                            {{ ucfirst($subscription->stripe_status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subscription->quantity }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        @php
                            $endsAt = \Carbon\Carbon::parse($subscription->ends_at)->setTimezone('Asia/Dhaka');
                            $now = \Carbon\Carbon::now()->setTimezone('Asia/Dhaka');
                            $difference = $now->diffInDays($endsAt, false);
                            $roundedDifference = round($difference);  
                        @endphp

                        @if($difference > 0)
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-900 bg-lime-100 px-2 py-1 rounded-lg">
                                    {{ $endsAt->format('Y-m-d') }}
                                </span>
                                <span class="text-white bg-indigo-400 px-2 py-1 rounded-lg">
                                    {{ $endsAt->format('h:i A') }}
                                </span>
                                <span class="bg-rose-100 text-rose-500 px-2 py-1 rounded-lg ml-2">Expires in {{ $roundedDifference }} days</span>
                            </div>
                        @elseif($difference == 0)
                            <div class="flex items-center space-x-2">
                                <span class="text-red-500">Expires Today</span>
                            </div>
                        @else
                            <div class="flex items-center space-x-2">
                                <span class="text-red-500">Expired</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="" class="px-4 py-2 text-indigo-500 bg-indigo-50 rounded-lg hover:bg-indigo-200 hover:text-white">Upgrade</a>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <form action="{{ route('subscription.destroy', $subscription->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 text-red-500 bg-red-100 rounded-lg hover:bg-red-500 hover:text-white">
                                Cancel
                            </button>
                        </form>
                    </td>                                                         
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- pagination --}}
    <div class="mt-2 p-2">
        {{ $subscriptions->links() }}
    </div>
</div>
@endsection
