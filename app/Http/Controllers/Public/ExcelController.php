<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\User;

class ExcelController extends Controller
{
    /**
     * input file dan gelen excel dosyasını db ye içe aktaran metod
     * @Request $request
     * */
    function importStore(Request $request){
        /**
         * benzersiz bir token oluşturup Excel::import sınıfına bu tokeni ve file değişkenini gönderiyoruz.*/
        $import_token=uniqid();
        $import = Excel::import(new UsersImport($import_token), $request->file);
        $inserted_users = User::where('import_token',$import_token)->get();
        dd($inserted_users);
        return redirect()->back();
    }
}
