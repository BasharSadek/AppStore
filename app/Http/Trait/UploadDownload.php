<?php

namespace App\Http\Trait;

use \Illuminate\Support\Str;

trait UploadDownload
{
    public function uploadImage($file)
    {

        //  $file = $request->file('selfie');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return 'images/' . $filename;
       // $user->selfie = strip_tags('images/' . $filename);


        // $filename = date('YmdHi') . $file->getClientOriginalName();
        // $file->move(public_path('images'), $filename);
        // $path = 'images/' . $filename;
        // return $path;
    }
    public function uploadFile($file)
    {
        $filename = date('YmdHi') . $file->getClientOriginalExtention();
        $file->move(public_path('public/files'), $filename);
        $path = 'files/' . $filename;
        return $path;
    }
}
