<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Tariff;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subscriptions = new Subscription();

        if ($request->filter) {
            $subscriptions = $this->filter($request, $subscriptions);
        }
        else {
            $subscriptions = $subscriptions->get();
        }
        $tariff = Tariff::all();
        return view('admin.subscription.index', compact('subscriptions', 'tariff'));
    }

    public function filter(Request $request, $subscriptions)
    {
//        dd($request->get('payment_status'));
        if($request->get('payment_status') != null) {

            $subscriptions = $subscriptions->where('payment_status', $request->payment_status);
        }
        if($request->get('status') != null) {

            $subscriptions = $subscriptions->where('status', $request->status);
        }
        if ($request->get('tariff_id') != null) {
            $subscriptions = $subscriptions->where('tariff_id', $request->tariff_id);
        }
        if ($request->get('device') != null) {
            $subscriptions = $subscriptions->where('device', $request->device);
        }
        if ($request->from != '' && $request->to != '') {
            $from = date('Y-m-d', strtotime(\request()->from));
            $to = date('Y-m-d', strtotime(\request()->to));
            $subscriptions = $subscriptions->whereBetween('created_at', [$from, $to]);
        }
        return $subscriptions->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {

        return view('admin.subscription.show', compact('subscription'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscription.index')
            ->with('success', 'Subscription deleted successfully');
    }
}
