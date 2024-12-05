@extends('admin.layouts.appAdmin')

@section('title', "Dashboard Admin")

@section('content')
<style>
    .card:hover {
        background-color: #115C5B !important;
        color: white !important;
    }
    .card:hover h1 {
        color: white !important;
    }
    .card:hover .card-text {
        color: white !important;
    }
</style>

<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Dashboard</h3>
        </div>
        <!-- Card Data Mahasiswa -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahMahasiswa}}</strong></h1>
                    <p class="card-text">Data Mahasiswa</p>
                </div>
            </div>
        </div>
        <!-- Card Data Dosen -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahDosen}}</strong></h1>
                <p class="card-text">Data Dosen</p>
                </div>
            </div>
        </div>
        <!-- Card Data Kabinet -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahKabinet}}</strong></h1>
                <p class="card-text">Data Kabinet</p>
                </div>
            </div>
        </div>
        <!-- Card Data Divisi -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahDivisi}}</strong></h1>
                <p class="card-text">Data Divisi</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Staff -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahStaff}}</strong></h1>
                    <p class="card-text">Data Staff</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Proker -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahProker}}</strong></h1>
                    <p class="card-text">Data Proker</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Pelaksana -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahPelaksana}}</strong></h1>
                    <p class="card-text">Data Pelaksana</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Dokumentasi -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahDokumentasi}}</strong></h1>
                    <p class="card-text">Data Dokumentasi</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Artikel-->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahArtikel}}</strong></h1>
                    <p class="card-text">Data Artikel</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Dokumentasi -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahAspirasi}}</strong></h1>
                    <p class="card-text">Data Aspirasi</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
