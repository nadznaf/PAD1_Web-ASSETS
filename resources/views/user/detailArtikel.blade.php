@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    <div class="bg-white">
        <div id="gallery" class="relative w-full h-96 overflow-hidden">
            <img src="{{ asset('storage/artikel/' . $artikel->foto_sampul_artikel) }}" class="block w-full h-full object-cover" alt="Single Image">
        </div>
        <div class="flex flex-col">
            <div class="mt-16 justify-items-center mx-8 lg:mx-32 md:mx-20">
                <p class="text-judul_aspiration mt-2 mb-6 text-sm md:text-base">
                    {{ \Carbon\Carbon::parse($artikel->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }} | Oleh:
                    <span class="underline">
                        {{ $artikel->nama_penulis}}
                    </span>
                </p>
                <h2 class="text-3xl font-bold text-dark text-center underline mb-16 md:px-16">
                    {{ $artikel->judul_artikel }}
                </h2>
                <div class="mt-1 text-font text-justify">
                    {{-- Proses konten artikel menjadi paragraf dengan <br> --}}
                    @php
                        $konten = explode("\n", $artikel->konten_artikel); // Pisahkan berdasarkan baris baru
                    @endphp
                    @foreach ($konten as $paragraf)
                        <p><br class="mt-1">{{ $paragraf }}</p>
                    @endforeach
                </div>
            </div>
            <div class="my-16 mx-8 md:mx-20 lg:mx-32">
                <p class=" text-sumber_artikel">Referensi:</p>
                <a href="{{ $artikel->tautan_artikel_resmi }}" target="_blank" class=" text-sumber_artikeld hover:underline">{{ $artikel->judul_artikel }}</a>
            </div>
        </div>
    </div>
@endsection
