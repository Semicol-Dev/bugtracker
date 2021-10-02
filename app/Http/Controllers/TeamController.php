<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Team;
use \App\Models\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin() || auth()->user()->isDev()){
            if (auth()->user()->isAdmin()){
                $teams = Team::all();
            } else {
                $teams = auth()->user()->team;
            }
            return view('dashboard.team.index')->with('teams',$teams);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()){
            $users = User::all();
            return view('dashboard.team.create')->with('users',$users);
        } else {
            return redirect('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->isAdmin()){
            $validated = $request->validate([
                'name' => 'required',
            ]);
            $team = new Team;
            $team->name = $request->name;
            $team->save();
            foreach ($request->members as $member) {    
                $team->users()->attach($member);
            }
            return redirect("/team/$team->id");
        } else {
            return redirect('/');
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
        if ( auth()->user()->isOnTeam($id) || auth()->user()->isAdmin() ){
            $team = Team::findOrFail($id);
            return view('dashboard.team.show')->with('team',$team);
        }
        
        return redirect('/team');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->isAdmin()){
            $team = Team::findOrFail($id);
            $users = User::all();
            return view('dashboard.team.edit')->with('team',$team)->with('users',$users);
        } else {
            return redirect('/');
        }
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
        if (auth()->user()->isAdmin()){
            $validated = $request->validate([
                'name' => 'required',
            ]);
            $team = Team::findOrFail($id);
            $team->name = $request->name;
            $team->update();
            $team->users()->detach();
            if ($request->members){
                foreach ($request->members as $member) {    
                    $team->users()->attach($member);
                }
            }
            return redirect("/team/$id");
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->isAdmin()){
            
            $team = Team::findOrFail($id);
            $team->users()->detach();
            $team->delete();
            return redirect('/team');
        }
    }
}
