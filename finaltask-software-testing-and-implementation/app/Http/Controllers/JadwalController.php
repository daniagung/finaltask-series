<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class JadwalController extends Controller
{

    public function input_jadwal(){
        $list_kelas = Kelas::all();
        $list_jadwal = Jadwal::all();

        return view('admin.input-jadwal',[
            "list_kelas" => $list_kelas,
            'list_jadwal' => $list_jadwal
        ]);
    }

    //untuk di dashboard admin
    public function deleteJadwal($id) {
        Jadwal::destroy($id);
        return redirect('admin/input-jadwal');
    }

    public function submitJadwal(Request $request){
//        return Response::json($request);

        $jadwal = new Jadwal();
        $jadwal->matakuliah_id = $request->input('kelas');
        $jadwal->hari = $request->input('hari');
        $jadwal->waktu = $request->input('jam');
        $jadwal->ruangan = $request->input('ruangan');
        $jadwal->save();

        return redirect('admin/input-jadwal');
    }
        
}
