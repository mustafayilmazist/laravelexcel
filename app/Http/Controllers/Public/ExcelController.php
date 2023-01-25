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
         * işlem sonrası $new classındaki insertedUsersId metodu ile  kayıt edilen excel kullanıcı id bilgilerini alıyoruz.*/
        $new = new UsersImport();
        $import = Excel::import($new, $request->file);
        dd($new->insertedUsersId());
        return redirect()->back();
    }
}
