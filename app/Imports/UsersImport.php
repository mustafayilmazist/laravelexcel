<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * 
     * ToModel den implements edilen UsersImport sınıfının dahili model metodu
     * bu metod kendisine gelen excel verisini satır satır user tablosuna ekler
     * return null
     * */
    public function model(array $row)
    {
        /**
         * eklenen kullanıcıları $_SESSION['inserteed_users'] oturumuna kaydediyoruz.
         */
        $user =  new User([
            'name'     => $row["name"],
            'email'    => $row["email"],
            'password' => Hash::make($row['password'])
        ]);
        $_SESSION['inserteed_users'][] = $user;
        return $user;
    }
}
