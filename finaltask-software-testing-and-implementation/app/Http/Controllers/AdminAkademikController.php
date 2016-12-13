<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mahasiswa;
use App\Dosen;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAkademikController extends Controller
{

    public function home(){
        return view('admin.dashboard');
    }

    
    public function input_mahasiswa(){
        $list_kelas = Kelas::all();
        $list_mahasiswa = Mahasiswa::all();
        return view('admin.input-mahasiswa', ["list_kelas" => $list_kelas, "list_mahasiswa" => $list_mahasiswa]);
    }

    public function postMahasiswa(Request $request){
        $nama = $request->input('nama');
        $nim = $request->input('nim');
        $kelas = $request->input('kelas');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('telp');
        $username = $request->input('username');
        if ($request->input('password') != null){
            $password = $request->input('password');
        }

        try {
            $new_mahasiswa = new Mahasiswa();
            $new_mahasiswa->nim = $nim;
            $new_mahasiswa->username = $username;
            if($request['password'] != ''){
                $new_mahasiswa->password = Hash::make($request->input('password'));
            }
            $new_mahasiswa->name = $nama;
            $new_mahasiswa->kelas_id = $kelas;
            $new_mahasiswa->alamat  = $alamat;
            $new_mahasiswa->no_telp = $no_telp;
            $new_mahasiswa->save();

            return redirect('admin/input-mahasiswa');

        } catch (QueryException $qe){

            return "<script>".
                "alert('NIM / Username Duplicate');".
                "window.location.href='';".
            "</script>";

        }


    }

    public function editMahasiswa($id){
        $list_kelas = Kelas::all();
        $mahasiswa =  Mahasiswa::find($id);
        return view('admin.edit-mahasiswa', ["mahasiswa" => $mahasiswa, "list_kelas" => $list_kelas]);
    }

    public function submitEditMahasiswa($id, Request $request){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->name = $request->input('nama');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->kelas_id =  $request->input('kelas');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->no_telp = $request->input('telp');
        $mahasiswa->username = $request->input('username');
        if($request['password'] != ''){
            $mahasiswa->password = Hash::make($request->input('password'));
        }

        try{
            $new_mahasiswa = new Mahasiswa();
            $new_mahasiswa->name = $request->input('nama');
            $new_mahasiswa->nim = $request->input('nim');
            $new_mahasiswa->kelas_id =  $request->input('kelas');
            $new_mahasiswa->alamat = $request->input('alamat');
            $new_mahasiswa->no_telp = $request->input('telp');
            $new_mahasiswa->username = $request->input('username');
            if($request['password'] != ''){
                $new_mahasiswa->password = Hash::make($request->input('password'));
            }
            $mahasiswa->save();
        } catch (QueryException $qe){
            return "<script>".
            "alert('NIM / Username Duplicate');".
            "window.location.href='';".
            "</script>";
        }

        return redirect('admin/input-mahasiswa');
    }


    public function deleteMahasiswa($id){
        Mahasiswa::destroy($id);
        return redirect('admin/input-mahasiswa');
    }

    public function input_dosen(){
        $list_dosen = Dosen::all();
        return view('admin.input-dosen', ["list_dosen" => $list_dosen]);
    }

    public function postDosen(Request $request){
        $nama = $request->input('nama');
        $nip = $request->input('nip');
        $kode = $request->input('kode');
        $username = $request->input('username');
        $password = $request->input('password');
        try{
            $new_dosen = new Dosen();
            $new_dosen->nip = $nip;
            $new_dosen->name = $nama;
            $new_dosen->kode = $kode;
            $new_dosen->username = $username;
            $new_dosen->password = Hash::make($password);
            $new_dosen->save();

            return redirect('admin/input-dosen');

        } catch (QueryException $qe){

            return "<script>".
                "alert('NIP / Kode / Username Duplicate');".
                "window.location.href='';".
            "</script>";

        }
    }

    public function deleteDosen($id){
        Dosen::destroy($id);
        return redirect('admin/input-dosen');
    }

    public function editDosen($id){
        $dosen = Dosen::find($id);
        return view('admin.edit-dosen', ["dosen" => $dosen]);
    }

    public function submitEditDosen($id, Request $request){
        try{
            $dosen = Dosen::find($id);
            $dosen->name = $request->input('nama');
            $dosen->nip = $request->input('nip');
            $dosen->username = $request->input('username');
            $dosen->kode = $request->input('kode');
            if($request['password'] != ''){
                $dosen->password = Hash::make($request->input('password'));
            }
            $dosen->save();

            return redirect('admin/input-dosen');
            
        } catch (QueryException $qe){

            return "<script>".
                "alert('NIP / Kode / Username Duplicate');".
                "window.location.href='';".
            "</script>";

        }
    }

    public function profile(){
        $user = Auth::guard('admin_akademik')->user();
        return view('admin.profile', ["user" => $user]);
    }
}
