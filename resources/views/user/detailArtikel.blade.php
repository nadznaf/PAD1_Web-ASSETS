@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    <div class="bg-white">
        {{-- carousel galeri --}}
        <div id="gallery" class="relative h-56 max-w-full md:h-96">
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                {{-- {{ $article->image }} --}}
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            {{-- <div class="md:w-1/3">
                <img src="{{ $article->image }}" alt="Gambar Artikel" class="w-full h-auto rounded-lg">
            </div> --}}
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-dark text-center">
                    Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024
                    {{-- {{ $article->title }} --}}
                </h2>
                <p class="text-gray-600 mt-2 mb-6">Ditulis oleh:
                    <span class="font-semibold">
                        Arya
                        {{-- {{ $article->author }} --}}
                    </span>
                        | Pada:
                        32 Oktober 2024
                        {{-- {{ $article->date }} --}}
                </p>
                <img src="assets/article1.jpeg" alt="mockup">
                <div class="mt-4 text-gray-700 leading-relaxed">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad possimus commodi a modi officia eos eligendi quibusdam
                        dignissimos at facere doloremque veritatis, incidunt maiores nostrum ut cupiditate explicabo error? Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Fugiat porro natus, aut et autem possimus quae, dolores assumenda reprehenderit itaque
                        minima. Quidem ut, quis debitis pariatur perspiciatis mollitia expedita quisquam. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ratione quidem neque, sapiente vel ab obcaecati consequuntur, optio iste quas aperiam architecto fugiat!
                        Placeat rem hic, numquam molestias provident iusto obcaecati!
                    </p>
                    {{-- {{ $article->content }} --}}
                </div>
                <br>
                <a href="https://trpl.sv.ugm.ac.id/2024/09/28/mahasiswa-trpl-raih-juara-1-dalam-bidang-data-science-pada-iconic-it-2024/" class="text-assets mt-24">Selengkapnya</a>
            </div>
        </div>
    </div>
@endsection
