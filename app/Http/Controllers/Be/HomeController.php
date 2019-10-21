<?php

namespace App\Http\Controllers\Be;

use App\Admin;
use App\Http\Controllers\Controller;
use App\License;
<<<<<<< HEAD
=======
use App\User;
>>>>>>> 40d742a38c48faf71506b963134e809f7e598aa3
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('type', 1)->limit(10)->get();
        return view('be.index', compact('users'));
    }

    public function licenseKeys()
    {
        $licenses = License::all();
        return view('be.license-keys', compact('licenses'));
    }


    public function register()
    {
       if (Auth::guard('admin'))  {
           return redirect()->route('be.home');
       }
       else {
           return view('be.register');

       }



    }

    public function registerUser(Request $request)
    {
        $this->validate($request, [
           'email' => 'required',
           'password' => 'required',
           'confirm' => 'required',
        ]);
        $user = new Admin();
        if ($request->password == $request->confirm){
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            if ($user->save()) {
                return redirect()->route('admin.login')->with('success', 'User Successfully created');
            }
            else {
                return redirect()->back()->withInput()->with('error', "Something went wrong");

            }
        }
        else {
            return redirect()->back()->withInput()->with('error', "Passwords don't match");
        }
    }

    public function licenseKeys()
    {
        $licenses = License::all();
        return view('be.license-keys', compact('licenses'));
    }
}
