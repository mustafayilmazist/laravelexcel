<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{


    public $inserted_users_id;
    /**
     * 
     * ToModel den implements edilen UsersImport sınıfının dahili model metodu
     * bu metod kendisine gelen excel verisini satır satır user tablosuna ekler
     * eklenen user id bilgisini $this->inserted_users_id[] özelliğine ekler
     * return $user
     * */
    public function model(array $row)
    {
        /**
         * eklenen kullanıcıları inserted_users_id[] özelliğine kaydediyoruz.
         */
        $user =  new User([
            'name'     => $row["name"],
            'email'    => $row["email"] . uniqid(),
            'password' => Hash::make($row['password'])
        ]);
        $this->inserted_users_id[] = $user;
        return $user;
    }

    /**
     * excel yüklemesi yapılan kullanıcıların hepsinin idlerini döndüren metod
     * return int $id
     */
    public function insertedUsersId()
    {
        /**
         * inserted_users_id[] özelliğindeki kullanıcıların id bilgilerini döndürüyoruz.
         */
        $id = [];
        array_filter($this->inserted_users_id, function ($user) use (&$id) {
            $id[] = $user->id;
        });
        return $id;
    }
}
