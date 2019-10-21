<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use phpDocumentor\Reflection\Types\Void_;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('frontend.profile.index', compact('user'));
    }

    public function subscribe($package_id)
    {

    }

    public function changepass(Request $request)
    {
        $this->validate($request, [
            'current' => 'required',
            'password' => 'required',
            'confirm' => 'required',
        ]);
        $user = Auth::user();
        if (password_verify($request->current, $user->password)) {
            if($request->password == $request->confirm) {
                $password = Hash::make($request->password);
                $user->password = $password;
                if ($user->save()) {
                    return redirect()->route('profile')->with('success', 'Password successfully changed');
                }
                else {
                    return redirect()->back()->withInput()->with('error', 'Something went wrong');
                }
            }
            else{
                return redirect()->back()->withInput()->with('error', 'Password don\'t match');
            }
        }
        else {
            return redirect()->back()->withInput()->with('error', 'Password is not correct');
        }
    }

    public function serviceDetail(Request $request)
    {
        $subscription = Subscription::findOrFail($request->id);
        return view('frontend.profile.detailsAjax', compact('subscription'))->render();
    }
}
