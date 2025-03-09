<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index ()
    {
        $subscriptions = Subscription::with('user')->paginate(8);

        return view('backend.subscribed.show', compact('subscriptions'));
    }

    public function destroy ($id)
    {
        $subscription = Subscription::findOrFail($id);
        $user = Auth::user();
        if ($user->id !== $subscription->user_id) {
            abort(403,'You are not authorized to delete this subscription.');
        }
        $subscription->delete();
        return redirect()->route('subscribed.user')->with('success', 'Subscription deleted successfully');
    }

}
