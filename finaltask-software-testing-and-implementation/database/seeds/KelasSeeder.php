<?php

use Illuminate\Database\Seeder;
use App\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kelas = new Kelas();
        $kelas->kode = "IF-38-01";
        $kelas->jurusan = "Teknik Informatika";
        $kelas->fakultas = "Informatika";
        $kelas->save();

        $kelas = new Kelas();
        $kelas->kode = "IF-38-02";
        $kelas->jurusan = "Teknik Informatika";
        $kelas->fakultas = "Informatika";
        $kelas->save();

        $kelas = new Kelas();
        $kelas->kode = "IF-38-03";
        $kelas->jurusan = "Teknik Informatika";
        $kelas->fakultas = "Informatika";
        $kelas->save();

        $kelas = new Kelas();
        $kelas->kode = "SI-38-01";
        $kelas->jurusan = "Sistem Informasi";
        $kelas->fakultas = "Rekayasa Industri";
        $kelas->save();

        $kelas = new Kelas();
        $kelas->kode = "TT-38-01";
        $kelas->jurusan = "Teknik Telekomunikasi";
        $kelas->fakultas = "Teknik Elektro";
        $kelas->save();

    }
}
