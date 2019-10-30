<?php

use App\Payment;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/check', function (Request $request) {

    if($request->command =='check'){
        $subscription=\App\Subscription::where('account_number',$request->account)->first();
        if($subscription) {
            $user = $subscription->user;
            $payload = [
                'subscription_id' => $subscription->id,
                'type' => 2,
                'payment_details' => $request->txn_id,
                'status' => 0,
                'user_id' => $user->id,
            ];
            $payment = new \App\Payment($payload);
            $payment->save();
            $user = User::find($payment->user_id);
            if($user){
                $check = True;
            }
            else{
                $check = False;
                $user = False;
            }
        }
        else{
            $check = False;
            $user = False;
        }
        return \Response::view('million.check',['user'=>$user,'osmp_txn_id'=>$request->txn_id, 'check' => $check])->header('Content-Type', 'xml');
    }

    if($request->command == 'pay') {
        $payment = Payment::where('payment_details', $request->txn_id)->first();
        $payment->amount = $request->sum;
        $payment->paid_at = $request->txn_date;
        $payment->status = 1;
        $payment->save();
        $subscription = Subscription::where('account_number', $request->account)->first();

        $all_amount = $subscription->amount;
        $months = $subscription->month->month;
        $per_month = $all_amount/$months;
        $count_months = intdiv(($request->sum+$subscription->remainder),$per_month);
        $remainder = fmod(($request->sum+$subscription->remainder), $per_month);
        if ($subscription->deadline) {
            if (Carbon::now()>$subscription->deadline) {
                $deadline =  Carbon::parse($payment->paid_at)->addMonth($count_months);
            }
            else {
                $deadline =  Carbon::parse($subscription->deadline)->addMonth($count_months);
            }
        }
        else {
            $deadline =  Carbon::parse($payment->paid_at)->addMonth($count_months);
        }
        $subscription->deadline = $deadline;
        $subscription->remainder = $remainder;
        $subscription->status = 1;
        $subscription->payment_status = 1;
        $subscription->save();
        return \Response::view('million.pay',['txn_id'=>$request->txn_id, 'amount'=> $request->sum])->header('Content-Type', 'xml');

    }


    if($request->command == 'status') {
        $payment = Payment::where('payment_details', $request->txn_id)->first();
        if($payment->status) {
            $status = 1;
        }
        else{
            $status = 0;
        }
        return \Response::view('million.status',['status'=>$status, 'txn_id' => $request->txn_id])->header('Content-Type', 'xml');

    }
});
