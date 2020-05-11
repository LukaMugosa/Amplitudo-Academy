<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadHomeworkController extends Controller
{
    public function downloadHomework($file_name){
        $file = public_path()."/storage/homework_files/$file_name";
        $headers = [
            'Content-Type: application/zip',
        ];
        return response()->download($file,$file_name,$headers);
    }
}
