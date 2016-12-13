<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';

    private $id;
    private $nama_kelas;
    private $jurusan;
    private $fakultas;


    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setNamaKelas($nama_kelas){
    	$this->nama_kelas = $nama_kelas;
    }

    public function getNamaKelas(){
    	return $this->nama_kelas;
    }

    public function setJurusan($jurusan){
    	$this->jurusan = $jurusan;
    }

    public function getJurusan(){
    	return $this->jurusan;
    }

    public function setFakultas($fakultas){
    	$this->fakultas = $fakultas;
    }

    public function getFakultas(){
    	return $this->fakultas;
    }

// *** Eloquent Relationship *** //
    public function mahasiswa(){
        return $this->hasMany('App\Mahasiswa');
    }

    public function jadwal(){
        return $this->hasMany('App\Jadwal');
    }

    public function mataKuliah(){
        return $this->hasMany('App\MataKuliah');
    }
}
