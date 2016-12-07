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
        if(Auth::guard('adminakademik')->check() || Auth::guard('web')->check())
            return redirect('/');
        else
            return view('login');
    }

    public function postLogin(Request $request){
        if ($request['role'] == 'mahasiswa') {
            // Authentication passed...
            $login = Auth::guard('web')->attempt(['username' => $request['username'], 'password' => $request['password']]);

        } elseif ($request['role'] == 'dosen') {
            $login = Auth::guard('dosen')->attempt(['username' => $request['username'], 'password' => $request['password']]);

        } elseif ($request['role'] == 'admin') {
            $login = Auth::guard('adminakademik')->attempt(['username' => $request['username'], 'password' => $request['password']]);

        } else {
            return "Error Login";
        }

        if($login)
            return redirect()->intended('/');
        else
            return "<script> alert('login ". $request['role'] ." gagal, username or password salah!!'); document.location.href='/'</script>";
    }

    public function getLogout(){
        Auth::guard('adminakademik')->logout();
        Auth::guard('dosen')->logout();
        Auth::guard('web')->logout();
        return redirect()->intended('/');
    }

    public function getRegister(){ 
        if(Auth::guard('adminakademik')->check() || Auth::guard('web')->check())
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
