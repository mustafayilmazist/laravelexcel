<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public $import_token;

    public function __construct(string $import_token)
    {
        $this->import_token = $import_token;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
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
