<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return "Admin menu";
    }

    public function create_team(){
        
    }

    public function edit_team($id){
        return "Editing team $id";
    }

    public function destroy_team($id){
        return "Destroying team $id";
    }

    public function store_team(Request $request){

    }
}
