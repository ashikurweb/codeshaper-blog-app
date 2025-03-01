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
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-200">Choose Your Plan</h1>
    
        <!-- Toggle Button for Monthly/Yearly -->
        <div class="flex justify-center mb-12">
            <div class="bg-gray-800 rounded-full flex relative w-48">
                <div id="toggleIndicator"
                    class="absolute w-1/2 h-full bg-violet-500 rounded-full transition-all duration-300"></div>
                <button id="monthlyBtn" class="w-1/2 py-3 text-white font-semibold relative z-10">Monthly</button>
                <button id="yearlyBtn" class="w-1/2 py-3 text-gray-400 font-semibold relative z-10">Yearly</button>
            </div>
        </div>
    
        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pricing Card 1: Basic Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 transform text-white">
                <h2 class="text-2xl font-bold mb-4">Basic</h2>
                <p class="text-gray-400 mb-6">Perfect for individuals</p>
                <p class="text-4xl font-bold mb-6">
                    <span id="basicPrice">$9</span>
                    <span id="basicCycle" class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 5 Users</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 50 Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Email Support</li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="basic">
                    <button type="submit" class="w-full bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">Purchase Plan</button>
                </form>
            </div>
    
            <!-- Pricing Card 2: Pro Plan -->
            <div
                class="bg-gray-900 rounded-lg shadow-lg p-8 transform border border-violet-600 scale-105 transition-all duration-200 text-white">
                <h2 class="text-2xl font-bold mb-4">Pro</h2>
                <p class="text-gray-400 mb-6">Great for small teams</p>
                <p class="text-4xl font-bold mb-6">
                    <span id="proPrice">$29</span>
                    <span id="proCycle" class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 25 Users</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 100 Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Priority Email Support
                    </li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="pro">
                    <button type="submit"
                        class="w-full border border-violet-500 text-white py-3 rounded-lg hover:bg-violet-700 hover:border-border-violet-700 transition-colors">Purchase
                        Plan</button>
                </form>
            </div>
    
            <!-- Pricing Card 3: Enterprise Plan -->
            <div class="bg-gray-900 rounded-lg shadow-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Enterprise</h2>
                <p class="text-gray-400 mb-6">For large organizations</p>
                <p class="text-4xl font-bold mb-6">
                    <span id="enterprisePrice">$99</span>
                    <span id="enterpriseCycle" class="text-lg text-gray-400">/month</span>
                </p>
                <ul class="mb-8">
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Unlimited Users</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> Unlimited Blog Posts</li>
                    <li class="flex items-center mb-2"><span class="text-green-500 mr-2">✔</span> 24/7 Support</li>
                </ul>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="enterprise">
                    <button type="submit" class="w-full bg-violet-600 text-white py-3 rounded-lg border-2 border-transparent hover:bg-transparent hover:border-violet-500 transition-all duration-200">Purchase Plan</button>
                </form>
            </div>
    
        </div>
    </div>
    <script>
        const monthlyBtn = document.getElementById('monthlyBtn');
        const yearlyBtn = document.getElementById('yearlyBtn');
        const toggleIndicator = document.getElementById('toggleIndicator');
        const basicPrice = document.getElementById('basicPrice');
        const proPrice = document.getElementById('proPrice');
        const enterprisePrice = document.getElementById('enterprisePrice');
        const basicCycle = document.getElementById('basicCycle');
        const proCycle = document.getElementById('proCycle');
        const enterpriseCycle = document.getElementById('enterpriseCycle');
    
        // Pricing plan form hidden inputs
        const basicPlanInput = document.querySelector('input[name="plan"][value="basic"]');
        const proPlanInput = document.querySelector('input[name="plan"][value="pro"]');
        const enterprisePlanInput = document.querySelector('input[name="plan"][value="enterprise"]');
    
        monthlyBtn.addEventListener('click', () => {
            toggleIndicator.style.transform = 'translateX(0)';
            monthlyBtn.classList.add('text-white');
            yearlyBtn.classList.remove('text-white');
            yearlyBtn.classList.add('text-gray-400');
    
            basicPrice.textContent = '$9';
            proPrice.textContent = '$29';
            enterprisePrice.textContent = '$99';
    
            basicCycle.textContent = '/month';
            proCycle.textContent = '/month';
            enterpriseCycle.textContent = '/month';
    
            // Update the plan values
            basicPlanInput.value = 'basic_monthly';
            proPlanInput.value = 'pro_monthly';
            enterprisePlanInput.value = 'enterprise_monthly';
        });
    
        yearlyBtn.addEventListener('click', () => {
            toggleIndicator.style.transform = 'translateX(100%)';
            yearlyBtn.classList.add('text-white');
            monthlyBtn.classList.remove('text-white');
            monthlyBtn.classList.add('text-gray-400');
    
            basicPrice.textContent = '$90';
            proPrice.textContent = '$290';
            enterprisePrice.textContent = '$990';
    
            basicCycle.textContent = '/year';
            proCycle.textContent = '/year';
            enterpriseCycle.textContent = '/year';
    
            // Update the plan values
            basicPlanInput.value = 'basic_yearly';
            proPlanInput.value = 'pro_yearly';
            enterprisePlanInput.value = 'enterprise_yearly';
        });
    </script>
</body>
</html>

