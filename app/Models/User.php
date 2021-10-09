<?php

namespace App\Models;

use ArrayObject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function team(){
        return $this->belongsToMany('App\Models\Team');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin(){
        return $this->role->name == "Administrator";
    }

    public function isDev(){
        return $this->role->name == "Developer";
    }

    public function issues(){
        return $this->hasMany('App\Models\Issue');
    }
    public function isOnTeam($id){
        foreach ($this->team as $team) {
            if ($team->id == $id){
                return true;
            }
        }
        return false;
    }
    public function all_projects(){
        $all_projects = array();
        foreach ($this->team as $team) {
            foreach ($team->projects as $project) {
                array_push($all_projects,$project);
            }
        }
        return $all_projects;
    }

    public function all_issues(){
        $all_issues = array();
        foreach ($this->all_projects() as $project) {
            foreach ($project->issues as $issue) {
                array_push($all_issues,$issue);
            }
        }
        return $all_issues;
    }
    public function my_issues(){
        $my_issues = array();
        foreach ($this->all_projects() as $project) {
            foreach ($project->issues as $issue) {
                if ($issue->assigned_user_id == $this->id && $issue->status != 1)
                array_push($my_issues,$issue);
            }
        }
        return $my_issues;
    }

    public function type_issue($type){
        $my_issues = collect();
        foreach ($this->all_projects() as $project) {
            foreach ($project->issues as $issue) {
                if ($issue->assigned_user_id == $this->id && $issue->type == $type && $issue->status != 1)
                $my_issues->push($issue);
            }
        }
        return $my_issues;
    }
    



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
