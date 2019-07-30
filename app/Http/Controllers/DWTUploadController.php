<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class DWTUploadController extends Controller
{
    function index()
    {
     return view('dwt_upload');
    }

    function action(Request $request)
    {
     $validation = Validator::make($request->all(), [
      'RemoteFile' => 'required|image|mimes:png,pdf,jpeg,jpg,gif'
     ]);
     if($validation->passes())
     {
      $image = $request->file('RemoteFile');
      $image->move(public_path('images'), $image->getClientOriginalName());
      return response()->json([
       'message'   => 'Successfully uploaded.'
      ]);
     }
     else
     {
      return response()->json([
       'message'   => $validation->errors()->all()
      ]);
     }
    }
}
