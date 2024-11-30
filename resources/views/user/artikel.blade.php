@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<section class="bg-white">
    <!-- Carousel Gallery with Text Overlay -->
    <div id="gallery" class="relative w-full h-56 overflow-hidden md:h-550 md:mb-8" data-carousel="slide">
        <!-- Fixed Text Overlay -->
        <div class="absolute inset-0 flex items-center justify-center z-40">
            <div class="text-center text-white bg-black bg-opacity-50 h-full w-full">
                <div class="flex flex-col justify-center items-center h-full">
                    <h2 class="text-3xl md:text-5xl font-bold">Artikel</h2>
                    <p class="mt-2 text-xl">Berita dan Ativitas Terkait TRPL</p>
                </div>
            </div>
        </div>

        <!-- Carousel Items -->
        <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out" style="width: 100%" data-carousel-wrapper>
            <!-- Item 1 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('storage/artikel/' . $dataArtikel[0]->foto_sampul_artikel) }}" class="block w-full h-full object-cover" alt="Image 1">
            </div>
            <!-- Item 2 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('storage/artikel/' . $dataArtikel[1]->foto_sampul_artikel) }}" class="block w-full h-full object-cover" alt="Image 2">
            </div>
            <!-- Item 3 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('storage/artikel/' . $dataArtikel[2]->foto_sampul_artikel) }}" class="block w-full h-full object-cover" alt="Image 3">
            </div>
        </div>
    </div>


    <div class="mx-8 mt-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full py-16 px-4">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="px-3 font-bold text-xl md:text-3xl text-center text-font bg-white uppercase">artikel terbaru trpl</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
    </div>
    <div class="p-8 md:mx-24">
        <a href="{{ route('artikel.show', $dataArtikel[0]->id_artikel) }}" class="group flex flex-col md:items-center mt-16 mb-8 rounded-lg md:flex-row md:max-w-full" data-aos="fade-left" data-aos-duration="3000">
            <img class="object-cover w-full h-80 rounded-2xl md:w-2/5" src="{{ asset('storage/artikel/' . $dataArtikel[0]->foto_sampul_artikel) }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 md:ps-8 leading-normal md:w-3/5">
                <p class="mb-8 font-semibold text-font">{{ \Carbon\Carbon::parse($dataArtikel[0]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a">{{ $dataArtikel[0]->judul_artikel }}</h5>
                <p class="mb-3 font-normal text-description">{{ $dataArtikel[0]->konten_artikel }}</p>
            </div>
        </a>
        <a href="{{ route('artikel.show', $dataArtikel[1]->id_artikel) }}" class="group flex flex-col-reverse md:items-center mt-16 mb-8 bg-white rounded-lg md:flex-row md:max-w-full" data-aos="fade-right" data-aos-duration="3000">
            <div class="flex flex-col justify-between p-4 md:pe-8 leading-normal md:w-3/5">
                <p class="mb-8 font-semibold text-font">{{ \Carbon\Carbon::parse($dataArtikel[1]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a">{{ $dataArtikel[1]->judul_artikel }}</h5>
                <p class="mb-3 font-normal text-description">{{ $dataArtikel[1]->konten_artikel }}</p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('storage/artikel/' . $dataArtikel[1]->foto_sampul_artikel) }}" alt="Artikel's pict">
        </a>
        <a href="{{ route('artikel.show', $dataArtikel[2]->id_artikel) }}" class="group flex flex-col md:items-center mt-16 mb-8 rounded-lg md:flex-row md:max-w-full" data-aos="fade-left" data-aos-duration="3000">
            <img class="object-cover w-full h-80 rounded-2xl md:w-2/5" src="{{ asset('storage/artikel/' . $dataArtikel[2]->foto_sampul_artikel) }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 md:ps-8 leading-normal md:w-3/5">
                <p class="mb-8 font-semibold text-font">{{ \Carbon\Carbon::parse($dataArtikel[2]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a">{{ $dataArtikel[2]->judul_artikel }}</h5>
                <p class="mb-3 font-normal text-description">{{ $dataArtikel[2]->konten_artikel }}</p>
            </div>
        </a>
    </div>

    <div class="mx-8 mt-8 mb-32 md:mx-16">
        <div class="inline-flex items-center justify-center w-full py-16 px-4">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="px-3 font-bold text-xl md:text-3xl text-center text-font bg-white uppercase">semua artikel</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
        <div class="space-y-4">
            <div class="group grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('storage/artikel/' . $dataArtikel[0]->foto_sampul_artikel) }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 1">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets group-hover:text-second_a">{{ $dataArtikel[2]->judul_artikel }}</h5>
                    </a>
                    <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($dataArtikel[0]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                </div>
            </div>

            <div class="group grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('storage/artikel/' . $dataArtikel[1]->foto_sampul_artikel) }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 2">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets group-hover:text-second_a">{{ $dataArtikel[1]->judul_artikel }}</h5>
                    </a>
                    <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($dataArtikel[1]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                </div>
            </div>

            <div class="group grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('storage/artikel/' . $dataArtikel[2]->foto_sampul_artikel) }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 3">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets group-hover:text-second_a">{{ $dataArtikel[2]->judul_artikel }}</h5>
                    </a>
                    <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($dataArtikel[2]->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                </div>
            </div>

            <!-- Additional Articles (Hidden by Default) -->
            <div id="extra-articles" class="hidden space-y-4">
                @foreach ($dataArtikel as $index => $artikel)
                <div class="group grid grid-cols-8 items-center md:gap-4 gap-1">
                    <div class="col-span-1">
                        <img src="{{ asset('storage/artikel/' . $artikel->foto_sampul_artikel) }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 4">
                    </div>
                    <div class="col-span-7">
                        <a href="{{ route('detailArtikel') }}" class="block">
                            <h5 class="text-xl font-semibold text-assets group-hover:text-second_a">{{ $artikel->judul_artikel }}</h5>
                        </a>
                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($artikel->tanggal_terbit)->isoFormat('dddd, DD-MM-YYYY') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- "Lihat lainnya..." Button -->
        <div class="m-4 flex justify-end">
            <button id="toggle-button" class="text-assets mt-4 hover:text-second_a" onclick="toggleArticles()">Lihat artikel lainnya...</button>
        </div>

        <script>
            function toggleArticles() {
                var extraArticles = document.getElementById("extra-articles");
                var toggleButton = document.getElementById("toggle-button");
                if (extraArticles.classList.contains("hidden")) {
                    extraArticles.classList.remove("hidden");
                    toggleButton.innerText = "Tampilkan lebih sedikit...";
                } else {
                    extraArticles.classList.add("hidden");
                    toggleButton.innerText = "Lihat lainnya...";
                }
            }
        </script>
    </div>
</section>
@endsection

