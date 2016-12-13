<?php

namespace App\Http\Controllers;

use App\AdminAkademik;
use App\Dosen;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mahasiswa;

class AuthController extends Controller
{

    public function getLogin(){
        if(Auth::guard('admin_akademik')->check() || Auth::guard('mahasiswa')->check() || Auth::guard('dosen')->check())
            return redirect('/');
        else
            return view('login');
    }

    public function postLogin(Request $request){

        $attempt_login = ['username' => $request['username'], 'password' => $request['password']];

        if(Auth::guard('admin_akademik')->attempt($attempt_login)){
            return redirect('/admin');
        } else if(Auth::guard('dosen')->attempt($attempt_login)) {
            return redirect('/dosen');
        } else if(Auth::guard('mahasiswa')->attempt($attempt_login)) {
            return redirect('/mahasiswa');
        } else {
            return "<script> alert('login gagal, username atau password salah!!'); document.location.href='/'</script>";
        }

    }

    public function getLogout(){
        Auth::guard('admin_akademik')->logout();
        Auth::guard('dosen')->logout();
        Auth::guard('mahasiswa')->logout();
        return redirect()->intended('/');
    }

    public function getRegister(){
        if(Auth::guard('admin_akademik')->check() || Auth::guard('mahasiswa')->check() || Auth::guard('dosen')->check())
            return redirect('/');
        else
            return view('register');
    }

    public function postRegister(Request $request){
        try {
            if ($request['role'] == 'dosen') {
                Dosen::create([
                    'username' => $request['username'],
                    'name' => $request['name'],
                    'password' => bcrypt($request['password']),
                ]);
            } elseif ($request['role'] == 'mahasiswa') {
                Mahasiswa::create([
                    'username' => $request['username'],
                    'name' => $request['name'],
                    'password' => bcrypt($request['password']),
                ]);
            } elseif ($request['role'] == 'admin') {
                AdminAkademik::create([
                    'username' => $request['username'],
                    'name' => $request['name'],
                    'password' => bcrypt($request['password']),
                ]);
            } else {
                return "Registration error";
            }

            return "<script> alert('Account " . $request['role'] . " created, now you can login with your account'); document.location.href='/'</script>";

        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                // houston, we have a duplicate entry problem
                return "Duplicate Username or Email";
            }
        }
    }
}
