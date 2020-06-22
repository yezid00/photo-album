<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class DownloadController extends Controller
{
    public function download($filename){
    	$file_path = public_path('storage/gallery/'.$filename);
    	//return response()->download($file_path);
    	return Storage::download($file_path);
    }
}
