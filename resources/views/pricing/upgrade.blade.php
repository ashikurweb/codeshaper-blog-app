<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pricing Page</title>
</head>

<body class="bg-gray-950">
    <div class="container mx-auto px-4 py-16" id="pricing">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-200">Upgrade Your Plan</h1>

        <!-- Toggle Button for Monthly/Yearly -->
        <div class="flex justify-center mb-12">
            <div class="bg-gray-800 rounded-full flex relative w-48">
                <div id="toggleIndicator"
                    class="absolute w-1/2 h-full bg-violet-500 rounded-full transition-all duration-300"></div>
                <button id="monthlyBtn" class="w-1/2 py-3 text-white font-semibold relative z-10">Monthly</button>
                <button id="yearlyBtn" class="w-1/2 py-3 text-white font-semibold relative z-10">Yearly</button>
            </div>
        </div>

        <!-- Pricing Cards (Initially display monthly plans) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="monthlyPlans">

            <!-- Monthly Pricing Card 1: Basic Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 transform text-white">
                <h2 class="text-2xl font-bold mb-4">Basic</h2>
                <p class="text-gray-400 mb-6">Perfect for individuals</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$3</span>
                    <span class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 10 Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Email Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(1, 'monthly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                    <form action="{{ route('subscription.upgrade', ['id' => 1, 'cycle' => 'monthly']) }}" method="POST">
                        @csrf

                        <button type="submit" class="w-full flex justify-center text-center bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">
                            Upgrade Plan
                        </button>
                    </form>
                @endif
            </div>

            <!-- Monthly Pricing Card 2: Pro Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 transform border border-violet-600 scale-105 transition-all duration-200 text-white">
                <h2 class="text-2xl font-bold mb-4">Pro</h2>
                <p class="text-gray-400 mb-6">Great for small teams</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$5</span>
                    <span class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 30 Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Priority Email Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(2, 'monthly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                <a href="{{ route('checkout', ['id' => 2, 'cycle' => 'monthly']) }}" class="w-full flex justify-center text-center border border-violet-500 hover:border-violet-700 text-white py-3 rounded-lg hover:bg-violet-700 hover:border-border-violet-700 transition-colors">Upgrade Plan</a>
                @endif
            </div>

            <!-- Monthly Pricing Card 3: Enterprise Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Enterprise</h2>
                <p class="text-gray-400 mb-6">For large organizations</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$10</span>
                    <span class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 50 Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 24/7 Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(3, 'monthly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                <a href="{{ route('checkout', ['id' => 3, 'cycle' => 'monthly']) }}" class="w-full flex justify-center text-center bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">Upgrade Plan</a>
                @endif
            </div>

        </div>

        <!-- Pricing Cards for Yearly (Initially hidden) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 hidden" id="yearlyPlans">

            <!-- Yearly Pricing Card 1: Basic Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 transform text-white">
                <h2 class="text-2xl font-bold mb-4">Basic</h2>
                <p class="text-gray-400 mb-6">Perfect for individuals</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$12</span>
                    <span class="text-lg text-gray-400">/year</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 50 Blog Posts</li> <!-- Updated -->
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Email Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(1, 'yearly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                <a href="{{ route('checkout', ['id' => 1, 'cycle' => 'yearly']) }}" class="w-full flex justify-center text-center bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">Upgrade Plan</a>
                @endif
            </div>

            <!-- Yearly Pricing Card 2: Pro Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 transform border border-violet-600 scale-105 transition-all duration-200 text-white">
                <h2 class="text-2xl font-bold mb-4">Pro</h2>
                <p class="text-gray-400 mb-6">Great for small teams</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$15</span>
                    <span class="text-lg text-gray-400">/year</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 100 Blog Posts</li> <!-- Updated -->
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Priority Email Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(2, 'yearly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                <a href="{{ route('checkout', ['id' => 2, 'cycle' => 'yearly']) }}" class="w-full flex justify-center text-center border border-violet-500 hover:border-violet-700 text-white py-3 rounded-lg hover:bg-violet-700 hover:border-border-violet-700 transition-colors">Upgrade Plan</a>
                @endif
            </div>

            <!-- Yearly Pricing Card 3: Enterprise Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Enterprise</h2>
                <p class="text-gray-400 mb-6">For large organizations</p>
                <p class="text-4xl font-bold mb-6">
                    <span>$20</span>
                    <span class="text-lg text-gray-400">/year</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Unlimited Blog Posts</li> <!-- Updated -->
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 24/7 Support</li>
                </ul>
                @if(auth()->user() && auth()->user()->subscribed(3, 'yearly'))
                    <button class="w-full flex justify-center text-center bg-gray-600 text-white py-3 rounded-lg cursor-not-allowed" disabled>
                        Already Subscribed
                    </button>
                @else
                <a href="{{ route('checkout', ['id' => 3, 'cycle' => 'yearly']) }}" class="w-full flex justify-center bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">Upgrade Plan</a>
                @endif
            </div>

        </div>

    </div>

    <script>
        const monthlyBtn = document.getElementById('monthlyBtn');
        const yearlyBtn = document.getElementById('yearlyBtn');
        const toggleIndicator = document.getElementById('toggleIndicator');
        const monthlyPlans = document.getElementById('monthlyPlans');
        const yearlyPlans = document.getElementById('yearlyPlans');

        monthlyBtn.addEventListener('click', () => {
            toggleIndicator.style.transform = 'translateX(0)';
            monthlyPlans.classList.remove('hidden');
            yearlyPlans.classList.add('hidden');
        });

        yearlyBtn.addEventListener('click', () => {
            toggleIndicator.style.transform = 'translateX(100%)';
            monthlyPlans.classList.add('hidden');
            yearlyPlans.classList.remove('hidden');
        });
    </script>
</body>

</html>
