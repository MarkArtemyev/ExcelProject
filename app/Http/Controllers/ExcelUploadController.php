<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ParseExcelFile;

class ExcelUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function showUploadForm()
    {
        return view('upload_form');
    }

    public function upload(Request $request)
    {
        $file = $request->file('excel_file');

        if ($file) {
            $path = $file->storeAs('uploads', 'import.xlsx');
            ParseExcelFile::dispatch($path);
            return redirect()->back()->with('success', 'File uploaded and parsing started.');
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }
}
