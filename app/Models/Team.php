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
}
