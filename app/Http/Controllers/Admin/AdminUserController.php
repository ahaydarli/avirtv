<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::orderby('id','desc')->get();
        return view('admin.admin-be.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin-be.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'email' => 'required',
           'password' => 'required',
           'confirm' => 'required',
            'status' => 'required'
        ]);

        if ($request->password == $request->confirm) {
            $password = Hash::make($request->password);
            $user = new Admin();
            $user->password = $password;
            $user->email = $request->email;
            $user->status = $request->status;
            if ($user->save()) {
                return redirect()->route('admin-be.index')->with('success','User successfully created');
            }
            else{
                return redirect()->back()->with('error', 'Error');
            }
        }
        else {
            return redirect()->back()->withInput()->with('error', 'Passwords don"t match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Admin::find($id);
        return view('admin.admin-be.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email'=>'required|email',

        ]);


        $admin=Admin::find($id);

        $admin->email=$request->input('email');

        $admin->status=$request->type;
        if(trim($request->password)!=''){
            $admin->password=Hash::make($request->password);

        }
        $admin->save();
        return redirect()->route('admin-be.index')->with('success', 'Admin successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::find($id);
        if ($user->status == Admin::BE) {
            $user->delete();
            return redirect()->route('admin-be.index')->with('success','User successfully deleted');
        }
        else {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
