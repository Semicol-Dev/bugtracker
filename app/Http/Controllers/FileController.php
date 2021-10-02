<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\File;
use \App\Models\Issue;

class FileController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([
            'file' => 'required',
            'issue_id' => 'required',
        ]);
        // ulozenie suboru

        $issue = Issue::findOrFail($request->issue_id);
        if ( (auth()->user()->id == $issue->created_user_id) || auth()->user()->isAdmin() ){
            $file = request()->file('file');
            $file_name = $file->store('local', ['disk' => 'local']);
            $file = new File;
            $file->file = $file_name;
            $file->text = $request->file('file')->getClientOriginalName();
            $file->issue_id = $request->issue_id;
            $file->user_id = auth()->user()->id;
            $file->save();
        }
        return redirect()->back();

    }
    public function destroy($id){
        $file = File::findOrFail($id);
        if (auth()->user()->isAdmin() || (auth()->user()->id == $file->user_id) ){
            $pathFile = "../storage/app/" . $file->file;
            $file->delete();
            unlink($pathFile);
            return redirect()->back();
        } else {
            abort(404);
        }
    }
    public function get($id){

        $filename = File::findOrFail($id);
        $pathFile = "../storage/app/" . $filename->file;
        if (file_exists($pathFile)){
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename="'.$filename->text.'"');
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($pathFile));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Expires: 0');
            readfile($pathFile);
        } else {
            abort(404);
        }
        

    }
}
