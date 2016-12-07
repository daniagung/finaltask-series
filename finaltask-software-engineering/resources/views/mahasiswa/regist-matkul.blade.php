@extends('mahasiswa/base')

@section('activeregist')
    active
@endsection

@section('title')
    Registasi Matakuliah - Mahasiswa
@endsection

@section('addcss')
    @endsection

@section('addjs')
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#tabs" ).tabs();
        });
    </script>
@endsection

@section('nav_position')
    Registrasi -> Matakuliah
@endsection


@section('name_account')
    {{ $mhs->name }}
@endsection

@section('role_account')
    Mahasiswa
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Input Mata Kuliah</h4>
                </div>
                <div class="content">
                    <div id="tabs">
                        <ul class="nav nav-tabs nav-justified ">
                            <li><a href="#tabs-1">Tingkat 1</a></li>
                            <li><a href="#tabs-2">Tingkat 2</a></li>
                            <li><a href="#tabs-3">Tingkat 3</a></li>
                            <li><a href="#tabs-4">Tingkat 4</a></li>
                        </ul>
                        <div id="tabs-1">
                            <div class="table table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Kalkulus I </td>
                                        <td class="td-actions text-center">
                                            4 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Fisika I </td>
                                        <td class="td-actions text-center">
                                            3 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">KPST </td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Agama </td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">English I</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="table table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Fisika II</td>
                                        <td class="td-actions text-center">
                                            4 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Basis Data Relational</td>
                                        <td class="td-actions text-center">
                                            3 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Interaksi Manusia Komputer</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Agama II</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Bahasa Indonesia</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tabs-3">
                            <div class="table table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Algoritma Struktur Data</td>
                                        <td class="td-actions text-center">
                                            4 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Agama III</td>
                                        <td class="td-actions text-center">
                                            3 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Sistem Logika Digital</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Orientasi Object Programming</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Design Analisys Algorithm</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tabs-4">
                            <div class="table table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Organisasi Arsitektur Komputer</td>
                                        <td class="td-actions text-center">
                                            4 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Jaringan Komputer</td>
                                        <td class="td-actions text-center">
                                            3 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Praktikum Jaringan Komputer</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Machine Learning</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" aria-label="...">
                                        </td>
                                        <td class="td-actions text-center">Pengolahan Citra Digital</td>
                                        <td class="td-actions text-center">
                                            2 SKS
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
