@extends('layouts.assets')

@section('title', 'kabinet' . $kabinet->nama)

@section('content')
    <style>
        body {
            background-color: {{ $kabinet->warna }};
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
        <h1 class="title">Kabinet {{ $kabinet->nama }}</h1>
        <p>Ini adalah tampilan dari kabinet {{ $kabinet->nama }} dengan warna dasar {{ $kabinet->warna }}.</p>
    </div>
@endsection
