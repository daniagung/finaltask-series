<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class AdminAkademik extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin_akademik';

    protected $fillable = [
        'name', 'username', 'password',
    ];

    private $id;
    private $kodeAdmin;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setKodeAdmin($kodeAdmin){
        $this->kodeAdmin = $kodeAdmin;
    }

    public function getKodeAdmin(){
        return $this->kodeAdmin;
    }

    // *** Manage Mahasiswa *** //
    public function createMahasiswa(Request $request){
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setId($request->id);
        $mahasiswa->setNim($request->nim);
        $mahasiswa->setNama($request->nama);
        $mahasiswa->setAlamat($request->alamat);
        $mahasiswa->setIdKelas($request->idKelas);
        $mahasiswa->save();
    }

    public function updateMahasiswa(Request $request){
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->setNim($request->nim);
        $mahasiswa->setNama($request->nama);
        $mahasiswa->setAlamat($request->alamat);
        $mahasiswa->setIdKelas($request->idKelas);
        $mahasiswa->save();
    }

    public function deleteMahasiwa(Request $request){
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->delete();
    }

    // *** Manage Dosen *** //
    public function createDosen(Request $request){
        $dosen = new Dosen();
        $dosen->setId($request->id);
        $dosen->setNama($request->nama);
        $dosen->setNik($request->nik);
        $dosen->setAlamat($request->alamat);
        $dosen->save();
    }

    public function updateDosen(Request $request){
        $dosen = Dosen::find($request->id);
        $dosen->setNama($request->nama);
        $dosen->setNik($request->nik);
        $dosen->setAlamat($request->alamat);
        $dosen->save();
    }

    public function deleteDosen(Request $request){
        $dosen = Dosen::find($request->id);
        $dosen->delete();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
