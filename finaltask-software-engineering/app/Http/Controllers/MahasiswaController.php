<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function home(){
        return view('mahasiswa.dashboard', ["mhs" => Auth::user()]);
    }

    public function regist_bayar(){
        return view('mahasiswa.regist-bayar', ["mhs" => Auth::user()]);
    }

    public function regist_matkul(){
        return view('mahasiswa.regist-matkul', ["mhs" => Auth::user()]);
    }

    public function jadwal(){
        return view('mahasiswa.jadwal', ["mhs" => Auth::user()]);
    }

    public function nilai(){
        return view('mahasiswa.nilai', ["mhs" => Auth::user()]);
    }

    public function presensi(){
        return view('mahasiswa.presensi', ["mhs" => Auth::user()]);
    }

    public function profile(){
        return view('mahasiswa.profile', ["mhs" => Auth::user()]);
    }

    public function postProfile(Request $request){
        $mhs = Mahasiswa::find(intval($request['id']));
        $mhs->nim = $request['nim'];
        $mhs->email = $request['email'];
        $mhs->name = $request['name'];
        $mhs->alamat = $request['alamat'];
        $mhs->save();

        return redirect('/mahasiswa/profile');
    }
}
