<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nama = $row['nama'];
        $nip = $row['nip'];

        $username = preg_replace('/[^A-Za-z0-9\-]/', '', $nama);
        $username = strtolower($username);
        $nipAsEmail = preg_replace('/[^0-9\-]/', '', $nip);

        $email = ($nip) ? $nipAsEmail . '@gmail.com' : $username . '@gmail.com';

        $user = User::create([
            'username' => ($nip) ? $nipAsEmail : $username,
            'email' => $email,
            'name' => $nama,
            'role' => 'guru',
            'password' => Hash::make('password'),
        ]);

        return new Guru([
            'user_id' => $user->id,
            'nama' => $nama,
            'nip' => $nip,
        ]);
    }
}
