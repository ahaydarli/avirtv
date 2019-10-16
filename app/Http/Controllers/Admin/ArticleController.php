<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index')->with([
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.article.create')->with([
            'locales'=>$locales,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|array|min:1',
            'text' => 'required|array|min:1',
        ]);
        Article::create($request->all());
        return redirect()->route('article.index')
            ->with('success', 'Article added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $locales = Language::all();
        return view('admin.article.edit', compact('article', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',

        ]);
        if($request->is_active){
            $article->is_active =1;
        }
        else{
            $article->is_active =0;
        }
        $article->text = $request->text;
        $article->title = $request->title;
        $article->save();
//        $faq->update($request->all());

        return redirect()->route('article.index')
            ->with('success', 'Article successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')
            ->with('success','Article deleted successfully');
    }
}
