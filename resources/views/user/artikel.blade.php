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
                <img src="{{ asset('assets/article1.jpeg') }}" class="block w-full h-full object-cover" alt="Image 1">
            </div>
            <!-- Item 2 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/artikel2.svg') }}" class="block w-full h-full object-cover" alt="Image 2">
            </div>
            <!-- Item 3 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/artikel3.svg') }}" class="block w-full h-full object-cover" alt="Image 3">
            </div>
        </div>
    </div>


    <div class="mx-8 my-8 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="px-3 font-bold text-xl md:text-3xl text-center text-font bg-white uppercase">artikel terbaru trpl</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
    </div>
    <div class="p-8 md:p-16">
        <a href="{{ route('detailArtikel') }}" class="flex flex-col items-center mb-16 bg-white rounded-lg md:flex-row md:max-w-full hover:bg-gray-100">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/artikel1.svg') }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-4 font-normal text-font">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets">Mahasiswa TRPL 2021 Berkesempatan Magang Berbasis Riset di Asia University</h5>
                <p class="mb-3 font-normal text-description">Niki Hidayati dan Ninis Dyah Yulianingsih, dua mahasiswa Program Studi Teknologi Rekayasa Perangkat Lunak...</p>
            </div>
        </a>
        <a href="{{ route('detailArtikel') }}" class="flex flex-col-reverse items-center mb-16 bg-white rounded-lg md:flex-row md:max-w-full hover:bg-gray-100">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-4 font-normal text-font">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets">Mahasiswa TRPL UGM Raih Juara 2 dan People’s Choice Award di Samsung Innovation Campus 2023/2024</h5>
                <p class="mb-3 font-normal text-description">Mahasiswa Universitas Gadjah Mada dari Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL).. </p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/artikel2.svg') }}" alt="Artikel's pict">
        </a>
        <a href="{{ route('detailArtikel') }}" class="flex flex-col items-center mb-16 bg-white rounded-lg md:flex-row md:max-w-full hover:bg-gray-100">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/artikel3.svg') }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-4 font-normal text-font">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets">Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024</h5>
                <p class="mb-3 font-normal text-description">Pada 24 September 2024, tiga mahasiswa Universitas Gadjah Mada dari program studi Teknologi R...</p>
            </div>
        </a>
    </div>

    <div class="mx-8 mt-8 mb-32 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="px-3 font-bold text-xl md:text-3xl text-center text-font bg-white uppercase">semua artikel</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
        <div class="space-y-4">
            <!-- Article List -->
            <div class="grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('assets/artikel1.svg') }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 1">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets">Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024</h5>
                    </a>
                    <p class="text-gray-500 text-sm">Sabtu, 28 September 2024</p>
                </div>
            </div>

            <div class="grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('assets/artikel2.svg') }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 2">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets">Mahasiswa TRPL UGM Raih Juara 2 dan People’s Choice Award di Samsung Innovation Campus 2023/2024</h5>
                    </a>
                    <p class="text-gray-500 text-sm">Kamis, 17 Oktober 2024</p>
                </div>
            </div>

            <div class="grid grid-cols-8 items-center md:gap-4 gap-1">
                <div class="col-span-1">
                    <img src="{{ asset('assets/artikel3.svg') }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 3">
                </div>
                <div class="col-span-7">
                    <a href="{{ route('detailArtikel') }}" class="block">
                        <h5 class="text-xl font-semibold text-assets">Mahasiswa TRPL 2021 Berkesempatan Magang Berbasis Riset di Asia University</h5>
                    </a>
                    <p class="text-gray-500 text-sm">Kamis, 17 Oktober 2024</p>
                </div>
            </div>

            <!-- Additional Articles (Hidden by Default) -->
            <div id="extra-articles" class="hidden">
                <!-- Add more article items here with the same structure -->
                <!-- Example of an additional article -->
                <div class="grid grid-cols-8 items-center md:gap-4 gap-1">
                    <div class="col-span-1">
                        <img src="{{ asset('assets/artikel1.svg') }}" class="object-cover h-8 w-8 md:h-20 md:w-20 rounded-3xl" alt="Artikel 4">
                    </div>
                    <div class="col-span-7">
                        <a href="{{ route('detailArtikel') }}" class="block">
                            <h5 class="text-xl font-semibold text-assets">Mahasiswa TRPL Berhasil dalam Kompetisi Inovasi Teknologi</h5>
                        </a>
                        <p class="text-gray-500 text-sm">Minggu, 24 September 2024</p>
                    </div>
                </div>
            </div>

            <!-- "Lihat lainnya..." Button -->
            <div class="mx-4 md:mx-16 flex justify-end">
                <button id="toggle-button" class="text-assets mt-4 hover:text-second_a" onclick="toggleArticles()">Lihat lainnya...</button>
            </div>
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

