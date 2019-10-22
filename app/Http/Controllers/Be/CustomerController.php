<?php

namespace App\Http\Controllers\Be;

use App\Components\GoldenpayUtils;
use App\License;
use App\MinistraClient;
use App\Package;
use App\Payment;
use App\Period;
use App\Service;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 1)->get();
        return view('be.customer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::active()->get();
        $periods = Period::all();
        return view('be.customer.create', compact('packages','periods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'device' => 'required',
            'phone' => 'required',
            'package_id' => 'required',
            'period' => 'required'
        ]);
        Db::beginTransaction();
        try {
            $account_number = User::generateAccountNumber();
            $userPayload = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($account_number),
                'phone' => $request->input('phone'),
                'account_number' => $account_number,
                'type' => 1,
            ];
            $user = User::create($userPayload);
        }
        catch (\Exception $e){
            DB::rollBack();

            return redirect()->route('be.customers.create')->with('error', $e->getMessage());
        }
        try {
            $package = Package::findOrFail($request->input('package_id'));
            $period = Period::findorFail($request->input('period'));
            $amount = GoldenpayUtils::calculatePrice($package, $period);

            $subscriptionPayload = [
                'user_id' => $user->id,
                'package_id' => $request->input('package_id'),
                'account_number' => $account_number,
                'device' => $request->input('device'),
                'period' => $request->input('period'),
                'mac_address' => $request->input('mac_address') ?? $request->input('mac_address'),
                'amount' => $amount,
                'payment_status' => 1,
                'status' => 1,
            ];
            $subscription = Subscription::create($subscriptionPayload);
        }
        catch (\Exception $e){
            DB::rollBack();

            return redirect()->route('be.customers.create')->with('error', $e->getMessage());
        }
        try{
            if ($subscription->device == 0) {
                $license = License::free()->get()->first();
                $license->status = 1;
                $license->user_id = $user->id;
                $license->save();
            }
            $servicePayload = [
                'password' => $subscription->account_number,
                'full_name' => $user->name,
                'user_id' => $user->id,
                'login' => $subscription->account_number,
                'account_number' => $subscription->account_number,
                'tariff_plan' => $package->ministra_id,
                'stb_mac' => $subscription->mac_address,
                'status' => 1,
                'license' => $subscription->device == 0 ? $license->license : '',
            ];
//            $client = new MinistraClient();
//            $result = $client->postData('accounts', $servicePayload);
            $paymentPayload = [
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'type' => Payment::BE,
                'period_id' => $period->id,
                'amount' => $amount,
                'status' => 1,
                'paid_at' => Carbon::now()
            ];
            $payment = Payment::create($paymentPayload);
            $service = Service::create($servicePayload);
        }
        catch (\Exception $e){
            DB::rollBack();

            return redirect()->route('be.customers.create')->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect()->route('be.customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        $service = Service::where('user_id', $user->id)->first();
        $subscription = Subscription::where('user_id', $user->id)->first();
        return view('be.customer.show', compact('user', 'service', 'subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * Show details at modal window
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $user=User::findOrFail($request->id);
        $service = Service::where('user_id', $user->id)->first();
        $subscription = Subscription::where('user_id', $user->id)->first();
        return view('be.customer.detailsAjax', compact('user', 'service', 'subscription'))->render();
    }

}
