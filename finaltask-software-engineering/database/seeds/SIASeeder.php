<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Dosen;
use App\AdminAkademik;
use App\Kelas;

class SIASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhsDede = Mahasiswa::create(array(
            'username' => "kinto_d2",
            'name' => "Dede Kiswanto",
            'password' => bcrypt("123"),
        ));

        $mhsWahid = Mahasiswa::create(array(
            'username' => "wahid",
            'name' => "Wahid M",
            'password' => bcrypt("123"),
        ));

        $mhsSyam = Mahasiswa::create(array(
            'username' => "syam",
            'name' => "Syam Maulana",
            'password' => bcrypt("123"),
        ));

        Dosen::create([
            'username' => "dosen",
            'name' => "Dosen Dummy",
            'password' => bcrypt("123"),
        ]);

        AdminAkademik::create([
            'username' => "admin",
            'name' => "Mimin Sejati",
            'password' => bcrypt("123"),
        ]);

        $kelas1 = Kelas::create(array(
            'kelas' => "IF-38-01"
        ));

        $kelas2 = Kelas::create(array(
            'kelas' => "IF-38-02s"
        ));
    }
}
