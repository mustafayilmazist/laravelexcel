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
    function importStore(Request $request)
    {
        /**
         * işlem sonrası $_SESSION['inserteed_users'] oturumundaki kayıt edilen excel kullanıcı bilgilerini alıyoruz.*/
        $import = Excel::import(new UsersImport, $request->file);
        dd($_SESSION['inserteed_users']);
        return redirect()->back();
    }
}
