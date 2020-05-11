<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadCoursesController extends Controller
{
    public function downloadVideoMaterial($file_name){
        $file = public_path()."/storage/video_material_files/$file_name";
        $headers = [
            'Content-Type: application/zip',

        ];
        return response()->download($file,$file_name,$headers);
    }
}
