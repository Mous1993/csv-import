<?php

namespace App\Http\Controllers;

use App\Imports\ArticlesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Validators\ValidationException;

class ArticlesController extends Controller
{
    public function import() 
    {   
        $fileName = "articles.csv";
        try {   
            if(File::exists(storage_path($fileName))){
                return Excel::import(new ArticlesImport, storage_path($fileName));
            }else{
                echo "File Not Found";
                exit;
            }
        } catch (ValidationException $e) {
            $failures = $e->failures();
        }
    }
}
