<?php

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

    if($request->command=='check'){
        $subscription=\App\Subscription::where('account_number',$request->account)->first();
       $user = $subscription->user;
       $payload = [
            'subscription_id'=>$subscription->id,
            'type'=>2,
            'payment_details'=> $request->txn_id,
            'status'=>0,
           'user_id'=>$user->id,
        ];
        $payment=new \App\Payment($payload);
        $payment->save();


    }
    $user  = \App\User::findOrFail(4);
    return \Response::view('million.api',['user'=>$user,'osmp_txn_id'=>$request->txn_id])->header('Content-Type', 'xml');

});
