<?php

namespace App\Http\Controllers\Admin;

use App\License;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::orderby('id','desc')->get();
        return view('admin.license.index', compact('licenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.license.create', compact('users'));
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
            'license' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);
        License::create($request->all());
        return redirect()->route('license.index')
            ->with('success', 'License added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        return view('admin.license.show',compact('license'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(License $license)
    {
        $users = User::all();
        return view('admin.license.edit', compact('license', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        $request->validate([
            'license' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);
        if($request->is_active){
            $license->is_active =1;
        }
        else{
            $license->is_active =0;
        }
        $license->status = $request->status;
        $license->user_id = $request->user_id;
        $license->license = $request->license;
        $license->save();
        return redirect()->route('license.index')
            ->with('success', 'License successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license)
    {
        $license->delete();
        return redirect()->route('license.index')
            ->with('success','License deleted successfully');
    }
}
