<?php

use App\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mataKuliah = new MataKuliah();
        $mataKuliah->dosen_id = 2;
        $mataKuliah->kelas_id = 1;
        $mataKuliah->sks = 3;
        $mataKuliah->kode = "PBO";
        $mataKuliah->nama = "Pemrograman Berorientasi Objek";
        $mataKuliah->save();

        $mataKuliah = new MataKuliah();
        $mataKuliah->dosen_id = 3;
        $mataKuliah->kelas_id = 1;
        $mataKuliah->sks = 3;
        $mataKuliah->kode = "AI";
        $mataKuliah->nama = "Kecerdasan Buatan";
        $mataKuliah->save();

        $mataKuliah = new MataKuliah();
        $mataKuliah->dosen_id = 4;
        $mataKuliah->kelas_id = 1;
        $mataKuliah->sks = 3;
        $mataKuliah->kode = "IMPAL";
        $mataKuliah->nama = "Implementasi dan Pengujian Perangkat Lunak";
        $mataKuliah->save();
        
    }
}
