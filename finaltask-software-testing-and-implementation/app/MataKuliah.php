<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MataKuliah extends Model
{
    //
    protected $table = "matakuliah";

    private $id;
    private $kode;
    private $nama_matkul;
    private $kode_dosen;


    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setKode($kode){
    	$this->kode = $kode;
    }

    public function getKode(){
    	return $this->kode;
    }

    public function setNamaMatkul($nama_matkul){
    	$this->nama_matkul = $nama_matkul;
    }

    public function getNamaMatkul(){
    	return $this->nama_matkul;
    }

    public function setKodeDosen($kode_dosen){
    	$this->kode_dosen = $kode_dosen;
    }

    public function getKodeDosen(){
    	return $this->kode_dosen;
    }

    public function addMatkul(Request $request){
    	$matkul = new MataKuliah();
        $matkul->setId($request->id);
        $matkul->setKode($request->kode);
        $matkul->setNamaMatkul($request->nama_matkul);
        $matkul->setKodeDosen($request->kode_dosen);
        $matkul->save();
    }

// *** Eloquent Relationship *** //

    // tested - kinto -d
    public function dosen(){
        return $this->belongsTo('App\Dosen');
    }

    public function presensi(){
        return $this->hasMany('App\Presensi');
    }

    public function nilai(){
        return $this->hasMany('App\Nilai', 'matakuliah_id');
    }

    // tested kinto-d
    public function jadwal(){
        return $this->belongsTo('App\Jadwal', 'id', 'matakuliah_id');
    }

    // tested-kinto-d
    public function kelas(){
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }

}
