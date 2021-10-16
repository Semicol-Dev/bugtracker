<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request, $id){
        if ($id == auth()->user()->id || auth()->user()->isAdmin()){
            $user = User::findOrFail($id);
            $request->validate([
                'pass1' => 'required',
                'pass2' => 'required',
            ]);
            if ($request->pass2 == $request->pass1){
                $user->password = Hash::make($request->pass1);
                $user->save();
                return redirect()->back();
            } else {
                return redirect()->back()->withErrors(['passwd' => 'Passwords are not same']);   
            }
        } else {
            return abort(403);
        }
    }
    public function update_avatar(Request $request, $id){
        if ($id == auth()->user()->id || auth()->user()->isAdmin()){
            $user = User::findOrFail($id);
            $request->validate([
                'image' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $user->picture = "data:image/".$request->file('image')->extension().";base64," . base64_encode(file_get_contents($request->file('image')));
            $user->save();
            return redirect()->back();
        } else {
            return abort(403);
        }   
    }
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
