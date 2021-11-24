<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function issues(){
        return $this->hasMany('App\Models\Issue');
    }
    
    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
    public function contain_user($id){
        foreach ($this->users as $user) {
            if ($user->id == $id){
                return true;
            }
        }
        return false;
    }

    public function all_issues(){
        $all_issues = collect();
        foreach ($this->projects as $project) {
            foreach ($project->issues as $issue) {
                $all_issues->push($issue);
            }
        }
        return $all_issues;
    }
    public function complete_del(){
        foreach ($this->projects as $project) {
            $project->complete_del();
        }
        // remove pivot
        $this->users()->sync([]);        
        // delete team
        $this->delete();
    }

}
