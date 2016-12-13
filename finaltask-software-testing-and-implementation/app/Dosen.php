<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class Dosen extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "dosen";


    protected $fillable = [
        'name', 'username', 'password', 'kode'
    ];

    private $id;
    private $nama;
    private $nik;
    private $alamat;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setNik($nik){
        $this->nik = $nik;
    }

    public function getNik(){
        return $this->nik;
    }

    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function addDosen(Request $request){
        $dosen = new Dosen();
        $dosen->setNama($request->nama);
        $dosen->setNik($request->nik);
        $dosen->setAlamat($request->alamat);
        $dosen->save();

    }

    public function mataKuliah(){
        return $this->hasMany('App\MataKuliah');
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
