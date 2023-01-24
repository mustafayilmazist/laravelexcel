<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public $import_token;

    /**
     * __construct metodunda controllerdan gelen parametreti alıp sınıf özelliğine atıyoruz.
     * @string  $import_token
     * */
    public function __construct(string $import_token)
    {
        $this->import_token = $import_token;
    }

    /**
     * 
     * ToModel den implements edilen UsersImport sınıfının dahili model metodu
     * bu metod kendisine gelen excel verisini satır satır user tablosuna ekler
     * return null
     * */
    public function model(array $row)
    {
        $user =  new User([
            'name'     => $row["name"],
            'email'    => $row["email"],
            'password' => Hash::make($row['password']),
            'import_token' =>  $this->import_token,

        ]);
        return $user;
    }
}
