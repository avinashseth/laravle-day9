<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function postUploadFile(Request $request) {
        
        $request->validate([
        
            'myfile' => 'required|mimes:pdf', // size:1024 in kilobyte
        
        ]);
        
        $fileName = time() . '.' . $request->myfile->extension();
        
        // $request->myfile->move(public_path('uploads'), $fileName); // public/uploads

        $request->myfile->storeAs('files', $fileName, 's3');
        
        $request->session()->flash('file_upload_feedback', 'File Uploaded Successfully');
        
        return redirect()->back();
    }
}
