<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Kelas;
use App\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    //
    public function getMatkul(){
        $list_kelas = Kelas::all();
        $list_dosen = Dosen::all();
        $list_matkul = MataKuliah::all();

        return view('admin.input-matkul', [
            "list_kelas" => $list_kelas,
            "list_dosen" => $list_dosen,
            "list_matkul" => $list_matkul
        ]);
    }

    //untuk di dashboard admin
    public function deleteMatkul($id) {
        MataKuliah::destroy($id);
        return redirect('admin/input-matkul');
    }

    public function submitMatkul(Request $request){

        $mataKuliah = new MataKuliah();
        $mataKuliah->kelas_id = $request->input('kelas');
        $mataKuliah->nama = $request->input('mata_kuliah');
        $mataKuliah->kode = $request->input('kode');
        $mataKuliah->sks = $request->input('sks');
        $mataKuliah->dosen_id = $request->input('dosen');

        $mataKuliah->save();

        return redirect('admin/input-matkul');
    }

    public function editMatkul($id){
        $matkul = MataKuliah::find($id);
        $list_kelas = Kelas::all();
        $list_dosen = Dosen::all();
        return view('admin.edit-matakuliah', ["matkul" => $matkul, "list_kelas" => $list_kelas, "list_dosen" => $list_dosen]);
    }

    public function submitEditMatkul($id, Request $request){
        $matkul = MataKuliah::find($id);
        $matkul->kelas_id = $request->input('kelas');
        $matkul->nama = $request->input('mata_kuliah');
        $matkul->sks = $request->input('sks');
        $matkul->kode = $request->input('kode');
        $matkul->dosen_id = $request->input('dosen');
        $matkul->save();

        return redirect('admin/input-matkul');
    }
}
