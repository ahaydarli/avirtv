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
        $subscriptions = $subscriptions->get();
        $tariff = Tariff::all();
        return view('admin.subscription.index', compact('subscriptions', 'tariff'));
    }

    public function filter(Request $request, $subscriptions)
    {
        if (isset($request->to) and isset($request->from)) {
            $from = date('Y-m-d', strtotime($request->from));
            $to = date('Y-m-d', strtotime($request->to));
            $subscriptions = $subscriptions->filterByDate($from, $to);
        }
        if (isset($request->payment_status)) {
            $subscriptions = $subscriptions->filterByColumn('payment_status', $request->payment_status);
        }
        if (isset($request->status)) {
            $subscriptions = $subscriptions->filterByColumn('status', $request->status);
        }
        if (isset($request->tariff_id)) {
            $subscriptions = $subscriptions->filterByColumn('tariff_id', $request->tariff_id);
        }
        if (isset($request->device)) {
            $subscriptions = $subscriptions->filterByColumn('device', $request->device);
        }
        return $subscriptions;
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

