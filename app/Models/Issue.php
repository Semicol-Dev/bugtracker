<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function project(){
        return $this->belongsTo('\App\Models\Project');
    }

    function count_total(){
        $count = 0;
        return $count;
    }

    function assigned(){
        return $this->hasOne('\App\Models\User','id', 'assigned_user_id');
    }
    function created_by(){
        return $this->hasOne('\App\Models\User','id', 'created_user_id');
    }
    function comments(){
        return $this->hasMany('\App\Models\Comment');
    }
    function files(){
        return $this->hasMany('\App\Models\File');
    }
    use HasFactory;
}
