<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    function importStore(Request $request){
        $import_token=uniqid();
        $import = Excel::import(new UsersImport($import_token), $request->file);
        return redirect()->back();
    }
}
