<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{



    /**#
     * added dropzone js fileupload
     *
     *    **/
    public function dropzoneFileUpload()
    {

        return view('dropzoneFileUpload');

    }


    public function dropzoneFileUploadPost(Request $request)
    {


        $imageName = time() . '.' . $request->file->getClientOriginalExtension();

        $request->file->move(public_path('images/dropzones'), $imageName);
       // $request->file('dropzone')->store('dropzones');
        return response()->json(['success' => $imageName]);

    }
}
