<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Kelas;

class Mahasiswa extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mahasiswa';
    
    protected $fillable = [
        'name', 'username', 'password', 'kelas_id', 'nim'
    ];

    private $id;
    private $nim;
    private $nama;
    private $alamat;
    private $idKelas;

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNim($nim){
        $this->nim = $nim;
    }

    public function getNim(){
        return $this->nim;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function setIdKelas($idKelas){
        $this->idKelas = $idKelas;
    }

    public function getIdKelas(){
        return $this->idKelas;
    }

// *** Eloquent Relationship *** //

    public function presensi(){
        return $this->hasMany('App\Presensi');
    }

    public function registrasi(){
        return $this->hasMany('App\Registrasi');
    }

    public function nilai(){
        return $this->hasMany('App\Nilai');
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // Tested
    public function kelas(){
        return $this->belongsTo('App\Kelas');
    }
}
