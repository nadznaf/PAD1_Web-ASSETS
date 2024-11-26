@extends('admin.layouts.appAdmin')

@section('title', "Dashboard Admin")

@section('content')
<<<<<<< HEAD
<style>
    /* Default card styles */
    .card-hover {
        background-color: white;
        color: #115C5B;
        transition: background-color 0.3s, color 0.3s;
    }

    .card-hover .count-value {
        color: #115C5B;
    }

    /* Hover effect */
    .card-hover:hover {
        background-color: #115C5B;
        color: white;
    }

    .card-hover:hover .count-value {
        color: white;
    }
    .card-hover {
        cursor: pointer;
    }
</style>
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4">Selamat Datang di Dashboard Admin</h3>
            <p>Dashboard ini dirancang untuk mempermudah Anda dalam mengelola data dan informasi yang penting. Dengan navigasi yang intuitif dan akses cepat ke berbagai fitur, Anda dapat memantau, mengelola, serta menganalisis data dengan efisien. Pastikan untuk menjelajahi setiap menu untuk menemukan fungsi yang sesuai dengan kebutuhan administrasi Anda. Mari bersama menjaga integritas data dan mendukung kelancaran operasional sistem!</p>
        </div>

        @php
            $routes = [
                'jumlahMahasiswa' => route('admin.datamahasiswa.index'),
                'jumlahDosen' => route('admin.datadosen.index'),
                'jumlahKabinet' => route('admin.datakabinet.index'),
                'jumlahDivisi' => route('admin.datadivisi.index'),
                'jumlahStaff' => route('admin.datastaff.index'),
                'jumlahProker' => route('admin.dataproker.index'),
                'jumlahPelaksana' => route('admin.datapelaksana.index'),
                'jumlahDokumentasi' => route('admin.datadokumentasi.index'),
                'jumlahArtikel' => route('admin.artikel.index'),
                'jumlahAspirasi' => route('admin.aspirasi.index'),
            ];

            $titles = [
                'jumlahMahasiswa' => 'Data Mahasiswa',
                'jumlahDosen' => 'Data Dosen',
                'jumlahKabinet' => 'Data Kabinet',
                'jumlahDivisi' => 'Data Divisi',
                'jumlahStaff' => 'Upload Staff',
                'jumlahProker' => 'Upload Proker',
                'jumlahPelaksana' => 'Upload Pelaksana',
                'jumlahDokumentasi' => 'Upload Dokumentasi',
                'jumlahArtikel' => 'Data Artikel',
                'jumlahAspirasi' => 'Data Aspirasi',
            ];
        @endphp

        @foreach ($counts as $key => $value)
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center card-hover" onclick="window.location='{{ $routes[$key] }}'">
                    <div class="card-body">
                        <h1 class="count-value">
                            <strong>{{ $value }}</strong>
                        </h1>
                        <p class="card-text">{{ $titles[$key] }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
=======

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
            <div class="card text-center" style="background-color:#115C5B; color: white">
                <div class="card-body">
                <h1 style="text-size:36dp; color:white"><strong>{{$jumlahDosen}}</strong></h1>
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
                    <p class="card-text">Upload Staff</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Proker -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahProker}}</strong></h1>
                    <p class="card-text">Upload Proker</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Pelaksana -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahPelaksana}}</strong></h1>
                    <p class="card-text">Upload Pelaksana</p>
                </div>
            </div>
        </div>
        <!-- Card Upload Dokumentasi -->
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center">
                <div class="card-body">
                <h1 style="text-size:36dp; color:#115C5B"><strong>{{$jumlahDokumentasi}}</strong></h1>
                    <p class="card-text">Upload Dokumentasi</p>
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
>>>>>>> 3a175ae9b407bc5ac71f8872492413fc8249071f
