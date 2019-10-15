<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Package;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function subscribe($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('frontend.order.subscribe', compact('package'));
    }

    public function order(Request $request, $package_id)
    {
        $package_id = filter_var($package_id, FILTER_SANITIZE_NUMBER_INT);
        $package = Package::findOrFail($package_id);
        $payload = [
            'user_id' => Auth::id(),
            'package_id' => $package->id
        ];
        $subscription = Subscription::create($payload);

        return redirect()->route('profile');
    }
}
