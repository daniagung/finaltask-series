<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Nilai extends Model
{
    //
    protected $table = "nilai";

    private $id;
    private $nilai;
    private $indeks;
    private $idMhs;
    private $idMatkul;

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setNilai($nilai){
    	$this->nilai = $nilai;
    }

    public function getNilai(){
    	return $this->nilai;
    }

    public function setIndeks($indeks){
        $this->indeks = $indeks;
    }

    public function getIdMhs(){
    	return $this->idMhs;
    }

    public function getIdMatkul(){
    	return $this->idMatkul;
    }

    public function addNilai(Request $request){
    	$nilai = new Nilai();
        $nilai->setId($request->id);
        $nilai->setNilai($request->nilai);
        $nilai->save();
    }

    public function changeNilai($nilai){
    	$this->nilai = $nilai;
    }

    public function deleteNilai(Nilai $nilai){
    	$nilai->delete();
    }

    public function getIndex(){
        $nilai_akhir = $this->uts * 0.35 + $this->uas * 0.35 + $this->quiz * 0.20 + $this->tugas * 0.1;
        if($nilai_akhir >= 80)
            return "A";
        else if ($nilai_akhir >= 75)
            return "AB";
        else if ($nilai_akhir >= 60)
            return "B";
        else if ($nilai_akhir >= 50)
            return "BC";
        else if ($nilai_akhir >= 45)
            return "C";
        else if ($nilai_akhir >= 40)
            return "D";
        else
            return "E";
    }

// *** Eloquent Relationship *** //
    public function mataKuliah(){
        return $this->belongsTo('App\MataKuliah', 'matakuliah_id');
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id');
    }

}
