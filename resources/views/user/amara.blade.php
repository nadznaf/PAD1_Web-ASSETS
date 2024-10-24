@extends('layouts.assets')

@section('title', 'kabinet' . $divisi->nama)

@section('content')
    <style>
        body {
            background-color: {{ $divisi->warna }};
            color: #fff; /* warna teks, sesuaikan jika perlu */
        }

        .container {
            margin: 50px;
            padding: 20px;
            background-color: #fff;
            color: #000;
            border-radius: 10px;
        }

        .title {
            font-size: 2em;
            text-align: center;
        }
    </style>

    <div class="container">
        <h1 class="title">Kabinet {{ $divisi->nama }}</h1>
        <p>Ini adalah tampilan dari kabinet {{ $divisi->nama }} dengan warna dasar {{ $divisi->warna }}.</p>
    </div>
@endsection
