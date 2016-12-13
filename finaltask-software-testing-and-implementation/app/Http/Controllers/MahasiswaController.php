<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function home(){
        if(count(Auth::guard('mahasiswa')->user()->registrasi) != 0){
            return view('mahasiswa.dashboard');
        } else {
            return view('mahasiswa.not-registered');
        }
    }

    public function regist_bayar(){

        $tokens = Auth::guard('mahasiswa')->user()->registrasi;
        return view('mahasiswa.regist-bayar', ['tokens' => $tokens]);
    }

    public function postBayarToken(Request $request){
        $id_mhs = Auth::guard('mahasiswa')->user()->id;

        $registrasi = new Registrasi();
        $registrasi->token = $request->input('token');
        $registrasi->mahasiswa_id = $id_mhs;
        $registrasi->save();

        return redirect('mahasiswa/pembayaran');
    }


    public function regist_matkul(){
        return view('mahasiswa.regist-matkul');
    }

    public function jadwal(){

        if(count(Auth::guard('mahasiswa')->user()->registrasi) == 0) return view('mahasiswa.not-registered');

        return view('mahasiswa.jadwal');
    }

    public function nilai(){

        if(count(Auth::guard('mahasiswa')->user()->registrasi) == 0) return view('mahasiswa.not-registered');

        $listnilai = Auth::guard('mahasiswa')->user()->nilai;
        return view('mahasiswa.nilai', ['list_nilai' => $listnilai]);
    }

    public function presensi(){

        if(count(Auth::guard('mahasiswa')->user()->registrasi) == 0) return view('mahasiswa.not-registered');

        $listpresensi = Auth::guard('mahasiswa')->user()->presensi;
        return view('mahasiswa.presensi', ['listpresensi' => $listpresensi]);
    }

    public function profile(){

        if(count(Auth::guard('mahasiswa')->user()->registrasi) == 0) return view('mahasiswa.not-registered');

        $mhs = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.profile', ['mhs' => $mhs]);
    }

    public function postProfile(Request $request){
        $mhs = Mahasiswa::find(intval($request['id']));
        $mhs->nim = $request['nim'];
        $mhs->email = $request['email'];
        $mhs->name = $request['name'];
        $mhs->alamat = $request['alamat'];
        $mhs->no_telp = $request['no_telp'];

        if($request['password'] != ''){
                $mhs->password = Hash::make($request['password']);
        }

        $mhs->save();

        return redirect('/mahasiswa/profile');
    }
}
