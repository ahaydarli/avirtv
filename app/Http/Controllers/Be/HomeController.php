<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use App\License;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('be.index');
    }

    public function licenseKeys()
    {
        $licenses = License::all();
        return view('be.license-keys', compact('licenses'));
    }
}
