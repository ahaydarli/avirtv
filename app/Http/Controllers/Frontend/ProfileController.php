<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Void_;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function subscribe($package_id)
    {

    }
}
