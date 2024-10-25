@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex flex-col md:flex-row">
            {{-- <div class="md:w-1/3">
                <img src="{{ $article->image }}" alt="Gambar Artikel" class="w-full h-auto rounded-lg">
            </div> --}}
            <div class="md:w-2/3 md:pl-6 mt-4 md:mt-0">
                <h2 class="text-3xl font-bold text-gray-800">
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
