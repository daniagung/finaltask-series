<?php

namespace App\Http\Controllers;

use App\MataKuliah;
use App\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    // Dosen Dashboard
    public function input_presensi(){
        $list_matkul = Auth::guard('dosen')->user()->mataKuliah;
        $dosen_id = Auth::guard('dosen')->user()->id;

        $list_presensi = DB::table('presensi')
            ->select('presensi.matakuliah_id', 'presensi.tanggal', 'presensi.keterangan', 'matakuliah.nama')
            ->join('matakuliah', 'presensi.matakuliah_id', '=', 'matakuliah.id')
            ->where('matakuliah.dosen_id', '=', $dosen_id)
            ->groupBy('presensi.tanggal')
            ->groupBy('presensi.matakuliah_id')
            ->groupBy('presensi.keterangan')
            ->groupBy('matakuliah.nama')
            ->get();

//        return response()->json($list_presensi);

        return view('dosen.presensi.input-presensi', [
            "list_matkul" => $list_matkul,
            'list_presensi' => $list_presensi
        ]);
    }

    public function postSelectMatkulPresensi(Request $request){
        $id_matkul = $request->input('matkul_id');
        return redirect('dosen/input-presensi/' . $id_matkul);
    }

    public function inputPresensiMahasiswa($id_matkul){
        $list_mahasiswa = MataKuliah::find($id_matkul)->kelas->mahasiswa;
//        return response()->json($list_mahasiswa);

        return view('dosen.presensi.input-presensi-mahasiswa', [
            'list_mahasiswa' => $list_mahasiswa,
            'matakuliah_id' => $id_matkul
        ]);

    }

    public function submitPresensiMahasiswa($id_matkul, Request $request){

//        return response()->json($request);
        $list_mahasiswa = $request->input('mahasiswa');
        $list_presensi = $request->input('presensi');

        for ($i = 0; $i < count($list_mahasiswa); $i++) {
            $presensi = new Presensi();
            $presensi->matakuliah_id = $id_matkul;
            $presensi->mahasiswa_id = $list_mahasiswa[$i];
            $presensi->tanggal = $request->input('tanggal_kelas');
            $presensi->keterangan = $request->input('keterangan');
            $presensi->data = $list_presensi[$i];

            $presensi->save();
        }

        return redirect('dosen/input-presensi/');
    }
}
