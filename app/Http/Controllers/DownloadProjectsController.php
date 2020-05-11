<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadProjectsController extends Controller
{
    public function downloadProject($file_name){
        $file = public_path()."/storage/project_files/$file_name";
        $headers = [
            'Content-Type: application/zip',
        ];
        return response()->download($file,$file_name,$headers);
    }
}
