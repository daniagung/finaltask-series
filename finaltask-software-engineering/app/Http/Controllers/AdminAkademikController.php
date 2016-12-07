<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAkademikController extends Controller
{
    public function home(){
        return view('admin.dashboard', ["user" => Auth::guard('adminakademik')->user()]);
    }

    public function input_kelas(){
        return view('admin.input-kelas', ["user" => Auth::guard('adminakademik')->user()]);
    }

    public function input_matkul(){
        return view('admin.input-matkul', ["user" => Auth::guard('adminakademik')->user()]);
    }

    public function input_jadwal(){
        return view('admin.input-jadwal', ["user" => Auth::guard('adminakademik')->user()]);
    }

    public function profile(){
        return view('admin.profile', ["user" => Auth::guard('adminakademik')->user()]);
    }
}
