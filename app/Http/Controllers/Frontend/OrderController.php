<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Package;

class OrderController extends Controller
{
    public function subscribe($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('frontend.order.subscribe', compact('package'));
    }
}
