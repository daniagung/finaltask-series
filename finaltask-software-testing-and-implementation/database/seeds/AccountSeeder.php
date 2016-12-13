<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Dosen;
use App\AdminAkademik;
use App\Kelas;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Mahasiswa::create(array(
            'username' => "mahasiswa",
            'name' => "Mahasiswa Dummy",
            'password' => Hash::make('qwerty123'),
        ));

        Mahasiswa::create(array(
            'username' => "dkiswanto",
            'name' => "Dede Kiswanto",
            'password' => Hash::make('qwerty123'),
            'kelas_id' => 1, # IF-38-01 id
            'nim' => "1301140171"
        ));

        Mahasiswa::create(array(
            'username' => "febby",
            'name' => "Febby Febriansyah",
            'password' => Hash::make('qwerty123'),
            'kelas_id' => 1, # IF-38-01 id
            'nim' => "1301144231"
        ));

        Mahasiswa::create(array(
            'username' => "dhiva",
            'name' => "Dhiva Azhara",
            'password' => Hash::make('qwerty123'),
            'kelas_id' => 1, # IF-38-01 id
            'nim' => "1301144001"

        ));

        Mahasiswa::create(array(
            'username' => "prima",
            'name' => "I Putu Prima Ananda",
            'password' => Hash::make('qwerty123'),
            'kelas_id' => 1, # IF-38-01 id
            'nim' => "1301144111"
        ));


        Dosen::create([
            'username' => "dosen",
            'name' => "Dosen Dummy",
            'kode' => "DMY",
            'password' => Hash::make('qwerty123'),
        ]);

        Dosen::create([
            'username' => "bambang",
            'name' => "Bambang Ari Wahyudi",
            'kode' => "BBD",
            'password' => Hash::make('qwerty123'),
        ]);

        Dosen::create([
            'username' => "suyanto",
            'name' => "Suyanto",
            'kode' => "SUO",
            'password' => Hash::make('qwerty123'),
        ]);

        Dosen::create([
            'username' => "tisa",
            'name' => "Siti Saadah",
            'kode' => "SSD",
            'password' => Hash::make('qwerty123'),
        ]);


        AdminAkademik::create([
            'username' => "admin",
            'name' => "Mimin Sejati",
            'password' => Hash::make('qwerty123'),
        ]);

    }
}
