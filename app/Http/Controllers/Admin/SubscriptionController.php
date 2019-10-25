<?php

namespace App\Http\Controllers\Admin;

use App\Period;
use App\Subscription;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods=Period::all();
        if (collect(request()->all())->filter()->count() >= 2) {
            $subscriptions = $this->filter(new Subscription());
        } else {
            $subscriptions = Subscription::all();
        }
        return view('admin.subscription.index', compact('subscriptions','periods'));
    }


    public function filter($subscription)
    {

        if (request()->payment_status != 3 && request()->payment_status != '') {
            $subscription = $subscription->where('payment_status', '=', (request()->input('payment_status') - 1));
        }

        if (request()->status != 3 && request()->status != '') {
            $subscription = $subscription->where('status', '=', (request()->input('status') - 1));
        }
        if (request()->from != '' && request()->to != '') {

            $from = date('Y-m-d', strtotime(\request()->from));
            $to = date('Y-m-d', strtotime(\request()->to));
            $subscription = $subscription->where('created_at', '>', $from)->where('created_at', '<', $to);
        }


        return $subscription->get();
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
