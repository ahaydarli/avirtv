<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contact;
use App\Http\Controllers\Controller;
use App\License;
use App\Payment;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::where('status',0)->get();
        $daily_users = User::where('created_at','>',date('Y-m-d').' 00:00:00')->get();
        $monthly_users = User::where('created_at','>',date('Y-m').'-1 00:00:00')->get();
        $daily_subscriptions = Subscription::where('created_at','>',date('Y-m-d').' 00:00:00')->get();
        $monthly_subscriptions = Subscription::where('created_at','>',date('Y-m').'-1 00:00:00')->get();
        $daily_be_users = Admin::where('created_at','>',date('Y-m-d').' 00:00:00')->where('status',1)->get();
        $monthly_be_users = Admin::where('created_at','>',date('Y-m').'-1 00:00:00')->where('status',1)->get();
        $be_payments = Payment::where('type',1)->sum('amount');

        return view('admin.admin-home', compact('licenses','daily_users','monthly_users',
            'daily_subscriptions', 'monthly_subscriptions', 'daily_be_users','monthly_be_users','be_payments'
        ));
    }

    public function readAllMessages()
    {
        DB::table('contact')
            ->where('read', 0)
            ->update(['read' => 1]);


        return true;
    }
}
