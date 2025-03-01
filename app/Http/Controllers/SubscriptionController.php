<?php

namespace App\Http\Controllers;

use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('pricing.pricing');
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $plan = $request->input('plan');
        $planDetails = $this->getPlanDetails($plan);

        if (!$planDetails['price_id']) {
            return back()->with('error', 'Invalid Plan Selected');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $planDetails['price_id'], 
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
            'success_url' => route('subscriptions.success'),
            'cancel_url' => route('subscriptions.cancel'),
            'customer_email' => $user->email, 
        ]);

        return redirect($session->url);
    }

    private function getPlanDetails($plan)
    {
        $plans = [
            'basic_monthly' => ['name' => 'Basic Plan (Monthly)', 'price_id' => 'price_1QxRxIDHtZJ4L4TbxEvE5j8G'],
            'pro_monthly' => ['name' => 'Pro Plan (Monthly)', 'price_id' => 'price_1QxRxIDHtZJ4L4Tb4SvXPXrr'],
            'enterprise_monthly' => ['name' => 'Enterprise Plan (Monthly)', 'price_id' => 'price_1QxRxIDHtZJ4L4TbqSK7IWlR'],
            'basic_yearly' => ['name' => 'Basic Plan (Yearly)', 'price_id' => 'price_1QxRxIDHtZJ4L4Tb9S9sLI1N'],
            'pro_yearly' => ['name' => 'Pro Plan (Yearly)', 'price_id' => 'price_1QxRxIDHtZJ4L4TbE8XvThFp'],
            'enterprise_yearly' => ['name' => 'Enterprise Plan (Yearly)', 'price_id' => 'price_1QxRxIDHtZJ4L4TbmJQzTnEy'],
        ];

        return $plans[$plan] ?? ['name' => 'Unknown Plan', 'price_id' => null];
    }

    public function success()
    {
        return view('subscriptions.success');
    }

    public function cancel()
    {
        return view('pricing.pricing');
    }
}
