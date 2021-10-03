<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function team(){
        return $this->belongsTo('App\Models\Team');
    }
    public function issues(){
        return $this->hasMany('App\Models\Issue');
    }

    public function complete_del(){
        foreach ($this->issues as $issue) {
            $issue->complete_del();
        }
        $this->delete();
        return true;
    }
}
