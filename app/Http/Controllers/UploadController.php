<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;

class UploadController extends Controller
{
    function index()
    {
        return view('upload');
    }

    function insert(Request $request)
    {
        $upload = "N";

        if($request->hasFile('filename'))
        {
            $destination = "upload";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
            $upload = "Y";
        }

        if($upload=="Y"){

            $upload = new Upload;
            $upload->ket = $request->ket;
            $upload->filename = $filename->getClientOriginalName();
            $upload->save();

        }

        return redirect('/uploadfile');
    }

    public function show($id)
    {
        $dl = Upload::find($id);
        return 
    }
}
