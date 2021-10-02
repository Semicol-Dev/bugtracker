<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Issue;
use \App\Models\Project;
use \App\Models\Comment;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()){
            $issues = Issue::all();
        } else {
            $issues = auth()->user()->all_issues();
        }
        return view('dashboard.issue.index')->with('issues',$issues);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('dashboard.issue.create')->with('projects',$projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project' => 'required',
            'type' => 'required',
        ]);
        $issue = new Issue;
        $issue->title = $request->title;
        $issue->description = $request->description;
        $issue->project_id = $request->project;
        $issue->type = $request->type;
        $issue->status = 0;
        $issue->created_user_id = auth()->user()->id;
        $issue->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        return view('dashboard.issue.show')->with('issue',$issue);
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
    public function update(Request $request, $id)
    {
        //
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
    public function note($id,Request $request){
        $comment = new Comment;
        $comment->text = $request->comment;
        $comment->issue_id = $id;
        $comment->user_id = auth()->user()->id;
        if ($request->hidden_comment == "on"){
            $comment->internal = true;
        } else {
            $comment->internal = false;
        }
        $comment->save();
        return redirect("/issue/$id");
    }



    public function note_delete($id){
        $comment = Comment::FindOrFail($id);
        if (auth()->user()->id == $comment->user_id || auth()->user()->isAdmin()){
            $issue_id = $comment->issue_id;
            $comment->delete();
            return redirect("/issue/$issue_id");
        } else {
            return redirect('/');
        }
    }
}
