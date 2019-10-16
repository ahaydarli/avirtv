<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Contact;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Language;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $packages = Package::all();
        return view('index', compact('packages'));
    }

    public function setLocale(Request $request)
    {
        Session::put(['locale' => $request->get('locale')]);
        App::setLocale(Session::get('locale'));
        return redirect()->back();
    }

    public function fag()
    {
        $faqs = Faq::all();
        return view('fag')->with([
            'faqs' => $faqs,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        Contact::create($request->all());
        return redirect()->back();
    }

    public function about()
    {
        $about = About::find(1);
        if (!isset($about)) {
            return view('about');
        }
        else{
            return view('about')->with([
                'about'=> $about,
            ]);
        }

    }

    public function pricing()
    {
        return view('pricing')->with([

        ]);
    }
}
