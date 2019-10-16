<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Auth;
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
}
