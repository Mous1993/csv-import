<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ArticlesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function import() 
    {   
        Excel::import(new ArticlesImport, storage_path('articles.csv'));
        return redirect('/')->with('success', 'Done!');
    }
}
