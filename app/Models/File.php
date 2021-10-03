<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }
    public function complete_del(){
        $pathFile = "../storage/app/" . $this->file;
        $this->delete();
        unlink($pathFile);
        return true;
    }
}
