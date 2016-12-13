<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Presensi extends Model
{
    //
    protected $table = "presensi";

    private $id;
    private $idMhs;
    private $idMatkul;
    private $kehadiran;
    private $tanggal;

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setKehadiran($kehadiran){
    	$this->kehadiran = $kehadiran;
    }

    public function getKehadiran(){
    	return $this->kehadiran;
    }

    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
    }

    public function getTanggal(){
        return $this->tanggal;
    }

    public function getIdMhs(){
    	return $this->idMhs;
    }

    public function getIdMatkul(){
    	return $this->idMatkul;
    }

    public function addPresensi(Request $request){
        $presensi = new Presensi();
        $presensi->setId($request->id);
        $presensi->setKehadiran($request->kehadiran);
        $presensi->save();
    }

    public function getPresensi(){
        return $this->getKehadiran();
    }

    public function changePresensi($presensi){
        $this->kehadiran = $presensi;
    }

    public function deletePresensi(Presensi $presensi){
        $presensi->delete();
    }

// *** Eloquent Relationship *** //
    public function mataKuliah(){
        return $this->belongsTo('App\MataKuliah', 'matakuliah_id');
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa');
    }
}
