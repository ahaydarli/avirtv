<?php
namespace App\Http\Controllers\Frontend;

use App\Components\GoldenpayUtils;
use App\Http\Controllers\Controller;
use App\MinistraClient;
use App\Package;
use App\Service;
use App\Subscription;
use GuzzleHttp\Client;
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
            'package_id' => $package->id,
            'account_number' => Subscription::generateAccountNumber()
        ];
        $subscription = Subscription::create($payload);

        return $this->payOrder($subscription);
    }

    protected function payOrder(Subscription $order)
    {
        // there is will be redirecting to Goldenpay
//        $price = $order->package->price*100;
//        $card_type = 'v';
//        $payment = GoldenpayUtils::pay($price, $card_type, $order->id);
//        dd($payment);
        return $this->paymentResult($order->id);
    }

    public function paymentResult($order_id)
    {
        // there is will be post id from Goldepay
        $order = Subscription::findOrFail($order_id);
        $client = new MinistraClient();
        $payload = [
                'password' => Subscription::generatePassword(),
                'full_name' => Auth::user()->name,
                'login' => $order->account_number,
                'account_number' => $order->account_number,
                'tariff_plan' => $order->package_id,
                'status' => 0
        ];

        $result = $client->postData('accounts', $payload);
        if ($result->status == 'OK') {
            $order->payment_status = 1;
            $order->status = 1;
            $order->save();
            $service = Service::create($payload);
            return True;
        }

        return False;
    }

    public function pay($order_id)
    {

    }
}
