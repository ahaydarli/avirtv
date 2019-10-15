<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function subscribe($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('frontend.order.subscribe', compact('package'));
    }

    public function order(Request $request)
    {
        $package = Package::findOrFail($request->get('package_id'));

    }
}
