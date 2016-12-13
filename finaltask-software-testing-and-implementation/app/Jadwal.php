<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $table = "jadwal";

    private $id;
    private $idMatkul;
    private $ruang;
    private $waktu;

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function getIdMatkul(){
    	//
    }

    public function setRuang($ruang){
    	$this->ruang = $ruang;
    }

    public function getRuang(){
    	return $this->ruang;
    }

    public function setWaktu($waktu){
    	$this->waktu = $waktu;
    }

    public function getWaktu(){
    	return $this->waktu;
    }

// *** Eloquent Relationship *** //
    public function mataKuliah(){
        return $this->belongsTo('App\MataKuliah', "matakuliah_id");
    }

}
