<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Project;
use App\Models\Team;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->isAdmin()){
            $projects = Project::all();
        } else {
            $projects = auth()->user()->all_projects();
            
        }
        return view('dashboard.project.index')->with('projects',$projects);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()){
            $teams = Team::all();
            return view('dashboard.project.create')->with('teams',$teams);
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
                'team' => 'required',
            ]);
            $project = new Project;
            $project->name = $request->name;
            $project->team_id = $request->team;
            $project->save();
            return redirect("/project/$project->id");
        } else {
            return redirect('/project');
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
        $project = Project::findOrFail($id);
        if ( auth()->user()->isOnTeam($project->team_id) || auth()->user()->isAdmin() ){
           return view('dashboard.project.show')->with('project',$project);
        } else {
            return redirect('/project');
        }
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
            $project = Project::findOrFail($id);
            $teams = Team::all();
            return view('dashboard.project.edit')->with('project',$project)->with('teams',$teams);
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
                'team' => 'required',
            ]);
            $project = Project::findOrFail($id);
            $project->name = $request->name;
            $project->team_id = $request->team;
            $project->update();
            return redirect("/project/$id");
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
            $project = Project::findOrFail($id);
            $project->delete();
            return redirect('/project');
        } else {
            return redirect("/project/$id");
        }
    }
}
