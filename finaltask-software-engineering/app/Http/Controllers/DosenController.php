<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function home(){
        return view('dosen.dashboard', ["user" => Auth::guard('dosen')->user()]);
//        return redirect('/dosen/input-presensi');
    }

    public function input_presensi(){
        return view('dosen.input-presensi', ["user" => Auth::guard('dosen')->user()]);
    }

    public function input_nilai(){
        return view('dosen.input-nilai', ["user" => Auth::guard('dosen')->user()]);
    }

    public function jadwal(){
        return view('dosen.jadwal', ["user" => Auth::guard('dosen')->user()]);
    }

    public function profile(){
        return view('dosen.profile', ["user" => Auth::guard('dosen')->user()]);
    }
}
