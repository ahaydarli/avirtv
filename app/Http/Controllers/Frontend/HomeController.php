<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Article;
use App\Contact;
use App\Content;
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
        $packages = Package::limit(4)->get();
        $articles=Article::orderBy('id','desc')->limit(3)->get();
        $contents = Content::orderby('id','asc')->limit(6)->get();
        return view('index', compact('packages','contents', 'articles'));
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
        $packages = Package::all();
        $faqs = Faq::limit(4)->get();
        return view('pricing', compact('packages', 'faqs'));
    }
}
