<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $id, $cycle) 
    {
        $plan = Plan::find($id);

        if ($cycle == 'monthly') {
            $planPrice = $plan->stripe_monthly_price_id;
        } else if ($cycle == 'yearly') {
            $planPrice = $plan->stripe_yearly_price_id;
        } else {
            return redirect()->back()->with('error', 'Invalid cycle selected.');
        }

        return $request->user()
            ->newSubscription('default', $planPrice)
            ->allowPromotionCodes()
            ->checkout([
                'success_url'   => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'    => route('checkout.cancel'),
                'metadata'      => ['plan_id' => $plan->id, 'cycle' => $cycle],
                'automatic_tax' => ['enabled' => false],
            ]);
    }

    public function success(Request $request)
    {
        $sessionId  = $request->get('session_id');
        $session    = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        $planId     = $session['metadata']['plan_id'] ?? null;
        $cycle      = $session['metadata']['cycle'] ?? null;
    
        $user = Auth::user();
        $user->update([
            'type'    => 'paid',
            'plan_id' => $planId,
        ]);

        $subscription = $user->subscriptions()->first();
        if ($subscription) {
            if ($cycle == 'monthly') {
                $endsAt = $subscription->created_at->addMonth();
            } else if ($cycle == 'yearly') {
                $endsAt = $subscription->created_at->addYear();
            } else {
                $endsAt = null;
            }
            $subscription->update([
                'ends_at' => $endsAt,
                'plan_id' => $planId
            ]);
        }
        return view('checkout.success');
    }
    

}
