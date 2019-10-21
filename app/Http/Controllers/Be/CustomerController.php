<?php

namespace App\Http\Controllers\Be;

use App\License;
use App\Package;
use App\Period;
use App\Service;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'device' => 'required'
        ]);
        $account_number = User::generateAccountNumber();
        $userPayload = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($account_number),
            'type' => 1,
            'account_number' => $account_number
        ];
        $user = User::create($userPayload);

        $subscriptionPayload = [
            'user_id' => $user->id,
            'package_id' => $request->input('package_id'),
            'account_number' => $user->account_number,
            'device' => $request->input('device'),
            'period' => $request->input('period'),
            'mac_address' => $request->input('mac_address') ?? $request->input('mac_address'),
            'payment_status' => 1,
            'status' => 1,
        ];
        $subscription = Subscription::create($subscriptionPayload);
        $license = License::free()->get()->first();
        $servicePayload = [
            'password' => $subscription->account_number,
            'full_name' => $user->name,
            'login' => $subscription->account_number,
            'account_number' => $subscription->account_number,
            'tariff_plan' => $subscription->package_id,
            'stb_mac' => $subscription->mac_address,
            'status' => 1,
            'license' => $license->license
        ];
        $service = Service::create($servicePayload);
        $license->status = 1;
        $license->user_id = $user->id;
        $license->save();

        return redirect()->route('be.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $service = Service::where('account_number', $user->account_number)->first();
        return view('be.customer.detailsAjax', compact('user', 'service'))->render();
    }

}
